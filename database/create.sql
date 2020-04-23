CREATE TABLE motoboy(
    id_motoboy INT AUTO_INCREMENT,
    nome VARCHAR (100) NOT NULL,
    PRIMARY KEY (id_motoboy)
);

CREATE TABLE lanche(
    id_lanche INT AUTO_INCREMENT,
    nome VARCHAR (100) NOT NULL,
    PRIMARY KEY (id_lanche)
);

CREATE TABLE situacao(
    id_situacao INT AUTO_INCREMENT,
    nome VARCHAR (30) NOT NULL,
    PRIMARY KEY (id_situacao)
);

CREATE TABLE bairro(
    id_bairro INT AUTO_INCREMENT,
    nome VARCHAR (100) NOT NULL UNIQUE,
    PRIMARY KEY (id_bairro)
);

CREATE TABLE pedido(
    id_pedido INT AUTO_INCREMENT,
    id_motoboy INT,
    id_bairro INT,
    id_situacao INT,
    PRIMARY KEY (id_pedido),
    FOREIGN KEY (id_motoboy) REFERENCES motoboy (id_motoboy) ON DELETE RESTRICT ON UPDATE RESTRICT,
    FOREIGN KEY (id_bairro) REFERENCES bairro (id_bairro) ON DELETE RESTRICT ON UPDATE RESTRICT,
    FOREIGN KEY (id_situacao) REFERENCES situacao (id_situacao) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE lanche_pedido(
    id_pedido INT,
    id_lanche INT,
    quantidade INT,
    FOREIGN KEY (id_pedido) REFERENCES pedido (id_pedido) ON DELETE RESTRICT ON UPDATE RESTRICT,
    FOREIGN KEY (id_lanche) REFERENCES lanche (id_lanche) ON DELETE RESTRICT ON UPDATE RESTRICT
);