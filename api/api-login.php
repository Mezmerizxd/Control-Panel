<?php 

// Included Php Files
include "sql/sql-accounts.php";
include "../vendor/functions.php";

session_start();

// Check if user entered authorization code nad if its correct
if(isset($_POST['number']) && $_SESSION["waiting_for_code"]){
    $code = $_POST["number"];  
    if($_SESSION["auth_code"] == $code){
        $_SESSION["logged_in"] = true;
        header("Location: ../authenticate.php");
    }else{
        echo "Incorrect Code!";
    }
}
// Else login and check if the login details are correct
elseif(isset($_POST['username']) && isset($_POST['password'])) {
   $username = validate($_POST['username']);
   $password = validate($_POST['password']);

   $password_v2 = md5($password);

   $sql = "SELECT * FROM accounts WHERE username='$username' AND password='$password_v2'";
   $result = mysqli_query($connect_sql_accounts, $sql);

   if (mysqli_num_rows($result) === 1) {
       $row = mysqli_fetch_assoc($result);

       if ($row['username'] === $username && $row['password'] === $password_v2) {
            $id = $row["id"];
            $six_digit_random_number = random_int(100000, 999999);
            $sql2 = "UPDATE accounts SET auth_code='$six_digit_random_number' WHERE id='$id'";
   	        mysqli_query($connect_sql_accounts, $sql2);

            $_SESSION["waiting_for_code"] = "waiting";
            $_SESSION["auth_code"] = $six_digit_random_number;
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            $_SESSION['ip'] = $row['ip'];

            $email = $row["email"];
            EmailAuthorizationCode("$email", "$six_digit_random_number");
               
            header("Location: ../authenticate.php");
            exit();
       }else{
           header("Location: ../authenticate.php?error=Incorect Username or Password");
           exit();
       }

   }else{
       header("Location: ../authenticate.php?error=Incorect User name or password");
       exit();
   }

}else{
    header("Location: ../authenticate.php");
    die();
}

