create table owners (
    id int primary key,
    name varchar(32)
);

create table servers (
    id int primary key,
    name varchar(32),
    owner int
);
ALTER TABLE servers ADD CONSTRAINT fk_owner FOREIGN KEY (owner) REFERENCES owners(id);

create table ip (
    id int primary key,
    IP varchar(32),
    description text,
    server_id int
);
ALTER TABLE ip ADD CONSTRAINT fk_server FOREIGN KEY (server_id) REFERENCES servers(id);

insert into owners values (1, 'owner1');
insert into owners values (2, 'owner2');
insert into owners values (3, 'owner3');


insert into servers values (1, 'server1', 1);
insert into servers values (2, 'server2', 2);
insert into servers values (3, 'server3', 3);

insert into ip values (1, '100.100.100.1', 'server1 ip', 1);
insert into ip values (2, '100.100.100.2', 'server2 ip', 2);