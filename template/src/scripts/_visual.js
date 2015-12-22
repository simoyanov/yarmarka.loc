var mouse_down = "click";

var visual = {
    init: function() {
        if (!Modernizr.csstransitions || !Modernizr.cssanimations) {
            transitions_av = false;
            $.fn.transition = $.fn.animate;
            $.fn.transitionStop = $.fn.stop;
        }

        if (mobile) {
            mouse_down = "touchstart";
        }
	},
    resize: function() {
        
    }
};
