<?php
  session_start();
include ('dbconfig.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data'])) {
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['ods'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();
         
        if (count($data) <= 1) {
            $_SESSION['message'] = "Le fichier Excel est vide.";
            header('Location: index.php');
            exit();
        }
        $count = 0;
        $errors = []; // Liste pour stocker les messages d'erreur
       
        
        foreach ($data as $row) {
            if ($count > 0) {
                $annee = $row[0];
                $mois = $row[1];
                $adrar= $row['2'];
                $ain_defla = $row['3'];
                $ain_temouchent= $row['4'];
                $alger_centre= $row['5'];
                $alger_est = $row['6'];
                $alger_ouest =$row['7'];
                    
                $annaba = $row['8'];
                $batna = $row['9'];
                $bechar = $row['10'];
                $bejaia = $row['11'];
                $biskra = $row['12'];
                $blida = $row['13'];
                $bordj_bouarreridj = $row['14'];
                $bouira = $row['15'];
                $boumerdes = $row['16'];
                
                $chlef = $row['17'];
                $constantine = $row['18'];
                
                $djelfa = $row['19'];
                $el_bayadh = $row['20'];
                $el_oued = $row['21'];
                $el_taref = $row['22'];
                $ghardaia = $row['23'];
                $guelma = $row['24'];
                $illizi = $row['25'];
                $jijel = $row['26'];

                $khenchela = $row['27'];
                $laghouat = $row['28'];
                $mascara = $row['29'];
                $medea = $row['30'];
                $mila = $row['31'];
                $mostaganem = $row['32'];
                $msila = $row['33'];
                $naama = $row['34'];
                $oran = $row['35'];
                $ouargla = $row['36'];
                $oum_el_bouaghi = $row['37'];
                $relizane = $row['38'];
                $saida = $row['39'];
                $setif = $row['40'];
                $sidi_bel_abbes = $row['41'];
                $skikda = $row['42'];
                $souk_ahras = $row['43'];

                $tamanrasset = $row['44'];
                $tebessa = $row['45'];
                $tiaret = $row['46'];
                $tindouf = $row['47'];
                $tipaza = $row['48'];
                $tissemsilt = $row['49'];
                $tizi_ouzou = $row['50'];
                $tlemcen = $row['51'];
                $beni_abbes = $row['52'];
                $bordj_badji_mokhtar = $row['53'];
                $djanet = $row['54'];
                $el_meghaier = $row['55'];
                $el_meniaa = $row['56'];
                $in_guezzam = $row['57'];
                $in_salah = $row['58'];
                $ouled_djellal = $row['59'];
                $timimoun = $row['60'];
                $touggourt = $row['61'];
                $total= $row['62'];

                // Vérifiez si une entrée avec `annee` et `mois` existe déjà dans `table2`
                $checkQuery = "SELECT * FROM table_cm_4g_lte_objectif WHERE annee = '$annee' AND mois = '$mois'";
                $checkResult = mysqli_query($conn, $checkQuery);

                if (mysqli_num_rows($checkResult) > 0) {
                    // Si l'entrée existe déjà, ajoutez un message d'erreur à la liste
                    $errors[] = "L'entrée avec l'année $annee et le mois $mois existe déjà dans la table.";
                }  else {
                    // Insérez la ligne si elle n'existe pas déjà
                    $insertQuery = "INSERT INTO table_cm_4g_lte_objectif(
                        annee, mois, adrar, ain_defla, ain_temouchent, alger_centre, alger_est, alger_ouest,
                        annaba, batna, bechar, bejaia, biskra, blida, bordj_bouarreridj, bouira, boumerdes,
                        chlef, constantine, djelfa, el_bayadh, el_oued, el_taref, ghardaia, guelma, illizi, jijel,
                        khenchela, laghouat, mascara, medea, mila, mostaganem, msila, naama, oran, ouargla, oum_el_bouaghi, relizane, saida, setif, sidi_bel_abbes, skikda, souk_ahras,
                        tamanrasset, tebessa, tiaret, tindouf, tipaza, tissemsilt, tizi_ouzou, tlemcen, beni_abbes, bordj_badji_mokhtar, djanet, el_meghaier, el_meniaa, in_guezzam, in_salah, ouled_djellal, timimoun, touggourt,total)
                        
                        VALUES (
                        '$annee', '$mois', '$adrar', '$ain_defla', '$ain_temouchent', '$alger_centre', '$alger_est', '$alger_ouest',
                        '$annaba', '$batna', '$bechar', '$bejaia', '$biskra', '$blida', '$bordj_bouarreridj', '$bouira', '$boumerdes',
                        '$chlef', '$constantine', '$djelfa', '$el_bayadh', '$el_oued', '$el_taref', '$ghardaia', '$guelma', '$illizi', '$jijel',
                        '$khenchela', '$laghouat', '$mascara', '$medea', '$mila', '$mostaganem', '$msila', '$naama', '$oran', '$ouargla', '$oum_el_bouaghi', '$relizane', '$saida', '$setif', '$sidi_bel_abbes', '$skikda', '$souk_ahras',
                        '$tamanrasset', '$tebessa', '$tiaret', '$tindouf', '$tipaza', '$tissemsilt', '$tizi_ouzou', '$tlemcen', '$beni_abbes', '$bordj_badji_mokhtar', '$djanet', '$el_meghaier', '$el_meniaa', '$in_guezzam', '$in_salah', '$ouled_djellal', '$timimoun', '$touggourt','$total')";

                    $result = mysqli_query($conn, $insertQuery);
                    if (!$result) {
                        $importSuccess = false;
                    }
                }
            } else {
                $count++;
            }
        }

        if (!empty($errors)) {
            // Affichez tous les messages d'erreur trouvés
            $_SESSION['message'] = implode('<br>', $errors);
        } else {
            // Si tout s'est bien passé, message de succès
            $_SESSION['message'] = "Importation réussie";
        }

        header('Location: index.php');
        exit();
    } else {
        $_SESSION['message'] = "Fichier invalide assurez-vous que le fichier à importer est de type ODS";
        header('Location: index.php');
        exit();
    }
}


?>    