<?php require_once "parts/header.php"; ?>
<?php
if (!isset($_SESSION["user_email"])) //not connected
{
  header('Location: login.php');
  exit;
}
?>
<?php require_once "alert_approve.php"; ?>
<h2> Welcome to our Website</h2>
<p>
  We are two young food lovers who are excited to share our passion with others.
  We invite you to join us in our adventure, to share, and find new recipes!
  Sign up, login, start the journey.
  Everyone are welcome, young, adults and even babies.
  Feel free to contact us any moment at our email:
  support@foodlovers.com
</p>

<div class="container marketing">

  <div class="row">
    <!-- Lemon pie -->
    <div class="col-lg-4">
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#777"></rect>
        <image width="140" height="140" xlink:href="images/lemonPiePic.jpeg" clip-path="url(#circleView)" />
      </svg>
      <h2>Lemon Pie</h2>
      <p>Lemon meringue pie is a type of dessert pie, consisting of a shortened pastry base filled with lemon curd and topped with meringue.</p>
      <p><b>coming soon!</b></p>
    </div>
    <!-- Shaksuka -->
    <div class="col-lg-4">
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#777"></rect>
        <image width="180" height="140" xlink:href="images/shak.jpg" clip-path="url(#circleView)" />
      </svg>

      <h2>Roei's Shaksuka</h2>
      <p> Dish of North African origin consisting of eggs poached or baked in a spicy tomato sauce with bell peppers and onion.</p>
      <p><b>coming soon!</b></p>
    </div>
    <div class="col-lg-4">
      <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Placeholder</title>
        <rect width="100%" height="100%" fill="#777">
        </rect>
        <image width="190" height="140" xlink:href="images/burger.jpg" clip-path="url(#circleView)" />
      </svg>

      <h2>Matan's Hamburger</h2>
      <p>A hamburger is a patty of ground meat, typically beef—placed inside a sliced bun or bread roll.
        condiments such as ketchup. </p>
      <p><b>coming soon!</b></p>
    </div>
  </div>

  <?php require_once "parts/footer.php"; ?>