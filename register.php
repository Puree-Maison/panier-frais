 <?php include('header.php'); ?>
 <?php include('navigation.php'); ?>

 <h1>créer un compte</h1>
 <?php if(isset($erreur)) echo "Erreur :  $erreur" ; ?>
 <?php if(isset($success)) echo $success ; ?>

 <hr />

 <form action="register.php" method="post">
	 Nom : <input type="text" name="nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>"><br />
	 Prénom : <input type="text" name="pnom" value="<?php if(isset($_POST['pnom'])) { echo $_POST['pnom']; } ?>"><br />
	 Mail : <input type="text" name="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>"><br />
	 Mot de passe : <input type="password" name="motdepasse1" value="<?php if(isset($_POST['motdepasse1'])) { echo $_POST['nom']; } ?>"><br />
	 Confirmer votre mot de passe : <input type="password" name="motdepasse2" value="<?php if(isset($_POST['motdepasse2'])) { echo $_POST['nom']; } ?>"><br />
	 <input type="submit" name="envoyer" value="s'inscrire" /><br />
 </form>
 
<?php 
	if(isset($_POST['envoyer'])) {
		if(isset($_POST['nom']) AND !empty($_POST['nom']) AND isset($_POST['pnom']) AND !empty($_POST['pnom']) AND isset($_POST['mail']) AND !empty($_POST['mail']) AND isset($_POST['motdepasse1']) AND !empty($_POST['motdepasse1']) AND isset($_POST['motdepasse2']) AND !empty($_POST['motdepasse2']))
		{
		// Tous les champs sont remplie
			

			$nom = $_POST['nom'];
			$pnom = $_POST['pnom'];
			$mail = $_POST['mail'];
			$motdepasse1 = $_POST['motdepasse1'];
			$motdepasse2 = $_POST['motdepasse2'];
			$motdepasse = $motdepasse1;

			if($motdepasse1 == $motdepasse2)
			{
				// mdp OK

				try
				{
					$bdd = new PDO('mysql:host=localhost;dbname=panier-frais;charset=utf8', 'root', 'root');
				}
				catch(Exception $e)
				{
				        die('Erreur : '.$e->getMessage());
				}
				$req = $bdd->prepare('INSERT INTO membres(motdepasse, mail, nom, pnom) VALUES (:motdepasse1, :mail, :nom, :pnom)');
				$req->execute(array(
					'motdepasse1' => md5($motdepasse),
					'mail' => $mail,
					'nom' => $nom,
					'pnom' => $pnom
					));
				$success = 'Votre compte à été créé, vous pouvez vous connecter <a href="login.php">ici</a>';
			}	
			else
			{
				$erreur = 'Vos deux mots de passe ne correspondent pas';
			}
		}
		else
		{
			$erreur = 'Tous les champs sont obligatoires.';
		}
	}?>
 

 <?php include('footer.php'); ?>
