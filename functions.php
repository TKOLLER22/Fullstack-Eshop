<?php
/**
 * Function for sending a message.
 * 
 * This function is used to send a message using the POST method form.
 * It retrieves the values from the form (name, email, message) and saves them to the database.
 * If the message is successfully sent, it displays an information message.
 * In case of an error, it displays an error message with details.
 * 
 * @param $conn - database connection
 */
function sendMessage($conn){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $datum = date("Y-m-d H:i:s");
    $sql = "INSERT INTO kontakt (idKontakt, Meno, datum, email, Zprava) VALUES (null, '$name', '$datum', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
      $conn->close();
      echo "<p class='infoMessage'>Uspesne odeslano.</p>";
    } else {
      echo "<p class='errMessage'>Chyba: " . $sql . "<br>" . $conn->error . "</p>";
    }
  }
}

/**
 * Function for user login.
 * 
 * This function is used to log in a user using the POST method form.
 * It retrieves the values from the form (email, password) and compares them with the data in the database.
 * If the data is correct, it creates a session for the user and redirects them to the main page.
 * In case of an incorrect password, it displays an error message.
 * 
 * @param $conn - database connection
 */
function loginUser($conn){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hash_pass = md5($password);
  
    $sql = "SELECT * FROM zakaznik WHERE Email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();

      if ($hash_pass == $row["Heslo"]) {
        session_start();

        $_SESSION["id_user"] = $row["idZakaznik"];
        $_SESSION["name_user"] = $row["Meno"];
        $_SESSION["email_user"] = $row["Email"];
        $_SESSION["city_user"] = $row["Mesto"];
        $_SESSION["address_user"] = $row["Adresa"];
        $_SESSION["telephone_user"] = $row["TelefonneCislo"];
        echo "<p class='infoMessage'>Úspešne prihlásený.</p>";
        echo "<p class='infoMessage'>Vitajte " . $_SESSION["id_user"] . "</p>";

        sleep(2);
        header("Location: page_landing.php");

      } if ($hash_pass != $row["Heslo"]){
        echo "<p class='errMessage'>Nesprávne heslo.</p>";
      }
    }
  }
}

/**
 * Logs out the user.
 *
 * This function removes all variables stored in the session variable $_SESSION and destroys the session.
 */
function logoutUser(){
  session_start();
  session_unset();
  session_destroy();
}


/**
 * Function for user registration.
 * 
 * This function is used to register a new user using the POST method form.
 * It retrieves the values from the form (name, email, password, password confirmation, city, address, telephone) and saves them to the database.
 * It checks if the entered passwords match and if a user with the same email or telephone number already exists.
 * If the registration is successful, it displays an information message.
 * In case of an error, it displays an error message with details.
 * 
 * @param $conn - database connection
 */
function registerUser($conn){
  if($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $password2 = $_POST["password2"];
  $city = $_POST["city"];
  $address = $_POST["address"];
  $telephone = $_POST["telephone"];
  $passwordHash = md5($password);

  if ($password != $password2 ) {
    $message = "Heslá sa nezhodujú.";
    echo "<p class='infoMessage'>" . $message . "</p>";
  }else{
    $sqlEmailCheck = "SELECT * FROM zakaznik WHERE Email = '$email'";
    $telephoneCheck = "SELECT * FROM zakaznik WHERE TelefonneCislo = '$telephone'";
    $resultEmail = $conn->query($sqlEmailCheck);
    $resultTelephone = $conn->query($telephoneCheck);

  if ($resultEmail->num_rows > 0 || $resultTelephone->num_rows > 0) {
    $message = "Užívateľ s týmto emailom alebo číslom už existuje.";
    echo "<p class='errMessage'>" . $message . "</p>";
  }else{
    $sql = "INSERT INTO zakaznik (idZakaznik, Meno, Email, Heslo, Mesto, Adresa, TelefonneCislo) VALUES (null, '$name', '$email', '$passwordHash', '$city', '$address', '$telephone')";

    if ($conn->query($sql) === TRUE) {
    $conn->close();
    $message = "Úspešne zaregistrovaný.";
    echo "<p class='infoMessage'>" . $message . "</p>";
    } else {
    $message = "Chyba: " . $sql . "<br>" . $conn->error;
    echo "<p class='errMessage'>" . $message . "</p>";
    }
  }
  }
  }
}

/**
 * Function for getting supplements.
 * 
 * This function executes an SQL query to retrieve supplements from the zbozi table where druhZbozi is 2.
 * The result of the query is stored in the $result variable.
 * Then, each row of the result is iterated and information about the product is displayed if the quantity is greater than 0.
 * The product is displayed with an image, name, price, and a button for adding to the cart.
 * If there are no results, it displays the message "0 Results".
 * 
 * @param $conn - database connection
 */
