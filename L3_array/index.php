<?php

    $people = [
        0 => [
            'name' => 'Peter Parker',
            'age' => 18
        ],
        1 => [
            'name' => 'Tony Stark',
            'age' => 40
        ],
        2 => [
            'name' => 'Thor Odinson',
            'age' => 29
        ],
        3 => [
            'name' => 'Black Widow',
            'age' => 35
        ],
        4 => [
            'name' => 'Hulk',
            'age' => 23
        ],
        5 => [
            'name' => 'Captain America',
            'age' => 489
        ],
        6 => [
            'name' => 'Captain Marvel',
            'age' => 489
        ],
        7 => [
            'name' => 'War Machine',
            'age' => 40
        ],
        8 => [
            'name' => 'Winter Soldier',
            'age' => 489
        ]
    ]

    

    
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
                        
                        $newArr = [];
                        foreach ($people as $key => $value) {
                            //--C1
                            // if (in_array($value['age'], $newArr)) {
                            //     continue;
                            // }else{
                            //     array_push($newArr, $value['age']);
                            // }
                            //--C2
                            array_push($newArr, $value['age']);
                            
                        }
                        $newArr = array_unique($newArr);
                        
                        foreach ($newArr as $key => $value) {                           
                            $temp = '
                                        <option value="'.$value.'">'.$value.'</option>
                                    ';
                            echo $temp;
                        }
                    ?>
                    </select>
                    <!-- <input type="submit" value="submit"> -->
                </form>
            </div>
            <div class="col-12">
            <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        function createTemplate($key, $value) {
                            $temp = "<tr class = 'row-parent'>
                                        <th scope='row'>".($key + 1)."</th>
                                        <td>
                                            ".$value['name']."
                                        </td>
                                        <td>
                                            ".$value["age"]."
                                        </td>
                                        
                                    </tr>";
                            echo $temp;
                        }
                        if(isset($_POST['selected'])){
                            $selected = $_POST['selected'];
                            
                            foreach ($people as $key => $value) {
                                if ($selected == $value['age']) {
                                    createTemplate($key, $value);
                                }                          
                                
                            }
                        }else{
                            foreach ($people as $key => $value) {                   
                                createTemplate($key, $value);                                       
                            }
                        }
                        
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>








    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="./app.js"></script>
</body>
</html>

