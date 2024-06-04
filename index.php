<?php
class Calculator {
    public static function add($a, $b) {
        return number_format($a + $b, 3, '.', '');
    }

    public static function subtract($a, $b) {
        return number_format($a - $b, 3, '.', '');
    }

    public static function multiply($a, $b) {
        return number_format($a * $b, 3, '.', '');
    }

    public static function divide($a, $b) {
        if ($b != 0) {
            return number_format($a / $b, 3, '.', '');
        } else {
            return "Erreur: Division par zéro!";
        }
    }
}

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = $_POST["num1"];
    $num2 = $_POST["num2"];
    $operator = $_POST["operator"];

    if (is_numeric($num1) && is_numeric($num2)) {
        switch ($operator) {
            case "+":
                $result = Calculator::add($num1, $num2);
                break;
            case "-":
                $result = Calculator::subtract($num1, $num2);
                break;
            case "*":
                $result = Calculator::multiply($num1, $num2);
                break;
            case "/":
                $result = Calculator::divide($num1, $num2);
                break;
            default:
                $result = "Opérateur non valide!";
        }
    } else {
        $result = "Veuillez saisir des nombres valides svp.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice Simple</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: gray;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding-top: 50px;
        }
        .form-
        group {
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
        <h2> Rehma's Calculator training</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <input type="text" class="form-control" name="num1" placeholder="Nombre 1" required>
            </div>
            <div class="form-group">
                <select class="form-control" name="operator">
                    <option value="+" selected>+</option>
                    <option value="-">-</option>
                    <option value="*">*</option>
                    <option value="/">/</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="num2" placeholder="Nombre 2" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Calculer</button>
        </form>
        <?php if ($result !== ""): ?>
            <div class="result mt-4">
                <p>Résultat : <?php echo $result; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
