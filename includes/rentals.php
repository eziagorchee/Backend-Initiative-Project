<?php
function initiate_rentals($request)
{
    $body=$request->getParsedBody();
    $rent=new Rentals;
    echo $rent->initiate_rentals($body);

}
function get_all_rentals($request)
{
$rent= new Rentals;
echo $rent->get_all_rentals();
}
function get_single_rental($request)
{if(isset($request->getQueryParams()['movie_id']))
    {
        $movie_id=$request->getQueryParams()['movie_id'];
        $single_rent=new Rentals;
        echo $single_rent->get_single_rental($movie_id);
    } else{
        return json_encode(
            [
                "status"=>400,
                "message"=> "ID required"
            ]
            );
    }
    
}