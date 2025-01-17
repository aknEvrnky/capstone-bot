<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    /** @use HasFactory<\Database\Factories\AdvisorFactory> */
    use HasFactory;

    protected $fillable = ['name'];
}
