<?php  




        $arr_plan_data = array();

        $hotel_destination = 'Singapore';
        $hotel_checkin_date = '2020-05-01';
		$hotel_checkout_date = '2020-05-05';
		$hotel_guest_no = 1;
		$hotel_rooms = 1;

		//https://www.agoda.com/pages/agoda/default/DestinationSearchResult.aspx?city=5085&checkIn=2017-11-02&los=1&rooms=1&adults=1&children=0&cid=-1&pagetypeid=1&origin=SG&tag=&gclid=&aid=114955&languageId=1&storefrontId=3&currencyCode=SGD&htmlLanguage=en-us&trafficType=Web&cultureInfoName=en-US&checkOut=2017-11-03&childages=&sort=priceLowToHigh




		$agoda_url = 'https://www.agoda.com/pages/agoda/default/DestinationSearchResult.aspx?city=5085&cid=1464882&tick=636452286589&txtuuid=e88e2f78-a247-4897-8651-ee969309c439&pagetypeid=509&origin=SG&tag=&gclid=&aid=137611&userId=f0c5632f-5e83-4573-9218-eb87503aecdb&languageId=1&storefrontId=3&currencyCode=SGD&htmlLanguage=en-us&trafficType=User&cultureInfoName=en-US&textToSearch=tokyo&guid=e88e2f78-a247-4897-8651-ee969309c439&rooms=1&adults=2&children=0&childAges=&checkIn='.$hotel_checkin_date.'&checkOut='.$hotel_checkout_date.'&isUpdateAsq=true&los=1&childages=&ckuid=f0c5632f-5e83-4573-9218-eb87503aecdb&sort=priceLowToHigh';

		$section = file_get_contents($agoda_url);

		$pattern = '/var initialResults \\=(.*)\\]\\}\\;/';
		$result = preg_match ($pattern, $section , $matches );

		$agoda_json_scrape_output = str_replace('var initialResults = ', '', $matches[0]);
		$agoda_json_scrape_output = str_replace(';', '', $agoda_json_scrape_output);


		$agoda_json_data = json_decode($agoda_json_scrape_output);

		$data['agoda_data'] = $agoda_json_data->ResultList[0];


		echo '<pre>';
		print_r($section);


?>