<?php

session_start();

unset($_SESSION['auth']); //Supprimme les données de la session auth

$_SESSION['flash']['success'] = 'Vous êtes maintenant déconnecté !';

header('Location: login.php');
