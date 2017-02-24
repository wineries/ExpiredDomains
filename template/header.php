<?php

echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>' . $env['NAME'] . '</title>
<link href="/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<style>
html,
body{
    margin: 0px;
    padding: 0px;
    background: #F5F5F5;
}
header{
    background: #F5F5F5;
    padding: 15px 0px;
}
header h1{
    margin: 0px;
    color: #0275d8;
    font-weight: 400;
}
nav{
    background: #83a9ff;
}
nav ul{
    margin: 0px;
    padding: 0px;
    list-style: none;
}
nav ul li{
    float: left;
    display: inline-block;
}
nav ul li a{
    display: block;
    padding: 10px 15px;
    color: white;
}
nav ul li a:hover,
nav ul li.active a:hover{
    background: #657fbd;
    text-decoration: none;
    color: white;
}
nav ul li.active a{
    background: #7d98d6;
}
#page{
    background: white;
    padding: 15px 0px;
}
footer{
    background: #F5F5F5;
    padding: 15px 0px;
}
footer p{
    margin: 0px;
    text-align: center;
}
header #ax{
    float: right;
    width: 468px;
    height: 68px;
    background: #f3f3f3;
}
</style>
</head>
<body>
<header>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-6">
            <h1>' . $env['NAME'] . '</h1>
        </div>
        <div class="hidden-xs hidden-sm col-md-7 col-lg-6"">
            <div id="ax"></div>
        </div>
    </div>
</div>
</header>
<nav>
    <div class="container">
        <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="/download">Download</a></li>
        </ul>
    </div>
</nav>
<div id="page">
<div class="container">' . "\n";