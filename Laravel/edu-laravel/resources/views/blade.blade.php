
{{-- 상속 --}}
@extends('layout.layout')

{{-- 부모 템플릿에 해당하는 yield 부분에 자리를 차지 --}}
@section('title', '자식 타이틀')

{{-- 처리해야하는 코드가 많을 경우에는, @section ~ @endsection 에 소스코드를 기재 --}}
{{--@section('contents')
	<h2>콘텐츠 섹션입니다.</h2>
	<p>아아아아아</p>
	<p>콘텐츠 끝</p>
@endsection

@section('test')
	<h2>자식의 섹션입니다.</h2>
	<p>자식자식</p>
@endsection--}}

{{-- 조건문 --}}
{{--@section('if')
	<hr>
	<h5>IF</h5>
	@if($data['gender'] === '남자')
		<span>남자남자</span>
	@elseif($data['addr'] === '대구')
		<span>대구대구</span>
	@else
		<span>모든 조건 탈락</span>
	@endif
@endsection--}}

{{-- 반복문 --}}
{{--@section('for')
	<hr>
	<h5>FOR</h5>
	@for($i = 0; $i < 5; $i++)
		<span>{{$i}}</span>
	@endfor
@endsection--}}

{{-- foreach와 forelse의 경우, $loop변수가 생성되고 사용 할 수 있다. --}}
@section('foreach')
	<hr>
	<h5>FOREACH</h5>
	@foreach($data as $key => $val)
		<span>{{$loop->count.' >> '.$loop->iteration.'   '}}</span>
		<span>{{$key.' : '. $val}}</span>
		<br>
	@endforeach
@endsection

@section('forelse')
	<hr>
	<h5>FORELSE</h5>
	@forelse($data2 as $key => $val)
		<span>{{$key.' : '. $val}}</span>
	@empty
		<span>빈배열이예요.</span>
	@endforelse
@endsection