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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/8c4c819bf8.js" crossorigin="anonymous"></script>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/styleAgent.css">

	<title>Agent</title>
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
         <li><a href="../Import_exel_cc_ligne_tel_realisation/index.php">Taux Realise</li>
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
         <li><a href="../Import_exel_cc_adsl_realisation/index.php">Taux Realise</li>
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
         <li><a href="../Import_exel_cc_ftth_realisation/index.php">Taux Realise</li>
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
         <li><a href="../Import_exel_cc_4G_lte_objectif/ondex.php">Objectif</a></li>
         <li><a href="../Import_exel_cc_4G_lte_realisation/index.php">Taux Realise</li>
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
				Home / Acces FTTH / Objectif
			</h4>
            <h1>Commercialisation Des Acces</h1>
			 
            <?php
include('dbconfig.php');

// Vérifier si des critères de recherche ont été soumis
$annee = isset($_GET['annee']) ? $_GET['annee'] : null;
$mois = isset($_GET['mois']) ? $_GET['mois'] : null;

$query = "SELECT * FROM table_cm_ftth_objectif";
$conditions = [];

// Si une année est spécifiée, ajoutez-la aux conditions
if ($annee !== null && $annee !== "") {
    $conditions[] = "annee = '$annee'";
}

// Si un mois est spécifié, ajoutez-le aux conditions
if ($mois !== null && $mois !== "") {
    $conditions[] = "mois = '$mois'";
}

// Ajouter les conditions à la requête si elles existent
if (count($conditions) > 0) {
    $query .= " WHERE " . implode(" AND ", $conditions);
}

// Exécuter la requête
$result = mysqli_query($conn, $query);

