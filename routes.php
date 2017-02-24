<?php
Route::get('/', function(){
    require_once($_SERVER['DOCUMENT_ROOT'] . '/index.php');
});

Route::get('/download', function($year){
    require_once($_SERVER['DOCUMENT_ROOT'] . '/download.php');
});
Route::get('/download/{year}-{month}-{day}.{format}', function($year){
    require_once($_SERVER['DOCUMENT_ROOT'] . '/download-file.php');
});

Route::get('/{year}', function($year){
    $_GET['year'] = $year;

    require_once($_SERVER['DOCUMENT_ROOT'] . '/year.php');
});

Route::get('/{year}/{month}', function($year, $month){
    $_GET['year'] = $year;
    $_GET['month'] = $month;

    require_once($_SERVER['DOCUMENT_ROOT'] . '/month.php');
});

Route::get('/{year}/{month}/{day}', function($year, $month, $day){
    $_GET['year'] = $year;
    $_GET['month'] = $month;
    $_GET['day'] = $day;

    require_once($_SERVER['DOCUMENT_ROOT'] . '/day.php');
});