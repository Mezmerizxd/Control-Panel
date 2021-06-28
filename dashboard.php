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
    <link rel="stylesheet" href="style/navigation.css">
    <title>Dashboard</title>
</head>
<body>
    

    <ul class="navigation">
        <li><a href="/" data-link>Dashboard</a></li>
        <li><a href="/link2" data-link>Link2</a></li>
        <li><a href="/link3" data-link>Link3</a></li>
        <li><a onclick="logout()">Logout</a></li>
    </ul>

    <script type="module" src="/static/js/index.js"></script>
    <script>
        function logout(){
            location.replace("api/api-logout.php")
        }
    </script>
</body>
</html>
<?php }else{header("Location: authenticate.php");} ?>