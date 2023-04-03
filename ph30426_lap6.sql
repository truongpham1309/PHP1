create database ph30426_lap6;
use ph30426_lap6;

create table chuyenmuc(
    id_cm int(5) not null primary key auto_increment,
    name_cm varchar(100)
);
create table baiviet(
    id_bv int(5) not null primary key auto_increment,
    title varchar(100),
    images varchar(100),
    descriptions text,
    content text,
    views int(5),
    id_cm int(5),
    ngaydang timestamp not null default current_timestamp()
);
alter table baiviet add constraint fk_cm_bv foreign key(id_cm) references chuyenmuc(id_cm); 