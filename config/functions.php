<?php

function cacheCall($url){
    $hash = md5($url);

    //error_log($hash . ' | ' . $url . ' | ' . '');

    if(file_exists(__DIR__ . '/../cache/' . $hash)){
        $data = file_get_contents(__DIR__ . '/../cache/' . $hash);
        if($data == 'No data.'){$data = false;}
        error_log($hash . ' | ' . $url . ' | ' . 'loading from cache');
    }else{
        $data = @file_get_contents($url);

        if(!$data){
            $data = 'No data.';
            file_put_contents(__DIR__ . '/../cache/' . $hash, $data);
            $data = false;
        }else{
            file_put_contents(__DIR__ . '/../cache/' . $hash, $data);
        }
        error_log($hash . ' | ' . $url . ' | ' . 'saving to cache');
    }

    return $data;
}