<?php

return function($string, $separator, $options) {
    $list = explode($separator, $string);

    return $options['fn'](array('this' => $list));
};
