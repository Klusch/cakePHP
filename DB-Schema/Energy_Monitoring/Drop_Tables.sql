
--ALTER TABLE additions_washing_machines DROP FOREIGN KEY fk_additions_washing_machines__additions;
--ALTER TABLE additions_washing_machines DROP FOREIGN KEY fk_additions_washing_machines__washing_machine;
DROP TABLE additions_washing_machines;
DROP TABLE addition;
ALTER TABLE washing_machines DROP FOREIGN KEY fk_washing_machine__program;
ALTER TABLE washing_machines DROP FOREIGN KEY fk_washing_machine__temperature;
ALTER TABLE washing_machines DROP FOREIGN KEY fk_washing_machine__spin;
ALTER TABLE washing_machines DROP FOREIGN KEY fk_washing_machine__unit;
DROP TABLE washing_machines;
DROP TABLE programs;
ALTER TABLE temperatures DROP FOREIGN KEY fk_temperatures__units;
DROP TABLE temperatures;
ALTER TABLE spins DROP FOREIGN KEY fk_spins__units;
DROP TABLE spins;
DROP TABLE units;