<?php
require_once('includes/class.phpmailer.php');
require_once('includes/class.smtp.php');
require_once('includes/helpers.php');

if (is_post() && is_valid()) {
  $sent = send_email();
} else {
  $sent = false;
  clear_invalid();
}
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STORM</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Lakki+Reddy|Playfair+Display:400,700italic' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <?php //debug_post() ?>

    <?php if ($sent): ?>
      <header>
        <img class="thanks-text" src="images/text.png">
        <img class="clouds clouds-left"src="images/clouds_left.png">
        <img id="logo" src="images/thanks.png">
        <img class="clouds clouds-right" src="images/clouds_right.png">
      </header>
      <div class="thanks">
        <p>We'll be in touch in the blink of an eye.</p>
      </div>
    <?php else: ?>
      <header>
        <img class="clouds clouds-left"src="images/clouds_left.png">
        <img id="logo" src="images/logo.png">
        <img class="clouds clouds-right" src="images/clouds_right.png">
      </header>
      <main>
        <div class="rain"></div>
        <div class="form-wrapper">
          <?php require_once('includes/form.php'); ?>
        </div>
        <div class="bottom-spacer">
          <img class="waveback" src="images/waveback.png">
          <img class="explosion" src="images/water_explosion.png">
          <img class="whale" src="images/whale.png">
          <img class="wavemedium" src="images/wavemedium.png">
          <img class="wavefront" src="images/wavefront.png">
          <img class="boat" src="images/boat.png">
        </div>
        <div class="waves"></div>
      </main>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.21/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.ui.min.js"></script>
    <script src="js/storm.js"></script>
  </body>
</html>
