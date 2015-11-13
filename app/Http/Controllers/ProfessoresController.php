<?php

namespace App\Http\Controllers;

use App\Curso;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Professor;
use Illuminate\Support\Facades\Input;

class ProfessoresController extends Controller
{

    protected $professores;

    public function __construct(Professor $professor) {
        $this->professores = $professor;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $professores = $this->professores->paginate(10);
        $cursos = Curso::all()->lists('nome_curso', 'id');

        if($professores->isEmpty()) {
            $message = 'Nao ha professores registrados ainda!';
            $button = 'Adicionar novo professor';
            $create =  'professores.create';

            return view('layouts.empty', compact('message', 'button', 'create', 'cursos'));
        } else {
            return view('professores.index', compact('professores', 'cursos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('professores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $this->professores->create($input);

        return redirect()->route('professores.index');
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
        $professorEdit = $this->professores->find($id);
        $cursos = Curso::all()->lists('nome_curso', 'id');

        if (is_null($professorEdit))
        {
            return redirect()->route('professores.index');
        }

        return view('professores.edit', compact('professorEdit', 'cursos'));
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
        $professor = $this->professores->find($id);
        $professor->update($input);

        return redirect()->route('professores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->professores->find($id)->delete();

        return redirect()->route('professores.index');
    }
}
