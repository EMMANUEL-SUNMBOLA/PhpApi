<?php

    // $json_data = file_get_contents("data.json");
    // $data = json_decode($json_data, true);
    // if($_SERVER["REQUEST_URI"] === "/web"){
    //     header('Content-Type: application/json');
    //     echo json_encode($data);
    // }elseif($_SERVER["REQUEST_URI"] === "/ceevee"){
    //     header('Content-type: application/docx');
    //     // header('Content-Disposition: attachment; filename="downloaded.docx"');
    //     readfile("CavemanResume.docx");
    // }

    function path($path){
  
        
        if($path === "/"){
            include ("index.html");
        }
        
        if($path === "/facts"){
            $json_data = file_get_contents("data/data.json");
            $data = json_decode($json_data, true);
            header('content-type: application/json');
            return json_encode($data);
        }elseif(($path === "/facts/dogs/$n") || ($path === "/facts/dogs")){
            if(isset($n)){
                $json_data = file_get_contents("data/dogfacts.json");
                $data = json_decode($json_data, true);
                $response = [];
                for($i = 0; $i <= $n; $i++){
                    $response[] = $data[rand(0, 200)];
                }
                header('content-type: application/json');
                return json_encode($response);
            }else{
                $json_data = file_get_contents("data/dogfacts.json");
                $data = json_decode($json_data, true);
                $response = array_rand($data, $n);
                header('content-type: application/json');
                return json_encode($response);
            }
        }
        
        if($path === "/ceevee"){
            header('Content-type: application/docx');
            return readfile("CavemanResume.docx");
        }
    }

   echo path($_SERVER["REQUEST_URI"]);

?>