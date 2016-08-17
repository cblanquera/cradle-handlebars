<?php

return function($value, $array, $options) {
    if(is_string($array)) {
        $array = explode(',', $array);
    }

    if(!is_array($array)) {
        return $options['inverse']();
    }

    if(in_array($value, $array)) {
        return $options['fn']();
    }

    return $options['inverse']();
};
