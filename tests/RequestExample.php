<?php
namespace tolgatasci\soundcloud\tests;
use Tests\TestCase;

use Tolgatasci\Soundcloud\Soundcloud;
class RequestExample extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }
    public function test_suggest_keyword()
    {
        $this->expectNotToPerformAssertions();
        $data = Soundcloud::api()->suggest("t");
        dump($data);
    }

    public function test_get_tracks_with_id()
    {
        $this->expectNotToPerformAssertions();
        $musics = Soundcloud::api()->musics("1063731295");
        dump($musics);
    }
    public function test_search_tracks()
    {
        $this->expectNotToPerformAssertions();
        $musics = Soundcloud::api()->search_tracks("tarkan");
        dump($musics);
    }
    public function test_next_url()
    {
        $this->expectNotToPerformAssertions();
        $search = Soundcloud::api()->search_tracks("tarkan");
        $musics = Soundcloud::api()->call($search->next_href);
        dump($musics);
    }
    public function test_related_music()
    {
        $this->expectNotToPerformAssertions();
        $musics = Soundcloud::api()->related(1063731295);
        dump($musics);
    }
    public function test_featured_music()
    {
        $this->expectNotToPerformAssertions();
        $musics = Soundcloud::api()->featured();
        dump($musics);
    }
    public function test_search_playlist()
    {
        $this->expectNotToPerformAssertions();
        $musics = Soundcloud::api()->search_playlist("tarkan");
        dd($musics);
    }
    public function test_get_user()
    {
        $this->expectNotToPerformAssertions();
        $musics = Soundcloud::api()->user(988374727);
        dd($musics);
    }
    public function test_get_comments()
    {
        $this->expectNotToPerformAssertions();
        $musics = Soundcloud::api()->comments(143744209);
        dd($musics);
    }

    public function test_get_web_profiles()
    {
        $this->expectNotToPerformAssertions();
        $musics = Soundcloud::api()->WebProfiles(988374727);
        dd($musics);
    }
    public function test_get_playlist()
    {
        $this->expectNotToPerformAssertions();
        $musics = Soundcloud::api()->playlist(165400570);
        dd($musics);
    }
}
