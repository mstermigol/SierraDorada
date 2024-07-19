<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Sportsman extends Model
{
    /**
     * SPORTSMAN ATTRIBUTES
     * $this->attributes['id'] - string - contains the sportsman primary key (id)
     * $this->attributes['name'] - string - contains the name of the sportsman
     * $this->attributes['image'] - string - contains the image of the sportsman
     * $this->attributes['created_at'] - string - contains the date of sportsman creation
     * $this->attributes['updated_at'] - string - contains when the sportsman was updated
     */
    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);
        }
    }
}
