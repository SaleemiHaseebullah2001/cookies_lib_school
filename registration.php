<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
$con = mysqli_connect("localhost","asib","","biblioteca");
// Check connection
if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
    // removes backslashes
    $nome = stripslashes($_REQUEST['nome']);
    $nome = mysqli_real_escape_string($con,$nome);
    $cognome = stripslashes($_REQUEST['cognome']);
    $cognome = mysqli_real_escape_string($con,$cognome);
    $genere = stripslashes($_REQUEST['genere']);
    $genere = mysqli_real_escape_string($con,$genere);
    $dob = stripslashes($_REQUEST['dob']);
    $dob = mysqli_real_escape_string($con,$dob);
    $titolo = stripslashes($_REQUEST['titolo']);
    $titolo = mysqli_real_escape_string($con,$titolo);
    $cf = stripslashes($_REQUEST['cf']);
    $cf = mysqli_real_escape_string($con,$cf);
    $paese = stripslashes($_REQUEST['paese']);
    $paese = mysqli_real_escape_string($con,$paese);
    $citta = stripslashes($_REQUEST['città']);
    $citta = mysqli_real_escape_string($con,$citta);
    $via = stripslashes($_REQUEST['via']);
    $via = mysqli_real_escape_string($con,$via);
    $civico = stripslashes($_REQUEST['civico']);
    $civico = mysqli_real_escape_string($con,$civico);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $numero = stripslashes($_REQUEST['numero']);
    $numero = mysqli_real_escape_string($con,$numero);
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);
    $query = "INSERT into lettori (nome,cognome,genere,dob,titolo,cf,paese,citta,via,civico,email,numero,username, password)
VALUES ('$nome', '$cognome', '$genere', '$dob', '$titolo', '$cf', '$password', '$citta', '$via', '$civico', '$email', '$numero', '$username', '$password')";
    $result = mysqli_query($con,$query);
    if($result){
        echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
    }
}else{
    ?>
    <div class="form">
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="nome" placeholder="Nome" required/>
            <input type="text" name="cognome" placeholder="Cognome" required/>
            <input type="text" name="genere" placeholder="Genere" required/>
            <input type="date" name="dob" placeholder="Data di nascita" required/>
            <input type="text" name="titolo" placeholder="Titolo di studio" required/>
            <input type="text" name="cf" placeholder="Codice fiscale" required/>
            <input type="text" name="paese" placeholder="paese" required/>
            <input type="text" name="città" placeholder="Città" required/>
            <input type="text" name="via" placeholder="Via" required/>
            <input type="text" name="civico" placeholder="Civico" required/>
            <input type="text" name="email" placeholder="Email" required/>
            <input type="text" name="numero" placeholder="Numero cellulare" required/>
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Register" />
        </form>
        <p>Already have an account? <a href='login.php'>Login</a></p>
    </div>
<?php } ?>
</body>
</html>