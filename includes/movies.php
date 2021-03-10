<?php
function create_movie($request){
    $body=$request->getParsedBody();
   $movieD = new MoviesData();
   echo $movieD->create_movie($body);

}