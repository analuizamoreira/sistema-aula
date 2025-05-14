<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';
 
// captura a acao dos dados
$acao = $_REQUEST['acao'];
$id = $_REQUEST['id'];
 
// validacao
switch ($acao) {
    case 'excluir':
        // MONTA O SQL
        $sqli = "DELETE  FROM cargos WHERE CargoID = ".$id;
        // EXECUTA O SQL
        mysqli_query($conn,$sqli);
       
        break;
    case 'salvar':
        $nome = $_POST['nome'];
        $tetosalarial = $_POST['tetosalarial'];
        if (!empty($id)){
            $sql = "UPDATE cargos SET Nome = '$nome', TetoSalarial = $tetosalarial WHERE CargoID = $id";
        } else {
            $sql = "INSERT INTO cargos (Nome,TetoSalarial) VALUES('{$nome}',{$tetosalarial});";
        }
        mysqli_query($conn,$sql);
 
        break;
    default:
        # code...
        break;
}
// REDIRECIONA PARA PAGINA
header('Location: ../lista-cargos.php');
 
?>