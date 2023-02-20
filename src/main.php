<?php
$db = new Database();
$isEdit = $id ?? null;
if ($isEdit) {
  $language = $db->getLanguage($id);
}
require('src/components/header.php');
include_once('src/components/spinner.php');
?>

<body>
  <div class="container-xxl position-relative bg-white d-flex p-0">

    <?php include_once('src/components/sidebar.php'); ?>
    <div class="content">
      <?php require('src/components/nav.php'); ?>
      <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
          <div class="row gy-4">
            <div class="col-4">
              <a href="/admin/items/<?= $langId ?? 'tr' ?>" class="card px-3 py-4">
                <h5 class="card-title">Posts</h5>
                <p class="card-text">All website contents</p>
              </a>
            </div>
            <div class="col-4">
              <a href="/admin/sections/<?= $langId ?? 'tr' ?>" class="card px-3 py-4">
                <h5 class="card-title">Sections</h5>
                <p class="card-text"></p>
              </a>
            </div>
            <div class="col-4">
              <a href="/admin/languages" class="card px-3 py-4">
                <h5 class="card-title">Languages</h5>
                <p class="card-text"></p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require('src/components/footer.php'); ?>
</body>

</html>