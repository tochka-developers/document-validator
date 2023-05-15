<?php

namespace Tochka\Validators\Tests;

use PHPUnit\Framework\TestCase;
use Tochka\Validators\DocumentValidator;

class DocumentValidatorTest extends TestCase
{
    public function testIsInn()
    {
        $this->assertTrue(DocumentValidator::isInn(7736046504));
        $this->assertTrue(DocumentValidator::isInn('7736046504'));
        $this->assertFalse(DocumentValidator::isInn('36046504'));
        $this->assertFalse(DocumentValidator::isInn(77360465047));
    }

    public function testIsInnJur()
    {
        $this->assertTrue(DocumentValidator::isInnJur(7736046504));
        $this->assertTrue(DocumentValidator::isInnJur('7736046504'));
        $this->assertFalse(DocumentValidator::isInnJur(490100067720));
    }

    public function testIsInnIp()
    {
        $this->assertTrue(DocumentValidator::isInnIp(490100067720));
        $this->assertTrue(DocumentValidator::isInnIp('490100067720'));
        $this->assertFalse(DocumentValidator::isInnIp(7736046504));
    }

    public function testIsSnils()
    {
        $this->assertTrue(DocumentValidator::isSnils(18178290500));
        $this->assertTrue(DocumentValidator::isSnils('18178290500'));
        $this->assertFalse(DocumentValidator::isSnils(18178290501));
    }

    public function testIsFmsCode()
    {
        $this->assertTrue(DocumentValidator::isFmsCode('010-010'));
        $this->assertFalse(DocumentValidator::isFmsCode('010-010 '));
        $this->assertFalse(DocumentValidator::isFmsCode('010010'));
    }

    public function testIsRussianPassportSerial()
    {
        $this->assertTrue(DocumentValidator::isRussianPassportSerial('6509'));
        $this->assertFalse(DocumentValidator::isRussianPassportSerial(76509));
    }

    public function testIsRussianPassportCode()
    {
        $this->assertTrue(DocumentValidator::isRussianPassportCode(111121));
        $this->assertTrue(DocumentValidator::isRussianPassportCode('111121'));
        $this->assertFalse(DocumentValidator::isRussianPassportCode('8111121'));
        $this->assertFalse(DocumentValidator::isRussianPassportCode(8111121));
    }

    public function testIsRussianForeignPassportSerial()
    {
        $this->assertTrue(DocumentValidator::isRussianForeignPassportSerial(55));
        $this->assertTrue(DocumentValidator::isRussianForeignPassportSerial('05'));
        $this->assertFalse(DocumentValidator::isRussianForeignPassportSerial('051'));
        $this->assertFalse(DocumentValidator::isRussianForeignPassportSerial(new \stdClass()));
    }

    public function testIsRussianForeignPassportCode()
    {
        $this->assertTrue(DocumentValidator::isRussianForeignPassportCode(6054862));
        $this->assertTrue(DocumentValidator::isRussianForeignPassportCode('6054862'));
        $this->assertFalse(DocumentValidator::isRussianForeignPassportCode('605486277'));
        $this->assertFalse(DocumentValidator::isRussianForeignPassportCode(new \stdClass()));
    }

    public function testIsRussianResidencePermitSerial()
    {
        $this->assertTrue(DocumentValidator::isRussianResidencePermitSerial(60));
        $this->assertTrue(DocumentValidator::isRussianResidencePermitSerial('06'));
        $this->assertFalse(DocumentValidator::isRussianResidencePermitSerial('6'));
        $this->assertFalse(DocumentValidator::isRussianResidencePermitSerial(new \stdClass()));
    }

    public function testIsRussianResidencePermitCode()
    {
        $this->assertTrue(DocumentValidator::isRussianResidencePermitCode(6064500));
        $this->assertTrue(DocumentValidator::isRussianResidencePermitCode('6064500'));
        $this->assertFalse(DocumentValidator::isRussianResidencePermitCode('6'));
        $this->assertFalse(DocumentValidator::isRussianResidencePermitCode(new \stdClass()));
    }

    public function testIsIsInnOrSnils()
    {
        $this->assertTrue(DocumentValidator::isSnils(18178290500));
        $this->assertTrue(DocumentValidator::isInnJur(7736046504));
        $this->assertTrue(DocumentValidator::isInnJur(7736046504));
    }
}
