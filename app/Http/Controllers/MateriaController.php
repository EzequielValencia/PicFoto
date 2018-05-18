<?php

namespace PicFoto\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use PicFoto\Horario;
use PicFoto\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{

    /**
     * MateriaController constructor.
     */
    public function __construct()
    {
        $this->middleware('jwt.auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Materia[]
     */
    public function index(Request $request)
    {
        $user = auth()->setRequest($request)->user();
        $materias = Materia::where('userid','=',$user->id)->get();
        foreach ($materias as $materia){
            $materia = $materia->horario->toArray();
        }
        return $materias;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Listado Materias create";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreMateria = $request->nombreMateria;
        $horarios  = $request->horario;
        $materiaNueva = new Materia();
        $materiaNueva->nombre = $nombreMateria;
        $materiaNueva->userid = \Auth::user()->id;
        //dd($request->all());
        $materiaNueva->save();
        foreach ($horarios as $horario){
            $horarioMateria = new Horario();
            $horarioMateria->diasemana = $horario['dia'];
            $horarioMateria->horainicio = $horario['hora_inicio'];
            $horarioMateria->horafin    = $horario['hora_fin'];
            $horarioMateria->materiaid = $materiaNueva->id;
            $horarioMateria->save();
        }
        return response()->json(true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \PicFoto\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function show(Materia $materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \PicFoto\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function edit(Materia $materia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \PicFoto\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Materia $materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \PicFoto\Materia  $materia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materia $materia)
    {
        //
    }
}
