<?php
/**
 * Options for the flexpaper plugin
 *
 * @author Ethen Guo <Ethen.Guo@Gmail.com>
 */


//$meta['fixme'] = array('string');

$meta['Scale']    = array('numeric', '_min' => 0 ,'_max' => 1);
$meta['ZoomTransition']    = array('multichoice', '_choices' => array('easeOut', 'easenone', 'easeout', 'linear', 'easeoutquad'));
$meta['ZoomTime']    = array('numeric', '_min' => 0);
$meta['ZoomInterval']    = array('numeric', '_min' => 0);
$meta['FitPageOnLoad']    = array('onoff');
$meta['FitWidthOnLoad']    = array('onoff');

$meta['FullScreenAsMaxWindow']    = array('onoff');
$meta['ProgressiveLoading']    = array('onoff');
$meta['MaxZoomSize']    = array('numeric', '_min' => 0);
$meta['MinZoomSize']    = array('numeric', '_min' => 0);
$meta['SearchMatchAll']    = array('onoff');
$meta['InitViewMode']    = array('multichoice', '_choices' => array("Portrait", "TwoPage", "CADView"));
$meta['PrintPaperAsBitmap']   = array('onoff');

//$meta['RenderingOrder']    = array('string');
//$meta['StartAtPage']    = array('numericopt', '_min' => 0);

$meta['ViewModeToolsVisible']    = array('onoff');
$meta['ZoomToolsVisible']    = array('onoff');
$meta['NavToolsVisible']    = array('onoff');
$meta['CursorToolsVisible']    = array('onoff');
$meta['SearchToolsVisible']    = array('onoff');

//$meta['WMode']    = array('string');

$meta['localeChain']    = array('multichoice', '_choices' => array('en_US', 'fr_FR', 'zh_CN', 'es_ES', 'pt_BR',
																	'ru_RU', 'fi_FN', 'de_DE', 'nl_NL', 'tr_TR',
																	'se_SE', 'pt_PT', 'el_EL', 'dn_DN', 'cz_CS',
																	'it_IT', 'pl_PL', 'pv_FN', 'hu_HU'));
