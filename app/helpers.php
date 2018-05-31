<?php

use Board\Entity\Adverts\Category;
use Board\Entity\Region;
use Board\Http\Router\AdvertsPath;

if (! function_exists('adverts_path')) {

    function adverts_path(?Region $region, ?Category $category)
    {
        return app()->make(AdvertsPath::class)
            ->withRegion($region)
            ->withCategory($category);
    }
}