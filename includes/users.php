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
