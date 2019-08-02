<?php include(BASEPATH . 'resources/partials/header.php') ?>

<pre>
 <?php

	//print_r($data); die;
 ?>
</pre>


<!-- Page Content -->
<div class="container text-center">

    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Flickr Mini</h1>

    <hr class="mt-2 mb-5">
    <form id="flickrSearchForm" method="GET">
        <div class="text-center">

                <div class="form-row align-items-center">
                    <div class="col-7">
                        <input type="text" class="form-control" placeholder="Search Text" name="text" value="<?php echo isset($data['text']) ? $data['text'] : ''?>">
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>

        </div>
    </form>

	<?php if (isset($data['error'])): ?>
        <div class="alert alert-danger" role="alert">
			<?php echo $data['error']; ?>
        </div>
	<?php endif; ?>
    <div class="row text-center text-lg-left">


        <?php if (isset($data['imageGalleryData']['photos']) && !empty($data['imageGalleryData']['photos'])): ?>
            <?php if (isset($data['error'])): ?>
                <p>No Photos Found</p>
            <?php else: ?>

                <?php foreach($data['imageGalleryData']['photos']['photo'] as $photo) : ?>

                    <div class="col-lg-2 col-md-4 col-6">
                        <a href="<?php echo $photo['url_t']; ?>" class="d-block mb-4 h-100">
                            <img class="img-fluid img-thumbnail" src="<?php echo $photo['url_t']; ?>" alt="">
                        </a>
                    </div>

                <?php endforeach; ?>

                <?php \App\Library\Pagination::paginate($data['imageGalleryData']['photos']['total'], $data['imageGalleryData']['photos']['perpage'], ['text' => $data['text']]); ?>

            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>


<?php include(BASEPATH . 'resources/partials/footer.php') ?>

