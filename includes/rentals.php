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