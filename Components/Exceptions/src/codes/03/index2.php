<?php

class File
{
    public $size = 2;
}

class Uploader
{
    protected $allowedSize = 5;

    public function upload(File $file)
    {
        if ($file->size > $this->allowedSize) {
            throw new LengthException('File is too large');
        }

        if (true) {
            throw new RuntimeException('Failed to upload');
        }

        return true;
    }
}

$uploader = new Uploader();

try {
    $uploader->upload(new File());
} catch (LengthException $e) {
    var_dump('Show error to user');
}
