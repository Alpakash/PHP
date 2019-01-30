<?php

$router->get('', 'controllers/visiter/index.php');
$router->get('over-ons', 'controllers/visiter/about.php');
$router->get('contact', 'controllers/visiter/contact.php');
$router->get('berichten', 'controllers/berichten.php');
$router->get('aangemeld/parent', 'controllers/parent/index.parent.php');
$router->get('aangemeld/fotos', 'controllers/parent/fotos.parent.php');
$router->get('aangemeld/parent/edit', 'controllers/parent/edit.parent.php');
$router->get('carpool/planning', 'controllers/parent/carpool.parent.php');
$router->get('register', 'controllers/register.php');
$router->get('login', 'controllers/login.php');

// post 
$router->post('names', 'controllers/add-names.php');

