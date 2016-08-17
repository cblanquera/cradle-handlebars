<?php

use Cradle\I18n\Timezone;

return function($date, $options) {
    $settings = cradle('global')->config('settings');

    $timezone = new Timezone($settings['server_timezone'], $date);
    $offset = $timezone->getOffset();
    $relative = $timezone->toRelative(time() - $offset);

    $relative = strtolower($relative);

    $relative = str_replace(array('from now', 'ago'), '', $relative);
    $relative = str_replace(array('seconds', 'second'), 's', $relative);
    $relative = str_replace(array('minutes', 'minute'), 'm', $relative);
    $relative = str_replace(array('hours', 'hour'), 'h', $relative);
    $relative = str_replace(array('days', 'day'), 'd', $relative);
    $relative = str_replace(array('weeks', 'week'), 'w', $relative);
    $relative = str_replace(array('months', 'month'), 'm', $relative);
    $relative = str_replace(array('years', 'year'), 'y', $relative);
    $relative = str_replace(array('yesterday', 'tomorrow'), '1d', $relative);

    $relative = str_replace(' ', '', $relative);

    if(!preg_match('/^[0-9]+[a-z]+$/', $relative)) {
        return '';
    }

    return $relative;
};
