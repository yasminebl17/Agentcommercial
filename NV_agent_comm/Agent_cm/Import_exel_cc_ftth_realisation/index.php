<?php
session_start();

// Assurez-vous que l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("Location:index.php"); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    exit();
}

// Récupérer les informations de l'utilisateur connecté
$nom = htmlspecialchars($_SESSION['nom']);
$prenom = htmlspecialchars($_SESSION['prenom']);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/8c4c819bf8.js" crossorigin="anonymous"></script>
    <title> COMMERCIALISATION DES ACCES_REALISATION N / FTTH </title>
    <!-- Inclure vos fichiers CSS ou autres scripts nécessaires ici -->
    <link rel="stylesheet" href="../css/styleAgent.css">
</head>

<body>
     <!-- SIDEBAR -->
	<div class="sidebar">

  <div class="logo_details">
     <i class="bx bx-menu" id="btn"></i>
   </div>

   <ul class="nav-list">
     <li>
       <div class="icon-link">
          <a href="#">
           <i class="fa-regular fa-circle-dot sec"></i>
           <span class="link-name">Ligne TEL</span>
          </a>
          <i class="fas fa-caret-down arrow"></i>
       </div>
       <ul class="sub-menu">
         <li><a href="#" class="link-name">Ligne TEL</a></li>
         <li><a href="../Import_exel_cc_ligne_tel_re_n_1/index.php">REALISE EX[N-1]</a></li>
         <li><a href="../Import_exel_cc_ligne_tel_objectif/index.php">Objectif</a></li>
         <li><a href="../Import_exel_cc_ligne_tel_realisation/index.php">Taux Realise</a></li>
       </ul>
     </li>

     <li>
       <div class="icon-link">
         <a href="#">
           <i class="fa-regular fa-circle-dot sec"></i>
           <span class="link-name">Acces ADSL</span>
         </a>
         <i class="fas fa-caret-down arrow"></i>
       </div>
       <ul class="sub-menu">
         <li><a href="#" class="link-name">Acces ADSL</a></li>
         <li><a href="../Import_exel_cc_adsl_re_n_1/index.php">REALISE EX[N-1]</a></li>
         <li><a href="../Import_exel_cc_adsl_objectif/index.php">Objectif</a></li>
         <li><a href="../Import_exel_cc_adsl_realisation/index.php">Taux Realise</a></li>
       </ul>
     </li>

     <li>
       <div class="icon-link">
         <a href="#">
           <i class="fa-regular fa-circle-dot sec"></i>
           <span class="link-name">Acces FTTH</span>
         </a>
         <i class="fas fa-caret-down arrow"></i>
       </div>
       <ul class="sub-menu">
         <li><a href="#" class="link-name">Acces FTTH</a></li>
         <li><a href="../Import_exel_cc_ftth_re_n_1/index.php">REALISE EX[N-1]</a></li>
         <li><a href="../Import_exel_cc_ftth_objectif/index.php">Objectif</a></li>
         <li><a href="#">Taux Realise</a></li>
       </ul>
     </li>

     <li>
       <div class="icon-link">
         <a href="#">
           <i class="fa-regular fa-circle-dot sec"></i>
           <span class="link-name">Acces 4G LTE</span>
         </a>
         <i class="fas fa-caret-down arrow"></i>
       </div>
       <ul class="sub-menu">
         <li><a href="#" class="link-name">Acces 4G LTE</a></li>
         <li><a href="../Import_exel_cc_4g_lte_re_n_1/index.php">REALISE EX[N-1]</a></li>
         <li><a href="../Import_exel_cc_4G_lte_objectif/index.php">Objectif</a></li>
         <li><a href="../Import_exel_cc_4G_lte_realisation/index.php">Taux Realise</a></li>
       </ul>
     </li>
   </ul>
 </div>


<!-- SIDEBAR -->



<!-- CONTENT -->
<section class="content">
<!-- NAVBAR -->
<nav class="header">
    <div class="left">
    <div><img src="../img/logoo.svg" alt="" class="logo"></div>
    <div class="text">BILAN D'ACTIVITE MENSUEL</div>
 </div>
