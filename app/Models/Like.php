<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
 use HasFactory;

    protected $fillable = ['post_id', 'user_id', 'ip_address'];
}
