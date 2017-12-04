/**
 * Base Module for application
 * @type BaseModule
 * @param {object} $
 */
var BaseModule = (function($) {
    var self = {};
    
    self.init = function() {
        BaseModule.Validations.init();
    };
    
    return self;
})(jQuery);
