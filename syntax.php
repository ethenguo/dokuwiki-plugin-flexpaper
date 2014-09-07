<?php
/**
 * DokuWiki Plugin flexpaper (Syntax Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Ethen Guo <Ethen.Guo@Gmail.com>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();
if(!defined('DOKU_LF')) define('DOKU_LF',"\n");

class syntax_plugin_flexpaper extends DokuWiki_Syntax_Plugin {
    /**
     * @return string Syntax mode type
     */
    public function getType() {
        //return 'FIXME: container|baseonly|formatting|substition|protected|disabled|paragraphs';
        return 'container';
    }
    /**
     * @return string Paragraph type
     */
    public function getPType() {
        //return 'FIXME: normal|block|stack';
        return 'block';
    }
    /**
     * @return int Sort order - Low numbers go before high numbers
     */
    public function getSort() {
        //return FIXME;
        return 305;
    }

    /**
     * Connect lookup pattern to lexer.
     *
     * @param string $mode Parser mode
     */
    public function connectTo($mode) {
        //$this->Lexer->addSpecialPattern('<FIXME>',$mode,'plugin_flexpaper');
        $this->Lexer->addSpecialPattern('\{\{flex>.*?\}\}',$mode,'plugin_flexpaper');
    }

//    public function postConnect() {
//        $this->Lexer->addExitPattern('</flex>','plugin_flexpaper');
//    }

    /**
     * Handle matches of the flexpaper syntax
     *
     * @param string $match The match of the syntax
     * @param int    $state The state of the handler
     * @param int    $pos The position in the document
     * @param Doku_Handler    $handler The handler
     * @return array Data for the renderer
     */
    public function handle($match, $state, $pos, Doku_Handler &$handler){
		# Default width, height and stratpage
		$data = array('width' => '100%', 'height' => '588px', 'start' => '');

		$match = trim(substr($match, 7, -2));
		list($data['swf'], $params) = explode('?',$match);
		$params = explode(';',$params);

		# handle width, height and stratpage
		if($params) {
			foreach($params as $param) {
				list($key, $value) = explode(':',$param);
				switch($key) {
					case 'width' :
						$data[$key] = $value;
						break;
					case 'height' :
						$data[$key] = $value;
						break;
					case 'start' :
						$data[$key] = $value;
						break;
				}
			}
		}

		# handle configuration of flexpaper
		if(file_exists(mediaFN($foobar))) {
			$data['Scale'] = $this->getConf('Scale');
			$data['ZoomTransition'] = "'" . $this->getConf('ZoomTransition') . "'";
			$data['ZoomTime'] = $this->getConf('ZoomTime');
			$data['ZoomInterval'] = $this->getConf('ZoomInterval');
			$data['FitPageOnLoad'] = $this->getConf('FitPageOnLoad')?'true':'false';
			$data['FitWidthOnLoad'] = $this->getConf('FitWidthOnLoad')?'true':'false';

			$data['FullScreenAsMaxWindow'] = $this->getConf('FullScreenAsMaxWindow')?'true':'false';
			$data['ProgressiveLoading'] = $this->getConf('ProgressiveLoading')?'true':'false';
			$data['MaxZoomSize'] = $this->getConf('MaxZoomSize');
			$data['MinZoomSize'] = $this->getConf('MinZoomSize');
			$data['SearchMatchAll'] = $this->getConf('SearchMatchAll')?'true':'false';
			$data['InitViewMode'] = "'" . $this->getConf('InitViewMode') . "'";
			$data['PrintPaperAsBitmap'] = $this->getConf('PrintPaperAsBitmap')?'true':'false';

			$data['ViewModeToolsVisible'] = $this->getConf('ViewModeToolsVisible')?'true':'false';
			$data['ZoomToolsVisible'] = $this->getConf('ZoomToolsVisible')?'true':'false';
			$data['NavToolsVisible'] = $this->getConf('NavToolsVisible')?'true':'false';
			$data['CursorToolsVisible'] = $this->getConf('CursorToolsVisible')?'true':'false';
			$data['SearchToolsVisible'] = $this->getConf('SearchToolsVisible')?'true':'false';
			$data['localeChain'] = "'" . $this->getConf('localeChain') . "'";
		}
		return $data;
    }

    /**
     * Render xhtml output or metadata
     *
     * @param string         $mode      Renderer mode (supported modes: xhtml)
     * @param Doku_Renderer  $renderer  The renderer
     * @param array          $data      The data from the handler() function
     * @return bool If rendering was successful.
     */
    public function render($mode, Doku_Renderer &$renderer, $data) {
        if($mode != 'xhtml') return false;

		$renderer->doc .= '<div class="plugin_flexpaper" style="background: #FFB">' . DOKU_LF;
		$renderer->doc .= '<div id="documentViewer" class="flexpaper_viewer" style="width:' . $data['width'] . '; height:' . $data['height'] . '"></div>' . DOKU_LF;
		$renderer->doc .= '<script type="text/javascript">/*<![CDATA[*/' . DOKU_LF;
		$renderer->doc .= 'jQuery(\'#documentViewer\').FlexPaperViewer(' . DOKU_LF;
		$renderer->doc .= '    { config : {' . DOKU_LF;
		$renderer->doc .= '        jsDirectory : \'' . DOKU_REL . 'lib/plugins/flexpaper/FlexPaper/js/\',' . DOKU_LF;
		$renderer->doc .= '        SWFFile : escape(\'../..' . DOKU_REL . 'lib/exe/fetch.php?media=' . $data['swf'] . '\'),' . DOKU_LF;

		$renderer->doc .= '        Scale : ' . $data['Scale'] . ',' . DOKU_LF;
		$renderer->doc .= '        ZoomTransition : ' . $data['ZoomTransition'] .',' . DOKU_LF;
		$renderer->doc .= '        ZoomTime : ' . $data['ZoomTime'] . ',' . DOKU_LF;
		$renderer->doc .= '        ZoomInterval : ' . $data['ZoomInterval'] . ',' . DOKU_LF;
		$renderer->doc .= '        FitPageOnLoad : ' . $data['FitPageOnLoad'] . ',' . DOKU_LF;
		$renderer->doc .= '        FitWidthOnLoad : ' . $data['FitWidthOnLoad'] . ',' . DOKU_LF;

		$renderer->doc .= '        FullScreenAsMaxWindow : ' . $data['FullScreenAsMaxWindow'] . ',' . DOKU_LF;
		$renderer->doc .= '        ProgressiveLoading : ' . $data['ProgressiveLoading'] . ',' . DOKU_LF;
		$renderer->doc .= '        MaxZoomSize : ' . $data['MaxZoomSize'] . ',' . DOKU_LF;
		$renderer->doc .= '        MinZoomSize : ' . $data['MinZoomSize'] . ',' . DOKU_LF;
		$renderer->doc .= '        SearchMatchAll : ' . $data['SearchMatchAll'] . ',' . DOKU_LF;
		$renderer->doc .= '        InitViewMode : ' . $data['InitViewMode'] . ',' . DOKU_LF;
		$renderer->doc .= '        PrintPaperAsBitmap : ' . $data['PrintPaperAsBitmap'] . ',' . DOKU_LF;

		$renderer->doc .= '        ViewModeToolsVisible : ' . $data['ViewModeToolsVisible'] . ',' . DOKU_LF;
		$renderer->doc .= '        ZoomToolsVisible : ' . $data['ZoomToolsVisible'] . ',' . DOKU_LF;
		$renderer->doc .= '        NavToolsVisible : ' . $data['NavToolsVisible'] . ',' . DOKU_LF;
		$renderer->doc .= '        CursorToolsVisible : ' . $data['CursorToolsVisible'] . ',' . DOKU_LF;
		$renderer->doc .= '        SearchToolsVisible : ' . $data['SearchToolsVisible'] . ',' . DOKU_LF;
		$renderer->doc .= '        RenderingOrder : \'flash,html\',' . DOKU_LF;
		$renderer->doc .= '        StartAtPage : \'' . $data['start'] . '\',' . DOKU_LF;

#		$renderer->doc .= '        foobar : ' . $data['foobar'] . ',' . DOKU_LF;
		$renderer->doc .= '        localeChain : ' . $data['localeChain'] . DOKU_LF;
		$renderer->doc .= '    }}' . DOKU_LF;
		$renderer->doc .= ');' . DOKU_LF;
		$renderer->doc .= '/*!]]>*/</script>' . DOKU_LF;
		$renderer->doc .= '</div>' . DOKU_LF;

        return true;
    }
}

// vim:ts=4:sw=4:et:
