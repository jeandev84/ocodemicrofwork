<?php

class File
{
    public $size = 10;
}

class Uploader
{
    protected $allowedSize = 5;

    public function upload(File $file)
    {
        if ($file->size > $this->allowedSize) {
            throw new LengthException('File is too large');
        }

        return true;
    }
}

$uploader = new Uploader();
$uploader->upload(new File());
