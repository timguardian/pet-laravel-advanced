@extends('template')

@section('content')
    <form action="{{action('App\Http\Controllers\Web\TeamController@store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" />
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
