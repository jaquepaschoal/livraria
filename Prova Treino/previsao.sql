CREATE TABLE previsao (
  idprevisao INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nome_cidade VARCHAR(80) NULL,
  codigo_cidade INTEGER UNSIGNED NULL,
  uf VARCHAR(2) NULL,
  maxima INTEGER UNSIGNED NULL,
  minima INTEGER UNSIGNED NULL,
  data_previsao DATE NULL,
  PRIMARY KEY(idprevisao)
);


