CREATE TABLE dept(
  deptno decimal(2,0),
  dname  varchar(14),
  loc    varchar(13),
  CONSTRAINT pk_dept PRIMARY KEY (deptno));
CREATE TABLE emps(
  empno    decimal(4,0),
  ename    varchar(10),
  job      varchar(9),
  mgr      decimal(4,0),
  hiredate DATE,
  sal      decimal(7,2),
  comm     decimal(7,2),
  deptno   decimal(2,0),
  CONSTRAINT pk_emp PRIMARY KEY (empno),
  CONSTRAINT fk_deptno FOREIGN KEY (deptno) REFERENCES dept (deptno)
);
CREATE TABLE salgrade(
  grade decimal,
  losal decimal,
  hisal decimal
);
INSERT INTO dept VALUES(10, 'ACCOUNTING', 'NEW YORK');
INSERT INTO dept VALUES(20, 'RESEARCH', 'DALLAS');
INSERT INTO dept VALUES(30, 'SALES', 'CHICAGO');
INSERT INTO dept VALUES(40, 'OPERATIONS', 'BOSTON');

INSERT INTO emps VALUES(
 7839, 'KING', 'PRESIDENT', null,
 STR_TO_DATE('17-11-1981','%d-%m-%Y'),
 5000, null, 10 );

INSERT INTO emps VALUES(
 7698, 'BLAKE', 'MANAGER', 7839,
 STR_TO_DATE('1-5-1981','%d-%m-%Y'),
 2850, null, 30);

INSERT INTO emps VALUES(
 7782, 'CLARK', 'MANAGER', 7839,
 STR_TO_DATE('9-06-1981','%d-%m-%Y'),
 2450, null, 10);

INSERT INTO emps VALUES(
 7566, 'JONES', 'MANAGER', 7839,
 STR_TO_DATE('2-4-1981','%d-%m-%Y'),
 2975, null, 20);

INSERT INTO emps VALUES(
 7788, 'SCOTT', 'ANALYST', 7566,
 STR_TO_DATE('13-07-1982','%d-%m-%Y'),
 3000, null, 20);

INSERT INTO emps VALUES(
 7902, 'FORD', 'ANALYST', 7566,
 STR_TO_DATE('03-12-1981','%d-%m-%Y'),
 3000, null, 20 );

INSERT INTO emps VALUES(
 7369, 'SMITH', 'CLERK', 7902,
 STR_TO_DATE('17-10-1980','%d-%m-%Y'),
 800, null, 20 );

INSERT INTO emps VALUES(
 7499, 'ALLEN', 'SALESMAN', 7698,
 STR_TO_DATE('20-02-1981','%d-%m-%Y'),
 1600, 300, 30);

INSERT INTO emps VALUES(
 7521, 'WARD', 'SALESMAN', 7698,
 STR_TO_DATE('22-02-1981','%d-%m-%Y'),
 1250, 500, 30 );

INSERT INTO emps VALUES(
 7654, 'MARTIN', 'SALESMAN', 7698,
 STR_TO_DATE('28-02-1981','%d-%m-%Y'),
 1250, 1400, 30 );

INSERT INTO emps VALUES(
 7844, 'TURNER', 'SALESMAN', 7698,
 STR_TO_DATE('08-09-1981','%d-%m-%Y'),
 1500, 0, 30);

INSERT INTO emps VALUES(
 7876, 'ADAMS', 'CLERK', 7788,
 STR_TO_DATE('13-07-1981','%d-%m-%Y'),
 1100, null, 20 );

INSERT INTO emps VALUES(
 7900, 'JAMES', 'CLERK', 7698,
 STR_TO_DATE('03-12-1981','%d-%m-%Y'),
 950, null, 30 );

INSERT INTO emp VALUES(
 7934, 'MILLER', 'CLERK', 7782,
 STR_TO_DATE('23-01-1981','%d-%m-%Y'),
 1300, null, 10 );

INSERT INTO salgrade VALUES (1, 700, 1200);
INSERT INTO salgrade VALUES (2, 1201, 1400);
INSERT INTO salgrade VALUES (3, 1401, 2000);
INSERT INTO salgrade VALUES (4, 2001, 3000);
INSERT INTO salgrade VALUES (5, 3001, 9999);

