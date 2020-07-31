<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="post" action="">
        @foreach($columns as $col)
            <input type="text" name="{{ $col->Field }}" value="{{ $col->CurrentValue }}">
        @endforeach
        <input type="submit" name="submitted" value="Update">
    </form>



    {{ dd($columns)  }}
</body>
</html>