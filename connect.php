<?php
 $name = $_POST['name'];
 $mail = $_POST['email'];
 $message = $_POST['message'];

 $conn = new mysqli('localhost','root','1234','mydb');
 if($conn->connect_error){
    die('Connection failed : '.$conn->connect_error);
 }else{
    $stmt = $conn->prepare("INSERT INTO mydb.order(mail, name, message)
     values(?,?,?)");

    $stmt->bind_param("sss",$mail, $name, $message);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    header ('Location: main.html'); 
 }
?>