<!DOCTYPE html>
<html>
<head>
    <style>
        body
        {
            background-color: aquamarine;
        }
    </style>
    <meta charset="UTF-8">
    <title>PHP Project</title>
</head>

<body>
<?php

//display errors in php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

include('header.php');

if(isset($_REQUEST["pageId"]) == false)
    $pageId = 1 ;
else
    $pageId = $_REQUEST["pageId"];

switch($pageId) {
    case 1:
        include('fileProcessor.php');
        break;

    case 2:
        include('fileView.php');
        break;

    default:;
        include('fileProcessor.php');
}

include('footer.php');
?>

</body>
</html