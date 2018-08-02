<?php
   /*
   Plugin Name: Co-op Party Table of Contents
   Plugin URI: http://party.coop
   Description: Generates a Table of Contents from headings in a post
   Version: 0.1
   Author: Ben West
   Author URI: http://benwest.me
   License: GPL2
   */
   
   /**
 * cd-table-of-contents.php
 */

class TableOfContents {

    /**
     * Counts the occurence of header elements in Wordpress content
     * 
     * @param type $content
     * @return null|boolean|array
     */
    static function hasToc($tiers, $content) {

        $pattern = '/<h[2-' . $tiers . ']*[^>]*>(.*?)<\/h([2-' . $tiers . '])>/';
        $return = array();
        if (empty($content))
            return null;

        if (!preg_match_all($pattern, $content, $return)) {
            return false;
        }
        return $return;
    }

    /**
     * Generates a table of content only when singular pages are being viewed
     * 
     * @param type $tiers
     * @param type $text
     */
    static function generateTableOfContents($tiers, $content, $draw = TRUE, $return = array()) {
global $post;
        (!get_field('show_toc',$post->ID))
            return $content;*/

        // numbers on or off?
        $content = $toc . $content;
        $searches = array();
        $replaces = array();
        $return = (is_array($return) && !empty($return) ) ? $return : TableOfContents::hasToc($tiers, $content);

        if ($draw && !empty($return)):
                $toc = '</div><div class="col-md-4"><div id="toc" class="panel p-2">';
            $toc .= "<h4>Table of Contents</h4>";
            $toc .= "<div class=\"parent start\">";
            $tags = reset($return);
            $titles = $return[1];
            $levels = end($return);
            $_level = 2;
            $chapters = array('0','0','0','0','0','0');

            $count = 0;
            foreach ($tags as $i => $htag) {
                $count++;
                $attributes = array();
                $href = $count;
                $newId = 'id="' . $href . '"';
                $newhtag = $newId. '>';
                $htagr = str_replace('>' . $titles[$i], "\t" . $newhtag  . $titles[$i], $htag);
                $searches[] = $htag;
                $replaces[] = $htagr;


                if ((int)$levels[$i] === (int)$_level):
                        $toc .= '<li class="nav-item"><a class="nav-link" href="#' . $href . '">' . $titles[$i] . '</a></li>';
                endif;

                if ($levels[$i] > $_level) {
                    $_steps = ((int) $levels[$i] - (int) $_level);

                    for ($j = 0; $j < $_steps; $j++):
                        $toc .= '<ul class="nav flex-column" role="tablist">';
                        $chapters[$levels[$i]-1+$j] = (int)$chapters[$levels[$i]-1+$j]+1;
                        $_level++;
                    endfor;
                    $chapter = implode('.', array_slice($chapters, 1, ($levels[$i]-1)  ) );
                        $toc .= '<li class="nav-item"><a class="nav-link" href="#' . $href . '">' . $titles[$i] . '</a></li>';
                }

                if ($levels[$i] < $_level) {

                    $_steps = ((int) $_level - (int) $levels[$i]);
                    $chapters[$levels[$i]-1] = (int)$chapters[$levels[$i]-1]+1;
                    $_olevel = $_level;
                    for ($j = 0; $j < $_steps; $j++):
                        $chapters[$levels[$i]+$j] = 0;
                        $toc .= '</ul>';
                        $_level--;
                    endfor;

                    $chapters[$_olevel-1] = 0;
                    $chapter = implode('.', array_slice($chapters, 1, ($levels[$i]-1)  ) );

                        $toc .= '<li class="nav-link"><a class="nav-link" href="#' . $href . '">' . $titles[$i] . '</a></li>';
                }
            }
            $toc .= '</div>';
            $toc .= '</div>';
            $content = str_replace($searches, $replaces, $content);
            $content = $content . $toc;
        endif;

        return $content;
    }

    /**
     * Appends the table of content to the $content
     * AKA. Executes our filter
     * 
     * @param type $content
     * @return type
     */
    static function writeToc($content) {

        $content = TableOfContents::generateTableOfContents(4, $content, TRUE);
        return $content;
    }

}

add_filter('the_content', array('TableOfContents', 'writeTOC'));
   
   
   
?>