<?php
declare(strict_types=1);

namespace Lcobucci\JWT\Signer;

use PHPUnit\Framework\TestCase;

/** @coversDefaultClass \Lcobucci\JWT\Signer\None */
final class NoneTest extends TestCase
{
    /**
     * @test
     *
     * @covers ::getAlgorithmId
     */
    public function getAlgorithmIdMustBeCorrect(): void
    {
        $signer = new None();

        self::assertEquals('none', $signer->getAlgorithmId());
    }

    /**
     * @test
     *
     * @covers ::sign
     *
     * @uses \Lcobucci\JWT\Signer\Key
     */
    public function signShouldReturnAnEmptyString(): void
    {
        $signer = new None();

        self::assertEquals('', $signer->sign('test', new Key('test')));
    }

    /**
     * @test
     *
     * @covers ::verify
     *
     * @uses \Lcobucci\JWT\Signer\Key
     */
    public function verifyShouldReturnTrueWhenSignatureHashIsEmpty(): void
    {
        $signer = new None();

        self::assertTrue($signer->verify('', 'test', new Key('test')));
    }

    /**
     * @test
     *
     * @covers ::verify
     *
     * @uses \Lcobucci\JWT\Signer\Key
     */
    public function verifyShouldReturnFalseWhenSignatureHashIsEmpty(): void
    {
        $signer = new None();

        self::assertFalse($signer->verify('testing', 'test', new Key('test')));
    }
}
