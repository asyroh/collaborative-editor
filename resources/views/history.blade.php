<!DOCTYPE html>
<html>
<head>
    <title>History</title>
</head>
<body>

<h1>Revision History</h1>

@foreach($versions as $version)

<div style="border:1px solid #ccc;
padding:10px;
margin-bottom:20px;">

    <h3>User {{ $version->user_id }}</h3>

    <small>{{ $version->created_at }}</small>

    <pre>{{ $version->content }}</pre>

</div>

@endforeach

</body>
</html>