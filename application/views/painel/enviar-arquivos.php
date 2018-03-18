<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="<?= base_url('Painel') ?>">
				<em class="fa fa-home"></em>
			</a></li>
			<li class="active">Enviar Arquivos</li>
		</ol>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Esta é a área para enviar o comprovante de depósito e o seu trabalho</h1>
		</div>
	</div><!--/.row-->
	
	<?php if($mensagens != ''){ ?>
	<div class="row">
		<div class="col-md-12">
			<?= $mensagens; ?>
		</div>
	</div>
	<?php } ?>

	<?php if($enviou_comprovante){
		$panel = '';
		$message = '';
		if($status_inscricao == 'Em análise'){
			$title = 'Status: Em Análise';
			$panel = 'panel-info';
			$message = '<h2>Seu comprovante de pagamento está em <strong>análise.</strong></h2>';
		}else if($status_inscricao == 'Aprovado'){
			$title = 'Status: Aprovado';
			$panel = 'panel-success';
			$message = '<h2>Seu comprovante de depósito foi <strong>aprovado!</strong></h2>';
		}else if($status_inscricao == 'Reprovado'){
			$title = 'Status: Reprovado';
			$panel = 'panel-danger';
			$message = '<h2>Seu comprovante de pagamento foi <strong>reprovado.</strong></h2><br><p>Isto pode acontecer por você ter pago o valor que não corresponde à sua inscrição no respectivo mês.</p><p>O Comprovante de depósito pode não estar claro (estar embaçado).</p><br><p>Envie um novo comprovante:</p>';
		}else if($status_inscricao == 'Isento'){
			$title = 'Status: Isento';
			$panel = 'panel-success';
			$message = '<h2>Você está <strong>isento</strong> do pagamento.</h2>';

		}
		?>
		<div class="col-md-12">
			<div class="panel <?= $panel ?>">
				<div class="panel-heading">
					<p align="center" style="color:white;"><?= $title ?></p>


					<span class="pull-right"></span></div>
					<div class="panel-body">
						<?= $message ?>
					</div>

				</div>
			</div>

			<?php }
			if(!$enviou_comprovante || $status_inscricao == 'Reprovado'){ ?>

			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading" id="duvida">
						<strong>Instruções para anexar o <strong>comprovante de depósito:</strong></strong>


						<span class="pull-right"></span></div>
						<div class="panel-body">

							<form class="form-horizontal" action="<?= base_url('Painel/send_photo') ?>" method="post" enctype="multipart/form-data">
								<fieldset>
									<p><strong>1</strong> - Scaneie ou tire a foto do comprovante de depósito via câmera (celular ou câmera digital) de maneira que seja legível as informações contidas no mesmo.</p>
									<p><strong>2</strong> - Passe para o computador.</p>
									<p><strong>3</strong> - Selecione abaixo a foto do comprovante de depósito. Os tipos de imagens permitidos são: <strong>.pdf, .jpg, .jpeg, .gif, .bmp, .png.</strong> com o tamanho máximo de <strong>2 MB.</strong></p>
									<p><strong>4</strong> - Clique sobre o botão <strong>"Enviar Comprovante"</strong></p>
									<!-- Message body -->
									<div class="form-group">

										<div class="col-md-12">
											<input type="file" name="comprovante_deposito" id="comprovante_deposito" class="form-control" required="true" accept="image/*, .pdf"> 
											<br>
											<input type="submit" name="submit" id="submimt" class="btn btn-primary" value="Enviar Comprovante">
										</div>

									</div>


								</fieldset>
							</form>
						</div>

					</div>
				</div>
				<?php } ?>
				<?php if(!$enviou_comprovante || $status_inscricao == 'Reprovado' || $status_inscricao == 'Em análise'){ ?>
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<p><strong>ATENÇÃO</strong></p>
							<span class="pull-right"></span>
						</div>
						<div class="panel-body">
							<p style="font-size:18pt;">Você só poderá submeter o trabalho quando seu comprovante de depósito for enviado e validado.</p>
						</div>
					</div>
				</div>

				<?php } ?>
				<?php if(($enviou_comprovante && $vai_submeter_trabalho && $status_trabalho == '') || ($enviou_comprovante && $vai_submeter_trabalho && $status_trabalho == 'Você deve enviar seu artigo até fim do mês!')){ ?>
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong>Regras para Submissão do Trabalho</strong>
							<span class="pull-right"></span>
						</div>
						<div class="panel-body">
							<p>Serão aceitos os trabalhos de cunho acadêmico conforme os Eixos Temáticos do Congresso, sob a forma de duas modalidades: <strong>Resumo Expandido e Trabalho Completo.</strong></p>
							<p>A apresentação dos trabalhos aprovados (<strong>Resumo Expandido e/ou Trabalho Completo</strong>) será no formato de <strong>comunicação oral</strong> (*não haverá modalidade de pôster).</p>
							<p>Em qualquer uma das duas modalidades, os trabalhos inscritos deverão atender aos seguintes objetivos: </p>
							<p><strong>a)</strong> ter a Pedagogia Histórico-Crítica como objeto de pesquisa e/ou fundamento teórico de investigações e de experiências que visem contribuições propositivas a ela; ou que a analisem criticamente à vista de seu aprimoramento; </p>
							<p><strong>b)</strong> adotar os fundamentos epistemológicos, filosóficos e ontológicos que fundamentam a pedagogia histórico-crítica na análise da relação entre educação e desenvolvimento humano. </p>
						</div>
					</div>

				</div>
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading" id="duvida">
							<strong>Instruções para anexar o seu <strong>trabalho:</strong></strong>


							<span class="pull-right"></span></div>
							<div class="panel-body">

								<form class="form-horizontal" action="<?= base_url('Painel/send_article') ?>" method="post" enctype="multipart/form-data">
									<fieldset>
										<p><strong>OBS:</strong> O formato válido para o arquivo dos artigos são: <strong>.pdf, .doc, .docx.</strong> com a tamanho máximo de <strong>2 MB.</strong></p>
										<p><strong>1</strong> - Escreva o título de seu trabalho.</p>
										<div class="form-group">
											<div class="col-md-12">

												<input required="true" placeholder="Digite aqui o Título do trabalho." type="text" name="titulo" id="titulo" class="form-control"  minlength="1" maxlength="100">
											</div>
										</div>

										<p><strong>2</strong> - Adicione os co-autores:</p>
										<div class="form-group">
											<div class="col-md-12">
												<div id="coautores"></div>
												<a id="adicionar" class="btn btn-info"><i class="fa fa-plus"></i> Adicionar</a>
											</div>
										</div>

										<p><strong>3</strong> - Escolha qual <strong>eixo temático</strong> seu trabalho mais se encaixa.</p>
										<ul>
											<li><p><strong>Eixo 1: Fundamentos teórico-filosóficos da Pedagogia Histórico-Crítica:</strong> contemplará trabalhos que apresentem análises e reflexões sobre os pressupostos filosóficos, políticos e epistemológicos que constituem os fundamentos da Pedagogia Histórico-Crítica enquanto uma teoria pedagógica revolucionária.</p></li>
											<li><p><strong>Eixo 2: Fundamentos Psicológicos da Pedagogia Histórico-crítica:</strong> contemplará trabalhos que apresentem produções acerca das relações entre educação escolar e desenvolvimento humano à luz da unidade teórico-metodológica entre a Pedagogia Histórico-Crítica e a Psicologia Histórico-Cultural.</p></li>
											<li><p><strong>Eixo 3: Fundamentos Didáticos, Currículo e Pedagogia Histórico-crítica:</strong> contemplará trabalhos que apresentem análises e reflexões acerca da formação de professores, da prática docente, da educação escolar na contemporaneidade e seus desdobramentos no processo de ensino e aprendizagem com base na Pedagogia Histórico-Crítica.</p></li>
											<li><p><strong>Eixo 4: Educação inclusiva e Pedagogia Histórico-crítica:</strong> contemplará trabalhos que apresentem contribuições teóricas e práticas da Pedagogia Histórico-Crítica para a promoção da educação e do desenvolvimento humano no âmbito das práticas educativas inclusivas.</p></li>
											<li><p><strong>Eixo 5: Educação do Campo, luta de classes e Pedagogia Histórico-Crítica:</strong> contemplará trabalhos que apresentem análises e reflexões teóricas e práticas acerca da educação do campo no processo de enfrentamento da luta de classes e a articulação de práticas pedagógicas voltadas ao desenvolvimento e fortalecimento dos movimentos sociais populares e a Pedagogia Histórico-Crítica.</p></li>
											<li><p><strong>Eixo 6: Educação não-formal, identidades sociais e Pedagogia Histórico-Crítica:</strong> contemplará trabalhos que apresentem análises e reflexões teóricas e práticas acerca da exploração e opressão que as relações de gênero, sexualidades e/ou étnico-raciais decorrentes do processo de divisão social do trabalho/alienação, das reformulações curriculares nacionais e suas interfaces com a função desenvolvente da educação e a Pedagogia Histórico-Crítica.</p></li>
										</ul>
										<div class="form-group">
											<div class="col-md-12">
												<select class="form-control" required="true" name="eixo" id="eixo">
													<option value="" selected="true" readonly="true" disabled="">Selecione um eixo</option>
													<?php foreach($eixos as $eixo){
														echo '<option value="'.$eixo->id.'">'.$eixo->nome.'</option>';
													} ?>
												</select>
											</div>
										</div>
										<p><strong>4</strong> - Selecione abaixo o seu trabalho <strong>com</strong> seu nome de autor.</p>
										<div class="form-group">
											<div class="col-md-12">
												<input required="true" type="file" name="artigo_com_autor" id="artigo_com_autor" class="form-control"  accept=".docx, .doc, .pdf">
											</div>
										</div>
										<p><strong>5</strong> - Selecione agora o seu trabalho <strong>sem</strong> o seu nome de autor, somente com o conteúdo do artigo.</p>
										<div class="form-group">
											<div class="col-md-12">
												<input required="true" type="file" name="artigo_sem_autor" id="artigo_sem_autor" class="form-control"  accept=".docx, .doc, .pdf">
											</div>
										</div>

										<p><strong>6</strong> - Clique sobre o botão <strong>"Enviar Trabalho"</strong></p>
										<!-- Message body -->
										<div class="form-group">
											<div class="col-md-12">

												<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Enviar Trabalho" >
											</div>

										</div>


									</fieldset>
								</form>
							</div>

						</div>
					</div>
					<?php } 
					else{

						$panel = '';
						$message = '';
						$title = '';
						if($status_trabalho == 'Seu trabalho está em <strong>análise</strong>.'){
							$title = 'Status: Em Análise';
							$panel = 'panel-info';
							$message = '<h2>'.$status_trabalho.'</h2>';
						}else if($status_trabalho == 'Parabéns! Seu trabalho foi <strong>APROVADO</strong>!'){
							$title = 'Status: Aprovado';
							$panel = 'panel-success';
							$message = '<h2>'.$status_trabalho.'</h2>';
						}else if($status_trabalho == 'Infelimente seu trabalho não foi aprovado, mas você poderá ainda participar do Congresso.'){
							$title = 'Status: Reprovado';
							$panel = 'panel-danger';
							$message = '<h2>Infelizmente seu trabalho não foi aprovado, mas você poderá ainda participar do Congresso.</h2>';
						}
						?>				
						<?php if($title != ''){ ?>
						<div class="col-md-12">
							<div class="panel <?= $panel ?>">
								<div class="panel-heading">
									<p align="center" style="color:white;"><?= $title ?></p>


									<span class="pull-right"></span></div>
									<div class="panel-body">
										<?= $message ?>
									</div>

								</div>
							</div>
							<?php } ?>

							<?php } ?>



							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading" id="duvida">
										<strong>Entre em contato conosco</strong>


										<span class="pull-right"></span></div>
										<div class="panel-body">

											<form class="form-horizontal" action="<?= base_url('Painel/send_doubt') ?>" method="post">
												<fieldset>
													<p>Está com alguma dúvida ou dificuldade? Escreva para nós!</p>
													<!-- Message body -->
													<div class="form-group">

														<div class="col-md-12">
															<textarea style="resize:none;" required="true" class="form-control" id="message" name="message" placeholder="Escreva sua dúvida aqui..." rows="5"></textarea>
														</div>

													</div>

													<!-- Form actions -->
													<div class="form-group">
														<div class="col-md-12 widget-right">
															<button type="submit" class="btn btn-info btn-md pull-right">Enviar</button>
														</div>
													</div>
												</fieldset>
											</form>
										</div>

									</div>
								</div>
							</div>

							<script src="<?= base_url('assets/painel/js/jquery-3.3.1.min.js') ?>"></script>
							<script src="<?= base_url('assets/painel/js/jquery.ui.js') ?>"></script>
							<script type="text/javascript">


								$('.coautor').blur(function(){
									var cpf;
									cpf = $('.coautor').val();
									$.ajax({
										url: '<?= base_url('Painel/coautor/') ?>' + cpf,
										method: 'POST',
										dataType: 'json',

										success : function(result){
											console.log(result);
										//$('#coautores').append()
									}
								});
								});

								$( document ).ready(function() {


									$( "#adicionar" ).click(function() {
										$('#coautores').append('<input type="text" class="ui-autocomplete-input coautor form-control" placeholder="Insira o CPF do Coautor." autocomplete="off" name="coautores[]"></input><br>');
										
									});

									

								});
							</script>
