;(function($, window, document, undefined) {

    var pluginName = 'fabx',
        defaults = {
            toggleButtonClass: '.fabx__toggle',
            actionContainerClass: '.fabx__actions',
            activeClass: '.fabx--is-open',
            buttonClass: '.fabx__btn'
        },
        $document = $(document);

    function Plugin(element, options) {
        this.element = element;
        this.options = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;

        this.init();
    }

    Plugin.prototype = {

        init: function() {

            this.$element = $(this.element);
            this.$actionContainer = $(this.options.actionContainerClass);

            this.generateClassNames();
            this.attachEventListeners();

        },

        generateClassNames: function() {
            this.options.activeClassName = this.options.activeClass.substr(1);
        },

        attachEventListeners: function() {
            var that = this;
            this.$element.find(this.options.toggleButtonClass).on('click.' + pluginName, function(e) {
               e.preventDefault();
               that.toggleContainer();
            });

            this.$actionContainer.on('click.' + pluginName, this.options.buttonClass, function(e) {
                that.$actionContainer.find(that.options.activeClass).removeClass(that.options.activeClassName);
                $(this).closest('li').addClass(that.options.activeClassName);
            });
        },

        toggleContainer: function() {
            if(this.$element.hasClass(this.options.activeClassName)) {
                this.closeContainer();
            } else {
                this.openContainer();
            }
        },

        openContainer: function() {
            this.$element.addClass(this.options.activeClassName);

            $document.on('keyup.' + pluginName, this.closeContainer.bind(this));

            this.openFirstActionIfNoneSelected();

        },

        closeContainer: function() {
            this.$element.removeClass(this.options.activeClassName);
            $document.off('keyup.' + pluginName);
        },

        openFirstActionIfNoneSelected: function() {
            if(this.$actionContainer.find(this.options.activeClass).length === 0) {
                this.$actionContainer.find('> :first-child').addClass(this.options.activeClassName);
            }
        }

    };

    $.fn[pluginName] = function(options) {

        return this.each(function() {

            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin( this, options ));
            }

        });

    };

})(jQuery, window, document);


