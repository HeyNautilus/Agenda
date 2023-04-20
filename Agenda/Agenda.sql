use agenda;
CREATE TABLE contatos(
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(150),
telefone VARCHAR(20),
observacao TEXT
);

use agenda;
describe contatos;

INSERT INTO contatos (nome, telefone, observacao) VALUES('Maria', '(61)983951104', 'observação 1');
INSERT INTO contatos (nome, telefone, observacao) VALUES('joaquim', '(62)983951004', 'observação 2');
INSERT INTO contatos (nome, telefone, observacao) VALUES('Tereza', '(84)984451004', 'observação 3');