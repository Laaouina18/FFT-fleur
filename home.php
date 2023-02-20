<?php
require "database.php";
$dsn = 'mysql:host=localhost;dbname=fft_fleur;charset=utf8mb4';
$db = new Database($dsn);

$taches = $db->query("select * from taches")->statement->fetchAll();




?>
<!DOCTYPE html>
<html>

<head>
  <title>FFT - Gestionnaire de tâches</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">

</head>

<body>
  <header style="z-index:4;">
    <h1>FFT - Gestionnaire de tâches</h1>
    <div>

      <form method="POST" action="controller.php" class="descriptiontodo">
        <input name="description" placeholder="ecrit.." class="input mb-6" style="bottom: 40%; left: 20%;">
        <?php

        if(isset($_GET['update'])){

          echo '
          <button class="btn btn-primary" type="submit" name="update"> update</button>
          <input name="id" type="hidden" value="" placeholder="ecrit.." class="input mb-6" style="bottom: 40%; left: 20%;">
          ';
        }
        else{
          echo '<button class="btn btn-primary" type="submit" style=" " name="save"> save</button>';
        }
        ?>
        
        
      </form>

    </div>
    <button class="button-login">Login</button>
  </header>
  <div class="container">
    <!-- TACHE 1 -->
    <div class="card">
      <div class="card-header " style="background-color:rgb(200, 211, 234);">
        <div class="card-title">TO DO</div>

      </div>
      <div>

        <?php
        foreach ($taches as $tache) {
          if ($tache["status"] == "todo") { ?>
           
               <div class="model1 d-flex justify-content-between ">
          <div class="card-description">
          <?php  echo $tache['description']; ?>
          </div>


          <div class="d-flex flex-column justify-content-between">

            <button style="list-style:none;border:none;background-color: transparent;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
              </svg></button>

            <button style="list-style:none;border:none;background-color: transparent;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z" />
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
              </svg>
              <a href="/updateTache.php?update=doing&id=<?=$tache['id']?>" >
              <button style="list-style:none;border:none;background-color: transparent;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
              </button>
              </a>
            </button>
          </div>
        </div>
              <?php 
          }
        }
        ?>

      </div>


    </div>


    <!-- TACHE 2222 -->


    <div class="card">
      <div class="card-header " style="background-color:rgb(147, 198, 151);">
        <div class="card-title">DOING</div>

      </div>
      <div>
      <?php
        foreach ($taches as $tache) {
          if ($tache["status"] == "doing") { ?>
           
            <div class="model2 d-flex justify-content-between ">
          <div class="card-description">
          <?php  echo $tache['description']; ?>
          </div>


          <div class="d-flex flex-column justify-content-between">

          <a href="/home.php?update=true?id=<?=$tache['id']?>">
          <button style="list-style:none;border:none;background-color: transparent;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
              </svg>
          </button>
          </a>

            <button style="list-style:none;border:none;background-color: transparent;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z" />
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
              </svg>
              <a href="/updateTache.php?update=done&id=<?=$tache['id']?>" >
              <button style="list-style:none;border:none;background-color: transparent;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
              </button>
          </a>
            </button>
          </div>
        </div>
              <?php 
          }
        }
        ?>
      </div>



    </div>




    <!-- tache333 -->


    <div class="card">
      <div class="card-header " style="background-color:pink;">
        <div class="card-title">DONE</div>

      </div>
      <div>
      <?php
        foreach ($taches as $tache) {
          if ($tache["status"] == "done") { ?>
           
               <div class="model3 d-flex justify-content-between ">
          <div class="card-description">
          <?php  echo $tache['description']; ?>
          </div>


          <div class="d-flex flex-column justify-content-between">

            <button style="list-style:none;border:none;background-color: transparent;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
              </svg></button>

            <button style="list-style:none;border:none;background-color: transparent;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-x" viewBox="0 0 16 16">
                <path d="M6.854 7.146a.5.5 0 1 0-.708.708L7.293 9l-1.147 1.146a.5.5 0 0 0 .708.708L8 9.707l1.146 1.147a.5.5 0 0 0 .708-.708L8.707 9l1.147-1.146a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146z" />
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z" />
              </svg>
              <a href="/updateTache.php?update=archive&id=<?=$tache['id']?>" >
              <button style="list-style:none;border:none;background-color: transparent;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </svg>
              </button>
          </a>
            </button>
          </div>
        </div>
              <?php 
          }
        }
        ?>
      </div>




    </div>
  </div>












  <footer class="footer" style="width: 65%;
    margin: auto;">
    <div class="containerr">
      <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-12">
          <h3>Notre entreprise</h3>
          <p>Nous sommes une entreprise spécialisée dans la plantation, la culture et l'exportation de fleurs.</p>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12">
          <h3>Contactez-nous</h3>
          <ul class="contact-info">
            <li><i class="fa fa-map-marker"></i> 123 Rue des Fleurs, Paris</li>
            <li><i class="fa fa-phone"></i> +33 123 456 789</li>
            <li><i class="fa fa-envelope"></i> info@fft.com</li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12">
          <h3>Abonnez-vous à notre newsletter</h3>
          <form class="newsletter-form">
            <input type="email" placeholder="Entrez votre adresse e-mail">
            <button type="submit">S'abonner</button>
          </form>
        </div>
      </div>
    </div>
  </footer>
  <script type="text/javascript">
    var button = document.getElementById("ajoutertodo");
    var inputWrapper = document.getElementsByClassName("descriptiontodo");

    button.addEventListener("click", function() {
      inputWrapper.style.display = "block";
    });
  </script>

</body>

</html>