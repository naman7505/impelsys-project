
create table user_account(name varchar(20),password varchar(20),mobile varchar(20) unique,atype varchar(10));

select * from user_account;

alter table user_account rename column password to psswd;