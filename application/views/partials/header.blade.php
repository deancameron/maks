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
    <script type="text/javascript">
    $(function() {
        $("a").tooltip();
    });
        
    </script>
    <style type="text/css">
        body{
            padding-top: 60px;
        }
    </style>

    {{ HTML::style('laravel/css/main.css') }}
</head>