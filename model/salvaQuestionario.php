<?php

include_once 'con.php';

class SalvaQuestionario extends Conexao {
     
    public function incluir($tabela, $dados) { 
		$pdo = parent::get_instance();
        $campos = implode(", ", array_keys($dados));
        $valores = ":".implode(", :", array_keys($dados));
        $sql = "INSERT INTO $tabela($campos) VALUES ($valores)";
        $statement = $pdo->prepare($sql);
        foreach($dados as $key => $valor) {
            $statement->bindValue(":$key", $valor, PDO::PARAM_STR);
        }
		$statement->execute();
    }

	public function exibeResultado() {
        $pdo = parent::get_instance();
        $sql = "SELECT distinct CONCAT(count(p1.id_curso)) AS TOTAL_ALUNO, p1.id_curso, p1.nome_aluno, p1.email, p1.cel,  p2.id_resposta FROM curso_gratis p1 INNER JOIN gabarito p2 WHERE p1.id_question1 = p2.id_question AND p1.id_resposta1 = p2.id_resposta OR p1.id_question2 = p2.id_question AND p1.id_resposta2 = p2.id_resposta OR p1.id_question3 = p2.id_question AND p1.id_resposta3 = p2.id_resposta OR p1.id_question4 = p2.id_question AND p1.id_resposta4 = p2.id_resposta OR p1.id_question5 = p2.id_question AND p1.id_resposta5 = p2.id_resposta OR p1.id_question6 = p2.id_question AND p1.id_resposta6 = p2.id_resposta OR p1.id_question7 = p2.id_question AND p1.id_resposta7 = p2.id_resposta GROUP BY p1.id_curso ORDER BY p1.id_curso DESC limit 1 ";
        $statement = $pdo->query($sql);
        $statement->execute();
        return $statement->fetchAll();
    }

 
		} 
 