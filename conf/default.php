<?php
/**
 * Default settings for the flexpaper plugin
 *
 * @author Ethen Guo <Ethen.Guo@Gmail.com>
 */

//$conf['fixme']    = 'FIXME';

$conf['Scale']    = 0.6;	# The initial zoom factor that should be used. Should be a number above 0 (1=100%)
$conf['ZoomTransition']    = 'easeOut';	# The zoom transition that should be used when zooming in FlexPaper. It uses the same Transition modes as the Tweener. The default value is easeOut. Some examples: easenone, easeout, linear, easeoutquad
$conf['ZoomTime']    = 0.5;	# The time it should take for the zoom to reach the new zoom factor. Should be 0 or greater.
$conf['ZoomInterval']    = 0.1;	# The interval which the zoom slider should be using. Basically how big the "step" should be between each zoom factor. The default value is 0.1. Should be a positive number.
$conf['FitPageOnLoad']    = 1;	# Fits the page on initial load. Same effect as using the fit-page button in the toolbar.
$conf['FitWidthOnLoad']    = 0;	# Fits the width on initial load. Same effect as using the fit-width button in the toolbar.

$conf['FullScreenAsMaxWindow']    = 0;	# With this set to true, clicking on fullscreen will open a new browser window with FlexPaper maximized instead of using true fullscreen. This is a preferred setting when using FlexPaper as flash standalone as the security limitations of the Flash player disables (for security reasons) most of the input controls in true fullscreen.
$conf['ProgressiveLoading']    = 0;
$conf['MaxZoomSize']    = 5;	# Sets the maximum allowed zoom level
$conf['MinZoomSize']    = 0.2;	# Sets the minimum allowed zoom level
$conf['SearchMatchAll']    = 0;	# When set to true, the viewer highlights all matches when performing searches in a document.
$conf['InitViewMode']    = 'Portrait';	# Sets the start-up view mode. For example "Portrait" or "TwoPage".
$conf['PrintPaperAsBitmap']   = 0;	# When set to true, the viewer will print the document as a bitmap as opposed to vectorized

//$conf['RenderingOrder']    = flash;
//$conf['StartAtPage']    = '';	# Instructs the viewer to start at a specific page

$conf['ViewModeToolsVisible']    = 1;	# Shows or hides view modes from the tool bar
$conf['ZoomToolsVisible']    = 1;	# Shows or hides zoom tools from the tool bar
$conf['NavToolsVisible']    = 1;	# Shows or hides nav tools from the tool bar
$conf['CursorToolsVisible']    = 1;	# Shows or hides cursor tools from the tool bar
$conf['SearchToolsVisible']    = 1;	# Shows or hides search tools from the tool bar

//$conf['WMode']    = 'window';

$conf['localeChain']    = 'zh_CN';	# Shows or hides search tools from the tool bar
