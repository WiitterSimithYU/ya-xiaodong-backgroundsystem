<?php
class CCaptcha_app extends CCaptcha{
	/**
	 * Renders the widget.
	 */
	public function run()
	{
		if(self::checkRequirements('imagick') || self::checkRequirements('gd'))
		{
			return $this->renderImage();
			$this->registerClientScript();
		}
		else
			throw new CException(Yii::t('yii','GD with FreeType or ImageMagick PHP extensions are required.'));
	}

	/**
	 * Renders the CAPTCHA image.
	 */
	protected function renderImage()
	{
		if(!isset($this->imageOptions['id']))
			$this->imageOptions['id']=$this->getId();

		$url=$this->getController()->createUrl($this->captchaAction,array('v'=>uniqid()));
// 		return $url;
		$alt=isset($this->imageOptions['alt'])?$this->imageOptions['alt']:'';
		return  CHtml::image($url,$alt,$this->imageOptions);
	}
}