<?php
namespace App\Validators;

use App\Exceptions\MissingRequiredFieldException;
use App\Validators\Contracts\ValidatorInterface;

/**
 * Validate fields of appointment scheduled in settings
 */
class AppointmentSchedulerValidator implements ValidatorInterface
{

    /**
     * @inheritdoc
     */
    public function validate(array $data)
    {
        $this->validateRequiredFields($data);
    }

    /**
     * @param array $data
     * @throws MissingRequiredFieldException
     */
    private function validateRequiredFields(array $data)
    {
        $flag_missing_fields=false;
        foreach($data['stores'] as $value) {
            if ($value=="" || $value == null)
                $flag_missing_fields = true;
        }
        if (empty($data['email_address']) || empty($data['password'])) {
            $flag_missing_fields = true;
        }
        if ($flag_missing_fields == true) {
            throw new MissingRequiredFieldException('Missing Required Fields');
        }
    }

}
