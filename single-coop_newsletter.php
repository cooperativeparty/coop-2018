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
    <?php if( current_user_can('editor')) :  ?>
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
                <h1>Newsletter Generator</h1>
                <h3>How to use</h3>
                <ul>
                    <li>This tool automatically generates the HTML required to produce a newsletter, saving time and effort</li>
                    <li>The introductory paragraph, footer and other content
                        <?php edit_post_link('can be edited here', '', ''); ?>)</li>
                    <li>The headlines, link and intro paragraphs of each news story are taken from the blog posts you select, and added in</li>
                    <li>To use, simply copy the generated code into NationBuilder. You can then use the visual editor to make any tweaks or customisation to text</li>
                </ul>
                <p></p>
                <ul class="tabs clearfix" data-tabgroup="first-tab-group">
                    <li><a href="#tab1" class="active">Html Code</a></li>
                    <li><a href="#tab2">Preview</a></li>
                </ul>
                <section id="first-tab-group" class="tabgroup">
                    <div id="tab1">
                        <p>
                            <button class="copy-btn">Copy text to clipboard</button> <a href=" <?php get_edit_post_link(); ?>">Edit this</a> </p>
                        <textarea id="code-field" readonly="true" style="width:100%; height: 100%;">
                            <?php if(get_field('newsletter_hint')):?> <small style="font-size:9px; color:#ccc"><?php echo get_field('newsletter_hint');?></small>
                                <?php endif;?>
                                    <p><span style="font-size: 18px; font-weight: bold; color: #711f8e;">Dear {{ recipient.first_name_or_friend }}</span></p>
                                    <div style="background-color:#f4f4f4; border:1px solid #ccc; padding:10px; margin-bottom:15px;">
                                        <div>
                                            <?php echo get_field('newsletter_intro');?>
                                        </div>
                                    </div>
                                    <hr />
                                    <?php
                        $newsletter_type = get_field('newsletter_type');
                        
                        if( $newsletter_type && in_array('action', $newsletter_type) ): ?>
                                        <p>
                                            <center>
                                                <table border="0" cellpadding="0" cellspacing="0" style="background-color:#Eb3000;border-radius:5px;">
                                                    <tr>
                                                        <td align="center" valign="middle" style="color:#FFFFFF;font-weight:bold;width:80%;line-height:150%; padding-top:15px; padding-right:30px; padding-bottom:15px; padding-left:30px;">
                                                            <a href="<?php echo get_field('newsletter_cta');?>" target="_blank" style="color:#FFFFFF; text-decoration:none;">
                                                                <?php echo get_field('newsletter_cta_text');?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </center>
                                        </p>
                                        <hr />
                                        <?php endif;
                        if( $newsletter_type && in_array('newsletter', $newsletter_type) ): 
$posts = get_field('newsletter_items');
if( $posts ):
foreach( $posts as $post):
setup_postdata($post); ?>
                                            <h3 style="color:#007ea9"><?php the_title();?></h3>
                                            <p>
                                                <?php echo get_the_excerpt();?>
                                            </p>
                                            <p><a href="<?php the_permalink();?>">Read more</a></p>
                                            <hr/>
                                            <?php endforeach; ?>
                                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                                    <?php endif; 
                        endif;
                        ?>
                                                        <div>
                                                            <?php echo get_field('newsletter_footer');?>
                                                        </div>
                                                        <p><strong style="font-weight: bold; color: #711f8e;"> <?php echo get_field('newsletter_sign-off');?></strong>
                                                            <br /><span style="font-weight: normal; color: #711f8e;"> <?php echo get_field('newsletter_title');?></span></p>
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
        <?php endif;?>