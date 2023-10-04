<?php

use Illuminate\Http\Request;

if(!function_exists('activeRoute')){
    function activeRoute($routes = []){
        $routeName = request()->route()->getName();
        return in_array($routeName,$routes);
    }
}