<?php

//$search_query = "select incident.id, incident.place_id, form_response.form_response from incident incident inner join form_response form_response on incident.id = form_response.incident_id where form_response.form_field_id = 74";
$search_query = "select incident.id, incident.incident_title, incident.place_id from incident incident";
    $query = $db->query($search_query);

    foreach ($query as $search)
    {
      $url = 'https://maps.googleapis.com/maps/api/place/textsearch/json?query=' . urlencode($search->incident_title) . '&key=AIzaSyDVRjEjiHlXyoNp8Il2vXB64aRL2mlzzjk';

      echo $url;

      // Get cURL resource
      $curl = curl_init();
      // Set some options - we are passing in a useragent too here
      curl_setopt_array($curl, array(
          CURLOPT_RETURNTRANSFER => 1,
          CURLOPT_URL => $url
      ));


      // Send the request & save response to $resp
      $resp = json_decode(curl_exec($curl), true);
      // Close request to clear up some resources
      curl_close($curl);

      if(isset($resp['results'][0])){

        $place_id = $resp['results'][0]['place_id'];

        $update_query = "update incident set place_id = '" . $place_id . "' where id = " . $search->id;
        echo $update_query . '<br/>';
        $update_query_done = $db->query($update_query);
      }
    }