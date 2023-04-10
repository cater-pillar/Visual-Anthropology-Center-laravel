<?php

namespace App\Traits;

use App\Models\Slide;
use App\Models\Gallery;


trait StoreImage
{
    // ALL THIS SHOULD BE REFACTORED

    private function storeImage(string $name, string $column)
    {
        return request()->file($column)->storeAs(
            'images/general',
            $column . '-' . str_replace(" ", "-", $name) . ".png"
        );
    }

    private function storeManyImages(Gallery $gallery, array $images)
    {
        foreach ($images as $index => $image) {
            $name = 'photo-' . str_replace(" ", "-", $gallery['title']) . $index . ".png";
            $gallery->slides()->save(
                new Slide(['photo' => $image->storeAs('images/general', $name)])
            );
        }
    }
}
