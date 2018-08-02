<section class="jumbotron jumbotron-fluid bg-primary text-white v-20 scrollify text-inverse">
    <div class="container">
        <div class="row align-items-center">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="col-lg-5">
                    <h2 class="display-4">About us</h2>
                    <p class="lead">As the political party of the co-operative movement, we work to ensure a political voice for co-operatives, and to make the case for co-operative ideas in our economy and wider society.
                        <p>There are more than 6,000 businesses across the UK that are owned by their customers and employees, and run in their interests, rather than for private profit. From shops owned by their consumers to sports clubs owned by fans, we believe that co-operatives provide a template for a better way of doing business and for a fairer Britain.</p>
                        <p>Whether in government or opposition, for a century the Co-operative Party has been a voice for co-op values and principles in the places where decisions are taken, and laws are made.</p> <a href="/about" class="btn px-lg-5 btn-lg btn-outline-info">More about us</a><a href="/join" class="ml-0 ml-md-2 btn btn-info btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> Join the Party</a> </div>
                <?php endwhile; // end of the loop. ?>
                    <div class="push-lg-1 col-lg-6 py-2 py-lg-0">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="//www.youtube.com/embed/Gqi6Lu1M-YI?&rel=0&theme=light&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" allowfullscreen></iframe>
                        </div>
                    </div>
        </div>
    </div>
</section>