<?php

return function(array $list, $separator, $options) {
    foreach($list as $i => $variable) {
        if(is_string($variable)) {
            $list[$i] = "'".$variable."'";
            continue;
        }

        if(is_array($variable)) {
            $list[$i] = "'".implode(',', $variable)."'";
        }
    }

    return implode($separator, $list);
};
