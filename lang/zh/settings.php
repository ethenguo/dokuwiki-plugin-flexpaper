<?php
/**
 * Chinese language file for flexpaper plugin
 *
 * @author Ethen Guo <Ethen.Guo@Gmail.com>
 */

// keys need to match the config setting name
// $lang['fixme'] = 'FIXME';

$lang['SwfFile'] = '(String) The flash document FlexPaper should open';
$lang['JSONFile'] = '(String) The json document FlexPaper should open. Mark the page number with {page} if you are loading FlexPaper in split mode (e.g. Paper.pdf_{page}.js). This only applies to FlexPaper with AdaptiveUI enabled.';
$lang['IMGFiles'] = '(String) The pages as images FlexPaper should open. Mark page number with {page} (e.g. Paper.pdf_{page}.png}). This only applies to FlexPaper with AdaptiveUI enabled.';
$lang['Scale'] = '<b>(Number)</b> 初始化缩放比例，参数值应该是大于零的整数 (1=100%)';
$lang['ZoomTransition'] = '<b>(String)</b> The zoom transition that should be used when zooming in FlexPaper. It uses the same Transition modes as the Tweener. The default value is easeOut. Some examples: easenone, easeout, linear, easeoutquad';
$lang['ZoomTime'] = '<b>(Number)</b> 从一个缩放比例变为另外一个缩放比例需要花费的时间，该参数值应该为0或更大。';
$lang['ZoomInterval'] = '<b>(Number)</b> 缩放比例之间间隔，默认值为0.1，该值为正数。';
$lang['FitPageOnLoad'] = '(Boolean) 初始化得时候自适应页面，与使用工具栏上的适应页面按钮同样的效果。';
$lang['FitWidthOnLoad'] = '(Boolean) 初始化的时候自适应页面宽度，与工具栏上的适应宽度按钮同样的效果。';
$lang['FullScreenAsMaxWindow'] = '(Boolean) 当设置为true的时候，单击全屏按钮会打开一个flexpaper最大化的新窗口而不是全屏，当由于flash播放器因为安全而禁止全屏，而使用flexpaper作为独立的flash播放器的时候设置为true是个优先选择。';
$lang['ProgressiveLoading'] = '(Boolean) 当设置为true的时候，展示文档时不会加载完整个文档，而是逐步加载，但是需要将文档转化为9以上的flash版本（使用pdf2swf的时候使用-T 9 标签）。';
$lang['MaxZoomSize'] = '<b>(Number)</b> 设置最大的缩放比例。';
$lang['MinZoomSize'] = '<b>(Number)</b> 设置最小的缩放比例。';
$lang['SearchMatchAll'] = '<b>(Boolean)</b> 设置为true的时候，单击搜索所有符合条件的地方高亮显示。';
$lang['InitViewMode'] = '(String) 设置启动模式如"Portrait" 或 "TwoPage"。';
$lang['PrintPaperAsBitmap'] = '(Boolean) When set to true, the viewer will print the document as a bitmap as opposed to vectorized';
$lang['StartAtPage'] = '(Number) 在文档的特定页面开始阅读。';
$lang['ViewModeToolsVisible'] = '(Boolean) 工具栏上是否显示样式选择框。';
$lang['ZoomToolsVisible'] = '(Boolean) 工具栏上是否显示缩放工具。';
$lang['NavToolsVisible'] = '(Boolean) 工具栏上是否显示导航工具。';
$lang['CursorToolsVisible'] = '(Boolean) 工具栏上是否显示光标工具。';
$lang['SearchToolsVisible'] = '(Boolean) 工具栏上是否显示搜索。';
$lang['localeChain'] = '(String) 设置地区（语言），目前支持以下语言：<br/>
en_US (English)<br/>
fr_FR (French)<br/>
zh_CN (简体中文)<br/>
es_ES (Spanish)<br/>
pt_BR (Brazilian Portugese)<br/>
ru_RU (Russian)<br/>
fi_FN (Finnish)<br/>
de_DE (German)<br/>
nl_NL (Netherlands)<br/>
tr_TR (Turkish)<br/>
se_SE (Swedish)<br/>
pt_PT (Portugese)<br/>a
el_EL (Greek)<br/>
dn_DN (Danish)<br/>
cz_CS (Czech)<br/>
it_IT (Italian)<br/>
pl_PL (Polish)<br/>
pv_FN (Finnish)<br/>
hu_HU (Hungarian)';

//Setup VIM: ex: et ts=4 :
