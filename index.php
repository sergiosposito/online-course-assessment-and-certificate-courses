<?php
	$titulo = 'Curso Gratis - Maya Animação';
	include '../../head.php';
	require_once 'assets/Facebook/Facebook.php';
	require_once 'assets/Facebook/FacebookApp.php';
	require_once 'assets/Facebook/FacebookClient.php';
	require_once 'assets/Facebook/FacebookRequest.php';
	require_once 'assets/Facebook/FacebookResponse.php';
	require_once 'assets/Facebook/SignedRequest.php';
	require_once 'assets/Facebook/FacebookBatchResponse.php';
	require_once 'assets/Facebook/FacebookBatchRequest.php';
	require_once 'assets/Facebook/autoload.php';
 
	?>
	<link	rel="stylesheet" href="assets/css/style.css" />	
	
	<header class="header role-element leadstyle-container">
        <div class="header-wrapper" data-lead-id="header-wrapper-id">
            <div class="logo" data-lead-id="logo-id">
              <a href="https://havokschool.com.br/"><?php include '../../logo.php'; ?></a>
            </div>
			
            <div class="desc-wrapper role-element leadstyle-container">
                <div class="headline" data-lead-id="headline-id">
                    <p class="headline__title role-element leadstyle-text">Locomotion <br> Maya Animação</p>
                </div>
            </div>
        </div>
    </header>

	<section class="mb-5 ">
		<div class="bg-thumb">
				<div class="container">
					<h2 class="text-center text-white  display-4">Curso de introdução ao Autodesk Maya</h2>
					<h2 class="text-center lead text-white">Este curso foi desenvolvido para os iniciantes. As aulas foram gravadas na versão 2016 do software, por tanto algumas alterações, diferenças de layout, etc podem ocorrer caso você esteja praticando em versões mais recentes. Ao final deste curso você poderá fazer uma avaliação para emissão digital do certificado grátis. Bons estudos!</h2>
				
   <div class="container">
		<div id="example-basic">
			  <h3 class="btn btn-primary"> Apresentação e Interface</h3>			
				<section>
					<iframe width="100%" height="421" src="https://www.youtube.com/embed/vLn6dWbQ8aI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
				</section>
				
			 <h3  class="btn btn-primary"> Navegação de Interface e Manipulação de Objetos </h3>
				<section>
						<iframe width="100%" height="421" src="https://www.youtube.com/embed/5sztbSxpLfQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
				</section>
				
			 <h3  class="btn btn-primary">Preferencias, Ferramentas e Manipulação de Objetos</h3>
			<section>
						<iframe width="100%" height="421" src="https://www.youtube.com/embed/15i81rEb2T4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
			</section>       

			 <h3  class="btn btn-primary"> Animação Aula 01 </h3>
			<section>
					<iframe width="100%" height="421" src="https://www.youtube.com/embed/iiqRquG_1gE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
			</section>		

			 <h3  class="btn btn-primary">  Animação Aula 02 </h3>
			<section>
					<iframe width="100%" height="421" src="https://www.youtube.com/embed/MLIyw54EOZE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
			</section>			
			
			 <h3  class="btn btn-primary"> Animação Aula 03 </h3>
			<section>
					<iframe width="100%" height="421" src="https://www.youtube.com/embed/V6GZp_aAglM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
			</section>			
			
			 <h3  class="btn btn-primary"> Animação Aula Rendering </h3>
			<section>
					<iframe width="100%" height="421" src="https://www.youtube.com/embed/hbWMs6GAgfo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>	
			</section>	
  
			
			
				<? 
	
	if(!session_id()) {
		session_start();
	}
	$fb = new Facebook\Facebook([
		'app_id' => '827589814272297', // Replace {app-id} with your app id
		'app_secret' => '8830fbb9a89c83eb6311edfdd84c5ad7',
		'default_graph_version' => 'v3.2',
	]);

	$helper = $fb->getRedirectLoginHelper();

	$permissions = ['email']; // Optional permissions
	$loginUrl = $helper->getLoginUrl('https://havokschool.com.br/curso-gratis/maya-animacao/index.php', $permissions);
	if(empty($accessToken = $helper->getAccessToken())){
	?>	
	<h3 class="btn btn-primary">Avaliação</h3>
				<section>
					
	<div class="container">
		<div class="row justify-content-md-center">
					<p class="card-text">Cadastre-se<br> Para avaliação e emissão do seu certificado!</p>
		</div>
		<div class="row justify-content-md-center">
		<?php echo '<a style="background: #3b5998;color: #fff;padding: 10px;border-radius: 0.5em;letter-spacing: 1px;" href="' . htmlspecialchars($loginUrl) . '"><i style="vertical-align: middle;font-size: 25px;margin-right: 5px;margin-left: 5px;" class="fab fa-facebook-f"></i> Cadastrar com o Facebook!</a>';?>
		</div>
	</div>
	</section>	
	<?php
	}
	else{
	try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,email', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
	$user = $response->getGraphUser();

?>
<h3 class="btn btn-primary">Avaliação</h3>
<section style="overflow-y: scroll;">
					<form  action='controller/salvaQuestionarioController.php' method='post'>
						<h2 class="mb-4 text-center text-white">AVALIE SEUS CONHECIMENTOS</h2>
						<div class="col-md-12">	
							<div class="row">
							<div class="col-md-4">	
								<div class="form-group">
									<label>Digite Nome para Certificado</label>
									<input required class="form-control" placeholder="Digite Seu Nome: " type="text" value="<?=$user['name']?>" name="nome_aluno" id="name">
								</div> 
							</div>
							
							 <div class="col-md-4">	
								<div class="form-group">
									<label>Digite Seu Telefone</label>								
									<input required class="phone_with_ddd form-control" placeholder="Digite Seu Celular/Telefone: "  type="text" name="cel" >
								</div>
							</div>
							
							<div class="col-md-4">	
								<div class="form-group">							 
									<input required class="form-control" placeholder="Digite Seu E-mail: " type="hidden" value="<?=$user['email']?>" name="email" id="email">
								</div>	
							 </div>
							 
							</div>
						 </div>
							  
							<div class="questao-1">
							   <p>1 O Maya é um software da linha:</p>
							   <div class="form-check">
								  <input class="form-check-input" type="hidden" name="id_question1" id="id_question1" value="1">
								
 								  <input   required class="form-check-input" type="radio" name="id_resposta1" id="questao1" value="A">
								  <label class="form-check-label" for="exampleRadios1">
									A) Técnica
								  </label>
								</div>		

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta1" id="id_question1" value="B">
								  <label class="form-check-label" for="exampleRadios1">
									B) Artística
								  </label>
								</div>	

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta1" id="id_question1" value="C">
								  <label class="form-check-label" for="exampleRadios1">
									C) Construção 
								  </label>
								</div>			
 
							</div>			

							<hr></hr>
							
							<div class="questao-2">
								<p>2 Quando um objeto esta selecionado no Maya ele destaca esse objeto com uma cor. Qual a cor padrão de seleção de um objeto?</p>
							   <input class="form-check-input" type="hidden" name="id_question2" id="id_question2" value="2">
							   <div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta2" id="id_question2" value="A">
								  <label class="form-check-label" for="exampleRadios1">
									A) Azul
								  </label>
								</div>		

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta2" id="id_question2" value="B">
								  <label class="form-check-label" for="exampleRadios1">
									B) Branco
								  </label>
								</div>	

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta2" id="id_question2" value="C">
								  <label class="form-check-label" for="exampleRadios1">
									C) Verde 
								  </label>
								</div>			

								 
							</div>	
					
							<hr> </hr>
							<div class="questao-3">
							  <input class="form-check-input" type="hidden" name="id_question3" id="id_question3" value="3">
							  <p>3 Em qual menu encontra-se a opção Center Pivot?</p>
							   <div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta3" id="id_question1" value="A"  >
								  <label class="form-check-label" for="exampleRadios1">
									A) Edit
								  </label>
								</div>		

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta3" id="id_question1" value="B"  >
								  <label class="form-check-label" for="exampleRadios1">
									B) Object
								  </label>
								</div>	

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta3" id="questao3" value="C"  >
								  <label class="form-check-label" for="exampleRadios1">
									C) Modify 
								  </label>
								</div>			

								 
							</div>		

					<hr></hr>

							<div class="questao-4">
							   <p>4 Em uma tarefa de criação de animação, podemos dizer que o Maya é:</p>
							   <input class="form-check-input" type="hidden" name="id_question4" id="id_question4" value="4">
							   <div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta4" id="questao4" value="A"  >
								  <label class="form-check-label" for="exampleRadios1">
									A) Animador Mestre
								  </label>
								</div>		

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta4" id="questao4" value="B"  >
								  <label class="form-check-label" for="exampleRadios1">
									B) Animador Assistente 
								  </label>
								</div>	

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta4" id="questao4" value="C"  >
								  <label class="form-check-label" for="exampleRadios1">
									C) Animador Senior
								  </label>
								</div>			
 
							</div>			
