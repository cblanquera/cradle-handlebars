<?php

return function($key = null, $value = '') {
    $query = $_GET;

    if(is_scalar($key) && !is_null($key) && isset($query[$key])) {
        $query[$key] = $value;
        $query = http_build_query($query);
        parse_str(urldecode($query), $query);
    }

    return http_build_query($query);
};
