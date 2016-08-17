<?php

use Cradle\I18n\Timezone;

return function($date, $options) {
    $settings = cradle('global')->config('settings');
    $timezone = new Timezone($settings['server_timezone'], $date);
    $offset = $timezone->getOffset();
    return $timezone->toRelative(time() - $offset);
};
