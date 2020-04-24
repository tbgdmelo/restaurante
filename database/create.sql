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

CREATE TABLE pedido(
    id_pedido INT AUTO_INCREMENT,
    id_motoboy INT,
    id_situacao INT,
    data_pedido DATE,
    PRIMARY KEY (id_pedido),
    FOREIGN KEY (id_motoboy) REFERENCES motoboy (id_motoboy) ON DELETE RESTRICT ON UPDATE RESTRICT,
    FOREIGN KEY (id_situacao) REFERENCES situacao (id_situacao) ON DELETE RESTRICT ON UPDATE CASCADE
);
