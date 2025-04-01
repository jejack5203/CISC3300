CREATE DATABASE `inclass_20`;

CREATE TABLE `posts`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `title`      varchar(80) NOT NULL,
    `description`      text NOT NULL,
    primary key (`id`)

);

insert into posts (title, description)
values ('post1', 'Catcher in the Rye');

insert into posts (title, description)
values ('post2', 'Jack', 'A Chile Called It');
