<?php
include_once("../config/url.php");
include_once("../config/conexao.php");


$id; // define a variavel global do botão icone de olho
if(!empty($_GET)){
    $id= $_GET["id"];
    }
    if(!empty($id))
    {
    $query= "SELECT * FROM contatos WHERE id= :id";
    $stmt= $conn->prepare($query);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $onlyContato= $stmt->fetch();// retorna apenas a linha referente ao id
    }
    else
    {
    $query= "SELECT * FROM contatos";
    $stmt= $conn->prepare($query);
    $stmt->execute();
    $AllContatos=[];
    $AllContatos= $stmt->fetchAll();// retorna todas as linhas para a variavel
    }

$data=$_POST;   // define as variaveis do formulario que usam POST  
if(!empty($data)){
if($data["type"]==="create")
{
try{
echo "criar dado";
$nome= $data["nome"];
$telefone= $data["fone"];
$obs= $data["observacao"];
$query= "INSERT INTO contatos (nome, telefone, observacao) VALUES (:nome, :telefone,
:obs)";
$stmt= $conn->prepare($query);
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":telefone", $telefone);
$stmt->bindParam(":obs", $obs);
$stmt->execute();
} catch(PDOException $e){
    $erro= $e->getMessage();
    echo $erro;
    }
    header("Location:".$BASE_URL."/../templates/index.php");
    }
    else if($data["type"]==="edit")
{
try{
$nome= $data["nome"];
$telefone= $data["fone"];
$obs= $data["observacao"];
$idPost= $data["id"];
$query= "UPDATE contatos SET
nome=:nome,
telefone=:telefone,
observacao=:obs
WHERE id=:idPost";
$stmt= $conn->prepare($query);
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":telefone", $telefone);
$stmt->bindParam(":obs", $obs);
$stmt->bindParam(":idPost", $idPost);
$stmt->execute();
} catch(PDOException $e){
$erro= $e->getMessage();
echo $erro;
}
header("Location:".$BASE_URL."/../templates/index.php");
}//end else if adicionar contato

else if($data["type"]==="edit")
{
try{
$nome= $data["nome"];
$telefone= $data["fone"];
$obs= $data["observacao"];
$idPost= $data["id"];
$query= "UPDATE contatos SET
nome=:nome,
telefone=:telefone,
observacao=:obs
WHERE id=:idPost";
$stmt= $conn->prepare($query);
$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":telefone", $telefone);
$stmt->bindParam(":obs", $obs);
$stmt->bindParam(":idPost", $idPost);
$stmt->execute();
} catch(PDOException $e){
$erro= $e->getMessage();
echo $erro;
}
header("Location:".$BASE_URL."/../templates/index.php");
}//end else if editar

else if($data["type"]==="delete")
{
try{
$idDelete= $data["id"];
$query= "DELETE FROM contatos WHERE id=:idDelete";
$stmt= $conn->prepare($query);
$stmt->bindParam(":idDelete", $idDelete);
$stmt->execute();
} catch(PDOException $e){
$erro= $e->getMessage();
echo $erro;
}
header("Location:".$BASE_URL."/../templates/index.php");
}//end if delete
    }//end post
    ?>