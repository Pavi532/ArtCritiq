<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="jquery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/bootstrap.min.js"></script>
    <link href="fontawesome/css/all.css" rel="stylesheet">
    <script defer src="fontawesome/js/all.js"></script>
    <link rel="stylesheet" href="libs/css/style.css">

    <title><?php echo isset($page_title) ? strip_tags($page_title) : "ArtCritiq"; ?></title>
    <link rel="shortcut icon" href="ArtImages/favicon_io/favicon.ico" type="image/ico"/>
</head>
<body>    
    <?php
        // if given page title is 'Login', do not display the title
        if($page_title!="Login"){
        ?>
        <?php include_once 'navigation.php'; ?>
        <?php isset($page_title) ? $page_title : "ArtCritiq"; ?>
        <?php
        }
    ?>