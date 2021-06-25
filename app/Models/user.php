<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected $table = 'user';
    protected $primary = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
