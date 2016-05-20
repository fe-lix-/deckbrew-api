<?php
/**
 * Created by PhpStorm.
 * User: felix
 * Date: 5/20/16
 * Time: 11:11 PM
 */

namespace DeckBrew;

use DeckBrew\Client as ApiClient;
use GuzzleHttp\Client as HttpClient;

class ClientFactory
{
    public static function create()
    {
        return new ApiClient(new HttpClient());
    }
}