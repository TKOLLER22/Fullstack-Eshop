<?php
/**
 * Funkcia na pripojenie k databáze.
 *
 * @return mysqli Pripojenie k databáze.
 * @throws Exception Ak sa nepodarí pripojiť k databáze.
 */
function connectDatabase(){
  $server = "127.0.0.1";
  $dbusername = "root";
  $dbpassword = '';
  $dbname = "kollert";
  $conn=mysqli_connect($server, $dbusername, $dbpassword, $dbname) or die("Server nebol pripojený");

    return $conn;
  }