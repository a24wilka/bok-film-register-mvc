<h2>Dashboard</h2>
<p class="page-intro">Här visas böcker och deras kopplade filmer i en gemensam översikt.</p>

<div class="dashboard-grid">
<?php foreach ($books as $book): ?>
    <article class="dashboard-card">
        <div class="dashboard-card-top">
            <span class="dashboard-badge">Bok + Film</span>
            <span class="dashboard-year"><?= htmlspecialchars($book['utgivningsar'] ?? '-') ?></span>
        </div>

        <h3><?= htmlspecialchars($book['boktitel']) ?></h3>

        <p class="dashboard-author">
            <strong>Författare:</strong>
            <?= htmlspecialchars($book['forfattare'] ?? '-') ?>
        </p>

        <div class="dashboard-meta">
            <div class="dashboard-stat">
                <span class="label">Pris</span>
                <span class="value"><?= htmlspecialchars($book['pris']) ?> kr</span>
            </div>

            <div class="dashboard-stat">
                <span class="label">Lager</span>
                <span class="value"><?= htmlspecialchars($book['lagersaldo']) ?></span>
            </div>

            <div class="dashboard-stat">
                <span class="label">Kategori</span>
                <span class="value"><?= htmlspecialchars($book['kategori'] ?? '-') ?></span>
            </div>

            <div class="dashboard-stat">
                <span class="label">Förlag</span>
                <span class="value"><?= htmlspecialchars($book['forlag'] ?? '-') ?></span>
            </div>
        </div>

        <div class="film-panel">
            <h4>Filmatisering</h4>

            <?php if (!empty($book['filmtitel'])): ?>
                <p><strong>Titel:</strong> <?= htmlspecialchars($book['filmtitel']) ?></p>
                <p><strong>Filmår:</strong> <?= htmlspecialchars($book['filmar'] ?? '-') ?></p>
                <p><strong>Regissör:</strong> <?= htmlspecialchars($book['regissor'] ?? '-') ?></p>
                <p><strong>Speltid:</strong> <?= htmlspecialchars($book['speltid_min'] ?? '-') ?> min</p>
                <p><strong>Betyg:</strong> <?= htmlspecialchars($book['betyg'] ?? '-') ?>/10</p>
            <?php else: ?>
                <p>Ingen kopplad film.</p>
            <?php endif; ?>
        </div>
    </article>
<?php endforeach; ?>
</div>