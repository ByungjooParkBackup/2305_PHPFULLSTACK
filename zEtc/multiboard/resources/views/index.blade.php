<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $data['bname'] }} 게시판</title>
</head>
<body>
	<h1>{{ $data['bname'] }} 게시판</h1>

	<div>
		<a href="{{route('index', ['bid' => '1'])}}">자유게시판</a>
		<a href="{{route('index', ['bid' => '2'])}}">공략게시판</a>
		<a href="{{route('index', ['bid' => '3'])}}">정보게시판</a>
	</div>
	@foreach($data['list'] as $data)
		<div>
			<table>
				<td>{{ $data['title'] }}</td>
				<td>{{ $data['content'] }}</td>
				<td>{{ $data['created_at'] }}</td>
			</table>
		</div>
	@endforeach
</body>
</html>