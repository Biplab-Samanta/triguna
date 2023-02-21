<?php
// Get the HTML for the settings bits.
$html = theme_triguna_get_html_for_settings($OUTPUT, $PAGE);
GLOBAL $USER, $PAGE, $CFG, $DB;

$checklogo = $PAGE->theme->setting_file_url('logo', 'logo');
if(!empty($checklogo)) {
  $haslogo = $PAGE->theme->setting_file_url('logo', 'logo');
} else {
  $haslogo = $CFG->wwwroot.'/theme/triguna/pix/logo-2.png';
}

$checkicon = $PAGE->theme->setting_file_url('icon', 'icon');
if(!empty($checkicon)) {
  $hasiconlogo = $PAGE->theme->setting_file_url('icon', 'icon');
} else {
  $hasiconlogo = $CFG->wwwroot.'/theme/triguna/pix/icon-logo.png';
}
echo $OUTPUT->doctype();

$isregistration = $DB->get_record('config', array('name'=>'registerauth'));
$colorscheme = get_config('theme_triguna', 'colorscheme');
?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $OUTPUT->page_title(); ?></title>
  <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
  <link href="<?php echo $CFG->wwwroot ?>/theme/<?php echo $CFG->theme ?>/css/styles.css" rel="stylesheet">  
  <script src="<?php echo $CFG->wwwroot; ?>/theme/triguna/js/jquery-2.1.4.js"></script>
  <script src="<?php echo $CFG->wwwroot; ?>/theme/triguna/js/bootstrap.min.js"></script>
  <script src="<?php echo $CFG->wwwroot; ?>/theme/triguna/js/jquery.bxslider.min.js"></script>
  <script src="<?php echo $CFG->wwwroot; ?>/theme/triguna/js/engine.js"></script>
  <link href="<?php echo $CFG->wwwroot ?>/theme/<?php echo $CFG->theme ?>/css/bootstrap.css" rel="stylesheet">
  <link href="<?php echo $CFG->wwwroot ?>/theme/<?php echo $CFG->theme ?>/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="<?php echo $CFG->wwwroot ?>/theme/<?php echo $CFG->theme ?>/css/jquery.bxslider.css" rel="stylesheet">
  <style type="text/css">
    *[role="main"] {
        display: none;
    }
  </style>
  <?php
      include($CFG->dirroot . '/theme/triguna/settings/colorchange.php');
  ?>
  <?php echo $OUTPUT->standard_head_html() ?>
</head>
<body <?php echo $OUTPUT->body_attributes(); ?>>
<?php echo $OUTPUT->standard_top_of_body_html() ?>
<?php include $CFG->dirroot . '/theme/triguna/analyticstracking.php'; ?>
<header class="navbar navbar-fixed-top">
  <nav class="navbar-inner">
    <?php if (get_config('theme_triguna', 'logoorsitename') === "logo") { ?>
    <div class="logo-wr">
      <a class="logo-img" href="<?php echo $CFG->wwwroot; ?>">
        <img alt="logo" src="<?php echo $haslogo;?>" />
      </a>
    </div>
    <?php } else if (get_config('theme_triguna', 'logoorsitename') === "sitename") { ?>
    <div class="logo-wr">
      <a class="logo-img" href="<?php echo $CFG->wwwroot; ?>">
        <h1><?php echo $SITE->fullname; ?></h1>
      </a>
    </div>
    <?php } else if (get_config('theme_triguna', 'logoorsitename') === "iconsitename") { ?>
    <div class="logo-wr">
      <a class="logo-img" href="<?php echo $CFG->wwwroot; ?>">
        <h1><span class="logoicon"><img alt="logo" src="<?php echo $hasiconlogo;?>" /></span><span><?php echo $SITE->fullname; ?></span></h1>
      </a>
    </div>
    <?php } ?>
    <button class="side-pre-menu menu-toggle">
        <span>toggle menu</span>
    </button>

    <?php if(isloggedin()) { 
      if ( $CFG->version >= '2015051100.00' ) {
        $file = get_string('privatefiles');
      } else {
          $file = get_string('myfiles');
      }
    ?>
      <div class="usermenu">
        <div>
          <ul class="menubar menubars">
            <li>
              <a href="javascript:void(0);">
                <span class="userbutton">
                  <span>
                    <span class="avatar current">
                      <?php echo $OUTPUT->user_profile_picture(); ?>
                    </span>
                  </span>
                  <span><?php echo $USER->firstname;?> <span><?php echo $USER->lastname;?></span></span>
                </span>
              </a>
            </li>
          </ul>
          <ul class="menu menulist">
            <?php $checkenablemy = $PAGE->theme->settings->enablemy; if (!empty($checkenablemy)) { ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/my">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/column3/i-home-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/<?php echo $colorscheme ?>/i-home-1-h.png" alt=""></i>
                </span>
                <span><?php echo get_string('myhome'); ?></span>
              </a>
            </li>
            <?php } ?>
            <?php $checkenableprofile = $PAGE->theme->settings->enableprofile; if (!empty($checkenableprofile)) { ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/user/profile.php?id=<?php echo $USER->id;?>">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/column3/i-user-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/<?php echo $colorscheme ?>/i-user-1-h.png" alt=""></i>
                </span>
                <span><?php echo get_string('profile'); ?></span>
              </a>
            </li>
            <?php } ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/message/index.php">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/column3/i-mail-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/<?php echo $colorscheme ?>/i-mail-1-h.png" alt=""></i>
                </span>
                <span><?php echo get_string('messages', 'chat'); ?></span>
              </a>
            </li>
            <?php $checkprivatefiles = $PAGE->theme->settings->enableprivatefiles; if (!empty($checkprivatefiles)) { ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/user/files.php">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/column3/i-file-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/<?php echo $colorscheme ?>/i-file-1-h.png" alt=""></i>
                </span>
                <span><?php echo $file;?></span>
              </a>
            </li>
            <?php } ?>
            <?php  $checkenablebadges = $PAGE->theme->settings->enablebadges; if (!empty($checkenablebadges)) { ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/badges/view.php?type=1">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/column3/i-badge-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/<?php echo $colorscheme ?>/i-badge-1-h.png" alt=""></i>
                </span>
                <span><?php echo get_string('badges', 'badges');?></span>
              </a>
            </li>
            <?php } ?>
            <li>
              <a href="<?php echo $CFG->wwwroot; ?>/login/logout.php">
                <span class="i-wr">
                  <i class="i-def"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/column3/i-out-1.png" alt=""></i>
                  <i class="i-hov"><img src="<?php echo $CFG->wwwroot; ?>/theme/triguna/css/img/<?php echo $colorscheme ?>/i-out-1-h.png" alt=""></i>
                </span>
                <span><?php echo get_string('logout');?></span>
              </a>
            </li>
          </ul>
        </div>
      </div>
   
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <i class="fa fa-arrow-circle-down"></i>
      </a>
      <div class="nav-collapse collapse">
      <?php echo $OUTPUT->custom_menu();?>
      </div>
    <?php } else { ?>
    <div class="logining-wr">
        <a href="<?php echo $CFG->wwwroot; ?>/login/index.php"><?php echo get_string('login');?></a>
        <?php if($isregistration->value == 'email') { ?>
          <a href="<?php echo $CFG->wwwroot; ?>/login/signup.php?"><?php echo get_string('startsignup'); ?></a>
        <?php } ?>
    </div>
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
      <i class="fa fa-arrow-circle-down"></i>
    </a>
    <div class="nav-collapse collapse">
      <?php echo $OUTPUT->custom_menu();?>
    </div>
    <?php } ?>
  </nav>
</header>

