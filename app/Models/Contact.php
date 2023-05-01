<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    protected $fillable = ['nom' ,'tel' ,'email', 'subject', 'msg', 'status', 'created_at', 'updated_at', 'deleted_at'];
}
