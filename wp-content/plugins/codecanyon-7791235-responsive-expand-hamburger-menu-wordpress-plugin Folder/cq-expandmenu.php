<?php
/*
Plugin Name: Responsive Expand Hamburger Menu WordPress Plugin
Description: Help you to add a Responsive Expand Hamburger to your WordPress, you can choose the menu color, position, align and link etc in the backend.
Author: Sike
Version: 1.0
Author URI: http://codecanyon.net/user/sike?ref=sike
*/

if (!class_exists( 'CQ_Expand_Menu' ) ) {

class CQ_Expand_Menu {
    function CQ_Expand_Menu() {
        add_action( 'admin_init', array( &$this, 'admin_init' ) );
        add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
        add_action( 'wp_footer', array( &$this, 'add_content_frontend' ) );
    }

    function admin_init() {
        register_setting( 'cq-expandmenu', 'cq_expandmenu_item');
        register_setting( 'cq-expandmenu', 'cq_expandmenu_setting');
    }


    // Add Admin menu option
    function admin_menu() {
        wp_enqueue_style('cq_expandmenu_admin_css', plugins_url('css/cq_expandmenu.admin.css', __FILE__));
        add_submenu_page( 'options-general.php', 'expandmenu Setting',
            'Expand Menu', 'manage_options', 'cq_expandmenu', array( &$this, 'options_panel' ) );
    }



    // add the content to the frontend
    function add_content_frontend() {
        $cq_expandmenu_setting = get_option('cq_expandmenu_setting');
        $cq_expandmenu_postid = explode(',',  $cq_expandmenu_setting["postid"]);
        $cq_expandmenu_homeonly = null;
        if(isset($cq_expandmenu_setting["homeonly"])){
            $cq_expandmenu_homeonly = $cq_expandmenu_setting["homeonly"];
        }
        if(!isset($cq_expandmenu_setting["alive"])) $cq_expandmenu_setting["alive"] = '';
        $cq_expandmenu_alive = $cq_expandmenu_setting["alive"];
        if($cq_expandmenu_alive!=""){
            if($cq_expandmenu_homeonly){
               if(is_home()){
                    $this->cq_expandmenu_content();
               }
            }else{
                if($cq_expandmenu_postid[0]!=""){
                    if(is_single($cq_expandmenu_postid)||is_page($cq_expandmenu_postid)){
                        $this->cq_expandmenu_content();
                    }
                }else if (!is_admin()&&!is_feed()&&!is_trackback() ) {
                        $this->cq_expandmenu_content();
                }
            }
        }
    }

    function cq_expandmenu_content(){
        $_frontend_output = $this->output_content(false);
        echo html_entity_decode($_frontend_output);
    }

    function options_panel() {
        wp_enqueue_media();
        wp_enqueue_style( 'wp-color-picker' );
        // wp_enqueue_script( 'wp-color-picker' );
        wp_enqueue_script('cq_expandmenu_admin_js', plugins_url('js/cq_expandmenu.admin.js', __FILE__), array('jquery', 'jquery-ui-core', 'jquery-ui-sortable', 'wp-color-picker'));

        $cq_expandmenu_item = get_option('cq_expandmenu_item');
        $cq_expandmenu_setting = get_option('cq_expandmenu_setting');
        if(!isset($cq_expandmenu_setting["themenu"])) $cq_expandmenu_setting["themenu"] = 'Menu';
        if(!isset($cq_expandmenu_setting["homeonly"])) $cq_expandmenu_setting["homeonly"] = 'off';
        if(!isset($cq_expandmenu_setting["postid"])) $cq_expandmenu_setting["postid"] = '';
        if(!isset($cq_expandmenu_setting["alive"])) $cq_expandmenu_setting["alive"] = 'on';
        if(!isset($cq_expandmenu_setting["slidebody"])) $cq_expandmenu_setting["slidebody"] = 'off';
        if(!isset($cq_expandmenu_setting["opacity"])) $cq_expandmenu_setting["opacity"] = '0.8';
        if(!isset($cq_expandmenu_setting["menuwidth"])) $cq_expandmenu_setting["menuwidth"] = '64';
        if(!isset($cq_expandmenu_setting["menustyle"])) $cq_expandmenu_setting["menustyle"] = 'fullwidth';
        if(!isset($cq_expandmenu_setting["positiontop"])) $cq_expandmenu_setting["positiontop"] = '';
        if(!isset($cq_expandmenu_setting["positionright"])) $cq_expandmenu_setting["positionright"] = '';
        if(!isset($cq_expandmenu_setting["positionleft"])) $cq_expandmenu_setting["positionleft"] = '';
        if(!isset($cq_expandmenu_setting["linktarget"])) $cq_expandmenu_setting["linktarget"] = '_self';
        if(!isset($cq_expandmenu_setting["textalign"])) $cq_expandmenu_setting["textalign"] = 'center';
        if(!isset($cq_expandmenu_setting["menuheight"])) $cq_expandmenu_setting["menuheight"] = '24';
        if(!isset($cq_expandmenu_setting["menucolor"])) $cq_expandmenu_setting["menucolor"] = '#FFF';
        if(!isset($cq_expandmenu_setting["background"])) $cq_expandmenu_setting["background"] = '#1e73be';
        if(!isset($cq_expandmenu_setting["linkcolor"])) $cq_expandmenu_setting["linkcolor"] = '#FFF';
        if(!isset($cq_expandmenu_setting["linkhovercolor"])) $cq_expandmenu_setting["linkhovercolor"] = '#666';
        if(!isset($cq_expandmenu_setting["linkhoverbackground"])) $cq_expandmenu_setting["linkhoverbackground"] = '#FFF';

        $expandmenu_style_arr = array(
            array(
                'text' => 'fullwidth',
                'value' => 'effect_fullwidth'
            ),
            array(
                'text' => 'right',
                'value' => 'effect_right'
            ),
            array(
                'text' => 'left',
                'value' => 'effect_left'
            ),
            array(
                'text' => 'center',
                'value' => 'effect_center'
            )
        );
        $expandmenu_target_arr = array(
            array(
                'text' => '_self',
                'value' => '_self'
            ),
            array(
                'text' => '_blank',
                'value' => '_blank'
            )
        );
        $expandmenu_textalign_arr = array(
            array(
                'text' => 'center',
                'value' => 'center'
            ),
            array(
                'text' => 'left',
                'value' => 'left'
            ),
            array(
                'text' => 'right',
                'value' => 'right'
            )
        );


        echo '<div class="cq-expandmenu-wrap cq-expandmenu-container">
               <div class="wrap">
                <h2>Customize the Expand Menu</h2>
                <form name="dofollow" action="options.php" method="post" id="expandmenu-form">
                <ul id="cq-expandmenu-admin-container"><li></li>';
        settings_fields('cq-expandmenu');
        $i = -1;
        $output = '';
        if($cq_expandmenu_item){
            foreach ($cq_expandmenu_item["menutext"] as $index => $menutext) {
                $i++;
                $output .= '<li class="content-item">';
                $output .= 'Icon (optional):<input type="text" class="tiny-text widefat" name="cq_expandmenu_item[icon]" data-name="cq_expandmenu_item[icon]" autocomplete="off" value="'.htmlspecialchars($cq_expandmenu_item["icon"][$index][0]).'" />';
                $output .= 'Menu text:<input type="text" class="small-text widefat" name="cq_expandmenu_item[menutext]" data-name="cq_expandmenu_item[menutext]" autocomplete="off" value="'.htmlspecialchars($cq_expandmenu_item["menutext"][$index][0]).'" />';
                $output .= 'Link:<input type="text" class="large-text widefat" name="cq_expandmenu_item[link]" data-name="cq_expandmenu_item[link]" autocomplete="off" value="'.$cq_expandmenu_item["link"][$index][0].'" />';
                $output .= '<a class="remove-item" href="#" title="Remove this item"></a> </li>';
                $output .= '</li>';
            }


        }else{
            $output .= '';
            $output .= '<li class="content-item">';
            $output .= 'Icon (optional):<input type="text" class="tiny-text widefat" name="cq_expandmenu_item[icon]" data-name="cq_expandmenu_item[icon]" autocomplete="off" value="fa-user" /> Menu Text:<input type="text" class="small-text widefat" name="cq_expandmenu_item[menutext]" data-name="cq_expandmenu_item[menutext]" autocomplete="off" value="Visit My Profile" />';
            $output .= 'Link:<input type="text" class="large-text widefat" name="cq_expandmenu_item[link]" data-name="cq_expandmenu_item[link]" autocomplete="off" value="http://codecanyon.net/user/sike/" />';
            $output .= '</li>';
        }
        $output .= '</ul>';
        $output .= '<br /><a class="button add-content" id="add-content" href="#">Add Menu</a> <input class="button button-primary" type="submit" name="Submit" value="Save" /> <span class="cq-expandmenu-previewnote">(you can drag the item to re-order)</span>';
        // the settings
        $output .= '<br /><h4 class="cq-expandmenu-setting-title">Settings:</h4>';
        $output .= '<div class="cq-expandmenu-setting-container">';
        $output .= '<span class="setting-item"><span class="setting-item-label">Hamburger menu text:</span> <input class="small-text widefat" name="cq_expandmenu_setting[themenu]" type="text" value="'.$cq_expandmenu_setting["themenu"].'" /> (You may have to change the menu width below after updating the text).</span>';
        $output.='<br /><span class="setting-item"><span class="setting-item-label">Display the menus at:</span></span><select name="cq_expandmenu_setting[menustyle]" data-name="cq_expandmenu_setting[menustyle]">';
        for( $i=0; $i<count($expandmenu_style_arr); $i++ ) {
            $output .= '<option '
                 . ( $cq_expandmenu_setting["menustyle"] == $expandmenu_style_arr[$i]['value'] ? 'selected="selected"' : '' ) . ' value="'.$expandmenu_style_arr[$i]['value'].'">'
                 . $expandmenu_style_arr[$i]['text']
                 . '</option>';
        }
        $output.='</select>';
        $output .= '<br /><span class="setting-item"><span class="setting-item-label">Menu position top:</span> <input class="smallest-text widefat" name="cq_expandmenu_setting[positiontop]" type="text" value="'.$cq_expandmenu_setting["positiontop"].'" /> position right: <input class="smallest-text widefat" name="cq_expandmenu_setting[positionright]" type="text" value="'.$cq_expandmenu_setting["positionright"].'" />  position left: <input class="smallest-text widefat" name="cq_expandmenu_setting[positionleft]" type="text" value="'.$cq_expandmenu_setting["positionleft"].'" /> (Leave them to blank if the default position work fine for you).</span>';

        $output.='<br /><span class="setting-item"><span class="setting-item-label">How to open the link:</span></span><select name="cq_expandmenu_setting[linktarget]" data-name="cq_expandmenu_setting[linktarget]">';
        for( $i=0; $i<count($expandmenu_target_arr); $i++ ) {
            $output .= '<option '
                 . ( $cq_expandmenu_setting["linktarget"] == $expandmenu_target_arr[$i]['value'] ? 'selected="selected"' : '' ) . ' value="'.$expandmenu_target_arr[$i]['value'].'">'
                 . $expandmenu_target_arr[$i]['text']
                 . '</option>';
        }
        $output.='</select>';
        $output.='<br /><span class="setting-item"><span class="setting-item-label">Menu text align:</span></span><select name="cq_expandmenu_setting[textalign]" data-name="cq_expandmenu_setting[textalign]">';
        for( $i=0; $i<count($expandmenu_textalign_arr); $i++ ) {
            $output .= '<option '
                 . ( $cq_expandmenu_setting["textalign"] == $expandmenu_textalign_arr[$i]['value'] ? 'selected="selected"' : '' ) . ' value="'.$expandmenu_textalign_arr[$i]['value'].'">'
                 . $expandmenu_textalign_arr[$i]['text']
                 . '</option>';
        }
        $output.='</select>';
        $output .= '<br /><span class="setting-item"><span class="setting-item-label">Hamburger menu color:</span> <input class="smallest-text widefat cq-color-input" name="cq_expandmenu_setting[menucolor]" type="text" value="'.$cq_expandmenu_setting["menucolor"].'" /> </span>';
        $output .= '<span class="setting-item"><span class="setting-item-label">Hamburger menu background:</span> <input class="smallest-text widefat cq-color-input" name="cq_expandmenu_setting[background]" type="text" value="'.$cq_expandmenu_setting["background"].'" /> </span>';
        $output .= '<br /><span class="setting-item"><span class="setting-item-label">Link color:</span> <input class="smallest-text widefat cq-color-input" name="cq_expandmenu_setting[linkcolor]" type="text" value="'.$cq_expandmenu_setting["linkcolor"].'" /> </span>';
        $output .= '<span class="setting-item"><span class="setting-item-label">Link hover color:</span> <input class="smallest-text widefat cq-color-input" name="cq_expandmenu_setting[linkhovercolor]" type="text" value="'.$cq_expandmenu_setting["linkhovercolor"].'" /> </span>';
        $output .= '<span class="setting-item"><span class="setting-item-label">Link hover background color:</span> <input class="smallest-text widefat cq-color-input" name="cq_expandmenu_setting[linkhoverbackground]" type="text" value="'.$cq_expandmenu_setting["linkhoverbackground"].'" /> </span>';
        $output .= '<br /><span class="setting-item"><span class="setting-item-label">Menu opacity:</span> <input class="smallest-text widefat" name="cq_expandmenu_setting[opacity]" type="text" value="'.$cq_expandmenu_setting["opacity"].'" /></span>';
        $output .= '<br /><span class="setting-item"><span class="setting-item-label">Hamburger menu width:</span> <input class="smallest-text widefat" name="cq_expandmenu_setting[menuwidth]" type="text" value="'.$cq_expandmenu_setting["menuwidth"].'" /> (For example, update this with a larger value if your menu contains a lot of text).</span>';
        $output .= '<br /><span class="setting-item"><span class="setting-item-label">Hamburger menu height:</span> <input class="smallest-text widefat" name="cq_expandmenu_setting[menuheight]" type="text" value="'.$cq_expandmenu_setting["menuheight"].'" /> (You may have to change this in some of the theme).</span>';
        $output .= '<br /><span class="setting-item"><span class="setting-item-label">Display on these post/page only:</span> <input class="small-text widefat" name="cq_expandmenu_setting[postid]" type="text" value="'.$cq_expandmenu_setting["postid"].'" /> (Put the post/page ID or slug here, support multiple post, divide by comma).</span>';
        // $output .= 'Do not show it again for: <input name="cq_expandmenu_setting[days]" class="smallest-text" type="text" value="'.$cq_expandmenu_setting["days"].'" /> days';

        $output .= '<br /><span class="setting-item"><span class="setting-item-label">Display on home page only? </span><input class="cq-expandmenu-checkbox" name="cq_expandmenu_setting[homeonly]" type="checkbox"'.checked('on', $cq_expandmenu_setting["homeonly"], false).'/></span> (Check this if you want to display the menus in your WordPress home page only).';
        // $output .= '<br /><span class="setting-item"><span class="setting-item-label">Show a close button on the upper right? <input class="cq-expandmenu-checkbox" name="cq_expandmenu_setting[closebtn]" type="checkbox"'.checked('on', $cq_expandmenu_setting["closebtn"], false).'/> (Note:</span> the close button will be always visible in backend)</span>';
        $output .= '<br /><span class="setting-item"><span class="setting-item-label">Put this alive in your WordPress frontend now? </span><input class="cq-expandmenu-checkbox" name="cq_expandmenu_setting[alive]" type="checkbox"'.checked('on', $cq_expandmenu_setting["alive"], false).'/> (un-check will not show this Expand Menu in your WordPress frontend).</span>';
        $output .= '<br /><span class="setting-item"><span class="setting-item-label">Slide the body when toggle menu? </span><input class="cq-expandmenu-checkbox" name="cq_expandmenu_setting[slidebody]" type="checkbox"'.checked('on', $cq_expandmenu_setting["slidebody"], false).'/> (Check to work when menu on the left or right).</span>';

        $output .= '</div>';
        $output .= '<br /><input class="button button-primary" type="submit" name="Submit" value="Save" />';
        $output .= ' <span class="cq-expandmenu-previewnote">(live preview available after saving)</span>';
        $output .= '<br /><br /><span class="cq-expandmenu-previewnote">Note: the menu style is effected by your theme, so please use here as hint only, keep focus on your WordPress frontend. </span>';
        $output .= '<br /><span class="cq-expandmenu-previewnote">You can see the documentation come with the plugin package for more information. And <a href="http://codecanyon.net/user/sike?ref=sike">visit my profile</a> at CodeCanyon for more works. You can see all the available Font Awesome icons from: <a href="http://fortawesome.github.io/Font-Awesome/icons/">http://fortawesome.github.io/Font-Awesome/icons/</a></span>';
        $output .= '</form>';
        $output .= '</div>';
        $output .= '</div>';

        $_frontend_output = $this->output_content(true);

        echo $output.$_frontend_output;

    }

    function output_content($_isadmin){
        $cq_expandmenu_item = get_option('cq_expandmenu_item');
        $cq_expandmenu_setting = get_option('cq_expandmenu_setting');
        if(!isset($cq_expandmenu_setting["slidebody"])) $cq_expandmenu_setting["slidebody"] = 'off';
        $frontend_output = '';
        if($cq_expandmenu_item){
            wp_register_style( 'font-awesome', plugins_url('css/font-awesome.min.css', __FILE__) );
            wp_enqueue_style( 'font-awesome' );
            wp_register_script('expandmenu_init', plugins_url('js/jquery.expandmenu_init.min.js', __FILE__), array('jquery'));
            wp_enqueue_script('expandmenu_init');
            wp_register_style( 'cq-expand-menu', plugins_url('css/style.css', __FILE__) );
            wp_enqueue_style( 'cq-expand-menu' );
            if($cq_expandmenu_item){
                if($cq_expandmenu_setting["menustyle"]=="effect_left"){
                    wp_register_style( 'cq-expand-menu-effect', plugins_url('css/effect_left.css', __FILE__), array('cq-expand-menu') );
                    wp_enqueue_style( 'cq-expand-menu-effect' );
                }else if($cq_expandmenu_setting["menustyle"]=="effect_right"){
                    wp_register_style( 'cq-expand-menu-effect', plugins_url('css/effect_right.css', __FILE__), array('cq-expand-menu') );
                    wp_enqueue_style( 'cq-expand-menu-effect' );

                }else if($cq_expandmenu_setting["menustyle"]=="effect_center"){
                    wp_register_style( 'cq-expand-menu-effect', plugins_url('css/effect_center.css', __FILE__), array('cq-expand-menu') );
                    wp_enqueue_style( 'cq-expand-menu-effect' );
                }else{
                    wp_register_style( 'cq-expand-menu-effect', plugins_url('css/effect_fullwidth.css', __FILE__), array('cq-expand-menu') );
                    wp_enqueue_style( 'cq-expand-menu-effect' );

                }
                $frontend_output .= '<input type="checkbox" id="expandmenu-checkbox" class="expandmenu-checkbox-invisible" />';
                $frontend_output .= '<nav class="expandmenu-side" style="background:'.$cq_expandmenu_setting["background"].';width:'.$cq_expandmenu_setting["menuwidth"].';height:'.$cq_expandmenu_setting["menuheight"].';" data-background="'.$cq_expandmenu_setting["background"].'" data-color="'.$cq_expandmenu_setting["menucolor"].'" data-width="'.$cq_expandmenu_setting["menuwidth"].'" data-height="'.$cq_expandmenu_setting["menuheight"].'" data-opacity="'.$cq_expandmenu_setting["opacity"].'" data-linkcolor="'.$cq_expandmenu_setting["linkcolor"].'" data-linkhovercolor="'.$cq_expandmenu_setting["linkhovercolor"].'" data-linkhoverbackground="'.$cq_expandmenu_setting["linkhoverbackground"].'" data-positiontop="'.$cq_expandmenu_setting["positiontop"].'" data-positionright="'.$cq_expandmenu_setting["positionright"].'" data-positionleft="'.$cq_expandmenu_setting["positionleft"].'" data-textalign="'.$cq_expandmenu_setting["textalign"].'" data-slidebody="'.$cq_expandmenu_setting["slidebody"].'" data-menustyle="'.$cq_expandmenu_setting["menustyle"].'">';
                $frontend_output .= '<label for="expandmenu-checkbox" class="fa fa-bars expandmenu-label"> <span class="expandmenu-labeltext">'.$cq_expandmenu_setting["themenu"].'</span> </label>';
                $frontend_output .= '<ul class="expandmenu-list">';
                foreach ($cq_expandmenu_item["menutext"] as $index => $menutext) {
                    $frontend_output .= '<li>';
                    if($cq_expandmenu_item["icon"][$index][0]!=""){
                        $frontend_output .= '<a href="'.$cq_expandmenu_item["link"][$index][0].'" target="'.$cq_expandmenu_setting["linktarget"].'"><i class="fa fa-2x '.$cq_expandmenu_item["icon"][$index][0].'"></i><span class="expandmenu-text">'.$cq_expandmenu_item["menutext"][$index][0].'</span></a>';
                    }else{
                        $frontend_output .= '<a href="'.$cq_expandmenu_item["link"][$index][0].'" target="'.$cq_expandmenu_setting["linktarget"].'">'.$cq_expandmenu_item["menutext"][$index][0].'</a>';
                    }
                    $frontend_output .= '</li>';
                }
                $frontend_output .= '</ul>';
                $frontend_output .= '</nav>';
            }

        }
        return html_entity_decode($frontend_output);
    }

}

    // delete_option( 'cq_expandmenu_item');
    // delete_option( 'cq_expandmenu_setting');
    if(isset($_POST['cq_expandmenu_item'])){
        $cq_expandmenu_item = $_POST['cq_expandmenu_item'];
        $cq_expandmenu_setting = $_POST['cq_expandmenu_setting'];
        add_option( 'cq_expandmenu_item', $cq_expandmenu_item);
        add_option( 'cq_expandmenu_setting', $cq_expandmenu_setting);
    }

    $cq_expandmenu = new CQ_Expand_Menu();
}

?>
