<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(isset($rows) && count($rows))
        <table class="table">
            <thead>
                <tr>
                    @foreach($columns as $column)
                    <th>{{ $column }}</th>
                    @endforeach
                    <td></td>
                </tr>
            </thead>
            <tbody>
                @foreach($rows as $row)
                    <tr>
                        @foreach($columns as $column)
                            <td>{{ $row[$column] }}</td>
                        @endforeach
                        <td>
                            <a class="btn" href="{{ route('ez.collection.row.show', [
                                'collection' => $collection,
                                'id' => $row['id'],
                            ]) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No records</p>
    @endif
</body>
</html>