<hr></hr>
							<div class="questao-5">
							   <input class="form-check-input" type="hidden" name="id_question5" id="id_question5" value="5">
							   <p>5 Qual a diferença entre Set Key e Auto Key?</p>
							   <div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta5" id="questao5" value="A"  >
								  <label class="form-check-label" for="exampleRadios1">
									A) O Set Key grava Automaticamente os keyframes e o Auto Key grava manualmente.
								  </label>
								</div>		

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta5" id="questao5" value="B"  >
								  <label class="form-check-label" for="exampleRadios1">
									B) O Set Key grava manualmente os keyframes e o Auto Key grava Automaticamente. 
								  </label>
								</div>	

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta5" id="questao5" value="C"  >
								  <label class="form-check-label" for="exampleRadios1">
									C) Não existe diferença entre os dois comandos.
								  </label>
								</div>			

							 
							</div>		
<hr></hr>
							<div class="questao-6">
							  <input class="form-check-input" type="hidden" name="id_question6" id="id_question6" value="6">
							  <p>6 O painel do Graph Editor pode ser acessado através de qual menu:</p>
							   <div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta6" id="questao6" value="A"  >
								  <label class="form-check-label" for="exampleRadios1">
									A) Display / Graph Editor
								  </label>
								</div>		

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta6" id="questao6" value="B"  >
								  <label class="form-check-label" for="exampleRadios1">
									B) Window / Graph Editor
								  </label>
								</div>	

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta6" id="questao6" value="C"  >
								  <label class="form-check-label" for="exampleRadios1">
									C) Window / Animation Editor / Graph Editor
								  </label>
								</div>			

								  
							</div>			
