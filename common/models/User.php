<?php

namespace common\models;

class User extends \common\ext\MongoDb\Document
{

    /**
     * List of user roles
     */
    const ROLE_GUEST    = 'guest';
    const ROLE_USER     = 'user';
    const ROLE_STUDENT  = 'student';
    const ROLE_TEACHER  = 'teacher';
    const ROLE_ADMIN    = 'admin';

    /**
     * First name
     * @var string
     */
    public $firstName;

    /**
     * Last name
     * @var string
     */
    public $lastName;

    /**
     * Contact email
     * @var string
     */
    public $email;

    /**
     * Hash of the password.
     * Don't set it directly!!!
     * @see setPassword()
     * @var string
     */
    public $hash;

    /**
     * Assigned role
     * @var string
     */
    public $role = self::ROLE_USER;

    /**
     * Date created
     * @var int
     */
    public $dateCreated;

    /**
     * Returns the attribute labels.
     *
     * Note, in order to inherit labels defined in the parent class, a child class needs to
     * merge the parent labels with child labels using functions like array_merge().
     *
     * @return array attribute labels (name => label)
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), array(
            'firstName'     => \yii::t('app', 'First name'),
            'lastName'      => \yii::t('app', 'Last name'),
            'email'         => \yii::t('app', 'Email'),
            'hash'          => \yii::t('app', 'Password hash'),
            'role'          => \yii::t('app', 'Role'),
            'dateCreated'   => \yii::t('app', 'Registration date'),
        ));
    }

    /**
     * Define attribute rules
     *
     * @return array
     */
    public function rules()
    {
        return array_merge(parent::rules(), array(
            array('firstName, lastName, email, role, dateCreated', 'required'),
            array('email', 'email'),
            array('email', 'unique'),
            array('firstName, lastName', 'length', 'max' => 100),
        ));
    }

	/**
	 * This returns the name of the collection for this class
     *
     * @return string
	 */
	public function getCollectionName()
	{
		return 'user';
	}

    /**
     * List of collection indexes
     *
     * @return array
     */
    public function indexes()
    {
        return array_merge(parent::indexes(), array(
            'email' => array(
                'key' => array(
                    'email' => \EMongoCriteria::SORT_ASC,
                ),
                'unique' => true,
            ),
        ));
    }

    /**
     * Before validate action
     *
     * @return bool
     */
    protected function beforeValidate()
    {
        if (!parent::beforeValidate()) return false;

        // Email
        $this->email = mb_strtolower($this->email);

        // Set created date
        if ($this->dateCreated == null) {
            $this->dateCreated = time();
        }

        return true;
    }

    /**
     * Set user's password
     *
     * @param string $password
     * @param string $passwordRepeat
     */
    public function setPassword($password, $passwordRepeat)
    {
        // Clear all password errors
        $this->clearErrors('password');

        // Validate max length
        $maxLength = 255;
        if (strlen($password) > $maxLength) {
            $this->addError('password', \yii::t('app', '{attr} length should be less or equal than {val}.', array(
                '{attr}' => $this->getAttributeLabel('password'),
                '{val}'  => $maxLength,
            )));
        }

        // Check passwords to be equal
        if ($password != $passwordRepeat) {
            $this->addError('password', \yii::t('app', '{attr} is not confirmed.', array(
                '{attr}' => $this->getAttributeLabel('password'),
            )));
        }

        // Validate length
        $minLength = 6;
        if (strlen($password) < $minLength) {
            $this->addError('password', \yii::t('app', '{attr} length should be greater or equal than {val}.', array(
                '{attr}' => $this->getAttributeLabel('password'),
                '{val}'  => $minLength,
            )));
        }

        // Set password hash if password is valid
        if (!$this->hasErrors('password')) {
            $this->hash = crypt($password, '$6$rounds=5000$jIJM938Jwlfk)394kKkfweofk$');
        }
    }

    /**
     * Check inputed password
     *
     * @param string $password
     * @return bool
     */
    public function checkPassword($password)
    {
        $isValid = (crypt($password, $this->hash) == $this->hash);
        return $isValid;
    }

}