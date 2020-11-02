<?php

namespace backend\models;

use common\models\User;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class UserForm extends Model
{
    const SCENARIO_ADDING = 'adding';
    const SCENARIO_EDITING = 'editing';

    public $id;
    public $username;
    public $email;
    public $password;
    public $newPassword;
    public $status = User::STATUS_ACTIVE;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User',
                'message' => 'This username has already been taken.', 'on' => self::SCENARIO_ADDING],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User',
                'message' => 'This email address has already been taken.', 'on' => self::SCENARIO_ADDING],

            ['status', 'integer'],
            ['status', 'required', 'on' => self::SCENARIO_ADDING],

            ['password', 'required', 'on' => self::SCENARIO_ADDING],
            [['password', 'newPassword'], 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function insert()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save();

    }

    /**
     * @return bool
     */
    public function update()
    {
        if (!$this->validate()) {
            return false;
        }

        if ($user = User::findOne($this->id)) {
            $user->username = $this->username;
            $user->email = $this->email;
            $user->status = $this->status;
            $this->newPassword && $user->setPassword($this->newPassword);

            return $user->save();
        }

        return false;
    }
}
