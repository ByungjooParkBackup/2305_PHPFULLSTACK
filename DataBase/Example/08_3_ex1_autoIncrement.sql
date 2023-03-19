-- 1. auto_increment 란?
-- 	자동 증가 값을 가지는 컬럼으로  값을 직접 대입할 수 없습니다.
-- 	중간에 값을 삭제한다고 해서, 삭제된 값을 재사용 하지 않으며
-- 	레코드가 적재될 때마다 1씩 증가하게 됩니다.
--  PK에만 적용할 수 있습니다.

-- 2. auto_increment 생성
CREATE TABLE 테이블명 (
	mem_no		INT(11) PRIMARY KEY AUTO_INCREMENT
	,mem_name	VARCHAR(50)
);

-- 3. auto_increment 수정
--	- 이미 생성한 테이블의 컬럼에 추가할 때
ALTER TABEL 테이블명 MODIFY 컬럼명 INT NOT NULL AUTO_INCREMENT;

--	- auto_increment의 값을 초기화 할 때
ALTER TABLE 테이블명 AUTO_INCREMENT=1;
DELETE FROM 테이블명;
TRUNCATE TABLE 테이블명;

-- 4. auto_increment사용시 주의사항
-- 	스토리지 엔진인 InnoDB 의 경우 SELECT MAX(num) 구문을 사용하여 auto_increment 값을 새로 저장하는데,
-- 	이 때문에 증가 값이 다른 테이블들과 종속되는 값을 가지면서 서로 달라지게 되면 문제가 생길수도 있으니 주의하여 사용해야 합니다.
