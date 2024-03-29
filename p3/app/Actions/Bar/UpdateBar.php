<?php

namespace App\Actions\Bar;

use App\Models\Bar;
use stdClass;

class UpdateBar
{
    public $results;

    public function __construct($bar, $newBarData)
    {

        # Updates existing
        $bar->name = $newBarData->name;
        $bar->slug = $newBarData->slug;
        $bar->topic = $newBarData->topic;
        $bar->share = isset($newBarData->share) ? 1 : 0;
        $bar->image1_id = $newBarData->image1_id;
        $bar->image2_id = $newBarData->image2_id;
        $bar->image3_id = $newBarData->image3_id;
        $bar->content1 = $newBarData->content1;
        $bar->content2 = $newBarData->content2;
        $bar->content3 = $newBarData->content3;

        $bar->save();

        # Results that might be needed from this action
        $this->results = new stdClass();
        $this->results->bar = $bar;
        $this->results->slug = $bar->slug;

    }

}