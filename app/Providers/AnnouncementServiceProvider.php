<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Event;
use View;
use URL;

class AnnouncementServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    Public Static function event(Event $event){

      // Production
      //$webhookurl = "https://discordapp.com/api/webhooks/451498488426004490/TEE1gsIgHFmt3P9pdmx_kqLXAIqlBsULGnWe7r-UqbCL6TShz1y2HEbMehCE0kA30OO2";

      // Testing
      $webhookurl = "https://discordapp.com/api/webhooks/451462855909310466/OICfFkL8nUjstkDJNrs-1Wg9dxfQRDr-E1mhZDfYIr06i3dRhhOAKVvCc7G4tzi4WDIp";

      //=======================================================================
      // Compose message. You can use Markdown
      //=======================================================================
      $baseUrl = URL::to("/");
      $msg = View("Announcements.newEvent", compact("event","baseUrl"))->render();
      $json_data = array ('content'=>"$msg");
      $make_json = json_encode($json_data);
      $ch = curl_init( $webhookurl );
      curl_setopt( $ch, CURLOPT_POST, 1);
      curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
      curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt( $ch, CURLOPT_HEADER, 0);
      curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

      $response = curl_exec( $ch );
    }
}
