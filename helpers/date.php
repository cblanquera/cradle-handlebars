<?php

return function($time, $format, $options) {
    return date($format, strtotime($time));
};
