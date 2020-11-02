<?php

namespace api\tests\unit\models;

use api\models\ResetPasswordForm;
use api\tests\UnitTester;
use Codeception\Test\Unit;
use common\fixtures\UserFixture;

class ResetPasswordFormTest extends Unit
{
    /**
     * @var UnitTester
     */
    protected $tester;


    public function _before()
    {
        $this->tester->haveFixtures([
            'user' => [
                'class' => UserFixture::className(),
                'dataFile' => codecept_data_dir() . 'user.php'
            ],
        ]);
    }

    public function testResetWrongToken()
    {
        $this->tester->expectException('\yii\base\InvalidArgumentException', function () {
            new ResetPasswordForm('');
        });

        $this->tester->expectException('\yii\base\InvalidArgumentException', function () {
            new ResetPasswordForm('notexistingtoken_1391882543');
        });
    }

    public function testResetCorrectToken()
    {
        $user = $this->tester->grabFixture('user', 0);
        $form = new ResetPasswordForm($user['password_reset_token']);
        expect_that($form->resetPassword());
    }

}
