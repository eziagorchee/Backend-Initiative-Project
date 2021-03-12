<?php
function initiate_rentals($request)
{
    $body = $request->getParsedBody();
    $rent = new Rentals;
    echo $rent->initiate_rentals($body);
}
function get_all_rentals($request)
{
    $rent = new Rentals;
    echo $rent->get_all_rentals();
}
function get_single_rental($request)
{
    if (isset($request->getQueryParams()['movie_id'])) {
        $movie_id = $request->getQueryParams()['movie_id'];
        $single_rent = new Rentals;
        echo $single_rent->get_single_rental($movie_id);
    } else {
        return json_encode(
            [
                "status" => 400,
                "message" => "ID required"
            ]
        );
    }
}
function update_rental($request)
{
    if (isset($request->getParsedBody()['movie_id'])) {
        $body = $request->getParsedBody();
        $update=new Rentals;
        echo $update->update_rental($body);
    }else {
        echo json_encode(
            [
                "status"=>400,
                "message"=>"id is required"
            ]
            );
    }
}
