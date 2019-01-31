<?php
/**
 * User: DesleyRoelofsen
 * Date: 20-09-18
 * Time: 21:10
 */

namespace App\Controllers;

use App\Models\Blog;
use App\Models\CarParent;
use App\Models\City;
use App\Models\Club;
use App\Models\Comment;
use App\Models\Match;
use App\Models\MatchResult;
use App\Models\MemberPlayer;
use App\Models\PlayerTeam;
use App\Models\RideRequest;
use App\Models\Role;
use App\Models\Team;
use App\Models\User;
use App\Models\UserCarAvailable;

class HomeController extends AbstractController
{

	public function homeAction()
	{
        $user_obj = new User($this->app);

        if (!$user_obj->isLoggedIn()) {
            $user_obj->redirect('./');
        }

		$user = $user_obj->getUser();

		$blog_obj = new Blog($this->app);

		$blogs = $blog_obj->getNewestBlogs();

		// Render the view, and give it the values
		$this->render('home.twig', ['user' => $user, 'blogs' => $blogs]);
	}

    public function city()
    {
        $city = new City($this->app);
        $user = new User($this->app);
        if (!$user->isLoggedIn()) {
            $user->redirect('home');
        }

        $userData = $user->getUser();
        $cities = $city->getAllCities();

        $this->render('city.twig', ['cities' => $cities, 'user' => $userData]);
    }

    public function cityAction()
    {
        $request = $this->app->get('request');

        $name = $request->input("name");

        if ($name) {
            $city = new City($this->app);
            $insert = $city->createCity($name);
            header("location: ./city");
        } else {
            header("location: ./city");
        }
    }

    public function club()
    {
        $club = new Club($this->app);
        $clubs = $club->getAllClubs();

        $city = new City($this->app);
        $cities = $city->getAllCities();
        $user = new User($this->app);
        if (!$user->isLoggedIn()) {
            $user->redirect('home');
        }

        $userData = $user->getUser();
        $this->render('club.twig', ['clubs' => $clubs, 'cities' => $cities, 'user' => $userData]);
    }

    public function clubAction()
    {
        $request = $this->app->get('request');

        $name = $request->input("name");
        $city_id = $request->input("city");
        if ($name && $city_id) {
            $club = new Club($this->app);
            $insert = $club->createClub($name, $city_id);
            header("location: ./club");
        } else {
            header("location: ./club");
        }
    }

    public function season()
    {
        $this->render('season.twig');
    }

    public function users()
    {
        $user = new User($this->app);

        if ($user->isAdmin() || $user->isTrainer()) {
            $role = new Role($this->app);
            $roles = $role->getAllRoles();

            $users = $user->getUsers();
            $userData = $user->getUser();

            $this->render('users.twig', ['users' => $users, 'user' => $userData,'roles' => $roles, 'session' => $_SESSION['user_id']]);
        }
    }

    public function rolToekenning()
    {
        $request = $this->app->get('request');
        $role = new Role($this->app);

        $users = $request->input("user");
        $rol = $request->input("rol");

        foreach ($users as $key => $user) {
            $role->createRolToekenning($user, $rol);
        }
        header("location: ./users");
    }

    public function verwijderRol()
    {
        $request = $this->app->get('request');
        $role = new Role($this->app);

        $user = $request->query("user");
        $rol = $request->query("rol");

        $role->deleteRolToekenning($rol, $user);
        header('Location: /AS80/users');
    }

    public function koppel()
    {
        $user = new User($this->app);
        if (!$user->isLoggedIn()) {
            $user->redirect('home');
        }

        $userData = $user->getUser();
        if ($user->isAdmin()) {
            $role = new Role($this->app);
            $roles = $role->getAllRoles();

            $ouders = $user->getOuders();
            $players = $user->getPlayers();
            $this->render('koppel.twig', ['ouders' => $ouders, 'players' => $players, 'user' => $userData]);
        }
    }

    public function koppelAction()
    {
        $request = $this->app->get('request');
        $memberPlayer = new MemberPlayer($this->app);

        $ouder = $request->input("ouder");
        $players = $request->input("players");
        $error = "1 of meerdere spelers zijn al gekoppeld aan ouder";

        foreach ($players as $key => $player) {
            if (!$memberPlayer->createKoppeling($ouder, $player)) {
                header( "refresh:3;url=./koppel" );
                $this->render('koppel.twig', ['error' => $error]);
                return;
            }
        }
        header( "refresh:3;url=./koppel" );
        $success = "Speler(s) zijn aan de ouder gekoppeld";
        $user = new User($this->app);
        if (!$user->isLoggedIn()) {
            $user->redirect('home');
        }

        $userData = $user->getUser();
        $this->render('koppel.twig', ['success' => $success, 'user' => $userData]);
    }

