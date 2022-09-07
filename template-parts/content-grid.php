<div>
    <a href="<?php  the_permalink(); ?>" title="<?php  the_title(); ?>" class="text-decoration-none fw-bold" >
    <div><?php the_post_thumbnail('img-thumb', array('class' => 'img-fluid rounded-top')); ?></div>
    <div><?php the_title(); ?> </div>
    </a>
</div>