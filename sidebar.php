<?php
/*
 *
 * Edit this file to create your own sidebar.
 * This allows you to fully customize it,
 * for example you can choose any of icon available at https://material.io/icons/
 *
 */

/*
 * Choose if you want to render the sidebar DokuWiki page
 */
$sidebarPage = tpl_getConf('dokuwikiSidebar') == 1 ? true : false;


/*
 * Choose if you want to have a feedback form and if it should include technical information.
 */
$feedbackForm = tpl_getConf('feedbackForm') == 1 ? true : false;
$technical = tpl_getConf('technicalFeedbackForm') == 1 ? true : false;


/*
* You can customize the feedback form below.
*/

$email = tpl_getConf('feedbackEmail');
$subjectLine = tpl_getConf('feedbackSubjectLine');
$body = tpl_getConf('feedbackBody');

$feedbackLink = "mailto:".$email."?subject=".rawurlencode($subjectLine)."&body=".rawurlencode($body);
$technicalDump = "REDIRECT_STATUS: " .   $_SERVER["REDIRECT_STATUS"] . "\n".
    "HTTP_HOST: " .  $_SERVER["HTTP_HOST"] . "\n".
    "HTTP_X_REAL_IP: " .  $_SERVER["HTTP_X_REAL_IP"] . "\n".
    "HTTP_USER_AGENT: " .  $_SERVER["HTTP_USER_AGENT"] . "\n".
    "HTTP_ACCEPT: " .  $_SERVER["HTTP_ACCEPT"] . "\n".
    "HTTP_ACCEPT_ENCODING: " .   $_SERVER["HTTP_ACCEPT_ENCODING"] . "\n".
    "HTTP_ACCEPT_LANGUAGE: " .  $_SERVER["HTTP_ACCEPT_LANGUAGE"] . "\n".
    "HTTP_X_REAL_IP: " .  $_SERVER["HTTP_X_REAL_IP"];
if($technical) $feedbackLink .= rawurlencode("\n\n====PLEASE DO NOT DELETE=====\nPage:".$INFO['id']."\nPerm:".$INFO['perm']."\nUser:".$INFO['client']."\nMobile:".$INFO['ismobile']."\nAction:".$ACT."\n====MORE TECH INFORMATION=====\n".$technicalDump);

if($sidebarPage) {
    tpl_include_page("sidebar");
}else {
    /*
     *
     * You can edit the HTML below to style your own sidebar
     *
     */
    echo '
        <a class="mdl-navigation__link" href="'. DOKU_BASE . 'doku.php?id=wiki:dokuwiki">
            <i class="material-icons" role="presentation">done_all</i>
            First link</a>
        <a class="mdl-navigation__link" href="'. DOKU_BASE . 'doku.php?id=playground:playground">
            <i class="material-icons" role="presentation">done</i>
            Second link</a>
        <div class="mdl-layout-spacer"></div>
        <a class="mdl-navigation__link" href="'. DOKU_BASE . 'about">
            <i class="material-icons" role="presentation">info_outline</i>
            About</a>
        <a class="mdl-navigation__link" href="'. DOKU_BASE . 'help/">
            <i class="material-icons" role="presentation">help_outline</i>
            Help</a>
    ';
}

//TODO: do not overwrite the user's sidebar with every update