-- 1. 데이터 형식 변환 함수
-- 	** 둘다 같은 기능을 합니다. **
-- 	CAST( 값 AS 데이터형식 )
-- 	CONVERT( 값, 데이터형식 )
SELECT CAST( 1234 AS CHAR(4) );
SELECT CONVERT( 1234, CHAR(4) );

-- 2. 제어 흐름 함수
-- 	IF(수식, 참일 경우 결과, 거짓일 경우 결과) : 수식이 참 또는 거짓에 따라 결과를 분기합니다.
SELECT emp_no, IF( emp_no = 10001 , first_name, birth_date )
FROM employees;

-- 	IFNULL(수식1, 수식2) : 수식이 NULL일 경우 수식2를, NULL이 아닐 경우 수식1을 반환합니다.
SELECT IFNULL(' ', 'aa');
SELECT IFNULL(null, 'aa');

-- 	NULLIF(수식1, 수식2) : 수식1과 2가 같으면 NULL을 반환하고, 다르면 수식1을 반환합니다.
SELECT NULLIF(1 , 2);
SELECT NULLIF(1 , 1);

-- 	CASE ~ WHEN ~ ELSE ~ END : 다중 분기를 위해 사용합니다.
-- 		예)
-- 			CASE 체크하려는 수식1
-- 				WHEN 분기수식1 THEN 결과1
-- 				WHEN 분기수식2 THEN 결과2
-- 				WHEN 분기수식3 THEN 결과3
-- 				ELSE 결과4
-- 			END
SELECT
	emp_no
	,gender
	,CASE gender
		WHEN 'M' THEN '남자'
		ELSE '여자'
	END
FROM employees LIMIT 10;


-- 3. 문자열 함수
-- 	CONCAT(문자열1, 문자열2, ...) : 문자열을 이어줍니다.
SELECT CONCAT('안녕하세요.', '좋은아침입니다.');
-- 	CONCAT_WS(구분자, 문자열1, 문자열2, ...) : 문자열 사이에 구분자를 넣어 이어줍니다.
SELECT CONCAT_WS(' / ', 'a', 'b', 'c');
-- 	FORMAT(숫자, 소숫점 자릿수) : 숫자에 ','를 넣어주고, 소수점 자릿수 까지 표현합니다.
SELECT FORMAT( 123456, 2);
-- 	LEFT(문자열, 길이) : 문자열을 왼쪽부터 길이만큼 잘라 반환합니다.
SELECT LEFT('abcdefg', 1);
-- 	RIGHT(문자열, 길이) : 문자열을 오른쪽부터 길이만큼 잘라 반환합니다.
SELECT RIGHT('abcdefg', 2);
-- 	UPPER(문자열) : 소문자를 대문자로 변경합니다.
SELECT UPPER('abc');
-- 	LOWER(문자열) : 대문자를 소문자로 변경합니다.
SELECT LOWER('aBCsafas');
-- 	LPAD(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 넣습니다.
SELECT LPAD('956', 6, '0');
-- 	RPAD(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 넣습니다.
SELECT RPAD('956', 6, '0');
-- 	TRIM(문자열) : 좌우 공백을 제거합니다.
SELECT TRIM('       a  bc ');
-- 	LTRIM(문자열) : 왼쪽 공백을 제거합니다.
SELECT LTRIM('       a  bc ');
-- 	RTRIM(문자열) : 오른쪽 공백을 제거합니다.
SELECT RTRIM('       a  bc ');
-- 	TRIM(방향 문자열1 FROM 문자열2) : 방향을 지정해 문자열2에서 문자열1을 제거합니다.
-- 		** 방향을 LEADING(좌), BOTH(좌우), TRAILING(우) **
SELECT TRIM(TRAILING 'abc' FROM 'abcdefabc');
-- 	SUBSTRING(문자열, 시작위치, 길이) : 문자열을 시작위치에서 길이만큼 잘라서 반환합니다.
SELECT SUBSTRING('abcdef', 2, 4);
-- 	SUBSTRING_INDEX(문자열, 구분자, 횟수) : 왼쪽부터 구분자가 횟수 번째가 나오면 그 이후부터 버립니다.
SELECT SUBSTRING_INDEX('ab.cd.ef.gh', '.', 4);

-- 4. 수학 함수
-- 	CEILING(숫자) : 올림합니다.
SELECT CEILING(1.1);
-- 	FLOOR(숫자) : 내림합니다.
SELECT FLOOR(1.9);
-- 	ROUND(숫자) : 반올림합니다.
SELECT ROUND(1.5);
SELECT ROUND(1.4);
-- 	TRUNCATE(숫자, 정수) : 소수점 기준으로 정수위치 까지 구하고 나머지는 버립니다.
SELECT TRUNCATE(1.11, 2);

-- 5. 날짜 및 시간 함수
-- 	NOW() : 현재 날짜/시간을 구합니다. (YYYY-MM-DD HH:MM:DD)
SELECT NOW();
SELECT DATE(NOW());
-- 	ADDDATE(날짜1, INTERVAL 날짜2) : 날짜1에서 날짜2를 더한 날짜를 구합니다.
SELECT ADDDATE(NOW(), INTERVAL -1 DAY);
-- 	SUBDATE(날짜1, INTERVAL 날짜2) : 날짜1에서 날짜2를 뺍 날짜를 구합니다.
SELECT SUBDATE(NOW(), INTERVAL 1 DAY);
-- 	ADDTIME(날짜/시간, 시간) : 날짜/시간에서 시간를 더한 날짜/시간를 구합니다.
SELECT ADDTIME(NOW(), '-1:1:1');
-- 	SUBTIME(날짜/시간, 시간) : 날짜/시간에서 시간를 뺍 날짜/시간를 구합니다.
SELECT SUBTIME(NOW(), '1:1:1');

-- 6. 순위 함수
-- 	RANK() OVER(ORDER BY 속성명 DESC/ASC) : 순위를 매깁니다.
SELECT emp_no, RANK() OVER(ORDER BY salary ASC) r, salary
FROM salaries;
-- 	ROW_NUMBER() OVER(ORDER BY 속성명 DESC/ASC) : 레코드에 순위를 매깁니다.
SELECT emp_no, ROW_NUMBER() OVER(ORDER BY salary ASC) r, salary
FROM salaries;