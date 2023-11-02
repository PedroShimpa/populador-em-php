

CREATE DATABASE populador;

USE populador;

CREATE TABLE `clientes` (
    `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(196) NOT NULL,
    `sobrenome` VARCHAR(196) NOT NULL,
    `email` VARCHAR(196) NOT NULL, 
    `criado_em` TIMESTAMP  NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;