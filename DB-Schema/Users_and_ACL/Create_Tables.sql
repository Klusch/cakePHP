CREATE TABLE groups (
    id        INTEGER AUTO_INCREMENT,
    name      VARCHAR(100) NOT NULL,
    created   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified  TIMESTAMP,
    CONSTRAINT uc_groupName PRIMARY KEY(id),
    UNIQUE (name)    
) CHARSET=utf8;

CREATE TABLE users (
    id        INTEGER AUTO_INCREMENT,
    username  VARCHAR(255) NOT NULL,
    password  CHAR(40) NOT NULL,
    group_id  INTEGER NOT NULL,
    created   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified  TIMESTAMP,
    PRIMARY KEY(id),
    CONSTRAINT uc_userUsername UNIQUE (username),
    CONSTRAINT fk_user__group FOREIGN KEY(group_id) REFERENCES groups(id)
) CHARSET=utf8;

CREATE TABLE aros (
  id          INTEGER AUTO_INCREMENT,
  parent_id   INTEGER DEFAULT NULL,
  model       VARCHAR(255) DEFAULT '',
  foreign_key INTEGER DEFAULT NULL,
  alias       VARCHAR(255) DEFAULT '',
  lft         INTEGER DEFAULT null,
  rght        INTEGER DEFAULT NULL,
  PRIMARY KEY  (id)
) CHARSET=utf8;

CREATE INDEX aros_index ON aros (lft, rght);

CREATE TABLE acos (
  id          INTEGER AUTO_INCREMENT,
  parent_id   INTEGER DEFAULT NULL,
  model       VARCHAR(255) DEFAULT '',
  foreign_key INTEGER DEFAULT NULL,
  alias       varchar(255) DEFAULT '',
  lft         INTEGER DEFAULT NULL,
  rght        INTEGER DEFAULT NULL,
  PRIMARY KEY  (id)
) CHARSET=utf8;

CREATE INDEX acos_index ON acos (lft, rght);

CREATE TABLE aros_acos (
  id       INTEGER AUTO_INCREMENT,
  aro_id   INTEGER NOT NULL,
  aco_id   INTEGER NOT NULL,
  _create  CHAR(2) NOT NULL DEFAULT 0,
  _read    CHAR(2) NOT NULL DEFAULT 0,
  _update  CHAR(2) NOT NULL DEFAULT 0,
  _delete  CHAR(2) NOT NULL DEFAULT 0,
  PRIMARY KEY(id),
  CONSTRAINT fk_aros_acos__aros FOREIGN KEY(aro_id) REFERENCES aros(id),
  CONSTRAINT fk_aros_acos__acos FOREIGN KEY(aco_id) REFERENCES acos(id)    
) CHARSET=utf8;

