<?php

declare(strict_types=1);

/*
 * This file is part of ByteBuffer.
 *
 * (c) KodeKeep <hello@kodekeep.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace KodeKeep\Tests\ByteBuffer;

use KodeKeep\ByteBuffer\LengthMap;
use PHPUnit\Framework\TestCase;

/**
 * This is the length map test class.
 *
 * @author Brian Faust <hello@basecode.sh>
 * @covers \KodeKeep\ByteBuffer\LengthMap
 */
class LengthMapTest extends TestCase
{
    /** @test */
    public function it_should_get_the_length_for_string()
    {
        $this->assertSame(33, LengthMap::get('a33'));
    }

    /** @test */
    public function it_should_get_the_length_for_float()
    {
        $this->assertSame(33, LengthMap::get('f33'));
    }

    /** @test */
    public function it_should_get_the_length_for_double()
    {
        $this->assertSame(33, LengthMap::get('d33'));
    }

    /** @test */
    public function it_should_get_the_length_for_hex_with_low_nibble()
    {
        $this->assertSame(33, LengthMap::get('h66'));
    }

    /** @test */
    public function it_should_get_the_length_for_hex_with_high_nibble()
    {
        $this->assertSame(33, LengthMap::get('H66'));
    }

    /** @test */
    public function it_should_get_the_length_from_the_array()
    {
        $this->assertSame(1, LengthMap::get('C'));
    }

    /** @test */
    public function it_should_throw_for_invalid_type()
    {
        $this->expectException(\InvalidArgumentException::class);

        LengthMap::get('_INVALID_');
    }
}
