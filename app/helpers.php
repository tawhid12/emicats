<?php

use Illuminate\Support\Collection;

if (!function_exists('getTitles')) {
    function getTitles(Collection $collection)
    {
        return implode(', ', $collection->pluck('title')->toArray());
    }
}
