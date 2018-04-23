<?php

namespace PicFoto;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    //
    protected $fillable=[
        "titulo","contenido","materiaid"
    ];
    public function adjuntos(){
        return $this->hasMany('PicFoto\Adjunto','notaid','id');
    }
}