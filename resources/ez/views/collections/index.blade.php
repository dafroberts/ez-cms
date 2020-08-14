@extends('layouts.main')

@section('content')
    <div class="content">
        <h1>Collections</h1>

        <nav aria-label="Breadcrumb navigation example">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Collections</li>
            </ul>
        </nav>

        @if(count($collections))
            <table class="table table-outer-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($collections as $collection)
                        <tr>
                            <td><strong>{{ $collection['label'] }}</strong></td>
                            <td class="text-right">
                                <a class="btn btn-primary" href="{{ route('ez.collection.show', ['collection' => $collection['class']]) }}">View rows</a>
                                <div class="dropdown">
                                    <button class="btn" data-toggle="dropdown" type="button" id="advanced-dropdown-toggle-btn" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-code" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="advanced-dropdown-toggle-btn">
                                        <div class="dropdown-content p-20">
                                            <p><strong>Class</strong></p>
                                            <p><kbd>{{ $collection['namespace'].'\\'.$collection['class'] }}</kbd></p>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info" role="alert">
                No collections found. Create a collection by running <code>php artisan make:collection</code>.
            </div>
        @endif
    </div>
@endsection