<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Curso;
use Illuminate\Support\Facades\Input;

class CursosController extends Controller
{


    protected $cursos;

    public function __construct(Curso $curso) {
        $this->cursos = $curso;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cursos = $this->cursos->paginate(10);

        if($cursos->isEmpty()) {
            $message = 'Nao ha cursos registrados ainda!';
            $button = 'Adicionar nova sala';
            $create =  'cursos.create';

            return view('layouts.empty', compact('message', 'button', 'create'));
        } else {
            return view('cursos.index', compact('cursos'));
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
        $this->cursos->create($input);

        return redirect()->route('cursos.index');

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
        $cursoEdit = $this->cursos->find($id);

        if (is_null($cursoEdit))
        {
            return redirect()->route('cursos.index');
        }

        return view('cursos.edit', compact('cursoEdit'));
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
        $curso = $this->cursos->find($id);
        $curso->update($input);

        return redirect()->route('cursos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->cursos->find($id)->delete();

        return redirect()->route('cursos.index');
    }
}
