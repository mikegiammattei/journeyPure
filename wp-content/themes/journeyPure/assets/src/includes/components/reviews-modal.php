<?php
	require_once get_stylesheet_directory() . '/classes/ReviewPage2.php';
	$reviews = new Pages\ReviewPage2( true );
?>

<div class="modal fade reviews-modal" id="reviews-modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary">
				<h5 class="modal-title text-white h5">Hundreds of Positive Reviews</h5>

				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<div class="jp-reviews-reviews-box" data-page="1" data-url="<?php echo esc_attr( admin_url( 'admin-ajax.php' ) ); ?>" data-nonce="<?php echo esc_attr( wp_create_nonce( 'get_reviews' ) ); ?>">
					<div class="jp-reviews-reviews-top">
						<div class="jp-reviews-reviews-summary">
							<p class="jp-reviews-reviews-summary-avg"><?php echo esc_html( $reviews->review_avg ); ?></p>

							<div class="jp-reviews-reviews-summary-stars">
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
								<i class="fas fa-star"></i>
							</div>

							<p class="jp-reviews-reviews-summary-total"><?php echo esc_html( $reviews->review_total ); ?> reviews</p>
						</div>

						<div class="jp-reviews-reviews-filter">
							<label for="sort">Sort by:</label>

							<select id="sort">
								<!-- <option value="ml">Most Liked</option> -->
								<option value="n" selected="selected">Newest</option>
								<option value="o">Oldest</option>
								<option value="lr">Lowest Rated</option>
								<option value="hr">Highest Rated</option>
							</select>
						</div>
					</div>

					<div class="jp-reviews-reviews-reviews">
						<div class="jp-reviews-reviews-reviews-inner">
							<?php
								global $_reviews;
								$_reviews = $reviews;
								require get_stylesheet_directory() . '/assets/src/includes/components/review-items.php';
							?>
						</div>

						<button class="jp-reviews-reviews-loading-button btn btn-outline-secondary">Load more</button>
					</div>

					<?php require get_stylesheet_directory() . '/assets/src/includes/components/loading-icon.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>
