<?php
namespace App\${modulo}\controllers;

use App\${modulo}\repositories\${controller}Repository as Repo;
use Controller,View,Token,Session,Arr,Message,Redirect,Permission,Url;

class ${controller} extends Controller
{
    function __construct()
    {
        parent::__construct();
        Permission::withRole('${modulo}');
    }

    // localhost/proyecto/modulo/principal
    public function index()
    {
        View::show('index');
    }

    // localhost/proyecto/modulo/principal/create
    public function create()
    {
        View::show('create');
    }

    // localhost/proyecto/modulo/principal/
    public function store()
    {
        //Guardar datos enviados de -create-
    }

    // localhost/proyecto/modulo/principal/ID
    public function show($id)
    {
        View::show('show', compact('id'));
    }

    // localhost/proyecto/modulo/principal/ID/edit
    public function edit($id)
    {
        View::show('edit' , compact('id'));
    }

    // localhost/proyecto/modulo/principal/ID/put
    public function update($id)
    {
        //Actualizar datos con el ID
    }

    // localhost/proyecto/modulo/principal/ID/delete
    public function destroy($id)
    {
        //Borrar un registro usando el ID
    }
}