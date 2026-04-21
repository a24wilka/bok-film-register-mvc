<h2>Böcker</h2>
<p class="page-intro">Här visas alla böcker i databasen med pris, lager och kategori.</p>

<div class="book-grid">
<?php foreach ($books as $book): ?>
    <article class="book-card">
        <div class="book-card-top">
            <span class="book-badge">Bok</span>
            <span class="book-year"><?= htmlspecialchars($book['utgivningsar'] ?? '-') ?></span>
        </div>

        <h3><?= htmlspecialchars($book['titel']) ?></h3>

        <p class="book-author">
            <strong>Författare:</strong>
            <?= htmlspecialchars($book['forfattare'] ?? '-') ?>
        </p>

        <div class="book-meta">
            <div class="book-stat">
                <span class="label">Pris</span>
                <span class="value"><?= htmlspecialchars($book['pris']) ?> kr</span>
            </div>

            <div class="book-stat">
                <span class="label">Lager</span>
                <span class="value"><?= htmlspecialchars($book['lagersaldo']) ?></span>
            </div>

            <div class="book-stat">
                <span class="label">Kategori</span>
                <span class="value"><?= htmlspecialchars($book['kategori'] ?? '-') ?></span>
            </div>

            <div class="book-stat">
                <span class="label">Förlag</span>
                <span class="value"><?= htmlspecialchars($book['forlag'] ?? '-') ?></span>
            </div>

            <div class="book-stat">
                <span class="label">ISBN</span>
                <span class="value small-text"><?= htmlspecialchars($book['isbn']) ?></span>
            </div>
        </div>

        <div class="book-actions">
            <a href="index.php?action=delete&id=<?= $book['bok_id'] ?>" class="danger-btn"
               onclick="return confirm('Vill du ta bort boken?')">Ta bort</a>

            <a href="index.php?action=archive&id=<?= $book['bok_id'] ?>" class="archive-btn"
               onclick="return confirm('Vill du arkivera boken?')">Arkivera</a>
        </div>
    </article>
<?php endforeach; ?>
</div>