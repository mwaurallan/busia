<?php
namespace App\Providers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;
use GuzzleHttp\Client;

class DropboxServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
//        Storage::extend('dropbox', function (Application $app, array $config) {
//            $url = 'https://'.$config['key'].':'.$config['secret'].'@api.dropbox.com/oauth2/token';
//
//
//            $adapter = new DropboxAdapter(new DropboxClient(
////                $config['authorization_token'],
//            ));
//
//            return new FilesystemAdapter(
//                new Filesystem($adapter, $config),
//                $adapter,
//                $config
//            );
//        });

        Storage::extend( 'dropbox', function( Application $app, array $config )
        {
            $url = 'https://'.$config['key'].':'.$config['secret'].'@api.dropbox.com/oauth2/token';

            $resource = ( new Client() )->post( $url , [
                'form_params' => [
                    'grant_type' => 'refresh_token',
                    'refresh_token' => $config[ 'refresh_token' ]
                ]
            ]);

            $accessToken = json_decode( $resource->getBody(), true )[ 'access_token' ];
            $adapter = new DropboxAdapter( new DropboxClient( $accessToken ) );

            return new FilesystemAdapter( new Filesystem( $adapter, $config ), $adapter, $config );
        });
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
