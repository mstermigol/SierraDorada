<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * SERVICE ATTRIBUTES
     * $this->attributes['id'] - string - contains the service primary key (id)
     * $this->attributes['name'] - string - contains the name of the service
     * $this->attributes['description_miniature'] - string - contains the description of the service miniature
     * $this->attributes['image_miniature'] - string - contains the image of the service miniature
     * $this->attributes['description'] - string - contains the description of the service
     * $this->attributes['image'] - string - contains the image of the service
     * $this->attributes['price'] - int - contains the price of the service
     * $this->attributes['in_landing'] - bool - contains if the service is in the landing
     * $this->attributes['created_at'] - string - contains the date of service creation
     * $this->attributes['updated_at'] - string - contains when the service was updated
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

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getPrice(): int
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getInLanding(): bool
    {
        return $this->attributes['in_landing'];
    }

    public function setInLanding(bool $in_landing): void
    {
        $this->attributes['in_landing'] = $in_landing;
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
