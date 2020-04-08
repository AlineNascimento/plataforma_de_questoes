<?php

/**
 * Definicao da funcao conecta: 
 * essa funcao realiza conexao de acordo com os parametros passados
 * @param string $servidor
 * @param string $usuario
 * @param string $senha
 * @param string $banco
 * @return conexao com BD
 */

//Função "conecta" realiza conexão com o banco de dados, possui como entrada o servidor usado, o usuario, senha e o nome da base de dados á se conectar. Se não ocorre a conexão por algum motivo, ela retorna uma mensagem de erro de conexão. 

function conecta($servidor, $usuario, $senha, $banco){

	$mysqli = mysqli_connect($servidor, $usuario, $senha, $banco);
	if(mysqli_connect_errno()){
		echo '<b style="color">ERRO DE CONEXÃO: '.mysqli_conect_error()."</b>";
	}

	return $mysqli;
}

//Função "insereDados" recolhe os dados recolhidos na plataforma de questões e insere no banco de dados.

function insereDados($mysqli, $nome='',	$questao='', $alternativa=''){

	$query = "INSERT INTO 
	questionario(nome,questao,alternativa)
	VALUES('$nome', '$questao', '$alternativa')";

	mysqli_query($mysqli, $query);
	if(mysqli_errno($mysqli)) {
		echo mysqli_error($mysqli);
	}
}

//Função "resposta" para ler a alternativa escolhida na questão e retornar uma resposta de correção ao usuário
function resposta($alternativa=''){
		if($alternativa == 'a'){echo " Parabéns! A alternativa a é a correta! <br>";
		}
		if($alternativa == 'b'){echo "Infelizmente a alternativa b está errada! A resposta correta é a alternativa a.<br>";
		}
		if($alternativa == 'c'){echo "Infelizmente a alternativa c está errada! A resposta correta é a alternativa a..<br>";
		}
		if($alternativa == 'd'){echo "Infelizmente a alternativa d está errada! A resposta correta é a alternativa a.<br>";
		}
	}

//Funcao "getAvaliacoes" realiza o recolhimento de dados da coluna de 'alternativa' da tabela 'questionario' na base de dados 'avaliacao'. A coluna de dados é convertida no array $listaAvaliacao, de maneira que o ponteiro mysqli_fetch_assoc define as posicoes do array. Sendo que essa funcao retorna esse array. 
function getAvaliacoes($mysqli)
{
    $listaAvaliacao = [];
       $query = "SELECT alternativa 
              FROM questionario";
    $resultado = mysqli_query($mysqli, $query);
    if(mysqli_errno($mysqli)) {
      echo mysqli_error($mysqli);
    } else {
      while($linha = mysqli_fetch_assoc($resultado)) {
        array_push($listaAvaliacao, $linha);
      }
    }
     return $listaAvaliacao;
}

//Função "getQtdTotalAvaliacoes" contabiliza a quantidade de registros na tabela de questionarios que se encontra na base de dados. Retorna a quantidade de registros
function getQtdTotalAvaliacoes($mysqli)
{
  $query = 'SELECT count(*) as qtd FROM questionario';
  $resultado = mysqli_query($mysqli, $query);
  if(mysqli_errno($mysqli)) {
    echo mysqli_error($mysqli);
    return false;
  }
  $qtd = mysqli_fetch_assoc($resultado);
  return $qtd['qtd'];
}


//Função 'indice_acerto' recebe de entrada a quantidade total de registros e a lista de respostas já realizadas; a partir desse valores são contabilizados os numeros de pessoas que acertaram a questão, ou seja, colocaram igual à letra 'a'. Ela retorna o numero de acertos totais das pessoas que já realizaram a questão. 
function indice_acerto($total,$listaAvaliacao=''){
	$acertos=0;
	foreach ($listaAvaliacao as $value){
  		for($i=0;$i<$total;$i++){
			if($value == "a"){
	 			$acertos = $acertos +1;
			}

		}
	}
	return $acertos;
}

////Função 'indice_erro' recebe de entrada a quantidade total de registros e a lista de respostas já realizadas, a partir desse valores são contabilizados os numeros de pessoas que erraram a questão, ou seja, colocaram diferente da letra 'a'. Ela retorna o numero de erros totais das pessoas que já realizaram a questão. 
function indice_erro($total,$listaAvaliacao=''){
	
	$erros=0;
	foreach ($listaAvaliacao as $value){
		for($i=0;$i<$total;$i++){
			if($value != "a"){
	 			$erros = $erros + 1;
			}

		}
	}
	return $erros;
}

////Função 'porc_acertos' recebe de entrada a quantidade total de acertos e e o total de respostas. A partir desse valores é realizada a porcentagem de acertos da questão 1. Na função abaixo 'porc_erros' é realizada a diferença da porcentagem total com a encontrada pelos acertos. 
function porc_acertos($acertos,$total){

	$porc_acertos = ($acertos*100)/$total;
	return $porc_acertos;
}

function porc_erros($porc_acertos){
	
	$porc_erros = 100 - $porc_acertos;
	return $porc_erros;
}


?>
