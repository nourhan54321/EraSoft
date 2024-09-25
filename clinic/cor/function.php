<?php


function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
    die;
}
function  url($path){
    //  echo dd(234243);
    return BASE_URL.$path;
  
}

function  redirect($path){
    header('location:'.url($path));
    die;
}