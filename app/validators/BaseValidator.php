<?php
namespace App\Validators;

use App\Exceptions\InvalidDayException;

/**
 * Validator base class
 */
class BaseValidator
{
    /** @var array */
    private $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    
    /**
     * @param string $pattern
     * @param string $value
     * @return boolean
     */
    protected function isValidRegex($pattern, $value)
    {
        $response = false;
        
        if (preg_match($pattern, $value) == 1) {
            $response = true;
        }
        
        return $response;
    }
    
    /**
     * @param string $dayName
     * @throws InvalidDayException
     */
    protected function isValidDay($dayName)
    {
        if (in_array($dayName, $this->days) == false) {
            throw new InvalidDayException('Invalid Day');
        }
    }
    
}
