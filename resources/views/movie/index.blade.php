@extends('layout.app', ['title' => 'Popular Movies'])

@section('content')

    <div class="row">
        @foreach($movies as $movie)
            <div class="col-6 col-lg-3 p-0">
                <a href="{{ action('MovieController@detail', $movie->get('id')) }}">
                    <img src="http://image.tmdb.org/t/p/w342/{{ $movie->get('poster_path') }}" alt="{{ $movie->get('title') }}" class="img-fluid">
                </a>
            </div>
        @endforeach
    </div>

@endsection