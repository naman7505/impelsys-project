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


------------------------------------------------------------------------------------------------------
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


------------------------------------------------------------------------------------------------------
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


------------------------------------------------------------------------------------------------------
# Assignment-2. Write a Procedure which will display the employee details in following format [ empno as in ]
   -- Emp Details
--    -----------
--    1276,Jack , 3000, Dept: 10


delimiter $$
begin;
SELECT CONCAT(empno, " , ", ename, " , ",sal," , "," Dept: ",deptno) AS Emp_Details
FROM emps;
end$$


------------------------------------------------------------------------------------------------------
* # Final Assignment:- 
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

