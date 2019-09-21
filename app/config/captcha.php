
<?php if (!class_exists('CaptchaConfiguration')) { return; }

/**
 * Created by PhpStorm.
 * User: youzbechi
 * Date: 16/07/2018
 * Time: 15:45
 */

// BotDetect PHP Captcha configuration options

return [
    // Captcha configuration for example page
    'ExampleCaptcha' => [
        'UserInputID' => 'captchaCode',
        'ImageWidth' => 250,
        'ImageHeight' => 50,
    ],

];