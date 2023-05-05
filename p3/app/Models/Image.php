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
            ->withTimestamps();
    }

    # static function returns 2 additional images (src only) based on increment (resets if at end)
    public static function otherImages($original_id)
    {
        $nextImage = $original_id + 1;

        $image1 = self::where('id', '=', $nextImage)->first();
        if(!$image1) {
            $nextImage = 1;
            $image1 = self::where('id', '=', $nextImage)->first();
        }
        $nextImage ++;
        $image2 = self::where('id', '=', $nextImage)->first();
        if(!$image2) {
            $nextImage = 1;
            $image2 = self::where('id', '=', $nextImage)->first();
        }

        return [$image1->src, $image2->src];
    }


}