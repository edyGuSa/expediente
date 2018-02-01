<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PacienteRequest;
use App\User;
use Response;

class UsuarioController extends Controller
{
    
    public function index(){
    	$pacientes = User::where('is_admin',false)->get();
    	return view('pacientes.index',compact('pacientes'));
    }

    public function create(){
    	$paciente = new User();
    	return view('pacientes.create',compact('paciente'));
    }

    public function store(PacienteRequest $request){
    	$username = strtolower ($request->input('name').str_random(5));
        $nuevo = new User([
            'name' 				=> $request->input('name'),
            'lastname'       	=> $request->input('lastname'), 
            'genero'      		=> $request->input('genero'),
            'tipo_sangre'       => $request->input('tipo_sangre'),
            'alergias'			=> $request->input('alergias'),
            'email'				=> $request->input('email'),
            'direccion'			=> $request->input('direccion'),
            'fecha_nacimiento' 	=> $request->input('fecha_nacimiento'),
            'is_admin'         	=> false,
            'password'         	=> bcrypt(strtolower ($request->input('name').str_random(5))),
            'username'         	=> $username,   
        ]); 

        $nuevo->save();

        $nuevo['edit']  = '<a href="'.route('pacientes.edit',['id'=>$nuevo->id]).'" class="edit">';
            $nuevo['edit'] .= '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>';
        $nuevo['edit'] .= '</a>';

        $nuevo['edit'] .='<span hidden>';
            $nuevo['edit'] .='<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>';
        $nuevo['edit'] .= '</span>';
        
        $nuevo['delete'] .= '<a href="'.route('pacientes.destroy',['id'=>$nuevo->id]).'" class="remove">';
            $nuevo['delete'] .='<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
        $nuevo['delete'] .='</a>';

        return Response::json($nuevo);
    }

    public function edit($id){
        $paciente = User::where('id',$id)->get()->first();
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(PacienteRequest $request, $id)
    {
        $nuevo = User::where('id',$id)->update([
            'name'              => $request->input('name'),
            'lastname'          => $request->input('lastname'), 
            'genero'            => $request->input('genero'),
            'tipo_sangre'       => $request->input('tipo_sangre'),
            'alergias'          => $request->input('alergias'),
            'email'             => $request->input('email'),
            'direccion'         => $request->input('direccion'),
            'fecha_nacimiento'  => $request->input('fecha_nacimiento'),
            'is_admin'          => false,
            'password'          => bcrypt(strtolower ($request->input('name'))),
            'username'          => strtolower ($request->input('name').str_random(5)),   
        ]); 

        $nuevo = User::where('id',$id)->get()->first();

        $nuevo['edit']  = '<a href="'.route('pacientes.edit',['id'=>$nuevo->id]).'" class="edit">';
            $nuevo['edit'] .= '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>';
        $nuevo['edit'] .= '</a>';

        $nuevo['edit'] .='<span hidden>';
            $nuevo['edit'] .='<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>';
        $nuevo['edit'] .= '</span>';
        
        $nuevo['delete'] .= '<a href="'.route('pacientes.destroy',['id'=>$nuevo->id]).'" class="remove">';
            $nuevo['delete'] .='<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
        $nuevo['delete'] .='</a>';

        return Response::json($nuevo);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return 1;
    }
}
