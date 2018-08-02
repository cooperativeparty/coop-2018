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
                    <p class="lead">We're working to build an economy where power and wealth are shared.</p>
                    <p>We believe in giving people a voice in the services they use and the companies they work for, and a fairer share of the wealth we create together.</p>
                    <p>If you're with us, help make it happen.</p>
                    <div class="form-basic">
                        <?php gravity_form(34, true, false, false, '', true, '100');?>
                    </div>
                </div>
                <?php endwhile; // end of the loop. ?>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        jQuery(document).bind('gform_confirmation_loaded', function () {
            fbq('track', 'Lead');
        });
    });
</script>