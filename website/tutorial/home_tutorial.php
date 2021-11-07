<div id="tutorial">
    <div class="container py-5">
        <div class="grid">
            <?php
            // Ottieni articoli del tutorial
            $stmt = $conn->prepare("SELECT * FROM guide");
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="g-col-6">
                        <div class="card p-3 text-center">
                            <h2>Tutorial <?= $row['title'] ?></h2>
                            <p class="fw-bold"><?= $row['description'] ?></p>
                            <a href="/tutorial/<?= $row['slug'] ?>" class="btn btn-primary">Tutorial <?= $row['title'] ?></a>
                        </div>
                    </div>
                <?php
                }
            } else {
                ?>
                <h3 class="text-center">Nessun tutorial trovato</h3>
            <?php
            }

            $stmt->close();
            ?>
        </div>
    </div>
</div>