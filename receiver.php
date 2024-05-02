<?php
    
    require "vendor/autoload.php";
    

    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    // $dotenv = new Dotenv(__DIR__);
    $dotenv->load();


    ob_end_flush();
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        echo "data received \n";
        $json_data = file_get_contents("php://input");
        $data = json_decode($json_data, true);

        if(isset($data)){
            $file = fopen("post.txt", "a+");
            $key = getenv("API_KEY");
            // fwrite($file, $data["fact"] . " => " . $data["author"] . "\n");
    
            fclose($file);
            if($key){
                echo "data uploaded successfully \n" . $key;
            }
        }else{
            echo "Data has issues";
        }


    }else{
        echo "This endpoint only accepts POST requests";
    }

?>

