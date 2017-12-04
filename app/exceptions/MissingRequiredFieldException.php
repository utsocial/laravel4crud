<?php
namespace App\Exceptions;

use Symfony\Component\Translation\Exception\NotFoundResourceException;

/**
 * Missing Required Field Exception
 */
class MissingRequiredFieldException extends NotFoundResourceException
{
    
}
