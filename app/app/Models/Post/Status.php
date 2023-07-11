<?php

namespace App\Models\Post;

enum Status: string
{
    case ACCEPT = 'ACCEPT';
    case NOT_ACCEPT = 'NOT_ACCEPT';


    public function isAccepted(): bool
    {
        return $this->value === self::ACCEPT->value;
    }

    /**
     * @return bool
     */
    public function isNotAccepted(): bool
    {
        return $this->value === self::NOT_ACCEPT->value;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return match ($this->value) {
            self::ACCEPT->value => __('Accept'),
            self::NOT_ACCEPT->value => __('Not accept'),
            default => throw new \LogicException('Undefined status'),
        };
    }
}
