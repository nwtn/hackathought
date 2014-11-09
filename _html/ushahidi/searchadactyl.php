<?php

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

    array_push($results, $search);


  }
}

//echo json_encode($results);
echo json_encode($main);