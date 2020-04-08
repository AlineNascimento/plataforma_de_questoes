  /*Esse arquivo realiza a criação do banco de dados 'avaliacao' em MySQL.
  * Realizando a criação também da tabela 'questionario' e das colunas pertencentes 
  * à essa tabela. Esse banco de dados foi criado dessa forma para que no futuro seja reaproveitado
  * e quem sabe obter mais tabelas de avaliacoes diversas, como por exemplo, trabalhos.

  -* A coluna 'id' funciona como chave primária, para identificação principalmente dos alunos, sendo 
  que a partir dela é possível realizar buscas de maneira mais rápida no banco, sendo que ela não pode ser nula.
  Essa chave se autoincrementa, de maneira que não é preciso dar-lhe um valor na entrada da base de dados.  
  -* A coluna 'nome' é uma chave única, de maneira que não pode haver o mesmo aluno realizando a questão mais de uma vez,
  além de não permitir redundância na base de dados.
  -* A coluna questao entra com o numero da questão, sendo que essa também não pode ser nula.
  -* A coluna 'alternativa' é do tipo enum, que permite, neste caso, as letras referentes às opções, 
  sendo que a primeira posição de enum é alternativa_1, a segunda alternativa_2 e assim à diante. Esses elementos 
  também não podem ser nulos */

  CREATE DATABASE `avaliacao`
  
  CREATE TABLE `questionario` (
   `id` INT(11) NOT NULL,
    `nome` VARCHAR(70) NOT NULL,
    `questao` INT(11) NOT NULL,
    `alternativa` enum('a','b','c','d') NOT NULL
    ); 

ALTER TABLE `questionario`
ADD PRIMARY KEY(`id`);

ALTER TABLE `questionario` 
ADD UNIQUE(`aluno`);

ALTER TABLE `questionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;