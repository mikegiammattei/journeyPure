<?php
/**
 * Review items
 *
 * @author   Fernando Tessmann
 * @package  JourneyPure
 */

global $_reviews;
?>

<?php foreach ( $_reviews->reviews as $i => $review ) : ?>
	<div class="jp-reviews-reviews-review">
		<div class="jp-reviews-reviews-review-author">
			<div class="row justify-content-between">
				<div class="col-md-9 col-8">
					<div class="row">
						<div class="col-lg-auto col-md-3 col-4 align-self-center">
							<img class="jp-reviews-reviews-review-image lazy" src="<?php echo esc_attr( $review->photo['image'] ); ?>" alt="<?php echo esc_attr( $review->photo['alt'] ); ?>">
						</div>

						<div class="col-lg-auto col-md-9 col-8 align-self-center">
							<h5 class="jp-reviews-reviews-review-title"><?php echo esc_html( $review->heading ); ?></h5>

							<div class="jp-reviews-reviews-review-stars">
								<?php for ( $i = 0; $i < $review->star_rating; $i++ ) : ?>
									<i class="fas fa-star"></i>
								<?php endfor; ?>
							</div>
						</div>
					</div>
				</div>

				<?php if ( isset( $review->source_image['image'] ) ) : ?>
					<div class="col-md-3 col-4 align-self-center">
						<img class="jp-reviews-reviews-review-image-google lazy" src="<?php echo esc_attr( $review->source_image['image'] ); ?>" alt="<?php echo esc_attr( $_reviews->source_image['alt'] ); ?>">
					</div>
				<?php endif; ?>
			</div>
		</div>

		<div class="jp-reviews-reviews-review-text" aria-hidden="true">
			<?php echo wp_kses_post( wpautop( wp_trim_words( $review->review_text, 50, ' ... <span class="jp-reviews-reviews-review-text-more">More</span>' ) ) ); ?>
		</div>

		<div class="jp-reviews-reviews-review-text hide">
			<?php echo wp_kses_post( $review->review_text ); ?>
		</div>

		<div data-like-object="<?php echo esc_attr( $review->identifier ); ?>" class="like-button" data-placement="top" data-toggle="tooltip" <?php echo $_reviews->is_liked_by_session( $review->identifier ) ? 'title="Already liked"' : 'title="Do you like?"'; ?>>
			<i class="fas fa-thumbs-up"></i>
			<data value="<?php echo esc_attr( $review->total_likes ); ?>"> <?php echo esc_html( $review->total_likes ); ?></data>
		</div>
	</div>
<?php endforeach; ?>
