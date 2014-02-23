CREATE TABLE electronic_parts (
  id		       	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name           VARCHAR(255),
  conrad_number  VARCHAR(255),
  conrad_price   VARCHAR(255),
  reichelt_number VARCHAR(255),
  reichelt_price  VARCHAR(255),
  additional_number VARCHAR(255),
  additional_price  VARCHAR(255),
  selection      VARCHAR(255),
  project_id    INT UNSIGNED,
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

ALTER TABLE electronic_parts ADD CONSTRAINT uk_parts__conrad_number UNIQUE (conrad_number);
ALTER TABLE electronic_parts ADD CONSTRAINT uk_parts__reichelt_number UNIQUE (reichelt_number);
ALTER TABLE electronic_parts ADD CONSTRAINT uk_parts__additional_number UNIQUE (additional_number);

ALTER TABLE electronic_parts ADD CONSTRAINT fk_electronic_parts__projects
  FOREIGN KEY(project_id) REFERENCES projects(id);