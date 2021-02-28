<?php

use App\Models\Setting;

if (!function_exists('setting')) {

    /**
     * description
     *
     * @param null $default
     * @return
     */
    function setting($name, $default=null)
    {
        return Setting::getByname($name,$default);
    }
}
