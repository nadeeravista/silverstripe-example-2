<?php

use \SilverStripe\Forms\GridField\GridField;
use \SilverStripe\Forms\GridField\GridFieldConfig_RecordEditor;

class VideoPage extends Page
{
    private static $has_many = [
        'VideoObjects' => VideoObject::class,
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab('Root.Main',
            GridField::create(
                'VideoObjects',
                'Videos',
                $this->VideoObjects(),
                GridFieldConfig_RecordEditor::create(),
            )
        );
        return $fields;
    }

}
