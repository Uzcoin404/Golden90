<?php
$db = new Database();
$posts = $db->getPosts($langId, true);
?>

<div class="col-12">
  <div class="bg-light rounded h-100 p-4">
    <div class="d-flex align-items-center justify-content-between mb-4">
      <h5>Posts <?= strtoupper($langId); ?></h5>
      <a href="/admin/language/create" class="btn btn-primary">Add Language</a>
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
          <?php foreach ($posts as $post) : ?>
            <?php if (!isset($post[0])) : ?>
              <tr>
                <th scope="row"><?= 1 ?></th>
                <td><?= $post[$langId] ?></td>
                <td><?= $post['link'] ?></td>
                <td><img src="<?= '../' . $post['icon'] ?>" alt="" class="table_image"></td>
                <td>
                  <a href="/admin/posts/<?= $langId . "/edit/" . $post['id'] ?>" type="button" class="btn btn-square btn-success me-2"><i class="fa-solid fa-pen"></i></a>
                </td>
              </tr>
            <?php else : ?>
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
                  <?php foreach ($post as $section) : ?>
                    <tr>
                      <th scope="row"><?= 1 ?></th>
                      <td><?= $section[$langId] ?></td>
                      <td><?= $section['link'] ?></td>
                      <td><img src="<?= '../' . $section['icon'] ?>" alt="" class="table_image"></td>
                      <td>
                        <a href="/admin/posts/<?= $langId . "/edit/" . $section['id'] ?>" type="button" class="btn btn-square btn-success me-2"><i class="fa-solid fa-pen"></i></a>
                        <a href="/src/components/post-delete.php?id=<?= $section['id'] . "&lang=$langId" ?>" type="button" class="btn btn-square btn-danger"><i class="fa-solid fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            <?php endif; ?>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</div>