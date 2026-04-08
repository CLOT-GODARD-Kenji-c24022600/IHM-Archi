<section>
    <h2><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Date commande</th>
            <th>Date livraison</th>
            <th>Adresse</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($commandes as $commande): ?>
            <tr>
                <td><?= (int) ($commande['id'] ?? 0) ?></td>
                <td><?= htmlspecialchars((string) ($commande['dateCommande'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string) ($commande['dateLivraison'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string) ($commande['adresseLivraison'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= number_format((float) ($commande['montantTotal'] ?? 0), 2, ',', ' ') ?> EUR</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

