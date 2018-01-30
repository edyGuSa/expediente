<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

use App\User;
use App\Azucar;
use App\Consulta;
use App\Estatura;
use App\Peso;
use App\Presion;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = User::where('is_admin','0')->pluck('name','id');
        return view('consultas.index',compact('pacientes'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = User::where('id',$id)->get()->first();
        $paciente['peso']       = Peso::where('paciente_id',$id)->get()->last();
        $paciente['estatura']   = Estatura::where('paciente_id',$id)->get()->last();
        $paciente['glucosa']    = Azucar::where('paciente_id',$id)->get()->last();
        $table  = "";
        $table .=   '<tr>';
        $table .=       '<td>'.$paciente->name.'</td>';
        $table .=       '<td>'.$paciente->email.'</td>';
        $table .=       '<td>'.$paciente->alergias.'</td>';
        $table .=       '<td>'.$paciente->estatura.'</td>';
        $table .=       '<td>'.$paciente->peso.'</td>';
        $table .=       '<td>'.$paciente->glucosa.'</td>';
        $table .=       '<td>Edad</td>';
        $table .=   '</tr>';

        $data['table'] = $table;
        
        return Response::json($data);   
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

    public function newConsulta ($id){
        $paciente = User::where('id',$id)->get()->first();
        return view('consultas.consulta',compact('paciente'));
    }
}
