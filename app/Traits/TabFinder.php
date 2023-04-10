<?php

namespace App\Traits;

trait TabFinder
{

    private function getTabTitleKeys()
    {
        return collect(request()->keys())->filter(
            fn ($key) => str_contains($key, "tab_title_") && $key
        );
    }

    private function getTabContentKeys()
    {
        return collect(request()->keys())->filter(
            fn ($key) => str_contains($key, "tab_content_") && $key
        );
    }

    private function connectTitleWithContent($titles, $contents)
    {

        $result = [];

        foreach ($titles as $title) {
            foreach ($contents as $content) {
                $content_id = str_replace("tab_content_", "", $content);
                $title_id = str_replace("tab_title_", "", $title);
                if ($content_id == $title_id) {
                    array_push(
                        $result,
                        [
                            "id" => $title_id,
                            "title" => $title,
                            "content" => $content
                        ]
                    );
                }
            }
        }
        return $result;
    }

    private function getTabIds()
    {
        $tab_ids = [];
        foreach ($this->getTabTitleKeys() as $tab_key) {
            array_push($tab_ids, request($tab_key));
        }
        return $tab_ids;
    }
}
