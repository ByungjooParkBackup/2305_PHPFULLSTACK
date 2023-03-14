-- INSERT의 기본구조
-- INSERT INTO 테이블명 [ (속성1, 속성2) ]  
-- VALUES ( 속성값1, 속성값2 )
-- ** 추가설명 : 속성을 적어주지 않아도 되지만 그럴경우 VALUES의 속성값은 해당 테이블의 컬럼의 순서대로 전부 입력해주어야합니다.
--				실수를 방지하기위해 귀찮더라도 모든 속성값을 다 적어서 INSERT문을 작성하는 것을 추천드립니다.

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES
(
	500001
	,NOW()
	,'ByungJoo'
	,'Park'
	,'M'
	,NOW()
);