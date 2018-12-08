<?php

    include 'functions.php';
    $url = "localhost/$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    
    if(isset($parts['query']))
    {
        parse_str($parts['query'], $query);
        //echo '<pre>'; print_r($query); echo '</pre>';
        writeObject($query);
    }
    else
    {
        echo "Enter The Object To Write Into The Database";
    }



?>