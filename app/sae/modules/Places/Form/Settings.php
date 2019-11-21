<?php

/**
 * Class Places_Form_Settings
 */
class Places_Form_Settings extends Nwicode_Form_Abstract
{
    /**
     * @throws Zend_Form_Exception
     */
    public function init()
    {
        parent::init();

        $this
            ->setAction(__path("/places/application/edit-settings"))
            ->setAttrib("id", "form-edit-settings");

        self::addClass('create', $this);

        $this->addSimpleHidden("value_id");

        $pages = [
            'places' => __("All places"),
            'categories' => __("Categories"),
            'map' => __("Map"),
        ];

        $enableVote = $this->addSimpleCheckbox('enable_vote', __('Enable vote'));

        $defaultPage = $this->addSimpleSelect("default_page", __("Default page"), $pages);

        $layout = [
            'place-100' => __("List"),
            'place-50' => __("Two columns"),
            'place-33' => __("Three columns"),
        ];

        $defaultLayout = $this->addSimpleSelect("default_layout", __("Default layout"), $layout);

        $distance = [
            'km' => __("Kilometers"),
            'mi' => __("Miles"),
        ];

        $distanceUnit = $this->addSimpleSelect("distance_unit", __("Distance unit"), $distance);

        $imagePriority = [
            'thumbnail' => __("Thumbnail > Illustration"),
            'image' => __("Illustration > Thumbnail"),
        ];

        $listImagePriority = $this->addSimpleSelect(
            "listImagePriority",
            __("Places image priority in list"),
            $imagePriority);

        $defaultPins = [
            'pin' => __("Pin"),
            'thumbnail' => __("Thumbnail"),
            'image' => __("Illustration"),
            'default' => __("Google default pin"),
        ];

        $defaultPin = $this->addSimpleSelect(
            "defaultPin",
            __("Default pin for new places"),
            $defaultPins);

        $applyText1 = __("Apply default pin to all existing places.");
        $applyButton1 = __("Apply");
        $pinApplyHtml = <<<RAW
<div class="col-md-7 col-md-offset-3">
    <div class="alert alert-warning">
        {$applyText1}
        <a class="btn color-blue apply-default-pin">{$applyButton1}</a>
    </div>
</div>
RAW;

        $pinApply = $this->addSimpleHtml("pin_apply_" . uniqid(), $pinApplyHtml);

        // Featured places are disabled for now.

        //$showFeatured = $this->addSimpleCheckbox("show_featured", __("Show featured labels"));
        //$featuredLabel = $this->addSimpleText("featured_label", __("Featured label"));

        //$showNonFeatured = $this->addSimpleCheckbox("show_non_featured", __("Show non-featured labels"));
        //$nonFeaturedLabel = $this->addSimpleText("non_featured_label", __("Non-featured label"));

        $submit = $this->addSubmit(__("Save"), __("Save"));
        $submit->addClass("pull-right");
    }
}