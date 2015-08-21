<?php namespace Direco\Support;

class ImageWithThumbnail extends Image {

    protected $thumbnail;

    public function __construct($folder, $thumbFolder, $filename, $defaultFilename = 'default.jpg')
    {
        parent::__construct($folder, $filename, $defaultFilename);
        $this->thumbnail = new Image($thumbFolder, $filename, $defaultFilename);
    }

    public function thumbnail()
    {
        return $this->thumbnail;
    }

}