<?php

// include("./private/database.php");

// function path($path){
//     if($path === "/"){
//         return "index.html";
//     }elseif($path === "/web"){
//         $json_data = file_get_contents("data.json");
//         $data = json_decode($json_data, true);
//         header('content-type: application/json');
//         return json_decode($data); 
//         if(str_contains($path, "/web/")){
//             $cutPos = strpos($path, "/web/");
//             $num = substr($path, $cutPos);
//             echo $num;
//         }

//     }elseif($path === "/ceevee"){
//         header('Content-type: application/docx');
//         return readfile("CavemanResume.docx");
//     }
// }



// $json_data = file_get_contents("data.json");
// $data = json_decode($json_data, true);
// if($_SERVER["REQUEST_URI"] === "/web"){
//     header('Content-Type: application/json');
//     return json_encode($data);
// }elseif($_SERVER["REQUEST_URI"] === "/ceevee"){
//     header('Content-type: application/docx');
//     // header('Content-Disposition: attachment; filename="downloaded.docx"');
//     return readfile("CavemanResume.docx");
// }

// path($_SERVER["REQUEST_URI"]);

// $path = "/web/50";
// if(str_contains($path, "/web/")){
//     $cutPos = strpos($path, "/web/");
//     $num = substr($path, 5);
//     echo $num;
// }

            $path = "/facts/dogs/50";
            // Fetch JSON from thee file
            $json_data = file_get_contents("data/dogfacts.json");
            $data = json_decode($json_data, true);

            // To check if theres an extra parameter for ammount of data to send
            $num = substr($path, 12);
            $response = [];
            if($num > 0){
                for ($i = 0; $i < $num; $i++){
                    $response[] = $data[rand(0, 200)]; 
                }
            }else{
                $response[] = $data[rand(0, 200)]; 
            }
            echo json_encode($response, true);


?>