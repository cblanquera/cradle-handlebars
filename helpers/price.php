<?php

return function($price, $options) {
    return number_format((float) $price, 2);
};
