<div class="px-3 py-3 border rounded my-3">

    <div class="container">
        <div class="row">
            <div>
                <?php echo '<a href="' . get_the_permalink() . '" alt="' . get_the_title() . '" class="text-decoration-none fw-bold">' . get_the_title() . '</a>'; ?>
            </div>
            <div class="the-category py-2">
                <?php the_category('/ '); ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="d-flex">
            <div class="row">
                <?php the_post_thumbnail('img-thumb', array('class' => 'img-fluid col-4')); ?>
                <div class="col-8">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>