CREATE TABLE IF NOT EXISTS surveys(  
    id int NOT NULL primary key AUTO_INCREMENT comment 'primary key',
    name varchar(100) comment 'name of survey'
) default charset utf8 comment '';

SELECT * FROM  surveys