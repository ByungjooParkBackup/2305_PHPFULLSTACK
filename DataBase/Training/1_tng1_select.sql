-- 1. 직책테이블의 모든 정보를 조회해주세요.
	SELECT * FROM titles;
	
-- 2. 급여가 60,000 이하인 사원의 사번을 조회해 주세요.
	SELECT emp_no FROM salaries WHERE salary <= 60000;
	
-- 3. 급여가 60,000에서 70,000인 사원의 사번을 조회해 주세요.
	SELECT emp_no
	FROM salaries
	WHERE salary >= 60000 
	  AND salary <= 70000;
	  
-- 사원번호가 10001, 10005인 사원의 모든 정보를 조회해 주세요.
	SELECT *
	FROM employees
	WHERE emp_no = 10001
		OR emp_no = 10005;

-- 직급명에 "Engineer"가 포함된 사원의 사번과 직급을 조회해 주세요.
	SELECT emp_no, title
	FROM titles
	WHERE title LIKE('%Engineer%');

-- 사원 이름을 오름차순으로 정렬해서 조회해 주세요.
	SELECT * FROM employees
	ORDER BY first_name ASC, last_name DESC;

-- 사워별 급여의 평균을 조회해 주세요.
	SELECT emp_no, AVG(salary)
	FROM salaries
	GROUP BY emp_no;

-- 사워별 급여의 평균이 30,000 ~ 50,000인
-- 사원번호와 평균급여를 조회해 주세요.
	SELECT emp_no, AVG(salary) AS avg_s
	FROM salaries
	GROUP BY emp_no 
	HAVING avg_s >= 30000
	AND avg_s <= 50000;

-- 사원별 급여 평균이 70,000이상인
-- 사원의 사번, 이름, 성, 성별을 조회해 주세요.
SELECT emp_no, first_name, last_name, gender
FROM employees
WHERE emp_no IN (
						SELECT emp_no
						FROM salaries
						GROUP BY emp_no
						HAVING AVG(salary) >= 70000
);

-- 현재 직책이 "Senior Engineer"인
-- 사원의 사원번호와 성을 조회해 주세요.
SELECT emp_no, last_name
FROM employees
WHERE emp_no IN (
						SELECT emp_no
						FROM titles
						WHERE to_date >= NOW()
						AND title = 'Senior Engineer'
					);




