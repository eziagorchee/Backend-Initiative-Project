<?php
class Rentals
{
    private $movie_for_rents =
    [
        [
            'movie_name' => "Queen of hearts",
            "movie_id" => 1,
            "copies_available" => 10,
            "date_of_purchase" => "12-03-2020",
            "date_of_hire" => "30-03-2020",
            "date_due_for_return" => "30-04-2020",
            "remarks" => "ghehfhgawhfghhgf"
        ],
        [
            'movie_name' => "Queen",
            "movie_id" => 2,
            "copies_available" => 100,
            "date_of_purchase" => "11-05-2020",
            "date_of_hire" => "30-08-2020",
            "date_due_for_return" => "30-09-2020",
            "remarks" => "yugfrggrfghrfh"
        ]
    ];
    public function initiate_rentals($body)
    {
        $movie_id = count($this->movie_for_rents) + 1;
        if (isset($body['movie_name']) and isset($body['copies_available']) and isset($body['date_of_purchase']) and isset($body['date_of_hire']) and isset($body['date_due_for_return']) and isset($body['remarks'])) {
            $movie_name = $body['movie_name'];
            $copies_available = $body['copies_available'];
            $date_of_purchase = $body['date_of_purchase'];
            $date_of_hire = $body['date_of_hire'];
            $date_due_for_return = $body['date_due_for_return'];
            $remarks = $body['remarks'];

            $movie_for_rent =
                [
                    "movie_name" => $movie_name,
                    "copies_available" => $copies_available,
                    "date_of_purchase" => $date_of_purchase,
                    "date_of_hire" => $date_of_hire,
                    "date_due_for_return" => $date_due_for_return,
                    "remarks" => $remarks,
                    "movie_id" => $movie_id

                ];
            $this->movie_for_rents[] = $movie_for_rent;
            return json_encode(
                [
                    "status" => 200,
                    "message" => "Rentals initiated successfully"
                ]

            );
        } else {return json_encode
            (
                [
                    "status" => 400,
                    "message" => "All fieds required"
                ]
                );
           
        }
    }
    public function get_all_rentals()
    {
        return json_encode(
            [
                "status"=>200,
                "message"=>"Rentals retrieved succesfully",
                "rentals"=>$this->movie_for_rents
            ]
            );
    }
    public function get_single_rental($movie_id){
    foreach($this->movie_for_rents as $key=>$value){
        if($value['movie_id']==$movie_id){
            $movie_for_rent=$this->movie_for_rents[$key];
            return json_encode(
                [
                    "status"=>200,
                    "message"=> "rental retrieved successfully",
                    "rental"=>$movie_for_rent
                ]
                );
        }else{
            return json_encode(
                [
                    "status"=>400,
                    "message"=> "Movie id not found",
                    "rental"=>null
                ]
                );

        }

    }
}
}
