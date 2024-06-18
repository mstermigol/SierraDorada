<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Util;

use Illuminate\Http\Request;

class ImageLocalStorage
{
    public function storeAndGetFileName(Request $request, string $folder, string $inputName = 'image'): string|array|null
    {
        if ($inputName === 'image') {
            if ($request->hasFile($inputName)) {
                $filename = uniqid().'.'.$request->file($inputName)->extension();
                $request->file($inputName)->storeAs('public/'.$folder, $filename);

                return $filename;
            }

            return null;
        } else {
            if ($request->hasFile($inputName)) {
                $files = $request->file($inputName);
                if (is_array($files)) {
                    $filenames = [];
                    foreach ($files as $image) {
                        $filename = uniqid().'.'.$image->extension();
                        $image->storeAs('public/'.$folder, $filename);
                        $filenames[] = $filename;
                    }

                    return $filenames;
                } else {
                    $filename = uniqid().'.'.$files->extension();
                    $files->storeAs('public/'.$folder, $filename);

                    return $filename;
                }
            }

            return [];
        }
    }
}
