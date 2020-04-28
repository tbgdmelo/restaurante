CREATE TABLE motoboy(
    id_motoboy INT AUTO_INCREMENT,
    nome VARCHAR (100) NOT NULL,
    PRIMARY KEY (id_motoboy)
);

CREATE TABLE situacao(
    id_situacao INT AUTO_INCREMENT,
    nome VARCHAR (30) NOT NULL,
    PRIMARY KEY (id_situacao)
);

CREATE TABLE carne(
    id_carne INT AUTO_INCREMENT,
    nome VARCHAR (150),
    PRIMARY KEY (id_carne)
);

CREATE TABLE pedido_carne_nobre(
    id_pedido INT,
    id_carne INT,
    id_situacao INT,
    PRIMARY KEY (id_pedido),
    FOREIGN KEY (id_carne) REFERENCES carne (id_carne) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (id_situacao) REFERENCES situacao (id_situacao) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE pedido(
    id_pedido INT,
    id_motoboy INT,
    id_situacao INT,
    PRIMARY KEY (id_pedido),
    FOREIGN KEY (id_motoboy) REFERENCES motoboy (id_motoboy) ON DELETE RESTRICT ON UPDATE RESTRICT,
    FOREIGN KEY (id_situacao) REFERENCES situacao (id_situacao) ON DELETE RESTRICT ON UPDATE CASCADE
);


