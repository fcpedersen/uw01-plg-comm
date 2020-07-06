<?php
/*
This is a single commodities file

* @author fcshipstg

* @package fc-cpt-commodities/templates

*/
get_header();
global $wpdb,$post;
while ( have_posts() ) : the_post(); 
?>
<article id="post-<?php the_ID(); ?>">
	<main>
		<!-- =========================================================================== -->
		<!-- HEADER: Start ============================================================= -->
		<section id="header" class="bg-dark text-light hearmnc">
			<div class="container">
				<div class="row py-5">
					<div class="col-12">
						<h1>
							<!-- 	$header_title Start ================================================
							If $header_title is not blank echo $header_title, ELSE           -->
							Ship <code><?php echo the_title();?></code>
						<!-- 	$header_title: End ================================================= -->
						</h1>
						<p class="lead">
							<!-- 	$header_subtitle Start =============================================
							If $header_subtitle is not blank echo $header_subtitle, ELSE     -->
							Shipping <code><?php echo the_title();?></code> is easy with FreightCenter
						<!-- 	$header_subtitle: End ============================================== -->
						</p>

					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
		</section>
		<!-- HEADER: End =============================================================== -->
		<!-- =========================================================================== -->

		<!-- =========================================================================== -->
		<!-- BODY: Start =============================================================== -->
		<section id="body">
			<div class="container bg-white bodysectionmn">

				<!-- BREADCRUMB: Start ===================================================== -->
				<div class="row py-3">
					<div class="col-12">
							<!-- <ol class="breadcrumb px-0 bg-transparent border-bottom">
								<li class="breadcrumb-item"><a href="<?php //echo site_url();?>/ship">ship</a></li>
								<li class="breadcrumb-item active" aria-current="page"><code><?php //echo the_title();?></code></li>
							</ol> -->
							<?php
								echo get_cpt_commodities_breadcrumbs();
							?>
					</div><!-- col -->
				</div><!-- row -->
				<!-- BREADCRUMB: End ======================================================= -->

				<div class="row pb-5 classpbs">
					<div class="col-12 col-md-8">
					<!-- CONTENT: Start ======================================================== -->
					<!-- 	the_content() Start ============================================
					If the_content() is not empty echo the_content(), ELSE      -->
						<p>Lorem <code><?php echo the_title();?></code> dolor sit amet, consectetur adipiscing elit. Proin id orci a ante aliquet ornare.</p>
						<?php
						the_content();
						?>
					<!-- 	the_content(): End ============================================= -->
					<!-- CONTENT: End ========================================================== -->
					</div><!-- col -->
					<div class="col-12 col-md-4 border-left">
					<!-- LISTS: Start ========================================================== -->

					<!-- 	POST ITEMS: Start ==============================================
					- If POST has children, echo list of child POSTs, ELSE
					- If POST is child, echo list of sibling POSTs
					- If POST is child, title should use parent_title vs get_the_title() -->
						<h5 class="pb-3 mb-0 border-bottom border-secondary">Types of <code><?php echo the_title();?></code> Shipped</h5>
						<ul class="list-group list-group-flush">
							<?php
							$defaults = array(
						        'post_type' => 'commodities',
						        'orderby' => 'date',
								'order' => 'DESC',
								'posts_per_page' => -1,
						    );
							$postsrelated = get_posts($defaults);
							if(!empty($postsrelated)){
								foreach ($postsrelated as $key => $postvalues) {
									?>
									<li class="list-group-item"><a href="<?php echo get_the_permalink($postvalues->ID);?>"><?php echo $postvalues->post_title;?></a></li>
									<?php
								}
							}
							?>
							
						</ul>
						<!-- 	POST ITEMS: End ================================================ -->

						<div class="my-2">&nbsp;</div>
						
						<!-- 	TAXONOMY | CLASS ITEMS =========================================
						List of all CLASSES for current POST                        -->
						<h5 class="pb-3 mb-0 border-bottom border-secondary"><code><?php echo the_title();?></code> Shipping Class</h5>
						<ul class="list-group list-group-flush">
							<?php
							$term_obj_list = get_the_terms( get_the_ID(), 'commodities_class' );
							if(!empty($term_obj_list)){
								foreach ($term_obj_list as $key => $valueclass) {
									?>
										<li class="list-group-item"><a href="<?php echo get_category_link($valueclass->term_id);?>"><?php echo $valueclass->name;?></a></li>
									<?php
								}
							}
							?>
							
						</ul>
						<!-- 	TAXONOMY | CLASS ITEMS ========================================= -->

						<div class="my-2">&nbsp;</div>
						
						<!-- 	TAXONOMY | NMFC ITEMS =========================================
						List of all CLASSES for current POST                        -->
						<h5 class="pb-3 mb-0 border-bottom border-secondary"><code><?php echo the_title();?></code> NMFC Codes</h5>
						<ul class="list-group list-group-flush">
							<?php
							$term_obj_list = get_the_terms( get_the_ID(), 'commodities_nmfc' );
							if(!empty($term_obj_list)){
								foreach ($term_obj_list as $key => $valuenmfc) {
									?>
										<li class="list-group-item"><a href="<?php echo get_category_link($valuenmfc->term_id);?>"><?php echo $valuenmfc->name;?></a></li>
									<?php
								}
							}
							?>
						</ul>
						<!-- 	TAXONOMY | NMFC ITEMS ========================================= -->
						<!-- LISTS: End ============================================================ -->
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
		</section>
		<!-- BODY: End ================================================================= -->
		<!-- =========================================================================== -->
	</main>
</article>
<?php
endwhile; 
get_footer();
?>

