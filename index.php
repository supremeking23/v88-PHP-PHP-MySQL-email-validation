<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Validation with DB</title>
</head>

<style>
    body * {
        outline:1px dashed red;
    }

    body{
        font-family:helvetica;
    }

    .container {
        width:1200px;
        margin:0 auto;
        text-align:center;
    }

    form input{
        display:block;
        margin:10px auto;
        padding:10px;
        width:30%
    }

    .error{

    }
</style>
<body>
    <div class="container">
        <h2>Email Validation with DB</h2>
        <!-- display error here -->
        <?php if(isset($_SESSION["error_message"])){?>
        <h1><?= $_SESSION["error_message"];?></h1>
        <?php } ?>

        <form action="process.php" method="POST">
            <input type="text" name="email" id="email" placeholder="Enter email here...">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>

    
</body>
</html>

<?php 
session_destroy();
?>