CREATE TABLE IF NOT EXISTS students (
  cpf varchar(20) PRIMARY KEY,
  name text,
  email text
);

CREATE TABLE IF NOT EXISTS phones (
  area_code varchar(20),
  number varchar(20),
  student_cpf varchar(20),
  PRIMARY KEY (area_code, number),
  FOREIGN KEY (student_cpf) REFERENCES students(cpf)
);

CREATE TABLE IF NOT EXISTS indications (
  indicator_cpf varchar(20),
  indicated_cpf varchar(20),
  indication_date varchar(20),
  PRIMARY KEY (indicator_cpf, indicated_cpf),
  FOREIGN KEY (indicator_cpf) REFERENCES students(cpf),
  FOREIGN KEY (indicated_cpf) REFERENCES students(cpf)
);



