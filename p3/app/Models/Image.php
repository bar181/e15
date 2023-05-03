<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany('App\Models\User')
            ->withTimestamps(); # Must be added to have Eloquent update the created_at/updated_at columns in a pivot table
    }



        /**
     *
     */
    public static function findByName($name)
    {
        return self::where('name', '=', $name)->first();
    }


}