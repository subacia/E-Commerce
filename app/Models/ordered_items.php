<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ordered_items extends Model{
    protected $table = 'ordered_items';
    protected $primary = 'id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
