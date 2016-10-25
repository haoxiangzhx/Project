#Give me the names of all the actors in the movie 'Die Another Day'. Please also make sure actor names are in this format:  <firstname> <lastname>   (seperated by single space, **very important**).
select concat(first, ' ', last) as name
from Movie as m, MovieActor as ma, Actor as a 
where m.title = 'Die Another Day' and m.id = ma.mid and ma.aid = a.id;

#Give me the count of all the actors who acted in multiple movies.
select count(*) from 
(select count(*) from MovieActor group by aid having count(*) > 1) c;

#Give me the count of all female actors.
select count(id) from Actor where sex='female';