<?php
/**
 * Template Name: OSM Generator
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */
?>
    <html>

    <head>
        <style type="text/css">
            .wrapper {
                margin: 30px auto;
                width: 80%;
                font-family: sans-serif;
                color: #555;
                font-size: 14px;
                line-height: 24px;
            }
            
            h1 {
                font-size: 20px;
                font-weight: bold;
                text-align: center;
                text-transform: uppercase;
            }
            
            h1 + p {
                text-align: center;
                margin: 20px 0;
                font-size: 16px;
            }
            
            .tabs {
                list-style-type: none;
                padding-left: 0;
            }
            
            .tabs > li {
                float: left;
                width: 20%;
                list-style-type: none;
            }
            
            .tabs > li a {
                display: block;
                text-align: center;
                text-decoration: none;
                text-transform: uppercase;
                color: #888;
                padding: 20px 0;
                border-bottom: 2px solid #888;
                background: #f7f7f7;
            }
            
            .tabs > li a:hover,
            .tabs > li a.active {
                background: #ddd;
            }
            
            .tabgroup > div {
                padding: 30px;
                box-shadow: 0 3px 10px rgba(0, 0, 0, .3);
            }
            
            .clearfix:after {
                content: "";
                display: table;
                clear: both;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="wrapper">
            <h1>Officer Support Mailing</h1>
            <h3>How to use</h3>
            <ul>
                <li>This tool automatically retrieves a list of 10 recent blog posts from the Officer support mailing category of our blog, saving time and effort</li>
                <li>The introductory paragraph is generated from the post content (if you are logged in you can
                    <?php edit_post_link('edit it here', '', ''); ?>)</li>
                <li>The headlines, link and intro paragraphs of each news story are taken from the original blog post.</li>
                <li>To use, simply copy the generated code into NationBuilder. You can then use the visual editor to make any tweaks or customisation to text</li>
            </ul>
            <p></p>
            <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                <li><a href="#tab1" class="active">Html Code</a></li>
                <li><a href="#tab2">Preview</a></li>
            </ul>
            <section id="first-tab-group" class="tabgroup">
                <div id="tab1">
                    <button class="copy-btn">Copy text to clipboard</button>
                    <textarea id="code-field" readonly="true" style="width:100%; height: 100%;">
                        <p><span style="font-size: 18px; font-weight: bold; color: #711f8e;">Dear {{ recipient.first_name_or_friend }}</span></p>
                        <div style="background-color:#f4f4f4; border:1px solid #ccc; padding:10px; margin-bottom:15px;">
                            <p>
                                <?php the_content();?>
                            </p>
                        </div>
                        <hr />
                        <?php query_posts( 'cat=1287&posts_per_page=10' );
while ( have_posts() ) : the_post(); ?>
                            <h3 style="color:#007ea9"><?php the_title();?></h3>
                            <p>
                                <?php echo get_the_excerpt();?>
                            </p>
                            <p><a href="<?php the_permalink();?>">Read more</a></p>
                            <hr/>
                            <?php endwhile;
                    wp_reset_query()?>
                                <p>If you have any questions or queries please don&rsquo;t hesitate to get in touch on c.mccarthy@party.coop</p>
                                <p>With best wishes</p>
                                <p><span style="font-size: 18px; font-weight: bold; color: #711f8e;">Claire</span></p>
                                <p><span style="font-weight: normal; color: #711f8e;">Claire McCarthy</span>
                                    <br /><span style="font-weight: normal; color: #711f8e;"> General Secretary</span></p>
                    </textarea>
                </div>
                <div id="tab2">
                    <table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                        <tr>
                            <td align="center" valign="top" bgcolor="#ffffff" style="background-color:#ffffff;">
                                <!-- ### 600PX CONTAINER ### -->
                                <table width="600" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="background-color:#ffffff;margin-top:30px;" class="container">
                                    <tr>
                                        <td id="code-preview" style="font-family:'Open Sans', Calibri, Arial, sans-serif;padding-left:15px;padding-right:15px;padding-top:30px;text-align:left;" class="body-content"> </td>
                                    </tr>
                                    <tr>
                                        <td style="font-family:'Open Sans', Calibri, Arial, sans-serif;padding-left:15px;padding-right:15px;padding-top:30px;">
                                            <p style="color:#10c2ff;font-size:12px;line-height:1.5;"> {{ settings.official_name }}{% if settings.has_address? %} &middot; {{ settings.address.one_line }} {% endif %}
                                                <br/>This email was sent to <a style="color:#1488b9;" href="{{ recipient.email }}">{{ recipient.email }}</a>. To stop receiving emails, <a style="color:#1488b9;" href="{{ settings.site.unsubscribe_url }}">click here</a>. {% if broadcaster.has_twitter? or broadcaster.has_facebook? %}
                                                <br/>You can also keep up with {{ broadcaster.name }} {% if broadcaster.has_twitter? and broadcaster.has_facebook_page? %} on <a style="color:#1488b9;" href="{{ broadcaster.twitter_profile_url }}">Twitter</a> or <a style="color:#1488b9;" href="{{ broadcaster.facebook_page_profile_url }}">Facebook</a>. {% elsif broadcaster.has_twitter? %} on <a style="color:#1488b9;" href="{{ broadcaster.twitter_profile_url }}">Twitter</a>. {% elsif broadcaster.has_facebook_page? %} on <a style="color:#1488b9;" href="{{ broadcaster.facebook_page_profile_url }}">Facebook</a>. {% endif %} {% endif %} </p>
                                            <p style="color:#10c2ff;font-size:12px;line-height:1.5;">Co-operative Party Limited is a registered Society under the Co-operative and Community Benefit Societies Act 2014. Registered no. 30027R.</p>
                                        </td>
                                    </tr>
                                </table>
                                <p style="font-family:'Open Sans', Calibri, Arial, sans-serif;color:#414141;font-size:13px;padding:0;line-height:1.6;text-align:center;">Created with <a href="http://nationbuilder.com" style="color:#1488b9">NationBuilder</a>, software for leaders.</p>
                                <!-- ### 600PX CONTAINER ###  -->
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </div>
        <script>
            $('.tabgroup > div').hide();
            $('.tabgroup > div:first-of-type').show();
            $('.tabs a').click(function (e) {
                e.preventDefault();
                var $this = $(this)
                    , tabgroup = '#' + $this.parents('.tabs').data('tabgroup')
                    , others = $this.closest('li').siblings().children('a')
                    , target = $this.attr('href');
                others.removeClass('active');
                $this.addClass('active');
                $(tabgroup).children('div').hide();
                $(target).show();
            })
            $('#code-preview').html($('#code-field').val().replace(/\n/g, ''));
            $(".copy-btn").click(function () {
                $("#code-field").select();
                document.execCommand('copy');
            });
        </script>
    </body>

    </html>