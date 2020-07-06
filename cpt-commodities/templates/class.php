<?php
/*
This file is a class category file.

* @author fcshipstg

* @package fc-cpt-commodities/templates

*/
get_header();
global $wpdb,$post;
// show posts by category
$args = array('post_type' => 'commodities',
    'tax_query' => array(
        array(
            'taxonomy' => 'commodities_class',
            'field' => 'slug',
            'terms' => ''.single_term_title( "", false ).'',
        ),
    ),
);
$postscat = get_posts($args);

// category list
$terms = get_terms(array('taxonomy'=>'commodities_class','hide_empty'=>true));
?>
		<main>
			<!-- =========================================================================== -->
			<!-- HEADER: Start ============================================================= -->
			<section id="header" class="bg-dark text-light hearmnc">
				<div class="container">
					<div class="row py-5">
						<div class="col-12">
							<h1>
							<!-- 	$header_title Start ================================================
										{taxonomy}= Class or NMFC                                       -->
								Freight Class: <code><?php echo single_cat_title("", false);?></code>
							<!-- 	$header_title: End ================================================= -->
							</h1>
							<p class="lead">
								<!-- 	$header_subtitle Start ============================================= -->
								Learn about shipping freight class <code><?php echo single_cat_title("", false);?></code>
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
							<nav aria-label="breadcrumb">
								<!-- <ol class="breadcrumb px-0 bg-transparent border-bottom">
									<li class="breadcrumb-item"><a href="<?php //echo site_url() . '/ship';?>">ship</a></li>
									<li class="breadcrumb-item active" aria-current="page"><a href="<?php //echo site_url() . '/class';?>">Class</a></li>
									<li class="breadcrumb-item active" aria-current="page"><code><?php //echo single_cat_title("", false);?></code></li>
								</ol> -->
								<?php echo get_cpt_commodities_breadcrumbs();?>
							</nav>
						</div><!-- col -->
					</div><!-- row -->
					<!-- BREADCRUMB: End ======================================================= -->

					<div class="row pb-5 classpbs">
						<div class="col-12 col-md-8">

							<!-- CONTENT: Start ======================================================== -->
							<!-- 	Description: Start =============================================
							If Taxonomy {Description} is not empty echo description, ELSE      -->
							<p>Lorem class <code><?php echo single_cat_title("", false);?></code> dolor sit amet, consectetur adipiscing elit. Proin id orci a ante aliquet ornare.</p>

							<?php
							// echo "<pre>";
							// print_r($classcat_list);
							// echo "</pre>";
							?>
						<!-- 	Description: End =============================================== -->
						<!-- CONTENT: End ========================================================== -->
							
						<!-- 	POSTS | TAXONOMY ITEMS: Start ======================================
							List of all POSTS for current TAXONOMY                           -->
							<h5 class="py-3 mb-0 border-bottom border-secondary">Commonly Shipped Class <code><?php echo single_cat_title("", false);?></code> Items</h5>
							<ul class="list-group list-group-flush">
								<?php
								if(!empty($postscat)){
									foreach ($postscat as $ky => $postsval) {
										?>
										<li class="list-group-item"><a href="<?php echo get_the_permalink($postsval->ID);?>"><?php echo $postsval->post_title;?></a></li>
										<?php
									}
								}
								?>
							</ul>
						<!-- 	POSTS | TAXONOMY ITEMS: End ======================================== -->

						</div><!-- col -->
						<div class="col-12 col-md-4 border-left">
						<!-- LISTS: Start ========================================================== -->
	
						<!-- 	TAXONOMY | CLASS ITEMS =========================================
						List of other TAXONOMY                     -->
							<h5 class="pb-3 mb-0 border-bottom border-secondary">Other Freight Classes</h5>
							<ul class="list-group list-group-flush">
								<?php
								if(!empty($terms)){
									foreach ($terms as $key => $termsVal) {
									?>
										<li class="list-group-item"><a href="<?php echo get_category_link($termsVal->term_id)?>"><?php echo isset($termsVal->name) ? $termsVal->name : ''?></a></li>
									<?php
									}
								}
								?>
							</ul>
								
						<!-- 	TAXONOMY | CLASS ITEMS ========================================= -->
							
							
						<!-- LISTS: End ============================================================ -->
						</div><!-- col -->
					</div><!-- row -->

				</div><!-- container -->
			</section>
			<!-- BODY: End ================================================================= -->
			<!-- =========================================================================== -->
			
		</main>
<?php



get_footer();

?>