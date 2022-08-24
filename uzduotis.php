<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namų darbai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container col-4 text-center">
        <h1>Atlyginimas</h1>
        <form action="" method="POST">
            <input class="form-control" type="text" name="alga" placeholder="Pradinis atlyginimas"> <br>
            <input class="form-control" type="text" name="didinimas" placeholder="Algos didinimas"> <br>
            <button class="btn btn-success">Skaičiuoti</button>
        </form>
        <?php
        if (isset($_POST['alga'])) {
            $alga = $_POST['alga'];
            $didinimas = $_POST['didinimas'];
            $men = 1;
            $naujaAlga = $didinimas;
            while ($alga > $didinimas) {
                $didinimas += $naujaAlga;
                $men++;
            }
            echo "Dvigubas ar daugiau atlyginimas bus po $men mėnesių";
        }
        ?>

        <hr>
        <h1>Lyginiai - Nelyginiai</h1>
        <form action="" method="POST">
            <input class="form-control" type="text" name="skaicius" placeholder="Įveskite skaičių"> <br>
            <button class="btn btn-success">Tikrinti</button>
        </form>
        <?php
        if (isset($_POST['skaicius'])) {
            $skaicius = $_POST['skaicius'];
            $num = 0;
            $lyg = 0;
            $nelyg = 0;
            while ($skaicius > 0) {
                $num = $skaicius % 10;
                if ($num % 2 == 0) {
                    $lyg++;
                } else {
                    $nelyg++;
                }
                $skaicius = floor($skaicius / 10);
            }
            echo "Lyginiu $lyg Nelyginiu $nelyg";
        }
        ?>
        <hr>
        <h1>TEMPERATŪROS</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="upload" value="1">
            <input class="form-control" type="file" name="failas"><br>
            <button class="btn btn-success">Tikrinti</button>
        </form>
        <?php

        if (isset($_POST['upload'])) {
            $_FILES['failas']['tmp_name'];
            move_uploaded_file($_FILES['failas']['tmp_name'], 'C:/xampp/htdocs/PHP/php5/' . $_FILES['failas']['name']);

            $failas = 'C:/xampp/htdocs/PHP/php5/' . $_FILES['failas']['name'];
            $f = fopen($failas, 'r');

            $suma = 0;
            $count = 0;
            $min = 100;
            $max = 0;
            while ($eilute = fgets($f)) {
                $suma += $eilute;
                $count++;
                if ($min > $eilute) {
                    $min = $eilute;
                }
                if ($max < $eilute) {
                    $max = $eilute;
                }
            }
            $vidurkis = round($suma / $count, 2);


            echo "Temperatūros vidurkis yra: $vidurkis °C <br>";
            echo "Mininali Temperatūra yra: $min °C <br>";
            echo "Maksimali Temperatūra yra: $max °C <br>";


            fclose($f);
        }


        ?>
    </div>
</body>

</html>