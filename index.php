<?php
// core configuration
include_once "config/core.php";
// set page title
$page_title="Index";
// include login checker
$require_login=true;
include_once "login_checker.php";
// include page header HTML
include_once 'layout_head.php';

    // to prevent undefined index notice
    $action = isset($_GET['action']) ? $_GET['action'] : "";
    $uid = $_SESSION['user_id'];
    echo "<input id='index_in' type='hidden' value=".$uid.">";
    // content once logged in
    echo "<div class='col-md-12 upages' id='load'>";
        include_once "landing.php";
    echo "</div>";

// footer HTML and JavaScript codes
include 'layout_foot.php';
?>