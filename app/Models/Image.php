<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    /**
     * IMAGE ATTRIBUTES
     * $this->attributes['id'] - string - contains the image primary key (id)*
     * $this->attributes['name'] - string - contains the name of the image
     * $this->attributes['url'] - string - contains the url of the image
     * $this->gallery - Gallery - contains the gallery
     * $this->attribute['gallery_id'] - string - contains the gallery primary key (id)
     * $this->attributes['created_at'] - string - contains the date of image creation
     * $this->attributes['updated_at'] - string - contains when the image was updated
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

    public function getUrl(): string
    {
        return $this->attributes['url'];
    }

    public function setUrl(string $url): void
    {
        $this->attributes['url'] = $url;
    }

    public function gallery(): BelongsTo
    {
        return $this->belongsTo(Gallery::class);
    }

    public function getGallery(): Gallery
    {
        return $this->gallery;
    }

    public function setGallery(Gallery $gallery): void
    {
        $this->gallery()->associate($gallery);
    }

    public function getGalleryId(): string
    {
        return $this->attributes['gallery_id'];
    }

    public function setGalleryId(string $galleryId): void
    {
        $this->attributes['gallery_id'] = $galleryId;
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
