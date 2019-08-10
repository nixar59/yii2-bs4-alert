<?php


namespace nixar59\alert;


use Yii;
use yii\base\InvalidConfigException;
use yii\bootstrap4\Alert as BaseAlert;
use yii\bootstrap4\BootstrapAsset;
use yii\bootstrap4\Widget;
use yii\di\Instance;
use yii\web\Session;

/**
 * Class Alert
 * @package nixar59\alert
 *
 * @method static primary(string $string)
 * @method static secondary(string $string)
 * @method static success(string $string)
 * @method static danger(string $string)
 * @method static warning(string $string)
 * @method static info(string $string)
 * @method static light(string $string)
 * @method static dark(string $string)
 */
class Alert extends Widget
{
    /**
     * {@inheritDoc}
     */
    public function run()
    {
        foreach (static::session()->getAllFlashes() as $class => $messages) {
            foreach ($messages as $message) {
                echo BaseAlert::widget(['body' => $message, 'options' => ['class' => $class]]);
            }
        }
    }

    /**
     * Returns Session instance for store alert messages
     * @return Session
     */
    public static function session()
    {
        try {
            /** @var Session $session */
            $session = Instance::ensure(Yii::$app->session, Session::class);
            return $session;
        } catch (InvalidConfigException $invalidConfigException) {
            if (YII_ENV == YII_ENV_DEV) Yii::error($invalidConfigException->getMessage());
            return new Session();
        }
    }

    /**
     * @param string $name method name
     * @param array $arguments method args
     */
    public static function __callStatic($name, $arguments)
    {
        static::session()->addFlash('alert-' . $name, $arguments[0]);
    }
}