-- auto-generated definition
create table sessions
(
    id     int auto_increment,
    access int(255) not null,
    data   text     not null,
    constraint sessions_id_uindex
        unique (id)
);

alter table sessions
    add primary key (id);

