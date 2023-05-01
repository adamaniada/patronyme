<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patronyme extends Model
{
    use SoftDeletes;

    protected $fillable = ['designation' ,'ethnie', 'origin', 'histoire', 'created_at', 'updated_at', 'deleted_at'];
}
