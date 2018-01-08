<?php

use PHPUnit\Framework\TestCase;

class BracketServiceTest extends TestCase{


    public function isValidOkDataProvider() {
        return array(
            array('()'),
            array('(()
                    )()'),
        );
    }

    /**
     * @dataProvider isValidOkDataProvider
     */
    public function testIsValidOk($link){
        $bracketService = new \Library\Services\BracketService($link);
        $this->assertTrue($bracketService->isValid($link));
    }

    public function isValidFailDataProvider() {
        return array(
            array('((a
                    )()'),
            array('((!@#$%^&*
                    )()'),
        );
    }
    /**
     * @dataProvider isValidFailDataProvider
     * @expectedException \Library\Exceptions\InvalidArgumentException
     */
    public function testIsValidFail($link){
        $bracketService = new \Library\Services\BracketService($link);
        $this->assertFalse($bracketService->isValid($link));
    }


    public function checkOkDataProvider() {
        return array(
            array('((
                    )())'),
        );
    }

    /**
     * @dataProvider checkOkDataProvider
     */
    public function testCheckOk($link){
        $bracketService = new \Library\Services\BracketService($link);
        $this->assertTrue($bracketService->check());
    }

    public function checkFailDataProvider() {
        return array(
            array(')()(
                        )'),
            array('(((((((((()()(
                        ))      ))
                                    )'),
        );
    }

    /**
     * @dataProvider checkFailDataProvider
     */
    public function testCheckFail($link){
        $bracketService = new \Library\Services\BracketService($link);
        $this->assertFalse($bracketService->check());
    }

}
