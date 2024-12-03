<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SpotifyWebAPI\Session;
use SpotifyWebAPI\SpotifyWebAPI;
use GuzzleHttp\Client;

class ApiController extends Controller
{
    private $session;
    private $api;

    public function __construct()
    {
        // Configuración de la sesión de Spotify
        $this->session = new Session(
            env('SPOTIFY_CLIENT_ID'),
            env('SPOTIFY_CLIENT_SECRET'),
            env('SPOTIFY_REDIRECT_URI')
        );

        $this->api = new SpotifyWebAPI();
    }

    public function login()
    {
        session()->forget('spotify_access_token');

        // Permisos
        $scopes = [
            'user-read-private',
            'user-read-email',
            'user-library-read',
            'user-top-read',
        ];

        return redirect($this->session->getAuthorizeUrl([
            'scope' => $scopes,
        ]));
    }

    public function callback(Request $request)
    {
        if ($request->has('code')) {
            
            $this->session->requestAccessToken($request->code);
            $accessToken = $this->session->getAccessToken();

            $this->api->setAccessToken($accessToken);
            session(['spotify_access_token' => $accessToken]);

            $me = $this->api->me();

            return redirect('/top-artists')->with('success', '¡Autenticación exitosa!');
        }

        return redirect('/')->withErrors('No se pudo autenticar con Spotify');
    }

    public function getTopArtists()
    {
        $accessToken = session('spotify_access_token');

        if ($accessToken) {
            $this->api->setAccessToken($accessToken);

            $topArtists = $this->api->getMyTop('artists', [
                'limit' => 10,
                'time_range' => 'short_term', // 'short_term', 'medium_term', 'long_term'
            ]);

            $topTracks = $this->api->getMyTop('tracks', [
                'limit' => 12,
                'time_range' => 'short_term',
            ]);

            $favoriteAlbums = $this->api->getMySavedAlbums([
                'limit' => 12,
                'offset' => 0,
            ]);

            return view('topCantantes', compact('topArtists', 'topTracks', 'favoriteAlbums'));
        }

        return redirect('/login')->withErrors('Debes autenticarte para ver esta información.');
    }

    // Para dashboard sin credenciales
    private function getAccessToken()
    {
        $client = new Client();
        $response = $client->post('https://accounts.spotify.com/api/token', [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('SPOTIFY_CLIENT_ID'),
                'client_secret' => env('SPOTIFY_CLIENT_SECRET'),
            ],
        ]);

        return json_decode($response->getBody(), true)['access_token'];
    }

    public function index()
    {
        $accessToken = $this->getAccessToken();
        $client = new Client();

        $newReleasesResponse = $client->get('https://api.spotify.com/v1/browse/new-releases', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
        ]);
        $newReleases = json_decode($newReleasesResponse->getBody(), true)['albums']['items'];
        
        return view('welcome', [
            'newReleases' => $newReleases,
        ]);
    }
}



