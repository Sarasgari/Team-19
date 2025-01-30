<?php 
    include("connectdb.php");

    if(isset($_POST['password'])){
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    } else{
        echo('invalid password');
    }

    if(isset($_POST['email'])){
        $email = $_POST['email'];
    } else{
        echo('invalid email');
    }

    try{
        $sth=$db->prepare("INSERT INTO accounts(email,password)
        VALUES(:email,:password)");
        $sth->bindParam(':password', $password, PDO::PARAM_STR, 128);
        $sth->bindParam(':email', $email, PDO::PARAM_STR, 128);

        $sth->execute();
    } catch(PDOException $ex){
        echo "Database error occured";
        echo $ex->getMessage();
    }
?>