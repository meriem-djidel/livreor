<?php
session_start();
include('connect.php');
include('header.php');
?>
<?php

    if (isset($_SESSION['login']) == TRUE) { 

       echo ' <header>
        <label><button><a href="index.php">Accueil</a></button></label>
        <label><button><a href="profil.php">Ton profil</a></button></label>
        <label><button><a href="livre-or.php">l\'ivre d\'or</a></button></label>
        <label><button><a href="commentaire.php">Commentaire</a></button></label>
        <label><button><a href="deconnexion.php">Déconnexion</a></button></label></header>';
         } else {
      echo '  <header>
        <label><button><a href="index.php">Accueil</a></button></label>
        <label><button><a href="livre-or.php">l\'ivre d\'or</a></button></label>
        <label><button><a href="inscription.php">Inscrit-toi</a></button></label></header>';
  }
    
if (isset($_POST['submit'])) {
  $login = $_POST['login'];
  $password = $_POST['password'];
   
    $req = $pdo->prepare("SELECT * FROM utilisateurs WHERE login='$login' && password='$password'");
    $req->execute();
    $result = $req->fetch();
    $row = $req->rowCount() == 1;
  if($row){
      $_SESSION['login']=$login;
      $_SESSION['id'] = $result['id'];
      $_SESSION['admin']=TRUE;
     header('location:index.php');  
    }else{
    echo "<h1 style=color:red;'> Votre mot de passe ou login est incorrecte</h1>";
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
                  
                    </table>
                <button name="submit">Valider</button>
            </form>
        </div>
  
</body>

</html>