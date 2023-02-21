<?php
$THEME->name = 'triguna';

/////////////////////////////////
// The only thing you need to change in this file when copying it to
// create a new theme is the name above. You also need to change the name
// in version.php and lang/en/theme_triguna.php as well.
//////////////////////////////////
//
$THEME->doctype = 'html5';
$THEME->parents = array('boost');
$THEME->sheets = array('custom');
$THEME->supportscssoptimisation = false;
$THEME->yuicssmodules = array();
$THEME->haseditswitch = false;
$THEME->enable_dock = true;
$THEME->editor_sheets = array();
$THEME->blockrtlmanipulations = array(
    'side-pre' => 'side-pre',
    'side-post' => 'side-post'
);
$THEME->rendererfactory = 'theme_overridden_renderer_factory';
$THEME->csspostprocess = 'theme_triguna_process_css';
// $THEME->layouts = array(
//   'base' => array(
//         'file' => 'columns2.php',
//         'regions' => array(),
//     ),
//   // Standard layout with blocks, this is recommended for most pages with general information.
//     'standard' => array(
//         'file' => 'columns2.php',
//         'regions' => array('side-pre', 'side-post'),
//         'defaultregion' => 'side-pre',
//     ),
//     // Main course page.
//     'course' => array(
//         'file' => 'columns2.php',
//         'regions' => array('side-pre', 'side-post'),
//         'defaultregion' => 'side-pre',
//         'options' => array('langmenu' => true),
//     ),
//   // The site home page.
// 	'frontpage' => array(
// 	    'file' => 'frontpage.php',
//       'regions' => array(),
//       'options' => array('nonavbar' => true),
// 	),
//       // My dashboard page.
//     'mydashboard' => array(
//         'file' => 'columns2.php',
//         'regions' => array('side-pre', 'side-post'),
//         'defaultregion' => 'side-pre',
//         'options' => array('nonavbar' => true),
//     ),
//     // My public page.
//     'mypublic' => array(
//         'file' => 'columns2.php',
//         'regions' => array('side-pre'),
//         'defaultregion' => 'side-pre',
//     ),
//   'login' => array(
//         'file' => 'login.php',
//         'regions' => array(),
//         'options' => array('langmenu'=>true),
//   ),
//   'coursecategory' => array(
//         'file' => 'columns3home.php',
//         'defaultregion' => array(),
//         'regions' => array('side-pre', 'side-post'),
//         'options' => array('nonavbar' => false),
//    ),
//    // Part of course, typical for modules - default page layout if $cm specified in require_login().
//     'incourse' => array(
//         'file' => 'columns3home.php',
//         'regions' => array('side-pre'),
//         'defaultregion' => 'side-pre',
//     ),
//   'admin' => array(
//         'file' => 'columns3.php',
//         'defaultregion' => array(),
//         'regions' => array('side-pre', 'side-post'),
//     ),

// );

$THEME->layouts = [
    // Most backwards compatible layout without the blocks - this is the layout used by default.
    'base' => array(
        'file' => 'columns1.php',
        'regions' => array(),
    ),
    // Standard layout with blocks, this is recommended for most pages with general information.
    'standard' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    // Main course page.
    'course' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu' => true),
    ),
    'coursecategory' => array(
        'file' => 'columns3home.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    // Part of course, typical for modules - default page layout if $cm specified in require_login().
    'incourse' => array(
        'file' => 'columns3.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    // The site home page.
    'frontpage' => array(
        'file' => 'frontpage.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true),
    ),
    // Server administration scripts.
    'admin' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    // My courses page.
    'mycourses' => array(
        'file' => 'columns3home.php',
        'regions' => ['side-pre'],
        'defaultregion' => 'side-pre',
        'options' => array('nonavbar' => true),
    ),
    // My dashboard page.
    'mydashboard' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
        'options' => array('langmenu' => true),
    ),
    // My public page.
    'mypublic' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    'login' => array(
        'file' => 'login.php',
        'regions' => array(),
        'options' => array('langmenu' => true),
    ),

    // Pages that appear in pop-up windows - no navigation, no blocks, no header.
    'popup' => array(
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => true),
    ),
    // No blocks and minimal footer - used for legacy frame layouts only!
    'frametop' => array(
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nocoursefooter' => true),
    ),
    // Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible.
    'embedded' => array(
        'file' => 'embedded.php',
        'regions' => array()
    ),
    // Used during upgrade and install, and for the 'This site is undergoing maintenance' message.
    // This must not have any blocks, links, or API calls that would lead to database or cache interaction.
    // Please be extremely careful if you are modifying this layout.
    'maintenance' => array(
        'file' => 'maintenance.php',
        'regions' => array(),
    ),
    // Should display the content and basic headers only.
    'print' => array(
        'file' => 'columns1.php',
        'regions' => array(),
        'options' => array('nofooter' => true, 'nonavbar' => false),
    ),
    // The pagelayout used when a redirection is occuring.
    'redirect' => array(
        'file' => 'columns2.php',
        'regions' => array(),
    ),
    // The pagelayout used for reports.
    'report' => array(
        'file' => 'columns2.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre',
    ),
    // The pagelayout used for safebrowser and securewindow.
    'secure' => array(
        'file' => 'secure.php',
        'regions' => array('side-pre'),
        'defaultregion' => 'side-pre'
    )
];