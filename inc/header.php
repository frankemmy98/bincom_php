<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>css/style.css">
    <script type="text/javascript" src="../js/fetchPUResult.js"></script>
    <script type="text/javascript" src="../js/fetchLGAResult.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title><?php echo $pageTitle; ?></title>
</head>

<body>
    <main>
        <section class="banner">
            <a href="<?php echo BASE_URL; ?>">
                <h1> Welcome To The Election Results Viewer </h1>
            </a>

            <ul class="nav">
                <?php
                /* list items with the class of "on" to indicate the current section;
                those links 
                 * are underlined in the CSS to communicate that back to the site visitor;
                 * the selection variable is set i each individual file */
                ?>

                <li class="section1 <?php if ($section == "section1") {
                                        echo "on";
                                    } ?>"><a href="<?php echo BASE_URL; ?>">PU Results</a></li>
                <li class="section2 <?php if ($section == "section2") {
                                        echo "on";
                                    } ?>"><a href="<?php echo BASE_URL; ?>pages/section2.php">LGA Results</a></li>
                <li class="section3 <?php if ($section == "section3") {
                                        echo "on";
                                    } ?>"><a href="<?php echo BASE_URL; ?>pages/section3.php">Add PU Results</a></li>
            </ul>
        </section>