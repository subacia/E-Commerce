<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model{
    protected $table = 'category';
    protected $primary = 'c_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
