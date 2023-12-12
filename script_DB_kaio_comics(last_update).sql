CREATE DATABASE kaiocomics;
use kaiocomics;
/* table*/
CREATE TABLE users(
	id_users int primary key not null auto_increment,
	pseudo_users varchar(50) not null unique,
	first_name_users varchar(50) not null,
	name_users varchar(50) not null,
	email_users varchar(50) not null unique,
	password_users varchar(100) not null,
	description_users text,
    users_profile_picture varchar(60),
    users_front_picture varchar(60),
	active_users tinyint(1) default 0,
	status_users varchar(50),
	id_role int
)engine=InnoDB;
CREATE TABLE  users_post(
	id_users_post int primary key not null auto_increment,
    message_post varchar(255),
    date_creation datetime,
    picture_post varchar(100),
    id_author int
    )engine=InnoDB;
CREATE TABLE  comments(
	id_comments int primary key not null auto_increment,
	content_comments varchar(255),
	date_comments datetime,
	active_comments tinyint(1) default 0,
	id_author int
)engine=InnoDB;
CREATE TABLE  category(
	id_category int primary key not null auto_increment,
	name_category varchar(50)
)engine=InnoDB;
CREATE TABLE  roles(
	id_roles int primary key not null auto_increment,
	name_roles varchar(50)
)engine=InnoDB;
CREATE TABLE  comics(
id_comic int primary key not null auto_increment,
title_comic varchar(50) not null,
summary text,
cover varchar(250),
date_posting date,
id_author int,
id_category int
)engine=InnoDB;
CREATE TABLE  chapters(
id_chapter int primary key not null auto_increment,
count_pages int,
summary_chapter text,
number_chapter int,
title_chapter varchar(50)
)engine=InnoDB;
CREATE TABLE  pages(
id_page int primary key not null auto_increment,
page_picture varchar(80),
number_page int,
id_comic int,
id_chapter int
)engine=InnoDB;

/* table d'association*/
CREATE TABLE  to_like(
	id_users int,
    id_users_post int,
    date_like date,
    like_or_not tinyint(1) default 0
)engine=InnoDB;
CREATE TABLE  to_subscribe(
	id_subscribe int,
    id_users int
)engine=InnoDB;

/* contraintes table */

ALTER TABLE users
add constraint fk_have_roles
foreign key (id_role)
references roles(id_roles);

ALTER TABLE users_post
add constraint fk_author_post
foreign key (id_author)
references users(id_users);

ALTER TABLE comments
add constraint fk_author_comments
foreign key (id_author)
references users(id_users);

ALTER TABLE comics
add constraint fk_id_author_comics
foreign key (id_author)
references users(id_users);

ALTER TABLE comics
add constraint fk_category_comics
foreign key (id_category)
references category(id_category);

ALTER TABLE pages
add constraint fk_id_comic
foreign key (id_comic)
references comics(id_comic);

ALTER TABLE to_like
add constraint fk_author_like
foreign key (id_users)
references users(id_users);

ALTER TABLE to_like
add constraint fk_post_like
foreign key (id_users_post)
references users_post(id_users_post);

ALTER TABLE to_subscribe
add constraint fk_id_subscribe
foreign key (id_subscribe)
references users(id_users);

ALTER TABLE to_subscribe
add constraint fk_users_subscribe
foreign key (id_users)
references users(id_users);
