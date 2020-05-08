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
            throw new LengthException('File is too large', 1001);
        }

        if (true) {
            throw new RuntimeException('Failed to upload', 1002);
        }

        return true;
    }
}

$uploader = new Uploader();

try {
    $uploader->upload(new File());
} catch (Exception $e) {
    switch ($e->getCode()) {
        case 1001:
            var_dump('Show message to user');
            break;
        case 1002:
            var_dump('Redirect user');
            break;
    }
}
