<?php 
/**
 * The index page of Perfect Event Lite
 *
 * Displays the home page elements.
 *
 * @package Perfect Event Lite
 * 
 * @since SKT Perfect Event Lite 1.0
 */
global $complete;
?>
<?php get_header(); ?>
<?php if ( is_front_page() ) { ?>
<div class="fixed_site layer_wrapper">
  <div class="fixed_wrap fixindex"> 
    <!-- Home Section 1 -->
	<?php if($complete['hide_boxes_section1'] == ''){?>    
    <section class="home1_section_area <?php if($complete['section1_bg_image']){ ?>home1_section_area_bg<?php } ?>" <?php if(!empty($complete['section1_bg_video'])){ ?>data-vidbg-bg="mp4: <?php $sec1bgvideo = $complete['section1_bg_video']; echo do_shortcode($sec1bgvideo); ?>" data-vidbg-options="loop: true, muted: true, overlay: false"<?php } ?>>
    	<div class="center">
            <div class="home_section1_content">
             	  <?php 
				  	$pagesetting1 = get_theme_mod( 'page-setting1');
					if ($pagesetting1 == '0'){
						echo '<div class="center-title"><h2 style="color:#253242">ABOUT EVENTS</h2><span style="border-bottom-color:#e00a2c"></span></div>
<div style="height:40px;" class="spacecode"></div><div class="columns-2"><h3>THE EVENT YOU ARE WAITING FOR <div class="clear"></div> EXPERIENCED SPEAKERS AROUND THE WORD!</h3><p>Etiam eget auctor massa, nec molestie felis. Nullam consectetur vulputate neque, eget sollicitudin sem commodo a. Morbi ipsum nisi, tempus non turpis nec, accumsan hendrerit mi. Donec auctor convallis vehicula. Nunc ut condimentum nunc. Suspendisse potenti. Nam at imperdiet velit. Maecenas euismod nisi sit amet sem varius iaculis. Ut bibendum sagittis tellus tempor sagittis. Morbi pellentesque quis ex eu sollicitudin.</p><p>Phasellus at tincidunt nisl. Donec ut tempus nulla. Donec tempor non justo at dapibus. Vestibulum quis magna varius est mollis tempor. Nunc sollicitudin rutrum mi, in porta metus tincidunt non. In sed luctus arcu. Donec sed ultrices est, at consequat turpis. Quisque suscipit blandit dapibus. Vivamus mollis diam arcu, ut gravida mi vulputate vel. Proin at placerat eros. Suspendisse potenti. Donec malesuada mauris luctus magna fermentum auctor</p></div><div class="columns-2"><div class="about-event"><a href="#"><i class="fa fa-bullhorn" aria-hidden="true"></i><h5>Event of the year</h5><p>Quisque tincidunt feugiat elit dignissim euismod.</p></a></div><div class="about-event"><a href="#"><i class="fa fa-ticket" aria-hidden="true"></i><h5>Online Registration</h5><p>Vivamus mollis diam arcu, ut gravida mi vulputate vel. Proin at </p></a></div><div class="about-event"><a href="#"><i class="fa fa-video-camera" aria-hidden="true"></i><h5>Live Videos</h5><p>Quisque tincidunt feugiat elit dignissim euismod.</p></a></div><div class="about-event"><a href="#"><i class="fa fa-university" aria-hidden="true"></i><h5>Largest Auditorium</h5><p>Vivamus mollis diam arcu, ut gravida mi vulputate vel. Proin at </p></a></div></div>';	
					}
					else
					{
					$secone = new WP_Query('page_id='.$pagesetting1.'');
					while ($secone->have_posts()) : $secone->the_post();
					?>
					<?php the_content(); ?>
					<?php endwhile; wp_reset_postdata(); ?>
					<?php 
					}
					?> 
            </div>
        </div>
    </section>
    <?php get_template_part('templates/post','layout4'); ?>    
    <?php } ?>
    <?php wp_reset_postdata(); ?>
    <!-- Home Section 1 -->
  </div>
</div>
<?php }else{ ?>
<div class="fixed_site">
  <div class="fixed_wrap fixindex">
    <!--CUSTOM PAGE HEADER STARTS-->
        <?php get_template_part('sktframe/core','pageheader'); ?>
    <!--CUSTOM PAGE HEADER ENDS-->  
      
    <?php get_template_part('templates/post','layout4'); ?>
  </div>
</div>
<?php } //is_front_page ENDS ?>
<?php get_footer(); ?>