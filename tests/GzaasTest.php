<?php
require_once __DIR__ . '/../Gzaas/bootstrap.php';
use Gzaas\Api;

class GzaasTest extends PHPUnit_Framework_TestCase
{
    public function testLists()
    {
        $fonts = Api\Fonts::factory()->getAll(Api::FEATURED);
        $this->assertTrue(count($fonts) > 0);
    }

    public function testStyles()
    {
        $fonts = Api\Styles::factory()->getAll(Api::FEATURED);
        $this->assertTrue(count($fonts) > 0);
    }

    public function testPatterns()
    {
        $fonts = Api\Patterns::factory()->getAll(Api::FEATURED);
        $this->assertTrue(count($fonts) > 0);
    }

    public function testCreateRandomStyles()
    {
        $font    = array_rand((array) Api\Fonts::factory()->getAll(Api::FEATURED));
        $style   = array_rand((array) Api\Styles::factory()->getAll(Api::FEATURED));
        $pattern = array_rand((array) Api\Patterns::factory()->getAll(Api::FEATURED));

        $gzaas = new Api();

        $url = $gzaas->setApiKey('mySuperSecretApiKey')
            ->setFont($font)
            ->setBackPattern($pattern)
            ->setStyle($style)
            ->setColor('444444')
            ->setBackcolor('fcfcee')
            ->setShadows('1px 0 2px #ccc')
            ->setVisibility(0)
            ->setLauncher("testin gzaas API");

        $this->assertTrue($url != '');
    }
}
