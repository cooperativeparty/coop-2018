<header id="banner" class="jumbotron banner jumbotron-fluid bg-primary text-white sr-only" data-spy="affix" data-offset-top="560">
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="mr-3">
                <?php the_title( '<h2 class="page-title display-3 balance-text">', '</h2>' );
        ?></div>
            <div class="ml-auto mt-auto shrink-self-none">
                <?php get_template_part( 'partials/buttons', 'share' ); ?>
            </div>
        </div>
    </div>
</header>