CREATE TABLE status (
  id		       	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name           VARCHAR(255),
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

CREATE TABLE movie_categories (
  id		       	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name           VARCHAR(255),
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

ALTER TABLE movie_categories ADD CONSTRAINT uc_movie_categories UNIQUE (name);

CREATE TABLE movies (
  id		       	      INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name                VARCHAR(255),
  part                VARCHAR(255),
  category            VARCHAR(255),
  imdb_id             VARCHAR(255),
  picture_url         VARCHAR(255),
  movie_categories_id INT UNSIGNED,
  status_id           INT UNSIGNED,
  created             DATETIME,
  modified            DATETIME,
  PRIMARY KEY(id)
);

ALTER TABLE movies ADD CONSTRAINT fk_movies__status
  FOREIGN KEY(status_id) REFERENCES status(id);
  
ALTER TABLE movies ADD CONSTRAINT fk_movies__movie_categories
  FOREIGN KEY(movie_categories_id) REFERENCES movie_categories(id);  
  
ALTER TABLE movies ADD CONSTRAINT uc_movies UNIQUE (name, part);

CREATE TABLE imdbs (
  id		       	      INT UNSIGNED NOT NULL AUTO_INCREMENT,
  web                 VARCHAR(255),
  annotation          VARCHAR(255),
  created             DATETIME,
  modified            DATETIME,
  PRIMARY KEY(id)
);