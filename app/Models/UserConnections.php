<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserConnections extends Model
{
    protected $table = 'user_connections';
    protected $primaryKey = 'UID';
    use HasFactory;
}
