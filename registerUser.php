<?php

include('connectdb.php');
session_start();

    $name = $_POST['name'];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $type = $_POST["type"];
    $password =  password_hash($_POST["password"], PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO user (name,email,phoneNumber,password,type) VALUES (?,?,?,?,?)");
    $stmt->bind_param("ssssi",$name,$email,$tel,$password,$type);
    $stmt->execute();

    if($stmt->errno == 1062){
            // por qué no se imprime ningún mensaje?

        $_SESSION['message'] = 'Usuario Existente';
        $_SESSION['message_type'] = 'warning';
        header('Location: signup.php');
    }else{
        $_SESSION['message'] = 'Usuario Registrado Correctamente';
        $_SESSION['message_type'] = 'success';
        header('Location: login.php');
    }

