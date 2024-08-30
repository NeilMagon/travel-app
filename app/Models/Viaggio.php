<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Viaggio extends Model
{
    use HasFactory;

    protected $fillable = ['nome_viaggio', 'descrizione', 'data_inizio', 'data_fine'];

    public function giornate()
    {
        return $this->hasMany(Giornata::class);
    }
}
