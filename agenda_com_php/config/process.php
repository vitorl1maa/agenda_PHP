<?php

  session_start();

  include_once("connection.php");
  include_once("url.php");

  $data = $_POST;

  //MODIFICAÇÕES NO BANCO
  if(!empty($data)) {

    // CRIAR CONTATO
    if($data["type"] === "create") {
      $name = $data["name"];
      $cel = $data["cel"];
      $phone = $data["phone"];
      $observations = $data["observations"];

      $query = "INSERT INTO contacts (name, cel, phone, observations) VALUES (:name, :cel, :phone, :observations)";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":cel", $cel);
      $stmt->bindParam(":phone", $phone);
      $stmt->bindParam(":observations", $observations);

      try {
    
        $stmt->execute();
        $_SESSION["msg"] = "Contato criado com sucesso!";
    
    
      } catch(PDOException $e) {
        // erro na conexão
        $erro = $e->getMessage();
        echo "Erro: $erro";
      }


    } else if($data["type"] === "edit") {

        $name = $data["name"];
        $cel = $data["cel"];
        $phone = $data["phone"];
        $observations = $data["observations"];
        $id = $data["id"];

        $query = "UPDATE contacts
                  SET name = :name, cel = :cel, phone = :phone, observations = :observations
                  WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":cel", $cel);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);
        $stmt->bindParam(":id", $id);

        try {
      
          $stmt->execute();
          $_SESSION["msg"] = "Contato atualizado sucesso!";
      
      
        } catch(PDOException $e) {
          // erro na conexão
          $erro = $e->getMessage();
          echo "Erro: $erro";
        }

    } else if($data["type"] === "delete") {

      $id = $data["id"];

      $query = "DELETE FROM contacts WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":id", $id);


      try {
    
        $stmt->execute();
        $_SESSION["msg"] = "Contato removido com sucesso!";
    
    
      } catch(PDOException $e) {
        // erro na conexão
        $erro = $e->getMessage();
        echo "Erro: $erro";
      }

    }

    

    // Redirect HOME
    header("Location:" . $BASE_URL . "../index.php");

    //SELEÇÃO DE DADOS
    } else {
    $id;

    if(!empty($_GET)) {
      $id = $_GET["id"];
    }
  
    // Retorna o dado de um contato
    if(!empty($id)) {
      
      $query = "SELECT * FROM contacts WHERE id = :id";
  
      $stmt = $conn->prepare($query);
  
      $stmt->bindParam(":id", $id);
  
      $stmt->execute();
  
      $contact = $stmt->fetch();
  
      } else {
      // Retorna todos os contatos
      $contacts = [];
  
      $query = "SELECT * FROM contacts";
  
      $stmt = $conn->prepare($query);
  
      $stmt->execute();
  
      $contacts = $stmt->fetchAll();
  
    }

  }
  //
  $conn = null;



