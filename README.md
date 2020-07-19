***PLATAFORMA DE QUESTÕES***

Foi feito uma plataforma web capaz de fornecer questões de simulados à alunos de uma instituição fictícia. Para a realização da plataforma utilizou-se como linguagem de interpretação e comunicação com o banco de dados, o PHP. Utilizou-se o banco de dados MySQL para armazenamento dos arquivos, além das linguagens de formatação e estilo, HTML5 e CSS, respectivamente.

 **Ferramentas e Softwares necessários para funcionamento da aplicação localmente**

1. Para realização do Banco de Dados é necessário a existência de um servidor e de um sistema gerenciador da base. Foi utilizado o Apache como servidor e interpretador da linguagem PHP e a partir da plataforma XAMPP com a ferramente PHPmyAdmin foi possível realizar o gerenciamento da base de dados junto com a execução do servidor. 
Então:  

	--> Faça o download do XAMPP (Foi utilizada a versão mais atualizada para Windows)
		link_XAMPP: **https://www.apachefriends.org/pt_br/download.html**
		
	--> Execute-o como administrador e siga o tutorial deste link para a conexão do servidor ser realizada com sucesso. 
		link_Tutor_XAMPP: **https://pt.wikihow.com/Instalar-o-XAMPP-para-Windows**
		
	--> Se o controle de conta de Usuário(UAC), estiver desabilitado, evite instalar o Xampp no C://.

Após a instalação, abra o Painel de Controle do XAMPP e realize e realize o download do Apache e MySQL, certifique-se que os dois estão habilitados a partir do "check verde" e ative-os. Três pontos são muito importantes após esse processo, sem eles não é possível a interpreção dos arquivos .php. 

	**Importante_1.** Descompacte a pasta Teste_tecnico_saraivaeducacao.zip na pasta htdocs que se encontra dentro da instalação do XAMPP. 
		caminho_1: ./xampp/htdocs/

		--> htdocs é o LOCALHOST do servidor.

	**Importante_2.** Se ao abrir o arquivo no navegador, e o arquivo não for interpretado, ou seja, apenas o código aparecer, troque na barra de navegação os seguintes elementos:

		file:///C:/xampp/htdocs = localhost
exemplo:
		--> Caminho_inicial: **file:///C:/xampp/htdocs/Teste_tecnico_saraivaeducacao/index.php**

		--> Caminho_final: **http://localhost/Teste_tecnico_saraivaeducacao/index.php**

	**Importante_3.** Abra o PhpMyAdmin.

 **Etapas da aplicação realizadas localmente**

2. Na plataforma phpMyAdmin, vá na aba SQL e cole primeiro o código de criação na base de dados (está indicado no arquivo) que está no arquivo scriptAvaliacao.sql, execute-o, depois cole o restante do código e execute-os. A base de dados com o nome 'avaliacao' foi criada, juntamente com sua tabela 'questionario' e colunas 'id', 'nome', 'questao', 'alternativa'.

3. Abra o arquivo index.php no navegador e assim será visto a plataforma de questões. Se aparecer o código, faça o 'Importante_2' acima, se a realização desse não ser o bastante e continuar aparecendo o código, confira se o Apache e MySQL estão habilitados e ativos. Se ainda não conseguir vizualizar a plataforma, repita todo o procedimento acima. (Lembrando que o XAMPP sempre tem que ser executado a partir do administrador)

4.Para mais detalhes da execução, veja a documentação nos códigos (arquivos bancodedados.php, index.php, scriptAvaliacao.sql) e no arquivo de testes realizados 'Testes.md'.
