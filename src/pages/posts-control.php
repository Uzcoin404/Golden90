<?php
$db = new Database();
if ($postId) {
    $post = $db->getPost($postId);
    $post[$langId] = json_decode(utf8_decode($post[$langId]), true);
    var_dump($post[$langId]);
} else {
    $sections = $db->getSections();
}

require('src/components/header.php');
include_once('src/components/spinner.php');
?>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">

        <?php include_once('src/components/sidebar.php'); ?>
        <div class="content">

            <?php require('src/components/nav.php'); ?>

            <div class="container-fluid pt-4 px-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h5 class="mb-4"><?= !$postId ? "Add new Post" : "Edit Post" ?></h5>
                        <form action="/src/components/post-action.php?lang=<?= $langId ?><?= $postId ? "&sec=" . $post['section'] : '' ?>" method="POST" enctype="multipart/form-data" id="post_form">
                            <?php if (!$postId) : ?>
                                <div class="row mb-4">
                                    <label for="sectionSelect" class="col-sm-2 col-form-label">Section</label>
                                    <div class="col-sm-10">
                                        <select name="section" class="form-control" id="sectionSelect">
                                            <?php foreach ($sections as $section) : ?>
                                                <option value="<?= $section['keyword'] ?>"><?= $section['name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            <?php endif ?>
                            <div class="row mb-4">
                                <label for="input2" class="col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input2" name="link" value="<?= !$postId ? '' : $post['link'] ?>">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="formFile" class="col-sm-3 col-form-label">Upload icon</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="formFile" name="icon" accept="image/png, image/gif, image/jpeg">
                                </div>
                                <?php if (isset($postId)) : ?>
                                    <input type="hidden" name="post" value='<?= json_encode($post) ?>'>
                                <?php endif ?>
                            </div>
                            <div class="row mb-4 <?= $post['section'] == 'slides' ? '' : 'd-none' ?>" id="secondPic">
                                <label for="formFile2" class="col-sm-3 col-form-label">Upload second icon</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="file" id="formFile2" name="icon2" accept="image/png, image/gif, image/jpeg">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label for="rich-editor" class="form-label">Text (DE)</label>
                                <textarea name="text" id="rich-editor">
                                    <?= $postId && !empty($post[$langId]['html']) ? $post[$langId]['html'] : '' ?>
                                </textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit"><?= !$postId ? 'Submit' : 'Save' ?></button>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                const sectionSelect = document.querySelector('#sectionSelect');
                if (sectionSelect) {
                    sectionSelect.addEventListener('change', slideToggle);

                    function slideToggle() {
                        if (sectionSelect.value === 'slides') {
                            document.querySelector('#secondPic').classList.remove('d-none');
                        } else {
                            document.querySelector('#secondPic').classList.add('d-none');
                        }
                    }
                    slideToggle();
                }
            </script>
            <script>
                const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
                const isSmallScreen = window.matchMedia('(max-width: 1024px)').matches;

                tinymce.init({
                    selector: 'textarea#rich-editor',
                    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
                    editimage_cors_hosts: ['picsum.photos'],
                    menubar: 'file edit view insert format tools table help',
                    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
                    toolbar_sticky: true,
                    toolbar_sticky_offset: isSmallScreen ? 102 : 108,
                    autosave_ask_before_unload: true,
                    autosave_interval: '30s',
                    autosave_prefix: '{path}{query}-{id}-',
                    autosave_restore_when_empty: false,
                    autosave_retention: '2m',
                    image_advtab: true,
                    link_list: [{
                            title: 'My page 1',
                            value: 'https://www.tiny.cloud'
                        },
                        {
                            title: 'My page 2',
                            value: 'http://www.moxiecode.com'
                        }
                    ],
                    image_list: [{
                            title: 'My page 1',
                            value: 'https://www.tiny.cloud'
                        },
                        {
                            title: 'My page 2',
                            value: 'http://www.moxiecode.com'
                        }
                    ],
                    image_class_list: [{
                            title: 'None',
                            value: ''
                        },
                        {
                            title: 'Some class',
                            value: 'class-name'
                        }
                    ],
                    importcss_append: true,
                    file_picker_callback: (callback, value, meta) => {
                        /* Provide file and text for the link dialog */
                        if (meta.filetype === 'file') {
                            callback('https://www.google.com/logos/google.jpg', {
                                text: 'My text'
                            });
                        }

                        /* Provide image and alt text for the image dialog */
                        if (meta.filetype === 'image') {
                            callback('https://www.google.com/logos/google.jpg', {
                                alt: 'My alt text'
                            });
                        }

                        /* Provide alternative source and posted for the media dialog */
                        if (meta.filetype === 'media') {
                            callback('movie.mp4', {
                                source2: 'alt.ogg',
                                poster: 'https://www.google.com/logos/google.jpg'
                            });
                        }
                    },
                    height: 600,
                    image_caption: true,
                    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                    noneditable_class: 'mceNonEditable',
                    toolbar_mode: 'sliding',
                    contextmenu: 'link image table',
                    // skin: useDarkMode ? 'oxide-dark' : 'oxide',
                    // content_css: useDarkMode ? 'dark' : 'default',
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
                });
                document.querySelector('#post_form').addEventListener('submit', function(e) {
                    // e.preventDefault()
                    let value = [document.querySelector('#rich-editor').value]
                })
            </script>
        </div>
    </div>

    <?php require('src/components/footer.php'); ?>
</body>

</html>