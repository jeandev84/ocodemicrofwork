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

        if (true) {
            throw new RuntimeException('Failed to upload');
        }

        if (true) { 
            throw new Exception();
        }

        return true;
    }
}

$uploader = new Uploader();

try {
    $uploader->upload(new File());
} catch (LengthException | RuntimeException $e) {
    var_dump($e->getMessage());
} catch (Exception $e) {
    var_dump('Unknown error');
}
