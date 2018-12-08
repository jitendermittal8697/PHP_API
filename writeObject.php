<?php

    include 'functions.php';
    $url = "localhost/$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
    
    if(isset($parts['query']))
    {
        parse_str($parts['query'], $query);
        //echo '<pre>'; print_r($query); echo '</pre>';
        if(!isset($query['name']))
        {
            echo "ERR!! No name Parameter found !!!";
            exit();
        }
        else if(checkDuplicacy($query['name']))
        {
            echo "Opps!! Duplicate Entry Found !!! Try Another Name!!!";
            exit();            
        }
        else
        {
            writeObject($query);
            exit();
        }
    }
    else
    {
        echo "Enter The Object To Write Into The Database";
    }



?>