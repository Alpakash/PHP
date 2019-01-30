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

<body id="LoginForm">
<div class="container mt-5">
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Inloggen</h2>
   <p>Vul hier je e-mailadres en wachwoord in</p>
   </div>

    <form action="/aangemeld" method="POST">
        <div class="form-group">
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email Address">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
        </div>
        <div>
          <button type="submit" class="btn btn-primary mr-2">Inloggen</button> <a href="#">Wachtwoord vergeten?</a>
</div>
      <br><br><br>
        <center>
        login werkt nog niet:<br>
         <a href="/aangemeld/parent">Inlog als Ouder</a><br>
        <a href="#">Inlog als Speler</a><br>
        <a href="#">Inlog als Trainer</a><br>
        </center>
    </form>
    </div>
</div></div></div>

</body>
</html>