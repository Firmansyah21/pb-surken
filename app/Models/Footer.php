<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    use HasFactory;

    protected $table = 'footer';
    protected $fillable = ['link_ig', 'link_fb', 'link_yt', 'link_tw', 'link_wa'];
}
