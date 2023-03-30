<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{route('new_post')}}"  enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" />
        <input type="text" name="title" placeholder="title"/>
        <input type="text" name="desc" placeholder="desc" />
        <button>env</button>
    </form>
</body>
</html>
