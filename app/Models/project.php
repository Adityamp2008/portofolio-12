<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $table = 'projet';

      protected $fillable = [
        'nama_project',
        'deskripsi',
        'link_project',
        'foto',
    ];
}
