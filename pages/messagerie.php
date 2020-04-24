<?php
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=users_register', 'root', '');
if (isset($_SESSION['id_users']) and !empty($_SESSION['id_users'])) {
	if (isset($_POST['envoi_message'])) {
		if (isset($_POST['destinataire'], $_POST['message']) and !empty($_POST['destinataire']) and !empty($_POST['message'])) {
			$destinataire = htmlspecialchars($_POST['destinataire']);
			$message = htmlspecialchars($_POST['message']);
			$id_destinataire = $bdd->prepare('SELECT id_users FROM users WHERE mail = ?');
			$id_destinataire->execute(array($destinataire));
			$dest_exist = $id_destinataire->rowCount();
			if ($dest_exist == 1) {
				$id_destinataire = $id_destinataire->fetch();
				$id_destinataire = $id_destinataire['id_users'];
				$ins = $bdd->prepare('INSERT INTO message(id_expediteur,id_destinataire,message) VALUES (?,?,?)');
				$ins->execute(array($_SESSION['id_users'], $id_destinataire, $message));
				$erreur = "Votre message a bien été envoyé !";
			} else {
				$erreur = "Cet utilisateur n'existe pas...";
			}
		} else {
			$erreur = "Veuillez compléter tous les champs";
		}
	}
	$destinataires = $bdd->query('SELECT mail FROM users ORDER BY mail');

	if (isset($_SESSION['id_users']) and !empty($_SESSION['id_users'])) {
		$msg = $bdd->prepare('SELECT * FROM message WHERE id_destinataire = ?');
		$msg->execute(array($_SESSION['id_users']));
		$msg_nbr = $msg->rowCount();
?>

		<!DOCTYPE html>
		<html>

		<head>
			<title>Messagerie</title>
			<meta charset="utf-8" />
			<link rel="stylesheet" href="../assets/css/messagerie.css">
			<!-- Axentix CSS minified version -->
			<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/css/axentix.min.css">

			<!-- Axentix JS minified version -->
			<script src="https://cdn.jsdelivr.net/npm/axentix@0.5.2/dist/js/axentix.min.js"></script>
		</head>

		<body>

			<div id="wrapper">

				<?php
				if (isset($_SESSION['id_users'])) {
					include "../includes/navbarCo.php";
				} else {
					include "../includes/navbar.php";
				}
				?>

				<div class="message-container">

					<div class="container-title">Messagerie</div>

					<form class="form-container" method="POST" action="">

						<div class="form-field">
							<label for="destinataire">Destinataire</label>
							<input type="text" name="destinataire" class="form-control" placeholder="Entrez l'addresse mail du destinataire" />
						</div>

						<div class="form-field">
							<label class="txt-left hide-xs" for="message">Message</label>
							<textarea style="resize: none" type="text" name="message" class="form-control" placeholder="Votre message" /></textarea>
						</div>

						<div id="error-message"> <?php if (isset($erreur)) {
														echo $erreur;
													} ?>
						</div>


						<button name="envoi_message" type="submit" class="btn small green">Envoyer</button>

					</form>

				</div>

				<div class="message-container receive">

					<div class="container-title">Boîte de réception</div>

					<?php
					if ($msg_nbr == 0) {
					?>

						<div id="messagerie-vide"><?php echo "Vous n'avez aucun message..."; ?></div>
					<?php } ?>

					<?php
					while ($m = $msg->fetch()) {
						$p_exp = $bdd->prepare('SELECT mail FROM users WHERE id_users = ?');
						$p_exp->execute(array($m['id_expediteur']));
						$p_exp = $p_exp->fetch();
						$p_exp = $p_exp['mail'];
					?>

						<div id="message-style">
							Vous avez reçu une message de : <b><?= $p_exp ?></b>
							<br /><br />
							<b>Message :</b>
							<br>
							<?= nl2br($m['message']) ?>
							<br />
						</div>


					<?php } ?>

				</div>






			</div>


		</body>

		</html>
<?php
	}
}
?>