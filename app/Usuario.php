<?php 
namespace App;

use App\BancoPersonal;
use App\Institucion;
use App\LaboratorioPersonal;
use App\Ubch;
use \Illuminate\Database\Eloquent\Model;
 
class Usuario extends Model {
    protected $table = 'usuarios';

    //Ejemplo de definir campos
    //protected $fillable = ['username','email','password'];
	public function banco_personal()
	{
		return $this->hasOne(BancoPersonal::class, 'usuario_id','id');
	}

	public function laboratorio_personal()
	{
		return $this->hasOne(LaboratorioPersonal::class, 'usuario_id','id');
	}

	public function instituciones()
	{
		return $this->belongsTo(Institucion::class, 'id_instituciones','id_instituciones');
	}

	public function centro()
	{
		return $this->belongsTo(Ubch::class,'id_ubch','id_ubch');
	}
}

