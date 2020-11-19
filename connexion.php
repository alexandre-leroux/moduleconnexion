<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css" />
    <title>connexion</title>
</head>


<body>

<main>




<?php include("media/code/header.php"); ?>


<?php

    $bdd = new PDO('mysql:host=localhost;dbname=moduleconnexion;charset=utf8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>









<div class="container " id="page_centrale_connexion">

    <div class="row h-100  ">

        <div class="col-12 h-100 d-flex justify-content-center align-items-center">

                <form class="w-50"  action="connexion.php" method="post">


                            <div class="form-group">
                                <label for="login">Login</label>
                                <input  type="login" name="login" required class="form-control" id="login" aria-describedby="emailHelp">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                </form>

        </div>


    </div>       

</div>

<?php



    @$login = htmlspecialchars($_POST['login']);
    @$password = htmlspecialchars($_POST['password'], PASSWORD_DEFAULT);
    
        if(  isset($_POST['submit'])  )
        {
            $reqlogin = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ? AND password = ?');
            $reqlogin->execute(array($login, $password));
            $userexist = $reqlogin->rowCount();
            if ( $userexist == 1)
            {
                echo ' YOUIIIIIIII id';
            }
            else
            {
                echo ' mauvais id';
            }
        }
        else
        {
                echo ' remplir les champs';
        }





?>

<?php

    isset($_POST);
    var_dump( $_POST);
    echo '<br>';
    echo $_POST['login'];

?>




</main>


<?php include("media/code/footer.php");?>

</body>

</html>