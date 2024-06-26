<?php
	session_start();
	include "component_hlava.php";
	include "component_nav.php";
	include "functions.php";
	include "database_connect.php";
	$conn = connectDatabase();
?>
		<div class="subpage-wrapper">
			<h1 class="subpage-title">FOOD.</h1>
		</div>
		<div class="product-wrapper">
			<?php
				getFoods($conn);

				if(isset($_POST['addToCart'])){
					if(isset($_SESSION['name_user'])){
						$productID = $_POST['id'];
						$productPrice = $_POST['price'];
						$idZakaznik = $_SESSION['id_user'];
						$datumObjednavky = date("Y-m-d");
						
				
					 $conn = connectDatabase();
				
						$sql = "INSERT INTO objednavky(idZakaznik, idZbozi, cena, DatumObjednavky) VALUES ($idZakaznik, $productID, $productPrice, '$datumObjednavky')";
				
						if($conn->query($sql) === TRUE){
							echo "<script> alert('Uspesne objednane.'); </script>";
						}else{
							echo "<p class='errMessage'>Produkt se nepodařilo přidat do košíku.</p>";
						}
					}else{
						echo "<script> alert('Pre objednanie se musíte přihlásit.'); </script>";
					}
				}
			?>
		</div>
	</body>
</html>
