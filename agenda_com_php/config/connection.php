<?php

  $host = "localhost";
  $user = "vitor";
  $password = "12345";
  $db = "agenda";

  try {
    
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $password);

    // Ativar o modo de erros
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  } catch(PDOException $e) {
    // erro na conexão
    $erro = $e->getMessage();
    echo "Erro: $erro";
  }

 