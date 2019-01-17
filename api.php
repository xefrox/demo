<?php

    define('DB_HOST','localhost');
    define('DB_USER','root');
    define('DB_PASS','myprol1nz');
    define('DB_NAME','testing');

    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

    if (mysqli_connect_errno()){
        die('Unable to Connect to Database ' . mysqli_connect_error());

    }

    $stmt = $conn->prepare("SELECT id, title, content FROM product_post");

    $stmt->execute();
    $stmt->bind_result($id,$title, $content);

    $product = array();

    while($stmt->fetch()){

        $temp = array();
        $temp['id'] = $id;
        $temp['title'] = $title;
        $temp['content'] = $content;


        array_push($product,$temp);


    }
    echo json_encode($product);


