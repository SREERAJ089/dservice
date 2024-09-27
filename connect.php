<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $address = $_POST['address'];
    $list = $_POST['list'];
    $tip = $_POST['tip'];
    $timing = $_POST['timing'];

    //Database Connection
    $conn = new mysqli('localhost','root','','delivery');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into orders(firstName, lastName, address, list, tip, timing)
        values(?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssis", $firstName, $lastName, $address, $list, $tip, $timing);
        $stmt->execute();
        echo "Order Successful";
        $stmt->close();
        $conn->close();
    }
    

?>