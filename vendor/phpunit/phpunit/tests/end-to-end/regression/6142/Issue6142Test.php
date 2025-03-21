<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\TestFixture\Issue6142;

use PHPUnit\Framework\TestCase;

final class Issue6142Test extends TestCase
{
    public function testOne(): void
    {
        $expected = __DIR__ . '/expected.json';
        $actual   = __DIR__ . '/actual.json';

        $this->assertJsonFileEqualsJsonFile($expected, $actual);
    }
}
