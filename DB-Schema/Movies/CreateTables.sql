CREATE TABLE status (
  id		       	 INTEGER AUTO_INCREMENT,
  name           VARCHAR(255),
  created        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  modified       TIMESTAMP,
  PRIMARY KEY(id)
);

CREATE TABLE movie_categories (
  id		       	 INTEGER AUTO_INCREMENT,
  name           VARCHAR(255),
  created        TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  modified       TIMESTAMP,
  PRIMARY KEY(id),
  CONSTRAINT uc_movie_categories UNIQUE (name)
);

CREATE TABLE movies (
  id		       	      INTEGER AUTO_INCREMENT,
  name                VARCHAR(255),
  part                VARCHAR(255),
  category            VARCHAR(255),
  imdb_nr             VARCHAR(255),
  picture_url         VARCHAR(255),
  movie_categories_id INTEGER,
  status_id           INTEGER,
  created             TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  modified            TIMESTAMP,
  PRIMARY KEY(id),
  CONSTRAINT uc_movies UNIQUE (name, part),
  CONSTRAINT fk_movies__status FOREIGN KEY(status_id) REFERENCES status(id),
  CONSTRAINT fk_movies__movie_categories FOREIGN KEY(movie_categories_id) REFERENCES movie_categories(id)
);
