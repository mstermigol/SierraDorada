<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Horse extends Model
{
    /**
     * HORSE ATTRIBUTES
     * $this->attributes['id'] - string - contains the horse primary key (id)
     * $this->attributes['name'] - string - contains the name of the horse
     * $this->attributes['image'] - string - contains the image of the horse
     * $this->attributes['description'] - string - contains the description of the horse
     * $this->attributes['created_at'] - string - contains the date of horse creation
     * $this->attributes['updated_at'] - string - contains when the horse was updated
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

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
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
            'image' => 'required|file|mimes:jpeg,png,jpg,svg|max:5120',
            'description' => 'required|string|max:255',
        ]);
    }

    public static function validateUpdate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|file|mimes:jpeg,png,jpg,svg|max:5120',
            ]);
        }
    }
}
