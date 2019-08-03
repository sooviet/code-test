<!-- header -->
<?php include(BASEPATH . 'resources/partials/header.php') ?>

<div class="container">
    <div class="row">

        <div class="col-xs-6 justify-content-center">
            <h1 class="center-block font-weight-light text-lg-left">Flickr Mini Gallery</h1>
        </div>

    </div>

    <form id="flickrSearchForm" method="GET" action="/image-gallery">
        <div class="row">
            <div class="col-xs-6 ">
                <div class="input-group col-12">
                    <input placeholder="Enter text to search" name="text" type="text" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="btn-group-wrap">
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
</div>

<!-- footer -->
<?php include(BASEPATH . 'resources/partials/footer.php') ?>