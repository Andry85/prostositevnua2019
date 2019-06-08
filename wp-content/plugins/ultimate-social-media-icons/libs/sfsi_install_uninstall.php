<?php
function sfsi_update_plugin()
{
    if ($feed_id = get_option('sfsi_feed_id')) {
        if (is_numeric($feed_id)) {
            $sfsiId = SFSI_updateFeedUrl();
            if(false!==$sfsiId){
                update_option('sfsi_feed_id', sanitize_text_field($sfsiId->feed_id));
                update_option('sfsi_redirect_url', esc_url($sfsiId->redirect_url));
            }
        }
    }

    //Install version
    update_option("sfsi_pluginVersion", "2.24");

    if (!get_option('sfsi_serverphpVersionnotification')) {
        add_option("sfsi_serverphpVersionnotification", "yes");
    }
    if (!get_option('sfsi_footer_sec')) {
        add_option('sfsi_footer_sec', 'no');
    }
    /* show notification premium plugin */
    if (!get_option('show_premium_notification')) {
        add_option("show_premium_notification", "yes");
    }

    if (!get_option('show_premium_cumulative_count_notification')) {
        add_option("show_premium_cumulative_count_notification", "yes");
    }

    /*show notification*/
    if (!get_option('show_notification')) {
        add_option("show_notification", "yes");
    }
    /*show notification*/
    if (!get_option('show_new_notification')) {
        add_option("show_new_notification", "no");
    }

    /* show mobile notification */
    if (!get_option('show_mobile_notification')) {
        add_option("show_mobile_notification", "yes");
    }

    if (!get_option('sfsi_languageNotice')) {
        add_option("sfsi_languageNotice", "yes");
    }

    /*Extra important options*/
    if (!get_option('sfsi_instagram_sf_count')) {

        $sfsi_instagram_sf_count = array(
            "date" => strtotime(date("Y-m-d")),
            "sfsi_sf_count" => "",
            "sfsi_instagram_count" => ""
        );
        add_option('sfsi_instagram_sf_count',  serialize($sfsi_instagram_sf_count));
    } else {
        $sfsi_instagram_sf_count = get_option('sfsi_instagram_sf_count',false);
        if(!is_array($sfsi_instagram_sf_count)){
            $sfsi_instagram_sf_count = unserialize(get_option('sfsi_instagram_sf_count',false));
        }
        if(!isset($sfsi_instagram_sf_count["date_sf"]) || !isset($sfsi_instagram_sf_count["date_instagram"])){
            $sfsi_instagram_sf_count["date_sf"] = isset($sfsi_instagram_sf_count["date"])?$sfsi_instagram_sf_count["date"]:'';
            $sfsi_instagram_sf_count["date_instagram"] = isset($sfsi_instagram_sf_count["date"])?$sfsi_instagram_sf_count["date"]:'';
        }
        update_option('sfsi_instagram_sf_count', serialize($sfsi_instagram_sf_count) );
    }

    $option4 = unserialize(get_option('sfsi_section4_options', false));

    if (isset($option4) && !empty($option4)) {
        if (!isset($option4['sfsi_instagram_clientid'])) {
            $option4['sfsi_instagram_clientid'] = '';
            $option4['sfsi_instagram_appurl']   = '';
            $option4['sfsi_instagram_token']    = '';
        }
        if (!isset($option4['sfsi_telegram_countsDisplay'])) {
            $option4['sfsi_telegram_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_telegram_countsFrom'])) {
            $option4['sfsi_telegram_countsFrom'] = "manual";
        }
        if (!isset($option4['sfsi_telegram_manualCounts'])) {
            $option4['sfsi_telegram_manualCounts'] = "20";
        }

        if (!isset($option4['sfsi_vk_countsDisplay'])) {
            $option4['sfsi_vk_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_vk_countsFrom'])) {
            $option4['sfsi_vk_countsFrom'] = "manual";
        }
        if (!isset($option4['sfsi_vk_manualCounts'])) {
            $option4['sfsi_vk_manualCounts'] = "20";
        }

        if (!isset($option4['sfsi_ok_countsDisplay'])) {
            $option4['sfsi_ok_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_ok_countsFrom'])) {
            $option4['sfsi_ok_countsFrom'] = "manual";
        }
        if (!isset($option4['sfsi_ok_manualCounts'])) {
            $option4['sfsi_ok_manualCounts'] = "20";
        }

        if (!isset($option4['sfsi_weibo_countsDisplay'])) {
            $option4['sfsi_weibo_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_weibo_countsFrom'])) {
            $option4['sfsi_weibo_countsFrom'] = "manual";
        }
        if (!isset($option4['sfsi_weibo_manualCounts'])) {
            $option4['sfsi_weibo_manualCounts'] = "20";
        }
        if (!isset($option4['sfsi_wechat_countsDisplay'])) {
            $option4['sfsi_wechat_countsDisplay'] = "no";
        }
        if (!isset($option4['sfsi_wechat_countsFrom'])) {
            $option4['sfsi_wechat_countsFrom'] = "manual";
        }
        if (!isset($option4['sfsi_wechat_manualCounts'])) {
            $option4['sfsi_wechat_manualCounts'] = "20";
        }
        /*Youtube Channelid settings*/
        if (!isset($option4['sfsi_youtube_channelId'])) {
            $option4['sfsi_youtube_channelId'] = '';
        }
    }

    $option3 = unserialize(get_option('sfsi_section3_options', false));

    if (isset($option3) && !empty($option3)) {
        if (!isset($option3['sfsi_mouseOver_effect_type'])) {
            $option3['sfsi_mouseOver_effect_type'] = 'same_icons';
        }

        if (!isset($option3['mouseover_other_icons_transition_effect'])) {
            $option3['mouseover_other_icons_transition_effect'] = 'flip';
        }
    }

    $option2 = unserialize(get_option('sfsi_section2_options', false));

    if (isset($option2) && !empty($option2)) {
        if (!isset($option2['sfsi_youtubeusernameorid'])) {

            $option2['sfsi_youtubeusernameorid']    = '';

            if (isset($option4['sfsi_youtubeusernameorid']) && !empty($option4['sfsi_youtubeusernameorid'])) {
                $option2['sfsi_youtubeusernameorid'] = $option4['sfsi_youtubeusernameorid'];
            }
        }

        if (!isset($option2['sfsi_ytube_chnlid'])) {

            $option2['sfsi_ytube_chnlid']     = '';

            if (isset($option4['sfsi_ytube_chnlid']) && !empty($option4['sfsi_ytube_chnlid'])) {
                $option2['sfsi_ytube_chnlid'] = $option4['sfsi_ytube_chnlid'];
            }
        }
        if(!isset($option2['sfsi_wechatShare_option'])){
            $option2['sfsi_wechatShare_option']="yes";
        }
        if(!isset($option2['sfsi_telegram_message'])){
            $option2['sfsi_telegram_message']="";
        }
        if(!isset($option2['sfsi_telegram_messageName'])){
            $option2['sfsi_telegram_messageName']="";
        }
        if(!isset($option2['sfsi_telegram_username'])){
            $option2['sfsi_telegram_username']="";
        }  
    }

    update_option('sfsi_section4_options', serialize($option4));
    update_option('sfsi_section2_options', serialize($option2));


    $option7 = unserialize(get_option('sfsi_section7_options', false));
    $option7 = isset($option7) && !empty($option7) ? $option7 : array();

    if (!isset($option7['sfsi_show_popup'])) {
        $option7['sfsi_show_popup']                  = 'no';
    }
    if (!isset($option7['sfsi_popup_text'])) {
        $option7['sfsi_popup_text']                  = 'Enjoy this blog? Please spread the word :)';
    }
    if (!isset($option7['sfsi_popup_background_color'])) {
        $option7['sfsi_popup_background_color']      = '#eff7f7';
    }
    if (!isset($option7['sfsi_popup_border_color'])) {
        $option7['sfsi_popup_border_color']          = '#f3faf2';
    }
    if (!isset($option7['sfsi_popup_border_thickness'])) {
        $option7['sfsi_popup_border_thickness']      = '1';
    }
    if (!isset($option7['sfsi_popup_border_shadow'])) {
        $option7['sfsi_popup_border_shadow']         = 'yes';
    }
    if (!isset($option7['sfsi_popup_font'])) {
        $option7['sfsi_popup_font']                  = 'Helvetica,Arial,sans-serif';
    }
    if (!isset($option7['sfsi_popup_fontSize'])) {
        $option7['sfsi_popup_fontSize']              = '30';
    }
    if (!isset($option7['sfsi_popup_fontStyle'])) {
        $option7['sfsi_popup_fontStyle']             = 'normal';
    }
    if (!isset($option7['sfsi_popup_fontColor'])) {
        $option7['sfsi_popup_fontColor']             = '#000000';
    }
    if (!isset($option7['sfsi_Show_popupOn'])) {
        $option7['sfsi_Show_popupOn']                = 'none';
    }
    if (!isset($option7['sfsi_Show_popupOn_PageIDs'])) {
        $option7['sfsi_Show_popupOn_PageIDs']        = '';
    }
    if (!isset($option7['sfsi_Shown_popupOnceTime'])) {
        $option7['sfsi_Shown_popupOnceTime']         = '';
    }
    if (!isset($option7['sfsi_Shown_popuplimitPerUserTime'])) {
        $option7['sfsi_Shown_popuplimitPerUserTime'] = '';
    }

    update_option('sfsi_section7_options', serialize($option7));

    /* subscription form */
    $option8 = unserialize(get_option('sfsi_section8_options', false));
    $option8 = isset($option8) && !empty($option8) ? $option8 : array();

    if (!isset($option8['sfsi_form_adjustment'])) {
        $option8['sfsi_form_adjustment']          = 'yes';
    }
    if (!isset($option8['sfsi_form_height'])) {
        $option8['sfsi_form_height']              = '180';
    }
    if (!isset($option8['sfsi_form_width'])) {
        $option8['sfsi_form_width']               = '230';
    }
    if (!isset($option8['sfsi_form_border'])) {
        $option8['sfsi_form_border']              = 'yes';
    }
    if (!isset($option8['sfsi_form_border_thickness'])) {
        $option8['sfsi_form_border_thickness']    = '1';
    }
    if (!isset($option8['sfsi_form_border_color'])) {
        $option8['sfsi_form_border_color']        = '#b5b5b5';
    }
    if (!isset($option8['sfsi_form_background'])) {
        $option8['sfsi_form_background']          = '#ffffff';
    } //
    if (!isset($option8['sfsi_form_heading_text'])) {
        $option8['sfsi_form_heading_text']        = 'Get new posts by email';
    }
    if (!isset($option8['sfsi_form_heading_font'])) {
        $option8['sfsi_form_heading_font']        = 'Helvetica,Arial,sans-serif';
    }
    if (!isset($option8['sfsi_form_heading_fontstyle'])) {
        $option8['sfsi_form_heading_fontstyle']   = 'bold';
    }
    if (!isset($option8['sfsi_form_heading_fontcolor'])) {
        $option8['sfsi_form_heading_fontcolor']   = '#000000';
    }
    if (!isset($option8['sfsi_form_heading_fontsize'])) {
        $option8['sfsi_form_heading_fontsize']    = '16';
    }
    if (!isset($option8['sfsi_form_heading_fontalign'])) {
        $option8['sfsi_form_heading_fontalign']   = 'center';
    }
    if (!isset($option8['sfsi_form_field_text'])) {
        $option8['sfsi_form_field_text']          = 'Enter your email';
    }
    if (!isset($option8['sfsi_form_field_font'])) {
        $option8['sfsi_form_field_font']          = 'Helvetica,Arial,sans-serif';
    }
    if (!isset($option8['sfsi_form_field_fontstyle'])) {
        $option8['sfsi_form_field_fontstyle']     = 'normal';
    }
    if (!isset($option8['sfsi_form_field_fontcolor'])) {
        $option8['sfsi_form_field_fontcolor']     = '#000000';
    }
    if (!isset($option8['sfsi_form_field_fontsize'])) {
        $option8['sfsi_form_field_fontsize']      = '14';
    }
    if (!isset($option8['sfsi_form_field_fontalign'])) {
        $option8['sfsi_form_field_fontalign']     = 'center';
    }
    if (!isset($option8['sfsi_form_button_text'])) {
        $option8['sfsi_form_button_text']         = 'Subscribe';
    }
    if (!isset($option8['sfsi_form_button_font'])) {
        $option8['sfsi_form_button_font']         = 'Helvetica,Arial,sans-serif';
    }
    if (!isset($option8['sfsi_form_button_fontstyle'])) {
        $option8['sfsi_form_button_fontstyle']    = 'bold';
    }
    if (!isset($option8['sfsi_form_button_fontcolor'])) {
        $option8['sfsi_form_button_fontcolor']    = '#000000';
    }
    if (!isset($option8['sfsi_form_button_fontsize'])) {
        $option8['sfsi_form_button_fontsize']     = '16';
    }
    if (!isset($option8['sfsi_form_button_fontalign'])) {
        $option8['sfsi_form_button_fontalign']    = 'center';
    }
    if (!isset($option8['sfsi_form_button_background'])) {
        $option8['sfsi_form_button_background'] =  '#dedede';
    }

    update_option('sfsi_section8_options', serialize($option8));


    /*Float Icon setting*/
    $option5 = unserialize(get_option('sfsi_section5_options', false));

    $sfsi_show_via_widget           = 'no';

    $sfsi_icons_float               = 'no';
    $sfsi_icons_floatPosition       = 'center-right';
    $sfsi_icons_floatMargin_top     = '';
    $sfsi_icons_floatMargin_bottom  = '';
    $sfsi_icons_floatMargin_left    = '';
    $sfsi_icons_floatMargin_right   = '';
    $sfsi_disable_floaticons        = 'no';

    $sfsi_show_via_shortcode        = 'no';
    $sfsi_show_via_afterposts       = 'no';


    if (isset($option5) && !empty($option5)) {
        if (isset($option5['sfsi_icons_float'])) {
            $sfsi_icons_float               = $option5['sfsi_icons_float'];
            unset($option5['sfsi_icons_float']);
        }

        if (isset($option5['sfsi_icons_floatPosition'])) {
            $sfsi_icons_floatPosition       = $option5['sfsi_icons_floatPosition'];
            unset($option5['sfsi_icons_floatPosition']);
        }

        if (isset($option5['sfsi_icons_floatMargin_top'])) {
            $sfsi_icons_floatMargin_top     = $option5['sfsi_icons_floatMargin_top'];
            unset($option5['sfsi_icons_floatMargin_top']);
        }

        if (isset($option5['sfsi_icons_floatMargin_bottom'])) {
            $sfsi_icons_floatMargin_bottom  = $option5['sfsi_icons_floatMargin_bottom'];
            unset($option5['sfsi_icons_floatMargin_bottom']);
        }

        if (isset($option5['sfsi_icons_floatMargin_left'])) {
            $sfsi_icons_floatMargin_left    = $option5['sfsi_icons_floatMargin_left'];
            unset($option5['sfsi_icons_floatMargin_left']);
        }

        if (isset($option5['sfsi_icons_floatMargin_right'])) {
            $sfsi_icons_floatMargin_right   = $option5['sfsi_icons_floatMargin_right'];
            unset($option5['sfsi_icons_floatMargin_right']);
        }

        if (isset($option5['sfsi_disable_floaticons'])) {
            $sfsi_disable_floaticons        = $option5['sfsi_disable_floaticons'];
            unset($option5['sfsi_disable_floaticons']);
        }
        if (!isset($option5['sfsi_custom_social_hide'])) {
            $option5['sfsi_custom_social_hide']    = 'no';
        }

        if (!isset($option5['sfsi_telegramIcon_order'])) {
            $option5['sfsi_telegramIcon_order']    = '11';
        }
        if (!isset($option5['sfsi_vkIcon_order'])) {
            $option5['sfsi_vkIcon_order']    = '12';
        }
        if (!isset($option5['sfsi_okIcon_order'])) {
            $option5['sfsi_okIcon_order']    = '13';
        }
        if (!isset($option5['sfsi_weiboIcon_order'])) {
            $option5['sfsi_weiboIcon_order']    = '14';
        }
        if (!isset($option5['sfsi_wechatIcon_order'])) {
            $option5['sfsi_wechatIcon_order']    = '15';
        }
        if (!isset($option5['sfsi_telegram_MouseOverText'])) {
            $option5['sfsi_telegram_MouseOverText']    = 'Telegram';
        }
        if (!isset($option5['sfsi_vk_MouseOverText'])) {
            $option5['sfsi_vk_MouseOverText']    = 'VK';
        }
        if (!isset($option5['sfsi_ok_MouseOverText'])) {
            $option5['sfsi_ok_MouseOverText']    = 'OK';
        }
        if (!isset($option5['sfsi_weibo_MouseOverText'])) {
            $option5['sfsi_weibo_MouseOverText']    = 'Weibo';
        }
        if (!isset($option5['sfsi_wechat_MouseOverText'])) {
            $option5['sfsi_wechat_MouseOverText']    = 'WeChat';
        }
        if (!isset($option5['sfsi_wechat_MouseOverText'])) {
            $option5['sfsi_wechat_MouseOverText']    = 'WeChat';
        }
        
        if (!isset($option5['sfsi_pplus_icons_suppress_errors'])) {

            $sup_errors = "no";
            $sup_errors_banner_dismissed = true;

            if (defined('WP_DEBUG') && false != WP_DEBUG) {
                $sup_errors = 'yes';
                $sup_errors_banner_dismissed = false;
            }

            $option5['sfsi_pplus_icons_suppress_errors'] = $sup_errors;
            update_option('sfsi_pplus_error_reporting_notice_dismissed', $sup_errors_banner_dismissed);
        }
    }

    update_option('sfsi_section5_options', serialize($option5));

    $option6 =  unserialize(get_option('sfsi_section6_options', false));

    if (isset($option6) && !empty($option6)) {
        if (!isset($option6['sfsi_rectpinit'])) {
            $option6['sfsi_rectpinit'] = 'no';
        }
        if (!isset($option6['sfsi_rectfbshare'])) {
            $option6['sfsi_rectfbshare'] = 'no';
        }

        update_option('sfsi_section6_options', serialize($option6));
    }


    // Setting default values for Question 3
    $option9 = unserialize(get_option('sfsi_section9_options', false));
    $option9 = isset($option9) && !empty($option9) ? $option9 : array();

    if (!isset($option9['sfsi_show_via_widget'])) {

        if (class_exists('Sfsi_Widget')) {
            $widegtObj            = new Sfsi_Widget();
            $sfsi_show_via_widget = is_active_widget(false, false, $widegtObj->id_base, true) ? "yes" : "no";
        }
        $option9['sfsi_show_via_widget'] = $sfsi_show_via_widget;
    }

    if (!isset($option9['sfsi_show_via_shortcode'])) {
        $option9['sfsi_show_via_shortcode']       = $sfsi_show_via_shortcode;
    }
    if (!isset($option9['sfsi_show_via_afterposts'])) {
        $option9['sfsi_show_via_afterposts']      = $sfsi_show_via_afterposts;
    }
    if (!isset($option9['sfsi_icons_float'])) {
        $option9['sfsi_icons_float']              = $sfsi_icons_float;
    }
    if (!isset($option9['sfsi_icons_floatPosition'])) {
        $option9['sfsi_icons_floatPosition']      = $sfsi_icons_floatPosition;
    }
    if (!isset($option9['sfsi_icons_floatMargin_top'])) {
        $option9['sfsi_icons_floatMargin_top']    = $sfsi_icons_floatMargin_top;
    }
    if (!isset($option9['sfsi_icons_floatMargin_bottom'])) {
        $option9['sfsi_icons_floatMargin_bottom'] = $sfsi_icons_floatMargin_bottom;
    }
    if (!isset($option9['sfsi_icons_floatMargin_left'])) {
        $option9['sfsi_icons_floatMargin_left']   = $sfsi_icons_floatMargin_left;
    }
    if (!isset($option9['sfsi_icons_floatMargin_right'])) {
        $option9['sfsi_icons_floatMargin_right']  = $sfsi_icons_floatMargin_right;
    }
    if (!isset($option9['sfsi_disable_floaticons'])) {
        $option9['sfsi_disable_floaticons']       = $sfsi_disable_floaticons;
    }

    update_option('sfsi_section9_options', serialize($option9));

    $option1 = unserialize(get_option('sfsi_section1_options', false));
    if(!isset($option1['sfsi_telegram_display'])){
        $option1['sfsi_telegram_display']="no";
    }
    if(!isset($option1['sfsi_vk_display'])){
        $option1['sfsi_vk_display']="no";
    }
    if(!isset($option1['sfsi_ok_display'])){
        $option1['sfsi_ok_display']="no";
    }
    if(!isset($option1['sfsi_wechat_display'])){
        $option1['sfsi_wechat_display']="no";
    }
    if(!isset($option1['sfsi_weibo_display'])){
        $option1['sfsi_weibo_display']="no";
    }
    if(!isset($option1['sfsi_telegram_display'])){
        $option1['sfsi_vk_display']="no";
    }
    if(!isset($option1['sfsi_telegram_display'])){
        $option1['sfsi_vk_display']="no";
    }
    update_option('sfsi_section1_options', serialize($option1));
    // Add this removed in version 2.0.2, removing values from section 1 & section 6 & setting notice display value
    sfsi_was_displaying_addthis();
}

