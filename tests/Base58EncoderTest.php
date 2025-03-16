<?php
namespace MoonWalkerz\Base58\Tests;

use MoonWalkerz\Base58\Base58;
use PHPUnit\Framework\TestCase;

class Base58EncoderTest extends TestCase
{
 /**
     * Test encoding and decoding a string.
     */
    public function testStringEncodingAndDecoding()
    {
        $original = "Hello, World!";
        $encoded = Base58::encode($original);
        $decoded = Base58::decode($encoded);

        echo "Original: $original\n";
        echo "Encoded: $encoded\n";
        echo "Decoded: $decoded\n";

        $this->assertEquals($original, $decoded, "String case failed: Decoded output does not match original input.");
    }

    /**
     * Test encoding and decoding binary data.
     */
    public function testBinaryEncodingAndDecoding()
    {
        $original = pack('N', 123456789); // Binary representation of the integer 123456789

        $encoded = Base58::encode($original);
        $decoded = Base58::decode($encoded);

        echo "Original: " . bin2hex($original) . "\n";
        echo "Encoded: $encoded\n";
        echo "Decoded: " . bin2hex($decoded) . "\n";

        $this->assertEquals($original, $decoded, "Binary case failed: Decoded output does not match original binary input.");
    }

}
