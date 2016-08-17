<?php

return function($key, $options) {
    if(!isset($_SERVER[$key])) {
        return $options['inverse']();
    }

    if(is_object($_SERVER[$key]) || is_array($_SERVER[$key])) {
        return $options['fn']((array) $_SERVER[$key]);
    }

    return $_SERVER[$key];
};
