<?php

namespace PicFoto;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed nombre
 * @property integer userid;
 * @property mixed id
 */
class Materia extends Model{
    //

    protected $fillable=[
        "nombre",'userid'
    ];
    public function notas(){
        return $this->hasMany('PicFoto\Nota','materiaid','id');
    }

    public function horario()
    {
        return $this->hasMany('PicFoto\Horario','materiaid','id')
            ->select('diasemana','horainicio','horafin');
    }
}

