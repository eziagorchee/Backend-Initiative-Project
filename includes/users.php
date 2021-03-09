<?php

function create_user($request)
{
    $body = $request->getParsedBody();
    $user_op = new UsersData();
    echo $user_op->create_user($body);
}
function get_all_users($request){
    $user_op = new UsersData();
    echo $user_op->get_all_users();
}

function get_single_user($request){
    if(isset($request->getQueryParams()['id'])){
        $id =  $request->getQueryParams()['id'];
        $user_op = new UsersData();
        echo $user_op->get_single_user($id);
    }else{
        echo json_encode(
            [
                "status"=>404,
                "message"=> "Id is required",
                "user"=>null
            ]
        );
    }
  
}

function update_user($request)
{
    $body = $request->getParsedBody();
    $user_op = new UsersData();
    echo $user_op->update_user($body);
}