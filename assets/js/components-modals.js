(function (window, document, $) {
    
    'use strict';

    var onShowEvent = $('#onshow'),
        onShownEvent = $('#onshown'),
        onHideEvent = $('#onhide'),
        onHiddenEvent = $('#onhidden');

    onShowEvent.on('show.bs.modal', function () {
        alert('onShow event fired.');
    });

    onShownEvent.on('shown.bs.modal', function () {
        alert('onShown event fired.');
    });

    onHideEvent.on('hide.bs.modal', function () {
        alert('onHide event fired.');
    });

    onHiddenEvent.on('hidden.bs.modal', function () {
        alert('onHidden event fired.');
    });
    
})(window, document, jQuery);
