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

        ],
        [

            "movie_name" => "hearts",
            "movie_director" => "Tosin",
            "year_of_release" => "2004",
            "star_actor" => "khan",
            "movie_id" => 9

        ]

    ];

    public function create_movie($body)
    {


        $movie_id = count($this->movies) + 1;

        if (isset($body["movie_name"]) && isset($body["movie_director"]) && isset($body["year_of_release"]) && isset($body["star_actor"])) {
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

    public function get_all_movies()
    {
        return json_encode(
            [
                "status" => 200,
                "message" => "movies retrieved successfully",
                "user" => $this->movies
            ]
        );
    }

    public function get_single_movie($movie_id)
    {
        foreach ($this->movies as $movie) {
            if ($movie['movie_id'] == $movie_id) {
                return json_encode(
                    [
                        "status" => 200,
                        "message" => "movie retrieved successfully",
                        "user" => $movie

                    ]
                );
            }
        }
        return json_encode(
            [
                "status" => 400,
                "message" => "movie not found",
                "movies" => null
            ]
        );
    }
    public function update_movie($body)
    {
        if (isset($body['movie_id'])) {
            $movie_id = $body['movie_id'];
            $index = 0;
            foreach ($this->movies as $value) {
                if ($value['movie_id'] == $movie_id) {
                    $movie = $value;

                    if (isset($body['movie_name'])) {
                        $movie['movie_name'] = $body['movie_name'];
                    }
                    if (isset($body['movie_director'])) {
                        $movie['movie_director'] = $body['movie_director'];
                    }
                    if (isset($body['year_of_release'])) {
                        $movie['year_of_release'] = $body['year_of_release'];
                    }
                    if (isset($body['star_actor'])) {
                        $movie['star_actor'] = $body['star_actor'];
                    }

                    $this->movies[$index] = $movie;
                 return json_encode(
                     [
                         "status"=>200,
                         "message"=>"movie ". $movie['movie_name']. " with id of ". $movie['movie_id`']." has been updated"
                     ]
                 ) ;  
                }

                $index++;
            }
        } else{
            return json_encode(
                [
                    "status"=>400,
                    "message"=>"Movie not found"
                ]
                );
        }
    }
    public function delete_movie($movie_id){

        for($i=0;$i<count($this->movies);$i++){
            if($this->movies[$i]['movie_id'] == $movie_id){
                unset($this->movies[$i]);
                return json_encode(
                    [
                        "status"=>200,
                        "message"=>"Movie deleted"
                    ]
                    );
            }
        }
        return json_encode(
            [
                "status"=>404,
                "message"=>"Movie not found."
            ]
            );

    }
}
