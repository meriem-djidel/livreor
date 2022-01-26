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
        echo '<h1>   
        Coucou '.$_SESSION['login'].'! </h1>';
         } else {
      echo '  <header>
      <label><button><a href="livre-or.php">l\'ivre d\'or</a></button></label>
        <label><button><a href="inscription.php">Inscrit-toi</a></button></label>
        <label><button><a href="connexion.php">Connecte-toi</a></button></label></header>';
  }
  ?> 

<div class="ina">
        <div class="inb">  
        <div class="inc">
        <div class="ina">  
        <div class="inb">  
        <div class="inc">  