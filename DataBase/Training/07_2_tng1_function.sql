--직책이 "Senior Engineer"일 경우는 "관리자"
--그외의 직책은 "팀원"으로 사번하고 분기 결과를 출력해 주세요.
SELECT 
	emp_no
	, case title
			when 'Senior Engineer' then '관리자'
			ELSE '팀원'
		END AS 'k_title'
FROM titles;

-- 자기의 성과 이름을 CONCAT()를 이용해서 출력해 주세요.
SELECT CONCAT(last_name, ' ', first_name)
FROM employees
WHERE emp_no = 500000;