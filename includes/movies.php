<?php
function create_movie($request){
    $body=$request->getParsedBody();
   $movieD = new MoviesData();
   echo $movieD->create_movie($body);

}

function get_all_movies($request){
    $movieD = new MoviesData();
    echo $movieD->get_all_movies();
}
function get_single_movie($request)
{
    if(isset($request->getQueryParams()['movie_id']))
    {

        $id= $request->getQueryParams()['movie_id'];
        $movieD = new MoviesData();
        echo $movieD->get_single_movie($id);
    } else{
        echo json_encode(
            [
                "status"=>404,
                "message"=> "Movie Id is required",
                "user"=>null
            ]
        );
    } 

}

function update_movie($request)
{
    $body= $request->getParsedBody();
    $movieD = new MoviesData();
    echo $movieD->update_movie($body);

}