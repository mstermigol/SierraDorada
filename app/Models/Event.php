<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * EVENT ATTRIBUTES
     * $this->attributes['id'] - string - contains the event primary key (id)
     * $this->attributes['title'] - string - contains the title of the event
     * $this->attributes['description_miniature'] - string - contains the description of the event miniature
     * $this->attributes['image_miniature'] - string - contains the image of the event miniature
     * $this->attributes['description'] - string - contains the description of the event
     * $this->attributes['images'] - string[] - contains the images of the event
     * $this->attributes['created_at'] - string - contains the date of event creation
     * $this->attributes['updated_at'] - string - contains when the event was updated
     */

    protected $casts = [
        'images' => 'array',
    ];
    public function getId(): string
    {
        return $this->attributes['id'];
    }

    public function getTitle(): string
    {
        return $this->attributes['title'];
    }

    public function setTitle(string $title): void
    {
        $this->attributes['title'] = $title;
    }

    public function getDescriptionMiniature(): string
    {
        return $this->attributes['description_miniature'];
    }

    public function setDescriptionMiniature(string $description_miniature): void
    {
        $this->attributes['description_miniature'] = $description_miniature;
    }

    public function getImageMiniature(): string
    {
        return $this->attributes['image_miniature'];
    }

    public function setImageMiniature(string $image_miniature): void
    {
        $this->attributes['image_miniature'] = $image_miniature;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
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

    public static function validate($request): void
    {
        if ($request->has('title')) {
            $request->validate([
                'title' => 'required|string|max:255',
            ]);
        }

        if ($request->has('descriptionMiniature')) {
            $request->validate([
                'descriptionMiniature' => 'required|string',
            ]);
        }

        if ($request->hasFile('imageMiniature')) {
            $request->validate([
                'imageMiniature' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);
        }

        if ($request->has('description')) {
            $request->validate([
                'description' => 'required|string',
            ]);
        }

        if ($request->hasFile('images')) {
            $request->validate([
                'images' => 'required|array',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ]);
        }

    }
}
