(function($) {

    var $document,
        $container,
        $toggleButton,
        $actionContainer;

    $(function() {

        $document = $(document);
        $container = $('.fabx');
        $toggleButton = $('.fabx__toggle');
        $actionContainer = $('.fabx__actions');

        var closeContainer = function() {
            $container.removeClass('fabx--is-open');
            $document.off('keyup.fabx');
        };

        $toggleButton.on('click.fabx', function(e) {
            e.preventDefault();
            if($container.hasClass('fabx--is-open')) {
                closeContainer();
            } else {
                $container.addClass('fabx--is-open');
                $document.on('keyup.fabx', closeContainer);
                if($container.find('.fabx--is-open').length === 0) {
                    $container.find('li:first-child').addClass('fabx--is-open');
                }
            }
        });

        $actionContainer.on('click.fabx', '.fabx__btn', function(e) {
            $actionContainer.find('.fabx--is-open').removeClass('fabx--is-open');
            $(this).closest('li').addClass('fabx--is-open');
        });
    });

})(jQuery);