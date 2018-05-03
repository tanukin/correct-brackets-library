<?php

use PHPUnit\Framework\TestCase;

class BracketServiceTest extends TestCase{

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
        $bracketService->isValid($link);
        $this->expectExceptionMessage("The line uses forbidden characters.");
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
