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
        } else {
            return json_encode(
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
                "status" => 200,
                "message" => "Rentals retrieved succesfully",
                "rentals" => $this->movie_for_rents
            ]
        );
    }
    public function get_single_rental($movie_id)
    {
        foreach ($this->movie_for_rents as $key => $value) {
            if ($value['movie_id'] == $movie_id) {
                $movie_for_rent = $this->movie_for_rents[$key];
                return json_encode(
                    [
                        "status" => 200,
                        "message" => "rental retrieved successfully",
                        "rental" => $movie_for_rent
                    ]
                );
            } else {
                return json_encode(
                    [
                        "status" => 400,
                        "message" => "Movie id not found",
                        "rental" => null
                    ]
                );
            }
        }
    }
    public function update_rental($body)
    {
        foreach ($this->movie_for_rents as $index => $object_at_that_index) {
            if ($object_at_that_index['movie_id'] == $body['movie_id']) {
                $movie_for_rent = $object_at_that_index;
                if (isset($body['movie_name'])) {
                    $object_at_that_index['movie_name'] = $body['movie_name'];
                }
                if (isset($body['copies_available'])) {
                    $object_at_that_index['copies_available'] = $body['copies_available'];
                }
                if (isset($body['date_of_purchase'])) {
                    $object_at_that_index['date_of_purchase'] = $body['date_of_purchase'];
                }
                if (isset($body['date_of_hire'])) {
                    $object_at_that_index['date_of_hire'] = $body['date_of_hire'];
                }
                if (isset($body['date_due_for_return'])) {
                    $object_at_that_index['date_due_for_return'] = $body['date_due_for_return'];
                }
                if (isset($body['remarks'])) {
                    $object_at_that_index['remarks'] = $body['remarks'];
                }
                $this->movie_for_rents[$index] = $object_at_that_index;
                return json_encode(
                    [
                        "status" => 200,
                        "message" => "Rental, whose movie name is " . $object_at_that_index['movie_name'] . " with the ID of " . $object_at_that_index['movie_id'] . " has been updated"
                    ]
                );
            }
        }

        return json_encode(
            [
                "status" => 400,
                "message" => "Id not found"
            ]
        );
    }
    public function delete_rental($movie_id)
    {
        foreach($this->movie_for_rents as $index=>$object_at_that_index){
            if($object_at_that_index['movie_id']==$movie_id){
                unset($object_at_that_index);
                echo json_encode(
                    [
                        "status"=>200,
                        "message"=>"rental deleted"
                    ]
                    );

            }
        }
        
            return json_encode([
                "status"=>400,
                "message"=>'ID not found'

            ]);
        
    }
}
