<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionHero extends Model
{
    use HasFactory;

    protected $table = 'section_heroe';

    protected $fillable = [
        'title',
        'image',
    ];
}
