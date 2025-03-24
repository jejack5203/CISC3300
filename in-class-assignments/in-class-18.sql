CREATE DATABASE `in_class_17`;

CREATE TABLE `users`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `firstName`      varchar(80) NOT NULL,
    `lastName`      varchar(80) NOT NULL,
    primary key (`id`)
);

CREATE TABLE `usercomments`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `comment`   text NOT NULL,
--     foreign key
    `userID` int(11) NOT NULL,
    primary key (`id`)
);


insert into users (firstName, lastName)
values ('Jessica', 'David');
insert into users (firstName, lastName)
values ('Bethany', 'Shaw');
insert into users (firstName, lastName)
values ('Sheri', 'Fitzgerald');
insert into users (firstName, lastName)
values ('Jodie', 'Jackson');
insert into users (firstName, lastName)
values ('Chiann', 'Minns');
insert into users (firstName, lastName)
values ('Sheldon', 'Garrick');
insert into users (firstName, lastName)
values ('Ariana', 'Paisley');



insert into usercomments (comment, userID)
values ('Hello Guys', 1);
insert into usercomments (comment, userID)
values ('Hello', 2);
insert into usercomments (comment, userID)
values ('Today is Monday', 6);
insert into usercomments (comment, userID)
values ('I am hungry', 3);

--Write a query to return all users and their comments if they have comments or not.
select * from users left join usercomments on users.id = usercomments.userID;

-- Write a query to return all users and their comments only if they have comments.
select * from users join usercomments on users.id = usercomments.userID;