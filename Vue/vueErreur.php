<?php $titre = "ERREUR"; ?>

<?php ob_start() ?>

<p>Une erreur est survenue : <?= $msgErreur ?></p>

<?php $contenu = ob_get_clean(); ?>

<?php require 'Vue/gabarit.php'; ?>