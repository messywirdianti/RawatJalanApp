<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apoteker extends Model
{
    use HasFactory;

    protected $table = 'apoteker';

    protected $primaryKey = 'idApoteker';

    protected $fillable = [
        'idApoteker',
        'namaApoteker',
        'jekel',
        'email',
        'noHp',
    ];
}
