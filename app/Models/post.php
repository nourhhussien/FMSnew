<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable = ['title', 'body']; // Specify which fields can be mass assigned

  
  
    public function user(){

    return $this->belongsTo('app/User');
}


}
