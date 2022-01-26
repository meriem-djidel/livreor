<?php
session_start();
include('connect.php');
include('header.php');
?>
<?php

    if (isset($_SESSION['admin']) == TRUE) { 

       echo ' <header>
        <label><button><a href="index.php">Accueil</a></button></label>
        <label><button><a href="commentaire.php">Commentaire</a></button></label>
        <label><button><a href="deconnexion.php">Déconnexion</a></button></label></header>';
         } else {
      header('location:index.php');
  }


$login_sess = $_SESSION["login"];
$req = $pdo->prepare("SELECT *  FROM utilisateurs WHERE login= '$login_sess'");
$req->execute(array($login_sess));
$result = $req->fetchAll();
$login =$result[0][1];
$password =$result[0][2];

if (isset($_POST['submit'])) {

    $logins = $_POST['login'];
    $passwords = $_POST['password'];

    if ($logins != 'admin') {
        $requete = $pdo->query("UPDATE utilisateurs SET login = '$logins' ,  password = '$passwords'  WHERE login = '$login_sess'");
        $_SESSION['login'] = $logins ;
          header('location:index.php');
    }
    die('ca marche');
}
?>

        <?php  
include('header.php');
        ?>
      
        <div class="formu"> 
            
            <form method="post">
                <table >
                    <thead>
                    <tr>
                        <th>Login</th>
                        <th>Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="login" value="<?php echo $login; ?>"></td>
                        <td><input type="password" name="password" value="<?php echo $password; ?>"></td>
                    </tr>
                </tbody>
                </table>
                <button name="submit">Modifier</button>
            </form>
        </div>
  
</body>

</html>