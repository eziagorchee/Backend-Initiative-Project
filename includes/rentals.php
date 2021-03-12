<?php
function initiate_rentals($request)
{
    $body=$request->getParsedBody();
    $rent=new Rentals;
    echo $rent->initiate_rentals($body);

}