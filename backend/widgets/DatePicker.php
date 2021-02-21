<?php

namespace backend\widgets;

use kartik\date\DatePicker as BaseDatePicker;
use kartik\depdrop\DepDropAsset;
use kartik\depdrop\DepDropExtAsset;

class DepDatePicker extends BaseDatePicker
{
    public function run()
    {
        parent::run();
        if (empty($this->pluginOptions['url'])) {
            throw new InvalidConfigException("The 'pluginOptions[\"url\"]' property has not been set.");
        }
        if (empty($this->pluginOptions['depends']) || !is_array($this->pluginOptions['depends'])) {
            throw new InvalidConfigException("The 'pluginOptions[\"depends\"]' property must be set and must be an array of dependent dropdown element identifiers.");
        }
        if (empty($this->options['class'])) {
            $this->options['class'] = 'form-control';
        }
        $this->registerAssets();
    }

    public function registerAssets()
    {
        parent::registerAssets();
        $view = $this->getView();
        DepDropAsset::register($view)->addLanguage($this->language, 'depdrop_locale_');
        DepDropExtAsset::register($view);
        $this->registerPlugin($this->pluginName);

    }
    
}