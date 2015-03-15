 <?php include('header.php'); ?>
 <?php include('navigation.php'); ?>
 <h1>créer un compte</h1>
 <?php if(isset($erreur))  echo "Erreur :  $erreur" ; ?>
 <?php if(isset($success)) echo $success ; ?>

 <hr />
 <form action="login.php" method="post">
	 Mail : <input type="text" name="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>"><br />
	 Mot de passe : <input type="password" name="motdepasse1" value="<?php if(isset($_POST['motdepasse1'])) { echo $_POST['nom']; } ?>"><br />
	 <input type="submit" name="envoyer" value="se connecter" /><br />
 </form>
 <a href="register.php">S'enregistrer</a>

<?php if(isset($_POST['envoyer'])) {
	if(isset($_POST['mail']) AND !empty($_POST['mail']) AND isset($_POST['motdepasse1']) AND !empty($_POST['motdepasse1']))
	{
	try
		{	
		$bdd = new PDO('mysql:host=localhost;dbname=panier-frais;charset=utf8', 'root', 'root');
		}
		catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}
	// Tous les champs sont remplie
	$mail = $_POST['mail'];
	$motdepasse1 = $_POST['motdepasse1'];
	}
	else
	{
		echo "Merci de remplir tous les champs";
	}

}
else
{
	$erreur = 'Tous les champs sont obligatoires.';
}

 ?>
 

 <?php include('footer.php'); ?>
