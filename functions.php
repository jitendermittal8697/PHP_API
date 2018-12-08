<?php


function readAllObject(){
    $str = file_get_contents('object.json');
    $json = json_decode($str, true);
    return $json;
}

function readObject($id){
    $str = file_get_contents('object.json');
    $json = json_decode($str, true);

    foreach($json as $ele){
        if(!strcmp($ele['name'], $id)){
            return $ele;
        }    
        
    }
}

function writeObject($content){
    $json = readAllObject();
    //$json = json_decode($str, true);
    //echo '<pre>'; print_r($json); echo '</pre>';
    
    $jsonLength  = count($json);
    $json[$jsonLength++] = $content;
    //echo '<pre>'; print_r($json); echo '</pre>';
    $json = json_encode($json);
    //echo '<pre>'; print_r($json); echo '</pre>';
    file_put_contents('object.json',$json);
}

function deleteAllObject(){
    $json = "[]";

    file_put_contents('object.json',$json);
    echo "Deleted All Files Successfully";
}

function deleteObject($id){
    $json = readAllObject();
    $i=0;
    foreach($json as $ele){
        if(!strcmp($ele['name'],$id))
        {
            unset($json[$i]);
            //echo "Current Record Found";
        }
        $i++;
    }

    $json = json_encode($json);
    
    file_put_contents('object.json',$json);
    echo "Deleted File Successfully";
}

function modifyObject($id,$property,$value){
    $str = file_get_contents('object.json');
    $json = json_decode($str, true);
    $i=0;
    foreach($json as $ele){
        if(!strcmp($ele['name'], $id)){
            if(!isset($ele[$property]))
            {
                echo "Object Doesn't Have Any Property Field";
                exit();
            }    
            else
                $json[$i][$property] = $value;
        }
        $i++;       
    }
    //echo '<pre>'; print_r($json); echo '</pre>';
        
    $json = json_encode($json);
    file_put_contents('object.json',$json);
    echo "Modified File Successfully";

}

function checkDuplicacy($id){
    $str = file_get_contents('object.json');
    $json = json_decode($str, true);
    $returnvalue = false;
    foreach($json as $ele){
        if(!strcmp($ele['name'], $id)){
            $returnvalue = true;
        } 
    }
    return $returnvalue;
}
?>