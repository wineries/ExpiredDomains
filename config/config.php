<?php
$env = array();
if(file_exists(__DIR__ . '/../env.json')){
    $env = json_decode(file_get_contents(__DIR__ . '/../env.json'), true);
}
if(file_exists(__DIR__ . '/../env.example.json')){
    $envExample = json_decode(file_get_contents(__DIR__ . '/../env.json'), true);
    foreach($envExample as $name => $void){
        if((isset($_SERVER[$name])) && (!isset($env[$name]))){
            $env[$name] = $_SERVER[$name];
        }
    }
}

if(
    (!isset($env['ID'])) || (!isset($env['NAME']))
){
    echo 'ENV:ID and ENV:NAME missing.' . "\n";

    echo '$env' . "\n";
    print_r($env);
    echo "\n";

    echo '$envExample' . "\n";
    print_r($envExample);
    echo "\n";

    echo '$_SERVER' . "\n";
    print_r($_SERVER);
    echo "\n";

    exit();
    die();
}

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/settings.php');
require_once(__DIR__ . '/functions.php');

date_default_timezone_set($settings['timezone']);