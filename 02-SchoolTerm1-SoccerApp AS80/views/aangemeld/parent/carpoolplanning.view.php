<?php include 'views/partials/head.php'; ?>  <!--including the header -->
<?php include 'views/partials/parent-nav.php'; ?>  <!--including the aangemeldnav -->


<div class="container mt-5">
<h1>Beschikbaarheid doorgeven</h1>
<p>Op de volgende data speelt elftal A1 een wedstrijd</p>
  <form class="mt-4" action="/aangemeld" method="GET">
 <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="wedstrijd" id="customCheck1">
  <label class="custom-control-label" for="customCheck1"><strong>12:00</strong> Almere A1 - AS'80 A1 <br><em style="font-size:12px;">zaterdag 20 oktober 2018 // <strong>uit wedstrijd</strong></em></label></div>
<br>
  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="wedstrijd" id="customCheck2">
  <label class="custom-control-label"  for="customCheck2"><strong>9:00</strong> Ajax A5 - AS'80 A1 <br><em style="font-size:12px;"> zaterdag 13 oktober 2018 // <strong>uit wedstrijd</strong></em></label><br>
  </div>
<br>
  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="wedstrijd" id="customCheck3">
  <label class="custom-control-label" for="customCheck3"><strong>14:00</strong> FC Utrecht A3 - AS'80 A1 <br><em style="font-size:12px;"> zaterdag 27 oktober 2018 // <strong>uit wedstrijd</strong></em></label><br>
 </div>
<br>
  <div class="custom-control custom-checkbox">
  <input type="checkbox" class="custom-control-input" name="wedstrijd" id="customCheck4">
  <label class="custom-control-label"  for="customCheck4"><strong>11:00 </strong>AS'80 A1 - FC Groningen A4 <br><em style="font-size:12px;">zaterdag 4 mei 2019 // <strong>thuis wedstrijd</strong></em></label><br>
 </div>
<br>
    <input type="submit" class="btn btn-outline-success" value="Bevestigen">
  </form>
</div>
<?php include 'views/partials/jsload.php' ?>
