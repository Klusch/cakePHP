CREATE TABLE bank_type (
  id		       	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  type     		   VARCHAR(255) NOT NULL,
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

CREATE TABLE bank (
  id		       	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name     		   VARCHAR(255) NOT NULL,
  bank_type_id   INT UNSIGNED,
  iban           VARCHAR(22),
  bic            VARCHAR(11),
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

ALTER TABLE bank ADD CONSTRAINT fk_bank_bank_type
  FOREIGN KEY(bank_type_id) REFERENCES bank_type(id);
