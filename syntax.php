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
        return 'normal';
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

		# 提取匹配的文件名与参数
		$match = trim(substr($match, 7, -2));
		list($file, $params) = explode('?',$match);

		# 检查是否是支持的文件类型 .swf, .pdf
		if(!preg_match('/.swf$|.pdf$/i', $file)) {
			$data['error'] = 'File <b>"<i>' . $file . '</i>"</b> is <b>NOT SUPPORT!</b>';
			return $data;
		}

		# 检查文件是否存在
		if(!file_exists(mediaFN($file))) {
			$data['error'] = 'File <b>"<i>' . $file . '</i>"</b> is <b>NOT EXIST!</b>';
			return $data;
		}

		# Default width, height and stratpage
		$data['width'] = '100%';
		$data['height'] = '588px';
		$data['start'] = '';

		# 分别处理 .swf 与 .pdf
		if(preg_match('/.swf$/i', $file)) {
			$data['swf'] = $file;
		} else {
			# 检查系统函数 exec 是否可用？
			if(!function_exists('exec')) {
				# 系统函数 exec 不可用，返回错误消息
				$data['error'] = 'PHP Function <b>"<a href="http://php.net/manual/en/function.exec.php"><i>exec()</i></a>"</b> is <b>NOT EXIST!</b> Please contact your server administrator.';
				return $data;
			}

			# 处理 .pdf: 用 SWFTOOLS 把 .pdf 转成 .swf 格式
			# pdf2swf [-options] file.pdf -o file.swf
			$swf = $file . '.swf';
			# swf 文件是否存在，不存在则执行 pdf 转 swf 命令；存在则可以直接显示
			if(!file_exists(mediaFN($swf))) {
				# 需执行的命令
				$command = '"' . DOKU_PLUGIN . 'flexpaper/SWFTools/pdf2swf" -f -T 9 "' . mediaFN($file) . '" -o "' . mediaFN($swf) . '"';
				# 执行命令
				$lastline = exec(escapeshellcmd($command),$output,$status);
				# 如果命令执行失败，返回命令行最后一行消息
				if($status) {
					$data['error'] = $lastline;
					return $data;
				}
				# .pdf 转换 .swf 文件成功
			}
			$data['swf'] = $swf;
		}

		# handle Parameters(width, height and stratpage)
		$params = explode(';',$params);
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

		if($data['error']) {
			$renderer->doc .= '<div id="documentViewer" class="plugin_flexpaper" style="background: #FFB; width: 100%">' . $data['error'] . '</div>' . DOKU_LF;
			return false;
		}

#		$renderer->doc .= '<div class="plugin_flexpaper" style="background: #DFD">' . DOKU_LF;
		$renderer->doc .= '<div id="documentViewer" class="plugin_flexpaper" style="background: #DFD; width:' . $data['width'] . '; height:' . $data['height'] . '">' . mediaFN($data['swf']) . '</div>' . DOKU_LF;
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
#		$renderer->doc .= '</div>' . DOKU_LF;

        return true;
    }
}

// vim:ts=4:sw=4:et:
