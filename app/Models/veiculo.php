<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class veiculo extends Model
{
    use HasFactory, Notifiable;
    protected $table = "veiculo";
    public $timestamps = false;
    protected $fillable = [
        'id_Veiculo',
        'nome_Veiculo',
        'id_marca',
    ];

    //public function fkpecas()
    //{
    //    return $this->hasMany(pecas::class,"id_Veiculo" ,"id_Veiculo");
    //}
}
