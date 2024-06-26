<?php
include "component_hlava.php";
include "component_nav.php";
include "functions.php";
include "database_connect.php";
?>



<div class="wrapper">
		<h1 class="subpage-title">Register.</h1>
			<div class="form-wrapper">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

					<label class="label" for="name">Jmeno:</label>
					<input class="user_input" type="name" id="name" name="name" />

				 	<?php
					if (empty($_POST["name"])) {
						echo "<p class='infoMessage'> Vyplnte policko</p>";
					}
					?>
                    
					<label class="label" for="email">Email:</label>
					<input class="user_input" type="email" id="email" name="email" />
          
					<?php
					if (empty($_POST["email"])) {
						echo "<p class='infoMessage'> Vyplnte policko</p>";
					}
					?>
                    

          <label class="label" for="password">Heslo:</label>
					<input class="user_input" type="password" id="password" name="password" />
                    
					<?php
					if(empty($_POST["password"])){
						echo "<p class='infoMessage'> Vyplnte policko</p>";
					}
					?>

					<label class="label" for="password2">Znovu heslo:</label>
					<input class="user_input" type="password" id="password2" name="password2" />
                    
					<?php
					if (empty($_POST["password2"])) {
						echo "<p class='infoMessage'> Vyplnte policko</p>";
					}
					?>

          <label class="label" for="city">Mesto:</label>
					<input class="user_input" type="city" id="city" name="city" />
                    
					<?php
					if (empty($_POST["city"])) {
						echo "<p class='infoMessage'> Vyplnte policko</p>";
					}
					?>

          <label class="label" for="address">Adresa:</label>
					<input class="user_input" type="address" id="address" name="address" />
                    
					<?php
					if (empty($_POST["address"])) {
						echo "<p class='infoMessage'> Vyplnte policko</p>";
					}
					?>

          <label class="label" for="telephone">Telefon:</label>
					<input class="user_input" type="tel" id="telephone" name="telephone" />
                    
					<?php
					if (empty($_POST["telephone"])) {
						echo "<p class='infoMessage'> Vyplnte policko</p>";
					}
					?>

					<button class="contact-button" type="submit">Register</button>
					<a class="user_anchor" href="page_login.php">Jiz mam ucet!</a>
					<?php
					$inputs = array("name", "email", "password", "password2", "city", "address", "telephone");
					$filled = true;

					foreach ($inputs as $input) {
						if (empty($_POST[$input])) {
							$filled = false;
							break;
						}
					}

					if ($filled && $_SERVER["REQUEST_METHOD"] == "POST") {
							$conn = connectDatabase();
							registerUser($conn);
						}
				?>
				</form>
			</div>
		</div>
</body>
</html>