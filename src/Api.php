<?php
namespace Tolgatasci\Soundcloud;
use Ixudra\Curl\Facades\Curl;
class Api
{
    private $BASE_API  = 'https://api-v2.soundcloud.com/';

    public function __construct(){

    }
    /*
     * if not exits client_id adding
     * @param $url String
     * return string
     */
    public function fixed_url($url){
        if(!preg_match('/client_id\=/i',$url)){
            $url = $url. '&client_id='.config('soundcloud.client_id');
        }
        return $url;
    }
    /*
     * Search Result
     * @param $url String
     * return Json
     */
    public function call($url){
        $response = Curl::to($this->fixed_url($url))
            ->asJson()
            ->get();
        return $response;
    }
    /*
     * Suggest
     * @param $text String
     * @param $limit Int
     * @param $offset Int
     * return Json
     */
    public function suggest($text,$limit = 5, $offset = 0){
        $data = [
            "q" => $text,
            "limit" => $limit,
            "offset" => $offset,
            "client_id" => config('soundcloud.client_id'),
            "linked_partitioning" => 1,
            "app_version" => config('soundcloud.app_version'),
            "app_locale" => config('soundcloud.app_locale'),
        ];
        $response = Curl::to($this->BASE_API."search/queries")
            ->withData($data)
            ->asJson()
            ->get();
        return $response;
    }
    /*
     * Search Result
     * @param $text String
     * @param $limit Int
     * @param $offset Int
     * return Json
     */
    public function search_tracks($text,$limit = 20, $offset = 0){
        $data = [
            "q" => $text,
            "variant_ids" => "",
            "facet" => "genre",
            "limit" => $limit,
            "offset" => $offset,
            "client_id" => config('soundcloud.client_id'),
            "linked_partitioning" => "1",
            "app_version" => config('soundcloud.app_version'),
            "app_locale" => config('soundcloud.app_locale'),
        ];
        $response = Curl::to($this->BASE_API."search/tracks")
            ->withData($data)
            ->asJson()
            ->get();
        return $response;
    }
    /*
     * Get Music or Musics
     * @param $ids String 1063731295,1063731295,1063731295,1063731295 max 50
     * return Json array
     */
    public function musics($ids){
        $data = [
            "ids" => $ids,
            "variant_ids" => "",
            "client_id" => config('soundcloud.client_id'),
            "linked_partitioning" => "1",
            "app_version" => config('soundcloud.app_version'),
            "app_locale" => config('soundcloud.app_locale'),
        ];

        $response = Curl::to($this->BASE_API."tracks")
            ->withData($data)
            ->asJson()
            ->get();
        return $response;
    }
    /*
     * Get Music Related
     * @param $id int Music id
     * return Json
     */
    public function related($id,$limit = 20, $offset = 0){

        $data = [
            "client_id" => config('soundcloud.client_id'),
            "limit" => $limit,
            "offset" => $offset,
            "linked_partitioning" => "1",
            "app_version" => config('soundcloud.app_version'),
            "app_locale" => config('soundcloud.app_locale'),
        ];

        $response = Curl::to($this->BASE_API."tracks/".$id."/related")
            ->withData($data)
            ->asJson()
            ->get();
        return $response;
    }
    /*
     * Get Music Featured
     * @param $limit int
     * return Json
     *
     */
    public function featured($limit = 100){

        $data = [
            "client_id" => config('soundcloud.client_id'),
            "limit" => $limit,
            "app_version" => config('soundcloud.app_version'),
            "app_locale" => config('soundcloud.app_locale'),
        ];

        $response = Curl::to($this->BASE_API."featured_tracks/top/all-music")
            ->withData($data)
            ->asJson()
            ->get();
        return $response;
    }
    /*
     * Get Search Playlists
     * @param $text String
     * return Json
     *
     */
    public function search_playlist($text,$limit = 20, $offset = 0){

        $data = [
            "q" => $text,
            "facet" => "genre",
            "client_id" => config('soundcloud.client_id'),
            "limit" => $limit,
            "offset" => $offset,
            "linked_partitioning" => "1",
            "app_version" => config('soundcloud.app_version'),
            "app_locale" => config('soundcloud.app_locale'),
        ];

        $response = Curl::to($this->BASE_API."search/playlists_without_albums")
            ->withData($data)
            ->asJson()
            ->get();
        return $response;
    }
    /*
     * Get User
     * @param $id int
     * return Json
     *
     */
    public function user($id){

        $data = [
            "client_id" => config('soundcloud.client_id'),
            "linked_partitioning" => "1",
            "app_version" => config('soundcloud.app_version'),
            "app_locale" => config('soundcloud.app_locale'),
        ];

        $response = Curl::to($this->BASE_API."users/".$id)
            ->withData($data)
            ->asJson()
            ->get();
        return $response;
    }
    /*
     * Get Track Comments
     * @param $track_id int
     * return Json
     *
     */
    public function comments($track_id,$limit = 20,$offset = 0){

        $data = [
            "client_id" => config('soundcloud.client_id'),
            "filter_replies" => 0,
            "threaded"=>1,
            "limit" => $limit,
            "offset" => $offset,
            "app_version" => config('soundcloud.app_version'),
            "app_locale" => config('soundcloud.app_locale'),
        ];

        $response = Curl::to($this->BASE_API."tracks/".(int)$track_id."/comments")
            ->withData($data)
            ->asJson()
            ->get();
        return $response;
    }
    /*
     * Get Track Comments
     * @param $user_id int
     * return Json
     *
     */
    public function WebProfiles($user_id,$limit = 20,$offset = 0){

        $data = [
            "client_id" => config('soundcloud.client_id'),
            "filter_replies" => 0,
            "threaded"=>1,
            "limit" => $limit,
            "offset" => $offset,
            "app_version" => config('soundcloud.app_version'),
            "app_locale" => config('soundcloud.app_locale'),
        ];

        $response = Curl::to($this->BASE_API."users/soundcloud:users:".$user_id."/web-profiles")
            ->withData($data)
            ->asJson()
            ->get();
        return $response;
    }
    /*
     * Get playlist
     * @param $playlist_id int
     * return Json
     *
     */
    public function playlist($playlist_id){

        $data = [
            "client_id" => config('soundcloud.client_id'),
            "representation"=>"full",
            "app_version" => config('soundcloud.app_version'),
            "app_locale" => config('soundcloud.app_locale'),
        ];

        $response = Curl::to($this->BASE_API."playlists/".(int)$playlist_id)
            ->withData($data)
            ->asJson()
            ->get();
        return $response;
    }
}
