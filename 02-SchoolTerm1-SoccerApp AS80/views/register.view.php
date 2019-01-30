<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AS'80 Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" media="screen" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/loginstyles.css">
</head>
<body class="mt-3">
  <a href="/"><span class="whiteText ml-3"><i class="fas fa-angle-left"></i> <strong>Terug naar site</strong></span></a>

    <div class="container mt-5">
    
    <h1>Maak een account aan</h1>
    <p>Word lid van de AS'80 app en sluit je aan bij een team:</p>
    <form action="login.php" method="POST">

 <div class="form-group">
         <input type="text" class="form-control" name="firstName" placeholder="Voornaam">
        </div>

        <div class="form-group">
         <input type="text" class="form-control" name="secondName" placeholder="Achternaam">
        </div>

        <div class="form-group">
         <input type="email" class="form-control" name="email" placeholder="Email Address">
        </div>

        <div class="form-group">
         <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
      


<button class="btn btn-primary" type="submit">Register </button>
        </form>
<br> <center><b><h3>Idee i.p.v. registratie form</h3></b><br><i>Is dit wel verstandig om te doen? Want AS'80 heeft 1300 leden</i></center>
<br>
        Trainer maakt account in db:
        <ul>
        <li>Naam</li>
        <li>Email</li>
        <li>Rol: Speler of Ouder</li>
        </ul>
<br><center><b><h3>Vervolgens</h3></b></center>
        <ol> 
        <li>Speler of ouder ontvangt een e-mail</li>
        <li>Persoon bevestigd email</li>
        <li>Persoon wordt gestuurd naar pagina om een wachtwoord aan te maken</li> 
        <li>Persoon wordt gestuurd naar login pagina + alert msg (wachtwoord geupdate)</li>
        <li>Persoon moet inloggen</li>
        </ol>
</body>
</html>