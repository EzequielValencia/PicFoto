<?php

namespace PicFoto\Http\Controllers;

use Illuminate\Http\Request;
use PicFoto\User;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guardado=false;
        $usuario = User::where('email','=',$request->email)->get();
        try{
            if(count($usuario->toArray())==0) {
                $usuario = new User();
                $usuario->username = $request->username;
                $usuario->email = $request->email;
                $usuario->password = bcrypt($request->password);
                $usuario->status = true;
                $guardado = $usuario->save();
            }
        }catch (\Exception $exception){
            return response()->json(["error"=>$exception->getMessage(),"status"=>500]);
        }
        if($guardado===true){
            return response()->json(["mensaje"=>"Datos guardados correctamente","status"=>200]);
        }else{
            return response()->json(["mensaje"=>"Es posible que ya exista ese correo en nuestra base de datos","status"=>202]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
