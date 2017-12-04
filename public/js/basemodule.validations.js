/**
 * Base Module validations
 * @type BaseModule.Validations
 * @param {object} $
 */
BaseModule.Validations = (function($) {
    var self = {},
        errorMessages = [],
        submitErrorMessage = '',
        requiredFieldMessage = 'This field is required',
        emailFieldMessage = 'Invalid email address',
        numericFieldMessage = 'This field must be a number',
        dataValidate = 'input[data-validate]';
    
    self.init = function() {
        
    };
    
    self.bindValidations = function() {
        unbindAllEvents();
        bindAllValidations();
    };
    
    /**
     * @param {string} value
     * @returns {boolean}
     */
    self.requiredValidation = function(value) {
        submitErrorMessage = requiredFieldMessage;
        return (value !== null && value.length > 0);
    };
    
    /**
     * @param {string} value
     * @returns {boolean}
     */
    self.emailValidation = function(value) {
        submitErrorMessage = emailFieldMessage;
        var pattern = /^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,}$/;
        return regexValidation(pattern, value);
    };
    
    /**
     * @param {string} value
     * @returns {boolean}
     */
    self.numericValidation = function(value) {
        submitErrorMessage = numericFieldMessage;
        var pattern = /^[0-9]+$/;
        return regexValidation(pattern, value);
    };
    
        /**
     * @param {object} ele
     * @param {boolean} isValid
     */
    self.executeValidation = function(ele, isValid) {
        if (isValid === true) {
            removeErrorClass(ele);
        } else {
            errorMessages = [];
            errorMessages.push(submitErrorMessage);
            addErrorClass(ele);
        }
    };
    
    /**
     * @param {string} pattern
     * @param {string} value
     * @returns {boolean}
     */
    function regexValidation(pattern, value) {
        return pattern.test(value);
    }
    
    /**
     * @param {object} ele
     */
    function addErrorClass(ele) {
        var $parentElement = $(ele).closest('.form-group');
        $parentElement.addClass('has-error');
        
        errorMessages.forEach(function(errorMessage) {
            errorMessageLabel = $('.error_message_base').html();
            errorMessageLabel = errorMessageLabel.replace('##error_message##', errorMessage);

            $parentElement.append(errorMessageLabel);
        });
    }
    
    /**
     * @param {object} ele
     */
    function removeErrorClass(ele) {
        var $parentElement = $(ele).closest('.form-group');
        $parentElement.removeClass('has-error');
        
        $parentElement.find('.label-danger').remove();
    }
    
    /**
     * 
     */
    function unbindAllEvents() {
        $(dataValidate).unbind('change');
    }
    
    /**
     * 
     */
    function bindAllValidations() {
        $(dataValidate).on('change', function() {
            var inputValue = $(this).val();
            var validations = $(this).attr('data-validate').split(' ');
            
            errorMessages = [];
            removeErrorClass(this);
            
            validations.forEach(function(validation) {
                switch(validation) {
                    case 'required':
                        if (self.requiredValidation(inputValue) === false) {
                            errorMessages.push(requiredFieldMessage);
                        }
                        break;
                    case 'email':
                        if (self.emailValidation(inputValue) === false) {
                            errorMessages.push(emailFieldMessage);
                        }
                        break;
                    case 'numeric':
                        if (self.numericValidation(inputValue) === false) {
                            errorMessages.push(numericFieldMessage);
                        }
                        break;
                }
            });
            
            if (errorMessages.length > 0) {
                addErrorClass(this);
            }
        });
    }
    
    return self;
})(jQuery);
