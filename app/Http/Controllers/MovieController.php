<?php

namespace App\Http\Controllers;

use App\Business\API\MovieDB;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = (new MovieDB)->getMovies();
        return view('movie.index', compact('movies'));
    }

    public function detail($id)
    {
        $movie = (new MovieDB)->getMovie($id);
        return view('movie.detail', compact('movie'));
    }
}
