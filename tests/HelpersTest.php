<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

final class HelpersTest extends TestCase
{
    public function test_array_set_can_work_correctly(): void
    {
        $array = ['first' => true];

        array_set($array, 'second.key', 'second_key');

        $this->assertEquals('second_key', $array['second']['key']);
    }
}
