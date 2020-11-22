@extends('template')

@section('content')
    <form action="{{action('App\Http\Controllers\Web\TeamController@store')}}" method="POST">
        @csrf
        @inputTextBox('Title')
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
