<?php

namespace Nuwave\Lighthouse\Support\Traits;

trait HasArgumentPath
{
    /**
     * @var array<string|int>
     */
    protected $argumentPath;

    /**
     * @return array<string|int>
     */
    public function argumentPath(): array
    {
        return $this->argumentPath;
    }

    public function argumentPathAsDotNotation(): string
    {
        return implode('.', $this->argumentPath);
    }

    /**
     * @param  array<string|int>  $argumentPath
     * @return $this
     */
    public function setArgumentPath(array $argumentPath): self
    {
        $this->argumentPath = $argumentPath;

        return $this;
    }

    /**
     * @return string[]
     */
    public function argumentPathWithStarIndices(): string
    {
        return implode(
            '.',
                array_map(
                function ($path): string {
                    if (is_int($path)) {
                        return '*';
                    }

                    return $path;
                },
                $this->argumentPath
            )
        );
    }
}
