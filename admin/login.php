<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
//session_start();
 include('includes/header.php');
 include('includes/navbar.php');  
    require_once "db.php";
    //session_start();
    if (isset($_POST['Enrollnment_No'])) {
       $Enroll =$_POST['Enrollnment_No'];
       $email =$_POST['Email']; 
        $password =$_POST['Password'];
        $query = "SELECT * FROM `student_registration` WHERE Enrollnment_No='$Enroll' AND Email='$email'
                     AND Password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['Enrollnment_No'] = $Enroll;
		   echo"<div class='form'>
                  <h3>Yor are Succesfully login.</h3><br/>
                  <p class='link'>Click here to <a href='logout.php'>Logout</a></p>
                  </div>";
                  //header('Location:logout.php'); 
        } else {
            echo "<div class='form'>
                  <h3>Something wrong.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="Enrollnment_No" placeholder="Enrollnment No" autofocus="true"required/>
        <input type="text" class="login-input" name="Email" placeholder="Email Address" autofocus="true"required/>
        <input type="password" class="login-input" name="Password" placeholder="Password"required/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
		<p class="link"><a href="registration.php">New Registration</a></p>
		
  </form>
<?php
    }
    include('includes/scripts.php');
    include('includes/footer.php');
?>
</body>
</html>