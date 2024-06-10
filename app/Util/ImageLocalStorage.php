<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Util;

use Illuminate\Http\Request;

class ImageLocalStorage
{
    public function storeAndGetFileName(Request $request, string $folder): ?string
    {
        if ($request->hasFile('image')) {
            $filename = uniqid().'.'.$request->file('image')->extension();
            $request->file('image')->storeAs('public/'.$folder, $filename);
            return $filename;
        }

        return null;
    }
}
