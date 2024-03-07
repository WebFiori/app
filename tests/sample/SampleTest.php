<?php
namespace sample;

use PHPUnit\Framework\TestCase;
use webfiori\framework\App;
use webfiori\framework\config\JsonDriver;
/**
 * A sample unit test class.
 */
class SampleTest extends TestCase {
    /**
     * @test
     */
    public function test00() {
        $this->assertTrue(App::getConfig() instanceof JsonDriver);
    }
}
