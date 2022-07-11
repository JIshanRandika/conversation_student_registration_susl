<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EligibleStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'nameWithInitials',
        'regNum',
        'indexNum',
        'faculty',
        'department',
        'degreeName'

    ];
}
