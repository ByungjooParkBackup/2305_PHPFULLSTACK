SELECT *
FROM employees
WHERE emp_no >= 10003
  AND emp_no <= 10005;


SELECT *
FROM employees
WHERE emp_no BETWEEN 10003 AND 10005;

SELECT *
FROM employees
WHERE emp_no IN(10001, 10005);


-- Mary
SELECT *
FROM employees
WHERE first_name LIKE('%m');


SELECT DISTINCT emp_no
FROM dept_emp;

SELECT *
FROM employees
LIMIT 20 OFFSET 30;


SELECT *
FROM employees
ORDER BY emp_no DESC;


SELECT COUNT(emp_no)
FROM employees
WHERE emp_no = 10001;

SELECT AVG(salary)
FROM salaries;

SELECT MAX(salary)
FROM salaries;

SELECT MIN(salary)
FROM salaries;

-- 그룹으로 묶어서 조회 : 
-- GROUP BY 컬럼명 [ HAVING 집계함수조건 ]

SELECT title, COUNT(title)
FROM titles
GROUP BY title HAVING COUNT(title) >= 100000;

SELECT CONCAT(last_name, ' ',first_name) AS fullname
FROM employees;

-- 서브쿼리(SubQuery) : 쿼리 안에 또다른 쿼리가 있는 형태

SELECT *
FROM dept_manager
WHERE dept_no = ALL (
						SELECT dept_no
						FROM dept_manager
						WHERE emp_no IN (110344, 111035)
					 );

SELECT *
FROM dept_manager
WHERE emp_no = ANY ( 
						SELECT emp_no
						FROM dept_manager
						WHERE dept_no = 'd009'
					 );

SELECT emp_no
FROM dept_manager
WHERE dept_no = 'd009';

-- date 타입의 속성 비교 방법
SELECT *
FROM titles
WHERE emp_no = 10009
  AND to_date >= NOW();

