<?php
if($_SERVER['HTTP_HOST'] == 'localhost:127.0.0.1' || $_SERVER['HTTP_HOST'] == 'localhost:9999' || $_SERVER['HTTP_HOST'] == 'localhost:1337') {
    /**
     * GET routes
     */

// visitor routes
    $router->get('', 'PagesController@home');
    $router->get('home', 'PagesController@home');

// logged in routes
    $router->get('players', 'PagesController@players');
    $router->get('games', 'PagesController@games');
    $router->post('games', 'PagesController@games');
    $router->get('battles', 'PagesController@battles');

// account routes
    $router->get('login', 'PagesController@login');
    $router->get('register', 'PagesController@register');
    $router->get('logout', 'PagesController@logout');
    $router->get('edit', 'PagesController@edit');
    $router->get('delete', 'PagesController@delete');


// redirect to games when winner is chosen
    $router->get('winner/got', 'PagesController@winnergot');
    $router->get('winner/wow', 'PagesController@winnerwow');
    $router->get('winner/lotr', 'PagesController@winnerlotr');

    // get battles page
    $router->get('battles/show', 'PagesController@showbattles');

    // get gamequotes page
    $router->get('quotes', 'PagesController@gamequotes');

    /**
     * POST routes
     */

// account routes
    $router->post('register', 'PagesController@register');
    $router->post('login', 'PagesController@login');
    $router->post('edit', 'PagesController@edit');

// redirect to the gamebattle when play button is clicked on games page
    $router->post('battles/got', 'PagesController@got');
    $router->post('battles/wow', 'PagesController@wow');
    $router->post('battles/lotr', 'PagesController@lotr');


} else {
    // visitor routes
    $router->get('~s1126375/P1_OOAPP_Opdracht', 'PagesController@home');
    $router->get('~s1126375/P1_OOAPP_Opdracht/home', 'PagesController@home');

//  logged in routes
    $router->get('~s1126375/P1_OOAPP_Opdracht/players', 'PagesController@players');
    $router->get('~s1126375/P1_OOAPP_Opdracht/games', 'PagesController@games');
    $router->post('~s1126375/P1_OOAPP_Opdracht/games', 'PagesController@games');
    $router->get('~s1126375/P1_OOAPP_Opdracht/battles', 'PagesController@battles');

//  account routes
    $router->get('~s1126375/P1_OOAPP_Opdracht/login', 'PagesController@login');
    $router->get('~s1126375/P1_OOAPP_Opdracht/register', 'PagesController@register');
    $router->get('~s1126375/P1_OOAPP_Opdracht/logout', 'PagesController@logout');
    $router->get('~s1126375/P1_OOAPP_Opdracht/edit', 'PagesController@edit');
    $router->get('~s1126375/P1_OOAPP_Opdracht/delete', 'PagesController@delete');

// redirect to games when winner is chosen
    $router->get('~s1126375/P1_OOAPP_Opdracht/winner/got', 'PagesController@winnergot');
    $router->get('~s1126375/P1_OOAPP_Opdracht/winner/wow', 'PagesController@winnerwow');
    $router->get('~s1126375/P1_OOAPP_Opdracht/winner/lotr', 'PagesController@winnerlotr');

    // get battles page
    $router->get('~s1126375/P1_OOAPP_Opdracht/battles/show', 'PagesController@showbattles');


    /**
     * POST routes
     */
    $router->post('~s1126375/P1_OOAPP_Opdracht/register', 'PagesController@register');
    $router->post('~s1126375/P1_OOAPP_Opdracht/login', 'PagesController@login');
    $router->post('~s1126375/P1_OOAPP_Opdracht/edit', 'PagesController@edit');

    // redirect to the gamebattle when play button is clicked on games page
    $router->post('~s1126375/P1_OOAPP_Opdracht/battles/got', 'PagesController@got');
    $router->post('~s1126375/P1_OOAPP_Opdracht/battles/wow', 'PagesController@wow');
    $router->post('~s1126375/P1_OOAPP_Opdracht/battles/lotr', 'PagesController@lotr');

    // get gamequotes page
    $router->get('~s1126375/P1_OOAPP_Opdracht/quotes', 'PagesController@gamequotes');

}