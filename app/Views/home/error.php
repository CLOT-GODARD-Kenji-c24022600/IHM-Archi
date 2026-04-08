<section>
    <h2><?= htmlspecialchars($title ?? 'Erreur', ENT_QUOTES, 'UTF-8') ?></h2>
    <p>Une erreur est survenue pendant le traitement de la requete.</p>
    <pre><?= htmlspecialchars($message ?? 'Erreur inconnue', ENT_QUOTES, 'UTF-8') ?></pre>
</section>

