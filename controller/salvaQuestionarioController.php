<?php
include_once '../model/con.php';
include_once '../model/salvaQuestionario.php';

$salva = new SalvaQuestionario();
$dados = $_POST;
if(isset($dados) && !empty($dados)) {
	$salva->incluir("curso_gratis", $dados);
	header("Location: ../enviar_c.php");
}



?>