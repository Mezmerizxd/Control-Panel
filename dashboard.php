<?php 
session_start();
if($_SESSION["logged_in"] = true && isset($_SESSION["id"]) && isset($_SESSION["username"])){ ?>
<?php 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <title>Dashboard</title>
</head>
<body>
    <input type="button" value="Logout" onclick="logout()">
    <script>
        function logout(){
            location.replace("api/api-logout.php")
        }
    </script>
</body>
</html>
<?php }else{header("Location: authenticate.php");} ?>