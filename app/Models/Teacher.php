<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
     * TEACHER ATTRIBUTES
     * $this->attributes['id'] - string - contains the teacher primary key (id)
     * $this->attributes['name'] - string - contains the name of the teacher
     * $this->attributes['image'] - string - contains the image of the teacher     *
     * $this->attributes['created_at'] - string - contains the date of teacher creation
     * $this->attributes['updated_at'] - string - contains when the teacher was updated
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
}
