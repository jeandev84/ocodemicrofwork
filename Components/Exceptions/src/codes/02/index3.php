<?php

class File
{
    public $type = 'image/png';
}

class Uploader
{
    protected $allowed = [
        'image/jpg'
    ];

    public function upload(File $file)
    {
        if (!in_array($file->type, $this->allowed)) {
            throw new DomainException("{$file->type} is not supported");
        }

        // upload
    }
}

$uploader = new Uploader();

try {
    $uploader->upload(new File());
} catch (DomainException $e) {
    var_dump($e->getMessage());
}
