<!-- header -->
<?php include(BASEPATH . 'resources/partials/header.php') ?>

<!-- Page Content -->
<div class="container text-center">

    <div class="sticky-top">
        <form id="flickrSearchForm" method="GET">
            <div class="text-center">
                <div class="form-row align-items-center">
                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"><a href="/"><h3
                                    class="font-weight-light text-lg-left">Flickr Mini Gallery</h3></a></label>

                    <div class="col-8">
                        <input type="text" class="form-control" placeholder="Search text for photos" name="text"
                               value="<?php echo isset($data['text']) ? $data['text'] : '' ?>">
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <hr class="mt-2 mb-5">

    <!-- technicalErrorTemplate -->
    <?php include(BASEPATH . 'resources/Errors/technicalErrorTemplate.php') ?>

    <!-- generalErrorTemplate -->
    <?php include(BASEPATH . 'resources/Errors/generalErrorTemplate.php') ?>

    <?php if (isset($data['imageGalleryData']['photos'])): ?>
        <?php if (empty($data['imageGalleryData']['photos']['photo'])): ?>
            <div class="alert alert-danger" role="alert">
                <p>No Photos Found</p>
            </div>
        <?php else: ?>
            <div class="row text-center text-lg-left">
                <div class="card-columns">
                    <?php foreach ($data['imageGalleryData']['photos']['photo'] as $photo) : ?>

                        <div class="card">
                            <a target="_blank" href="<?php echo \App\Helpers\fetchValidFlickrImage($photo); ?>">
                                <img class="card-img-top float-left" title="<?php echo $photo["title"] ?>"
                                     src="<?php echo $photo['url_t']; ?>" alt="<?php echo $photo["title"] ?>">
                            </a>
                            <div class="card-body">
                                <p class="card-text"><?php echo $photo["title"] ?></p>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

            </div>

            <div class="mx-auto" style="width: 200px;">
                <?php \App\Helpers\Pagination::paginate(
                    $data['imageGalleryData']['photos']['total'],
                    $data['imageGalleryData']['photos']['perpage'],
                    $data['page'],
                    [
                        'text' => $data['text']
                    ]
                );
                ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</div>

<!-- footer -->
<?php include(BASEPATH . 'resources/partials/footer.php') ?>