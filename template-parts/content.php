<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package cure
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="container-fluid no-padding">

		<header class="entry-header">
			<div class="row equal">
				<div class="col-lg-6 bg-navy no-padding">
					<div class="row medium-topandbottom-padding">	
						<div class="col-1">
						</div>
						<div class="col-10">
							<div class="green-text medium-bottom-margin">
								<?php
								$categories = get_the_category();
								$category_list = join( ', ', wp_list_pluck( $categories, 'name' ) );
								 
								echo wp_kses_post( $category_list ); ?> | <?php echo get_the_date(); ?>
							</div>
							<h1 class="white-text"><?php the_title(); ?></h1>
						</div>
						<div class="col-1">
						</div>		
					</div>
				</div>
				<?php $thumb = get_the_post_thumbnail_url(); ?>
				<div class="col-lg-6 bg-lightblue no-padding background-image" style="background-image: url('<?php echo $thumb;?>')">
				</div>
			</div>
		</header><!-- .entry-header -->

		<div class="row equal">
			<div class="col-lg-4 bg-grayblue medium-topandbottom-padding">
				<div class="row">
					<div class="col-lg-2">
					</div>
					<div class="col-lg-8">
						<h3>Authored By</h3>
						<p>Author List</p>
						<a class="green-button" href="#">Download As PDF</a>
					</div>
					<div class="col-lg-2">
					</div>				
				</div>
			</div>
			<div class="col-lg-8 medium-topandbottom-padding">	
				<div class="entry-content">	
					<div class="row">
					<div class="col-lg-1">
					</div>
					<div class="col-lg-9">
						<?php the_content(); ?>
					</div>
					<div class="col-lg-2">
					</div>				
				</div>
				</div><!-- .entry-content -->
			</div>
		</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
