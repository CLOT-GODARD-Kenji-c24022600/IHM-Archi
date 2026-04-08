<section>
    <h2><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($plats as $plat): ?>
            <tr>
                <td><?= (int) ($plat['id'] ?? 0) ?></td>
                <td><?= htmlspecialchars((string) ($plat['nom'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string) ($plat['description'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= number_format((float) ($plat['prix'] ?? 0), 2, ',', ' ') ?> EUR</td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

