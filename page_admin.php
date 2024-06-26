<?php
session_start();
include 'component_nav.php';
include 'component_hlava.php';
include 'database_connect.php';
include 'functions.php';

?>


<div class="subpage-wrapper">
    <h1 class="subpage-title">ADMIN</h1>
</div>

<div class="container">
    <form method="post" action="page_admin.php">
            <label class="filtrLabel" for="userName">Jmeno:</label>
            <input type="text" class="filtrInput" id="userName" name="userName">
            <label class="filtrLabel" for="orderZbozi">Zbozi:</label>
            <input class="filtrInput" type="text" id="orderZbozi" name="orderZbozi">
            <button class="filtrButton" type="submit" class="">Filtr</button>
    </form>
</div>

    <?php


    $conn = connectDatabase();

    if(isset($_POST['userName']) || isset($_POST['orderZbozi']))
    {
        $userName = $_POST['userName'];
        $orderZbozi = $_POST['orderZbozi'];
        getAllOrders($conn, $userName, $orderZbozi);
    }
    else
    {
        $userName = "";
        $orderZbozi = "";
        getAllOrders($conn, $userName, $orderZbozi);
    }

    if(isset($_POST['eraseOrder']))
    {
        $id = $_POST['eraseOrder'];
        deleteOrder($id);
    }else{
        echo "Neco se nepovedlo";
    }
    

    ?>




</body>
</html>
