<?php
/*
Certifique-se de substituir 'SEU_ACCESS_TOKEN', 'SPOTIFY_PLAYLIST_ID', e 'YOUR_SPOTIFY_USER_ID' com suas próprias informações.

O código acima autenticará sua aplicação no Spotify e recuperará o nome das músicas da playlist especificada.

Lembre-se de que você precisa configurar a autenticação OAuth2 para obter o token de acesso da API do Spotify. Consulte a documentação do Spotify para obter detalhes sobre como fazer isso.
Além disso, esta é apenas uma implementação básica. Você pode estilizar e personalizar a saída de acordo com suas necessidades. */

require 'vendor/autoload.php';

use SpotifyWebAPI\SpotifyWebAPI;

$api = new SpotifyWebAPI();
$api->setAccessToken('SEU_ACCESS_TOKEN'); // Substitua 'SEU_ACCESS_TOKEN' pelo seu token de acesso

// Substitua 'SPOTIFY_PLAYLIST_ID' pelo ID da sua playlist
$playlistId = 'SPOTIFY_PLAYLIST_ID';

try {
    $playlist = $api->getUserPlaylist('YOUR_SPOTIFY_USER_ID', $playlistId);
    $tracks = $playlist->tracks->items;

    echo '<h1>Músicas da Playlist:</h1>';
    echo '<ul>';
    foreach ($tracks as $track) {
        echo '<li>' . $track->track->name . '</li>';
    }
    echo '</ul>';
} catch (Exception $e) {
    echo 'Erro: ' . $e->getMessage();
}
?>
