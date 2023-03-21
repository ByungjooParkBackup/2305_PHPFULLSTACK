1. PHP 설치
	1-1. 다운로드 페이지 접속
		https://windows.php.net/download
	
	1-2. 각 설치 환경에 맞는 파일 다운로드
		** 주의 : 실습은 Apache 웹서버를 사용할 것이므로 "Thread Safe" 버전을 받을 것 **
		(VS16 x64 Thread Safe의 zip파일)
	
	1-3. "C:\php8.2.4"에 압축 풀기
		- 최종적으로 php.exe가 "C:\php8.2.4"에 배치됩니다.

	1-4. php.ini를 작성
		- "C:\php8.2.4\"아래의 php.ini-development를 복사하여 "php.ini"로 작성
		- 198번째 줄 : short_open_tag 설정 (php구분 태그인 <?php ?> 를 <? ?>로 작성 가능)
			short_open_tag = On
		- 767, 768번째 줄 : 주석해제 및 설정
			On windows:
			extension_dir = "PHP설치경로/ext"
		- extension 관련 설정 주석해제
	
	1-5. 환경변수 설정
		- 윈도우 검색창에 "환경 변수"를 입력해서 "시스템 환경 변수 편집"에 진입
		- "환경 변수" 클릭
		- 시스템 변수 > Path 선택 > 편집
		- 새로 만들기 > C:\php8.2.4 (PHP 설치한 폴더 경로) > 확인
		- 열려있는 모든 창 확인
		- 명령 프롬프트(CMD)를 열고 아래 명령어를 입력
			php -v 
		- php 버전이 정상적으로 출력되면 설치완료

2.  Apache 설치
	1-1. 다운로드 페이지 접속
		https://www.apachelounge.com/download/

	1-2. 각 설치 환경에 맞는 파일 다운로드
		(실습에서는 "Apache 2.4.56 Win64"를 다운로드)
	
	1-3. "C:\Apache24"에 압축 풀기
		- 최종적으로 conf폴더가 "C:\Apache24"에 배치됩니다.
	
	1-4. httpd.conf 설정
		- "C:\Apache24\conf\"아래의 httpd.conf를 수정
		- 37번째 줄 : "Define SRVROOT"를 Apache24를 설치했던 경로로 변경(순서대로 설치했다면 변경 불필요)
		- 227번째 줄 : "ServerName" 주석 해제
		- 가장 마지막줄에 아래 설정 추가

		- 저장