<div class="profile-dropdown">
    <div onclick="toggle()" class="profile-dropdown-btn">
      <div class="profile-img">
      <a href="#"></a>
        <i class="fa-solid fa-circle"></i>
      </div>

      <span>
						<?php echo $nom . ' ' . $prenom; ?>
						<i class="fa-solid fa-angle-down"></i>
					</span>
		
    
            <ul class="profile-dropdown-list">
              <li class="profile-dropdown-list-item">
                <a href="profile.php">
                  <i class="fa-regular fa-user"></i>
                  Voir Profile
                </a>
              </li>
    
              <li class="profile-dropdown-list-item">
                <a href="change_password.php">
                  <i class="fa-regular fa-envelope"></i>
                Changer mot de passe .
                </a>
              </li>
              <hr />
    
              <li class="profile-dropdown-list-item">
                <a href="logout.php">
                  <i class="fa-solid fa-arrow-right-from-bracket"></i>
                  Log out
                </a>
              </li>
            </ul>
          </div>
		</nav>
<!-- NAVBAR -->

<!-- MAIN -->
<main class="main">
    
    <h4 >
        Home / Acces FTTH / Taux Realise
    </h4>
    <h1>Commercialisation Des Acces</h1>
    
    
<div class="container">
    <div class="prt1">
        <div class="col1">
          <div class="col1-in">
             <center><b>Telecharger <br> Le model</b></center>
          </div>
        </div>
   

   <div class="col2">
     <h1> Par année</h1>
     <i class="fa-solid fa-file-arrow-up"></i>
     <a href="Model_REALISATION.xlsx" download="Model_REALISATION.xlsx">
         <button class="download-button">
             <div class="docs"><svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="20" width="20" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line y2="13" x2="8" y1="13" x1="16"></line><line y2="17" x2="8" y1="17" x1="16"></line><polyline points="10 9 9 9 8 9"></polyline></svg> Docs</div>
             <div class="download">
                 <svg class="css-i6dzq1" stroke-linejoin="round" stroke-linecap="round" fill="none" stroke-width="2" stroke="currentColor" height="24" width="24" viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line y2="3" x2="12" y1="15" x1="12"></line></svg>
             </div>
         </button>
     </a>
   </div>

</div>
   <div class="row">
    <div class="col-md-12 mt-4">
        <?php
        if (isset($_SESSION['message'])) {
            echo "<h4 class='alert alert-success'>". $_SESSION['message']. "</h4>";
            unset($_SESSION['message']);
        }
       ?>
        <div class="card">
            <div class="card-header">
                <i class="fa-solid fa-circle-exclamation"></i>
                <h4>Assurez-vous que le fichier à importer est de type ODS avant de procéder à l'importation. </h4>
            </div>
            <div class="card-body">
               <div class="col3">
                  <form action="code.php" method="POST" enctype="multipart/form-data">
                    <img src="../img/ods.png" alt="" class="csv">
                    <input type="file" name="import_file" class="upload"  >
                    <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Importer</button>

                  </form>
               </div>
                <!-- Ajouter un formulaire de recherche -->
               <div class="col4">
               <form action="view.php" method="GET" class="MY">
                    <div class="form-group">
                        <label for="annee">Année:</label> <br>
                        <input type="number" name="annee" id="annee" class="form-control" placeholder="Entrez l'année" />
                    </div>
                    <div class=" mt-3">
                        <label for="mois">Mois:</label> <br>
                        <select name="mois" id="mois" class="form-control">
                            <option value="">-- Sélectionnez un mois --</option>
                            <option value="janvier">Janvier</option>
                            <option value="février">Février</option>
                            <option value="mars">Mars</option>
                            <option value="avril">Avril</option>
                            <option value="mai">Mai</option>
                            <option value="juin">Juin</option>
                            <option value="juillet">Juillet</option>
                            <option value="août">Août</option>
                            <option value="septembre">Septembre</option>
                            <option value="octobre">Octobre</option>
                            <option value="novembre">Novembre</option>
                            <option value="décembre">Décembre</option>
                        </select>
                    </div>
                    
                </form>
                
                <!-- Ajouter un bouton pour afficher tous les enregistrements -->
                <form action="view.php" method="GET" class="srch">
                    <button type="submit" class="btn btn-secondary mt-3">Rechercher</button>
                    <div>
                      <hr> <h5> ou </h5> <hr>
                    </div>
                    <button type="submit" class="btn btn-secondary mt-3">Afficher tous les enregistrements</button>
                </form>
               </div>
            </div>
        </div>
    </div>
</div>
</div>
      
</main>

<footer>

</footer>

<script src="../JS/scriptAgent.js"></script>
</body>

</html>
