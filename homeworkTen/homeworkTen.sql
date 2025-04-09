CREATE DATABASE `homeworkTen`;

CREATE TABLE `bakery`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `item`      varchar(80) NOT NULL,
    `price`     varchar (80) NOT NULL,
    primary key (`id`)

);

insert into bakery (item, price)
values ('brownie', '4.99');

insert into bakery (item, price)
values ('cupcake', '2.50');

insert into bakery (item, price)
values ('cakepop', '1.99');

insert into bakery (item, price)
values ('icecream cone', '3.99');
