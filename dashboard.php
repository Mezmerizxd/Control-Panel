<?php 
session_start();
if($_SESSION["logged_in"] = true && isset($_SESSION["id"]) && isset($_SESSION["username"])){ ?>
<?php
// Navigation functions
if(isset($_GET["home"])){
    $selected_page = 0;
}else if(isset($_GET["managment"])){
    $selected_page = 1;
}else if(isset($_GET["settings"])){
    $selected_page = 2;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/navigation.css">
    <link rel="stylesheet" href="style/dashboard.css">
    <script src="https://kit.fontawesome.com/ebaab813a8.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>
    <ul class="navigation">
        <h1>DASHBOARD</h1>
        <div class="nav-container">
            <div class="nav-contents">
                <a href="?home"><li><i class="fas fa-house-user"></i>Home</li></a>
                <a href="?managment"><li><i class="fas fa-tasks"></i>Managment</li></a>
                <a href="?settings"><li><i class="fas fa-cog"></i>Settings</li></a>

            </div>
            <a id="logout" onclick="location.replace('api/api-logout.php')"><li><i class="fas fa-sign-out-alt"></i>Logout</li></a>
        </div>
    </ul>
    
    <div class="content">
        <!-- DASHBOARD -->
        <?php if($selected_page == 0){ ?>
            <h1>dashboard</h1>
        <?php } ?>

        <?php if($selected_page == 1){ ?>
            <div class="option-box">
                <div class="title">
                    <h1>Accounts</h1>
                </div>
                <input type="button" value="Manage">
            </div>
            <div class="option-box">
                <div class="title">
                    <h1>Licence Keys</h1>
                </div>
                <input type="button" value="Manage">
            </div>
        <?php } ?>
    </div>
</body>
</html>

<?php }else{header("Location: authenticate.php");} ?>