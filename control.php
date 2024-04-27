<?php


    function path($path){
  
        
        if($path === "/"){
            include ("index.html");
        }
        
        if($path === "/facts"){
            $json_data = file_get_contents("data/data.json");
            $data = json_decode($json_data, true);
            header('content-type: application/json');
            return json_encode($data);
        }
        
        if(str_starts_with($path, "/facts/dogs")){
            // Fetch JSON from thee file
            $json_data = file_get_contents("data/dogfacts.json");
            $data = json_decode($json_data, true);

            // To check if theres an extra parameter for number of data to send
            $num = substr($path, 12);
            $response = [];
            if($num > 0){
                for ($i = 0; $i < $num; $i++){
                    $response[] = $data[rand(0, 200)]; 
                }
            }else{
                $response[] = $data[rand(0, 200)]; 
            }
            header("content-type: application/json");
            return json_encode($response, true);
        }
        
        if($path === "/ceevee"){
            header('Content-type: application/docx');
            return readfile("CavemanResume.docx");
        }
    }

   echo path($_SERVER["REQUEST_URI"]);

?>