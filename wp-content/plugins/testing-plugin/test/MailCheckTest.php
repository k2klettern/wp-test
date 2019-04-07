<?php

use PHPUnit\Framework\TestCase;
use ezdev\TestingPlugin\Services\MailCheck;

final class MailCheckTest extends TestCase
{
	public function testCanBeCreatedFromValidEmailAddress()
	{
		$this->assertInstanceOf(
			MailCheck::class,
			MailCheck::fromString('user@example.com')
		);
	}

	public function testCannotBeCreatedFromInvalidEmailAddress()
	{
		$this->expectException(\InvalidArgumentException::class);

		MailCheck::fromString('invalid');
	}

	public function testCanBeUsedAsString()
	{
		$this->assertEquals(
			'user@example.com',
			MailCheck::fromString('user@example.com')
		);
	}
}