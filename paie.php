<?php
$date = isset($_POST["date"]) ? $_POST["date"] : "";
$heures = isset($_POST["heures"]) ? $_POST["heures"] : "";
$nombreJoursFeriesTravailles = isset($_POST["jours_feries_travailles"]) ? $_POST["jours_feries_travailles"] : "";
$nombreWeekendsTravailles = isset($_POST["weekends_travailles"]) ? $_POST["weekends_travailles"] : "";
$salaireTotal = 0;
$estWeekend = "Non";
$estFerie = "Non";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $heuresTravaillees = (int)$heures;
    $salaireHoraire = 25;

   
    $heuresNormales = min($heuresTravaillees, 6);
    $heuresSupplementaires = max($heuresTravaillees - 6, 0);

    
    $salaireTotal += $heuresNormales * $salaireHoraire * 1.3;

    
    $salaireTotal += $heuresSupplementaires * $salaireHoraire * 1.5;

    
    $jourSemaine = date('N', strtotime($date));
    $jourMois = date('d-m', strtotime($date));
    if ($jourSemaine == 6 || $jourSemaine == 7 || in_array($jourMois, ['01-01', '01-05', '08-05', '14-07', '15-08', '01-11', '11-11', '25-12'])) {
        $salaireTotal += $heuresTravaillees * $salaireHoraire * 2; 
        $estWeekend = $jourSemaine == 6 || $jourSemaine == 7 ? "Oui" : "Non";
        $estFerie = in_array($jourMois, ['30-12', '31-01', '17-01', '01-04', '17-05']) ? "Oui" : "Non";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Rehma's Calcul de paie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>

        body{
            background-color: gray;
        }

        h2{
            color: blue;
        }
        .custom-form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2> Rehma's Calcul de paie</h2>

    <form method="post" action="" class="mt-3">
        <div class="form-group">
            <label for="date">Date (JJ-MM):</label>
            <input type="text" name="date" id="date" class="form-control" value="<?php echo $date; ?>">
        </div>
        <div class="form-group">
            <label for="heures">Heures travaillées:</label>
            <input type="text" name="heures" id="heures" class="form-control" value="<?php echo $heures; ?>">
        </div>
        <div class="form-group">
            <label for="jours_feries_travailles">Jours fériés travaillés:</label>
            <input type="number" name="jours_feries_travailles" id="jours_feries_travailles" class="form-control" value="<?php echo $nombreJoursFeriesTravailles; ?>">
        </div>
        <div class="form-group">
            <label for="weekends_travailles">Week-ends travaillés:</label>
            <input type="number" name="weekends_travailles" id="weekends_travailles" class="form-control" value="<?php echo $nombreWeekendsTravailles; ?>">
        </div>
       
        <div class="custom-form-group">
            <label for="est_ferie">Est un jour férié:</label>
            <span id="est_ferie"><?php echo $estFerie; ?></span>
        </div>
        <div class="custom-form-group">
            <label for="est_weekend">Est un week-end:</label>
            <span id="est_weekend"><?php echo $estWeekend; ?></span>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Calculer</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
        <div class="alert alert-success mt-3" role="alert">
            Le salaire total pour le <?php echo $date; ?> est de : <?php echo $salaireTotal; ?>$
        </div>
    <?php endif; ?>
</div>

</body>
</html>
