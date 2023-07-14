<?php
    $username="root";
    $password="";
    $database=new PDO("mysql:host=localhost;dbname=Web2;charset=utf8;",$username,$password);
    if(isset($_POST['submit'])){
    $userrname=$database->prepare("SELECT *FROM registration WHERE Username=:Username ");
    $Username=$_POST['Username'];
    $userrname->bindParam("Username",$Username);
    $userrname->execute();
    if($userrname->rowCount()>0){
    echo'<div class="alert alert-danger" id="joo" role="alert">
        this Username is already used
    </div>' ;
    echo '<script>setTimeout(function() { document.getElementById("joo").remove(); }, 2000);</script>';
    }
    else{
    $FullName=$_POST['FullName'];  
   $Address=$_POST['Address'];
    $passwordcheck=$_POST['passwordcheck'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $date=$_POST['birthdate'];
    $Username=$_POST['Username'];
  
    include 'Upload.php' ; 
    
    $addData=$database->prepare("INSERT INTO registration(FullName,Username,email,Address,passwordcheck,image,password,phone,birthdate)
    VALUES('$FullName','$Username','$email','$Address','$passwordcheck','$newImageName','$password','$phone','$date')");
    if($addData->execute())
    {
        echo '<div class="alert alert-success" role="alert" id="myAlert">Successfully processed</div>';

        // Set a timer to remove the alert message after 3 seconds
        echo '<script>setTimeout(function() { document.getElementById("myAlert").remove(); }, 2000);</script>';
    }
    else{
    echo' <div class="alert alert-success" role="alert">
        something went wrong
    </div>';
    }

        }
            }
        
        ?>