<?php
$sql = "SELECT * FROM guide";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
    <header class="bg-dark text-white">
        <div class="container py-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="/tutorial" class="nav-link text-white fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: #fff"><path d="M21 13v10h-6v-6h-6v6h-6v-10h-3l12-12 12 12h-3zm-1-5.907v-5.093h-3v2.093l3 3z"/></svg>
                    </a>
                </li>
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <li class="nav-item">
                        <a href="/tutorial/<?= $row['slug'] ?>" class="nav-link text-white fw-bold <?= $row['slug'] === $tutorial_slug ? 'active' : '' ?>"><?= $row["title"] ?></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </header>
<?php
}
