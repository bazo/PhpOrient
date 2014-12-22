<?php
/**
 * User: Domenico Lupinetti ( Ostico )
 * Date: 15/12/14
 * Time: 1.48
 * 
 */

namespace PhpOrient\Abstracts;

use PhpOrient\Client;
use PhpOrient\Configuration\Constants as ClientConstants;

trait ClientTrait {

    /**
     * @return array the test server config
     */
    protected static function getConfig() {
        $config                   = json_decode( file_get_contents( __DIR__ . '/../../test-server.json' ), true );
        ClientConstants::$LOGGING       = $config[ 'logging' ];
        ClientConstants::$LOG_FILE_PATH = $config[ 'log_file_path' ];
        return $config;
    }

    /**
     * @return Client
     */
    protected function createClient() {
        $config = static::getConfig();
        $client = new Client();
        $client->configure( array(
            'username' => $config[ 'username' ],
            'password' => $config[ 'password' ],
            'hostname' => $config[ 'hostname' ],
            'port'     => $config[ 'port' ],
        ) );

        return $client;
    }

}