// Vérifier si des enregistrements ont été trouvés
if (mysqli_num_rows($result) > 0) {
    echo '<div class="outer-wrapper">';
    echo '<div class="table-wrapper">';
    echo "<table border='1'>";
    echo "<tr>
    <th>Année</th>
    <th>Mois</th>
    <th>ADRAR</th>
    <th>AIN DEFLA</th>
    <th>AIN TEMOUCHENT</th>
  
    <th>ALGER CENTRE</th>
    <th>ALGER EST</th>
    <th>ALGER OUEST</th>
    <th>ANNABA</th>
    <th>BATNA</th>
    <th>BECHAR</th>
    <th>BEJAIA</th>
    <th>BISKRA</th>
    <th>BLIDA</th>
    <th>BORDJ BOUARRERIDJ</th>
    <th>BOUIRA</th>
    <th>BOUMERDES</th>
    <th>CHLEF</th>
    <th>CONSTANTINE</th>
    <th>DJELFA</th>
    <th>EL BAYADH</th>
    <th>EL OUED</th>
    <th>EL TAREF</th>
    <th>GHARDAIA</th>
    <th>GUELMA</th>
    <th>ILLIZI</th>
    <th>JIJEL</th>
    <th>KHENCHELA</th>
    <th>LAGHOUAT</th>
    <th>MASCARA</th>
    <th>MEDEA</th>
    <th>MILA</th>
    <th>MOSTAGANEM</th>
    <th>MSILA</th>
    <th>NAAMA</th>
    <th>ORAN</th>
    <th>OUARGLA</th>
    <th>OUM EL BOUAGHI</th>
    <th>RELIZANE</th>
    <th>SAIDA</th>
    <th>SETIF</th>
    <th>SIDI BEL ABBES</th>
    <th>SKIKDA</th>
    <th>SOUK AHRAS</th>
    <th>TAMANRASSET</th>
    <th>TEBESSA</th>
    <th>TIARET</th>
    <th>TINDOUF</th>
    <th>TIPAZA</th>
    <th>TISSEMSILT</th>
    <th>TIZI OUZOU</th>
    <th>TLEMCEN</th>
    <th>BENI ABBES</th>
    <th>BORDJ BADJI MOKHTAR</th>
    <th>DJANET</th>
    <th>EL MEGHAIER</th>
    <th>EL MENIAA</th>
    <th>IN GUEZZAM</th>
    <th>IN SALAH</th>
    <th>OULED DJELLAL</th>
    <th>TIMIMOUN</th>
    <th>TOUGGOURT</th>
    <th>Date d'insertion</th>
</tr>
";
    // Ajoutez plus de colonnes ici si nécessaire
    echo "</tr>";
    
    // Parcourir les résultats et afficher chaque ligne dans le tableau
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['annee'] . "</td>";
        echo "<td>" . $row['mois'] . "</td>";
        echo "<td>" . $row['adrar'] . "</td>";
        echo "<td>" . $row['ain_defla'] . "</td>";
        echo "<td>" . $row['ain_temouchent'] . "</td>";

        echo "<td>" . $row['alger_centre'] . "</td>";
        echo "<td>" . $row['alger_est'] . "</td>";
        echo "<td>" . $row['alger_ouest'] . "</td>";
        echo "<td>" . $row['annaba'] . "</td>";
        echo "<td>" . $row['batna'] . "</td>";
        echo "<td>" . $row['bechar'] . "</td>";
        echo "<td>" . $row['bejaia'] . "</td>";
        echo "<td>" . $row['biskra'] . "</td>";
        echo "<td>" . $row['blida'] . "</td>";
        echo "<td>" . $row['bordj_bouarreridj'] . "</td>";
        echo "<td>" . $row['bouira'] . "</td>";
        echo "<td>" . $row['boumerdes'] . "</td>";
        echo "<td>" . $row['chlef'] . "</td>";
        echo "<td>" . $row['constantine'] . "</td>";
        echo "<td>" . $row['djelfa'] . "</td>";
        echo "<td>" . $row['el_bayadh'] . "</td>";
        echo "<td>" . $row['el_oued'] . "</td>";
        echo "<td>" . $row['el_taref'] . "</td>";
        echo "<td>" . $row['ghardaia'] . "</td>";
        echo "<td>" . $row['guelma'] . "</td>";
        echo "<td>" . $row['illizi'] . "</td>";
        echo "<td>" . $row['jijel'] . "</td>";
        echo "<td>" . $row['khenchela'] . "</td>";
        echo "<td>" . $row['laghouat'] . "</td>";
        echo "<td>" . $row['mascara'] . "</td>";
        echo "<td>" . $row['medea'] . "</td>";
        echo "<td>" . $row['mila'] . "</td>";
        echo "<td>" . $row['mostaganem'] . "</td>";
        echo "<td>" . $row['msila'] . "</td>";
        echo "<td>" . $row['naama'] . "</td>";
        echo "<td>" . $row['oran'] . "</td>";
        echo "<td>" . $row['ouargla'] . "</td>";
        echo "<td>" . $row['oum_el_bouaghi'] . "</td>";
        echo "<td>" . $row['relizane'] . "</td>";
        echo "<td>" . $row['saida'] . "</td>";
        echo "<td>" . $row['setif'] . "</td>";
        echo "<td>" . $row['sidi_bel_abbes'] . "</td>";
        echo "<td>" . $row['skikda'] . "</td>";
        echo "<td>" . $row['souk_ahras'] . "</td>";
        echo "<td>" . $row['tamanrasset'] . "</td>";
        echo "<td>" . $row['tebessa'] . "</td>";
        echo "<td>" . $row['tiaret'] . "</td>";
        echo "<td>" . $row['tindouf'] . "</td>";
        echo "<td>" . $row['tipaza'] . "</td>";
        echo "<td>" . $row['tissemsilt'] . "</td>";
        echo "<td>" . $row['tizi_ouzou'] . "</td>";
        echo "<td>" . $row['tlemcen'] . "</td>";
        echo "<td>" . $row['beni_abbes'] . "</td>";
        echo "<td>" . $row['bordj_badji_mokhtar'] . "</td>";
        echo "<td>" . $row['djanet'] . "</td>";
        echo "<td>" . $row['el_meghaier'] . "</td>";
        echo "<td>" . $row['el_meniaa'] . "</td>";
        echo "<td>" . $row['in_guezzam'] . "</td>";
        echo "<td>" . $row['in_salah'] . "</td>";
        echo "<td>" . $row['ouled_djellal'] . "</td>";
        echo "<td>" . $row['timimoun'] . "</td>";
        echo "<td>" . $row['touggourt'] . "</td>";
        
        
        echo "<td>" . $row['date_insertion'] . "</td>";


        

        echo "</tr>";
    }
    
    echo "</table>";
    echo "</div>";
    echo "</div>";
} else {
    // Afficher un message s'il n'y a pas de résultats (cela ne devrait arriver que s'il n'y a pas d'entrées dans la table ou que les critères de recherche ne correspondent à rien)
    echo "Aucun enregistrement trouvé.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
			  
		</main>



	<script src="../JS/scriptAgent.js"></script>
</body>
</html>
