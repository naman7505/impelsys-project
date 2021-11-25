select * from emps;
select * from dept;
select * from salgrade;


select * from emps where sal>
(select avg(Sal) from emps where deptno=(select deptno from emps where ename='ALLEN'));

-- select * from emps where sal>
-- (select avg(sal) from emps where deptno=30);

select * from emps where sal in(select max(Sal) from emps group by deptno) ;

select * from emps e1 where sal= ( select max(Sal) from emps e2 where e2.deptno=e1.deptno );

select empno,ename,sal,deptno,(select avg(Sal) from emps e2 where e2.deptno=e1.deptno) 
as avgsal from emps e1;

create or replace view emp_view1 as select empno,ename as empname,
sal as salary, job as desiganation,deptno from emps where
deptno in (10,20);
desc emp_view1;
select * from emp_view1 where deptno=10 and salary>1000 order by salary desc;
insert into emp_view1(empno,empname,salary,desiganation,deptno) values
 (1001,'Rohit',2000,'SDE',10); 
 insert into emp_view1 values
 (1002,'Rohan',2500,'Testing',30);
 select * from emp_view1;
 select * from emps;
 update emp_view1 set salary=salary+5;
 select * from emps;
 select * from emp_view1;
 delete from emp_view1 where deptno=30;
 rollback;
delete from emp_view1 where deptno=10;
select * from emps;
rollback;
insert into emp_view1(empno,empname,salary,deptno) values
 (1003,'Pritam',2000,30); 
 
SHOW full TABLES LIKE '%';
show full tables ;
show tables;
drop view emp_view1;
SHOW FULL TABLES where table_type ='VIEW';

create view emp_dept as select empno,ename, sal,emp.deptno as deptno,dname, loc
from emp inner join dept on emp.deptno=dept.deptno;

desc emp_dept;

select * from emp_dept;
select * from emp_dept where deptno=20;


create or replace view emp_dept as select empno ,ename,sal,emp.deptno,dname,
loc from emp inner join dept on emp.deptno=dept.deptno;

create or replace view emp_summary as 
select deptno,count(*) as noe, sum(Sal) as sumsal
from emps group by deptno;

select * from emp_summary;

update emp_summary set noe=8 where deptno=20;



#some solution on find nth highest or lowest
SELECT empno,ename,sal FROM Emps e WHERE
 1=(SELECT COUNT(DISTINCT Sal) FROM Emps p WHERE e.Sal<=p.Sal)    ;                                                                                                                                                                                             
SELECT empno,ename,sal FROM Emps e WHERE
 2=(SELECT COUNT(DISTINCT Sal) FROM Emps p WHERE e.Sal<=p.Sal )  ;
------------------
SELECT empno,ename,sal FROM Emp e WHERE
 3=(SELECT COUNT(DISTINCT Sal) FROM Emp p WHERE e.Sal<=p.Sal)  ;

 SELECT empno,ename,sal FROM Emp e WHERE
 2>=(SELECT COUNT(DISTINCT Sal) FROM Emp p WHERE e.Sal<=p.Sal)  ;
--------------------
SELECT empno,ename,sal FROM Emp e WHERE
 2>=(SELECT COUNT(DISTINCT Sal) FROM Emp p WHERE e.Sal>=p.Sal) ;
 
 ----------------------------------------------------------------------------------------------
 
-- SQL Table concept
 
1. Column level- associated with one column , described along with the field name or at end of table desc
2. table level- multiple columns , at end of table desc


CREATE TABLE student2(
    name VARCHAR(100) NOT NULL, 
    fname varchar(100) not null,
    dor DATE NOT NULL,
    marks INT NOT NULL,
    fees DEC(10 , 2 ) NOT NULL,
    course varchar(20),
    mobile varchar(10) unique ,
    grade char(1),
    primary key(name,fname),
    constraint check1001 check ( (course='B.Tech' and fees >100000) or  (course='B.C.A' and fees >80000))
);

alter table student2 add column email varchar(100) not null unique;
alter table student2 drop column email;
alter table  student2 rename column emai to emailid
alter table studnet2 modify emailid varchar(20)

delete :DML - delete the record based on condition ,where , temapoaray , rollback

truncate :DDL - cannot rollback, where is not allowed, sturcutre of tbale will remai, all data will lost, fast
drop:DDL - structure and data last will lost and cannot 

check Constraint: Business constarint
1. Sal >5000 and <=50000
2. Payrol , job wise salary
3. Dept in organization
 
 ---------------------------------------------------------------------------------------------------
 
 
 
--  PL/SQL
---------------------------------------------------------------------------------------------------
drop table temp1;

create table temp1(a int,b int,c int);


