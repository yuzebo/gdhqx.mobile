<?php

function encryption($value, $type=0){
    $key = md5(C('ENCTYPTION_KEY'));

    if(!$type){
        return str_replace('=','',base64_encode($value ^ $key));
    }

    $value = base64_decode($value);
    return $value ^ $key;
}