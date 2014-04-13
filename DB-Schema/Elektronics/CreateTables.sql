CREATE TABLE electronic_parts (
  id		       	    INTEGER AUTO_INCREMENT,
  name              VARCHAR(255),
  conrad_number     VARCHAR(255),
  conrad_price      VARCHAR(255),
  reichelt_number   VARCHAR(255),
  reichelt_price    VARCHAR(255),
  additional_number VARCHAR(255),
  additional_price  VARCHAR(255),
  selection         VARCHAR(255),
  project_id        INTEGER,
  created           TIMESTAMP,
  modified          TIMESTAMP,
  PRIMARY KEY(id),
  CONSTRAINT uk_parts__conrad_number UNIQUE (conrad_number),
  CONSTRAINT uk_parts__reichelt_number UNIQUE (reichelt_number),
  CONSTRAINT uk_parts__additional_number UNIQUE (additional_number),
  CONSTRAINT fk_electronic_parts__projects FOREIGN KEY(project_id) REFERENCES projects(id)
);
