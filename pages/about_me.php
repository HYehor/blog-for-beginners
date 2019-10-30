<?php
include_once '../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="Content-Type">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
    <title> <? echo $config['title']; ?> </title>
</head>
<body>
<div id="wrapper">

    <? include 'header.php'; ?>

    <div class="container">
        <div class="left">
            <div class="block-left">
                <div class="block-contant">
                    <div class="block-articles">
                        <div class="article">
                            <div class="article-image">
                                <img src="../images/bolt.jpg" alt="">
                            </div>
                            <div class="article-info">
                              <div>
                                  About me bla bla bla...
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <? include_once 'sidebar.php'; ?>

        <div class="clear"></div>
    </div>

    <? include_once 'footer.php'; ?>

</div>

</body>
</html>
