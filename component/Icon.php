<?php
/**
 * Icon.php
 * @author Anton Devcoder
 */

namespace antonkj\yii\fontawesome\component;

use antonkj\yii\fontawesome\FA;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Class Icon
 * @package antonkj\yii\fontawesome\component
 */
class Icon
{

    /**
     * @deprecated
     * @var string
     */
    public static $defaultTag = 'i';

    /**
     * @deprecated
     * @var string
     */
    private $tag;

    /**
     * @var array
     */
    private $options = [];

    /**
     * @param string $name
     * @param array $options
     */
    public function __construct($name, $options = [])
    {
        Html::addCssClass($options, FA::$cssPrefix);

        if (!empty($name)) {
            Html::addCssClass($options, FA::$cssPrefix . '-' . $name);
        }

        $this->options = $options;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $options = $this->options;

        $tag = ArrayHelper::remove($options, 'tag', 'i');

        return Html::tag($tag, null, $options);
    }

    /**
     * @return self
     */
    public function inverse()
    {
        return $this->addCssClass(FA::$cssPrefix . '-inverse');
    }

    /**
     * @return self
     */
    public function spin()
    {
        return $this->addCssClass(FA::$cssPrefix . '-spin');
    }

    /**
     * @return self
     */
    public function fixedWidth()
    {
        return $this->addCssClass(FA::$cssPrefix . '-fw');
    }

    /**
     * @return self
     */
    public function li()
    {
        return $this->addCssClass(FA::$cssPrefix . '-li');
    }

    /**
     * @return self
     */
    public function border()
    {
        return $this->addCssClass(FA::$cssPrefix . '-border');
    }

    /**
     * @return self
     */
    public function pullLeft()
    {
        return $this->addCssClass(FA::$cssPrefix . '-pull-left');
    }

    /**
     * @return self
     */
    public function pullRight()
    {
        return $this->addCssClass(FA::$cssPrefix . '-pull-right');
    }

    /**
     * @param string $value
     * @return self
     * @throws \yii\base\InvalidConfigException
     */
    public function size($value)
    {
        return $this->addCssClass(
            FA::$cssPrefix . '-' . $value,
            in_array((string)$value, [FA::SIZE_LARGE, FA::SIZE_2X, FA::SIZE_3X, FA::SIZE_4X, FA::SIZE_5X], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FA::size()',
                'FA::SIZE_LARGE, FA::SIZE_2X, FA::SIZE_3X, FA::SIZE_4X, FA::SIZE_5X'
            )
        );
    }

    /**
     * @param string $value
     * @return self
     * @throws \yii\base\InvalidConfigException
     */
    public function rotate($value)
    {
        return $this->addCssClass(
            FA::$cssPrefix . '-rotate-' . $value,
            in_array((string)$value, [FA::ROTATE_90, FA::ROTATE_180, FA::ROTATE_270], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FA::rotate()',
                'FA::ROTATE_90, FA::ROTATE_180, FA::ROTATE_270'
            )
        );
    }

    /**
     * @param string $value
     * @return self
     * @throws \yii\base\InvalidConfigException
     */
    public function flip($value)
    {
        return $this->addCssClass(
            FA::$cssPrefix . '-flip-' . $value,
            in_array((string)$value, [FA::FLIP_HORIZONTAL, FA::FLIP_VERTICAL], true),
            sprintf(
                '%s - invalid value. Use one of the constants: %s.',
                'FA::flip()',
                'FA::FLIP_HORIZONTAL, FA::FLIP_VERTICAL'
            )
        );
    }

    /**
     * @deprecated
     * Change html tag.
     * @param string $tag
     * @return static
     * @throws \yii\base\InvalidParamException
     */
    public function tag($tag)
    {
        $this->tag = $tag;

        $this->options['tag'] = $tag;

        return $this;
    }

    /**
     * @param string $class
     * @param bool $condition
     * @param string|bool $throw
     * @return \antonkj\yii\fontawesome\component\Icon
     * @throws \yii\base\InvalidConfigException
     * @codeCoverageIgnore
     */
    public function addCssClass($class, $condition = true, $throw = false)
    {
        if ($condition === false) {
            if (!empty($throw)) {
                $message = !is_string($throw)
                    ? 'Condition is false'
                    : $throw;

                throw new \yii\base\InvalidConfigException($message);
            }
        } else {
            Html::addCssClass($this->options, $class);
        }

        return $this;
    }

    /**
     * @deprecated
     * @param string|null $tag
     * @param string|null $content
     * @param array $options
     * @return string
     */
    public function render($tag = null, $content = null, $options = [])
    {
        $tag = empty($tag)
            ? (empty($this->tag) ? static::$defaultTag : $this->tag)
            : $tag;

        $options = array_merge($this->options, $options);

        return Html::tag($tag, $content, $options);
    }
}