function sfsi_activate_plugin()
{



    add_option('sfsi_plugin_do_activation_redirect', true);

    /* check for CURL enable at server */
    curl_enable_notice();

    if (!get_option('show_new_notification')) {
        add_option("show_new_notification", "yes");
    }

    if (!get_option('show_premium_cumulative_count_notification')) {
        add_option("show_premium_cumulative_count_notification", "yes");
    }

    $option1 = unserialize(get_option('sfsi_section1_options', false));

    if (!isset($option1) || empty($option1)) {

        $options1 = array(
            'sfsi_rss_display' => 'yes',
            'sfsi_email_display' => 'yes',
            'sfsi_facebook_display' => 'yes',
            'sfsi_twitter_display' => 'yes',
            'sfsi_google_display' => 'no',
            'sfsi_pinterest_display' => 'no',
            'sfsi_telegram_display' => 'no',
            'sfsi_vk_display' => 'no',
            'sfsi_ok_display' => 'no',
            'sfsi_wechat_display' => 'no',
            'sfsi_weibo_display' => 'no',
            'sfsi_instagram_display' => 'no',
            'sfsi_linkedin_display' => 'no',
            'sfsi_youtube_display' => 'no',
            'sfsi_custom_display' => '',
            'sfsi_custom_files' => ''
        );
        add_option('sfsi_section1_options',  serialize($options1));
    }

    if (get_option('sfsi_feed_id') && get_option('sfsi_redirect_url')) {
        $sffeeds["feed_id"] = sanitize_text_field(get_option('sfsi_feed_id'));
        $sffeeds["redirect_url"] = esc_url(get_option('sfsi_redirect_url'));
        $sffeeds = (object)$sffeeds;
    } else {
        $sffeeds = SFSI_getFeedUrl();
    }

    $addThisDismissed = get_option('sfsi_addThis_icon_removal_notice_dismissed', false);

    if (!isset($addThisDismissed)) {
        update_option('sfsi_addThis_icon_removal_notice_dismissed', true);
    }

    $option2 = unserialize(get_option('sfsi_section2_options', false));

    if (!isset($option2) || empty($option2)) {

        /* Links and icons  options */
        $options2 = array(
            'sfsi_rss_url' => sfsi_get_bloginfo('rss2_url'),
            'sfsi_rss_icons'             => 'email',
            'sfsi_email_url'             => $sffeeds->redirect_url,
            'sfsi_facebookPage_option'   => 'no',
            'sfsi_facebookPage_url'      => '',
            'sfsi_facebookLike_option'   => 'yes',
            'sfsi_facebookShare_option'  => 'yes',
            'sfsi_twitter_followme'      => 'no',
            'sfsi_twitter_followUserName' => '',
            'sfsi_twitter_aboutPage'     => 'yes',
            'sfsi_twitter_page'          => 'no',
            'sfsi_twitter_pageURL'       => '',
            'sfsi_twitter_aboutPageText' => 'Hey, check out this cool site I found: www.yourname.com #Topic via@my_twitter_name',
            'sfsi_google_page'           => 'no',
            'sfsi_google_pageURL'        => '',
            'sfsi_googleLike_option'     => 'yes',
            'sfsi_googleShare_option'    => 'yes',
            'sfsi_youtube_pageUrl'       => '',
            'sfsi_youtube_page'          => 'no',
            'sfsi_youtubeusernameorid'   => '',
            'sfsi_ytube_chnlid'          => '',
            'sfsi_youtube_follow'        => 'no',
            'sfsi_pinterest_page'        => 'no',
            'sfsi_pinterest_pageUrl'     => '',
            'sfsi_pinterest_pingBlog'    => '',
            'sfsi_instagram_page'        => 'no',
            'sfsi_instagram_pageUrl'     => '',
            'sfsi_linkedin_page'         => 'no',
            'sfsi_linkedin_pageURL'      => '',
            'sfsi_linkedin_follow'       => 'no',
            'sfsi_linkedin_followCompany' => '',
            'sfsi_linkedin_SharePage'         => 'yes',
            'sfsi_linkedin_recommendBusines'  => 'no',
            'sfsi_linkedin_recommendCompany'  => '',
            'sfsi_linkedin_recommendProductId' => '',
            'sfsi_CustomIcon_links'           => '',
            'sfsi_telegram_page'       => 'no',
            'sfsi_telegram_pageURL'       => '',
            'sfsi_telegram_message'    => '',
            'sfsi_telegram_username'    => '',
            'sfsi_telegram_messageName'    