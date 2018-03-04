<div id="portfolio">
  <div class="container"> <!-- Container -->
    <div class="section-title text-center center">
      <?php $paginas = render_post_type('page');

      if($paginas->have_posts()) :
        $count = 0;
        while ($paginas->have_posts()) : $paginas->the_post();
          if ($paginas->posts[$count]->post_name == "portfolio") :
      ?>
      <h2><?= $paginas->posts[$count]->post_title; ?></h2>
      <hr>
      <div class="clearfix"></div>
      <?php the_content(); ?>
    </div>
    <?php
        endif;
        $count ++;
      endwhile;
    endif;
     ?>
     <?php 
        $terms = get_terms( 'ks_potfolio', array(
         'orderby'    => 'name',
         'hide_empty' => true,
     ));

     ?>
    <div class="categories">
      <ul class="cat">
        <li>
          <ol class="type">
            <li><a data-filter="*" class="active cat-todos">Todos</a></li>
            <?php 
            foreach ($terms as $term) : ?>
              <li><a data-filter=".<?= $term->slug ?>"><?= $term->name?></a></li>
            <? endforeach; ?>
          </ol>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="row">
      <div class="portfolio-items">
        <?php $portfolio = render_post_type('post_portfolio');
        if($portfolio->have_posts()) :
          $count = 0;
            while ($portfolio->have_posts()) : $portfolio->the_post();                           
              $categorias = get_custom_category( $post->ID, 'ks_potfolio'); 
              $port_filtro = $portfolio->posts[$count]->post_name;

              $downloads[$count][$count] = $post->ID; 
              $count_port = "port_filtro-" . $count;
              $downloads[$count][$count_port] = $port_filtro;

              ?>

        <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 <?= $categorias ?>" >
          <div class="portfolio-item" data-filter=".<?= $port_filtro;?>">
            <div class="hover-bg">                
              <div class="hover-text">
                <h4><?= the_title();?></h4>
                <p><?= the_content();?></p>
              </div>
              <img src="<?= get_the_post_thumbnail_url(); ?>" class="img-responsive img-thumbnail" alt="<?= the_title();?>"> 
            </div>
          </div>
        </div>

        <?php
          $count ++;
            endwhile;
            endif;
        ?>
        <?php 
        
        $count = 0;
        
          foreach ($downloads as $valores) :
            $downloads_images = get_post_meta($valores[$count], 'post_portfolio', true);
            if (isset($downloads_images)) :
              
              foreach ($downloads_images as $key) : ?>
              <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3 <?= $valores["port_filtro-$count"];?>">
                <div style="display: none;" class="portfolio-sub-item">
                  <div class="hover-bg">
                      <a data-fancybox="<?= $valores["port_filtro-$count"];?>" data-caption="" href="<?= $key;?>" title="Project description" rel="prettyPhoto">
                        <img src="<?= $key; ?>" class="img-responsive img-thumbnail"> 
                      </a>
                  </div>
                </div>
              </div>          
              <? endforeach ?>
            <? endif; ?>
            <?php $count ++; ?> 
          <? endforeach ?>
     
      </div>
    </div>
  </div>
</div>