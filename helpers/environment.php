<?php

return function($value, $options) {
    $settings = cradle('global')->config('settings');

    if(isset($settings['environment']) && $settings['environment'] === $value) {
        return $options['fn']();
    }

    return $options['inverse']();
};
