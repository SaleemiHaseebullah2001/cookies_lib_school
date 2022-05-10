<!DOCTYPE html>
<html>
<head>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet"/>
</head>
<body>
    <?php
    session_start();
    $con = mysqli_connect("localhost","asib","","biblioteca");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $cookie_name = "GenrePref";
    $myArray = unserialize($_COOKIE[$cookie_name]);
    //print_r($myArray);
    function quote($str) {
        return sprintf("'%s'", $str);
    }
    $rsarray = implode("," ,array_map("quote",$myArray[0]));
    //print_r ($rsarray);
   // $sql = "SELECT * FROM libri WHERE genere IN '$rsarray' ";
    $sql1 = 'SELECT * FROM libri WHERE genere IN ('.$rsarray.')';
    $result = mysqli_query($con,$sql1);
    echo '<table border="1px">
  <tr>
    <th>ISBN</th>
    <th>Titolo</th>
    <th>Genere</th>
    <th>Autore</th>
    <th>Editore</th>
    <th>Lingua</th>
    <th>Edizione</th>
  </tr>';
    while($row = mysqli_fetch_array($result)) {
//    echo $row['']; // Print a single column data
//   echo print_r($row);
        echo '
  <tr>
    <td>'.$row['CODICE_ISBN'].'</td>
    <td>'.$row['titolo'].' <i class="fa-solid fa-book" style="font-size:15x"</i></td>
    <td>'.$row['genere'].'</td>
    <td>'.$row['autore'].'</td>
    <td>'.$row['editore'].'</td>
    <td>'.$row['lingua'].'</td>
    <td>'.$row['edizione'].'</td>
  </tr>
';
    }
    echo '</table>';
    ?>

</body>
</html>
