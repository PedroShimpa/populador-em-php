#Popule tabelas no MySQL ou MariaDB com este populador sem dependecias!


#Este script não necessita de nenhum componente além dos nativos do PHP

Popular qualquer tabela em php com quantos registros quiser

requisitos necessários: 

php 7+

Mysql ou MariaDB

Execute o SQL base no arquivo sql/dump (caso ja tenha uma tabela que deseja popular, pode pular esse passo)

conifgure seu banco de dados no arquivo env.php

defina as colunas que deseja inserir no arquivo data_generator.php na variavel $insert, o nome da coluna como chave e o tipo do dado como valor.

Atualmente tem 6 tipos disponiveis: 

name: nome brasiliero aleatório (atualemnte 100 nomes na lista).

surname: sobrenome brasileiro aleatório (atualemnte 100 nomes na lista).

email: nome brasileiro + sobrenome brasileiro aleatórios + @example.com.

text: lorem ipsum aleatório de aproximadamente 200 caracteres.

number: numero aleatório de 1 a 500.

time: dia aleatório no formato padrão do mysql: Y-m-d H:i:s.

Exemplo de um dado que será inserido:
 
nome: Camila

sobrenome: Medeiros

email: joaquim@example.com 

descricao:  elit esse in laboris labore consectetur in aliqua labore pariatur veniam velit id ipsum laboris laborum eiusmod eu fugiat laboris

endereco:  ipsum reprehenderit laboris consequat velit minim nulla do Excepteur in consequat eu incididunt qui sit dolore dolore laboris sunt tempor

numero: 155

criado_em: 2023-09-30 23:43:33
	
