<!DOCTYPE html>
<html>
<head>
    <title>Collaborative Editor</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <style>

        body{
            font-family: Arial;
            background:#f3f4f6;
            margin:0;
            padding:40px;
        }

        .container{
            width:80%;
            margin:auto;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }

        h1{
            margin-bottom:20px;
        }

        textarea{
    width:100%;
    height:500px;
    border:1px solid #ccc;
    outline:none;
    resize:none;
    font-size:18px;
    line-height:1.6;
    padding:15px;
    border-radius:8px;
    background:#fafafa;
    margin-top:20px;
}
      #status{
    margin-top:10px;
    color:green;
    font-weight:bold;
}

    </style>

</head>
<body>

<div class="container">

    <div class="card">

        <h1>{{ $document->title }}</h1>

        <textarea id="editor">{{ $document->content }}</textarea>

        <p id="status">Saving...</p>


    </div>

</div>

<script>

const editor = document.getElementById('editor');
const status = document.getElementById('status');

setInterval(() => {

    status.innerHTML = "Saving...";

    axios.post('/documents/{{ $document->id }}/update', {

        content: editor.value

    })

    .then(() => {

        status.innerHTML = "Saved ✔";

    })

    .catch(() => {

        status.innerHTML = "Error saving";

    });

}, 2000);

</script>
</body>
</html>
