CREATE DATABASE appDB;

USE appDB;

CREATE TABLE usuario(
	id_usuario INT AUTO_INCREMENT,
    login VARCHAR(10) NOT NULL,
    senha VARCHAR(15) NOT NULL,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(30) NOT NULL,
    nascimento DATE,
    endereco VARCHAR(40),
    numero VARCHAR(10),
    complemento VARCHAR(20),
    bairro VARCHAR(25),
    cidade VARCHAR(25),
    estado VARCHAR(2),
    cep VARCHAR(10),
    telefone VARCHAR(14),
    tipo_usuario VARCHAR(20),
    PRIMARY KEY(id_usuario)
);

CREATE TABLE estado(
	id_estado INT AUTO_INCREMENT,
    uf varchar(2) NOT NULL,
    descricao VARCHAR(40) NOT NULL,
    PRIMARY KEY(id_estado)
    );
    
ALTER TABLE usuario DROP COLUMN estado;

ALTER TABLE usuario ADD COLUMN id_estado INT NOT NULL;

ALTER TABLE usuario ADD CONSTRAINT fk_estado FOREIGN KEY (id_estado) REFERENCES estado (id_estado);

INSERT INTO estado(descricao, uf) VALUES('Acre', 'AC');
INSERT INTO estado(descricao, uf) VALUES('Alagoas', 'AL');
INSERT INTO estado(descricao, uf) VALUES('Amapá', 'AP');
INSERT INTO estado(descricao, uf) VALUES('Amazonas', 'AM');
INSERT INTO estado(descricao, uf) VALUES('Bahia', 'BA');
INSERT INTO estado(descricao, uf) VALUES('Distrito federal', 'DF');
INSERT INTO estado(descricao, uf) VALUES('Espírito Santo', 'ES');
INSERT INTO estado(descricao, uf) VALUES('Goiás', 'GO');
INSERT INTO estado(descricao, uf) VALUES('Maranhão', 'MA');
INSERT INTO estado(descricao, uf) VALUES('Mato Grosso', 'MT');
INSERT INTO estado(descricao, uf) VALUES('Mato Grosso do Sul', 'MS');
INSERT INTO estado(descricao, uf) VALUES('Minas Gerais', 'MG');
INSERT INTO estado(descricao, uf) VALUES('Pará', 'PA');
INSERT INTO estado(descricao, uf) VALUES('Paraíba', 'PB');
INSERT INTO estado(descricao, uf) VALUES('Paraná', 'PR');
INSERT INTO estado(descricao, uf) VALUES('Pernambuco', 'PE');
INSERT INTO estado(descricao, uf) VALUES('Piauí', 'PI');
INSERT INTO estado(descricao, uf) VALUES('Rio de Janeiro', 'RJ');
INSERT INTO estado(descricao, uf) VALUES('Rio Grande do Norte', 'RN');
INSERT INTO estado(descricao, uf) VALUES('Rio Grande do Sul', 'RS');
INSERT INTO estado(descricao, uf) VALUES('Rondônia', 'Ro');
INSERT INTO estado(descricao, uf) VALUES('Roraima', 'RR');
INSERT INTO estado(descricao, uf) VALUES('Santa Catarina', 'SC');
INSERT INTO estado(descricao, uf) VALUES('São Paulo', 'SP');
INSERT INTO estado(descricao, uf) VALUES('Sergipe', 'SE');
INSERT INTO estado(descricao, uf) VALUES('Tocantins', 'TO');


USE appDB;

CREATE TABLE produto(
	id_produto INT AUTO_INCREMENT,
	nome_produto varchar(100) NOT NULL,
    descricao_produto TEXT,
    banho_produto VARCHAR(50) NOT NULL,
    imagem_produto VARCHAR(100) NOT NULL,
    precoBase_produto DECIMAL(9,2) NOT NULL,
    preco_produto DECIMAL(9,2) NOT NULL,
    estoque_produto DOUBLE NOT NULL,
    peso_produto VARCHAR(10),
    tamanho_produto VARCHAR(10),
    codigo_produto VARCHAR(15),
    ativo BOOLEAN DEFAULT TRUE,
    PRIMARY KEY(id_produto)
    );
    
CREATE TABLE tipo_produto(
	id_tipoProduto INT AUTO_INCREMENT,
    nome_tipoProduto VARCHAR(100) NOT NULL,
    PRIMARY KEY(id_tipoProduto)
);