COMMIT;


select * from salgrade;
desc emps;
desc dept;
desc salgrade;
select * from emps;
select * from dept;
select*from salgrade;

select job from emps;

select distinct job from emps;
select distinct deptno,job from emps;
select empno,ename,job as designation ,sal,comm,sal*.5 as bonus from emps;
select empno,ename,job as designation ,sal,comm,sal+ifnull(comm,0) as totsal from emps;
select empno,ename,job as designation ,sal,comm,sal+comm as totsal from emps;

select * from emps where sal>1000;
select * from emps where sal>1000 or sal<=2000 and deptno in (10,20);
select * from emps where (sal>1000 or sal<=2000) and deptno in (10,20);
select* from emps where ename like 'A%';
select empno,ename,sal,length(ename) as length from emps;
select * from emps where length(ename)=5;

select current_date();

select current_time();

select empno, ename,sal,hiredate from emps;

select empno, ename,sal,hiredate from emps where date_format(hiredate,'%b')='Feb';
select empno, ename,sal,hiredate,date_format(hiredate,'%b') from emps ;
select last_day(current_date());
select empno,ename, sal,hiredate,datediff(current_date,hiredate)/365 from emps;

select empno,ename, sal,hiredate,timestampdiff(year,hiredate,current_date) from emps;
select empno,ename, sal,hiredate,timestampdiff(Month,hiredate,current_date) from emps;
select empno,ename, sal,hiredate,timestampdiff(Month,hiredate,current_date)/12 from emps;
select empno,ename, sal,hiredate,truncate(timestampdiff(Month,hiredate,current_date)/12,0) from emps;
select * from emps where ename>'Dipendu';
select * from emps where hiredate>'1981-12-31';
select * from emps where hiredate>str_to_date('31-----12/1981', '%d-----%m/%Y');
select hiredate>str_to_date('31-----12/1981', '%d-----%m/%Y') from emps;





# Assignment Questions 1 to 45  except (38 and 45).

1. Select the employees in department 30. 
select * from emps where deptno=30;

2. List the names, numbers and departments of all clerks. 
select e.ename, e.empno, d.dname from emps e join dept d on e.deptno=d.deptno where e.job="clerk";

3. Find the department numbers and names of employees of all departments with deptno greater than 20. 
select deptno, ename from emps where deptno>20;

4. Find employees whose commission is greater than their salaries. 
select * from emps where comm>sal;

5. Find employees whose commission is greater than 60 % of their salaries. 
select * from emps where comm>(sal*0.6);

6. List name, job and salary of all employees in department 20 who earn more than 2000/-. 
select ename, job, sal from emps where deptno=20 and sal>2000; 

7. Find all salesmen in department 30 whose salary is greater than 1500/-. 
select ename, job, sal from emps where deptno=30 and sal>1500;

8. Find all employees whose designation is either manager or president. 
select ename, job from emps where job="MANAGER" OR job="PRESIDENT";

9. Find all managers who are not in department 30. 
select ename, job, deptno from emps where deptno=30 and job!="MANAGER";

10. Find all the details of managers and clerks in dept 10. 
select * from emps where (job="MANAGER" OR job="CLERK") AND deptno=10;

11. Find the details of all the managers (in any dept) and clerks in dept 20. 
select * from emps where (job="MANAGER") OR (job="CLERK" AND deptno=20);

12. Find the details of all the managers in dept. 10 and all clerks in dept 20 and all employees who are neither managers nor clerks but whose salary is more than or equal to 2000/-. 
select * from emps where (job="MANAGER" and deptno=10) OR (job="CLERK" AND deptno=20) OR (job!="CLERK" AND job!="MANAGER" AND sal>=2000);

13. Find the names of anyone in dept. 20 who is neither manager nor clerk. 
select * from emps where job!="CLERK" AND job!="MANAGER" AND deptno=20;

14. Find the names of employees who earn between 1200/- and 1400/-. 
select * from emps where sal>1200 and sal<1400;

15. Find the employees who are clerks, analysts or salesmen. 
select * from emps where job="CLERK" or job="ANALYST" or job="SALESMAN";


select * from emps;


16. Find the employees who are not clerks, analysts or salesmen.
select * from emps where job not in ('CLERK','SALESMAN','ANALYST');


