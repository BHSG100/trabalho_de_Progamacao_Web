CREATE TABLE noticias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome_da_noticia VARCHAR(255) NOT NULL,
  foto VARCHAR(255),
  descricao TEXT,
  data_de_postagem DATE
);
