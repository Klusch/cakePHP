CREATE TABLE programs (
  id		       	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  name           VARCHAR(255),
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

CREATE TABLE units (
  id		       	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  unit           VARCHAR(20),
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

CREATE TABLE temperatures (
  id		       	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  value          DOUBLE(5,2),
  unit_id        INT UNSIGNED,
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

ALTER TABLE temperatures ADD CONSTRAINT fk_temperatures__units
  FOREIGN KEY(unit_id) REFERENCES units(id);

CREATE TABLE spins (
  id		       	 INT UNSIGNED NOT NULL AUTO_INCREMENT,
  value          INT(4),
  unit_id        INT UNSIGNED, 
  created        DATETIME,
  modified       DATETIME,
  PRIMARY KEY(id)
);

ALTER TABLE spins ADD CONSTRAINT fk_spins__units
  FOREIGN KEY(unit_id) REFERENCES units(id);

CREATE TABLE additions (
  id		       	     INT UNSIGNED NOT NULL AUTO_INCREMENT,
  addition           VARCHAR(255),
  created            DATETIME,
  modified           DATETIME,
  PRIMARY KEY(id)
);

CREATE TABLE washing_machines (
  id		       	   INT UNSIGNED NOT NULL AUTO_INCREMENT,
  program_id	     INT UNSIGNED NOT NULL,
  temperature_id   INT UNSIGNED NOT NULL,
  spin_id          INT UNSIGNED NOT NULL,
  power_consumtion DOUBLE(7,3),
  unit_id          INT UNSIGNED,
  duration         INT(4),
  created          DATETIME,
  modified         DATETIME,
  PRIMARY KEY(id)
);

ALTER TABLE washing_machines ADD CONSTRAINT fk_washing_machine__program
  FOREIGN KEY(program_id) REFERENCES programs(id);

ALTER TABLE washing_machines ADD CONSTRAINT fk_washing_machine__temperature
  FOREIGN KEY(temperature_id) REFERENCES temperatures(id);

ALTER TABLE washing_machines ADD CONSTRAINT fk_washing_machine__spin
  FOREIGN KEY(spin_id) REFERENCES spins(id);
  
ALTER TABLE washing_machines ADD CONSTRAINT fk_washing_machine__unit
  FOREIGN KEY(unit_id) REFERENCES units(id);  
  
-- Linktable in alphabetic order
CREATE TABLE additions_washing_machines (
  id		       	     INT UNSIGNED NOT NULL AUTO_INCREMENT,
  addition_id        INT UNSIGNED NOT NULL,
  washing_machine_id INT UNSIGNED NOT NULL,
  PRIMARY KEY(id)
);

--ALTER TABLE additions_washing_machines ADD CONSTRAINT fk_additions_washing_machines__additions
--  FOREIGN KEY(addition_id) REFERENCES addition(id);

--ALTER TABLE additions_washing_machines ADD CONSTRAINT fk_additions_washing_machines__washing_machine
--  FOREIGN KEY(washing_machine_id) REFERENCES washing_machine(id);
-- ----------------------------------------

CREATE TABLE energy_consume (
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