17. Find the employees who do not receive commission.
select *  from emps where !ifnull(comm,0) ;

18. Find the different jobs of employees receiving commission.
select distinct job  from emps where ifnull(comm,0) ;

19. Find the employees who do not receive commission or whose commission is less than 400/-.
select *  from emps where !ifnull(comm,0) or comm<400;

20. If all the employees not receiving commission is entitles to a bonus of Rs. 250/- show the net earnings
of all the employees.
select empno,ename,job,mgr,hiredate,sal,comm,sal+250 as totsalbonus from emps where !ifnull(comm,0) ;

21. Find all the employees whose total earning is greater than 2000/-
select empno,ename,job,mgr,hiredate,sal,comm,deptno, sal+ifnull(comm,0) as totearning from emps where sal+ifnull(comm,0)>2000;

22. Find all the employees whose name begins or ends with ‘M’
select ename from emps where ename like 'm%n';

23. Find all the employees whose names contain the letter ‘M’ in any case.
select ename from emps where ename like '%m%';

24. Find all the employees whose names are upto 15 character long and have letter ‘R’ as 3rd character of
their names.
select ename from emps where length(ename)<=15 and ename like '__r%';

25. Find all the employees who were hired in the month of February (of any year).
select empno, ename,sal,hiredate from emps where date_format(hiredate,'%b')='Feb';

26. Find all the employees who were hired on last day of the month.
select ename from emps where last_day(date_format(hiredate,'%b'));

27. Find all the employees who were hired more than 39 years ago.
select empno,ename, sal,hiredate ,timestampdiff(year,hiredate,current_date) from emps where timestampdiff(year,hiredate,current_date)>39;

select * from emps where job='manager' and date_format(hiredate,'%Y')=1980 ;

28. Find the managers hired in the year 2003.
select empno, ename,sal,hiredate from emps where date_format(hiredate,'%Y')=1980;

29. Display the names and jobs of all the employees separated by a space.
select concat(ename,' ',job) from emps;

30. Display the names of all the employees right aligning them to 15 characters.
Select CAST(ename as char(3)) from emps;

31. Display the names of all the employees padding them to the right up to 15 characters with ‘*’.
select rpad(ename, 15, '*') from emps;
select lpad(ename, 15, '*') from emps;

32. Display the names of all the employees without any leading ‘A’.
select ename from emps where ename not like 'A%';
select ename from emps where ename  like 'A%';

33. Display the names of all the employees without any trailing ‘R’.
select ename from emps where ename  not like '%r';
select ename from emps where ename  like '%r';

34. Show the first 3 and last 3 characters of the names of all the employees.
Select concat(left(ename,3),'',right(ename,3)) from emps;
select  right(ename,3) from emps;

35. Display the names of all the employees replacing ‘A’ with ‘a’.
select ename,replace(ename, 'A','a') from emps;

36. Display the names of all the employees and position where the string ‘AR’ occurs in the name.
SELECT ename,POSITION("AR" IN ename) AS MatchPosition from emps;

37. Show the salary of all the employees , rounding it to the nearest Rs. 1000/-.
select ename, sal from emps where sal=round(3000);

X 38. Show the salary of all the employees , ignoring the fraction less than Rs. 1000/-.

39. Show the names of all the employees and date on which they completed 39 years of service.
select empno,ename, sal,hiredate ,timestampdiff(year,hiredate,current_date) from emps where timestampdiff(year,hiredate,current_date)=39;

40. For each employee, display the no. of days passed since the employee joined the company.
select empno,ename, sal,hiredate,timestampdiff(day,hiredate,current_date) from emps;

41. For each employee, display the no. of months passed since the employee joined the company.
select empno,ename, sal,hiredate,timestampdiff(month,hiredate,current_date) from emps;

42. Display the details of all the employees sorted on the names.
select * from emps order by ename asc;

43. Display the names of the employees, based on the tenure with the oldest employee coming first.
select * from emps order by hiredate asc;

44. Display the names, jobs and salaries of employees, sorting on job and salary.
select * from emps order by job and sal asc;

X 45. Display the names, jobs and salaries of employees, sorting on descending order of job and within job
sorted on salary.   
select * from emps order by job asc where sal in (select sal from emps order by sal asc);






















