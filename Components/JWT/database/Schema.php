<?php

$sql = "
create table users
(
	id int auto_increment,
	email varchar(255) not null,
	password varchar(255) not null,
	created_at timestamp default CURRENT_TIME null,
	updated_at timestamp null,
	constraint users_pk
		primary key (id)
);
";