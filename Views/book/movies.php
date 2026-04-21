<h2>Filmer</h2>
<p class="page-intro">Här visas filmatiseringar kopplade till böcker i databasen.</p>

<div class="movie-grid">
<?php foreach ($movies as $movie): ?>
    <article class="movie-card">
        <div class="movie-card-top">
            <span class="movie-badge">Film</span>
            <span class="movie-year"><?= htmlspecialchars($movie['releasedatum'] ?? '-') ?></span>
        </div>

        <h3><?= htmlspecialchars($movie['titel']) ?></h3>

        <p class="movie-book">
            <strong>Baserad på bok:</strong>
            <?= htmlspecialchars($movie['boktitel'] ?? '-') ?>
        </p>

        <div class="movie-meta">
            <div class="movie-stat">
                <span class="label">Regissör</span>
                <span class="value"><?= htmlspecialchars($movie['regissor'] ?? '-') ?></span>
            </div>

            <div class="movie-stat">
                <span class="label">Speltid</span>
                <span class="value"><?= htmlspecialchars($movie['speltid_min'] ?? '-') ?> min</span>
            </div>

            <div class="movie-stat">
                <span class="label">Betyg</span>
                <span class="value"><?= htmlspecialchars($movie['betyg'] ?? '-') ?>/10</span>
            </div>
        </div>
    </article>
<?php endforeach; ?>
</div>