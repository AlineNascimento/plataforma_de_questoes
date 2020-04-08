Os testes realizados são descritos abaixo: (Obs.: Por causa de alguns problemas pessoais e profissionais, não consegui fazer algumas correções de problemas que encontrei no código e na plataforma. Esses problemas estão explicitados abaixo, junto com as prováveis causas.)

1. Teste de leitura na plataforma e armazenamento na base de dados:

	1.1. Inserção de Dados e Armazenamento

	input:  NOME,ALTERNATIVA
			Josiane Mendes da Costa,"a"
			Maria Augusta da Silva,"a"
			Marlene Jania da Silva,"a"
			Luana Silva,"a"
			Maria Roberta da Silva,"a"
			Maria Luiza Pereira,"a"
			Rafaela Moreira Dias,"a"
			Lucas de Andrade Rossi,"b"
			Lucas da Silva Pereira,"b"
			Luca de Farias, "b"
			Luiza Gonçalves Monteiro,"b"
			Mariana Silva,"b"
			Maria de Jesus,"b"
			João Henrique da Silva,"b"
			Juliana da Silva,"b"
			Lucas José da Silva,"b"
			Maria Luiza Jesus,"b"
			Rafael Freitas da Silva,"b"
			Jessica Maria de Andrade,"b"
			Maria José Dias,"b"
			Mariana Luiza Assis,"b"
			Luiza Solvestre,"c"
			Luana da Silva,"c"
			Maria Gonçalves,"c"
			Luiza Sonsa Rodrigues,"c"
			Luiza Samora Rodrigues,"c"
			Maria da Fonseca,"c"
			Ana Luiza Mendes,"c"
			Ricardo Quinois Azevedo,"c"
			Lucas Almeida de Azevedo,"c"

	output: armazenamento na base de dados 'avaliacao',na tabela 'questionario': 
			
			ID,NOME,QUESTAO,ALTERNATIVA
			"1","Josiane Mendes da Costa","1","a"
			"2","Maria Augusta da Silva","1","a"
			"3","Marlene Jania da Silva","1","a"
			"4","Luana Silva","1","a"
			"5","Maria Roberta da Silva","1","a"
			"6","Maria Luiza Pereira","1","a"
			"7","Rafaela Moreira Dias","1","a"
			"8","Lucas de Andrade Rossi","1","b"
			"9","Lucas da Silva Pereira","1","b"
			"10","Luca de Farias ","1","b"
			"11","Luiza Gonçalves Monteiro","1","b"
			"12","Mariana Silva","1","b"
			"13","Maria de Jesus","1","b"
			"14","João Henrique da Silva","1","b"
			"15","Juliana da Silva","1","b"
			"16","Lucas José da Silva","1","b"
			"17","Maria Luiza Jesus","1","b"
			"18","Rafael Freitas da Silva","1","b"
			"19","Jessica Maria de Andrade","1","b"
			"20","Maria José Dias","1","b"
			"21","Mariana Luiza Assis","1","b"
			"22","Luiza Solvestre","1","c"
			"23","Luana da Silva","1","c"
			"24","Maria Gonçalves","1","c"
			"25","Luiza Sonsa Rodrigues","1","c"
			"26","Luiza Samora Rodrigues","1","c"
			"27","Maria da Fonseca","1","c"
			"28","Ana Luiza Mendes","1","c"
			"29","Ricardo Quinois Azevedo","1","c"
			"30","Lucas Almeida de Azevedo","1","c"

	1.2. Quando o usuário não cadastra o nome e tenta RESPONDER a questão é pedido o preenchimento do campo do nome. E a transação não ocorre. 

	1.3. Quando o usuário cadastra o nome, mas não escolhe uma alternativa para a questão, a transação é interrompida e aparece a seguinte mensagem:  

			--> "Notice: Undefined index: alternativa in C:\xampp\htdocs\Teste_tecnico_saraivaeducacao\index.php on line 19
			É necessário escolher uma alternativa"

	Esse erro ocorreu devido à passagem de uma variavel $_POST['alternativa'] dentro de um if, a funcionalidade principal de parar a operação ocorreu, no entanto esse problema faz com que o usuario tenha que atualizar a pagina e começar o procedimento outra vez.

	1.4. Quando o usuário tenta cadastrar sem ter escrito o nome ou escolhido uma alternativa, a transação não ocorre. E aparece o pedido para o preenchimento do campo do nome.

	1.5. Quando o usuario cadastra o nome e a alternativa, há o retorno de resposta de da alternativa marcada e a correta. Além do armazenamento dos dados.

2. Testes das operações aritméticas estatísticas (total de questões, taxa de acerto, taxa de erro).

	2.1. Foi possível a partir da contagem de resgistros na base de dados saber o numero total de pessoas que realizaram a questão, retornando isso com sucesso para o usuario.

	2.2. Foi Possível realizar o acesso dos dados na base 'avaliacao' e transformar os dados da coluna 'alternativa' em um array de strings. No entanto não foi possível a comparação das strings na funções de acertos e erros, devido à alguma incompatibilidade de código de entrada dessas funções. Com isso, não é possível também o cálculo correto da porcentagem ou taxa de acerto e erro.  Com isso aparece na plataforma as seguintes mensagens para o usuário: 
	
			--> Total de Resoluções desta questão: 36 .
			--> Porcentagem de acerto: 0 .
			--> Porcentagem de erro : 100 .


