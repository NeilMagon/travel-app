<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tappa extends Model
{
    use HasFactory;

    protected $fillable = ['giornata_id', 'titolo', 'descrizione', 'immagine', 'latitudine', 'longitudine'];

    public function giornata()
    {
        return $this->belongsTo(Giornata::class);
    }

    public function note()
    {
        return $this->hasMany(Note::class);
    }

    public function valutazioni()
    {
        return $this->hasMany(Valutazione::class);
    }
}