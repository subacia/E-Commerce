<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model{
    protected $table = 'product';
    protected $primary = 'prod_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
