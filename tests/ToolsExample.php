<?php
namespace tolgatasci\soundcloud\tests;
use Tests\TestCase;

use Tolgatasci\Soundcloud\Soundcloud;
class ToolsExample extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Do something
    }

    protected function tearDown(): void
    {
        // Do something
        parent::tearDown();
    }
    public function test_convert_time_to_text()
    {
        $this->expectNotToPerformAssertions();
        $musics = Soundcloud::api()->musics("1063731295");
        $duration = $musics[0]->duration;
        dump(Soundcloud::tools()->time_to_text($duration));
    }
}
