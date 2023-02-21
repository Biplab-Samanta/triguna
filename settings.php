<?php
defined('MOODLE_INTERNAL') || die;
$settings = null;
if (is_siteadmin()) {
    $ADMIN->add('themes', new admin_category('theme_triguna', 'triguna'));
    $temp = new admin_settingpage('theme_triguna_general',  get_string('generalsettings', 'theme_triguna'));

    $name = 'theme_triguna/logoorsitename';
    $title = get_string('logoorsitename', 'theme_triguna');
    $description = get_string('logoorsitenamedesc', 'theme_triguna');
    $default = 'logo';
    $setting = new admin_setting_configselect($name, $title, $description, $default, array(
        'logo' => get_string('onlylogo', 'theme_triguna'),
        'sitename' => get_string('onlysitename', 'theme_triguna'),
        'iconsitename' => get_string('iconsitename', 'theme_triguna')
    ));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    if (get_config('theme_triguna', 'logoorsitename') === "logo") {
        // Logo file setting.
        $name = 'theme_triguna/logo';
        $title = get_string('logo','theme_triguna');
        $description = get_string('logodesc', 'theme_triguna');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
        // Logo background file setting.
        $name = 'theme_triguna/logobackgroundimage';
        $title = get_string('logobackgroundimage','theme_triguna');
        $description = get_string('logobackgroundimagedesc', 'theme_triguna');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'logobackgroundimage');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
    } else if (get_config('theme_triguna', 'logoorsitename') === "iconsitename") {
        // Logo file setting.
        $name = 'theme_triguna/icon';
        $title = get_string('logoicon','theme_triguna');
        $description = get_string('logoicondesc', 'theme_triguna');
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'icon');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
    }
     //custom favicon temp
    $name = 'theme_triguna/faviconurl';
    $title = get_string('favicon', 'theme_triguna');
    $description = get_string('favicondesc', 'theme_triguna');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'faviconurl');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Custom CSS file.
    $name = 'theme_triguna/customcss';
    $title = get_string('customcss', 'theme_triguna');
    $description = get_string('customcssdesc', 'theme_triguna');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Footnote setting.
    $name = 'theme_triguna/footnote';
    $title = get_string('rightfootnote', 'theme_triguna');
    $description = get_string('rightfootnotedesc', 'theme_triguna');
    $default = 'Powered By Dualcube';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnote';
    $title = get_string('leftfootnote', 'theme_triguna');
    $description = get_string('leftfootnotedesc', 'theme_triguna');
    $default = 'All content on this website is made available under the Creative Commons Attribution-ShareAlike 3.0 Unported License, unless otherwise stated.';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesection1';
    $title = get_string('leftfootnotesection1', 'theme_triguna');
    $description = get_string('leftfootnotedescsection1', 'theme_triguna');
    $default = 'Contact';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesectionlink1';
    $title = get_string('leftfootnotesectionlink1', 'theme_triguna');
    $description = get_string('leftfootnotelinkdescsection1', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesection2';
    $title = get_string('leftfootnotesection2', 'theme_triguna');
    $description = get_string('leftfootnotedescsection2', 'theme_triguna');
    $default = 'Privacy policy';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesectionlink2';
    $title = get_string('leftfootnotesectionlink2', 'theme_triguna');
    $description = get_string('leftfootnotelinkdescsection2', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesection3';
    $title = get_string('leftfootnotesection3', 'theme_triguna');
    $description = get_string('leftfootnotedescsection3', 'theme_triguna');
    $default = 'Terms of use';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesectionlink3';
    $title = get_string('leftfootnotesectionlink3', 'theme_triguna');
    $description = get_string('leftfootnotelinkdescsection3', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesection4';
    $title = get_string('leftfootnotesection4', 'theme_triguna');
    $description = get_string('leftfootnotedescsection4', 'theme_triguna');
    $default = 'Register';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesectionlink4';
    $title = get_string('leftfootnotesectionlink4', 'theme_triguna');
    $description = get_string('leftfootnotelinkdescsection4', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesection5';
    $title = get_string('leftfootnotesection5', 'theme_triguna');
    $description = get_string('leftfootnotedescsection5', 'theme_triguna');
    $default = 'Site Policy';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesectionlink5';
    $title = get_string('leftfootnotesectionlink5', 'theme_triguna');
    $description = get_string('leftfootnotelinkdescsection5', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesection6';
    $title = get_string('leftfootnotesection6', 'theme_triguna');
    $description = get_string('leftfootnotedescsection6', 'theme_triguna');
    $default = 'Development';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/leftfootnotesectionlink6';
    $title = get_string('leftfootnotesectionlink6', 'theme_triguna');
    $description = get_string('leftfootnotelinkdescsection6', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $ADMIN->add('theme_triguna', $temp);


    //frontpage temp
    $temp = new admin_settingpage('theme_triguna_frontpage',  get_string('frontpagesettings', 'theme_triguna'));
    $temp->add(new admin_setting_heading('theme_triguna_upsection', get_string('frontpageimagecontent', 'theme_triguna'),
        format_text(get_string('frontpageimagecontentdesc', 'theme_triguna'), FORMAT_MARKDOWN)));
    $name = 'theme_triguna/frontpageimagecontent';
    $title = get_string('frontpageimagecontentstyle', 'theme_triguna');
    $description = get_string('frontpageimagecontentstyledesc', 'theme_triguna');
    $setting = new admin_setting_configselect($name, $title, $description, 1,
    array(
            0 => get_string('staticcontent', 'theme_triguna'),
            1 => get_string('slidercontent', 'theme_triguna'),
        ));
    $temp->add($setting);
    if (get_config('theme_triguna', 'frontpageimagecontent') === "0") {
        $name = 'theme_triguna/addtext';
        $title = get_string('addtext', 'theme_triguna');
        $description = get_string('addtextdesc', 'theme_triguna');
        $default = '<h2><span style="font-size:22px;">Education is a time-tested path to progress</span><br>YOU ENTER TO LEARN, LEAVE TO ACHIEVE</h2><p>Education ignites a purpose within us and beckons us on a path of enlightenment. It allows for a progressive mind to flourish that builds a self-sustaining society.</p><a class="btn-1" href="javascript:void(0);">Find Out More</a>';
        $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        $name = 'theme_triguna/addlink';
        $title = get_string('addlink', 'theme_triguna');
        $description = get_string('addlinkdesc', 'theme_triguna');
        $default = 'javascript:void(0);';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        $name = 'theme_triguna/videotype';
        $title = get_string('videotype', 'theme_triguna');
        $description = get_string('videotypedesc', 'theme_triguna');
        $setting = new admin_setting_configselect($name, $title, $description, 0,
        array(
            0 => get_string('iframe', 'theme_triguna'),
            1 => get_string('upload', 'theme_triguna'),
        ));
        $temp->add($setting);
        if (get_config('theme_triguna', 'videotype') === "0") {
            $name = 'theme_triguna/video';
            $title = get_string('video', 'theme_triguna');
            $description = get_string('videodesc', 'theme_triguna');
            $default = '<iframe src="https://player.vimeo.com/video/45232468" width="560" height="300" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $temp->add($setting);
        } elseif (get_config('theme_triguna', 'videotype') === "1") {
            $name = 'theme_triguna/uploadvideo';
            $title = get_string('uploadvideo','theme_triguna');
            $description = get_string('uploadvideodesc', 'theme_triguna');
            $setting = new admin_setting_configstoredfile($name, $title, $description, 'uploadvideo', $itemid = 0, array(
			'accepted_types' => '.mp4'
			));
            $setting->set_updatedcallback('theme_reset_all_caches');
            $temp->add($setting);
        }

        $name = 'theme_triguna/frontpagevideoalignment';
        $title = get_string('frontpagevideoalignment', 'theme_triguna');
        $description = get_string('frontpagevideoalignmentdesc', 'theme_triguna');
        $setting = new admin_setting_configselect($name, $title, $description, 1,
        array(
            0 => get_string('videoleft', 'theme_triguna'),
            1 => get_string('videoright', 'theme_triguna'),
        ));
        $temp->add($setting);
    } else if (get_config('theme_triguna', 'frontpageimagecontent') === "1"){
        $name = 'theme_triguna/slideinterval';
        $title = get_string('slideinterval', 'theme_triguna');
        $description = get_string('slideintervaldesc', 'theme_triguna');
        $default = 5000;
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        $name = 'theme_triguna/sliderautoplay';
        $title = get_string('sliderautoplay', 'theme_triguna');
        $description = get_string('sliderautoplaydesc', 'theme_triguna');
        $setting = new admin_setting_configselect($name, $title, $description, 1,
        array(
                1 => get_string('true', 'theme_triguna'),
                2 => get_string('false', 'theme_triguna'),
            ));
        $temp->add($setting);

        $name = 'theme_triguna/slidercount';
        $title = get_string('slidercount', 'theme_triguna');
        $description = get_string('slidercountdesc', 'theme_triguna');
        $setting = new admin_setting_configselect($name, $title, $description, 0,
        array(
                1 => get_string('one', 'theme_triguna'),
                2 => get_string('two', 'theme_triguna'),
                3 => get_string('three', 'theme_triguna'),
                4 => get_string('four', 'theme_triguna'),
                5 => get_string('five', 'theme_triguna'),
            ));
        $temp->add($setting);

        for($slidecounts = 1; $slidecounts <= get_config('theme_triguna', 'slidercount'); $slidecounts = $slidecounts + 1) {
            $name = 'theme_triguna/slideimage'.$slidecounts;
            $title = get_string('slideimage', 'theme_triguna');

            $description = get_string('slideimagedesc', 'theme_triguna');
            $setting = new admin_setting_configstoredfile($name, $title, $description, 'slideimage'.$slidecounts);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $temp->add($setting);

            $name = 'theme_triguna/slidertext'.$slidecounts;
            $title = get_string('slidertext', 'theme_triguna');
            $description = get_string('slidertextdesc', 'theme_triguna');
            $default = '<h2><span>Education is a time-tested path to progress</span><br>YOU ENTER TO LEARN, LEAVE TO ACHIEVE</h2><p>Education ignites a purpose within us and beckons us on a path of enlightenment. It allows for a progressive mind to flourish that builds a self-sustaining society.</p>';
            $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $temp->add($setting);

            $name = 'theme_triguna/sliderbuttontext'.$slidecounts;
            $title = get_string('sliderbuttontext', 'theme_triguna');
            $description = get_string('sliderbuttontextdesc', 'theme_triguna');
            $default = 'Read more';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $temp->add($setting);

            $name = 'theme_triguna/sliderurl'.$slidecounts;
            $title = get_string('sliderurl', 'theme_triguna');
            $description = get_string('sliderurldesc', 'theme_triguna');
            $default = '#';
            $setting = new admin_setting_configtext($name, $title, $description, $default);
            $setting->set_updatedcallback('theme_reset_all_caches');
            $temp->add($setting);
        }
    }

    $temp->add(new admin_setting_heading('theme_triguna_blocksection', get_string('frontpageblocks', 'theme_triguna'),
        format_text(get_string('frontpageblocksdesc', 'theme_triguna'), FORMAT_MARKDOWN)));

    $name = 'theme_triguna/frontpageblockheading';
    $title = get_string('frontpageblockheading', 'theme_triguna');
    $description = get_string('frontpageblockheadingdesc', 'theme_triguna');
    $default = 'News &amp; Updates';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/frontpageblock';
    $title = get_string('frontpageblock', 'theme_triguna');
    $description = get_string('frontpageblockdesc', 'theme_triguna');
    $default = 'See all announcements';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/frontpageblocklink';
    $title = get_string('frontpageblocklink', 'theme_triguna');
    $description = get_string('frontpageblocklinkdesc', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*block section 1*/
    $name = 'theme_triguna/frontpageblocksection1';
    $title = get_string('frontpageblocksection1', 'theme_triguna');
    $description = get_string('frontpageblocksectiondesc1', 'theme_triguna');
    $default = "Ahead of World Teachers' Day, UN highlights education challenges:";
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/frontpageblocklinksection1';
    $title = get_string('frontpageblocklinksection1', 'theme_triguna');
    $description = get_string('frontpageblocklinksectiondesc1', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/frontpageblockdescriptionsection1';
    $title = get_string('frontpageblockdescriptionsection1', 'theme_triguna');
    $description = get_string('frontpageblockdescriptionsectiondesc1', 'theme_triguna');
    $default = 'Friday, July 27, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*block section 2*/
    $name = 'theme_triguna/frontpageblocksection2';
    $title = get_string('frontpageblocksection2', 'theme_triguna');
    $description = get_string('frontpageblocksectiondesc2', 'theme_triguna');
    $default = "MIT launches first ever free online courses that could lead to degree:";
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/frontpageblocklinksection2';
    $title = get_string('frontpageblocklinksection2', 'theme_triguna');
    $description = get_string('frontpageblocklinksectiondesc2', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/frontpageblockdescriptionsection2';
    $title = get_string('frontpageblockdescriptionsection2', 'theme_triguna');
    $description = get_string('frontpageblockdescriptionsectiondesc2', 'theme_triguna');
    $default = 'Monday, August 15, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    /*block section 3*/
    $name = 'theme_triguna/frontpageblocksection3';
    $title = get_string('frontpageblocksection3', 'theme_triguna');
    $description = get_string('frontpageblocksectiondesc3', 'theme_triguna');
    $default = 'Essentials for Effective Online Courses in K-12:';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/frontpageblocklinksection3';
    $title = get_string('frontpageblocklinksection3', 'theme_triguna');
    $description = get_string('frontpageblocklinksectiondesc3', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/frontpageblockdescriptionsection3';
    $title = get_string('frontpageblockdescriptionsection3', 'theme_triguna');
    $description = get_string('frontpageblockdescriptionsectiondesc3', 'theme_triguna');
    $default = 'Saturday, June 5, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $temp->add(new admin_setting_heading('theme_triguna_downsection', get_string('marketspot', 'theme_triguna'),
        format_text(get_string('marketspotdesc', 'theme_triguna'), FORMAT_MARKDOWN)));

    $name = 'theme_triguna/marketspotfontawesomeicon';
    $title = get_string('marketspotfontawesomeicon', 'theme_triguna');
    $description = get_string('marketspotfontawesomeicondesc', 'theme_triguna');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketspotfontawesomeicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_triguna/marketspot';
    $title = get_string('marketspothead', 'theme_triguna');
    $description = get_string('marketspotheaddesc', 'theme_triguna');
    $default = 'Forum Discussion';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);


    $name = 'theme_triguna/marketspotsectionfontawesomeicon1';
    $title = get_string('marketspotsectionfontawesomeicon1', 'theme_triguna');
    $description = get_string('marketspotsectionfontawesomeicondesc1', 'theme_triguna');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketspotsectionfontawesomeicon1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsection1';
    $title = get_string('marketspotsection1', 'theme_triguna');
    $description = get_string('marketspotsectiondesc1', 'theme_triguna');
    $default = 'Best online education practises';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectionlink1';
    $title = get_string('marketspotsectionlink1', 'theme_triguna');
    $description = get_string('marketspotsectionlinkdesc1', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectiontext1';
    $title = get_string('marketspotsectiontext1', 'theme_triguna');
    $description = get_string('marketspotsectiontextdesc1', 'theme_triguna');
    $default = 'John Smith - Friday, July 27, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectionfontawesomeicon2';
    $title = get_string('marketspotsectionfontawesomeicon2', 'theme_triguna');
    $description = get_string('marketspotsectionfontawesomeicondesc2', 'theme_triguna');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketspotsectionfontawesomeicon2');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsection2';
    $title = get_string('marketspotsection2', 'theme_triguna');
    $description = get_string('marketspotsectiondesc2', 'theme_triguna');
    $default = 'Re: Which is a better option among the three - Sociology , Philosophy and Sports nutrition.';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectionlink2';
    $title = get_string('marketspotsectionlink2', 'theme_triguna');
    $description = get_string('marketspotsectionlinkdesc2', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectiontext2';
    $title = get_string('marketspotsectiontext2', 'theme_triguna');
    $description = get_string('marketspotsectiontextdesc2', 'theme_triguna');
    $default = 'John Doe - Monday, August 15, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectionfontawesomeicon3';
    $title = get_string('marketspotsectionfontawesomeicon3', 'theme_triguna');
    $description = get_string('marketspotsectionfontawesomeicondesc3', 'theme_triguna');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketspotsectionfontawesomeicon3');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_triguna/marketspotsection3';
    $title = get_string('marketspotsection3', 'theme_triguna');
    $description = get_string('marketspotsectiondesc3', 'theme_triguna');
    $default = 'Re: The Payment gateway is very extensive.';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectionlink3';
    $title = get_string('marketspotsectionlink3', 'theme_triguna');
    $description = get_string('marketspotsectionlinkdesc3', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectiontext3';
    $title = get_string('marketspotsectiontext3', 'theme_triguna');
    $description = get_string('marketspotsectiontextdesc3', 'theme_triguna');
    $default = 'Murali Vijay - Saturday, June 5, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectionfontawesomeicon4';
    $title = get_string('marketspotsectionfontawesomeicon4', 'theme_triguna');
    $description = get_string('marketspotsectionfontawesomeicondesc4', 'theme_triguna');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketspotsectionfontawesomeicon4');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_triguna/marketspotsection4';
    $title = get_string('marketspotsection4', 'theme_triguna');
    $description = get_string('marketspotsectiondesc4', 'theme_triguna');
    $default = 'Illustration practises need a more broader approach.';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectionlink4';
    $title = get_string('marketspotsectionlink4', 'theme_triguna');
    $description = get_string('marketspotsectionlinkdesc4', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectiontext4';
    $title = get_string('marketspotsectiontext4', 'theme_triguna');
    $description = get_string('marketspotsectiontextdesc4', 'theme_triguna');
    $default = 'Lisa Abott - Thursday, January 26, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectionbelowlink';
    $title = get_string('marketspotsectionbelowlink', 'theme_triguna');
    $description = get_string('marketspotsectionbelowlinkdesc', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/marketspotsectionbelowlinkname';
    $title = get_string('marketspotsectionbelowlinkname', 'theme_triguna');
    $description = get_string('marketspotsectionbelowlinknamedesc', 'theme_triguna');
    $default = 'View all discussion';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $temp->add(new admin_setting_heading('theme_triguna_anothersection', get_string('secondmarketspot', 'theme_triguna'),
        format_text(get_string('secondmarketspotdesc', 'theme_triguna'), FORMAT_MARKDOWN)));

    $name = 'theme_triguna/secondmarketspotfontawesomeicon';
    $title = get_string('secondmarketspotfontawesomeicon', 'theme_triguna');
    $description = get_string('secondmarketspotfontawesomeicondesc', 'theme_triguna');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'secondmarketspotfontawesomeicon');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_triguna/secondmarketspot';
    $title = get_string('secondmarketspot', 'theme_triguna');
    $description = get_string('secondmarketspotdesc', 'theme_triguna');
    $default = 'DOWNLOAD RESOURCES';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectionfontawesomeicon1';
    $title = get_string('secondmarketspotsectionfontawesomeicon1', 'theme_triguna');
    $description = get_string('secondmarketspotsectionfontawesomeicondesc1', 'theme_triguna');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'secondmarketspotsectionfontawesomeicon1');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsection1';
    $title = get_string('secondmarketspotsection1', 'theme_triguna');
    $description = get_string('secondmarketspotsectiondesc1', 'theme_triguna');
    $default = 'Plugins: Etherpad Lite';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectionlink1';
    $title = get_string('secondmarketspotsectionlink1', 'theme_triguna');
    $description = get_string('secondmarketspotsectionlinkdesc1', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectiontext1';
    $title = get_string('secondmarketspotsectiontext1', 'theme_triguna');
    $description = get_string('secondmarketspotsectiontextdesc1', 'theme_triguna');
    $default = 'Itamar Tzadok - Thursday, June 4, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectionfontawesomeicon2';
    $title = get_string('secondmarketspotsectionfontawesomeicon2', 'theme_triguna');
    $description = get_string('secondmarketspotsectionfontawesomeicondesc2', 'theme_triguna');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'secondmarketspotsectionfontawesomeicon2');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_triguna/secondmarketspotsection2';
    $title = get_string('secondmarketspotsection2', 'theme_triguna');
    $description = get_string('secondmarketspotsectiondesc2', 'theme_triguna');
    $default = 'Plugins: LenAuth';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectionlink3';
    $title = get_string('secondmarketspotsectionlink3', 'theme_triguna');
    $description = get_string('secondmarketspotsectionlinkdesc3', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectiontext2';
    $title = get_string('secondmarketspotsectiontext2', 'theme_triguna');
    $description = get_string('secondmarketspotsectiontextdesc2', 'theme_triguna');
    $default = 'Itamar Tzadok - Thursday, June 4, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectionfontawesomeicon3';
    $title = get_string('secondmarketspotsectionfontawesomeicon3', 'theme_triguna');
    $description = get_string('secondmarketspotsectionfontawesomeicondesc3', 'theme_triguna');
    $default = 'secondmarketspotsectionfontawesomeicon3';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsection3';
    $title = get_string('secondmarketspotsection3', 'theme_triguna');
    $description = get_string('secondmarketspotsectiondesc3', 'theme_triguna');
    $default = 'Course Format Development Enhanced Topic Format Contract';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectionlink3';
    $title = get_string('secondmarketspotsectionlink3', 'theme_triguna');
    $description = get_string('secondmarketspotsectionlinkdesc3', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectiontext3';
    $title = get_string('secondmarketspotsectiontext3', 'theme_triguna');
    $description = get_string('secondmarketspotsectiontextdesc3', 'theme_triguna');
    $default = 'Itamar Tzadok - Thursday, June 4, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectionfontawesomeicon4';
    $title = get_string('secondmarketspotsectionfontawesomeicon4', 'theme_triguna');
    $description = get_string('secondmarketspotsectionfontawesomeicondesc4', 'theme_triguna');
    $default = 'secondmarketspotsectionfontawesomeicon4';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_triguna/secondmarketspotsection4';
    $title = get_string('secondmarketspotsection4', 'theme_triguna');
    $description = get_string('secondmarketspotsectiondesc4', 'theme_triguna');
    $default = 'Jobs: LMS provider for State of Michigan - Michigan, USA';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectionlink4';
    $title = get_string('secondmarketspotsectionlink4', 'theme_triguna');
    $description = get_string('secondmarketspotsectionlinkdesc4', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectiontext4';
    $title = get_string('secondmarketspotsectiontext4', 'theme_triguna');
    $description = get_string('secondmarketspotsectiontextdesc4', 'theme_triguna');
    $default = 'Itamar Tzadok - Thursday, June 4, 2015';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectionbelowlink';
    $title = get_string('secondmarketspotsectionbelowlink', 'theme_triguna');
    $description = get_string('secondmarketspotsectionbelowlinkdesc', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/secondmarketspotsectionbelowlinkname';
    $title = get_string('secondmarketspotsectionbelowlinkname', 'theme_triguna');
    $description = get_string('secondmarketspotsectionbelowlinknamedesc', 'theme_triguna');
    $default = 'View all resources';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $temp->add(new admin_setting_heading('theme_triguna_nextsection', get_string('contactwithus', 'theme_triguna'),
        format_text(get_string('contactwithusdesc', 'theme_triguna'), FORMAT_MARKDOWN)));
    //contact with us
    $name = 'theme_triguna/contactwithusfontawesomeicon';
    $title = get_string('contactwithusfontawesomeicon', 'theme_triguna');
    $description = get_string('contactwithusfontawesomeicondesc', 'theme_triguna');
    $default = 'contactwithusfontawesomeicon';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/contactwithus';
    $title = get_string('contactwithusheading', 'theme_triguna');
    $description = get_string('contactwithusheadingdesc', 'theme_triguna');
    $default = 'Contact With Us';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/socialfontawesomeicon1';
    $title = get_string('socialfontawesomeicon1', 'theme_triguna');
    $description = get_string('socialfontawesomeicondesc1', 'theme_triguna');
    $default = 'socialfontawesomeicon1';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/socialicon1';
    $title = get_string('socialicon', 'theme_triguna');
    $description = get_string('socialicondesc', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_triguna/socialfontawesomeicon2';
    $title = get_string('socialfontawesomeicon2', 'theme_triguna');
    $description = get_string('socialfontawesomeicondesc2', 'theme_triguna');
    $default = 'socialfontawesomeicon2';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/socialicon2';
    $title = get_string('socialicon', 'theme_triguna');
    $description = get_string('socialicondesc', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_triguna/socialfontawesomeicon3';
    $title = get_string('socialfontawesomeicon3', 'theme_triguna');
    $description = get_string('socialfontawesomeicondesc3', 'theme_triguna');
    $default = 'socialfontawesomeicon3';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/socialicon3';
    $title = get_string('socialicon', 'theme_triguna');
    $description = get_string('socialicondesc', 'theme_triguna');
    $default = 'socialicon';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $name = 'theme_triguna/socialfontawesomeicon4';
    $title = get_string('socialfontawesomeicon4', 'theme_triguna');
    $description = get_string('socialfontawesomeicondesc4', 'theme_triguna');
    $default = 'socialfontawesomeicon4';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/socialicon4';
    $title = get_string('socialicon', 'theme_triguna');
    $description = get_string('socialicondesc', 'theme_triguna');
    $default = 'javascript:void(0);';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    $ADMIN->add('theme_triguna', $temp);

    $name = 'theme_triguna/addressfontawesomeicon';
    $title = get_string('addressfontawesomeicon', 'theme_triguna');
    $description = get_string('addressfontawesomeicondesc', 'theme_triguna');
    $default = 'addressfontawesomeicon';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/address';
    $title = get_string('address', 'theme_triguna');
    $description = get_string('addressdesc', 'theme_triguna');
    $default = 'BB 164, Salt Lake Sector 1 Kolkata 700064 West Bengal, India';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/phonefontawesomeicon';
    $title = get_string('phonefontawesomeicon', 'theme_triguna');
    $description = get_string('phonefontawesomeicondesc', 'theme_triguna');
    $default = 'phonefontawesomeicon';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/phone';
    $title = get_string('phone', 'theme_triguna');
    $description = get_string('phonedesc', 'theme_triguna');
    $default = '+91 33 64578322';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/emailfontawesomeicon';
    $title = get_string('emailfontawesomeicon', 'theme_triguna');
    $description = get_string('emailfontawesomeicondesc', 'theme_triguna');
    $default = 'emailfontawesomeicon';
    $setting = new admin_setting_configstoredfile($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    $name = 'theme_triguna/email';
    $title = get_string('email', 'theme_triguna');
    $description = get_string('emaildesc', 'theme_triguna');
    $default = 'triguna@dualcube.com';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    //$ADMIN->add('theme_triguna', $temp);

    //usernavbar setting
    $temp = new admin_settingpage('theme_triguna_user_nav',  get_string('usernavsettings', 'theme_triguna'));
    //temp for user navigation
    // Enable My.
    $name = 'theme_triguna/enablemy';
    $title = get_string('enablemy', 'theme_triguna');
    $description = get_string('enablemydesc', 'theme_triguna');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    // Enable View Profile.
    $name = 'theme_triguna/enableprofile';
    $title = get_string('enableprofile', 'theme_triguna');
    $description = get_string('enableprofiledesc', 'theme_triguna');
    $default = true;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    

    // Enable Private Files.
    $name = 'theme_triguna/enableprivatefiles';
    $title = get_string('enableprivatefiles', 'theme_triguna');
    $description = get_string('enableprivatefilesdesc', 'theme_triguna');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Enable Badges.
    $name = 'theme_triguna/enablebadges';
    $title = get_string('enablebadges', 'theme_triguna');
    $description = get_string('enablebadgesdesc', 'theme_triguna');
    $default = false;
    $setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    $ADMIN->add('theme_triguna', $temp);
    $temp = new admin_settingpage('theme_triguna_colors',  get_string('colorsettings', 'theme_triguna'));

    $name = 'theme_triguna/colorscheme';
    $title = get_string('colorscheme', 'theme_triguna');
    $description = get_string('colorschemedesc', 'theme_triguna');
    $default = 'red-orange';
    $setting = new admin_setting_configselect($name, $title, $description, $default, array(
        'red-orange' => get_string('redorange', 'theme_triguna'),
        'green' => get_string('green', 'theme_triguna'),
        'orange' => get_string('orange', 'theme_triguna'),
        'blue' => get_string('blue', 'theme_triguna'),
        'purple' => get_string('purple', 'theme_triguna')

    ));
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    $ADMIN->add('theme_triguna', $temp);
    /*font*/
    
    $temp = new admin_settingpage('theme_triguna_font',  get_string('fontsettings', 'theme_triguna'));
    $name = 'theme_triguna/fontselect';
    $title = get_string('fontselect', 'theme_triguna');
    $description = get_string('fontselectdesc', 'theme_triguna');
    $default = 1;
    $choices = array(
        1 => get_string('fonttypestandard', 'theme_triguna'),
        2 => get_string('fonttypecustom', 'theme_triguna'),
    );
    $setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    // Heading font name
    $name = 'theme_triguna/fontnameheading';
    $title = get_string('fontnameheading', 'theme_triguna');
    $description = get_string('fontnameheadingdesc', 'theme_triguna');
    $default = 'OpenSans';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Text font name

    $name = 'theme_triguna/fontnamebody';
    $title = get_string('fontnamebody', 'theme_triguna');
    $description = get_string('fontnamebodydesc', 'theme_triguna');
    $default = 'Raleway';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    if (get_config('theme_triguna', 'fontselect') === "2") {

        if (floatval($CFG->version) >= 2014111005.01) {
            $woff2 = true;
        } else {
            $woff2 = false;
        }

        // This is the descriptor for the font files
        $name = 'theme_triguna/fontfiles';
        $heading = get_string('fontfiles', 'theme_triguna');
        $information = get_string('fontfilesdesc', 'theme_triguna');
        $setting = new admin_setting_heading($name, $heading, $information);
        $temp->add($setting);

        // Heading Fonts.
        // TTF Font.
        $name = 'theme_triguna/fontfilettfheading';
        $title = get_string('fontfilettfheading', 'theme_triguna');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilettfheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // OTF Font.
        $name = 'theme_triguna/fontfileotfheading';
        $title = get_string('fontfileotfheading', 'theme_triguna');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfileotfheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // WOFF Font.
        $name = 'theme_triguna/fontfilewoffheading';
        $title = get_string('fontfilewoffheading', 'theme_triguna');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilewoffheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        if ($woff2) {
            // WOFF2 Font.
            $name = 'theme_triguna/fontfilewofftwoheading';
            $title = get_string('fontfilewofftwoheading', 'theme_triguna');
            $description = '';
            $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilewofftwoheading');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $temp->add($setting);
        }

        // EOT Font.
        $name = 'theme_triguna/fontfileeotheading';
        $title = get_string('fontfileeotheading', 'theme_triguna');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfileweotheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // SVG Font.
        $name = 'theme_triguna/fontfilesvgheading';
        $title = get_string('fontfilesvgheading', 'theme_triguna');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilesvgheading');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // Body fonts.
        // TTF Font.
        $name = 'theme_triguna/fontfilettfbody';
        $title = get_string('fontfilettfbody', 'theme_triguna');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilettfbody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // OTF Font.
        $name = 'theme_triguna/fontfileotfbody';
        $title = get_string('fontfileotfbody', 'theme_triguna');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfileotfbody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // WOFF Font.
        $name = 'theme_triguna/fontfilewoffbody';
        $title = get_string('fontfilewoffbody', 'theme_triguna');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilewoffbody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        if ($woff2) {
            // WOFF2 Font.
            $name = 'theme_triguna/fontfilewofftwobody';
            $title = get_string('fontfilewofftwobody', 'theme_triguna');
            $description = '';
            $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilewofftwobody');
            $setting->set_updatedcallback('theme_reset_all_caches');
            $temp->add($setting);
        }

        // EOT Font.
        $name = 'theme_triguna/fontfileeotbody';
        $title = get_string('fontfileeotbody', 'theme_triguna');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfileweotbody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);

        // SVG Font.
        $name = 'theme_triguna/fontfilesvgbody';
        $title = get_string('fontfilesvgbody', 'theme_triguna');
        $description = '';
        $setting = new admin_setting_configstoredfile($name, $title, $description, 'fontfilesvgbody');
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
    }
    $ADMIN->add('theme_triguna', $temp);

    /* Analytics temp */
    $temp = new admin_settingpage('theme_triguna_analytics', get_string('analytics', 'theme_triguna'));
    $temp->add(new admin_setting_heading('theme_triguna_analytics', get_string('analyticsheadingsub', 'theme_triguna'),
        format_text(get_string('analyticsdesc', 'theme_triguna'), FORMAT_MARKDOWN)));

    $name = 'theme_triguna/analyticstrackingid';
    $title = get_string('analyticstrackingid', 'theme_triguna');
    $description = get_string('analyticstrackingiddesc', 'theme_triguna');
    $default = 'UA-XXXXXXXX-X';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $temp->add($setting);

    $name = 'theme_triguna/analyticstrackingscript';
    $title = get_string('analyticstrackingscript', 'theme_triguna');
    $description = get_string('analyticstrackingscriptdesc', 'theme_triguna');
    $default = '';
    $setting = new admin_setting_configtextarea($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    $ADMIN->add('theme_triguna', $temp);

}
