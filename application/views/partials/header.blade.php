<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>expenser</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" >
    <meta name="author" content="">
    {{ Asset::container('bootstrapper')->styles(); }}
    {{ Asset::container('bootstrapper')->scripts(); }}
    {{ HTML::script('chosen/chosen.jquery.js') }}
    {{ HTML::style('chosen/chosen.css') }}
    {{ HTML::script('laravel/js/scripts.js') }}
    {{ HTML::style('laravel/css/main.css') }}
</head>