<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class ChangePasswordForm extends Model
{

    public $password_lama;
    public $password_baru;
    public $password_baru_konfirmasi;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email and password are both required
            [['password_lama','password_baru','password_baru_konfirmasi'], 'required','message'=>'{attribute} harus diisi'],
            // password is validated by validatePassword()
            [['password_lama'], 'validateLamaSama'],
            [['password_baru_konfirmasi'], 'validateBaruSama'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateLamaSama($attribute, $params)
    {
        $user = User::findBySession();

        if(!$user->validatePassword($this->password_lama))
        {
            $this->addError($attribute, 'Password lama tidak sesuai');
        }
    }

    public function validateBaruSama($attribute, $params)
    {
        if($this->password_baru != $this->password_baru_konfirmasi)
        {
            $this->addError($attribute, 'Password baru konfirmasi tidak sesuai');
        }
    }

    
}
