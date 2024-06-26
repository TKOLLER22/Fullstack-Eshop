<div class="nav" id="nav">
  <div class="navContent" id="navContent">
    <?php
    if (isset($_SESSION["name_user"])) {
      echo "<p class='loginStatusMsg'>". "Vitajte, " .  $_SESSION["name_user"]. "!" . "</p>";
    
    } else {
      echo "<p class='loginStatusMsg'>Neprihlasen</p>";
    
    };
    ?>
    <a class="nav_anchor" href="page_landing.php">HOME</a>
    <?php
    if (isset($_SESSION['name_user'])) {
      echo "<a class='nav_anchor' href='user_logout.php'>LOGOUT</a>";
      if ($_SESSION['email_user'] == 'admin@admin.cz') {
        echo "<a class='nav_anchor' href='page_admin.php'>ADMIN</a>";
      }
    }else{
      echo "<a class='nav_anchor' href='page_login.php'>LOGIN</a>";
    }
    
    ?>
    <a class="nav_anchor" href="page_food.php">FOOD</a>
    <a class="nav_anchor" href="page_suplements.php">SUPLEMENTS</a>
    <a class="nav_anchor" href="page_contactus.php">CONTACT US</a>
    
  </div>
</div>
<div class="navArrowButton" id="navArrowButton" onclick="navOpen()">
  &#x21e8;
</div>
