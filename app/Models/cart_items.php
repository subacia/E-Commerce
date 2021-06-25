<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart_items extends Model{
    protected $table = 'cart_items';
    protected $primary = 'c_i_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
