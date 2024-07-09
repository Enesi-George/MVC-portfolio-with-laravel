<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class SkillsData extends Data
{
  public function __construct(
    public string $name,
    public ?string $image //set image to be nullable
  ) {
  }
}