DELIMITER $$
drop procedure if exists mult_table $$
create procedure mult_table()
begin
declare x int default 5;
declare i int default 1;
declare mult int;
delete from temp1;
commit;
while(i<=10)
do
set mult=x*i;
insert into temp1(a,b,c) values(x,i,mult);
set i=i+1;
end while;
commit;
END$$
DELIMITER ;

call mult_table();
select * from temp1;

---------------------------------------------------------------------------------------------------

delimiter $$
drop procedure if exists cal_sum $$
delete from temp1 $$


create procedure cal_sum()
begin
declare a int default 10;
declare b,c int;
set a=a+100;
set b=200;
set c=300;
delete from temp1;
insert into temp1 values(a,b,c);
END $$

delimiter ;

call cal_sum();
select * from temp1;

------------------------------------------------------------------------------------------------------

delimiter $$
create procedure calculate()
begin
set @a=10;
set @a=@a+100;
END$$

delimiter ;

call calculate();
select @a;
select @a+100;

-------------------------------------------------------------------------------------------------
delimiter $$
drop procedure if exists cal_payroll $$

create procedure cal_payroll()
begin

declare eno1,mon1,year1 int;
declare bonus1,sal decimal(7,2);
declare user1 varchar(50);
drop table if exists tempbonus;
create table tempbonus (empno int, sal decimal(7,2),bonus decimal(7,2),mon int,year int,
 username varchar(50), primary key (empno,mon,year));
 END$$
 
 delimiter ;
 
 call cal_payroll();
 select * from tempbonus;
 
 ------------------------------------------------------------------------------------------
 delimiter $$
 drop procedure if exists cal_bonus1 $$
 create procedure cal_bonus1(in eno int, out bon int)
 begin
 declare jobb varchar(20);
 -- declare bonus float default 0;
 select job into jobb from emps where empno=eno;
 if jobb='MANAGER' then 
	set bon=3000;
 else
	set bon=4000;
    
end if;
end$$
delimiter ;

set @bonus=0;
select @bonus;
call cal_bonus1(7521, @b);
select @b;
select * from emps;
call cal_bonus1(7782,@c);
select @c;

------------------------------------------------------------------------------------------------------
delimiter $$
drop function if exists cal_bonus2 $$
create function cal_bonus2(eno int) returns integer
deterministic
begin
declare jobb varchar(20);
declare bon int;
select job into jobb from emps where empno=eno;
if jobb='MANAGER' then
	set bon=3000;
else
	set bon=4000;
end if;
return bon;
end$$
delimiter ;

set @b=0;
select @b;
set @b=cal_bonus2(7566);

select empno,ename,sal,job,cal_bonus2(empno) from emps where cal_bonus2(empno)>3500;

------------------------------------------------------------------------------------------------
# Assignment-1 Check the number is pallindrome or not

delimiter $$
drop procedure if exists palindrome_tf $$ 
create procedure palindrome_tf(in num int, out res varchar(10))

begin
	declare m int ;
	declare temp int default 0;
	declare rem int;
	set m=num;
	while num>0
	do
		set rem = mod(num,10);
		set temp=(temp*10)+rem;
		set num=truncate(num/10,0);
	end while; -- end of while loop here
      
    if m = temp
    then
        set res='TRUE';
    else
        set res='FALSE';
    end if;
end$$

delimiter ;


call palindrome_tf(12321, @r);
call palindrome_tf(12345, @r);
call palindrome_tf(141, @r);
call palindrome_tf(55, @r);
select @r;
 
--------------------------------------------------------------------------------------------------

# Assignment-3. Write a procedure which will calculate the exp of employee in years and return as out parameter.
--     [ empno as in , exp as out ]


delimiter $$
drop procedure if exists calc_exp $$
create procedure calc_exp(in eno int, out exp int)
begin
select timestampdiff(year,hiredate,current_date) from emps where empno=eno;
set exp=timestampdiff(year,hiredate,current_date);
end$$

delimiter ;

call calc_exp(7499,@e);

--------------------------------------------------------------------------------------------------------------------
# Assignment-4: Write a procedure which will display first n natural numbers in reverse order, [ N as in parameter ]  
drop table temp1;

create table temp1(a int);


DELIMITER $$
drop procedure if exists mult_table $$
create procedure nat_num(in num int)
begin
while num>0
do
insert into temp1(a) values(num);
set num=num-1;
end while;
commit;
END$$
DELIMITER ;

call nat_num(10);
select * from temp1;

-----------------------------------------------------------------------------------------------------------------------

# Assignment-2. Write a Procedure which will display the employee details in following format [ empno as in ]
   -- Emp Details
