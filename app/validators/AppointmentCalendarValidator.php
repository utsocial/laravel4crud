<?php
namespace App\Validators;

use App\Exceptions\InvalidDateTimeException;
use App\Exceptions\InvalidEmailAddressFormatException;
use App\Exceptions\InvalidPhoneException;
use App\Exceptions\InvalidReminderValueException;
use App\Exceptions\InvalidServiceValueException;
use App\Exceptions\MissingRequiredFieldException;
use App\Validators\BaseValidator;
use App\Validators\Contracts\ValidatorInterface;

/**
 * Validator for calendar appointments functionality
 */
class AppointmentCalendarValidator extends BaseValidator implements ValidatorInterface
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
        if (isset($data['scheduled_date']) && empty($data['scheduled_date']) == false &&
            isset($data['day_name']) && empty($data['day_name']) == false &&
            isset($data['customer_first_name']) && empty($data['customer_first_name']) == false &&
            isset($data['customer_last_name']) && empty($data['customer_last_name']) == false &&
            isset($data['customer_email']) && empty($data['customer_email']) == false &&
            isset($data['customer_phone']) && empty($data['customer_phone']) == false &&
            isset($data['email_reminder']) && is_numeric($data['email_reminder']) &&
            isset($data['sms_reminder']) && is_numeric($data['sms_reminder']) &&
            isset($data['services']) && is_array($data['services']) && empty($data['services']) == false
        ) {
            $this->validateScheduledDate($data['scheduled_date']);
            $this->isValidDay($data['day_name']);
            $this->validateCustomerEmail($data['customer_email']);
            $this->validateCustomerPhone($data['customer_phone']);
            $this->validateReminders($data['email_reminder'], $data['sms_reminder']);
            $this->validateServices($data['services']);
        } else {
            throw new MissingRequiredFieldException('Missing Required Fields');
        }
    }
    
    /**
     * @param string $scheduledDate
     * @throws InvalidDateTimeException
     */
    private function validateScheduledDate($scheduledDate)
    {
        $pattern = '/^\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}$/';
        
        if ($this->isValidRegex($pattern, $scheduledDate) == false) {
            throw new InvalidDateTimeException('Not a Valid Date');
        }
        
        if (strtotime('today') > strtotime($scheduledDate)) {
            throw new InvalidDateTimeException('Appointment Date must be a Future Date');
        }
    }
    
    /**
     * @param string $emailAddress
     * @throws InvalidEmailAddressFormatException
     */
    private function validateCustomerEmail($emailAddress)
    {
        $pattern = '/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,}$/';
        
        if ($this->isValidRegex($pattern, $emailAddress) == false) {
            throw new InvalidEmailAddressFormatException('Invalid Email Address');
        }
    }
    
    /**
     * @param string $phone
     * @throws InvalidPhoneException
     */
    private function validateCustomerPhone($phone)
    {
        if (is_numeric($phone) == false) {
            throw new InvalidPhoneException('Invalid Phone');
        }
    }
    
    /**
     * @param int $emailReminder
     * @param int $smsReminder
     * @throws InvalidReminderValueException
     */
    private function validateReminders($emailReminder, $smsReminder)
    {
        if ((int)$emailReminder < 0 || (int)$emailReminder > 1 ||
            (int)$smsReminder < 0 || (int)$smsReminder > 1 ||
            $emailReminder == $smsReminder) {
            throw new InvalidReminderValueException('Invalid Values for Reminders');
        }
    }
    
    /**
     * @param array $services
     * @throws InvalidServiceValueException
     */
    private function validateServices(array $services)
    {
        foreach($services as $service) {
            if (is_numeric($service) == false) {
                throw new InvalidServiceValueException('Invalid Service Value');
            }
        }
    }
    
}
