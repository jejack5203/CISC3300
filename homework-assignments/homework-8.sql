CREATE DATABASE `homeworkEight`;

CREATE TABLE `notes`
(
	`id`        int(11) NOT NULL AUTO_INCREMENT,
    `title`      varchar(80) NOT NULL,
    `description`      text NOT NULL,
    primary key (`id`)

);

insert into notes (title, description)
values ('book1', 'Catcher in the Rye');

insert into notes (title, description)
values ('book2', 'A Child Called It');

insert into notes (title, description)
values ('book4', 'Hatchet');

insert into notes (title, description)
values ('book5', 'Rich Dad Poor Dad');


update notes SET title = 'book3' where id = 3;

delete from notes where id = 4;


--select all notes and order them by name in reverse alphabetical order

select * from notes order by title desc;

--select the second note in the table only, assume that you don’t know the ID number of it

select * from notes limit 1 offset 1;


--select all notes that have descriptions which contain vowels

select * from notes where description like '%a%' or description like '%e%' or description like '%i%' or description like '%o%' or description like '%u%';
