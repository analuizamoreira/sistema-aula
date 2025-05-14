<?php
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
$cargo = array(
  'CargoId' => '',
  'Nome' => '',
  'TetoSalarial' => ''
);
 
if (!empty($_GET['id'])){
  $result = mysqli_query($conn, "SELECT * FROM cargos WHERE CargoID = {$_GET['id']}");
  $cargo = mysqli_fetch_assoc($result) ?: $cargo;
}
?>
 
  <main>
 
       <!-- Telas CRUD -->
   <div id="cargos" class="tela">
    <form class="crud-form" action="./action/cargos.php" method="post">
      <input type="hidden" name="acao" value="salvar">
      <input type="hidden" name="id" value="<?php echo $cargo['CargoID']; ?>">
      <h2><?php echo empty ($cargo['CargoID']) ? 'Cadastro' : 'Edição' ?> de Cargos</h2>
      <input type="text" name="nome" placeholder="Nome do Cargo" value="<?php echo $cargo['Nome']; ?>" required>
      <input type="number" name="tetosalarial" placeholder="Teto Salarial" value="<?php echo $cargo['TetoSalarial'];?>" required>
      <button type="submit">Salvar</button>
    </form>
  </div>
 
 
 
   
  </main>
 
  <?php
  // include dos arquivox
  include_once './include/footer.php';
  ?>