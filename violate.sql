-- This insertion violates primary key constraint since Movie already contains a row with id = 2;
insert into Movie values(2, "Hello", 2000, "R", "Hello Pictures");
-- ERROR 1062 (23000): Duplicate entry '2' for key 'PRIMARY'

-- This insertion violates primary key constraint since Actor already contains a row with id = 1;
insert into Actor values(1, "Shuang", "Wang", "Female", "19941211", null);
-- ERROR 1062 (23000): Duplicate entry '1' for key 'PRIMARY'

-- This insertion violates primary key constraint since Director already contains a row with id = 16;
insert into Director values(16, "Shuang", "Wang", "19941211", null);
-- ERROR 1062 (23000): Duplicate entry '16' for key 'PRIMARY'

-- This insertion violates referential integrity constraint since there is no row with key id = 1 in Movie;
insert into MovieGenre values(1, "Love");
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieGenre`, CONSTRAINT `MovieGenre_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))

-- This insertion violates referential integrity constraint since there is no row with key id = 1 in Movie;
insert into MovieActor values(1, 1, "Lead");
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))

-- This insertion violates referential integrity constraint since there is no row with key id = 2 in Actor;
insert into MovieActor values(2, 2, "Lead");
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieActor`, CONSTRAINT `MovieActor_ibfk_2` FOREIGN KEY (`aid`) REFERENCES `Actor` (`id`))

-- This insertion violates referential integrity constraint since there is no row with key id = 1 in Movie;
insert into Review values("shuang", '2013-08-05 18:19:03', 1, 5, null);
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`TEST`.`Review`, CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))

-- This insertion violates referential integrity constraint since there is no row with key id = 1 in Movie;
insert into MovieDirector values(1 , 20);
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `Movie` (`id`))

-- This insertion violates referential integrity constraint because there is no row with key id = 10 in Director;
insert into MovieDirector values(2, 10);
-- ERROR 1452 (23000): Cannot add or update a child row: a foreign key constraint fails (`TEST`.`MovieDirector`, CONSTRAINT `MovieDirector_ibfk_2` FOREIGN KEY (`did`) REFERENCES `Director` (`id`))

-- Violate CHECK constraint because dod must <= GetDate()
insert into Actor(1, "last", "first", "male", "19500909", "20200202");

-- Violate CHECK constraint because rating must be >= 0 and <= 5
insert into Review values("shuang", '2013-08-05 18:19:03', 2, 6, null);

-- Violate CHECK constraint because year must be >0
insert into Movie values(5000, "Hello", -1, "R", "Hello Pictures");