--    -----------
--    1276,Jack , 3000, Dept: 10


delimiter $$
begin;
SELECT CONCAT(empno, " , ", ename, " , ",sal," , "," Dept: ",deptno) AS Emp_Details
FROM emps;
end$$


------------------------------------------------------------------------------------------------------------------------

# Assignment-5. Implementing Logic: Create procedure which will display the following result.

-- [ No parameter passed ]
-- Display the bonus of all employees along with empno,empno,sal & deptno based on given conditions: 
-- Deptno	Job                                              Bonus
-- ---------	----------                             ----------------------------
-- 10            CLERK, SALESMAN                40% of sal
-- 20            MANAGER, SALESMAN         50% of sal
-- 30            MANAGER, ANALYST                60% of sal
-- OTHER                                                         25% of sal
-- Empno   Ename Job Deptno Bonus
-- ------	----------	----	------	---------
-- xxxx	xxxxx	xxx	xx	xxxxx
-- xxxx	xxxxx	xxx	xx	xxxxx
-- xxxx	xxxxx	xxx    xx      xxxxx

create table emp_bon(eno int,emp_name varchar(20),designation varchar(20),dno int,bonus decimal(7,2));
delimiter $$
begin ;
declare dno int;
declare jobb varchar(20);
select job,deptno into jobb,dno from emp where empno=eno;
if (jobb='CLERK' or jobb='SALESMAN') and dno=10  then
set bon= sal+40*sal/100;
elseif (jobb='MANAGER' or jobb='SALESMAN') and dno=20  then
set bon= sal+50*sal/100;
elseif (jobb='MANAGER' or jobb='ANALYST') and dno=30  then
set bon= sal+60*sal/100;
else
set bon= sal+60*sal/100;
end if;
-- while(i<=length(empno))

-- insert into emp_bon(eno int,emp_name varchar(20),designation varchar(20),dno int,bonus decimal(7,2)) 
-- values (empno,ename,job,deptno,bon);
-- i=i+1;
 
end$$

delimiter ;
select @bon;
---------------------------

DELIMITER $$
DROP procedure IF exists cal_bonus1   $$
CREATE PROCEDURE  cal_bonus1(in eno int , out bon int)
BEGIN 
declare jobb varchar(20);
declare dno int;
-- declare bonus float default 0;
select job,deptno into jobb,dno from emp where empno=eno;
if jobb='MANAGER' and dno=10 then
  set bon=3000;
elseif(jobb!='MANAGER' and dno=10) then
  set bon=4000;
elseif(jobb='MANAGER' and dno=20) then
  set bon=6000;
elseif(jobb!='MANAGER' and dno=20) then
  set bon=3400;
else
set bon=1000;
end if;
END$$
DELIMITER ;






select * from emps;



-----------------------------------------------------------------------------------------------------------
# Assignment:Final- Task on cursor:  Create a table "radius" with two fields id and radius.
-- insert few raw data as below

-- ID       Radius
-- ---        -----------
-- 101      10.3
-- 102       7.7
-- 103        5.0

-- create one table "area_perimeter" with fileds id, radius , area, perimter. 
-- [ id is int and rest of the fields in both tables are decimal ].
-- This table is empty.

-- Create a procedure cal_area_perimeter() which will  insert data into the second table after calculating area and perimeter of circle based on first table data with as many records exist there.

-- Result : Select * from area_perimeter;

-- ID     Radius             Area               Perimeter
-- ---     ---------              --------                ------------
-- 101    10.3                xxx.x	xxx.x
-- 102      7.7                xxx.x	xxx.x
-- 103      5.0                xxx.x	xxx.x

# Solution:-

drop table if exists area_parimeter;
create table area_parimeter(id int,rad decimal(9,1),circle_area decimal(9,1),circle_perimeter decimal(9,1));

drop procedure if exists cal_area_perimeter;
delimiter $$
create procedure cal_area_perimeter()

BEGIN
declare a decimal(7,2);
declare p decimal(7,2);
declare r decimal(7,2);
declare i decimal(7,2);
declare error1 int default 0;
declare counter int default 1 ;
declare cursor1 cursor for select id,rad from radius;
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET error1 = 1;

delete from area_parimeter;
 
 OPEN cursor1;  
label1: loop
 fetch cursor1 into i,r;
 /* while @@ftech_status=0; */
 if(error1=1) then
  leave label1;
end if;
set a=3.14*(r*r);
set p = 2 * 3.14 * r;

insert into area_parimeter values(i ,r ,a ,p );
 -- fetch next from cursor1 into r;
set counter=counter+1;
end loop;
 close cursor1;

end$$

delimiter ;


call cal_area_perimeter();
select * from area_parimeter;









