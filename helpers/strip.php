<?php

return function($html, $options) {
    return strip_tags($html, '<p><b><em><i><strong><b><br><u><ul><li><ol>');
};
