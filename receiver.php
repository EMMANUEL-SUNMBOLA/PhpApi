<?php
    use Dotenv\Dotenv;
    require "vendor/autoload.php";

    $dotenv = Dotenv::createImmutable(__DIR__);

    $dotenv->load();


    ob_end_flush();

    $headers = getallheaders();
    if(($_SERVER["REQUEST_METHOD"] === "POST") && ($headers['CaveKey'] === $_ENV["API_KEY"])){
        $json_data = file_get_contents("php://input");
        $data = json_decode($json_data, true);

        if(isset($data)){
            echo "data received, processing ...\n";
            $file = fopen("post.txt", "a+");
            $key = $_ENV["API_KEY"];
            fwrite($file, $data["fact"] . " => " . $data["author"] . "\n");
            echo "Success";
            fclose($file);
        }else{
            echo "Data has issues";
        }


    }else{
        print_r($headers);
        echo $headers['CaveKey'];
    }

?>

