--    table_cm_ligne_tel_objectif

CREATE TABLE table_cm_ligne_tel_objectif(
    annee INT NOT NULL, -- Colonne pour l'année
    mois ENUM(
        'janvier',
        'février',
        'mars',
        'avril',
        'mai',
        'juin',
        'juillet',
        'août',
        'septembre',
        'octobre',
        'novembre',
        'décembre',
        'OBJECTIF ANNUEL'

    ) NOT NULL, -- Colonne pour le mois
    adrar INT, -- Colonne pour la région ADRAR
    ain_defla INT, -- Colonne pour la région AIN DEFLA
    ain_temouchent INT, -- Colonne pour la région AIN TEMOUCHENT
    alger_centre INT, -- Colonne pour la région ALGER CENTRE
    alger_est INT, -- Colonne pour la région ALGER EST
    alger_ouest INT, -- Colonne pour la région ALGER OUEST
    annaba INT, -- Colonne pour la région ANNABA
    batna INT, -- Colonne pour la région BATNA
    bechar INT, -- Colonne pour la région BECHAR
    bejaia INT, -- Colonne pour la région BEJAIA
    biskra INT, -- Colonne pour la région BISKRA
    blida INT, -- Colonne pour la région BLIDA
    bordj_bouarreridj INT, -- Colonne pour la région BORDJ BOUARRERIDJ
    bouira INT, -- Colonne pour la région BOUIRA
    boumerdes INT, -- Colonne pour la région BOUMERDES
    chlef INT, -- Colonne pour la région CHLEF
    constantine INT, -- Colonne pour la région CONSTANTINE
    djelfa INT, -- Colonne pour la région DJELFA
    el_bayadh INT, -- Colonne pour la région EL BAYADH
    el_oued INT, -- Colonne pour la région EL_OUED
    el_taref INT, -- Colonne pour la région EL_TAREF
    ghardaia INT, -- Colonne pour la région GHARDAIA
    guelma INT, -- Colonne pour la région GUELMA
    illizi INT, -- Colonne pour la région ILLIZI
    jijel INT, -- Colonne pour la région JIJEL
    khenchela INT, -- Colonne pour la région KHENCHELA
    laghouat INT, -- Colonne pour la région LAGHOUAT
    mascara INT, -- Colonne pour la région MASCARA
    medea INT, -- Colonne pour la région MEDEA
    mila INT, -- Colonne pour la région MILA
    mostaganem INT, -- Colonne pour la région MOSTAGANEM
    msila INT, -- Colonne pour la région M'SILA
    naama INT, -- Colonne pour la région NAAMA
    oran INT, -- Colonne pour la région ORAN
    ouargla INT, -- Colonne pour la région OUARGLA
    oum_el_bouaghi INT, -- Colonne pour la région OUM EL BOUAGHI
    relizane INT, -- Colonne pour la région RELIZANE
    saida INT, -- Colonne pour la région SAIDA
    setif INT, -- Colonne pour la région SETIF
    sidi_bel_abbes INT, -- Colonne pour la région SIDI BEL ABBES
    skikda INT, -- Colonne pour la région SKIKDA
    souk_ahras INT, -- Colonne pour la région SOUK AHRAS
    tamanrasset INT, -- Colonne pour la région TAMANRASSET
    tebessa INT, -- Colonne pour la région TEBESSA
    tiaret INT, -- Colonne pour la région TIARET
    tindouf INT, -- Colonne pour la région TINDOUF
    tipaza INT, -- Colonne pour la région TIPAZA
    tissemsilt INT, -- Colonne pour la région TISSEMSILT
    tizi_ouzou INT, -- Colonne pour la région TIZI OUZOU
    tlemcen INT, -- Colonne pour la région TLEMCEN
    beni_abbes INT, -- Colonne pour la région BENI ABBES
    bordj_badji_mokhtar INT, -- Colonne pour la région BORDJ BADJI MOKHTAR
    djanet INT, -- Colonne pour la région DJANET
    el_meghaier INT, -- Colonne pour la région EL MEGHAIER
    el_meniaa INT, -- Colonne pour la région EL MENIAA
    in_guezzam INT, -- Colonne pour la région IN GUEZZAM
    in_salah INT, -- Colonne pour la région IN SALAH
    ouled_djellal INT, -- Colonne pour la région OULED DJELLAL
    timimoun INT, -- Colonne pour la région TIMIMOUN
    touggourt INT, -- Colonne pour la région TOUGGOURT
    total INT, -- Colonne pour le total des données mensuelles
    PRIMARY KEY (annee, mois) -- Clé primaire sur l'année et le mois
);


ALTER TABLE table_cm_ligne_tel_objectif
ADD COLUMN date_insertion DATETIME DEFAULT CURRENT_TIMESTAMP;


DELIMITER //

CREATE TRIGGER trigger_calculate_total
AFTER INSERT ON table_cm_ligne_tel_objectif
FOR EACH ROW
BEGIN
    -- Calcule la somme des colonnes de 'adrar' à 'touggourt' et met à jour la colonne 'total'
    UPDATE table_cm_ligne_tel_objectif
    SET total = NEW.adrar + NEW.ain_defla + NEW.ain_temouchent + NEW.alger_centre + NEW.alger_est +
               NEW.alger_ouest + NEW.annaba + NEW.batna + NEW.bechar + NEW.bejaia + NEW.biskra +
               NEW.blida + NEW.bordj_bouarreridj + NEW.bouira + NEW.boumerdes + NEW.chlef +
               NEW.constantine + NEW.djelfa + NEW.el_bayadh + NEW.el_oued + NEW.el_taref +
               NEW.ghardaia + NEW.guelma + NEW.illizi + NEW.jijel + NEW.khenchela + NEW.laghouat +
               NEW.mascara + NEW.medea + NEW.mila + NEW.mostaganem + NEW.msila + NEW.naama +
               NEW.oran + NEW.ouargla + NEW.oum_el_bouaghi + NEW.relizane + NEW.saida +
               NEW.setif + NEW.sidi_bel_abbes + NEW.skikda + NEW.souk_ahras + NEW.tamanrasset +
               NEW.tebessa + NEW.tiaret + NEW.tindouf + NEW.tipaza + NEW.tissemsilt + NEW.tizi_ouzou +
               NEW.tlemcen + NEW.beni_abbes + NEW.bordj_badji_mokhtar + NEW.djanet + NEW.el_meghaier +
               NEW.el_meniaa + NEW.in_guezzam + NEW.in_salah + NEW.ouled_djellal + NEW.timimoun +
               NEW.touggourt
    WHERE annee = NEW.annee AND mois = NEW.mois;
END //

DELIMITER ;
