<?php
$env = array();
if(file_exists(__DIR__ . '/../env.json')){
    $env = json_decode(file_get_contents(__DIR__ . '/../env.json'), true);
}

if(
    (!isset($env['ID'])) || (!isset($env['NAME']))
){
    echo 'ENV:ID and ENV:NAME missing.';
    exit();
    die();
}

require_once(__DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . '/settings.php');
require_once(__DIR__ . '/functions.php');

date_default_timezone_set($settings['timezone']);