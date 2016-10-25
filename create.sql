-- primary key constraint: id
-- CHECK constraint: year > 0
create table Movie(id int not null, title varchar(100) not null, year int, rating varchar(10), company varchar(50), primary key(id), check(year > 0));
-- primary key constraint: id
-- CHECK constraint: dod <= today
create table Actor(id int not null, last varchar(20), first varchar(20), sex varchar(6), dob date not null, dod date, primary key(id), check(dod <= GetDate()));

-- primary key constraint: id
create table Director(id int not null, last varchar(20), first varchar(20), dob date not null, dod date, primary key(id));

-- referential integrity constraint: mid references Movie(id)
create table MovieGenre(mid int, genre varchar(20), foreign key(mid) references Movie(id)) engine=innodb;

-- referential integrity constraints: mid references Movie(id), did references Director(id)
create table MovieDirector(mid int , did int, foreign key(mid) references Movie(id), foreign key(did) references Director(id)) engine=innodb;

-- referential integrity constraints: mid references Movie(id), aid references Actor(id)
create table MovieActor(mid int, aid int, role varchar(50), foreign key(mid) references Movie(id), foreign key(aid) references Actor(id)) engine=innodb;

-- referential integrity constraint: mid references Movie(id)
-- CHECK constraint: 0 <= rating <= 5
create table Review(name varchar(20), time timestamp, mid int, rating int, comment varchar(500), foreign key(mid) references Movie(id), check(rating >= 0 and rating <= 5)) engine=innodb;

create table MaxPersonID(id int);

create table MaxMovieID(id int);