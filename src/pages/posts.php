<?php
$db = new Database();
$posts = $db->getSection($sectionId ?? '', $langId);
// echo "<br>";
// print_r($posts);
// echo "</br>";
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
          <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center">
              <h5 class="mb-0 me-4">Posts</h5>
              <div class="dropdown me-3">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Language
                </button>
                <ul class="dropdown-menu">
                  <?php foreach ($languages as $language) : ?>
                    <li><a class="dropdown-item <?= $language['keyword'] != $langId ? '' : 'active' ?>" href="<?= $language['keyword'] ?>"><?= $language['name'] ?></a></li>
                  <?php endforeach ?>
                </ul>
              </div>
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Section
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/admin/items/<?= $langId ?>">No section</a></li>
                  <?php foreach ($sections as $section) : ?>
                    <li><a class="dropdown-item <?= $section['keyword'] != $sectionId ? '' : 'active' ?>" href="/admin/items/<?= $section['keyword'] . "/$langId" ?>"><?= $section['name'] ?></a></li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
            <a href="/admin/posts/<?= $langId ?>/create" class="btn btn-primary">Add Post</a>
          </div>
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Text</th>
                  <th scope="col">link</th>
                  <?php if (isset($sectionId)) : ?>
                    <th scope="col">position</th>
                  <?php endif ?>
                  <th scope="col">icon(s)</th>
                  <th scope="col">Tools</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($posts as $i => $post) : ?>
                  <tr>
                    <th scope="row"><?= $sectionId ? $post['position'] : $i + 1 ?></th>
                    <td><?= $post[$langId]['html'] ?? null ?></td>
                    <td><?= $post['link'] ?></td>
                    <?php if ($sectionId) : ?>
                      <td>
                        <?php if ($i != 0) : ?>
                          <a href="/src/components/post-position.php?d=up&p=<?= $post['position'] . "&id=" . $post['id'] . "&lang=$langId&sec=$sectionId" ?>" type="button" class="btn btn-square btn-outline-secondary"><i class="fa-solid fa-arrow-up"></i></a>
                        <?php endif ?>
                        <?php if ($i != count($posts) - 1) : ?>
                          <a href="/src/components/post-position.php?d=down&p=<?= $post['position'] . "&id=" . $post['id'] . "&lang=$langId&sec=$sectionId" ?>" type="button" class="btn btn-square btn-outline-secondary"><i class="fa-solid fa-arrow-down"></i></a>
                        <?php endif ?>
                      </td>
                    <?php endif ?>
                    <td>
                      <img src="<?= $post[$langId]['icon'] ?? null ?>" alt="" class="table_image">
                      <?php if (!empty($post[$langId]['icon2'])) : ?>
                        <img src="<?= $post[$langId]['icon2'] ?? null ?>" alt="" class="table_image">
                      <?php endif ?>
                    </td>
                    <td>
                      <a href="/admin/posts/<?= "$langId/edit/" . $post['id'] ?>" type="button" class="btn btn-square btn-success me-2">
                        <i class="fa-solid fa-pen"></i>
                      </a>
                      <?php if ($sectionId) : ?>
                        <a href="/src/components/post-delete.php?id=<?= $post['id'] . "&lang=$langId&sec=$sectionId" ?>" type="button" class="btn btn-square btn-danger">
                          <i class="fa-solid fa-trash"></i>
                        </a>
                      <?php endif ?>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php require('src/components/footer.php'); ?>
</body>

</html>