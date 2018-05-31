<?php

// Sudoku

$sudoku = [
    [ [0,0,0], [0,0,0], [0,0,0] ],
    [ [0,0,0], [0,0,0], [0,0,0] ],
    [ [0,0,0], [0,0,0], [0,0,0] ],

    [ [0,0,0], [0,0,0], [0,0,0] ],
    [ [0,0,0], [0,0,0], [0,0,0] ],
    [ [0,0,0], [0,0,0], [0,0,0] ],

    [ [0,0,0], [0,0,0], [0,0,0] ],
    [ [0,0,0], [0,0,0], [0,0,0] ],
    [ [0,0,0], [0,0,0], [0,0,0] ]
];

$sudoku = testInit($sudoku);

// retourne la cellule à la colonne c et à la ligne l
// getCellule(0,0) <=>  $sudoku[0][0][0]
// getCellule(1,0) <=> $sudoku[0][0][1]
// getCellule(5,7) <=> $sudoku[7][1][2]

function getCellule($col, $lig, $sudoku) {
    return $sudoku[$lig][floor($col / 3)][$col % 3];
}

function setCellule($col, $lig, $val, $sudoku) {
    $sudoku[$lig][floor($col / 3)][$col % 3] = $val;
    return $sudoku;
}

function testInit($sudoku) {
    $n = 0;
    for($i=0;$i<9;$i++) {
        for($j=0;$j<9;$j++) {
            $n++;
            $sudoku = setCellule($j,$i,$n,$sudoku);
        }
    }
    return $sudoku;
}

function afficheSudoku($sudoku) {
    // générer une table html pour représenter la grille de sudoku
    $out = "";
    $out .= "<table class=\"grille\">";
    for($i=0;$i<9;$i++) {
        $out .= "<tr>";
        for($j=0;$j<9;$j++) {
            $n++;
            $out .= "<td>" . getCellule($j, $i, $sudoku) . "</td>";
        }
        $out .= "</tr>";
    }

    $out .= "</table>";
    return $out;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sudoku ☠️</title>
    <style>
        .grille {
            table-layout: fixed;
            width: 450px;
        }

        tr, td {
            border: solid;
        }

        td {
            width: 50px;
            height: 50px;
            text-align:center; 
            vertical-align:middle;
        }
    </style>
</head>
<body>
    <div>
        <?= afficheSudoku($sudoku) ?>

        <!-- <table class="grille">
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
                <td>4</td>
                <td>5</td>
                <td>6</td>
                <td>7</td>
                <td>8</td>
                <td>9</td>
            </tr>
            <tr>
                <td>10</td>
                <td>11</td>
                <td>12</td>
                <td>13</td>
                <td>14</td>
                <td>15</td>
                <td>16</td>
                <td>17</td>
                <td>18</td>
            </tr>
        </table> -->
    </div>
</body>
</html>