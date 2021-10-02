<?php

use \SilverStripe\ORM\DataObject;
use SilverStripe\Assets\File;
use \SilverStripe\Forms\FieldList;
use \SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;

class VideoObject extends DataObject
{

    private static $db = [
        'Title' => 'Text',
        'Description' => 'Text',
    ];

    private static $has_one = [
        'VideoPage' => VideoPage::class, // Relationship for the page
        'VideoSource' => File::class, // One Video object has a file. will related to database filed
    ];

    private static $many_many = [
        'VideoCategories' => VideoCategory::class
    ];


    private static $owns = [
        'VideoSource',
    ];

    public function getCMSFields()
    {
        return new FieldList(
            UploadField::create('VideoSource'),
            TextField::create('Title'),
            TextareaField::create('Description'),
            CheckboxSetField::create('VideoCategories', 'Categories', VideoCategory::get())
        );
    }
}
