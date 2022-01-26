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
        <label><button><a href="commentaire.php">Commentaire</a></button></label>
        <label><button><a href="deconnexion.php">Déconnexion</a></button></label></header>';
         } else {
      echo '  <header>
        <label><button><a href="index.php">Accueil</a></button></label>
        <label><button><a href="inscription.php">Inscrit-toi</a></button></label>
        <label><button><a href="connexion.php">Connecte-toi</a></button></label></header>';
  }
  ?>   
  <?php

$req = $pdo->query("SELECT login,commentaire, date FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur ORDER BY date DESC ");
?>
    <h1>Les commentaires</h1>
    <table border="2" class="formu">
        <thead>
            <tr>
                <th>Commentaire</th>
                <th>Login</th>
                <th>Date</th>
            </tr>
        </thead>
        <?php
        while($res = $req->fetch()){
        
        ?>
            <tbody>
                <tr>
                    <td><?php echo $res['commentaire'] ?></td>
                    <td><?php echo $res['login'] ?></td>
                    <td><?php echo $res['date'] ?></td>
                </tr>
            </tbody>
        <?php
        } 
        ?>
    </table>
</body>

</html>