<?php
include "functions.php";
include "component_hlava.php";
include "component_nav.php";
include "database_connect.php";
?>
    <div class="wrapper">
		<h1 class="subpage-title">Login.</h1>
			<div class="form-wrapper">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

					<label class="label" for="email">Email:</label>
					<input class="user_input"type="email" id="email" name="email">

					<?php
					if (empty($_POST["email"])) {
						echo "<p class='infoMessage'> Vyplnte policko</p>";
					}
					?>

					<label class="label" for="password">Heslo:</label>
					<input class="user_input" type="password" id="password" name="password">
					<?php
					if (empty($_POST["password"])) {
						echo "<p class='infoMessage'> Vyplnte policko</p>";
					}
					?>

					<button class="contact-button" type="submit">Login</button>
					<a class="user_anchor" href="page_register.php">Nemam jeste ucet!</a>
					<?php
					$inputs = array("email", "password");
					$filled = true;

					foreach ($inputs as $input) {
						if (empty($_POST[$input])) {
							$filled = false;
							break;
						}
					}

					if ($filled && $_SERVER["REQUEST_METHOD"] == "POST") {
							$conn = connectDatabase();
							loginUser($conn);
						}
				?>
				</form>
			</div>
		</div>
</body>
</html>