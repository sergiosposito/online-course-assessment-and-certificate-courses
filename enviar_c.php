<head>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script  type='text/javascript' >
		$(window).load(function() {
			$('#myModal').modal('show');
		});
	</script>
 
</head>
 
<?php

	require_once 'model/salvaQuestionario.php'; 
	$obj = new SalvaQuestionario();
	 
	foreach($obj->exibeResultado() as $rst){
	 
	$total = 7;	
	$valor_descontado = ($rst['TOTAL_ALUNO'] / $total *  100);
 
  
	if($valor_descontado >= 100){
		$erro = ($total - $rst['TOTAL_ALUNO']);
		
		// Enviar E-mail
		
		$headers = "MIME-Version: 1.1\r\n";
	 
		$headers .= "From: ". $email ."\r\n";
		$headers .= "Return-Path:". $email ."\r\n";
		$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
		$conteudo="Aprovado - Nome: " .$rst['nome_aluno']. "\n E-mail: " .$rst['email']. "\n Tel: " .$rst['cel'];
		$recebedor = "cursosgratis@havokschool.com.br";
		$titulo = "Curso Gratis Maya Animação";
	?>
	
	 
	 
	 
	 <div id="myModal"class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" >
		<div class="modal-content">
		  <div class="modal-header">
			 
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p class="text-center text-center lead">Parabéns! Você foi aprovado em nossa avaliação. Clique no botão Ok para gerar seu certificado!</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
		  </div>
		</div>
	  </div>
	</div>
		<script>
$( "button" ).click(function() {
     $('section').css({display:"block" });
});
</script>
 



	<section style="display:none; width: 1498px;padding: 0 !important;margin: 0;">	 
	 <div style="width:1400px;">
			<img style="width: 1420px;" src="assets/img/img-l.png">
					<p style="position: relative;font-size: 56px;margin-top: -670px;font-family: Lato;color: #fff;margin-left: -90px !important;width: 100%;text-transform: uppercase;font-weight: bold;text-align: right;display: block;">

						<?=$rst['nome_aluno']?></p>
			
			<p style="position: absolute;font-size: 30px;margin-top: 302px;font-family: Lato;color: #fff;margin-left: 800px;text-transform: uppercase;font-weight: bold;">
				<?php echo date("d/m/Y"); ?>	</p>	

			<p style="position: absolute;font-size: 30px;margin-top: 239px;font-family: Lato;color: #fff;margin-left: 746px;text-transform: uppercase;font-weight: bold;">
				<?php echo date("Y"); ?>	</p>
		</div>
	</section>
 
	<?
	 $envio = mail($recebedor , $titulo, $conteudo, $headers) or die ("Erro!");
}
else{ 

	$headers = "MIME-Version: 1.1\r\n";
	$headers .= "From: ". $email ."\r\n";
	$headers .= "Return-Path:". $email ."\r\n";
	$headers .= "Content-type: text/plain; charset=UTF-8\r\n";
	$conteudo="REPROVADO - Nome: " .$rst['nome_aluno']. "\n E-mail: " .$rst['email']. "\n Tel: " .$rst['cel'];
	$recebedor = "cursosgratis@havokschool.com.br";
	$titulo = "Curso Gratis Maya Animação";
	
	 $envio = mail($recebedor , $titulo, $conteudo, $headers) or die ("Erro!");
	
	?>
	
	<div id="myModal"class="modal fade" tabindex="-1" role="dialog">
	  <div class="modal-dialog" >
		<div class="modal-content">
		  <div class="modal-header">
			 
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body">
			<p class="text-center text-center lead">Ahh que pena!!! Infelizmente você não atingiu a média para aprovação, mas você pode refazer a avaliação novamente ok! Boa sorte 😉</p>
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
		  </div>
		</div>
	  </div>
	</div>
	
	<script>
$( "button" ).click(function() {
  window.location = "https://havokschool.com.br/curso-gratis/maya-animacao/index.php";
});
</script>

	 
 
 
<?php	 
}
}

?>
