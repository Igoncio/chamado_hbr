<?php

use App\Entity\Usuario;


$objuser = Usuario::getUser($_GET['id_user']);

print_r($objuser);


