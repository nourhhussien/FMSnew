<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;





class Profile extends Model 
{
       protected $fillable = ["phone" , "address" , "site" , "brithday" , "gender"]; // Specify which fields can be mass assigned
     
    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}
