<?php
// dynamic table
// dynamic rows
// dynamic columns
// check if gender of user == m ==> male
// check if gender of user == f ==> female



$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ]
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ]

    ],
    (object)[
        'id' => 3,
        'name' => 'mena',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ]
    ]
];

  function table($users){
      $fillTable="<table class='table table-info'>
                    <thead>
                    <tr>";
                    foreach ($users[0] AS $key => $value){
                        $fillTable .="<th> $key<th>";
                    }
                    $fillTable .= "</tr>
                    </thead>

                    <tbody class='table table-danger'>";
                    foreach($users AS $key => $value){
                        $fillTable .="<tr>";
                        foreach($value AS $k => $v){
                            $fillTable .="<td>";
                            if(gettype($v) !="array" && gettype($v) !="object" ){
                                $fillTable .=$v;
                            }else{
                                foreach($v AS $k1 => $v1){
                                    if($k1=='gender'){
                                        if($v1 == 'm')
                                        $v1='male';
                                    elseif($v1 =='f')
                                    $v1='female';    
                                    }
                                    $fillTable .=$v1 .',';
                                }
                            }
                                $fillTable .="</td>";
                                                }
                                                $fillTable .= "</tr>";
                    }
                    
                    $fillTable .="</tbody>
                    
            </table>";
  return $fillTable;
                                
  }
 
    

?>



<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php echo table($users); ?>
            </div>
        </div>
    </div>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>