<div class="kosik" id="kosik">
  <form class="kosikContent" id="kosikContent">
    <h2 class="kosikTitle">Košík</h2>
    <div class="Content">

		<?php
  
    if(isset($_SESSION['name_user'])){
      if(isset($_POST['addToCart'])){
        if(isset($_SESSION['kosik'])){
          $session_array_id = array_column($_SESSION['kosik'], "id");

          if(!in_array($_GET['id'], $session_array_id)){
            $session_array = array(
              'id' => $_GET['id'],
              "name" => $_POST['name'],
              "price" => $_POST['price']
            );

            $_SESSION['kosik'][] = $session_array;
          } 
        }else{
          $session_array = array(
            'id' => $_GET['id'],
            "name" => $_POST['name'],
            "price" => $_POST['price']
          );

          $_SESSION['kosik'][] = $session_array;
        }
      }
      $output = '';
      if(!empty($_SESSION['kosik'])){

        $total = 0;
        $output .= '

        <div class="kosikProducts">
        <form method="post" action="page_order.php">
        <table class="table">
          <tr class = "tr">
            <th class="th">ID</th>
            <th class="th">Název</th>
            <th class="th">Cena</th>
            <th class="th"></th>
          </tr>
        ';
        foreach($_SESSION['kosik'] as $key => $value){
          $output .= '
          <tr class = "tr">
            <td class = "td">'.$value['id'].'</td>
            <input type="hidden" name="id" value="'.$value['id'].'">
            <td class = "td">'.$value['name'].'</td>
            <input type="hidden" name="name" value="'.$value['name'].'">
            <td class = "td">'.$value['price'].'</td>
            <td class = "td"><a class="deleteFromCart" href="?action=delete&id='.$value['id'].'">Smazat</a></td>

          </tr>
          ';
          $total = $total + $value['price'];
        }
        $output .= '
        <tr class = "tr">
          <td class = "td">Celkem</td>
          <td class = "td"></td>
          <td class = "td">'.$total.'</td>
          <input type="hidden" name="total" value="'.$total.'">
          <td class = "td"><a class="deleteFromCart" href="?action=deleteAll">Vyprazdnit</td>
        </tr>
        ';
        $output .= '</table></div>';
        echo $output;
      }


      if(isset($_GET['action'])){
        if($_GET['action'] == 'delete'){
          foreach($_SESSION['kosik'] as $key => $value){
            if($value['id'] == $_GET['id']){
              unset($_SESSION['kosik'][$key]);

            }
          }
        }else if($_GET['action'] == 'deleteAll'){
          unset($_SESSION['kosik']);
        }
      }
    } else {
      echo "<div class='kosikProducts'>";
      echo "<p class='errMessage'>Prihlaste sa aby ste mohli objednat.</p>";
      echo "</div>";
    }
  
    ?>

    </div>
    <input type="submit" name="checkout" value="Objednat" class="checkoutButton">
  </form>
  </div>

  <?php
  if(isset($_POST['checkout']) && isset($_SESSION['kosik']) && !empty($_SESSION['kosik'])){
    $id_user = $_SESSION["id_user"];
    $datumObjednavky = date("d-m-Y");

    $conn = connectDatabase();
  
    $sql = "INSERT INTO objednavky(idZakaznik, idZbozi, cena, DatumObjednavky) VALUES ($id_user, $value[id], $value[price], $datumObjednavky)";
  
    if ($conn->query($sql) === TRUE) {
      $conn->close();
      echo "<p class='infoMessage'>Objednávka úspešne vytvorená.</p>";
    } else {
      echo "<p class='errMessage'>Chyba: Objednavka nevytvorena. </p>";
  
  
    }
  }
    ?>

</div>
<div class="kosikButton" id="kosikButton" onclick="kosikOpen()">
  &#x24;
</div>