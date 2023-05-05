<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;


    public function user()
    {
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Models\User');
    }

    public function bar()
    {
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('App\Models\Bar');
    }

    # Get image details for images on slides 2,3,4

    public function s2_image()
    {
        return $this->belongsTo('App\Models\Image', 's2_image_id', 'id');
    }
    public function s3_image()
    {
        return $this->belongsTo('App\Models\Image', 's3_image_id', 'id');
    }
    public function s4_image()
    {
        return $this->belongsTo('App\Models\Image', 's4_image_id', 'id');
    }


}