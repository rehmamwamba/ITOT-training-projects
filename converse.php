<?php
           
            function convert_fc_to_usd($amount_fc, $exchange_rate) {
                return $amount_fc / $exchange_rate;
            }

            function convert_usd_to_fc($amount_usd, $exchange_rate) {
                return $amount_usd * $exchange_rate;
            }

            $exchange_rate = 2800;

           
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (!empty($_POST["fc_to_usd"])) {
                    $amount_fc = $_POST["fc_to_usd"];
                    $amount_usd = convert_fc_to_usd($amount_fc, $exchange_rate);
                    echo "<p>Montant en FC : $amount_fc FC</p>";
                    echo "<p>Montant équivalent en USD : $amount_usd USD</p>";
                } elseif (!empty($_POST["usd_to_fc"])) {
                    $amount_usd = $_POST["usd_to_fc"];
                    $amount_fc = convert_usd_to_fc($amount_usd, $exchange_rate);
                    echo "<p>Montant en USD : $amount_usd USD</p>";
                    echo "<p>Montant équivalent en FC : $amount_fc FC</p>";
                }
            }
        ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertisseur FC - USD whith php</title>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: gray;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding-top: 50px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        h2 {
            color: blue;
            text-align: center;
            margin-bottom: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2> Rehma's App : Convertisseur Franc Congolais (FC) - Dollar Américain (USD)</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="fc_to_usd">De FC à USD:</label>
                <input type="text" class="form-control" name="fc_to_usd" placeholder="Montant en FC à échanger">
            </div>
            <div class="form-group">
                <label for="usd_to_fc">De USD à FC:</label>
                <input type="text" class="form-control" name="usd_to_fc" placeholder="Montant en USD à échanger">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Convertir</button>
        </form>

    </div>

</body>
</html>