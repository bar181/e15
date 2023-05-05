<?php

namespace App\Actions\Bar;

use App\Models\Bar;
use stdClass;

class UpdateBar
{
    public $results;

    public function __construct($bar, $newBarData)
    {

        # Do the action
        $bar->name = $newBarData->name;
        $bar->slug = $newBarData->slug;
        $bar->topic = $newBarData->topic;
        $bar->share = isset($newBarData->share) ? 1 : 0;
        $bar->save();

        # Set up any results that might be needed from this action
        $this->results = new stdClass();
        $this->results->bar = $bar;
        $this->results->slug = $bar->slug;

    }

}