ALTER TABLE produto ADD COLUMN tipo_produto INT NOT NULL;
ALTER TABLE produto ADD CONSTRAINT fk_tipoProduto FOREIGN KEY (tipo_produto) REFERENCES tipo_produto (id_tipoProduto);


INSERT INTO tipo_produto(nome_tipoProduto)VALUES ('Brinco');
INSERT INTO tipo_produto(nome_tipoProduto)VALUES ('Anel');
INSERT INTO tipo_produto(nome_tipoProduto)VALUES ('Pulseira');
INSERT INTO tipo_produto(nome_tipoProduto)VALUES ('Pingente');
INSERT INTO tipo_produto(nome_tipoProduto)VALUES ('Cordão');
INSERT INTO tipo_produto(nome_tipoProduto)VALUES ('Tornozeleira');

CREATE TABLE tipo_usuario(
	id_tipo INT AUTO_INCREMENT,
    descricao VARCHAR(15) NOT NULL,
    PRIMARY KEY(id_tipo)
    );
    
ALTER TABLE usuario DROP COLUMN tipo_usuario;

ALTER TABLE usuario ADD COLUMN id_tipo INT NOT NULL;

ALTER TABLE usuario ADD CONSTRAINT fk_tipo FOREIGN KEY (id_tipo) REFERENCES tipo_usuario (id_tipo);

INSERT INTO tipo_usuario(descricao) VALUES('Administrador');
INSERT INTO tipo_usuario(descricao) VALUES('Cliente');
INSERT INTO tipo_usuario(descricao) VALUES('Funcionario');

INSERT INTO usuario (login, 
 senha, 
 nome, 
 email,
 nascimento,
 endereco, 
 numero, 
 bairro,
 cidade,
 cep, 
 telefone,
 id_estado,
 id_tipo) VALUES ('Silvio', '123', 'Silvio Gabriel Pimentel Dias', 'silviodias8885@gmail.com', '1996-10-28', 'Rua Mario Santoro', '0', 'São José de Imbassaí', 'Maricpa','24932-110', '(21)983728410', 12,1);
 
USE appdb; 

create table pedidos (
id_pedidos INT AUTO_INCREMENT,
data_pedido DATETIME,
id_usuario INT, 
valor_total DECIMAL(9,2),
PRIMARY KEY(id_pedidos)
);

CREATE TABLE item_pedido(
	id_item INT AUTO_INCREMENT,
	qtd INT,
    valor DECIMAL(9,2),
    PRIMARY KEY(id_item)
);

ALTER TABLE item_pedido ADD COLUMN id_pedidos INT NOT NULL;

ALTER TABLE item_pedido ADD CONSTRAINT fk_pedidos FOREIGN KEY (id_pedidos) REFERENCES pedidos (id_pedidos);

ALTER TABLE item_pedido ADD COLUMN id_produto INT NOT NULL;

ALTER TABLE item_pedido ADD CONSTRAINT fk_produto FOREIGN KEY (id_produto) REFERENCES produto (id_produto);

ALTER TABLE pedidos DROP COLUMN id_usuario;

ALTER TABLE pedidos ADD COLUMN id_usuario INT NOT NULL;

ALTER TABLE pedidos ADD CONSTRAINT fk_pedidoUsuario FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario);

ALTER TABLE pedidos ADD COLUMN horario_pedido VARCHAR(8);

ALTER TABLE pedidos DROP COLUMN horario_pedido;

CREATE TABLE banho(
	id_banho INT AUTO_INCREMENT,
    nome_banho VARCHAR (15),
    PRIMARY KEY(id_banho)
);

ALTER TABLE produto DROP COLUMN banho_produto;
ALTER TABLE produto ADD COLUMN id_banho INT NOT NULL;
ALTER TABLE produto ADD CONSTRAINT fk_banho FOREIGN KEY (id_banho) REFERENCES banho (id_banho);

INSERT INTO banho (nome_banho) VALUE ('Ouro');
INSERT INTO banho (nome_banho) VALUE ('Ouro Banho');

ALTER TABLE produto ADD COLUMN promocao INT;
ALTER TABLE tipo_produto ADD COLUMN promocao INT;

CREATE TABLE promocao(
	id_promo INT AUTO_INCREMENT,
    nome_promo VARCHAR(50),
    codigo_promo VARCHAR(30),
    img_promo VARCHAR(200),
    ativo_promo BOOLEAN,
    PRIMARY KEY(id_promo)
);





