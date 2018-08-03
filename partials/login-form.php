<div class="login-form ml-lg-auto my-auto mb-lg-auto mt-lg-0">
    <?php if(is_user_logged_in()) :
            $current_user = wp_get_current_user(); ?>
        <div class="btn-group pull-right mr-2 mr-sm-0"> <a class="btn btn-success mr-2 d-none d-lg-inline" href="<?php echo get_page_link('492'); ?>"><i class="fa fa-gbp fa-fw"></i> Donate</a> <a class="btn btn-warning mr-1 d-none d-lg-inline" href="<?php echo get_page_link('4252'); ?>"><i class="fa fa-phone fa-fw"></i> Support</a>
            <div class="hidden-xs-down btn p-0 pr-1">
                <a class="btn-skinny" href="<?php if (function_exists('bp_loggedin_user_domain')) { echo bp_loggedin_user_domain();} ?>">
                    <?php echo get_avatar( $current_user->user_email, 38 );?>
                </a>
            </div> <a href="<?php if (function_exists('bp_loggedin_user_domain')) { echo bp_loggedin_user_domain();} ?>" class="btn btn-skinny btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="hidden-sm-up fa fa-lock fa-fw" aria-hidden="true"></i> <span class="d-none d-md-inline">Hi <?php echo $current_user->display_name ?></span></a>
            <div class="dropdown-menu dropdown-menu-right">
                <h6 class="dropdown-header">Members</h6>
                <?php bootstrap_dropdowns('logged-in-user'); ?>
                    <h6 class="dropdown-header">Officers</h6>
                    <?php bootstrap_dropdowns('logged-in-officer'); ?>
                        <div class="dropdown-divider"></div>
                        <div class="p-2"> <a href="<?php echo wp_logout_url( home_url() ); ?>" class="btn btn-danger btn-skinny mr-auto"> Logout</a></div>
            </div>
        </div>
        <?php else :?>
            <div class="btn-group pull-right mr-2 mr-sm-0"> <a class="btn btn-warning mr-1 d-none d-md-inline" href="<?php echo get_page_link('4252');?>"><i class="fa fa-phone fa-fw"></i><span class="d-none d-lg-inline">Contact us</span></a> <a class="btn btn-danger mr-2 d-none d-md-inline" href="<?php echo get_page_link('11217');?>"><i class="fa fa-plus fa-fw"></i> Join <span class="d-none d-lg-inline">the Party</span></a>
                <button class="btn btn-info login-button" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-user fa-fw "></i><span class="d-none d-lg-inline"> Sign in</span></button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-purple text-white">
                            <h5 class="modal-title" id="exampleModalLabel">Co-operative Party login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        </div>
                        <form action="<?php bloginfo( 'url' ); ?>/wp-login.php" method="post" name="loginform">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="sr-only" for="login-username">Username:</label>
                                    <input type="text" class="login-username form-control" name="log" placeholder="Username" /> </div>
                                <div class="form-group">
                                    <label class="sr-only" for="login-password">Password:</label>
                                    <input type="password" class="login-password form-control" name="pwd" placeholder="Password" /> </div>
                                <div class="form-check small">
                                    <label for="rememberme" class="form-check-label">
                                        <input name="rememberme" id="rememberme" type="checkbox" class="form-check-input" checked="checked" value="forever"> Remember me </label>
                                </div>
                            </div>
                            <div class="modal-footer"><a class="btn" href="<?php echo wp_lostpassword_url( get_permalink() ); ?>" title="Lost Password">Lost Password</a> <a href="<?php bloginfo( 'url' ); ?>/officers/register" class="btn btn-default btn-secondary">Register</a>
                                <button type="submit" name="wp-submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif;?>
</div>