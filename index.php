<?php require __DIR__.'/header.php'; ?>

<?php
  $result = $base->query('SELECT * FROM post');
 ?>

 <div class="container">
    <div class="header">
        <?php while ($row = $result->fetch()): ?>
            <li>
                <p href="article.php?id=<?= $row['id'] ?>">
                    <?= $row['content'] ?>
                </p>
            </li>
        <?php endwhile ?>
    </div>
</div>

</body>
</html>
