<?php
    require_once realpath(__DIR__ . "/vendor/autoload.php");
    
    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__ );
    $dotenv -> load();


    ob_end_flush();
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        echo "data received \n";
        $json_data = file_get_contents("php://input");
        $data = json_decode($json_data, true);

        if(isset($data)){
            $file = fopen("post.txt", "a+");

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

