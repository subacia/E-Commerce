<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model{
    protected $table = 'order_details';
    protected $primary = 'o_d_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
