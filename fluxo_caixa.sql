--
-- Banco de Dados: `fluxocaixa`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `senha` varchar(25) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=23;

CREATE TABLE conta (
  id INT(11) NOT NULL AUTO_INCREMENT,
  conta_id INT(11) NULL,
  nome VARCHAR(100) NOT NULL,
  flag_tipo SMALLINT(1) UNSIGNED NOT NULL,
  PRIMARY KEY(id),
  INDEX fk_conta_conta(conta_id)
);

CREATE TABLE fluxo (
  id INT(11) NOT NULL AUTO_INCREMENT,
  conta_id INT(11) NOT NULL,
  descricao VARCHAR(255) NOT NULL,
  dt_fluxo DATE NOT NULL,
  valor FLOAT(8,2) NOT NULL,
  PRIMARY KEY(id),
  INDEX fk_fluxo_conta(conta_id)
);
