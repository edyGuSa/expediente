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
use Carbon\Carbon;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = User::where('is_admin',false)->get();
        return view('consultas.index',compact('pacientes'));
    }

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

    public function getExpediente($id_user){
        $paciente = User::where('id',$id_user)->get()->first();
        $edad = Carbon::createFromFormat('d/m/Y',$paciente->fecha_nacimiento)->age;
        $paciente['edad'] = $edad;
        
        $peso = Peso::where('paciente_id',$id_user)->get()->last();
        $estatura = Estatura::where('paciente_id',$id_user)->get()->last();
        if(!empty($peso)){
            $paciente['peso'] = $peso->peso;
        }
        if(!empty($estatura)){
            $paciente['altura'] = $estatura->estatura;
        }
        if(!empty($peso) && !empty($estatura)){
            $paciente['imc'] = $estatura->imc;   
        }
        $consultas = Consulta::where('paciente_id',$id_user)->get();

        return view('consultas.expediente',compact('paciente','consultas')); 
    }

    public function storeConsulta(Request $request, $id_user){
        $consulta = new Consulta([
            'paciente_id'   => $id_user,
            'notas_medicas' => $request->input('notas_medicas'),
            'medicación'    => $request->input('medicación'),
            'diagnostico'   => $request->input('diagnostico')
        ]);

        $peso = new Peso([
            'paciente_id'    => $id_user,
            'peso'           => $request->input('peso'),
            'fecha_registro' => Carbon::now()->format('d/m/Y')
        ]);

        $presion = new Presion([
            'paciente_id'    => $id_user,
            'precion'        => $request->input('presion'),
            'fecha_registro' => Carbon::now()
        ]);

        $altura = new Estatura([
            'paciente_id'    => $id_user,
            'estatura'       => $request->input('estatura'),
            'fecha_registro' => Carbon::now()
        ]);

        $consulta->save();
        $peso->save();
        $altura->save();
        $presion->save();
    }

    public function getChartData($id_user){
        $presion = Presion::where('paciente_id',$id_user)->get();
        $peso    = Peso::where('paciente_id',$id_user)->get();

        $pr_fe = array( );
        $pr_pr = array( );
        foreach ($presion as $value) {
            array_push($pr_fe, $value->fecha_registro);
            array_push($pr_pr, $value->precion); 
        }

        $ps_fe = array( );
        $ps_ps = array( );
        foreach ($peso as $value) {
            array_push($ps_fe, $value->fecha_registro);
            array_push($ps_ps, $value->peso); 
        }

        $data['pr_fe'] = $pr_fe;
        $data['pr_pr'] = $pr_pr;
        $data['ps_fe'] = $ps_fe;
        $data['ps_ps'] = $ps_ps;
        
        return $data;

    }
}