function getSuplements($conn){
  $sql = "SELECT * FROM zbozi where druhZbozi = 2";
  $result = $conn->query($sql);
  $obrazky = array(" ","img/kureciPrsa.jpeg");

  $obrazky = array(" ",
  
  "img/fotky_upravene/Articular_malina.jpg",
  "img/fotky_upravene/Bigshock_berry.jpg",
  "img/fotky_upravene/Bigshock_exotic.jpg",
  "img/fotky_upravene/Bigshock_mango.jpg",
  "img/fotky_upravene/Bohemia_sunka.jpg",
  "img/fotky_upravene/Cheddar_syr.jpg",
  "img/fotky_upravene/Colagen_tycinka.jpg",
  "img/fotky_upravene/Debrecinka.jpg",
  "img/fotky_upravene/Debrecinske_parky.jpg",
  "img/fotky_upravene/Emmental_syr.jpg",
  "img/fotky_upravene/Enjoy_crystal.jpg",
  "img/fotky_upravene/Frankfurt_parky.jpg",
  "img/fotky_upravene/Gouda_syr.jpg",
  "img/fotky_upravene/Grand_karamel.jpg",
  "img/fotky_upravene/Grand_ovocna.jpg",
  "img/fotky_upravene/Infinity_tycinka.jpg",
  "img/fotky_upravene/JustWhey_kokos.jpg",
  "img/fotky_upravene/Kruti_sunka.jpg",
  "img/fotky_upravene/Kure_cele.jpg",
  "img/fotky_upravene/Kureci_stehna.jpg",
  "img/fotky_upravene/Mlete_hovadzie.jpg",
  "img/fotky_upravene/Mlete_kureci.jpg",
  "img/fotky_upravene/Mlete_veprove.jpg",
  "img/fotky_upravene/Monster_mango.jpg",
  "img/fotky_upravene/Psyllium.jpg",
  "img/fotky_upravene/Redbull_sugarfree.jpg",
  "img/fotky_upravene/Vajcia.jpg",
  "img/fotky_upravene/Veprova_sunka.jpg",
  "img/fotky_upravene/Viedenske_parky.jpg",
  "img/fotky_upravene/Zemiaky.jpg");

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      if($row["PocetKusov"] > 0){
        $productIndex = $row["idZbozi"];
        $productName = $row["Nazov"];
        $productPrice = $row["Cena"];

        echo "<div class='product'>";
          echo "<div class='product-frame'>";
            echo "<div class='product-image'>";
              echo"<img src=$obrazky[$productIndex] alt='Jedlo'>";
            echo "</div>";
            echo "<form class='product_form' method='post' action=?id=$row[idZbozi]>";
            echo "<p class='product-name'>$productName</p>";
              echo "<input type='hidden' name='name' value=$productName>";
              echo "<input type='hidden' name='id' value=$productIndex>";
            echo "<p class='product-price'>$productPrice Kc</p>";
              echo "<input type='hidden' name='price' value=$productPrice>";
              echo "<input type='submit' class='product-button' name='addToCart' value='Koupit'>";
            echo "</form>";
          echo "</div>";
        echo "</div>";
      }else{
        continue;
      }
    }
  } else {
    echo "<p>0 Výsledkov</p>";
  }
  $conn->close();

}


/**
 * Function for retrieving food items.
 * 
 * This function executes an SQL query to retrieve food items from the zbozi table where druhZbozi is 1.
 * The result of the query is stored in the $result variable.
 * Then, each row of the result is iterated and information about the product is displayed if the quantity is greater than 0.
 * The product is displayed with an image, name, price, and a button for adding to the cart.
 * If there are no results, it displays the message "0 Results".
 * 
 * @param $conn - database connection
 */
function getFoods($conn){
  $sql = "SELECT * FROM zbozi where druhZbozi = 1";
  $result = $conn->query($sql);
  $obrazky = array(" ",
  
  "img/fotky_upravene/Articular_malina.jpg",
  "img/fotky_upravene/Bigshock_berry.jpg",
  "img/fotky_upravene/Bigshock_exotic.jpg",
  "img/fotky_upravene/Bigshock_mango.jpg",
  "img/fotky_upravene/Bohemia_sunka.jpg",
  "img/fotky_upravene/Cheddar_syr.jpg",
  "img/fotky_upravene/Colagen_tycinka.jpg",
  "img/fotky_upravene/Debrecinka.jpg",
  "img/fotky_upravene/Debrecinske_parky.jpg",
  "img/fotky_upravene/Emmental_syr.jpg",
  "img/fotky_upravene/Enjoy_crystal.jpg",
  "img/fotky_upravene/Frankfurt_parky.jpg",
  "img/fotky_upravene/Gouda_syr.jpg",
  "img/fotky_upravene/Grand_karamel.jpg",
  "img/fotky_upravene/Grand_ovocna.jpg",
  "img/fotky_upravene/Infinity_tycinka.jpg",
  "img/fotky_upravene/JustWhey_kokos.jpg",
  "img/fotky_upravene/Kruti_sunka.jpg",
  "img/fotky_upravene/Kure_cele.jpg",
  "img/fotky_upravene/Kureci_stehna.jpg",
  "img/fotky_upravene/Mlete_hovadzie.jpg",
  "img/fotky_upravene/Mlete_kureci.jpg",
  "img/fotky_upravene/Mlete_veprove.jpg",
  "img/fotky_upravene/Monster_mango.jpg",
  "img/fotky_upravene/Psyllium.jpg",
  "img/fotky_upravene/Redbull_sugarfree.jpg",
  "img/fotky_upravene/Vajcia.jpg",
  "img/fotky_upravene/Veprova_sunka.jpg",
  "img/fotky_upravene/Viedenske_parky.jpg",
  "img/fotky_upravene/Zemiaky.jpg");

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      if($row["PocetKusov"] > 0){
        $productIndex = $row["idZbozi"];
        $productName = $row["Nazov"];
        $productPrice = $row["Cena"];

        echo "<div class='product'>";
          echo "<div class='product-frame'>";
            echo "<div class='product-image'>";
              echo"<img src=$obrazky[$productIndex] alt='Jedlo'>";
            echo "</div>";
            echo "<form class='product_form' method='post' action=?id=$row[idZbozi]>";
            echo "<p class='product-name'>$productName</p>";
              echo "<input type='hidden' name='name' value=$productName>";
              echo "<input type='hidden' name='id' value=$productIndex>";
            echo "<p class='product-price'>$productPrice Kc</p>";
              echo "<input type='hidden' name='price' value=$productPrice>";
              echo "<input type='submit' class='product-button' name='addToCart' value='Koupit'>";
            echo "</form>";
          echo "</div>";
        echo "</div>";
        
      }else{
        continue;
      }
    }
  } else {
    echo "<p>0 Výsledkov</p>";
  }

  $conn->close();

}

