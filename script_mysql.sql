CREATE DATABASE db_mvc DEFAULT CHARACTER SET utf8;
USE db_mvc;

CREATE TABLE `medicamentos` (
    `idmedicamentos` int NOT NULL AUTO_INCREMENT,
    `nome` varchar(445) DEFAULT NULL,
    `laboratorio` varchar(445) DEFAULT NULL,
    `quantidade` varchar(445) DEFAULT NULL,
    `precoCompra` double(10,2) DEFAULT NULL,
    `precoVenda` double(10,2) DEFAULT NULL,
    `data` date DEFAULT NULL,
    `flag` int DEFAULT NULL,
    PRIMARY KEY (`idmedicamentos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3