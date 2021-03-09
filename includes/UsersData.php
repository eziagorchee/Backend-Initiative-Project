<?php
//new line
error_reporting(E_ALL);
ini_set('display_errors', 1);
class UsersData
{
    private $users = [
        [
            "first_name" => "Ada",
            'last_name' => 'Eziagor',
            'age' => '23',
            'phone_number' => '0704566663',
            'address' => 'Osun state',
            'gender' => 'female',
            'email' => 'eziaggg@gmail.com',
            'id' => 1

        ],
        [
            "first_name" => 'Ose',
            'last_name' => 'Osho',
            'age' => '22',
            'phone_number' => '3666737377',
            'address' => 'Lagos',
            'gender' => 'male',
            'email' => 'oegtdg@gmail.com',
            'id' => 2

        ]
    ];

    public function create_user($body)
    {
        $first_name = $body['first_name'];
        $last_name = $body['last_name'];
        $age = $body['age'];
        $phone_number = $body['phone_number'];
        $address = $body['address'];
        $gender = $body['gender'];
        $email = $body['email'];

        $id = count($this->users) + 1;

        if(isset($first_name)and isset($last_name)and isset($age)and isset($phone_number)and isset($address)and isset($gender)and isset($email)){
            $user = [
                "first_name" => $first_name,
                'last_name' => $last_name,
                'age' => $age,
                'phone_number' => $phone_number,
                'address' => $address,
                'gender' => $gender,
                'email' => $email,
                'id' => $id
    
            ];
            $this->users[] = $user;
    
            return json_encode(
                [
                    "status" => 200,
                    "message" => "User has been created"
                ]
            );
            
        } else{
            return json_encode(
                [
                    "status" => 400,
                    "message" => "Incomplete fields"
                ]
                );
        }

       
    }
}
