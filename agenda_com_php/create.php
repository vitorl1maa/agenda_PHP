<?php
  include_once("templates/header.php");
?>

 <div class="container">
    <?php include_once("templates/backbtn.html"); ?>
    <h1 id="main-title">Criar Contato</h1>
    <form action="<?= $BASE_URL ?>config/process.php" method="POST" id="create-form">
      <input type="hidden" name="type" value="create">
      <div class="form-group">
        <label for="name">Nome:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome" required>
      </div>
      <div class="form-group">
        <label for="cel">Celular:</label>
        <input type="text" class="form-control" id="cel" name="cel" placeholder="Digite o celular" required>
      </div>
      <div class="form-group">
        <label for="phone">Telefone:</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Digite o telefone">
      </div>
      <div class="form-group">
        <label for="observations">Observações:</label>
        <textarea type="text" class="form-control" id="observations" name="observations" placeholder="Insira as observações" rows="3"></textarea>
      </div>
      <button type="submit" id="btn-registration" class="btn btn-primary" >Cadastrar</button>
    </form>
 </div>
<?php
  include_once("templates/footer.php");
?>