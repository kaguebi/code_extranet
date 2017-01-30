<?php					//traitement des identifiants
																													
	$bdd=new PDO ('mysql:host=xxxxxxxx;dbname=xxxxxxxx','xxxxxxxx','xxxxxxxx');  
	
	if (isset($_POST ['buttonconnect']))
			{	
				session_start ();											
				$_SESSION ['connecta'] = $_POST ['connecta'];				
								
				$identifiant= trim (htmlspecialchars($_POST ['connecta']));
				$mdp= trim (htmlspecialchars($_POST ['connectb']));
				
				$requser= $bdd->prepare ("SELECT * FROM extranet_users WHERE extranet_login=? AND user_nicename=?");
				$requser->execute(array($identifiant,$mdp));
				$userexist= $requser-> rowCount();

				if ($userexist >= 1) {header('Location: http://www.citedesmetiers-valdemarne.fr/espace-conseillers/');}     						
				else {header('Location: http://www.citedesmetiers-valdemarne.fr/accueil-refuse-extranet-conseillers/');}								
			}
?>

