<h2>📦 Arkiverade böcker</h2>
<p class="page-intro">Här visas böcker som har arkiverats.</p>

<div class="archive-grid">
<?php foreach ($books as $book): ?>
    <article class="book-card">

        <div class="book-card-top">
            <span class="book-badge">Arkiv</span>
            <span class="book-year">-</span>
        </div>

        <h3><?= htmlspecialchars($book['titel']) ?></h3>

        <p class="book-author">
            <strong>Författare:</strong>
            <?= htmlspecialchars($book['forfattare'] ?? '-') ?>
        </p>

        <!-- samma struktur som index -->
        <div class="book-meta">

            <div class="book-stat">
                <span class="label">Pris</span>
                <span class="value"><?= htmlspecialchars($book['pris']) ?> kr</span>
            </div>

            <div class="book-stat">
                <span class="label">Lager</span>
                <span class="value">-</span>
            </div>

            <div class="book-stat">
                <span class="label">Kategori</span>
                <span class="value">-</span>
            </div>

            <div class="book-stat">
                <span class="label">Förlag</span>
                <span class="value">-</span>
            </div>

            <div class="book-stat">
                <span class="label">ISBN</span>
                <span class="value small-text"><?= htmlspecialchars($book['isbn']) ?></span>
            </div>

        </div>

        <div class="book-actions">
            <a href="index.php?action=deleteArchived&id=<?= $book['bok_id'] ?>"
               class="danger-btn"
               onclick="return confirm('Ta bort från arkiv?')">
               Ta bort
            </a>

            <a href="index.php?action=books" class="archive-btn">
               Tillbaka
            </a>
        </div>

    </article>
<?php endforeach; ?>
</div>