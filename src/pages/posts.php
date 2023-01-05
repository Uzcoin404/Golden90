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
              <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Turkish
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">English</a></li>
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
      
    </div>
  </div>

  <?php require('src/components/footer.php'); ?>
</body>

</html>