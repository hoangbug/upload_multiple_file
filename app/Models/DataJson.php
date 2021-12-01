<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataJson extends Model
{
    protected $table = 'data_jsons';

    protected $primaryKey = 'id';

    public $timestamps = true;
}