/**
 * Retrieves all orders from the database based on the provided filters.
 *
 * @param mysqli $conn The database connection object.
 * @param string $userName The name of the user to filter the orders by. (Optional)
 * @param string $orderZbozi The name of the product to filter the orders by. (Optional)
 * @return void
 */
function getAllOrders($conn, $userName, $orderZbozi){
  $sql = "SELECT 
  o.idObjednavky,
  o.DatumObjednavky,
  z.idZbozi,
  z.Nazov,
  z.Cena,
  zak.idZakaznik,
  zak.Meno,
  zak.Email,
  zak.Mesto,
  zak.Adresa,
  zak.TelefonneCislo
FROM 
  objednavky o 
INNER JOIN 
  zbozi z ON o.idZbozi = z.idZbozi 
INNER JOIN 
  zakaznik zak ON o.idZakaznik = zak.idZakaznik";

  if (!empty($userName)) {
    $sql .= " WHERE zak.Meno = '$userName'";
  }

  if (!empty($orderZbozi)) {
    if (!empty($userName)) {
      $sql .= " AND";
    } else {
      $sql .= " WHERE";
    }
    $sql .= " z.Nazov = '$orderZbozi'";
  }
  
  $result = $conn->query($sql);
  echo "<div class='order-wrapper'>";

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $orderID = $row["idObjednavky"];
      $orderDate = $row["DatumObjednavky"];
      $orderPrice = $row["Cena"];
      $orderUserID = $row["idZakaznik"];
      $idZbozi = $row["idZbozi"];
      $nameUser = $row["Meno"];
      $userEmail = $row["Email"];
      $userCity = $row["Mesto"];
      $userAddress = $row["Adresa"];
      $userTelephone = $row["TelefonneCislo"];
      $productName = $row["Nazov"];

      echo "<div class='order'>";
        echo "<p class='order-info'>ID objednavky: $orderID</p>";
        echo "<p class='order-info'>Datum: $orderDate</p>";
        echo "<hr>";
        echo "<p class='order-product'>ID produktu: $idZbozi</p>";
        echo "<p class='order-product'>Cena: $orderPrice Kc</p>";
        echo "<p class='order-product'>Produkt: $productName</p>";
        echo "<hr>";
        echo "<p class='order-user'>ID uzivatele: $orderUserID</p>";
        echo "<p class='order-user'>Meno: $nameUser</p>";
        echo "<p class='order-user'>Email: $userEmail</p>";
        echo "<p class='order-user'>Mesto: $userCity</p>";
        echo "<p class='order-user'>Adresa: $userAddress</p>";
        echo "<p class='order-user'>Telefonne cislo: $userTelephone</p>";
        echo "<form method='post' action=''>
                <input type='hidden' name='orderID' value='$orderID'>
                <button class='erase-order' type='submit' name='eraseOrder' value='$orderID'>Vymazat</button>
              </form>";
      echo "</div>";
    }
  } else {
    echo "<p>0 Výsledkov</p>";
  }

  echo "</div>";
  $conn->close();
}

function deleteOrder($id){
  $conn = connectDatabase();
  $sql = "DELETE FROM objednavky WHERE idObjednavky = $id";
  if ($conn->query($sql) === TRUE) {
    echo "<p class='infoMessage'>Objednavka vymazana.</p>";
  } else {
    echo "<p class='errMessage'>Chyba: " . $sql . "<br>" . $conn->error . "</p>";
  }
  $conn->close();
}



