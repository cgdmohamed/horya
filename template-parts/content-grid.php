
    <div>
        <?php the_post_thumbnail('img-thumb', array('class' => 'img-fluid rounded-top')); ?>
        <?php echo '<a href="' . get_the_permalink() . '" alt="' . get_the_title() . '" class="text-decoration-none fw-bold">' . get_the_title() . '</a>'; ?>
    </div>
