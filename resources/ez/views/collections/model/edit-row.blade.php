@extends('layouts.main')

@section('content')
    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif
    <form method="post" action="{{ route('ez.collection.row.update', [
        'collection' => $collection,
        'id' => $id,
    ]) }}">
        @csrf
        @foreach($columns as $col)
            {{-- Don't let them edit the primary key, created or update timestamps (this will eventually be moved to the back-end) --}}
            @if($col->Key !== "PRI" && $col->Field !== "created_at" && $col->Field !== "updated_at")
                <input type="text" name="{{ $col->Field }}" value="{{ $col->CurrentValue }}">
            @endif
        @endforeach
        <input type="submit" name="submitted" value="Update">
    </form>
@endsection