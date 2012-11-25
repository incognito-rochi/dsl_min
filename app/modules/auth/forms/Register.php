<?php

/**
 * Auth registration form
 *
 * @author 			Eddie Jaoude
 * @category   		Real Browser
 * @package 		Auth Module
 * @version 		SVN: $Id:$
 *
 */
class Auth_Form_Register extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post')
            ->setAction($this->getView()->url(array(
                    'module' => 'auth',
                    'controller' => 'register',
                    'action' => 'index')))
            ->setAttrib('class', 'box')
            ->setName('Register');

        # Name
        $name = new Zend_Form_Element_Text('name');
        $name->setLabel('Name')
            ->setRequired(TRUE)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        # Email
        $email = new Zend_Form_Element_Text('email');
        $email->setLabel('Email')
            ->setRequired(TRUE)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addFilter('StringToLower')
            ->addValidator('NotEmpty')
            ->addValidator('EmailAddress');

        # Password
        $password = new Zend_Form_Element_Password('password');
        $password->setLabel('Password')
            ->setRequired(TRUE)
            ->addFilter('StripTags')
            ->addFilter('StringTrim')
            ->addValidator('NotEmpty');

        // spam code
        // Using both captcha and captchaOptions:
        // 
        //   $spamcode = new Zend_Form_Element_Captcha('spamcode',array(
        //            'label' => "Spam code - Please type what you see below in the empty form field under the spam code.",
        //            'captcha' => 'Figlet',
        //             'captchaOptions' => array(
        //                'captcha' => 'Figlet',
        //                'wordLen' => rand(5, 7),
        //                'timeout' => 900,
        //            ),
        //    ));
        
        
        $captcha = new Zend_Form_Element_Captcha('captcha', array(
            'label'     => 'Please enter the code below',
            'captcha'   => 'Image',
            'captchaOptions' => array(
            'required'  => true,
            'wordLen'   => 5,
            'width'     => 180,
            'height'    => 60,
            'timeout'   => 300,
            'fontSize'  => 32,
            'gcFreq'    => 5,
            'dotNoiseLevel' => 50,
            'lineNoiseLevel' => 5,
            'ImgAlign'=>'left',
            'LineNoiseLevel'=>'5',
            'font'      => 'files/fonts/serif.ttf',
            'imgDir'    => 'files/captcha',
            'imgUrl'    => 'http://localhost/DSL/files/captcha/',
                )));


        # Submit
        $submit = new Zend_Form_Element_Submit('Register');

        # Create
        $this->addElements(array($name, $email, $password, $captcha, $submit));
    }
}

