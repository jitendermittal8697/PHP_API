<?php
    include 'functions.php';
    $url = "localhost/$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    if(isset($parts['query']))
    {
        parse_str($parts['query'], $query);
        //echo '<pre>'; print_r($query); echo '</pre>';
    }

    if(!isset($query))
    {
        $content = deleteAllObject();
        echo '<pre>'; print_r($content); echo '</pre>';
    }
    else
    {
        $content = deleteObject($query['name']);
        echo '<pre>'; print_r($content); echo '</pre>';
    }
?> 