<section class="panel">
    <h2>Lägg till bok</h2>

    <form method="POST" action="index.php?action=store">

        <input type="text" name="titel" placeholder="Titel" required><br><br>

        <input type="text" name="isbn" placeholder="ISBN" required><br><br>

        <input type="number" step="0.01" name="pris" placeholder="Pris" min="0.01" required><br><br>

        <input type="number" name="lagersaldo" placeholder="Lagersaldo" min="0" required><br><br>

        <input type="number" name="utgivningsar" placeholder="Utgivningsår" min="1"><br><br>

        <!-- Författare dropdown -->
        <select name="forfattar_id" required>
            <option value="">Välj författare</option>
            <?php foreach ($forfattare as $f): ?>
                <option value="<?= $f['forfattar_id'] ?>">
                    <?= htmlspecialchars($f['namn']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <!-- Förlag dropdown -->
        <select name="forlag_id" required>
            <option value="">Välj förlag</option>
            <?php foreach ($forlag as $fo): ?>
                <option value="<?= $fo['forlag_id'] ?>">
                    <?= htmlspecialchars($fo['namn']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <!-- Kategori dropdown -->
        <select name="kategori_id" required>
            <option value="">Välj kategori</option>
            <?php foreach ($kategorier as $k): ?>
                <option value="<?= $k['kategori_id'] ?>">
                    <?= htmlspecialchars($k['namn']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">Lägg till bok</button>
    </form>
</section>