    public function team()
    {
        $user = new User($this->app);
        $club = new Club($this->app);
        $team = new Team($this->app);

        if (!$user->isLoggedIn()) {
            $user->redirect('home');
        }

        $userData = $user->getUser();

        if ($user->isAdmin()) {
            $trainers = $user->getTrainers();
            $clubs = $club->getAllClubs();
            $teams = $team->getTeams();
            $this->render('team.twig', ['trainers' => $trainers, 'clubs' => $clubs, 'teams' => $teams, 'user' => $userData]);
        }
    }

    public function teamAction()
    {
        $request = $this->app->get('request');

        $name = $request->input("name");
        $club_id = $request->input("club");
        $coach_id = $request->input('trainer');

        $team = new Team($this->app);
        $insert = $team->createTeam($name, $club_id, $coach_id);

        if ($insert) {
            header("location: ./team");
        }
    }

    public function verwijderTeam()
    {
        $request = $this->app->get('request');
        $team = new Team($this->app);

        $team_id = $request->query("id");

        if ($team->deleteTeam($team_id)) {
            header('Location: /AS80/team');
        }
    }

    public function koppelSpeler()
    {
        $team = new Team($this->app);
        $user = new User($this->app);

        if (!$user->isLoggedIn()) {
            $user->redirect('home');
        }

        $userData = $user->getUser();

        if ($user->isAdmin()) {
            $teams = $team->getTeams();
            $users = $user->getPlayers();
            $this->render('koppelspeler.twig', ['teams' => $teams, 'users' => $users, 'user' => $userData]);
        } elseif ($user->isTrainer()) {
            $teams = $team->getTeamsForTrainer();
            $users = $user->getPlayers();
            $this->render('koppelspeler.twig', ['teams' => $teams, 'users' => $users, 'user' => $userData]);
        }
    }

    public function koppelSpelerAction()
    {
        $request = $this->app->get('request');
        $playerTeam = new PlayerTeam($this->app);

        $team = $request->input("team");
        $users = $request->input("user");


        if (!$users || !$team) {
            header("refresh:3;url=./koppelspeler");
            $this->render('koppel.twig', ['error' => "Er heeft zich een fout opgetreden"]);
            return;
        }
	    foreach ($users as $key => $user) {
		    if (!$playerTeam->koppelSpeler($team, $user)) {
                header("refresh:3;url=./koppelspeler");
                $this->render('koppel.twig', ['error' => "1 of meerdere spelers zijn al gekoppeld aan team of ouder"]);
			    return;
		    }
	    }



        $success = "Speler(s) zijn aan het team gekoppeld";
        header( "refresh:3;url=./koppelspeler" );
        $this->render('koppel.twig', ['success' => $success, 'user' => $userData]);
    }

    public function match()
    {
        $user = new User($this->app);
        $team = new Team($this->app);
        $userData = $user->getUser();

        if ($user->isAdmin()) {
            $teams = $team->getTeams();
            $this->render('match.twig', ['teams' => $teams, 'user' => $userData]);
        } elseif ($user->isTrainer()) {
            $teams = $team->getTeams();
            $this->render('match.twig', ['teams' => $teams, 'user' => $userData]);
        }
    }

    public function matchToevoegen()
    {
        $request = $this->app->get('request');
        $match = new Match($this->app);
        $user = new User($this->app);
        $date = $request->input("date");
        $type = $request->input("type");
        $teamHome = $request->input("teamhome");
        $teamAway = $request->input("teamaway");
        $beschrijving = $request->input("beschrijving");
        $userData = $user->getUser();

        if (!$teamHome || !$teamAway || !$beschrijving) {
            header("refresh:3;url=./match");
            $this->render('match.twig', ['error' => "Er heeft zich een fout opgetreden", 'user' => $userData]);
            return;
        }

        if (!$match->createMatch($date, $teamHome, $teamAway, $type, $beschrijving)) {
                header("refresh:3;url=./match");
                $this->render('match.twig', ['error' => "Niet gelukt om match toe te voegen"]);
                return;
        }

        header( "refresh:3;url=./match" );
        $success = "De match is succesvol toegevoegd";
        $this->render('koppel.twig', ['success' => $success]);
    }

    public function matchResult()
    {
        $user = new User($this->app);
        $match = new Match($this->app);
        $userData = $user->getUser();

        if ($user->isAdmin() || $user->isTrainer()) {
            $matches = $match->getMatches();
            $this->render('matchresult.twig', ['matches' => $matches, 'user' => $userData]);
        }
//        } elseif ($user->isTrainer()) {
//            $matches = $match->getTrainerMatches();
//            $this->render('matchresult.twig', ['matches' => $matches]);
//        }
    }

