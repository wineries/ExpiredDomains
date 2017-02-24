<?php

function cacheCall($url){
    $hash = md5($url);

    if(file_exists(__DIR__ . '/../cache/' . $hash)){
        $data = file_get_contents(__DIR__ . '/../cache/' . $hash);
        if($data == 'No data.'){
            $data = false;
        }
    }else{
        $data = @file_get_contents($url);

        if(!$data){
            $data = 'No data.';
            file_put_contents(__DIR__ . '/../cache/' . $hash, $data);
            $data = false;
        }else{
            file_put_contents(__DIR__ . '/../cache/' . $hash, $data);
        }        
    }

    return $data;
}