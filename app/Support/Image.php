<?php namespace Direco\Support;

class Image {

    /**
     * @var string
     */
    protected $folder;
    /**
     * @var string
     */
    protected $filename;
    /**
     * @var Image
     */
    protected $thumbnail;
    /**
     * @var string
     */
    private $defaultFilename;

    public function __construct($folder, $filename, $defaultFilename = 'default.jpg')
    {
        $this->folder = $folder;
        $this->filename = $filename;
        $this->defaultFilename = $defaultFilename;
    }

    public function __toString()
    {
        return $this->source();
    }

    public function exists()
    {
        return file_exists($this->fullPath());
    }

    public function defaultSource()
    {
        return asset('images/' . $this->folder . '/' . $this->defaultFilename);
    }

    public function source()
    {
        if (strpos($this->folder, 'productos') !== false)
        {
            return 'http://www.direco.com.ve/files/' . $this->folder . '/' . strtolower($this->filename);
        }

        if ( ! $this->exists()) {
            return $this->defaultSource();
        }

        return asset('images/' . $this->folder . '/' . $this->filename);
    }

    public function setThumbnail(Image $image)
    {
        return $this->thumbnail = $image;
    }

    public function thumbnail()
    {
        return $this->thumbnail;
    }

    protected function getImagesPath()
    {
        return public_path() .  DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR;
    }

    protected function fullPath()
    {
        return $this->getImagesPath() . $this->folder . DIRECTORY_SEPARATOR . $this->filename;
    }

}