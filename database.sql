CREATE TABLE IF NOT EXISTS surveys(
  id int NOT NULL primary key AUTO_INCREMENT comment 'primary key',
  name varchar(100) comment 'name of survey'
) default charset utf8 comment '';
SELECT
  *
FROM
  surveys;
CREATE TABLE IF NOT EXISTS questions(
    id int NOT NULL primary key AUTO_INCREMENT comment 'primary key',
    question varchar(100) comment 'the question',
    answers int COMMENT 'the possible answers not nesesary?',
    s_id int NOT NULL COMMENT 'Survey id',
    answerslable VARCHAR (20) COMMENT 'answers display name not nesesary?'
  ) default charset utf8 comment '';
CREATE TABLE IF NOT EXISTS results(
    id int NOT NULL primary key AUTO_INCREMENT comment 'primary key',
    q_id int NOT NULL COMMENT 'Question id',
    result INT comment 'answer to question in survey'
  ) default charset utf8 comment '';
-- foreign keys
ALTER TABLE
  questions
ADD
  CONSTRAINT questions_surveys FOREIGN KEY (s_id) REFERENCES surveys (id);
-- foreign keys
ALTER TABLE
  resluts
ADD
  CONSTRAINT resutls_questions FOREIGN KEY (q_id) REFERENCES questions (id);
UPDATE
  questions
SET
  s_id = 12,
  question = 'Gillar du Sushi?'
Where
  id = 1;
insert INTO
  -- skapa fråga 1
  questions(question, s_id)
VALUES
  ('Gillar du sushi?', 12);
insert INTO
  results(q_id, result)
VALUES
  (1, 1);
insert INTO
  -- skapa fråga 2
  questions(question, s_id)
VALUES
  ('Gillar du pizza?', 12);
insert INTO
  results(q_id, result)
VALUES
  (2, 1);