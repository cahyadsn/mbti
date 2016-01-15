
DROP TABLE IF EXISTS tbl_statements;
CREATE TABLE IF NOT EXISTS tbl_statements(
  id INT NOT NULL AUTO_INCREMENT,
  statement1 VARCHAR(255),
  statement2 VARCHAR(255),
  type1 CHAR(1),
  type2 CHAR(1),
  PRIMARY KEY (id)
) ENGINE=MyISAM;

DROP TABLE IF EXISTS tbl_interprestation;
CREATE TABLE IF NOT EXISTS tbl_interprestation(
  symbol CHAR(4) NOT NULL,
  short VARCHAR(30) NOT NULL,
  description VARCHAR(512) NOT NULL,
  improvement VARCHAR(512) NOT NULL,
  profession VARCHAR(255) NOT NULL,
  partner VARCHAR(50) NOT NULL,
  PRIMARY KEY (symbol)
);
