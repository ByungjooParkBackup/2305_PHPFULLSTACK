<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	{{-- 자식 템플릿에 해당하는 section에게 자리를 양도, 만약에 자식 템플릿에 해당 section이 없으면 2번째 인수를 사용 --}}
	<title>@yield('title', '부모타이틀')</title>
</head>
<body>
	{{-- 다른 템플릿을 포함하는 방법 --}}
	@include('layout.inc.header')
	
	@yield('contents')

	{{-- @section ~ @show 자식 템플릿에 해당 section이 정의 되어 있지않으면 부모의 것이 실행 --}}
	@section('test')
		<h2>부모의 섹션입니다.</h2>
		<p>부모부모</p>
	@show

	@yield('if')
	@yield('for')
	@yield('foreach')
	@yield('forelse')


	{{-- 2번째 인수로 값을 셋팅하고, 해당 파일에서 변수로써 사용 가능 --}}
	@include('layout.inc.footer', ['key1' => 'key1로 셋팅'])
</body>
</html>