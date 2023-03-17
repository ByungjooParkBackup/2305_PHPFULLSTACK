-- 1. 사원의 사원번호, 풀네임, 직책명을 출력해 주세요.
SELECT emp.emp_no, CONCAT(emp.first_name,emp.last_name),tit.title
FROM employees emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no
WHERE tit.to_date >=NOW();

-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
SELECT emp.emp_no, emp.gender, sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no	
WHERE sal.to_date>=NOW();

-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력해 주세요.
SELECT 
	CONCAT(first_name, ' ', last_name) fullname
	,sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE emp.emp_no = 10010;

-- 4. 사원의 사원번호, 풀네임, 소속부서명을 출력해 주세요.
SELECT emp.emp_no
	,CONCAT_WS(' ',last_name,first_name)
	,d_m.dept_name
FROM employees AS emp
	INNER JOIN dept_emp AS d_e
	ON emp.emp_no=d_e.emp_no
	INNER JOIN departments AS d_m
	ON d_m.dept_no=d_e.dept_no
	WHERE d_e.to_date>=NOW()
	ORDER BY emp.emp_no
;

-- 5. 현재 월급의 상위 10위까지 사원의 사번, 풀네임, 월급을 출력해 주세요.
SELECT emp.emp_no
		,CONCAT(last_name,' ' ,first_name) full_name
		,sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE sal.to_date = DATE(99990101)
ORDER BY sal.salary desc
LIMIT 10;

SELECT RNK.*
FROM(
		SELECT 
			emp.emp_no
			,concat(emp.first_name, ' ', emp.last_name) fullname
			,sal.salary
			,RANK() over(order by sal.salary DESC) rn  
		FROM employees emp
			INNER JOIN salaries sal
			ON emp.emp_no = sal.emp_no
		WHERE sal.to_date >= NOW()
	) RNK
WHERE RNK.rn <= 10;

-- 6. 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력해 주세요.
SELECT 
	dept.dept_name
	, CONCAT(emp.last_name,' ',emp.first_name) Fullname
	,emp.hire_date
	,dept.dept_no
FROM departments dept
	INNER JOIN dept_manager de_m
		ON dept.dept_no = de_m.dept_no
	INNER JOIN employees emp
		ON emp.emp_no = de_m.emp_no
WHERE de_m.to_date >= NOW();

-- 7. 현재 직책이 "Staff"인 사원의 현재 전체 평균 월급를 출력해 주세요.
SELECT ti.title, AVG(sl.salary)
FROM titles AS ti
	INNER JOIN salaries AS sl
		ON ti.emp_no=sl.emp_no
WHERE ti.title='staff'
  AND sl.to_date>=NOW()
  AND ti.to_date>=NOW()
;

-- 8. 부서장직을 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력해 주세요.
SELECT
	dept_m.dept_no
	,emp.emp_no
	,CONCAT(emp.last_name, ' ', emp.first_name) AS fullname
	,emp.hire_date
FROM employees emp
	INNER JOIN dept_manager dept_m
		ON emp.emp_no = dept_m.emp_no
WHERE dept_m.to_date != '99990101';

-- 9. 현재 각 직급별 평균월급 중 60,000이상인 직급의 직급명, 평균월급(정수)를 내림차순으로 출력해 주세요.
SELECT
	tit.title, 
	TRUNCATE(AVG(salary), 0) avg_s
FROM titles tit
	INNER JOIN salaries sal
	ON sal.emp_no = tit.emp_no
WHERE tit.to_date = DATE(99990101)
AND sal.to_date = DATE(99990101)
GROUP BY tit.title HAVING avg_s >=60000
ORDER BY avg_s DESC;

-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.
SELECT ti.title, COUNT(*) 
FROM employees emp
	INNER JOIN titles ti
	ON emp.emp_no = ti.emp_no
WHERE emp.gender = 'f'
	AND ti.to_date = DATE(99990101)
GROUP BY ti.title;

-- 11. 퇴사한 여직원 
SELECT A.gender, COUNT(A.gender) AS cnt
FROM employees A
INNER JOIN (
	SELECT emp_no
	FROM titles
	GROUP BY emp_no
	HAVING MAX(to_date) != DATE('9999-01-01')	
) B
ON A.emp_no = B.emp_no
GROUP BY A.gender;