<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionAbout extends Model
{
    use HasFactory;

    protected $table = 'section_about';

    protected $fillable = [
        'title',
        'image',
        'description',
        'visi',
        'misi',
        'sejarah',
    ];
}
