<?php

$mysql_hostname = 'localhost';

$mysql_user = 'root';

$mysql_password = '';

$mysql_database = 'librairie_intelligente';

$prefix = "";

$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Base de donnée introuvable");

		mysqli_select_db($bd, $mysql_database ) or die("Base de donnée non selectionné");
						echo 'Connexion réussie';

?> 