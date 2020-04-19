<?php
/**
 * Template part for displaying post articles.
 *
 */

$articles_data = (get_field('article_section')) ? get_field('article_section') : null;
$article_heading = ($articles_data['section_heading']) ? $articles_data['section_heading'] : null;
$articles = ($articles_data['aod_articles']) ? $articles_data['aod_articles'] : null;
//print_r($articles);
//$articles = (get_field('aod_articles')) ? get_field('aod_articles') : null;

if(!empty($article_heading) || !empty($article)): ?>
<div class="single-posts">
    <div class="aod-article-accordion">
        <?php if(!empty($article_heading)): ?>
        <h4 class="heading"><?php echo $article_heading; ?></h4>
        <?php endif; ?>
<?php
    if(is_array($articles)):
        foreach ($articles as $index => $article) : ?>
            <div class="aod-article">
                <div>
                    <div class="card-header" aria-expanded="false" data-toggle="collapse" href="#aod-article-<?php echo $index; ?>" role="button" >
                        <i class="fas fa-plus-circle"></i> <?php echo $article['header']; ?>
                    </div>
                    <div class="card-body p-0 collapse" id="aod-article-<?php echo $index; ?>">
                        <div>
                            <?php echo $article['body']; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</div>
<?php endif;
