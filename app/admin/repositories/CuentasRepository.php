<?php
namespace App\admin\repositories;

use App\Usuario;
use Eloquent;

class CuentasRepository 
{
    function __construct()
    {
		new Eloquent();
    }

    public function store($data)
    {
        extract($data);
        $existeUsuario = Usuario::where('email',$email)->first();
        
        if(!$existeUsuario)
        {
            $usuario = new Usuario;
            $usuario->name = $name;
            $usuario->password = password_hash($password, PASSWORD_DEFAULT);
            $usuario->email = $email;
            $usuario->role = $role;
            $usuario->created_at = date('Y-m-d H:i:s');
            $usuario->updated_at = date('Y-m-d H:i:s');
            //$pensionado = Pensionado::create($data);

            if( $usuario->save())
            {
                return $usuario->id;
            }
            else
            {
                return 'Error al guardar datos de usuario';
            }
        }
        else
        {
            return 'El usuario de banco de sangre ya tiene cuenta.';
        }
    }

    public function show($id)
    {

    }

    public function update($id,$data)
    {

    }

    public function destroy($id)
    {

    }
}