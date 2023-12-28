START TRANSACTION;

DROP SCHEMA IF EXISTS `Sushimi`;
CREATE SCHEMA IF NOT EXISTS `Sushimi` DEFAULT CHARACTER SET utf8;

-- ===================================
-- CREATE TABLE
-- ===================================
CREATE TABLE IF NOT EXISTS Sushimi.Usuario (
    CodUsuario TINYINT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(80) NOT NULL,
    Email VARCHAR(50) NOT NULL,
    Senha VARCHAR(50) NOT NULL,
    PRIMARY KEY (CodUsuario)
);

CREATE TABLE IF NOT EXISTS Sushimi.Cardapio (
    CodCardapio TINYINT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
    Descricao TEXT NOT NULL,
    PRIMARY KEY (CodCardapio)
);

CREATE TABLE IF NOT EXISTS Sushimi.Produto (
    CodProduto INT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(50) NOT NULL,
    Preco DECIMAL(4,2) NOT NULL,
    CodCardapio TINYINT NOT NULL,
    PRIMARY KEY (CodProduto),
    FOREIGN KEY (CodCardapio) REFERENCES Sushimi.Cardapio(CodCardapio)
);

CREATE TABLE IF NOT EXISTS Sushimi.EnderecoCliente (
    CodEnderecoCliente INT NOT NULL AUTO_INCREMENT,
    CEP CHAR(8) NOT NULL UNIQUE,
    Municipio VARCHAR(50) NOT NULL,
    PRIMARY KEY (CodEnderecoCliente)
);

CREATE TABLE IF NOT EXISTS Sushimi.Cliente (
    CodCliente INT NOT NULL AUTO_INCREMENT,
    Nome VARCHAR(80) NOT NULL,
    NumeroEndereco INT NOT NULL,
    Logradouro VARCHAR(50) NOT NULL,
    ComplementoEndereco VARCHAR(50),
    CodEnderecoCliente INT NOT NULL,
    PRIMARY KEY (CodCliente),
    FOREIGN KEY (CodEnderecoCliente) REFERENCES Sushimi.EnderecoCliente(CodEnderecoCliente)
);

CREATE TABLE IF NOT EXISTS Sushimi.StatusPedido (
    CodStatusPedido TINYINT NOT NULL AUTO_INCREMENT,
    Descricao TEXT NOT NULL,
    PRIMARY KEY (CodStatusPedido)
);

CREATE TABLE IF NOT EXISTS Sushimi.Pedido (
    CodPedido INT NOT NULL AUTO_INCREMENT,
    DataEmissao DATE NOT NULL,
    Observacao TEXT,
    CodStatusPedido TINYINT NOT NULL,
    CodCliente INT NOT NULL,
    PRIMARY KEY (CodPedido),
    FOREIGN KEY (CodStatusPedido) REFERENCES Sushimi.StatusPedido(CodStatusPedido),
    FOREIGN KEY (CodCliente) REFERENCES Sushimi.Cliente(CodCliente)
);

CREATE TABLE IF NOT EXISTS Sushimi.Produto_has_Pedido (
    CodProduto INT NOT NULL,
    CodPedido INT NOT NULL,
    Quantidade SMALLINT NOT NULL,
    PRIMARY KEY (CodProduto, CodPedido),
    FOREIGN KEY (CodProduto) REFERENCES Sushimi.Produto(CodProduto),
    FOREIGN KEY (CodPedido) REFERENCES Sushimi.Pedido(CodPedido)
);

CREATE TABLE IF NOT EXISTS Sushimi.TelefoneCliente (
    Numero VARCHAR(20) NOT NULL,
    CodCliente INT NOT NULL,
    PRIMARY KEY (CodCliente, Numero),
    FOREIGN KEY (CodCliente) REFERENCES Sushimi.Cliente(CodCliente)
);

-- ===================================
-- INSERT INTO
-- ===================================
INSERT INTO Sushimi.Usuario (Nome, Email, Senha) VALUES
("Camila Harumi", "camilaharumi@gmail.com", md5("Harumi123!")),
("Visitante 1", "visitante1@gmail.com", md5("Visitante2!")),
("Visitante 2", "visitante2@gmail.com", md5("Visitante3!"));

INSERT INTO Sushimi.Cardapio (Nome, Descricao) VALUES
("Sushi", "Cardápio de sushi."),
("Outros", "Cardápio de variedades.");

INSERT INTO Sushimi.Produto (Nome, Preco, CodCardapio) VALUES
("Sushi tradicional (8 unidades)", 18.00, 1),
("Uramaki (8 unidades)", 20.00, 1),
("Hot roll (8 unidades)", 20.00, 1),
("Sashimi de salmão", 15.00, 1),
("Sashimi de tilápia", 12.00, 1),
("Onigiri de atum e maionese", 7.50, 1);

INSERT INTO Sushimi.EnderecoCliente (CEP, Municipio) VALUES
("87920000", "Santa Cruz do Monte Castelo"),
("88900000", "Santa Isabel do Ivaí"),
("87930000", "Querência do Norte");

INSERT INTO Sushimi.Cliente (Nome, NumeroEndereco, Logradouro, ComplementoEndereco, CodEnderecoCliente) VALUES
("Maria", 195, "Rua Tocantins", "Casa", 1),
("Ana", 777, "Av. Brasil", "Casa", 1),
("João", 549, "Av. Brasil", "Casa", 1),
("Pedro", 1011, "Av. Paraná", "Casa", 2),
("Júlia", 1213, "Rua Amazonas", "Casa", 3);

INSERT INTO Sushimi.StatusPedido (Descricao) VALUES
("Em preparação"),
("Entregue");

INSERT INTO Sushimi.TelefoneCliente (Numero, CodCliente) VALUES
("44989898989", 1),
("44994581255", 1),
("44974747474", 2),
("44912121212", 3),
("44987445655", 3),
("44991919191", 4),
("44925252525", 5);

INSERT INTO Sushimi.Pedido (DataEmissao, Observacao, CodStatusPedido, CodCliente) VALUES
("2023-11-07", "Uramaki sem creamcheese.", 2, 1),
("2023-11-07", null, 2, 2),
("2023-11-09", null, 2, 3),
("2023-11-10", "Sushi tradicional sem ovo e sem peixe.", 1, 4),
("2023-11-14", null, 1, 5),
("2023-11-14", null, 1, 2);

INSERT INTO Sushimi.Produto_has_Pedido (CodProduto, CodPedido, Quantidade) VALUES
(1, 1, 1),
(2, 1, 1),
(6, 2, 3),
(2, 3, 2),
(5, 4, 1),
(1, 4, 1),
(3, 5, 2),
(1, 6, 2);

-- ===================================
-- SELECT * FROM
-- ===================================
SELECT * FROM Sushimi.Usuario;
SELECT * FROM Sushimi.Cardapio;
SELECT * FROM Sushimi.Produto;
SELECT * FROM Sushimi.EnderecoCliente;
SELECT * FROM Sushimi.Cliente;
SELECT * FROM Sushimi.StatusPedido;
SELECT * FROM Sushimi.Produto_has_Pedido;
SELECT * FROM Sushimi.TelefoneCliente;