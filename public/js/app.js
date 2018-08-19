(function ( $ ) {

    "use strict";

    /**
    ** Caching
    */
    var app = '',
        $html = $('html'),
        $body = $('body'),
        $window = $(window),
        $document = $(document),
        clientWidth = $window.innerWidth(),
        clientHeight = $window.innerHeight();

    /**
    ** Is Mobile...
    */
    var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    /**
    ** Apps
    */
    app = {

        init: function() {

            app.example();

        },

        example: function() {
            // Code
        }

    };

    // App Init
    $(document).ready(function() {
        app.init();
    });

})( jQuery );


//# sourceMappingURL=app.js.map