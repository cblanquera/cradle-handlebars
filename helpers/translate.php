<?php

return function($key) {
    $args = func_get_args();
    $key = array_shift($args);
    $options = array_pop($args);

    $more = explode(' __ ', $options['fn']());

    foreach($more as $arg) {
        $args[] = $arg;
    }

    foreach($args as $i => $arg) {
        if(is_null($arg)) {
            $args[$i] = '';
        }
    }

    return cradle('global')->translate((string) $key, $args);
};
