<?php
$db = new Database();
$posts = $db->getSection($sectionId ?? '', $langId);
// echo "<br>";
// print_r($posts);
// echo "</br>";
?>

<div class="col-12">
  <div class="bg-light rounded h-100 p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h5>Posts <?= strtoupper($langId); ?></h5>
      <a href="/admin/posts/<?= $langId ?>/create" class="btn btn-primary">Add Post</a>
    </div>
    <div class="table-responsive">
      <table class="table table-hover align-middle">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Text</th>
            <th scope="col">link</th>
            <th scope="col">icon</th>
            <th scope="col">Tools</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($posts as $i => $post) : ?>
            <tr>
              <th scope="row"><?= $i + 1 ?></th>
              <td><?= $post[$langId]['html'] ?></td>
              <td><?= $post['link'] ?></td>
              <td>
                <img src="<?= $post[$langId]['icon'] ?>" alt="" class="table_image">
              </td>
              <td>
                <a href="/admin/posts/<?= "$langId/edit/" . $post['id'] ?>" type="button" class="btn btn-square btn-success me-2">
                  <i class="fa-solid fa-pen"></i>
                </a>
                <a href="/src/components/post-delete.php?id=<?= $post['id'] . "&lang=$langId&sec=$sectionId" ?>" type="button" class="btn btn-square btn-danger">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>