<?php require 'views/partials/head.php'; ?>
<?php include "views/partials/nav.php"; ?>

<?php

// if the user is not logged in return back to login page
if (!$userObj->isLoggedIn()) {
    $userObj->redirect('login?loginerror=1');
}

?>

    <div class="container-fluid">
        <div class="row">
            <div class="jumbotron jumbotron-fluid">
                <h4 class="page-title">Quotes 4 Life</h4>
                <center><h4 style="color: #fff;">Life itself is a quotation. ~Jorge Luis Borges </h4></center>
            </div>


            <div class="container"> <!-- Beginning of the div container-->

                <center><h5>Talent wins games, but teamwork and intelligence wins championships.</h5>  - Michael Jordan</center> <br><br> <br><br>
                <center><h5>Video games are bad for you? That's what they said about rock-n-roll.</h5>  - Shigeru Miyamoto</center> <br><br> <br><br>
                <center><h5>Yesterday's home runs don't win today's games.</h5>  - Babe Ruth</center> <br><br> <br><br>
                <center><h5>We want everybody to act like adults, quit playing games, realize that it's not just my way or the highway.</h5>  - Barack Obama</center> <br><br> <br><br>
                <center><h5>Games shouldn't only be fun. They should teach or spark an interest in other things. </h5>  - Hideo Kojima</center> <br><br> <br><br>
                <center><h5>Do not take life too seriously. You will never get out of it alive.</h5>  - Elbert Hubbard</center> <br><br> <br><br>
                <center><h5>Education is not just about going to school and getting a degree. It's about widening your knowledge and absorbing the truth about life.</h5>  - Shakuntala Devi</center> <br><br> <br><br>
                <center><h5>Remember your dreams and fight for them. You must know what you want from life. There is just one thing that makes your dream become impossible: the fear of failure.</h5>  - Paulo Coelho</center> <br><br> <br><br>


            </div> <!-- End div - users container -->

        </div>


    </div> <!-- End div row -->
    </div> <!-- End container -->

    </div> <!-- End div row -->
    </div> <!-- End container -->
<?php require 'partials/foot.php'; ?>