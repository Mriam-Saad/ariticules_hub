<?php

namespace Drupal\currentweather\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;

/**
 * Provides a 'weatherblock' block.
 *
 * @Block(
 *  id = "weather_block",
 *  admin_label = @Translation("Weather block"),
 *  category = @Translation("Custom")
 * )
 */
class weatherblock extends BlockBase {

    /**
     * {@inheritdoc}
     */
    public function build()
    {
      $client = \Drupal::httpClient();
# Part 1 (get latitude & longitude)

      //get visitor ip address
    //  $ip = Drupal::request()->getClientIp();
      $ip='1.2.3.4';
      $api_1 = 'https://ipapi.co/' . $ip . '/latlong/';
      //get visitor location
      $location = file_get_contents($api_1);
      $point = explode(",", $location);

      try {
# Part 2 (get weather forecast)


        //call apenweathermap api
        $request = $client->request('GET', 'http://api.openweathermap.org/data/2.5/weather?lat=' . $point[0] . '&lon=' . $point[1] . '&appid=7e67af6b9b31a666a77beef4c984aa9b');
        $response = $request->getBody()->getContents();
        $mainarray = (array)json_decode($response);
        $currentweatherarray = (array)$mainarray['main'];

      } catch (RequestException $e) {
        $errormsg = $e->getMessage();
      }

      $build['weather_block']['#markup'] = \Drupal::theme()->render('weather_block',
        array(
          'temp' => $currentweatherarray['temp'],
          'feels_like' => $currentweatherarray['feels_like'],
          'pressure' => $currentweatherarray['pressure'],
        ));
      return $build;
    }

}
