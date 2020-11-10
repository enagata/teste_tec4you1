<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class pecas extends Model
{
    use HasFactory, Notifiable;
    protected $table = "pecas";
    public $timestamps = false;
    protected $fillable = [
        'id_pecas',
        'nome_Pecas',
        'id_Marca',
        'id_Veiculo',
    ];
}
