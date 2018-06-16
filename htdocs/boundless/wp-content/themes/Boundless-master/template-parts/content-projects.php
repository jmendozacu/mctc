<!---//////////////////////////////////////////////

                    project 1 

/////////////////////////////////////////////////-->
<?php if( have_rows('projects') ):
    // loop through the rows of data
    $i = 0;
    while ( have_rows('projects') ) : the_row(); ?>
        <?php $i++; ?>
<div id="projects" class="project-background">
    <section id="project-<?php echo $i; ?>" class="project">
        <h2 id="project-title"> <?php the_sub_field('project_title'); ?></h2>
        <div class="portfolio-item">
            <div class="project-description-container">
                <div class="description">
                    <?php the_sub_field('project_description'); ?>
                    <div class="next">
                        <?php $v = $i + 1; ?>
                        <a data-scroll href="#project-<?php echo $v;?>"><img alt="arrow down" src="/wp-content/themes/Boundless/images/B-Assets-Final/arrow.svg"/></a>
                    </div>
                </div>   <!-- end description -->
            </div>  <!-- end project description container -->
            <div class="project-image-container">
                <?php $image = get_sub_field('project_image');
                if( !empty($image) ): ?>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                <?php endif; ?>
            </div>  <!-- end project image container -->
        </div>  <!-- end portfolio item -->
    </section>
</div>  <!-- end project background -->



    <?php  endwhile; ?>
<?php else : ?>

    <?php // no rows found ?>

<?php endif;?>