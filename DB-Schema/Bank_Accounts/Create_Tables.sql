CREATE TABLE bank_type (
  id		       	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  type     		   VARCHAR(255) NOT NULL,
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

CREATE TABLE bank (
  id		       	   INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name     		     VARCHAR(255) NOT NULL,
  product  		     VARCHAR(255),
  iban             VARCHAR(22),
  bic              VARCHAR(11),
  rate_of_interest DEC(3,3),
  rate_available   DATETIME,
  exemption_order_for_capital_gains INT(4),
  exemption_order_available         DATETIME,
  exemption_order_used              DEC(4,2),
  exemption_order_proof             DATETIME,
  bank_balance                      DEC(6,2),
  bank_balance_proof                DATETIME,
  bank_type_id   INT UNSIGNED,
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

ALTER TABLE bank ADD CONSTRAINT fk_bank_bank_type
  FOREIGN KEY(bank_type_id) REFERENCES bank_type(id);