<?php
 
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

        if (isset($first_name) and isset($last_name) and isset($age) and isset($phone_number) and isset($address) and isset($gender) and isset($email)) {
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
        } else {
            return json_encode(
                [
                    "status" => 400,
                    "message" => "Incomplete fields"
                ]
            );
        }
    }

    public function get_all_users()
    {
        return json_encode(
            [
                "status" => 200,
                "message" => "users retrieved successfully",
                "users" => $this->users
            ]
        );
    }

    public function get_single_user($id)
    {

        foreach ($this->users as $user) {
            if ($user['id'] == $id) {
                return json_encode(
                    [
                        "status" => 200,
                        "message" => "user retrieved successfully",
                        "user" => $user
                    ]
                );
            }
        }

        return json_encode(
            [
                "status" => 404,
                "message" => "user not found",
                "user" => null
            ]
        );
    }

    function update_user($body)
    {


        $user = null;
        $index = null;

        if (isset($body['id'])) {

            $id = $body['id'];
            for ($i = 0; $i < count($this->users); $i++) {
                if ($this->users[$i]['id'] == $id) {
                    $user = $this->users[$i];
                    $index = $i;
                }
            }

            if ($user == null) {
                return json_encode(
                    [
                        "status" => 400,
                        "message" => "User Not Found"
                    ]
                );
            }

            if (isset($body['first_name'])) {
                $first_name = $body['first_name'];
                $user['first_name'] = $first_name;
            }
            if (isset($body['last_name'])) {

                $last_name = $body['last_name'];
                $user['last_name'] = $last_name;
            }
            if (isset($body['age'])) {

                $age = $body['age'];
                $user['age'] = $age;
            }
            if (isset($body['phone_number'])) {

                $phone_number = $body['phone_number'];
                $user['phone_number'] = $phone_number;
            }
            if (isset($body['gender'])) {

                $gender = $body['gender'];

                $user['gender'] = $gender;
            }
            if (isset($body['email'])) {

                $email = $body['email'];
                $user['email'] = $email;
            }
            if (isset($body['address'])) {
                $address = $body['address'];
                $user['address'] = $address;
            }

            $this->users[$index] = $user;

            return json_encode(
                [
                    "status" => 200,
                    "message" => "User " . $user['first_name'] . " with id " . $user['id'] . " has been updated."
                ]
            );
        } else {
            return json_encode(
                [
                    "status" => 400,
                    "message" => "id is required"
                ]
            );
        }
    }

    public function delete_user($id)
    {
        $index = 0;

        foreach ($this->users as $user) {
            if ($user['id'] == $id) {
                unset($this->users[$index]);
                return json_encode(
                    [
                        "status" => 200,
                        "message" => "user deleted"
                    ]
                );
            }
            $index++;
        }

        return json_encode(
            [
                "status" => 404,
                "message" => "user not found",
                "user" => null
            ]
        );
    }
}
