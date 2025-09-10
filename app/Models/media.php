<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class media extends Model
{
    public function user(){

    return $this->belongsTo('app/User');
}

}
