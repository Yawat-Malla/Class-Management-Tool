<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Login or Signup</title>
    <link rel = stylesheet href="../../css/login.css">

</head>

<body>
<table class="log-table">
    <form method = "POST" action=login.php> 
        <tr><td><input type="text" id = "username" placeholder= "Username or Email" name= "username"></td></tr>
        <tr><td><br><input type="password" id = "password" placeholder = "Password" name= "password" min=8></td></tr>
        <tr><td><br><button type="submit" class="loginbttn">Login</button></td></tr>
    </form>
        <tr><td><br><a href ="signup.php" class="signbttn">Sign up</a></td></tr>

</table>
<?php
include '../include/config.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){

    $records1="select * from teachers";
    $records2="select * from students";
    $records_result1 = mysqli_query($con,$records1);
    $records_result2 = mysqli_query($con,$records2);
    $found=false;
    $_SESSION['started']=false;

    while($row1=mysqli_fetch_assoc($records_result1)){
        if($row1['username']==$_POST['username'] && $row1['password']==$_POST['password']){
            $found=true;
            session_start();
            $_SESSION['username']=$row1['username'];
            $_SESSION['password']=$row1['password'];
            $_SESSION['user_id']=$row1['user_id'];
            $_SESSION['started']=true;

            header('location:../../index.php');
            break;
        }
        
}
    if($found==false){
    while($row2=mysqli_fetch_assoc($records_result2)){
        if($row2['username']==$_POST['username'] && $row2['password']==$_POST['password']){
            session_start();
            $_SESSION['username']=$row2['username'];
            $_SESSION['password']=$row2['password'];
            $_SESSION['user_id']=$row2['user_id'];
            $_SESSION['started']=true;
            header('location:../../index.php');
            break;
    }
    else{
        echo "Username or password incorrect.";
    }
}
}
}
    
?>
</body>
</html>