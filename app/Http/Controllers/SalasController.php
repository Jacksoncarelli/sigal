<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Recurso;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Sala;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class SalasController extends Controller
{

    protected $salas;
    protected $recursos;
    protected $salasTemRecursos;

    public function __construct(Sala $sala, Recurso $recurso) {
        $this->salas = $sala;
        $this->recursos = $recurso;
        //$this->salasTemRecursos = $salasTemRecursos;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $salas = $this->salas->all();

        if($salas->isEmpty()) {
            $message = 'Nao ha salas registradas ainda!';
            $button = 'Adicionar nova sala';
            $create =  'salas.create';

            return view('layouts.empty', compact('message', 'button', 'create'));
        } else {
            return view('salas.index', compact('salas'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('salas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
        $input = $request->all();

        $this->salas->create($input);
=======
        $sala = $request->except('recurso');
        $recurso = $request->only('recurso', 'descricao', 'obs');

        $this->recursos->create($recurso);
        $this->salas->create($sala);


>>>>>>> jeffesongouveia/master

        return redirect()->route('salas.index');
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
        $salaEdit = $this->salas->find($id);

        if (is_null($salaEdit))
        {
            return redirect()->route('salas.index');
        }

        return view('salas.edit', compact('salaEdit'));
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
        $sala = $this->salas->find($id);
        $sala->update($input);

        return redirect()->route('salas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->salas->find($id)->delete();

        return redirect()->route('salas.index');
    }
}
