<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}
/**
 * @Packge     : Gilb Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author     URI : http://colorlib.com/wp/
 *
 */

// Section Heading
function gilb_section_heading( $title = '', $subtitle = '' ) {
	if( $title || $subtitle ) :
	?>
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-heading text-center">
						<?php
						// Sub title
						if ( $subtitle ) {
							echo '<p>' . esc_html( $subtitle ) . '</p>';
						}
						// Title
						if ( $title ) {
							echo '<h2>' . esc_html( $title ) . '</h2>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	endif;
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'gilb_companion_frontend_scripts', 99 );
function gilb_companion_frontend_scripts() {

	wp_enqueue_script( 'gilb-companion-script', plugins_url( '../js/loadmore-ajax.js', __FILE__ ), array( 'jquery' ), '1.0', true );

}
// 
add_action( 'wp_ajax_gilb_portfolio_ajax', 'gilb_portfolio_ajax' );

add_action( 'wp_ajax_nopriv_gilb_portfolio_ajax', 'gilb_portfolio_ajax' );
function gilb_portfolio_ajax( ){

	ob_start();

	if( !empty( $_POST['elsettings'] ) ):


		$items = array_slice( $_POST['elsettings'], $_POST['postNumber'] );

	    $i = 0;
	    foreach( $items as $val ):

	    $tagclass = sanitize_title_with_dashes( $val['label'] );
	    $i++;
	?>
	<div class="single_gallery_item <?php echo esc_attr( $tagclass ); ?>">
	    <?php 
	    if( !empty( $val['img']['url'] ) ){
	        echo '<img src="'.esc_url( $val['img']['url'] ).'" />';
	    }
	    ?>
	    <div class="gallery-hover-overlay d-flex align-items-center justify-content-center">
	        <div class="port-hover-text text-center">
	            <?php 
	            if( !empty( $val['title'] ) ){
	                echo gilb_heading_tag(
	                    array(
	                        'tag'  => 'h4',
	                        'text' => esc_html( $val['title'] )
	                    )
	                );
	            }

	            if( !empty( $val['sub-title-url'] ) &&  !empty( $val['sub-title'] ) ){
	                echo '<a href="'.esc_url( $val['sub-title-url'] ).'">'.esc_html( $val['sub-title'] ).'</a>';
	            }else{
	                echo '<p>'.esc_html( $val['sub-title'] ).'</p>';
	            }
	            ?>
	            
	        </div>
	    </div>
	</div>

	<?php 

	if( !empty( $_POST['postIncrNumber'] ) ){

	    if( $i == $_POST['postIncrNumber'] ){
	        break;
	    }
	}
	    endforeach;
	endif;
	echo ob_get_clean();
	die();
}


// Portfolio Custom Post
function gilb_custom_posts() {	
	$labels = array(
		'name'               => _x( 'Portfolios', 'post type general name', 'gilb' ),
		'singular_name'      => _x( 'Portfolio', 'post type singular name', 'gilb' ),
		'menu_name'          => _x( 'Portfolios', 'admin menu', 'gilb' ),
		'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'gilb' ),
		'add_new'            => _x( 'Add New', 'portfolio', 'gilb' ),
		'add_new_item'       => __( 'Add New Portfolio', 'gilb' ),
		'new_item'           => __( 'New Portfolio', 'gilb' ),
		'edit_item'          => __( 'Edit Portfolio', 'gilb' ),
		'view_item'          => __( 'View Portfolio', 'gilb' ),
		'all_items'          => __( 'All Portfolios', 'gilb' ),
		'search_items'       => __( 'Search Portfolios', 'gilb' ),
		'parent_item_colon'  => __( 'Parent Portfolios:', 'gilb' ),
		'not_found'          => __( 'No portfolios found.', 'gilb' ),
		'not_found_in_trash' => __( 'No portfolios found in Trash.', 'gilb' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'gilb' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'portfolio' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor' )
	);

	register_post_type( 'portfolio', $args );

}
add_action( 'init', 'gilb_custom_posts' );



/*=========================================================
    Portfolios Section
========================================================*/
function gilb_portfolio_section( $pNumber = 5, $portfolio_style = 'style1' ){ 
	$portfolios = new WP_Query( array(
		'post_type' => 'portfolio',
		'order'		=> 'ASC',
		'posts_per_page'=> $pNumber,

	) );
	
	if( $portfolios->have_posts() ) {
		while ( $portfolios->have_posts() ) {
			$portfolios->the_post();
			$img_size = gilb_meta( 'img_size' );
			$gilb_wrap_class = ($portfolio_style == 'style1' ? 'grid-item' : 'grid-item img_gallery');
			
			if( $img_size == '360x378' ){
				$image_size = 'gilb_portfolio_img_360x378';
			}
			elseif ( $img_size == '750x787' ) {
				$image_size = 'gilb_portfolio_img_750x787';
				$gilb_wrap_class .= ' big_height big_weight';
			}
			elseif ( $img_size == '750x378' ){
				$image_size = 'gilb_portfolio_img_750x378';
				$gilb_wrap_class .= ' big_weight';
			}
			
			$project_img_id = gilb_meta( 'project_img');
			$project_img_url = wp_get_attachment_image_src( $project_img_id, $image_size );
			$gilb_href_link  = ($portfolio_style == 'style1' ? get_permalink() : $project_img_url[0]);
			
			?>
			<a href="<?php echo $gilb_href_link?>" class="<?php echo esc_attr( $gilb_wrap_class )?>">
				<?php 
					echo '<img src="'.$project_img_url[0].'" alt="'.get_the_title().'>">';
				?>
				<div class="portfolio_hover_text">
					<i class="ti-plus"></i>
				</div>
			</a>
			<?php
		}
	}
}

// Recent Portfolio for Single Page
function gilb_recent_portfolio(){

	$sec_title    = !empty( gilb_opt( 'gilb_portfolio_related_projects_sec_title' ) ) ? gilb_opt( 'gilb_portfolio_related_projects_sec_title' ) : '';
	$pnumber      = !empty( gilb_opt( 'gilb_portfolio_related_projects_item' ) ) ? gilb_opt( 'gilb_portfolio_related_projects_item' ) : '';


	$recentPortfolio = new WP_Query( array(
        'post_type' => 'portfolio',
        'posts_per_page'    => $pnumber,

    ) );

	?>
	<!-- related project part start -->
    <section class="related_project padding_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section_tittle">
                        <h2><?php echo esc_html( $sec_title )?></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
				<?php
				if( $recentPortfolio->have_posts() ){
					while ( $recentPortfolio->have_posts() ){
						$recentPortfolio->the_post(); 
						$project_img_id  = gilb_meta( 'project_img');
						$project_img_url = wp_get_attachment_image_src( $project_img_id, 'gilb_portfolio_img_360x378' );
						?>
						<div class="col-lg-4 col-sm-6 mb-5">
							<div class="single_project_details">
								<a href="<?php echo $project_img_url[0]?>" class="grid-item img_gallery">
									<img src="<?php echo $project_img_url[0]?>" alt="<?php echo the_title()?>">
									<div class="portfolio_hover_text">
										<i class="ti-plus"></i>
									</div>
								</a>
							</div>
						</div>
						<?php
					}
				}?>
			</div>
		</div>
	</section>
<?php
}