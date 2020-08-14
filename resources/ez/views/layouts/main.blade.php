<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/ez/app.css') }}">
    <script src="https://kit.fontawesome.com/2226f8d21f.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="page-wrapper with-sidebar">
        <div class="sidebar">
            <div class="sidebar-menu">
                <!-- Sidebar brand -->
                <a href="#" class="sidebar-brand">
                  ezcms
                </a>
                <!-- Sidebar content with the search box -->
                <div class="sidebar-content">
                    <input type="text" class="form-control" placeholder="Search (coming soon)">
                </div>
                <!-- Sidebar links and titles -->
                <h5 class="sidebar-title">Collections</h5>
                <div class="sidebar-divider"></div>
                <a href="{{ route('ez.collection.index') }}" class="sidebar-link active">View all</a>
                @if(count($collections))
                    @foreach($collections as $collection)
                        <a href="{{ route('ez.collection.show', ['collection' => $collection['class']]) }}" class="sidebar-link active">{{ $collection['label'] }}</a>
                    @endforeach
                @else
                    <p>No collections yet!</p>
                @endif
              </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="{{ asset('js/ez/main.js') }}"></script>
</body>
</html>