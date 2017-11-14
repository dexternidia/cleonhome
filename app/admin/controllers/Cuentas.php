<?php
namespace App\admin\controllers;
use App\Institucion;
use App\Instituciones;
use App\Usuario;
use Carbon\Carbon;

class Cuentas
{
    function __construct()
    {
        Role('admin');
    }

    public function index()
    {
        $usuarios = Usuario::orderBy('id', 'DESC')->get();
        View(compact('usuarios'));
    }

    public function create()
    {
        $organismos = Institucion::all();
        View(compact('organismos'));
    }

    public function store()
    {
        extract($_POST);
        //Arr($_POST);
        $clave = password_hash($password, PASSWORD_DEFAULT);

        $usuario = new Usuario;
        $usuario->name = $name;
        $usuario->email = $email;
        $usuario->password = $clave;
        $usuario->role = $role;
        $usuario->id_instituciones = $id_instituciones;
        $usuario->id_municipio = $id_municipio;
        $usuario->id_parroquia = $id_parroquia;
        $usuario->id_control = 0;
        $usuario->created_at = Carbon::now();
        $usuario->updated_at = Carbon::now();
        $usuario->estatus = 0;
        
        if($usuario->save())
        {
            Success('cuentas','La cuenta fue creada');
        }
        else
        {
            Error('cuentas/create','Error al crear la cuenta.');
        }
    }

    public function show($id)
    {
        View(compact('id'));
    }

    public function edit($id)
    {
        View(compact('id'));
    }

    public function update($id)
    {

    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if($usuario->delete())
        {
            Success('cuentas','Cuenta borrada con exito.');
        }
        else
        {
            Error('cuentas/create','Error al borrar cuenta.');
        }
    }

    public function parroquiasCne()
    {
        extract($_GET);
        $parroquias = ParroquiaCne::where('id_municipio',$idMunicipio)->get();
        //var_dump($parroquias);
        echo "<option value=''>PARROQUIA</option>";
        echo "<option value=''></option>";
        foreach ($parroquias as $key => $parroquia) {
            echo '<option value="'.$parroquia->id_parroquia.'">'.$parroquia->nombre.'</option>';
        } 
    }
}