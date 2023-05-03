<?php

namespace App\Actions\Bar;

use App\Models\Bar;
use stdClass;

class StoreNewBar
{
    public $results;

    public function __construct($newBarData)
    {

        # Do the action
        $bar = new Bar();
        $bar->user_id = $newBarData->user_id;
        $bar->name = $newBarData->name;
        $bar->slug = $newBarData->slug;
        $bar->topic = $newBarData->topic;
        $bar->share = isset($newBarData->share) ? 1 : 0;
        $bar->title1 = $newBarData->title1;
        $bar->image1 = $newBarData->image1;
        $bar->title2 = $newBarData->title2;
        $bar->content2 = $newBarData->content2;
        $bar->image2 = $newBarData->image2;
        $bar->save();

        # Set up any results that might be needed from this action

        $this->results = new stdClass();
        $this->results->bar = $bar;
        $this->results->slug = $bar->slug;

    }
}