<hr></hr>
							<div class="questao-7">
							   <input class="form-check-input" type="hidden" name="id_question7" id="id_question7" value="7">
							   <p>7 No processo de configuração do rendering ao se escolher a opção name#.ext em Frame/Animation ext, o que significa?</p>
							   <div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta7" id="questao7" value="A"  >
								  <label class="form-check-label" for="exampleRadios1">
									 A) Significa que o Maya vai gerar um vídeo QuickTime numerado em sequência.
								  </label>
								</div>		

								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta7" id="questao7" value="B"  >
								  <label class="form-check-label" for="exampleRadios1">
									B) Significa que o Maya vai gerar imagens numeradas em sequência.  
								  </label>
								</div>	
 
								<div class="form-check">
								  <input required class="form-check-input" type="radio" name="id_resposta7" id="questao7" value="C"  >
								  <label class="form-check-label" for="exampleRadios1">
									C) Significa que o Maya vai gerar imagens numeradas em sequência aleatórias.
								  </label>
								</div>			

								 
							</div>
					
						<center><input type="submit" value="Enviar" class="btn btn-action"></center>
					</form>
				</section>
				<?}?>
			</div>
		</div>
	</div>
</div>
				<div class="row justify-content-center">
					<div class="mt-4 download-btn" data-lead-id="download-btn-id">
						<a id="optin-button" class="optin-link role-element leadstyle-link" href="https://havokschool.com.br/cursos/locomotion-maya-animacao-de-personagem" target="_blank">CONHEÇA NOSSO CURSO LOCOMOTION - ANIMAÇÃO DE PERSONAGEM</a>
					</div>
				</div> 

				
	</section>
 

	<section class="section fp-auto-height footer">
		<footer class="fp-tableCell w-100 d-block">
				<div style="background: #111;border-radius: 0;" class="card text-center">
					<div class="mt-1 mb-1 card-body">
						<h5 class="card-title">
							<div class="redes">
								<!-- Facebook -->
								<ul class="list-inline">
									<li class="list-inline-item">
										<a href="https://www.facebook.com/havokcg/" target="_blank" class="fb-ic">
										<i class="fab fa-facebook white-text mr-2"> </i>
										</a>
									</li>
									<!-- Twitter -->
									<li class="list-inline-item">
										<a href="https://twitter.com/viahavok" target="_blank" class="tw-ic">
										<i class="fab fa-twitter white-text mr-2"> </i>
										</a>
									</li>
									<!-- Google +-->
									<li class="list-inline-item">
										<a href="https://plus.google.com/103016090068125193699" target="_blank" class="gplus-ic">
										<i class="fab fa-google-plus white-text mr-2"> </i>
										</a>
									</li>
									<!--Linkedin -->
									<li class="list-inline-item">
										<a href="https://www.linkedin.com/company/via-havok-escola-de-3d-e-games/?originalSubdomain=pt" target="_blank" class="li-ic">
										<i class="fab fa-linkedin white-text mr-2"> </i>
										</a>
									</li>
									<!--Instagram-->
									<li class="list-inline-item">
										<a href="https://www.instagram.com/havokcg/?hl=pt-br" target="_blank" class="ins-ic">
										<i class="fab fa-instagram white-text mr-2"> </i>
										</a>
									</li>
									<li class="list-inline-item">
										<a target="_blank" title="Mande-nos uma mensagem no Whatsapp!" href="https://api.whatsapp.com/send?l=pt_BR&amp;phone=5511992637761" class="ins-ic">
										<i class="fab fa-whatsapp mr-2"></i>
										</a>
									</li>
									<li class="list-inline-item">
										<a target="_blank" href="https://br.pinterest.com/viahavok/overview/" class="ins-ic">
										<i class="fab fa-pinterest"></i>
										</a>
									</li>
								</ul>
							</div>
						</h5>
						<p class="text-white card-text"> HAVOK SCHOOL  -  Rua. Frei Caneca, 558 - 23ºAndar Consolação - São Paulo - SP</p>
					</div>
					<div class="text-white card-footer text-muted">
						© 2019 HAVOK SCHOOL - Todos os direitos reservados.
					</div>
				</div>
			</footer>
		</section>
	</div>
