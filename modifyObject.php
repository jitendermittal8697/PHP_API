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
        else if(!checkDuplicacy($query['name']))
        {
            echo "Opps!! No Entry Found !!! Enter Valid Name!!!";
            exit();            
        }
        else
        {
            if(!isset($query['name']) || !isset($query['property']) || !isset($query['value']))
                echo "query must have name, property and value";    
            else
            {
                modifyObject($query['name'],$query['property'],$query['value']);
                exit();
            }
        }
    }
    else
    {
        echo "Enter The Object To Modify Into The Database";
    }



?>