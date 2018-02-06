<?php
/*
 *
 * Edit this file to create your own sidebar.
 * This allows you to fully customize it,
 * for example you can choose any of icon available at https://material.io/icons/
 *
 */

/*
 * Choose if you want to have a feedback form and if it should include technical information.
 */
$feedbackForm = true;
$technical = true;

/*
* You can customize the feedback form below.
*/

$email = "leon.staufer@gmail.com";
$subjectLine = "Feedback for Website";
$body = "Thank you so much for taking the time to write feedback. We really appreciate it :) \n\n [your message] \n\n\n You can ignore all the technical information below. It only helps us track down what the problem might be.";

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
?>

<a class="mdl-navigation__link" href="<?php echo DOKU_BASE . "doku.php?id=wiki:dokuwiki" ?>">
    <i class="material-icons" role="presentation">done_all</i>
    First link</a>
<a class="mdl-navigation__link" href="<?php echo DOKU_BASE . "doku.php?id=playground:playground" ?>">
    <i class="material-icons" role="presentation">done</i>
    Second link</a>
<div class="mdl-layout-spacer"></div>
<a class="mdl-navigation__link" href="<?php echo DOKU_BASE . "about" ?>">
    <i class="material-icons" role="presentation">info_outline</i>
    About</a>
<a class="mdl-navigation__link" href="<?php echo DOKU_BASE . "help/" ?>">
    <i class="material-icons" role="presentation">help_outline</i>
    Help</a>