<?php include 'views/partials/head.php'; ?>  <!--including the header -->
<?php include 'views/partials/parent-nav.php'; ?>  <!--including the aangemeldnav -->


<div class="container mt-5">
<h1>Profiel bewerken</h1>
  <form class="mt-4" action="edit-profile.php" method="GET">
  <div class="form-group"> <label for="">Voornaam:</label>
    <input type="text" class="form-control" name="fname" value="Peter" readonly>
    </div>
  
    <div class="form-group"><label for="">Achternaam:</label>
    <input type="text" class="form-control" name="lname" value="Dekker" readonly>
    </div>
 
    <div class="form-group"><label for="">Ouder/verzorger van spelers:</label>
    <input type="text" class="form-control" name="kind" value="Leon Dekker, Lisanne Dekker en John Dekker" readonly>
    </div>
       <div class="form-group"><label for="">Email:</label>
    <input type="text" class="form-control" name="lname" value="Deekman@gmail.com" >
    </div>
    <div class="form-group"><label for="">Aantal zitplaatsen beschikbaar in de auto:</label>
    <input type="text" class="form-control" name="auto_capaciteit" value="5">
    </div>

    <input type="submit" class="btn btn-outline-success" value="Bewerken">
  </form>
</div>
<?php include 'views/partials/jsload.php' ?>
