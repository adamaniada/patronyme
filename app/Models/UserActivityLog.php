<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserActivityLog extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'ip_address', 'devise', 'mac_address','logout_at'];
}
