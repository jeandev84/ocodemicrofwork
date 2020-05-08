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

        if (false) {
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
} catch (LengthException $e) {
    var_dump('Show error to user');
} catch (RuntimeException $e) {
    var_dump('Redirect user');
} catch (Exception $e) {
    var_dump('Unknown error');
}
