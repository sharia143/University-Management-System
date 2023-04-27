<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;

final class logintest extends TestCase
{
	public function testCanBeCreatedFromValiduseremail(): void
    {
        $this->assertInstanceOf(
            useremail::class,
            useremail::fromString('user@example.com')
        );
    }
	
    public function testCanBeCreatedFromValidpassword(): void
    {
        $this->assertInstanceOf(
            password::class,
            password::fromString('')
        );
    }

	public function testCannotBeCreatedFromInvaliduseremail(): void
    {
        $this->expectException(InvalidArgumentException::class);

        useremail::fromString('invalid');
    }
    public function testCannotBeCreatedFromInvalidpassword(): void
    {
        $this->expectException(InvalidArgumentException::class);

        password::fromString('invalid');
    }

	public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            useremail::fromString('user@example.com')
        );
 	$this->assertEquals(
            '',
            password::fromString('')
        );
    }   
}
