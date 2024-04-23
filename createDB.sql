create table registered
(
    id         int auto_increment,
    first_name varchar(50)  not null,
    last_name  varchar(50)  not null,
    email      varchar(255) not null,
    constraint registered_pk
        primary key (id),
    constraint unique_row
        unique (first_name, last_name, email)
);