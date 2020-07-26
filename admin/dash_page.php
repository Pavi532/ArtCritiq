<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body {
            width: 95%;
            height: 90vh;
            color: #fff;
            background: linear-gradient(-45deg, #00f3ff, #0e52b7, #9a1414, #ff0000);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }
        .DashLoad1{
            margin:0 auto;
            text-align: center;
            margin-top: 20%;
        }


    @keyframes gradientBG {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
    }
    </style>

</head>
<body>
    <?php
        session_start();
        // echo "Welcome: ".$_SESSION['uname'].""; 
    ?>
    <div class="DashLoad1">
        <img src="../ArtImages/ArtCritiqLogo.png" alt="ArtCritiq Logo">
        <h1 class='h2'>Dashboard</h1>
        <?php
            session_start();
            echo "<h4 style='text-align:center;'>Welcome : ".$_SESSION['uname']."</h4>"; 
        ?>
    </div>
</body>
</html>