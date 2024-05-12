<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends Model
{
    /**
     * GALLERY ATTRIBUTES
     * $this->attributes['id'] - string - contains the gallery primary key (id)*
     * $this->attributes['name'] - string - contains the name of the gallery
     * $this->images - Image[] - contains the images of the gallery
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

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function getImages(): Collection
    {
        return $this->images;
    }

    public function setImages(Collection $images): void
    {
        $this->images = $images;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
