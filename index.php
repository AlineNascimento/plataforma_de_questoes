<?php
	/*Esse arquivo 'index.php' realiza a plataforma web juntamente com as chamadas dos 
	 *scripts para que essa funcione de maneira correta. É nele que ocorre a conexão com 
	 *a base de dados, leitura e armazenamento dos dados so usuário. */

	//Chamada do script bancodedados.php complementar à página Web. Esse script contém todas as funções utilizadas nesse arquivo. 

	require('./bancodedados.php');

	//* realiza conexão com a base de dados 'avaliacao' localmente com o usuário administrador, que possui todas as permissões.

	$mysqli = conecta('localhost','root', '', 'avaliacao');
	

	//* Se não houve realização da questão ou seja, não foi escolhida uma alternativa, o sistema informa que é obrigatório a escolha de uma. Se a alternativa foi escolhida e o sistema, e o botão responder acionado, ocorre a chamada da função insereDados e os dados são armazenados no banco de dados. 
	//* Logo após há o chamamento da função resposta que informa o resultado ao usuário. 
	//* E logo após há o chamamento das funções estatísticas, que retorna a quantidade de pessoas que realizarão a questão, junto com a porcentagem de acerto e porcentagem de erro. 
	if($_POST){
		if($_POST['alternativa'] == FALSE){
			echo "É necessário escolher uma alternativa";
			exit; 
		}
		else{ 
			if($_POST['acao'] == 'RESPONDER') {

				insereDados($mysqli,
				$_POST['nome'],
				$_POST['questao'],
				$_POST['alternativa']);

				resposta($_POST['alternativa']);
				
				$listaAvaliacao = getAvaliacoes($mysqli);
				$total = getQtdTotalAvaliacoes($mysqli);
				$acertos = indice_acerto($total,$listaAvaliacao);
				$erros = indice_erro($total,$listaAvaliacao);
				$porc_a = porc_acertos($acertos,$total);
				$porc_e = porc_erros($porc_a);
			
				echo "Total de Pessoas que já resolveram: $total .<br>";
				echo "Taxa de acerto: $porc_a . <br>"; 
				echo "Taxa de erro : $porc_e .<br>"; 
			} 
		
		}
	}
?>

<!DOCTYPE html>
<!-- Na elaboração da plataforma Web, foi utilizado a linguagem de formatação HTML5 e de estilo CSS, sendo o arquivo CSS chamado no 'head' da página. --> 
<html lang="pt-br">

	<head>
		<title> Plataforma de Questões </title>
		<meta name="description" content="Simulado Saraiva Educação">
		<meta name="keywords" content="Teste Tecnico, Questoes">

		
		<link href="css/estilopagina.css" rel="stylesheet" type="text/css">

	</head>

<body>
		<header>
			<h1> Plataforma de Questões </h1>

			<h2> Teste Técnico da Saraiva Educação</h2>

		</header>

		<section>
<!-- Na seção do formulário, foram inseridos 'labels' para a inscrição do aluno e grafia das questões além de 'inputs' para o recolhimento de dados, sendo que a chamada para a base de dados ocorre à partir de 'value' -->
			<form name="inscricao" method="post" action="">

				<label for="nome">Aluno(a)</label>
				<input name="nome"
						type="text" 
						id="nome" 
						size="70" 
						maxlength="70" 
						required="required"
						value='<?= $avaliacao['nome'] ?? '' ?>'> <br>

				<fieldset> 
					<label><input type="hidden" name="questao" value="1" autofocus>Questão 1: O que diz o artigo 5º da Constuição Federal de 1988? </label><br>
			
					<label><input name="alternativa" 
									type="radio"  
									value="a" 
									id="alternativa_1">
									<big>a)</big> 
						Todos são iguais perante a lei, sem distinção de qualquer natureza, garantindo-se aos brasileiros e aos estrangeiros residentes no País a inviolabilidade do direito à vida, à liberdade, à igualdade, à segurança e à propriedade.
					</label><br>
					
					<label><input name="alternativa" 
									type="radio" 
									value="b" 
									id="alternativa_2">
									<big>b)</big> 
						 será considerado culpado até processo transitado em julgado de sentença penal condenatória.
					</label><br>
					
					<label><input name="alternativa" 
									type="radio" 
									value="c" 
									id="alternativa_3">
									<big>c)</big> 
						Esta vedada a desfederalização do Estado, violação da presunção de inocência, violação do direito a vida e a violação do direito a liberdade.
					</label><br>
					
					<label><input name="alternativa" 
									type="radio" 
									value="d" 
									id="alternativa_4">
									<big>d)</big> 
						Todos os incisos do Artigo 67º são considerado cláusulas pétreas.
					</label><br>
					
				</fieldset>
				
				<input type="submit" name="acao" id="responder" value="RESPONDER">


			</form>

		</section>

</body>
</html>
