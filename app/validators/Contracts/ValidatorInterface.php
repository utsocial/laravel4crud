<?php
namespace App\Validators\Contracts;

use App\Exceptions\InvalidAppointmentLimitValueException;
use App\Exceptions\InvalidDateTimeException;
use App\Exceptions\InvalidDayException;
use App\Exceptions\InvalidEmailAddressFormatException;
use App\Exceptions\InvalidPhoneException;
use App\Exceptions\InvalidReminderValueException;
use App\Exceptions\InvalidServiceValueException;
use App\Exceptions\InvalidTimeValueException;
use App\Exceptions\MissingHoursOfOperationsDataException;
use App\Exceptions\MissingRequiredFieldException;
use App\Exceptions\MissingScheduleDataException;

/**
 * Contract for Validator classes
 */
interface ValidatorInterface {
    
    /**
     * @param array $data
     * @throws InvalidAppointmentLimitValueException
     * @throws InvalidDateTimeException
     * @throws InvalidDayException
     * @throws InvalidEmailAddressFormatException
     * @throws InvalidPhoneException
     * @throws InvalidReminderValueException
     * @throws InvalidServiceValueException
     * @throws InvalidTimeValueException
     * @throws MissingHoursOfOperationsDataException
     * @throws MissingRequiredFieldException
     * @throws MissingScheduleDataException
     */
    public function validate(array $data);
    
}
