<!--?php
$cookie_name = "colore_preferito";
$cookie_value = "rosso";
setcookie($cookie_name,$cookie_value,time()+(86400)*30,"/");

if(isset($_COOKIE[$cookie_name])){
    echo $_COOKIE[$cookie_name];
}
?-->
<?php
//include auth.php file on all secure pages
include("auth_session.php");
$cookie_name = "GenrePref";
 if (isset($_POST['submit'])){
     $myarray = array( $_POST);
     unset($myarray[0]['submit']);
//     print_r($myarray);
     setcookie($cookie_name,serialize($myarray),time()+(86400)*15,"/");
     header("Location: main.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome Home</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>

<header>
    <p>Welcome <em style="font-size: 20px; text-transform: uppercase"><?php echo $_SESSION['username'];?>!</em></p>
    <a href="logout.php">Logout</a>
</header>
<div class="form">
    <h2><b>Available genres</b></h2>
    <form method="post" action="index.php">
        <fieldset>
            <legend><b>Select your favourite genres</b></legend>
            <div>
                <input type="checkbox" id="giallo" name="giallo" value="giallo">
                <label for="giallo">Giallo</label>
            </div>
            <div>
                <input type="checkbox" id="narrativa_ita" name="narrativaIta" value="narrativa italiana">
                <label for="narrativa_ita">Narrativa Italiana</label>
            </div>
            <div>
                <input type="checkbox" id="satira" name="satira" value="satira">
                <label for="satira">Satira</label>
            </div>
            <div>
                <input type="checkbox" id="storico" name="storico" value="storico">
                <label for="storico">Storico</label>
            </div>
            <div>
                <input type="checkbox" id="politica" name="politica" value="politica">
                <label for="politica">Politica</label>
            </div>
            <div>
                <input type="checkbox" id="horror" name="horror" value="horror">
                <label for="horror">Horror</label>
            </div>
            <div>
                <input type="submit" name="submit" value="submit">
            </div>
        </fieldset>
    </form>

</div>
</body>
</html>


