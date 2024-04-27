<?php
    ob_end_flush();
    if($_SERVER["REQUEST_METHOD"] === "POST"){

        echo "data received \n";

        // echo "post[fact]" . $_POST["fact"];
        $file = fopen("post.txt", "a+");
        
        fwrite($file, $_POST["fact"] . "=>" . $_POST["author"]);
        fclose($file);

        echo "data uploaded successfully \n";

    }else{
        echo "This endpoint only accepts POST requests";
    }

?>