    public function matchResultToevoegen()
    {
        $request = $this->app->get('request');
        $matchResult = new MatchResult($this->app);

        $match = $request->input("match");
        $home = $request->input("home");
        $away = $request->input("away");

        if (!$match || !$home || !$home) {
            header("refresh:3;url=./matchresult");
            $this->render('matchresult.twig', ['error' => "Er heeft zich een fout opgetreden"]);
            return;
        }

        if (!$matchResult->createMatchResult($match, $home, $away)) {
            header("refresh:3;url=./matchresult");
            $this->render('matchresult.twig', ['error' => "Niet gelukt om match resultaat toe te voegen"]);
            return;
        }

        header( "refresh:3;url=./matchresult" );
        $success = "De match is succesvol toegevoegd";
        $this->render('matchresult.twig', ['success' => $success]);
    }

    public function maxPassengers()
    {
        $carParent = new CarParent($this->app);

        $user = new User($this->app);
        if (!$user->isLoggedIn()) {
            $user->redirect('home');
        }

        $userData = $user->getUser();

        if ($user->isOuder()) {
            $passengers = $carParent->getMaxPassengers();
            $this->render('maxpassengers.twig', ['passengers' => $passengers,
                'user' => $userData]);
        }
    }

    public function maxPassengersToevoegen()
    {
        $request = $this->app->get('request');
        $carParent = new CarParent($this->app);

        $passengers = $request->input("passengers");

        if (!$passengers) {
            header("refresh:3;url=./maxpassengers");
            $this->render('maxpassengers.twig', ['error' => "Er heeft zich een fout opgetreden"]);
            return;
        }

        if (!$carParent->createMaxPassengers($passengers)) {
            header("refresh:3;url=./maxpassengers");
            $this->render('maxpassengers.twig', ['error' => "Niet gelukt om toe te voegen"]);
            return;
        }

        header( "refresh:3;url=./maxpassengers" );
        $success = "Het maximaal aantal is succesvol toegevoegd";
        $this->render('maxpassengers.twig', ['success' => $success]);
    }

    public function beschikbaarStellen()
    {
        $user = new User($this->app);
        $carParent = new CarParent($this->app);

        $match = new Match($this->app);
        $userObj = new User($this->app);
        $userDetails = $userObj->getUser();
        // MAAR.... Hoe moeten we het inleveren? Er is een deadline om 12u.. WAAR? geen idee miss op elo. Ik ga is kijken
        if ($user->isOuder()) {
            $matches = $match->getMatches();
            $this->render('beschikbaarstellen.twig', ['matches' => $matches, 'user' => $userDetails]);
        }
    }

    public function beschikbaarStellenInsert()
    {
        $request = $this->app->get('request');
        $userCarAvailable = new UserCarAvailable($this->app);

        $match = $request->input("match");

        if (!$match) {
            header("refresh:3;url=./beschikbaarstellen");
            $this->render('beschikbaarstellen.twig', ['error' => "Er heeft zich een fout opgetreden"]);
            return;
        }

        if (!$userCarAvailable->beschikbaarStellen($match)) {
            header("refresh:3;url=./beschikbaarstellen");
            $this->render('beschikbaarstellen.twig', ['error' => "Niet gelukt om beschikbaar te stellen"]);
            return;
        }

        header( "refresh:3;url=./beschikbaarstellen" );
        $success = "De beschikbaarheid is succesvol toegevoegd";
        $this->render('beschikbaarstellen.twig', ['success' => $success]);
    }

    public function ride()
    {
        $user = new User($this->app);

        $userGet = $user->getUser();


        $userCarAvailable = new UserCarAvailable($this->app);

        if ($user->isPlayer()) {
            $availables = $userCarAvailable->getAvailables();
            $this->render('ride.twig', ['user' => $userGet, 'availables' => $availables]);
        }
    }

    public function rideInsert()
    {
        $request = $this->app->get('request');
        $rideRequest = new RideRequest($this->app);

        $parent_id = $request->query("parent_id");
        $match_id = $request->query("match_id");

        if (!$parent_id || !$match_id) {
            header("refresh:3;url=/AS80/ride");
            $this->render('ride.twig', ['error' => "Er is een fout opgetreden"]);
            return;
        }

        if (!$rideRequest->insertRideRequest($parent_id, $match_id)) {
            header("refresh:3;url=/AS80/ride");
            $this->render('ride.twig', ['error' => "Niet gelukt om carpooling aan te vragen"]);
            return;
        }

        header( "refresh:3;url=/AS80/ride" );
        $success = "De carpool is succesvol toegevoegd";
        $this->render('ride.twig', ['success' => $success]);
    }

}