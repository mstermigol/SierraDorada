<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Util;

use Exception;
use Illuminate\Http\Request;

class ImageLocalStorage
{
    public function storeAndGetFileName(Request $request, string $folder, string $inputName = 'image'): string|array|null
    {
        try {
            if ($inputName === 'image') {
                if ($request->hasFile($inputName)) {
                    $file = $request->file($inputName);
                    $filename = uniqid().'.'.$file->extension();
                    $file->storeAs('public/'.$folder, $filename);

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
        } catch (Exception $e) {
            if ($inputName === 'image') {
                return null;
            } else {
                return [];
            }
        }
    }
}
