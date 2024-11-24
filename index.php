<?php

//Recebendo dados do formulario
 
session_start();
if (isset($_SESSION['cd_cliente'])) {
  $id =  $_SESSION['cd_cliente'];
  }
 
$nome = $_POST['nome'];
$setor = $_POST['setor'];
$login = $_POST['login'];
$senha = $_POST['senha'];
 
//Inserindo dados no banco
 
include 'conexao.php';
 
//Dados para inserir os dados
$insert = "INSERT INTO tb_produto VALUES (NULL,'$nome','$setor','$login','$senha', $id )";
 
//inserindo os dados no banco de dados utilizando a função mysqli
$query = mysqli_query($conexao, $insert);
 
echo "Inserido com Sucesso";

//Recebendo dados do formulario
 
$nome = $_POST['login'];
$senha = $_POST['senha'];
 
//incluindo arquivo de conexão
include 'conexao.php';
 
//selecionar os dados no banco de dados
$select = "SELECT * FROM tb_user WHERE login = '$nome'";
 
$query = mysqli_query($conexao,$select);
 
$result =  mysqli_fetch_array($query);
 
//Dados do banco armazenado na variavel
$name_banco = $result['login'];
$senha_banco =  $result['senha'];
$id_usuario  = $result['id_usuario'];
 
 
 
//Comparanção para acessar o sistema
if ($nome == $name_banco  &&  $senha == $senha_banco) {
   
    session_start();
    $_SESSION['id_usuario'] = $id_usuario ;
    header('location: C_cliente.php');
 
  }else{
 
  echo "<script>alert('Usuário Invalido'); history.back();</script>";
 
 }
?>