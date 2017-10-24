@extends('layout.app', ['title' => 'Movie Details', 'return_to' => '/'])

@section('content')
    <div class="movie-detail">
        <div class="row header">
            <div class="col">
                <h3>{{ $movie->get('title') }}</h3>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6 col-md-3">
                <img src="http://image.tmdb.org/t/p/w342/{{ $movie->get('poster_path') }}" alt="{{ $movie->get('title') }}" class="img-fluid">
            </div>
            <div class="col-6 col-md-3">
                <div class="row">
                    <div class="col">
                        <h3>{{ $movie->get('release_date')->format('Y') }}</h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h5>{{ $movie->get('runtime') }} min</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h5>{{ $movie->get('rating') }}/10</h5>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="fa fa-plus"></i>
                            FAVORITE
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col">
                <p id="detail-synopsis">{{ $movie->get('synopsis') }} </p>
            </div>
        </div>
    </div>
@endsection