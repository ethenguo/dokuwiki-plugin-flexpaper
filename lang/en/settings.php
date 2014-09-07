<?php
/**
 * english language file for flexpaper plugin
 *
 * @author Ethen Guo <Ethen.Guo@Gmail.com>
 */

// keys need to match the config setting name
// $lang['fixme'] = 'FIXME';

$lang['SwfFile'] = '(String) The flash document FlexPaper should open';
$lang['JSONFile'] = '(String) The json document FlexPaper should open. Mark the page number with {page} if you are loading FlexPaper in split mode (e.g. Paper.pdf_{page}.js). This only applies to FlexPaper with AdaptiveUI enabled.';
$lang['IMGFiles'] = '(String) The pages as images FlexPaper should open. Mark page number with {page} (e.g. Paper.pdf_{page}.png}). This only applies to FlexPaper with AdaptiveUI enabled.';
$lang['Scale'] = '<b>(Number)</b> The initial zoom factor that should be used. Should be a number above 0 (1=100%)';
$lang['ZoomTransition'] = '<b>(String)</b> The zoom transition that should be used when zooming in FlexPaper. It uses the same Transition modes as the Tweener. The default value is easeOut. Some examples: easenone, easeout, linear, easeoutquad';
$lang['ZoomTime'] = '<b>(Number)</b> The time it should take for the zoom to reach the new zoom factor. Should be 0 or greater.';
$lang['ZoomInterval'] = '<b>(Number)</b> The interval which the zoom slider should be using. Basically how big the "step" should be between each zoom factor. The default value is 0.1. Should be a positive number.';
$lang['FitPageOnLoad'] = '(Boolean) Fits the page on initial load. Same effect as using the fit-page button in the toolbar.';
$lang['FitWidthOnLoad'] = '(Boolean) Fits the width on initial load. Same effect as using the fit-width button in the toolbar.';
$lang['FullScreenAsMaxWindow'] = '(Boolean) With this set to true, clicking on fullscreen will open a new browser window with FlexPaper maximized instead of using true fullscreen. This is a preferred setting when using FlexPaper as flash standalone as the security limitations of the Flash player disables (for security reasons) most of the input controls in true fullscreen.';
$lang['ProgressiveLoading'] = '(Boolean) Will load and display the document progressively when set to true as opposed to downloading the complete document before displaying the pages. Documents need to be converted to at least Flash version 9 for this to work (-T 9 flag using PDF2SWF). Please observe that this parameter has no effect in FlexPaper Zine. Please use split page loading for large documents in FlexPaper Zine.';
$lang['MaxZoomSize'] = '<b>(Number)</b> Sets the maximum allowed zoom level';
$lang['MinZoomSize'] = '<b>(Number)</b> Sets the minimum allowed zoom level';
$lang['SearchMatchAll'] = '<b>(Boolean)</b> When set to true, the viewer highlights all matches when performing searches in a document.';
$lang['InitViewMode'] = '(String) Sets the start-up view mode. For example "Portrait" or "TwoPage".';
$lang['PrintPaperAsBitmap'] = '(Boolean) When set to true, the viewer will print the document as a bitmap as opposed to vectorized';
$lang['StartAtPage'] = '(Number) Instructs the viewer to start at a specific page';
$lang['ViewModeToolsVisible'] = '(Boolean) Shows or hides view modes from the tool bar';
$lang['ZoomToolsVisible'] = '(Boolean) Shows or hides zoom tools from the tool bar';
$lang['NavToolsVisible'] = '(Boolean) Shows or hides nav tools from the tool bar';
$lang['CursorToolsVisible'] = '(Boolean) Shows or hides cursor tools from the tool bar';
$lang['SearchToolsVisible'] = '(Boolean) Shows or hides search tools from the tool bar';
$lang['localeChain'] = '(String) Sets the locale (language) to use. The following languages are currently supported:<br/>
en_US (English)<br/>
fr_FR (French)<br/>
zh_CN (Chinese, Simple)<br/>
es_ES (Spanish)<br/>
pt_BR (Brazilian Portugese)<br/>
ru_RU (Russian)<br/>
fi_FN (Finnish)<br/>
de_DE (German)<br/>
nl_NL (Netherlands)<br/>
tr_TR (Turkish)<br/>
se_SE (Swedish)<br/>
pt_PT (Portugese)<br/>
el_EL (Greek)<br/>
dn_DN (Danish)<br/>
cz_CS (Czech)<br/>
it_IT (Italian)<br/>
pl_PL (Polish)<br/>
pv_FN (Finnish)<br/>
hu_HU (Hungarian)';

//Setup VIM: ex: et ts=4 :
