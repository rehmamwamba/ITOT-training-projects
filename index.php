<?php

require_once 'foot.php';

$equipe1 = new FootballTeam("barca", "messi");
$equipe2 = new FootballTeam("man u","vini" );

echo "Nom de l'équipe 1 : " . $equipe1->getName() . " ";
echo "Nom de l'équipe 2 : " . $equipe2->getName() . " ";


?>