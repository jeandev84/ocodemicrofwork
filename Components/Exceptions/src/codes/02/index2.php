<?php

class File
{
    public $type = 'image/jpg';

    public $size = 10;
}

class Uploader
{
    protected $allowed = [
        'image/jpg'
    ];

    protected $maxSize = 5;

    public function upload(File $file)
    {
        if (!in_array($file->type, $this->allowed)) {
            throw new DomainException("{$file->type} is not supported");
        }

        if ($file->size > $this->maxSize) {
            throw new LengthException();
        }

        // upload
    }
}

$uploader = new Uploader();

try {
    $uploader->upload(new File());
} catch (Exception $e) {
    var_dump($e->getMessage());
}
