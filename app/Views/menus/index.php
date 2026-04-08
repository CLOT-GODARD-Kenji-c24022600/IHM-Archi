<section>
    <h2><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h2>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Createur</th>
            <th>Date maj</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($menus as $menu): ?>
            <tr>
                <td><?= (int) ($menu['id'] ?? 0) ?></td>
                <td><?= htmlspecialchars((string) ($menu['nom'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string) ($menu['auteur'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars((string) ($menu['dateMaj'] ?? '-'), ENT_QUOTES, 'UTF-8') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</section>

