<?php

namespace App\Http\Controllers;

use App\Professor;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Agendamento;
use App\Sala;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class AgendamentosController extends Controller
{
    protected $agendamentos;

    public function __construct(Agendamento $agendamentos)
    {
        $this->agendamentos = $agendamentos;
        $this->middleware('auth');
    }

    /**
     * Formata uma string de dia para o formato especificado passado.
     *
     * @param String $dia O dia que se quer obter com outra máscara, deve ter o separador - (hifen)
     * @param String $mask
     * @return bool|string
     */
    private function formatDate($dia, $mask)
    {
        $date = date_create($dia);

        return date_format($date, $mask);
    }

    /**
     * Consulta os agendamentos baseado no intervalo de dias.
     *
     * @param $dia_inicial
     * @param $dia_final
     * @return array|null
     */
    public function getAgendamentos($dia_inicial, $dia_final)
    {
        $agendamentos = DB::table('agendamentos')
            ->select('id', 'tipo', 'prof_id', 'dia', 'hora_inicio', 'hora_fim')
            ->whereBetween('dia', [$dia_inicial, $dia_final])
            ->get();

        $professores = Professor::all()->lists('nome', 'id');

        $agenda = array();
        foreach($agendamentos as $item)
        {
            /* o formato da hora de inicio e fim do Fullcalendar é a seguinte
             '2015-12-31T12:30:00'
             por isso é chamado $item->diaT$item->hora
             */
            $agenda[$item->id]['title'] = $item->tipo . ' - ' . $professores->get($item->prof_id);
            $agenda[$item->id]['start'] = $item->dia . 'T' . $item->hora_inicio;
            $agenda[$item->id]['end'] = $item->dia . 'T' . $item->hora_fim;
        }

        if(empty($agenda))
            return null;
        else
            return $agenda;
    }

    /**
     * Seleciona as salas usadas dentre o dia e intervalo de horas passadas
     * e retorna todas apenas as livres.
     *
     * @param $predio
     * @param $dia
     * @param $hora_inicio
     * @param $hora_fim
     * @return json|null
     */
    public function getSalas($predio, $dia, $hora_inicio, $hora_fim)
    {
        //seleciona todos os sala_id que estão no intervalo
        $agenda = DB::table('agendamentos')
            ->select('sala_id')
            ->where('dia', $dia)->where('hora_inicio', '>=', $hora_inicio)->where('hora_fim', '<=', $hora_fim)
            ->get();

        //passa para um array os resultados
        $ids = array();
        foreach($agenda as $id)
            array_push($ids, $id->sala_id);

        if(empty($ids))
            $salasLivres = Sala::all()->where('predio', $predio)->lists('numero', 'id');
        else
            //seleciona as salas exceto as que estão no array
            $salasLivres = Sala::all()->except($ids)->where('predio', $predio)->lists('numero', 'id');

        if(empty($salasLivres))
            return null;
        else
            return response()->json($salasLivres);
    }

    public function index()
    {
        //lista os prédios sem repeti-los
        $predios = DB::table('salas')->distinct()->lists('predio', 'predio');

        $profs = Professor::all()->lists('nome', 'id');
        $agendamentos = Agendamento::all()->jsonSerialize();

        $i = 0;
        foreach ($agendamentos as $agenda)
        {
            $agendamentos[$i]['tipo'] = utf8_encode($agenda['tipo']);
            $i++;
        }

        return view('agendamentos.index', compact('agendamentos', 'predios', 'profs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //não precisamos pegar predio_id pois já temos sala_id
        $input = $request->except('predio_id');

        //pega o ID do usuário logado que fez a reserva
        $user_id = Auth::id();
        $input['usuario_id'] = $user_id;

        $this->agendamentos->create($input);

        return redirect()->route('agendamentos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $agendaEdit = $this->agendamentos->find($id);

        if (is_null($agendaEdit))
        {
            return redirect()->route('agendamentos.index');
        }

        $agendaEdit['predio'] = DB::table('salas')->where('id', $agendaEdit->sala_id)->value('predio');
        $predios = DB::table('salas')->distinct()->lists('predio', 'predio');
        $salas = Sala::all()->lists('numero', 'id');
        $profs = Professor::all()->lists('nome', 'id');

        //formata a data pega no banco yyyy-mm-dd para dd/mm/yyyy
        $agendaEdit->dia = $this->formatDate($agendaEdit->dia, 'd/m/Y');

        //retorna apenas os 5 primeiros caracteres
        //original 14:30:00 => retorna 14:30
        $agendaEdit->hora_inicio = substr($agendaEdit->hora_inicio, 0, 5);
        $agendaEdit->hora_fim = substr($agendaEdit->hora_fim, 0, 5);

        return view('agendamentos.edit', compact('agendaEdit', 'predios', 'salas', 'profs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $agenda = $this->agendamentos->find($id);

        //cria uma nova key com o nome dia para adicionar no banco
        $input['dia'] = $input['datepicker'];
        //elimina a key datepicker
        unset($input['datepicker']);

        $dia = str_replace('/', '-', $input['dia']);
        $input['dia'] = $this->formatDate($dia, 'Y-m-d');

        $agenda->update($input);

        return redirect()->route('agendamentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->agendamentos->find($id)->delete();

        return redirect()->route('agendamentos.index');
    }
}
