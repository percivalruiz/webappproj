<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    public $table = "user_details";

    public static function add($user, $first_name){
        $user_details = new UserDetails;
        $user_details->user_id = $user->id;
        $user_details->first_name = $first_name;
        $user_details->save();
        return $user_details;
    }
}
