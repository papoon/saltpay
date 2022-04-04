<?php

namespace Tests\Unit\PlayWithStrings;

use Models\NumberOfCharInText;
use Services\PlayWithStrings;
use PHPUnit\Framework\TestCase;

final class TestService extends TestCase
{
    private $serviePlayWithStrings;
    private $mockNumberOfCharInText;
    protected function setUp(): void
    {

        $this->mockNumberOfCharInText = $this->createMock(NumberOfCharInText::class);
        $this->serviePlayWithStrings = new PlayWithStrings($this->mockNumberOfCharInText);
    }

    /**
     *
     * @dataProvider dataProvider
     */
    public function testGetNumberOfCharInText($text, $expected, $exception = null)
    {

        if (!empty($exception)) {
            $this->expectException($exception);
            $this->expectExceptionMessage($expected);
            $this->mockNumberOfCharInText->expects($this->never())->method('insert');
        }
        else{
            $this->mockNumberOfCharInText->expects($this->once())->method('insert');
        }

        $result = $this->serviePlayWithStrings->getAsteriskNumberOfCharInText($text);

        $this->assertEquals($expected, $result);
    }

    /**
     *
     * @return array
     */
    public function dataProvider(): array
    {
        return [
            'uper string'   => ['INTERVIEW', '("i:**,n:*,t:*,e:**,r:*,v:*,w:*")'],
            'sapce string'  => ['coding exercise', '("c:**,o:*,d:*,i:**,n:*,g:*,e:***,x:*,r:*,s:*")'],
            'number string' => ['INTERVIEW1', '("i:**,n:*,t:*,e:**,r:*,v:*,w:*")'],
            'empty' => ['', 'Empty String', \UnexpectedValueException::class]
        ];
    }

    protected function tearDown(): void
    {
        unset($this->serviePlayWithStrings);
        unset($this->mockNumberOfCharInText);
    }
}
