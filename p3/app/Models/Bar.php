<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;


    public function user()
    {
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Models\User');
    }


    public static function findBySlug($slug)
    {
        return self::where('slug', '=', $slug)->first();
    }

     public static function findByUser($user_id, $limit = 20)
     {
         return self::orderBy('updated_at', "DESC")->where('user_id', '=', $user_id)->limit($limit)->get();
     }

public function image()
{
    return $this->belongsTo('App\Models\Image', 'image1_id', 'id');
}

     public static function findAllShareable()
     {
         return self::orderBy('updated_at', "DESC")->where('share', true)->limit(30)->get();
     }



}