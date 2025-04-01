CREATE DATABASE `inclass_20`;

CREATE TABLE `posts`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `firstName`      varchar(80) NOT NULL,
    `lastName`      varchar(80) NOT NULL,
    `email`         varchar(254),
    primary key (`id`)
);

insert into posts (firstName, lastName, email)
values ('Jodie', 'Jackson', 'test1@example.com');

insert into posts (firstName, lastName, email)
values ('Black', 'Jack', 'test2@example.com');

insert into posts (firstName, lastName, email)
values ('Jake', 'Minns', 'test5@example.com');