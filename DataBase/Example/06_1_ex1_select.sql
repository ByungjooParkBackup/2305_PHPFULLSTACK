-- 0. SELECT문의 기본 구조
-- 	SELECT [DISTINCT] [컬럼명]
-- 	FROM [테이블명]
-- 	WHERE [쿼리 조건]
-- 	GROUP BY [컬럼명] HAVING [집계함수 조건]
-- 	ORDER BY [컬럼명 ASC || 컬럼명 DESC]
-- 	;

-- 1. 테이블 전체 조회 : SELECT [컬럼명] FROM [테이블명] ;
-- 	- *(Asterisk)로 조회
SELECT *
FROM employees;

-- 	- 컬럼명으로 조회
SELECT emp_no
FROM employees;

SELECT emp_no, first_name
FROM employees;

-- 2. 특정 조건으로 조회 : SELECT [컬럼명] FROM [테이블명] WHERE [쿼리 조건];
-- 	- 특정 데이터와 일치하는 조회
SELECT *
FROM employees
WHERE emp_no = 10001;

SELECT *
FROM employees
WHERE first_name = 'Georgi';

-- 	- 관계 연산자를 이용하여 조회	
SELECT *
FROM employees
WHERE emp_no >= 10003

--	- AND, OR로 여러 조건을 설정하여 조회
SELECT *
FROM employees
WHERE emp_no <= 10001
  AND emp_no <= 10005;

SELECT *
FROM employees
WHERE emp_no <= 10003
   OR emp_no >= 499997;

-- - BETWEEN [A] AND [B]로 해당 범위 내의 데이터 조회
SELECT *
FROM employees
WHERE emp_no BETWEEN 10003 AND 10005;

-- - IN()으로 해당 데이터 조회
SELECT *
FROM employees
WHERE emp_no IN(10001, 10005);


-- - LIKE로 문자열의 내용을 조회
-- > "%"는 무엇이든 허용한다는 의미입니다.
SELECT *
FROM employees
WHERE first_name like( '%eo' );

SELECT *
FROM employees
WHERE first_name like( 'eo%' );

-- >"_"는 "_"의 개수만큼 허용합니다. "__"인 경우는 2글자라면 무엇이든 허용한다는 의미입니다.
SELECT *
FROM employees
WHERE first_name like( '_eorgi' );

SELECT *
FROM employees
WHERE first_name like( 'Georg_' );

-- - DISTINCT로 중복되는 레코드 없이 조회
SELECT DISTINCT emp_no
FROM dept_emp;

-- - LIMIT로 출력 개수를 제한하여 조회
SELECT *
FROM employees
LIMIT 20 OFFSET 30;

-- - ORDER BY로 정렬하여 조회
SELECT *
FROM employees
ORDER BY emp_no DESC;

-- 5. 집계 함수
-- 	- SUM(컬럼명) : 합계를 구합니다.
SELECT SUM(salary)
FROM salaries;

-- 	- AVG(컬럼명) : 평균을 구합니다.
SELECT AVG(salary)
FROM salaries;

-- 	- MAX(컬럼명) : 최대값을 구합니다.
SELECT MAX(salary)
FROM salaries;

-- 	- MIN(컬럼명) : 최소값을 구합니다.
SELECT MIN(salary)
FROM salaries;

-- 	- COUNT(컬럼명) : 개수를 구합니다.
SELECT COUNT(emp_no)
FROM employees
WHERE emp_no = 10001;


-- 그룹으로 묶어서 조회 : GROUP BY 컬럼명 [ HAVING 집계함수조건 ]
SELECT title, COUNT(title)
FROM titles
GROUP BY title HAVING COUNT(title) >= 100000;

-- 속성명에 "AS"를 이용하여 별칭을 줄 수 있습니다.
SELECT dept_no, COUNT(emp_no) AS cnt
FROM dept_manager
GROUP BY dept_no
HAVING cnt > 2;

-- CONCAT() : 문자열을 합쳐 주는 함수
SELECT CONCAT(last_name, ' ',first_name) AS fullname
FROM employees;


-- 3. 서브쿼리(SubQuery) : 쿼리 안에 또다른 쿼리가 있는 형태
-- ANY / ALL
-- 	- 서브쿼리의 결과가 2개 이상이라 에러가 납니다. **
SELECT *
FROM dept_manager
WHERE dept_no = (
					SELECT dept_no 
					FROM dept_manager
					WHERE dept_no = 'd002'
				);

-- - ANY를 사용하면 2개 이상의 결과 중 하나라도 만족하는 데이터를 조회합니다.
SELECT *
FROM dept_manager
WHERE dept_no = ANY (
						SELECT dept_no 
						FROM dept_manager
						WHERE dept_no = 'd002'
					);

-- - ALL을 사용하면 2개 이상의 결과 모두를 만족하는 데이터를 조회합니다.
SELECT *
FROM dept_manager
WHERE dept_no = ALL (
						SELECT dept_no 
						FROM dept_manager
						WHERE dept_no = 'd002'
					);

-- 다중열 서브쿼리의 경우
SELECT *
FROM dept_emp
WHERE (emp_no, dept_no) IN  (
								SELECT emp_no, dept_no
								FROM dept_manager
								WHERE to_date >= NOW()
							);

-- FROM절에 사용하는 서브쿼리
SELECT e.*
FROM (
		SELECT emp_no, gender
		FROM employees
		WHERE gender = 'F'
	 ) e;

-- SELECT절에 사용하는 서브쿼리
SELECT
	sal.emp_no
	,sal.from_date
	,(	SELECT CONCAT(emp.last_name, ' ', emp.first_name)
		FROM employees emp
		WHERE emp.emp_no = sal.emp_no
	) f_name
FROM salaries sal
WHERE sal.to_date >= now();

-- date 타입의 속성 비교 방법
-- NOW() : 현재시각을 습득하는 함수
SELECT *
FROM titles
WHERE emp_no = 10009
  AND to_date >= NOW();

