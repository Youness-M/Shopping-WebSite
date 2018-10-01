<?php

function sqlinjectioncheck($input){

    $input1=str_replace(array('"','+','\'','%','!','?'),'',$input);

    return $input1;

}