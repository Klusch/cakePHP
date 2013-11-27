CREATE TABLE category (
  id			INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name			VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE sub_category (
  id			INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name			VARCHAR(255) NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE cost (
  id			INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name			VARCHAR(255) NOT NULL,
  price			DECIMAL(10,2),
  category_id		INT UNSIGNED,
  sub_category_id	INT UNSIGNED,
  PRIMARY KEY(id)
);

ALTER TABLE cost ADD CONSTRAINT fk_cost_category
  FOREIGN KEY(category_id) REFERENCES category(id);
  
ALTER TABLE cost ADD CONSTRAINT fk_cost_subcategory
  FOREIGN KEY(sub_category_id) REFERENCES sub_category(id);  