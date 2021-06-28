<?php session_start(); $_SESSION['waiting_for_code'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/main.css">
    <link rel="stylesheet" href="style/forms/basic-form.css">
    <title>Authenticate</title>
</head>
<body>
    <?php if($_SESSION["logged_in"] == true){ header("Location: dashboard.php"); } ?>

    <?php if(!$_SESSION["waiting_for_code"]){ ?>  
    <div class="container">
        <form method="POST" action="api/api-login.php" class="input-form">
            <div class="title">
                <h1>Login</h1>
                <p>Login to Control-Panel</p>
            </div>
            <div class="form-controls">
                <div class="inputs">
                    <label for="username">Username</label>
                    <input type="username" name="username" placeholder="Username" id="username">
                </div>
                <div class="inputs">
                    <label for="password">Password</label>
                    <input type="password" name="password" placeholder="Password" id="Password">
                </div>
                <input type="submit" value="Login">
            </div>
            <?php if (isset($_GET['error'])) { ?><p class="error"><?php echo $_GET['error']; ?></p><?php } ?>
            <?php if (isset($_GET['success'])) { ?> <p class="success"><?php echo $_GET['success']; ?></p><?php } ?>
        </form>
    </div>
    <?php }elseif($_SESSION["waiting_for_code"]){ ?>
        <div class="container">
            <form method="POST" action="api/api-login.php" class="input-form">
                <div class="title">
                    <h1>Enter Code</h1>
                    <p>Check your email for an authorization code.</p>
                </div>
                <div class="form-controls">
                    <input type="number" name="number">
                    <input type="submit" value="Confirm">
                </div>
            </form>
        </div>
    <?php } ?>  

</body>
</html>