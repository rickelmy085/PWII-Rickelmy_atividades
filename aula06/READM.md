# COMO FUNCIONAR
Precisamos criar um Mysql com o nome projeto_site e fazer esse sequinte codigo na tabela:
	CREATE DATABASE projeto_site;
    USE projeto_site;
    
	CREATE TABLE contatos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
	mensagem TEXT NOT NULL
    );
    
    select * from contatos; 

Precisamos tbm criar no http://localhost/phpmyadmin efazer la com o nome da tabela sendo contatos

# Como abrir no navegador?
Precisamos colocar ela antes no xampp, abra o explorador de arquvivos e coloque assim C:\xampp\htdocs e coloque a pasta da aula06 la
no navegador pesquise assim: http://localhost/aula06/index.html