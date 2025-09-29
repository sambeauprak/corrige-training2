<form method="get" action="index.php">
    <input type="text" name="search" placeholder="Rechercher...">
    <label for="field">Titre</label>
    <input type="radio" name="field" value="title" />
    <label for="field">Contenu</label>
    <input type="radio" name="field" value="content" />
    <button type="submit">Rechercher</button>
</form>

<ul>
    <?php foreach ($notes as $note): ?>
    <li>
        <strong><?= htmlspecialchars($note['title']) ?></strong>
        <p>
        <div class="rendered" data-md="<?= htmlspecialchars($note['content'], ENT_QUOTES) ?>"></div>
        </p>
        <small><?= $note['created_at'] ?></small>
        <a href="index.php?delete=<?= $note['id'] ?>">❌ Supprimer</a>
    </li>
    <?php endforeach; ?>
</ul>

<script>
document.querySelectorAll('.rendered').forEach(el => {
    const raw = el.dataset.md; // récupère le contenu Markdown
    const html = marked.parse(raw); // convertit en HTML
    el.innerHTML = DOMPurify.sanitize(html); // sécurise le HTML
});
</script>