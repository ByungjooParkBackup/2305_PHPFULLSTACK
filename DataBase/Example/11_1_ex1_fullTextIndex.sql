1. 전체 텍스트 인덱스(Full Text Index)란?
	긴 문자로 구성된 텍스트 데이터를 빠르게 검색하기 위한 기능

2. 전체 텍스트 인덱스 생성
	CREATE TABLE 테이블(
		컬럼 데이터타입
		, FULLTEXT 인덱스명(컬럼) 
	)

	CREATE FULLTEXT INDEX 인덱스명 ON 테이블(컬럼);

3. 전체 텍스트 인덱스 삭제
	DROP INDEX 인덱스명 ON 테이블명;

4. 전체 텍스트 조회 방법
	-- 검색어1 또는 검색어2 (or 검색)
	SELECT * FROM Table_Name
	WHERE MATCH(컬럼) AGAINST('검색어1 검색어2');
	
	-- 검색어 중간에 공백이 들어가는 경우
	SELECT * FROM Table_Name
	WHERE MATCH(컬럼) AGAINST('"검색어 검색어"');
	
	-- 검색어1을 검색한 결과에서 검색어2가 들어간것을 제외 할 때
	SELECT * FROM Table_Name
	WHERE MATCH(컬럼) AGAINST('"검색어1" -검색어2' in boolean mode);
	
	-- 검색어1, 검색어2 함께 검색이 되는 경우 (and 검색) 
	SELECT * FROM Table_Name
	WHERE MATCH(컬럼) AGAINST('+"검색어1" +"검색어2"' in boolean mode);
	
	-- 검색어1과 검색어2 And 검색과 함께 검색어2의 결과도 함께 출력
	SELECT * FROM Table_Name
	WHERE MATCH(컬럼) AGAINST('"검색어1" +"검색어2"' in boolean mode);