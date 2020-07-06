<?php
/*
This file is a mode category file.

* @author fcshipstg

* @package fc-cpt-commodities/templates

*/
get_header();
global $wpdb,$post;
// show posts by category
$args = array('post_type' => 'commodities',
    'tax_query' => array(
        array(
            'taxonomy' => 'commodities_mode',
            'field' => 'slug',
            'terms' => ''.single_term_title( "", false ).'',
        ),
    ),
);
$postscat = get_posts($args);

// category list
$taxonomy = 'commodities_mode';

// we get the terms of the taxonomy 'course', but only top-level-terms with (parent => 0)
$top_level_terms = get_terms( array(
    'taxonomy'      => $taxonomy,
    'parent'        => '0',
    'hide_empty'    => false,
) );
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
								Ship Freight by <code><?php echo single_cat_title("", false);?></code>
							<!-- 	$header_title: End ================================================= -->
							</h1>
							<p class="lead">
								<!-- 	$header_subtitle Start ============================================= -->
								Learn about shipping freight by <code><?php echo single_cat_title("", false);?></code>
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
									<li class="breadcrumb-item active" aria-current="page"><a href="<?php //echo get_category_link($post->ID);?>">mode</a></li>
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
							<h5 class="py-3 mb-0 border-bottom border-secondary">Commonly Shipped by <code><?php echo single_cat_title("", false);?></code> Items</h5>
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
							<h5 class="pb-3 mb-0 border-bottom border-secondary">Other Freight Modes</h5>
								<?php
								// only if some terms actually exists, we move on
								if (!empty($top_level_terms)) {

								    echo '<ul class="list-group list-group-flush">';

									    foreach ($top_level_terms as $top_level_term) {

									        // the id of the top-level-term, we need this further down
									        $top_term_id = $top_level_term->term_id;
									        // the name of the top-level-term
									        $top_term_name = $top_level_term->name;
									        // the current used taxonomy
									        $top_term_tax = $top_level_term->taxonomy;

									        // note that the closing </li> is set further down, so that we can add a sub list item correctly
									        echo '<li class="list-group-item"><a href="'.get_category_link($top_level_term->term_id).'">'.$top_term_name.'</a>';

									        // here we get the child-child terms
									        // for this we are using 'child_of' => $top_term_id
									        // I also set 'parent' => $top_term_id here, with this line you will only see this level and no further childs
									        $second_level_terms = get_terms( array(
									            'taxonomy' => $top_term_tax, // you could also use $taxonomy as defined in the first lines
									            'child_of' => $top_term_id,
									            'parent' => $top_term_id, // disable this line to see more child elements (child-child-child-terms)
									            'hide_empty' => false,
									        ) );

									        // start a second list element if we have second level terms
									        if ($second_level_terms) {

									            echo '<ul class="second-level-terms">';

									            foreach ($second_level_terms as $second_level_term) {

									                $second_term_name = $second_level_term->name;

									                echo '<li class="second-level-term"><a href="'.get_category_link($second_level_term->term_id).'">'.$second_term_name.'</a></li>';

									            }
									            echo '</ul>';
									        }
									        echo '</li>';
									    }
								    echo '</ul>';
								}
								?>
								
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