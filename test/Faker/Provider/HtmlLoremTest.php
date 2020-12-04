<?php

namespace Faker\Test\Provider;

use Faker\Provider\HtmlLorem;
use Faker\Test\TestCase;

final class HtmlLoremTest extends TestCase
{
    public function testProvider()
    {
        $node = $this->faker->randomHtml(6, 10);
        self::assertStringStartsWith("<html>", $node);
        self::assertStringEndsWith("</html>\n", $node);
    }

    public function testRandomHtmlReturnsValidHTMLString()
    {
        $node = $this->faker->randomHtml(6, 10);
        $dom = new \DOMDocument();
        $error = $dom->loadHTML($node);
        self::assertTrue($error);
    }

    protected function getProviders(): iterable
    {
        yield new HtmlLorem($this->faker);
    }
}
