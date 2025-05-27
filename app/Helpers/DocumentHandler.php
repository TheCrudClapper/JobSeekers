<?php
namespace App\Helpers;
use Illuminate\Http\UploadedFile;
class DocumentHandler{

    public function saveCv(UploadedFile $file) : string{
        $path = $file->store('applications/cv', 'public');
        return $path;
    }
    public function saveLetter(UploadedFile $file) : string{
        $path = $file->store('applications/letters', 'public');
        return $path;
    }
}
