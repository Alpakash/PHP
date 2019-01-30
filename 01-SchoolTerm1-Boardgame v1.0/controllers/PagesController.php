<?php

class PagesController {

  public function players()
  {
    // Get all data from the users table and put the data in the Users class
    $users = App::get('database')->selectAll('users', 'Users');

    // view(show) the players page and make the users variable available
    return view('players', compact('users'));
  }


  // view the pages where the key is defined in the routes.php
  public function home()
  {
    return view('index');
  }



  public function battles()
  {
      // Get all data from the battles table and put the data in the Battles class
      $battles = App::get('database')->selectAll('battles', 'Battles');
      // view(show) the battles page and make the users battles available
    return view('battles', compact('battles'));
  }

  public function games()
  {
        // Get all data from the users table and put the data in the Users class
    $users = App::get('database')->selectAll('users', 'Users');
// Get all data from the battles table and put the data in the Battles class
      $battles = App::get('database')->selectAll('battles', 'Battles');
        // view the games page and make the users 
    return view('games', compact('users'));
  }

public function login()
{
    return view('login');
}

public function register()
{
    return view('register');
}

public function logout()
{
    return view('logout');
}

  public function edit()
  {
    return view('edit');
  }

  public function delete()
  {
    return view('delete');
  }

  public function got()
  {
    // Get all data from the users table and put the data in the Users class
    $users = App::get('database')->selectAll('users', 'Users');
        // view the winner/got page and make the users 
    return view('gamegot', compact('users'));
  }

  public function wow()
  {
      // Get all data from the users table and put the data in the Users class
    $users = App::get('database')->selectAll('users', 'Users');
        // view the winner/wow page and make the users 
    return view('gamewow', compact('users'));
  }
  
  public function lotr()
  {
      // Get all data from the users table and put the data in the Users class
    $users = App::get('database')->selectAll('users', 'Users');
        // view the winner/lotr page and make the users 
    return view('gamelotr', compact('users'));
  }

  // update the winner column in the games table
  public function winnergot()
  {
    return view('winnergot');
  }
  public function winnerwow()
  {
    return view('winnerwow');
  }
  public function winnerlotr()
  {
    return view('winnerlotr');
  }

  public function showbattles()
  {
      // Get all data from the battles table and put the data in the Battles class
      $battles = App::get('database')->selectAll('battles', 'Battles');
      // view(show) the battles page and make the users battles available
      return view('showbattles', compact('battles'));
  }

    public function gamequotes()
    {
        return view('gamequotes');
    }
}