<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class marca extends Model
{
    use HasFactory, Notifiable;
    protected $table = "marca";
    public $timestamps = false;
    protected $fillable = [
        'id_Marca',
        'nome_marca',
        ];
    //public function fkveiculos()
    //{
    //   return $this->hasMany(veiculo::class,"id_Marca" ,"id_Marca");
    //}
}
