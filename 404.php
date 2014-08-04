<?php get_header(); ?>
<div class="narrowcolumn singlepage">
			<div class="post">
          <h2><?php _e('¡Error 404, página no encontrada!','silesia'); ?></h2></div>
          <div class="entry">
             <p><?php _e('¡Oh no!, parece ser que los conejos han vuelto a mordisquear los cables!','silesia'); ?></p>
             <p><strong><?php _e('Quizás te interesen estas entradas que hemos encontrado:','silesia'); ?></strong></p>
             <?php query_posts('showposts=15'); ?>
             <?php while (have_posts()) : the_post(); ?>
                 <ul class="arc">
                    <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
                 </ul>
             <?php endwhile;?>
             <div class="clear"></div>
				</div>
			</div>
</div> <!-- END Narrowcolumn -->

<div id="sidebar" class="profile">
   <?php get_sidebar();?>
</div>
<div class="clear"></div>
<?php get_footer(); ?>