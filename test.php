<?php

// include("./private/database.php");

function path($path){
    if($path === "/"){
        return "index.html";
    }elseif($path === "/web"){
        $json_data = file_get_contents("data.json");
        $data = json_decode($json_data, true);
        header('content-type: application/json');
        return json_decode($data);
    }elseif($path === "/ceevee"){
        header('Content-type: application/docx');
        return readfile("CavemanResume.docx");
    }
}



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

path($_SERVER["REQUEST_URI"]);


?>