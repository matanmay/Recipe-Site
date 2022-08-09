<?php session_start(); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mystyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="javaScript/sorting.js"></script>
    <script src="javaScript/checkedbox.js"></script>
    <title>Food Lovers</title>
</head>

<body>
    <main class="container">
        <!--navigation tool-->
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <h1>Food Lovers</h1>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <?php if (isset($_SESSION["user_email"])) //connected
                { ?>
                    <li><a href="index.php" class="nav-link px-2 link-dark">Home</a></li>
                    <li><a href="recipes_page.php" class="nav-link px-2 link-dark">My Recipes</a></li>
                <?php
                }
                ?>
            </ul>

            <div class="col-md-3 text-end">
                <?php
                if (!isset($_SESSION["user_email"])) //not connected
                { ?>
                    <button type="button" class="btn btn-outline-primary me-2" onclick="location.href='login.php'">Login</button>
                    <button type="button" class="btn btn-primary" onclick="location.href='register.php'">Sign-up</button>
                <?php
                } else { ?>
                    <button type="button" class="btn btn-primary" onclick="location.href='logout.php'">Logout</button>
                <?php
                }
                ?>

            </div>
        </header>