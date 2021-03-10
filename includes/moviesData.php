<?php
//new line
error_reporting(E_ALL);
ini_set('display_errors', 1);

class MoviesData
{
    private $movies = [
        [

            "movie_name" => "Queen of hearts",
            "movie_direcor" => "Queen",
            "year_of_release" => "2002",
            "star_actor" => "King khan",
            "movie_id" => 1


        ],
        [

            "movie_name" => "hearts",
            "movie_director" => "Tosin",
            "year_of_release" => "2004",
            "star_actor" => "khan",
            "movie_id" => 2

        ]

    ];

    public function create_movie($body)
    {


        $movie_id = count($this->movies) + 1;

        if (isset($body["movie_name"]) && isset($body["movie_director"]) && isset($body["year_of_release"]) && isset($body["star_actor"])) 
        {
            $movie_name = $body["movie_name"];
            $movie_director = $body["movie_director"];
            $year_of_release = $body["year_of_release"];
            $star_actor = $body["star_actor"];
            $movie = [
                "movie_name"  => $movie_name,
                "movie_director" => $movie_director,
                "year_of_release" => $year_of_release,
                "star_actor" => $star_actor,
                "movie_id" => $movie_id
            ];
            $this->movies[] = $movie;
            return json_encode(
                [
                    "status" => 200,
                    "message" => "movie created successfully"
                ]
            );
        } else {
            return json_encode(
            [
                "status" => 400,
                "message" => "incomplete fields"
            ]

            );
        }
    }
}
