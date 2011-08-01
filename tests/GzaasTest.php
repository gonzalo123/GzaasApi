<?php
require_once __DIR__ . '/../Gzaas/bootstrap.php';
use Gzaas\Api;
use Gzaas\Api\Fonts;
use Gzaas\Api\Styles;
use Gzaas\Api\Patterns;

class GzaasTest extends PHPUnit_Framework_TestCase
{
    public function testFonts()
    {
        $fonts = Fonts::factory()->getAll(Api::FEATURED);
        $this->assertTrue(count($fonts) > 0);
    }

    public function testStyles()
    {
        $styles = Styles::factory()->getAll(Api::FEATURED);
        $this->assertTrue(count($styles) > 0);
    }

    public function testPatterns()
    {
        $patterns = Patterns::factory()->getAll(Api::FEATURED);
        $this->assertTrue(count($patterns) > 0);
    }

    public function testCreateRandomStyles()
    {
        $font    = array_rand((array) Fonts::factory()->getAll(Api::FEATURED));
        $style   = array_rand((array) Styles::factory()->getAll(Api::FEATURED));
        $pattern = array_rand((array) Patterns::factory()->getAll(Api::FEATURED));

        $gzaas = new Api();

        $obj = $gzaas->setApiKey('mySuperSecretApiKey')
            ->setFont($font)
            ->setBackPattern($pattern)
            ->setStyle($style)
            ->setColor('444444')
            ->setBackcolor('fcfcee')
            ->setShadows('1px 0 2px #ccc')
            ->setVisibility(0)
            ->setLauncher("testin gzaas API");

        $this->assertTrue($obj instanceof Api);
        $url = $obj->create("Gzaas is cool");

        $this->assertTrue($url != '');
    }
}