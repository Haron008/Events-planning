<?php 
/**
 * The Default Page Template for Perfect Event Lite
 *
 * Displays the Pages.
 *
 * @package Perfect Event Lite
 * 
 * @since SKT Perfect Event Lite 1.0
 */
global $complete;?>

<?php get_header(); ?>
    <div class="page_wrap layer_wrapper">
     <?php if (!is_front_page()) { ?>
        <!--CUSTOM PAGE HEADER STARTS-->
            <?php get_template_part('sktframe/core','pageheader'); ?>
        <!--CUSTOM PAGE HEADER ENDS-->
        <?php } ?>
        
        <?php if ( is_front_page() || is_home() ) { ?>
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
    <?php } ?>
    <?php wp_reset_postdata(); ?>
    <!-- Home Section 1 -->
  </div>
</div>
<?php } ?>
        <div id="content">
            <div class="center">
                <div class="single_wrap">
                    <div class="single_post">
                        <?php if(have_posts()): ?><?php while(have_posts()): ?><?php the_post(); ?>
                        <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">  
                                    
                        <!--EDIT BUTTON START-->
                            <?php if ( is_user_logged_in() || is_admin() ) { ?>
                                    <div class="edit_wrap">
                            			<a href="<?php echo get_edit_post_link(); ?>">
                            				<?php _e('Edit','complete'); ?>
                                		</a>
                            		</div>
                            <?php } ?>
                        <!--EDIT BUTTON END-->
                        
                        <!--PAGE CONTENT START-->   
                        <div class="single_post_content">
                        
                                <!--THE CONTENT START-->
                                    <div class="thn_post_wrap">
                                    	<h1><?php the_title(); ?></h1>
                                        <?php the_content(); ?>
									</div>
                                        <div style="clear:both"></div>
                                    <div class="thn_post_wrap wp_link_pages">
                                        <?php wp_link_pages('<p class="pages"><strong>'.__('Pages:', 'complete').'</strong> ', '</p>', 'number'); ?>
                                    </div>
                                <!--THE CONTENT END-->
                        </div>
                        <!--PAGE CONTENT END--> 
                        </div>
                   <?php endwhile ?> 
                    </div>
                  <!--COMMENT START: Calling the Comment Section. If you want to hide comments from your posts, remove the line below-->     
                  <?php if (!empty ($complete['post_comments_id'])) { ?>
                      <div class="comments_template">
                          <?php comments_template('',true); ?>
                      </div>
                  <?php }?> 
                  <!--COMMENT END-->
                  
                  <?php endif ?>
                    </div>
                <!--PAGE END-->
                <!--SIDEBAR START--> 
                <?php get_sidebar('page'); ?>
                <!--SIDEBAR END-->
                    </div>
            </div>
    </div><!--layer_wrapper class END-->
<?php get_footer(); ?>