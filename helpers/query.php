<?php

return function($key, $options) {
    if(!isset($_GET[$key])) {
        return $options['inverse']();
    }

    if(is_object($_GET[$key]) || is_array($_GET[$key])) {
        return $options['fn']((array) $_GET[$key]);
    }

    return $_GET[$key];
};
