<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    /**
     * TESTIMONY ATTRIBUTES
     * $this->attributes['id'] - string - contains the testimony primary key (id)*
     * $this->attributes['name'] - string - contains the name of the testimony
     * $this->attributes['testimony'] - string - contains the testimony
     * $this->attributes['image'] - string - contains the image of the testimony
     * $this->attributes['created_at'] - string - contains the date of testimony creation
     * $this->attributes['updated_at'] - string - contains when the testimony was updated
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

    public function getTestimony(): string
    {
        return $this->attributes['testimony'];
    }

    public function setTestimony(string $testimony): void
    {
        $this->attributes['testimony'] = $testimony;
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
}
