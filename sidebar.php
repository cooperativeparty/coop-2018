<?php
/* Pulls through a sidebar template with name corresponding to current page template. If none exists, sidebar is used.*/
    get_template_part('sidebar-templates/sidebar', get_current_template());    
?>