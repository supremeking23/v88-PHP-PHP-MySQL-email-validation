<?php 
session_start();
require_once("connection.php");



$query = "SELECT * FROM emails ORDER BY id DESC";
$run_query = fetch_all($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <style>

        body {
            font-family:helvetica;
        }
        body * {
            outline:1px dashed red;
        }

        .container {
            width:920px;
            margin:0 auto;
            /* overflow-y:scroll */
        }

        .container div {
            background:green;
            padding:30px;
            color:#fff;
        }

        .container div span {
            font-style:italic;
            font-weight:bold;
        }

        h1 {
            border-bottom:1px solid #bbb;
            padding-bottom:10px;
        }

        table {
            margin:0 auto;
            border-spacing: 15px;
        }

        table td {
            padding:10px
        }
    </style>
</head>
<body>
    <div class="container">
       
        <?php 
        if(isset($_SESSION["email"])){ ?>
            <div>
                The email address you entered (<span><?= $_SESSION["email"];?></span>) is a VALID emaid address ! Ariga Thanks;
            </div>
       <?php }
        ?>

        <h1>Email Addresses Entered:</h1>

        <table>
            <?php foreach($run_query as $record):
                $date = date_create($record["created_at"]);
                $format_date = date_format($date,"F/d/Y, h:i:s a");
            ?>
            <tr>
                <td><?= $record["email"] ?></td>
                <td><?= $format_date ?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </div>

   
    
</body>
</html>

<?php 
session_destroy();
?>