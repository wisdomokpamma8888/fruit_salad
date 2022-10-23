CREATE DATABASE fruit_salad; 

CREATE TABLE fruits(
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL ,
    email VARCHAR(100) NOT NULL,
    title VARCHAR(100) NOT NULL,
    ingredient VARCHAR(100) NOT NULL
    
    
);
INSERT INTO `fruits`(`username`,`email`, `title`, `ingredient`) 
VALUES('okpamma wisdom', 'wisdomokpamma@gmail.com','african fruit salad','banana, paw-paw,pineapple')

CREATE TABLE Orders (
    ID int NOT NULL,
    OrderNumber int NOT NULL,
    OrderDate date DEFAULT GETDATE()
); 

INSERT INTO `fruits` (`id`, `username`, `email`, `title`, `ingredient`)
 VALUES (NULL, 'wisdom okpamma', 'wisdomokpamma@gmail.com', 'spanish fruit salad', 'bannana,apple,watermelon');