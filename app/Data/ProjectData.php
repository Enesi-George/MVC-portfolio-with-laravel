<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class ProjectData extends Data
{
    public function __construct(
      public int $skill_id,
      public string $name,
      public ?string $project_url,
      public ?string $image
    ) {}
}
