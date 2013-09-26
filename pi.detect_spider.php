<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * MIT License
 * ===========
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
 * CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 *
 * Detect Spider Plugin for ExpressionEngine 2
 *
 * @package     ExpressionEngine
 * @category    Plugin
 * @author      Mike Stecker
 * @copyright   Copyright (c) 2013
 * @link        http://www.mikestecker.com
 */

$plugin_info = array(
	'pi_name'			=> 'Detect Spider',
	'pi_version'		=> '1.0',
	'pi_author'			=> 'Mike Stecker',
	'pi_author_url'		=> 'http://www.mikestecker.com',
	'pi_description'	=> 'Plugin that detects a search engine crawler using PHP',
	'pi_usage'			=> Detect_spider::usage()
	);


class Detect_spider {
  
  public $return_data = "";
  
	// --------------------------------------------------------------------
  
  public function __construct()
  {
    
    function crawlerDetect($USER_AGENT) {
      $crawlers_agents = 'Google|GoogleBot|Googlebot|msnbot|Rambler|Yahoo|AbachoBOT|accoona|AcioRobot|ASPSeek|CocoCrawler|Dumbot|FAST-WebCrawler|GeonaBot|Gigabot|Lycos|MSRBOT|Scooter|AltaVista|IDBot|eStyle|Scrubby';
      $crawlers = explode("|", $crawlers_agents);
      foreach($crawlers as $crawler) {
        if ( strpos($USER_AGENT, $crawler) !== FALSE)
          return TRUE;
      }
      return FALSE;
    }
    if(crawlerDetect($_SERVER['HTTP_USER_AGENT']) === TRUE) {
      //$this->return_data = "go away bot";
      $this->return_data = TRUE;
    } else {
      //$this->return_data = "welcome to my website";
      $this->return_data = FALSE;
    }
  }
  
  
	// --------------------------------------------------------------------
	
	/**
     * Usage
     *
     * This function describes how the plugin is used.
     *
     * @access  public
     * @return  string
     */
	public static function usage()
	{
		ob_start();  ?>

		Lightweight PHP plugin for EE2 that detects a search engine crawlers using PHP
		
		Basic Usage
		=============

		Check if any crawlers
		{exp:detect_spider} - returns true or false
    
		Conditional check for a crawler
		{if '{exp:detect_spider}'}
		I am a search crawler
		{if:else}
		I am a normal visitor
		{/if}
    
		<?php
		$buffer = ob_get_contents();
		ob_end_clean();

		return $buffer;
	}
    // END
}

/* End of file pi.detect_spider.php */
/* Location: ./system/expressionengine/third_party/mobile_deetect/pi.detect_spider.php */
