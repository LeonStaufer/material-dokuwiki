<?php
/**
 * Metadata for configuration options
 */

$meta['dokuwikiSidebar'] = array('onoff');

$meta['feedbackForm'] = array('onoff');
$meta['technicalFeedbackForm'] = array('onoff');
$meta['feedbackEmail'] = array('email');
$meta['feedbackSubjectLine'] = array('string');
$meta['feedbackBody'] = array('string');

$meta['hiddenActions']  = array('multicheckbox','_choices' => array('edit','revs','backlink','export_pdf','top'));

$meta['protrudingDrawer'] = array('onoff');

$meta['subtlePagename'] = array('onoff');
