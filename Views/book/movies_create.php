<section class="panel">
    <h2>Lägg till film</h2>

    <form method="POST" action="index.php?action=store_movie">

        <input type="text" name="titel" placeholder="Filmtitel" required><br><br>

        <input type="number" name="releasedatum" placeholder="Filmår" min="1900" max="2100" required><br><br>

        <input type="text" name="regissor" placeholder="Regissör" required><br><br>

        <input type="number" name="speltid_min" placeholder="Speltid (min)" min="1" required><br><br>

        <input type="number" step="0.1" name="betyg" placeholder="Betyg" min="0" max="10" required><br><br>

        <select name="bok_id" required>
            <option value="">Välj bok</option>
            <?php foreach ($books as $book): ?>
                <option value="<?= $book['bok_id'] ?>">
                    <?= htmlspecialchars($book['titel']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Lägg till film</button>
    </form>
</section>