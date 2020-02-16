/*!
 * strength.js
 * Original author: @aaronlumsden
 * Further changes, comments: @aaronlumsden
 * Licensed under the MIT license
 */
;
(function ($, window, document, undefined) {

    var pluginName = "strength",
            defaults = {
                strengthClass: 'strength',
                strengthMeterClass: 'strength_meter',
                strengthButtonClass: 'button_strength',
                strengthButtonText: 'Show Password',
                strengthButtonTextToggle: 'Hide Password'
            };

    // $('<style>body { background-color: red; color: white; }</style>').appendTo('head');

    function Plugin(element, options) {
        this.element = element;
        this.$elem = $(this.element);
        this.options = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    Plugin.prototype = {
        init: function () {


            var characters = 0;
            var capitalletters = 0;
            var loweletters = 0;
            var number = 0;
            var special = 0;

            var upperCase = new RegExp('[A-Z]');
            var lowerCase = new RegExp('[a-z]');
            var numbers = new RegExp('[0-9]');
            var specialchars = new RegExp('([!,@,#,$,%,\^,&,*,?,_,~,=])');

            function GetPercentage(a, b) {
                return ((b / a) * 100);
            }

            function check_strength(thisval, thisid) {
                characters = (thisval.length > 7) ? 1 : -1;

                capitalletters = (thisval.match(upperCase)) ? 1 : 0;

                loweletters = (thisval.match(lowerCase)) ? 1 : 0;

                number = (thisval.match(numbers)) ? 1 : 0;

                special = (thisval.match(specialchars)) ? 1 : 0;

                var total = characters + capitalletters + loweletters + number + special;
                var totalpercent = GetPercentage(7, total).toFixed(0);

                if (!thisval.length) {
                    total = -1;
                }

                if (total > -1 || (total === -1 && thisval.indexOf(" ") > -1)) {
                    $(".popover_meter").fadeIn("fast");
                    if (total <= 1) {
                        $("#show-errors").text('Short passwords are easy to guess. Try one with at least 8 characters.');
                    } else {
                        $("#show-errors").text('');
                    }
                } else {
                    $("#show-errors").text('');
                    $(".popover_meter").fadeOut("fast");
                }
                if (total > -1 && characters === -1) {
                    $("#show-errors").text('Short passwords are easy to guess. Try one with at least 8 characters.');
                    $('div[data-meter="' + thisid + '"]').html('<b>Password strength:</b> Too short<div class="progress"><div class="progress-bar progress-bar-danger" style="width:10%">&nbsp;</div></div>');
                } else {
                    get_total(total, thisid);
                }


            }

            function get_total(total, thisid) {
                $("#show-errors").text('');
                var thismeter = $('div[data-meter="' + thisid + '"]');
                if (total <= 1) {
                    thismeter.html('<b>Password strength:</b> Too short<div class="progress"><div class="progress-bar progress-bar-danger" style="width:10%">&nbsp;</div></div>');
                } else if (total === 2) {
                    $("#show-errors").text('Weak passwords are easy to guess. Try combine lower case, upper case and number to make strong passwords.');
                    thismeter.html('<b>Password strength:</b> Too weak<div class="progress"><div class="progress-bar progress-bar-danger" style="width:30%">&nbsp;</div></div>');
                } else if (total === 3) {
                    thismeter.html('<b>Password strength:</b> Medium<div class="progress"><div class="progress-bar progress-bar-warning" style="width:55%">&nbsp;</div></div>');
                } else if (total === 4) {
                    thismeter.html('<b>Password strength:</b> Strong<div class="progress"><div class="progress-bar progress-bar-success" style="width:100%">&nbsp;</div></div>');
                } else if (total > 4) {
                    thismeter.html('<b>Password strength:</b> Very Strong<div class="progress"><div class="progress-bar progress-bar-success" style="width:100%">&nbsp;</div></div>');
                }
            }

            var isShown = false;
            var strengthButtonText = this.options.strengthButtonText;
            var strengthButtonTextToggle = this.options.strengthButtonTextToggle;


            thisid = this.$elem.attr('id');

            this.$elem.addClass(this.options.strengthClass).attr('data-password', thisid).after('<input style="display:none" class="' + this.options.strengthClass + '" data-password="' + thisid + '" type="text" name="" value=""><a data-password-button="' + thisid + '" href="" class="' + this.options.strengthButtonClass + '">' + this.options.strengthButtonText + '</a><div class="' + this.options.strengthMeterClass + '"><div data-meter="' + thisid + '" style="display: inline; margin-top: -37px; padding: 12px; position: absolute;"></div></div>');

            this.$elem.bind('keyup keydown', function (event) {
                thisval = $('#' + thisid).val();
                $('input[type="text"][data-password="' + thisid + '"]').val(thisval);
                check_strength(thisval, thisid);

            });

            $('input[type="text"][data-password="' + thisid + '"]').bind('keyup keydown', function (event) {
                thisval = $('input[type="text"][data-password="' + thisid + '"]').val();
                console.log(thisval);
                $('input[type="password"][data-password="' + thisid + '"]').val(thisval);
                check_strength(thisval, thisid);

            });
        },
        yourOtherFunction: function (el, options) {
            // some logic
        }
    };

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });
    };

})(jQuery, window, document);


