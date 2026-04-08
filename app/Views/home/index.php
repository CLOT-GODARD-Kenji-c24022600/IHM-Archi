<section>
    <h2><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2>
    <p>Base MVC prete pour brancher vos ecrans de composition de menus et de commande.</p>
</section>

<section class="cards">
    <article class="card">
        <h3>Plats</h3>
        <p><?= (int) ($stats['plats'] ?? 0) ?> enregistrements</p>
    </article>
    <article class="card">
        <h3>Menus</h3>
        <p><?= (int) ($stats['menus'] ?? 0) ?> enregistrements</p>
    </article>
    <article class="card">
        <h3>Commandes</h3>
        <p><?= (int) ($stats['commandes'] ?? 0) ?> enregistrements</p>
    </article>
</section>

