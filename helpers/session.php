<?php

 return function($key, $options) {
     if(!isset($_SESSION[$key])) {
         return $options['inverse']();
     }

     if(is_object($_SESSION[$key]) || is_array($_SESSION[$key])) {

         return $options['fn']((array) $_SESSION[$key]);
     }

     return $_SESSION[$key];
 };
 
