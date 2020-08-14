@extends('layouts.main')

@section('content')
    <div class="content">
        <h1>{{ Illuminate\Support\Str::plural($collection) }}</h1>

        <nav aria-label="Breadcrumb navigation example">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('ez.collection.index') }}">Collections</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Illuminate\Support\Str::plural($collection) }}</li>
            </ul>
        </nav>

        @if(isset($rows) && count($rows))
            <table class="table table-outer-bordered">
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
    </div>
@endsection