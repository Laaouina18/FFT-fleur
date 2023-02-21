<?php
require "database.php";

$dsn = 'mysql:host=localhost;dbname=fft_fleur;charset=utf8mb4';
$db = new Database($dsn);

if(isset($_GET['id'])){
    $taches = $db->query("select * from taches where id=:id" , ["id"=>$_GET['id']])->statement->fetch();

}
if (isset($_POST['submit'])) {
    $id = $_GET['id'];
    
    $description = $_POST['description'];
    $db->query("UPDATE taches SET description=:description WHERE id=:id",
    [
        "id"=>$_GET['id'],
        "description"=>$description
    
]);
header('Location: ./home.php');
exit;
}


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

    <form method="POST" action="update.php?id=<?=$_GET['id']?>" class="descriptiontodo">
     
        <input name="description" value="<?= $taches['description'] ?>" class="input mb-6" style="bottom: 40%; left: 20%;" required>
      
        <button class="btn btn-primary" type="submit"  name="submit">Save</button>
      </form>

    </div>
    <button class="button-login">Login</button>
  </header>
  <div class="container">
    <!-- TACHE 1 -->


    <!-- TACHE 2222 -->




    <!-- tache333 -->


    
   
    
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


</body>

</html>