
			<?php
				session_start();
				include "component_hlava.php";
				include "component_nav.php";
				include "functions.php";
				include "database_connect.php";
			?>
			<div class="wrapper">
				<h1 class="subpage-title">Kontaktujte nás.</h1>
				<div class="form-wrapper">
					<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
						<label class="label" for="name">Meno:</label>
						<input class="user_input" type="text" id="name" name="name" />
						<?php
						if (empty($_POST["name"])) {
							echo "<p class='infoMessage'>Vyplňte pole</p>";
						}
						?>

						<label class="label" for="email">Email:</label>
						<input class="user_input" type="email" id="email" name="email" />
						<?php
						if (empty($_POST["email"])) {
							echo "<p class='infoMessage'>Vyplňte pole</p>";
						}
						?>

						<label class="label" for="message">Správa:</label>
						<textarea id="message" name="message"></textarea>
						<?php
						if (empty($_POST["message"])) {
							echo "<p class='infoMessage'>Zanechajte správu</p>";
						}
						?>

						<button class="contact-button" type="submit">Odoslať</button>

						<?php
						$inputs = array("name", "email", "message");
						$filled = true;

						foreach ($inputs as $input) {
							if (empty($_POST[$input])) {
								$filled = false;
								break;
							}
						}

						if ($filled && $_SERVER["REQUEST_METHOD"] == "POST") {
							$conn = connectDatabase();
							sendMessage($conn);
						}
						?>
					</form>
				</div>
			</div>
			</body>
			</html>

