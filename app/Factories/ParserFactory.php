<?php

declare(strict_types=1);

namespace App\Factories;

use App\Services\Log\FileParses\ParseRaw;

class ParserFactory
{

    const RAW = 'raw';

    public function make($format)
    {
        switch ($format) {
            case self::RAW:
                return new ParseRaw();
            default:
                throw new \Exception('Unknown format : ' . $format);
        }
    }

}


?>