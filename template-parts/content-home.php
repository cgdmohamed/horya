<section class="py-5 text-center container-fluid hero">
  <div class="row py-lg-5">
    <div class="col-lg-8 col-md-8 mx-auto">
      <h1 class="fw-light"><?php bloginfo('name'); ?></h1>
      <p class="lead text-muted"><?php bloginfo('description') ?></p>
      <?php get_search_form() ?>
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="bg-secondary rounded border text-center text-light p-5 my-3">
      Google Ads Placeholder
    </div>
  </div>
</section>

<section>
  <div class="container">
    <div class="headings">
      <h2>الأكثر قراءة</h2>
      <span class="hr">&nbsp;</span>
    </div>
    <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 g-3 popular-posts">
      <?php
      // WP_Query arguments
      $args = array(
        'post_type'              => array('post'),
        'post_status'            => array('publish'),
        'nopaging'               => true,
        'post_count'         => '5',
        'posts_per_page' => '5'
      );

      // The Query
      $the_query = new WP_Query($args);

      // The Loop
      if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
          $the_query->the_post();

          $first_category = wp_get_post_terms(get_the_ID(), 'category')[0]->name;
          $cat_id = get_cat_ID($first_category);
          $cat_link = get_category_link($cat_id);

          echo '<div class="col border-0"><div class="card border-0">';
          the_post_thumbnail('large', array(
            'class' => 'img-fluid rounded'
          ));

          echo "<a class='p-3 fw-bold fs-3 text-decoration-none text-dark' href='" . get_the_permalink() . "'><h3 class='fs-6'>" . get_the_title() . "</h3></a>";
      ?>
          <div class="cat-badge">
            <a href="<?php echo $cat_link; ?>" class="text-decoration-none"><?php echo $first_category; ?></a>
          </div>

      <?php
          echo '</div></div>';
        }
      } else {
        echo '<p>مرحباً بك .. رجاء اضف بعض المقالات .. اذا كان هناك مقالات ولم تظهر رجاء تواصل مع المطور</p>';
      }
      /* Restore original Post Data */
      wp_reset_postdata();
      ?>
    </div>

  </div>
</section>


<section class="categories py-5">

  <div class="container">
    <div class="headings">
      <h2 class="title">التصنيفات</h2>
      <span class="hr">&nbsp;</span>
      <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline-primary">كل المواضيع</a>
    </div>

    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        $categories = get_categories(array(
          'orderby' => 'name',
          'parent'  => 0,
          'hide_empty'      => false,
          'exclude' => 1
        ));

        foreach ($categories as $category) {
        ?>
          <div class="col">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <?php if (get_term_icon_url($category->term_id)) { ?>
                    <img src="<?php echo get_term_icon_url($category->term_id); ?>" alt="<?php echo $category->name ?>" title="<?php echo $category->name ?>" />
                  <?php } else { ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . "/assets/img/category.svg"); ?>" alt="<?php echo $category->name ?>" title="<?php echo $category->name ?>" />
                  <?php } ?>
                  <h5 class="card-title"><a href="<?php echo get_category_link($category->term_id) ?>" class="card-link text-decoration-none fw-bold"><?php echo $category->name ?></a></h5>
                </div>
                <ul class="list-group list-group-flush">
                  <?php
                  $term_id = get_queried_object()->term_id;
                  $term = get_term($term_id, 'category');

                  $args = array(
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'hide_empty' => false,
                    'child_of' => $category->term_id,
                    'parent' => $category->term_id
                  );

                  $sub_terms = get_terms('category', $args);

                  foreach ($sub_terms as $term) { ?>
                    <li class="list-group-item"> <a href="<?php echo get_term_link($term); ?>" class="text-decoration-none text-dark"><?php echo $term->name; ?></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
    </div>

  </div>
</section>