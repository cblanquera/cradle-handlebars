<?php

return function($key, $options) {
    $settings = cradle('global')->config('settings');

    if(!isset($settings[$key])) {
        return $options['inverse']();
    }

    if(is_object($settings[$key]) || is_array($settings[$key])) {
        return $options['fn']((array) $settings[$key]);
    }

    return $settings[$key];
};
