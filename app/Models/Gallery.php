<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Gallery extends Model
{
    /**
     * GALLERY ATTRIBUTES
     * $this->attributes['id'] - string - contains the gallery primary key (id)*
     * $this->attributes['name'] - string - contains the name of the gallery
     * $this->attributes['slug'] - string - contains the slug of the gallery
     * $this->attributes['images'] - string[] - contains the images of the gallery
     * $this->attributes['created_at'] - string - contains the date of gallery creation
     * $this->attributes['updated_at'] - string - contains when the gallery was updated
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

    public function getSlug(): string
    {
        return $this->attributes['slug'];
    }

    public function setSlug(string $slug): void
    {
        $this->attributes['slug'] = Str::slug($slug);
    }

    public function getImages(): array
    {
        return json_decode($this->attributes['images'], true);
    }

    public function setImages(array $images): void
    {
        $this->attributes['images'] = json_encode($images);
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
            'name' => 'required|string|max:255|unique:galleries,name',
        ]);
        if ($request->hasFile('images')) {
            $request->validate([
                'images' => 'required|array',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
            ]);
        }
    }

    public static function validateName(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:galleries,name',
        ]);
    }

    public static function validateImages(Request $request): void
    {
        $request->validate([
            'images' => 'required|array',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
        ]);
    }
}
