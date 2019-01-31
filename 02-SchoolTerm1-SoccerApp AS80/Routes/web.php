<?php

/** @var \App\Routing\Router $this */

// index routes
$this->get('', 'index:PagesController');
$this->get('home', 'homeAction:HomeController');
$this->get('over-ons', 'aboutAction:PagesController');
$this->get('contact', 'contactAction:PagesController');

// Standaard routes voor iedere isloggedIn
$this->get('fotos', 'photosAction:PagesController');
$this->get('blog', 'getAllBlogs:BlogController');
$this->get('blog/[i]:id', 'getBlog:BlogController');
$this->get('artikel', 'blogArticleAction:PagesController');

// Login routes
$this->get('login', 'loginAction:LoginController');
$this->post('login', 'loginAction:LoginController');
$this->get('register', 'registerAction:LoginController');
$this->post('register', 'registerAction:LoginController');
$this->get('uitloggen', 'logoutAction:LoginController');
$this->get('verify-user/:hash', 'verifyUser:LoginController');

// City, club, season, team routes
$this->get('city', 'city:HomeController');
$this->post('city', 'cityAction:HomeController');
$this->get('club', 'club:HomeController');
$this->post('club', 'clubAction:HomeController');
$this->get('season', 'season:HomeController');
$this->get('users', 'users:HomeController');
$this->get('koppel', 'koppel:HomeController');
$this->get('team', 'team:HomeController');
$this->post('team', 'teamAction:HomeController');
$this->get('koppelspeler', 'koppelSpeler:HomeController');
$this->post('koppelspeler', 'koppelSpelerAction:HomeController');
$this->get('match', 'match:HomeController');
$this->post('matchtoevoegen', 'matchToevoegen:HomeController');
$this->get('matchresult', 'matchResult:HomeController');
$this->post('matchresulttoevoegen', 'matchResultToevoegen:HomeController');
$this->get('maxpassengers', 'maxPassengers:HomeController');
$this->post('maxpassengers', 'maxPassengersToevoegen:HomeController');
$this->get('beschikbaarstellen', 'beschikbaarStellen:HomeController');
$this->post('beschikbaarstellen', 'beschikbaarStellenInsert:HomeController');
$this->get('ride', 'ride:HomeController');
$this->get('ride/:parent_id/:match_id', 'rideInsert:HomeController');

// Parent routes
$this->get('edit', 'editAction:ParentController');
$this->post('edit', 'editAction:ParentController');
$this->get('planning', 'carpoolPlanningAction:ParentController');

// Trainer routes
$this->post('roltoekenning', 'rolToekenning:HomeController');
$this->post('koppel', 'koppelAction:HomeController');

// Verwijder routes
$this->get('verwijderrol/:user/:rol', 'verwijderRol:HomeController');
$this->get('verwijderteam/:id', 'verwijderTeam:HomeController');

$this->get('uploaden', 'imageAction:ImageController');
$this->post('uploaden', 'image:ImageController');