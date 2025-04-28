
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perkalian Matriks dengan Perulangan</title>

    <style>
    table {
        border:2;
    }
    td, th {
        border : 1px solid black;
        width: 30px;
        height : 30px
        text-align: center;
    }
    .ganjil{
        background-color : yellow;
    }
    .genap {
        background-color : blue;
    }
    .bil {
        background-color: lime;
    }
    </style>
</head>

<body>
    <table>
    <tr>
    <th>Bilangan</th>
        <?php
        for ($i =1; $i <=10; $i++){
            echo "<th class='bil'>$i</th>";
        }
        ?>
    </tr>

    <?php
    for($i=1; $i <=10; $i++){
        echo"<tr>";
        echo "<th class='bil'>$i</th>";
        for($j=1; $j <=10; $j++){
            $hasil = $i * $j;

            if( $i & $j % 2!=0){
                echo "<td class='ganjil'>$hasil</td>";
            }else {
                echo "<td class='genap'>$hasil</td>";
            }
        }
        echo"</tr>";
    }
    ?>
    </table>
</body>
</html>