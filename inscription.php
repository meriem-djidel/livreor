<?php
session_start();
include('connect.php');
include('header.php');
?>
<?php

    if (isset($_SESSION['login']) == TRUE) { 

       echo ' <header>
        <label><button><a href="index.php">Accueil</a></button></label>
        <label><button><a href="livre-or.php">l\'ivre d\'or</a></button></label>
        <label><button><a href="profil.php">Ton profil</a></button></label>
        <label><button><a href="deconnexion.php">Déconnexion</a></button></label></header>';
         } else {
      echo '  <header>
      <label><button><a href="index.php">Accueil</a></button></label>
      <label><button><a href="livre-or.php">l\'ivre d\'or</a></button></label>
        <label><button><a href="connexion.php">Connecte-toi</a></button></label></header>';
  }
   
// on verifie si les champs sont  remplie et s'il existe
if (isset($_POST['submit'])) {

    //VARIABLES 
    $login = $_POST['login'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    //TEST si password = paswword comfirm
    
        $req = $pdo->prepare("SELECT *  FROM utilisateurs WHERE login= '$login '");
        $req->execute();
        $result = $req->fetch();
        $row = $req->rowCount();
        if ($password != $password_confirm) {
        echo "Les mots de passe ne sont pas identique";
        }elseif ($row['login'] == 1) {
            echo "login existe déjà";
        }else{
            $req = $pdo->prepare("INSERT INTO utilisateurs (login,password) VALUES ('$login ','$password')");
            $req->execute();
            header('location:connexion.php');
        }
}
?>
<div class="formu">
    <form action="" method="post">
        <table>
            <tr>
                <td>Login</td>
                <td><input type="text" name="login" require></td>
            </tr>
            <tr>
                <td>Password</td>
                <td> <input type="password" name="password" require></td>
            </tr>
            <tr>
                <td>Password</td>
                <td> <input type="password" name="password_confirm" require></td>
            </tr>
        </table>
        <button name="submit">Valider</button>
    </form>
</div>
</header>
</body>

</html>