<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    use HasFactory;


    public function users()
    {
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Models\User');
    }

        /**
     *
     */
    public static function findBySlug($slug)
    {
        return self::where('slug', '=', $slug)->first();
    }

    /**
     * Hypotehtical method to contrast the use of static vs. not
    */
    public function findShare()
    {
        return self::where('share', '=', '1')->get();
    }


}