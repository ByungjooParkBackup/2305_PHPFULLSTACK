--1. 사원 정보테이블에 각자의 정보를 적절하게 넣어주세요.
--2. 월급, 직책, 소속부서 테이블에 각자의 정보를 적절하게 넣어주세요.
--3. 짝궁의 [1,2]것도 넣어주세요.
--4. 나와 짝궁의 소속 부서를 d009로 변경해 주세요.
--5. 짝궁의 모든 정보를 삭제해 주세요.
--6.'d009'부서의 관리자를 나로 변경해 주세요.
--7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
--8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
--	** 최고/최저 급여 중복자가 있을 경우 제대로된 데이터를 출력할 수 없다. **
	SELECT emp_no, first_name
	FROM employees
	WHERE emp_no = 
		( SELECT emp_no FROM salaries ORDER BY salary LIMIT 1)
	OR 
	emp_no = 
		( SELECT emp_no FROM salaries ORDER BY salary DESC LIMIT 1);

--9. 전체 사원의 평균 연봉을 출력해 주세요.
--10. 사번이 499,975인 사원의 지금까지 평균 연봉을 출력해 주세요.