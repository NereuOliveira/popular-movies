<?php
/**
 * Created by PhpStorm.
 * User: nereu
 * Date: 22/10/2017
 * Time: 23:15
 */

namespace App\Business\API;


use Carbon\Carbon;

class MovieDB
{
    private const BASE = 'https://api.themoviedb.org/3/%s?%s';

    private $api_key = '';

    public function __construct()
    {
        $this->api_key = env('THE_MOVIE_DB_API');
    }

    private function getURL($method, array $parameters = [])
    {
        $parameters_str = 'api_key=' . $this->api_key;

        foreach ($parameters as $key => $parameter)
            $parameters_str .= '&' . $key . '=' . $parameter;

        return sprintf(MovieDB::BASE, $method, $parameters_str);
    }

    public function getMovies()
    {
        $url    = $this->getURL('discover/movie', ['sort_by' => 'popularity.desc']);
        $json   = collect(json_decode(file_get_contents($url), true)['results']);
        return $json->map(function ($item) {
            return collect([
                'id'            => $item['id'],
                'title'         => $item['title'],
                'poster_path'   => $item['poster_path']
            ]);
        });
    }

    public function getMovie($id)
    {
        $url    = $this->getURL('movie/' . $id);
        $json   = json_decode(file_get_contents($url), true);

        return collect([
            'title'         => $json['title'],
            'poster_path'   => $json['poster_path'],
            'release_date'  => Carbon::parse($json['release_date']),
            'runtime'       => $json['runtime'],
            'synopsis'      => $json['overview'],
            'rating'        => $json['vote_average']
        ]);

    }
}