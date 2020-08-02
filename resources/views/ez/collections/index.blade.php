<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Collections</h1>

    @if(count($collections))
        <ul>
            @foreach($collections as $collection)
                <li><a href="{{ route('ez.collection.show', ['collection' => $collection['class']]) }}">{{ $collection['label'] }}</a></li>
            @endforeach
        </ul>
    @else
        No collections found!
    @endif
</body>
</html>