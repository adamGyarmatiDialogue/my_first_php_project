<div class="page">
    <div class="page-header">
        <div class="page-title">
            Bejegyzések
        </div>

        <?php require "components/posts-menu.php"; ?>

    </div>
    <div class="page-content">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="app/services/posts/create.php" enctype="multipart/form-data">
                    <div class="mb-2">
                        <input type="text" class="from-control" placeholder="Bejegyzés címe" name="postTitle">
                    </div>

                    <div class="mb-2">
                        <textarea class="from-control" placeholder="Bejegyzés bevezető szöveg" name="postLead"> </textarea>
                    </div>

                    <div class="mb-2">
                        <textarea class="from-control" placeholder="Bejegyzés szövege" name="postContent"> </textarea>
                    </div>

                    <div class="mb-2">
                        <input type="date" class="from-control" placeholder="Publikálás dátuma" name="postPublishedAt">
                    </div>

                    <div class="mb-2">
                        <input type="file" accept="image/*" class="from-control" multiple name="files[]">
                    </div>

                    <div>
                        <button type="submit">Létrehozás</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>