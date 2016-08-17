<?php

return function($key, $array, $options) {
    if(is_string($array)) {
        $array = explode(',', $array);
    }

    if(isset($array[$key])) {
        return $array[$key];
    }

    return '';
};
