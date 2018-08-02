<style type="text/css">
    @media (min-width: 992px) {
        .jumbotron-bg-responsive {
            background-position: 560px 100%;
            background-size: auto 720px;
            background-repeat: no-repeat;
            background-image: url('<?php echo get_stylesheet_directory_uri() . '/img/coopparty-std-2018-720h.png'; ?>');
        }
    }
    
    @media (min-width: 1300px) {
        .jumbotron-bg-responsive {
            background-position: 720px 100%;
            background-size: auto 720px;
        }
    }
    
    @media (min-width: 1640px) {
        .jumbotron-bg-responsive {
            background-position: 920px 100%;
            background-size: auto 720px;
        }
    }
    
    @media (min-width: 1920px) {
        .jumbotron-bg-responsive {
            background-position: 120% 100%;
            background-size: auto 720px;
        }
    }
</style>
<section class="jumbotron-bg-responsive jumbotron jumbotron-fluid bg-primary text-white v-20 scrollify text-inverse">
    <div class="container">
        <div class="row align-items-center">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-lg-5">
                    <h2 class="display-3">Ideas to change Britain</h2>
                    <p class="lead">As the political party of the co-operative movement, we believe that things work best when ordinary people have a voice, and when services are accountable to the people who use them.</p>
                    <p>Whether in government or opposition, for a century the Co-operative Party has been a voice for co-op values and principles in the places where decisions are taken, and laws are made.</p>
                    <div class="form-basic">
                        <?php gravity_form(34, true, false, false, '', true, '100');?>
                    </div>
                </div>
                <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</section>