<?php
//Conexão
include_once '../Model/db_connect.php';
//Header
include_once '../Includes/header.php';
//Mensagem
include_once '../Includes/mensagem.php';

//Select
if (isset($_GET['id'])) {
  $id = mysqli_escape_string($connect, $_GET['id']);

  $sql = "SELECT * FROM comprados WHERE devedor = '$id' ";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);
}
?>

<!-- TABELA DE DÍVIDAS -->
<br>
<div class="row">
  <div class="col s12 m10 push-m1">
    <h4 class="light center blue-text">Lista de Produtos Comprados</h4>
    <table class="centered z-depth-2 white">
      <thead>
        <tr>
          <th>Data</th>
          <th>Produtos</th>
          <th>Quantidade Total</th>
        </tr>
      </thead>

      <tbody class="">
        <tr>
           <?php
              $sql3 = "SELECT * FROM comprados WHERE devedor = '$id'";
              $resultado3 = mysqli_query($connect, $sql3);
              while($dados3 = mysqli_fetch_array($resultado3)):
            ?>
          <td> <?php echo $dados3['data'] ?> </td>
          <td> <?php echo $dados3['produtos'] ?> </td>
          <td> <?php echo $dados3['quantidade'] ?> </td>
        <?php endwhile; ?>
        </tr>
      </tbody>
    </table>
    <br>
    <a href="../View/devedores.php" class="btn green" name="">Lista de Clientes</a>
  </div>
</div>



<?php
//Footer
  include_once '../Includes/footer.php';
?>