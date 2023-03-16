
1.  테이블 생성
CREATE TABLE 테이블명(
컬럼 타입(크기) NOT NULL, --널값이 들어갈 수 없음
컬럼 타입 DEFAULT(값), --초기값 지정
CONSTRAIN PK명 PRIMARY KEY(컬럼) --PK설정
CONSTRAIN FK명 FOREIGN KEY(컬럼) REFERENCE 참조테이블(참조컬럼) [ON DELETE CASCADE]  -- FK설정
컬럼 데이터타입 CONSTRAINT UK명 UNIQUE -- UK설정
);

NULL / NOT NULL / DEFAULT / AUTO_INCREMENT / 
PRIMARY KEY / UNIQUE KEY / FOREIGN KEY

2. 테이블 변경
	- 컬럼 추가
		ALTER TABLE 테이블명 ADD COLUMN 컬럼 데이터타입;
	- 데이터타입 변경
		ALTER TABLE 테이블명 ALTER COLUMN 컬럼 데이터타입;
	- 컬럼 삭제
		ALTER TABLE 테이블명 DROP COLUMN 컬럼;

3. 테이블 삭제
	DROP TABLE 테이블;



1. 데이터 베이스 제약조건 이란?
	- 테이블 단위에서 데이터의 무결성을 보장하는 규칙입니다.
	- 테이블을 수정 작업하는 경우 잘못된 트랜잭션 수행을 방지합니다.
	- 테이블 간 제약조건이 있어서 종속성이 있는 경우 테이블 삭제를 방지합니다.

2. PK(primary Key) 
	- 테이블 생성 시 고유의 단 한 개의 PK설정합니다.
	- 중복 불가, NULL 불가합니다.
	- 고유 인덱스를 자동으로 생성합니다.
	- 여러 컬럼을 하나의 PK로 생성 가능합니다.

3. FK(Foreign Key)
	- 외부 식별 자키로 테이블 간의 관계를 의미합니다.
	- 두 테이블 간의 종속이 필요한 관계이면 그 접점이 되는 칼럼을 FK로 지정하여 서로 참조할 수 있도록 관계를 맺어 줍니다.
	- 테이블 간의 잘못된 매핑을 방지하는 역할도 합니다.
	- FK를 선언한 테이블이 하위 테이블이 됩니다.
	- ON DELETE CASCADE 옵션으로 참조되는 상위 테이블 행에 대한 DELETE가 허용됩니다.(상위 하위 같이 삭제)
	- 참조하는 컬럼의 데이터 타입이 일치해야하며, PK와 UK만 참조가 가능합니다.

4. UK(Unique Key)
	고유키입니다.
	중복된 값을 허용하지 않지만, 여러 개 NULL값을 허용합니다.
	고유 인데스를 자동 생성합니다.