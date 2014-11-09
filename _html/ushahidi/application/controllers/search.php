<?php defined('SYSPATH') or die('No direct script access.');
/**
 * Search controller
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com>
 * @package    Ushahidi - http://source.ushahididev.com
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL)
 */

class Search_Controller extends Main_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->auto_render = false;
	}

	/**
	 * Build a search query with relevancy
	 * Stop word control included
	 */
	public function index($page = 1)
	{
		$this->template->content = new View('search');

		$search_query = "";
		$keyword_string = "";
		$where_string = "";
		$plus = "";
		$or = "";
		$search_info = "";
		$html = "";
		$pagination = "";
		$arr = array();
		$keywords = array();

		$keyword_raw = '';

		// Stop words that we won't search for
		// Add words as needed!!
		$stop_words = array('the', 'and', 'a', 'to', 'of', 'in', 'i', 'is', 'that', 'it',
			'on', 'you', 'this', 'for', 'but', 'with', 'are', 'have', 'be',
			'at', 'or', 'as', 'was', 'so', 'if', 'out', 'not'
		);

		if ($_GET)
		{
			/**
			 * NOTES: 15/10/2010 - Emmanuel Kala <emmanuel@ushahidi.com>
			 *
			 * The search string undergoes a 3-phase sanitization process. This is not optimal
			 * but it works for now. The Kohana provided XSS cleaning mechanism does not expel
			 * content contained in between HTML tags this the "bruteforce" input sanitization.
			 *
			 * However, XSS is attempted using Javascript tags, Kohana's routing mechanism strips
			 * the "<script>" tags from the URL variables and passes inline text as part of the URL
			 * variable - This has to be fixed
			 */

			// Phase 1 - Fetch the search string and perform initial sanitization
			$keyword_raw = (isset($_GET['k']))? preg_replace('#/\w+/#', '', $_GET['k']) : "";

			// Phase 2 - Strip the search string of any HTML and PHP tags that may be present for additional safety
			$keyword_raw = strip_tags($keyword_raw);

			// Phase 3 - Apply Kohana's XSS cleaning mechanism
			$keyword_raw = $this->input->xss_clean($keyword_raw);
		}
		else
		{
			$keyword_raw = "";
		}

		// Database instance
		$db = new Database();



				$arr = array();
				$fromGoogle = array();
				$main = array();

			if ( ! empty($keyword_raw))
			{

				$curlString = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=" . urlencode($keyword_raw) . "&key=AIzaSyDVRjEjiHlXyoNp8Il2vXB64aRL2mlzzjk&location=43.7182713,-79.3777061&radius=10000";

				//https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=CoQBcwAAAH3x4xqo5NtRJTwiEhxQeKk_FbEx-bfEIynadsigUUYpqrI933eH2yag8NNzVoN3Cs7zpIem97XnlPjmYohznIXOy4JV3hQI8TZzJpHbXJZar6IrX-vfHoznznjnhOlyO72Ziu3_I3CNnEa3a5el4f2foXJIGKh3kfbkM4nEUisTEhDppKWPBL7D2KjFwS0elXLIGhTZkBJIyUUVJQl5qjJ3qDOh1Icpdg&key=AIzaSyDVRjEjiHlXyoNp8Il2vXB64aRL2mlzzjk

				//echo $curlString;

				// Get cURL resource
				$curl = curl_init();
				// Set some options - we are passing in a useragent too here
				curl_setopt_array($curl, array(
				    CURLOPT_RETURNTRANSFER => 1,
				    CURLOPT_URL => $curlString
				));
				// Send the request & save response to $resp
				$resp = json_decode(curl_exec($curl), true);
				// Close request to clear up some resources
				curl_close($curl);

				for($i=0; $i<count($resp['results']); $i++){
					$fromGoogle[$resp['results'][$i]['place_id']] = array();
					array_push($fromGoogle[$resp['results'][$i]['place_id']], $resp['results'][$i]);
				  array_push($arr, $resp['results'][$i]['place_id']);
				}
			}
		//}

		if ( ! empty($arr))
		{
			//$query = $db->query("select * from incident where place_id find_in_set (place_id, :arr)", $pagination->sql_offset, (int)Kohana::config('settings.items_per_page'));
			$sqlString = "select * from incident where place_id in ('" . implode("','", $arr) . "')";
			$query = $db->query($sqlString);

			// Results Bar
			if (count($query) != 0)
			{
				$search_info .= "<div class=\"search_info\">"
							. "Showing " . count($query)
							. ' results for the search <strong>'. $keyword_raw . "</strong>"
							. "</div>";
			}
			else
			{
				$search_info .= "<div class=\"search_info\">0 ".Kohana::lang('ui_admin.results')."</div>";

				$html .= "<div class=\"search_result\">";
				$html .= "<h3>".Kohana::lang('ui_admin.your_search_for')."<strong> ".$keyword_raw."</strong> ".Kohana::lang('ui_admin.match_no_documents')."</h3>";
				$html .= "</div>";

				$pagination = "";
			}

			$results = array();

			foreach ($query as $search)
			{
				$main[$search->place_id] = array();
				$main[$search->place_id]['thoughtspot'] = $search;
				$main[$search->place_id]['google'] = $fromGoogle[$search->place_id][0];
				if(isset($main[$search->place_id]['google']['photos'])){
					$main[$search->place_id]['photo'] = "https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=" . $main[$search->place_id]['google']['photos'][0]['photo_reference'] . "&key=AIzaSyDVRjEjiHlXyoNp8Il2vXB64aRL2mlzzjk";
				}

				array_push($results, $search);


			}
		}

		function cmp($a, $b)
		{
		    if ($a['google']['name'] == $b['google']['name']) {
		        return 0;
		    }
		    return ($a['google']['name'] < $b['google']['name']) ? -1 : 1;
		}



		uasort($main, "cmp");

		//echo json_encode($results);
		//echo json_encode($main);

		//$html .= $pagination;

		$this->template->content->search_info = '';
		$this->template->content->search_results = '';

		// Rebuild Header Block
		//$this->template->header->header_block = $this->themes->header_block();
		//$this->template->footer->footer_block = $this->themes->footer_block();
    }
}
