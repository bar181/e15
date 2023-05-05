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
        $bar->image_id = $newBarData->image_id;
        $bar->share = isset($newBarData->share) ? 1 : 0;
        $bar->save();

        # Set up any results that might be needed from this action

        $this->results = new stdClass();
        $this->results->bar = $bar;
        $this->results->slug = $bar->slug;

    }

}