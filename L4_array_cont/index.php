<?php

    $people = [
        0 => [
            'name' => 'Peter Parker',
            'age' => 18,
            'weight' => 70
            
        ],
        1 => [
            'name' => 'Tony Stark',
            'age' => 40,
            'weight' => 80
        ],
        2 => [
            'name' => 'Thor Odinson',
            'age' => 29,
            'weight' => 100
        ],
        3 => [
            'name' => 'Black Widow',
            'age' => 35,
            'weight' => 60
        ],
        4 => [
            'name' => 'Hulk',
            'age' => 23,
            'weight' => 500
        ],
        5 => [
            'name' => 'Captain America',
            'age' => 489,
            'weight' => 90
        ],
        6 => [
            'name' => 'Captain Marvel',
            'age' => 489,
            'weight' => 65
        ],
        7 => [
            'name' => 'War Machine',
            'age' => 40,
            'weight' => 80
        ],
        8 => [
            'name' => 'Winter Soldier',
            'age' => 489,
            'weight' => 90
        ]
    ];

    //Render Select box
    $ageArr = [];
    $weightArr = [];

    foreach ($people as $key => $value) {
        array_push($ageArr, $value['age']);
        array_push($weightArr, $value['weight']);
    }

    $ageArr = array_unique($ageArr);
    $weightArr = array_unique($weightArr);


    function createOption($arr){
        foreach ($arr as $key => $value) {                           
            $temp = '
                        <option value="'.$value.'">'.$value.'</option>
                    ';
            echo $temp;
        }
    }



    //render table if selected or not selected
    function createTemplate($key, $value) {
        $temp = "<tr class = 'row-parent'>
                    <th scope='row'>".($key + 1)."</th>
                    <td>
                        ".$value['name']."
                    </td>
                    <td>
                        ".$value["age"]."
                    </td>
                    <td>
                        ".$value["weight"]."
                    </td>
                    
                </tr>";
        return $temp;
    }

    $selectResult = [];

    if(isset($_POST['selected'])){
        $selected = $_POST['selected'];       
        $selected2 = null; 
        foreach ($people as $key => $value) {
            if ($selected == $value['age']) {

                $selectResult[$key] = $value;
            }                          
            
        }
    }else if (isset($_POST['selected2'])) {        
        $selected2 = $_POST['selected2'];          
        $selected = null;
        foreach ($people as $key => $value) {
            if ($selected2 == $value['weight']) {
                $selectResult[$key] = $value;
            }                          
            
        }
    }else{
        $selected = null;
        $selected2 = null;
        $selectResult = $people;
    }

   

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form id = 'main-form' action="index.php" method = "POST">
                    <select id = 'select-box' name="selected">
                    <option value="default">Select age</option>
                    <?php
                        createOption($ageArr);
                    ?>
                    </select>
                </form>
                <form id = 'main-form2' action="index.php" method = "POST">
                    
                    <select id = 'select-box2' name="selected2">
                    <option value="default">Select weight</option>
                    <?php
                        createOption($weightArr);
                    ?>
                    </select>
                </form>
            </div>
            <div class="col-12">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>                            
                            <th scope="col">Weight</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($selectResult as $key => $value) {
                            echo createTemplate($key, $value);
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
            if ($selectResult) {
                foreach ($selectResult as $key => $value) {
                    $temp ='Average between age and weight is: <b>' . (($value["age"] + $value["weight"])/2) . '</b><br/>';
                    echo $temp;
                }
            }
        ?>
    </div>

    






    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./app.js"></script>
</body>
</html>

