<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panic extends Model
{
    use HasFactory;

    protected $fillable = [

        'longtitude',
        'latitude',
        'panic_type',
        'details',
        'created_by'];
}
