<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class datosModel extends Model
{

    protected $table = 'datos';

    //Aqui la llave primaria de la tabla
    protected $primarykey = 'id';
    //public $incrementing = false;
    public $timestamps = false;
    //
}
