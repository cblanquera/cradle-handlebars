<?php

return function($value1, $operator, $value2, $options) {
    $valid = false;

    switch (true) {
        case $operator == '=='   && $value1 == $value2:
        case $operator == '==='  && $value1 === $value2:
        case $operator == '!='   && $value1 != $value2:
        case $operator == '!=='  && $value1 !== $value2:
        case $operator == '<'    && $value1 < $value2:
        case $operator == '<='   && $value1 <= $value2:
        case $operator == '>'    && $value1 > $value2:
        case $operator == '>='   && $value1 >= $value2:
        case $operator == '&&'   && ($value1 && $value2):
        case $operator == '||'   && ($value1 || $value2):
            $valid = true;
            break;
    }

    if($valid) {
        return $options['fn']();
    }

    return $options['inverse']();
};
