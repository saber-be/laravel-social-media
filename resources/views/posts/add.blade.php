<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- create form to save post -->
    
    <form action="{{ route('add_post') }}" method="POST">
        @csrf
        <input type="text" name="user_id" placeholder="user id">
        <textarea name="content" placeholder="content"></textarea>
        <button type="submit">Add Post</button>
    
    
    <!-- create form to save post -->
    
</body>
</html>