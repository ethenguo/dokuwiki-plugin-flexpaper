<?php
 /**
 * DokuWiki Plugin flexpaper (Syntax Component)
 *
 * @license GPL 2 http://www.gnu.org/licenses/gpl-2.0.html
 * @author  Ethen Guo <Ethen.Guo@Gmail.com>
 */

// must be run within Dokuwiki
if (!defined('DOKU_INC')) die();

if (!defined('DOKU_LF')) define('DOKU_LF', "\n");
if (!defined('DOKU_TAB')) define('DOKU_TAB', "\t");
if (!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');

require_once DOKU_PLUGIN.'action.php';

class action_plugin_flexpaper extends DokuWiki_Action_Plugin {

    // Register our handler for the TPL_METAHEADER_OUTPUT event
    public function register(Doku_Event_Handler &$controller) {
       $controller->register_hook('TPL_METAHEADER_OUTPUT', 'BEFORE', $this, 'load_required_javascript');
    }

    public function load_required_javascript(Doku_Event &$event, $param) {
        // Load flexpaper itself
        $event->data['script'][] = array(
			'type'    => 'text/javascript',
			'charset' => 'utf-8',
			'src'     => DOKU_REL . 'lib/plugins/flexpaper/FlexPaper/js/flexpaper.js',
			'_data'   => '',
		);
        // Load flexpaper_handlers
        $event->data['script'][] = array(
			'type'    => 'text/javascript',
			'charset' => 'utf-8',
			'src'     => DOKU_REL . 'lib/plugins/flexpaper/FlexPaper/js/flexpaper_handlers.js',
			'_data'   => '',
		);
	}
}

// vim:ts=4:sw=4:et:
