<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    /**
     * SERVICE ATTRIBUTES
     * $this->attributes['id'] - string - contains the service primary key (id)
     * $this->attributes['name'] - string - contains the name of the service
     * $this->attributes['slug'] - string - contains the slug of the service
     * $this->attributes['description_miniature'] - string - contains the description of the service miniature
     * $this->attributes['image_miniature'] - string - contains the image of the service miniature
     * $this->attributes['description'] - string - contains the description of the service
     * $this->attributes['images'] - string[] - contains the image of the service
     * $this->attributes['price_weekday'] - int - contains the price of the service in weekdays
     * $this->attributes['price_weekend'] - int - contains the price of the service in weekends
     * $this->attributes['in_landing'] - bool - contains if the service is in the landing
     * $this->attributes['created_at'] - string - contains the date of service creation
     * $this->attributes['updated_at'] - string - contains when the service was updated
     */
    protected $casts = [
        'images' => 'array',
    ];

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

    public function setImages(array $image): void
    {
        $this->attributes['images'] = json_encode($image);
    }

    public function getPriceWeekday(): ?string
    {
        $price = $this->attributes['price_weekday'];

        if (is_null($price)) {
            return null;
        }

        return number_format($price, 0, '.', ',');
    }

    public function getPriceWeekdayInt(): ?int
    {
        return $this->attributes['price_weekday'];
    }

    public function setPriceWeekday(?int $price): void
    {
        $this->attributes['price_weekday'] = $price;
    }

    public function getPriceWeekend(): ?string
    {
        $price = $this->attributes['price_weekend'];

        if(is_null($price)) {
            return null;
        }

        $formattedPrice = number_format($price, 0, '.', ',');

        return $formattedPrice;
    }

    public function getPriceWeekendInt(): ?int
    {
        return $this->attributes['price_weekend'];
    }

    public function setPriceWeekend(?int $price): void
    {
        $this->attributes['price_weekend'] = $price;
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

    public static function validate($request): void
    {
        if ($request->has('name')) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
        }

        if ($request->has('descriptionMiniature')) {
            $request->validate([
                'descriptionMiniature' => 'required|string|max:255',
            ]);
        }

        if ($request->has('imageMiniature')) {
            $request->validate([
                'imageMiniature' => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
            ]);
        }

        if ($request->has('description')) {
            $request->validate([
                'description' => 'required|string',
            ]);
        }

        if ($request->has('images')) {
            $request->validate([
                'images' => 'required|array',
                'images.*' => 'required|image|mimes:jpeg,png,jpg,svg|max:5120',
            ]);
        }

        if ($request->has('priceWeekday')) {
            $request->validate([
                'price' => 'integer|nullable',
            ]);
        }

        if ($request->has('priceWeekend')) {
            $request->validate([
                'price' => 'integer|nullable',
            ]);
        }

        if ($request->has('inLanding')) {
            $request->validate([
                'inLanding' => 'required|boolean',
            ]);
        }
    }
}