</div>
 
	
	<link rel="stylesheet" async href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link media="screen and (min-width: 900px)"  rel="stylesheet" href="https://havokschool.com.br/assets/css/jquery.fullpage.min.css" />	
	<script type="text/javascript"  src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
	<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script> 
	<script type="text/javascript" src="https://havokschool.com.br/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript"  src="assets/js/jquery.steps-1.1.0/jquery.steps.js"></script>
	<script type="text/javascript"  src="assets/js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
			<script  type='text/javascript' >
		$(window).load(function() {
			$('#myModal').modal('show');
		});
	</script>
	<script type="text/javascript">
	

		$("#example-basic").steps({
			headerTag: "h3",
			bodyTag: "section",
			transitionEffect: "slideLeft",
			autoFocus: true,
			enableAllSteps: true,
			enablePagination: false
		});

		$(document).ready(function(){
  $('.date').mask('00/00/0000');
  $('.time').mask('00:00:00');
  $('.date_time').mask('00/00/0000 00:00:00');
  $('.cep').mask('00000-000');
  $('.phone').mask('0000-0000');
  $('.phone_with_ddd').mask('(00) 0000-00000');
  $('.phone_us').mask('(000) 000-0000');
  $('.mixed').mask('AAA 000-S0S');
  $('.cpf').mask('000.000.000-00', {reverse: true});
  $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
  $('.money2').mask("#.##0,00", {reverse: true});
  $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
    translation: {
      'Z': {
        pattern: /[0-9]/, optional: true
      }
    }
  });
  $('.ip_address').mask('099.099.099.099');
  $('.percent').mask('##0,00%', {reverse: true});
  $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
  $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
  $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
  $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});

 
	</script>
	
	
	</body>
	
</html>