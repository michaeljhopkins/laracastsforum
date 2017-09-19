<?php

namespace App;

use Exception;

class Spam
{
    public function detect($body)
    {
        $this->detectInvalidKeywords($body);
        return false;
    }

    private function detectInvalidKeywords($body)
    {
        $invalidKeywords = [
            'yahoo customer support'
        ];

        foreach($invalidKeywords as $keyword) {
            if (stripos($body,$keyword) !== false) {
                throw new Exception('Your reply contains spam.');
            }
        }
    }
}