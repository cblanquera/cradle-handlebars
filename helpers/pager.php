<?php

return function($total, $range, $options) {
    if($range == 0) {
        return '';
    }

    $show = 10;
    $start = 0;

    if(isset($_GET['start']) && is_numeric($_GET['start'])) {
        $start = $_GET['start'];
    }

    $pages     = ceil($total / $range);
    $page     = floor($start / $range) + 1;

    $min     = $page - $show;
    $max     = $page + $show;

    if($min < 1) {
        $min = 1;
    }

    if($max > $pages) {
        $max = $pages;
    }

    //if no pages
    if($pages <= 1) {
        return $options['inverse']();
    }

    $buffer = array();

    for($i = $min; $i <= $max; $i++) {
        $_GET['start'] = ($i -1) * $range;

        $buffer[] = $options['fn'](array(
            'href'    => http_build_query($_GET),
            'active'  => $i == $page,
            'page'    => $i
        ));
    }

    return implode('', $buffer);
};
