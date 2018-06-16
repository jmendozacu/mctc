/**
 * lining.effect.js
 * Special lining effect.
 * https://github.com/zmmbreeze/lining.
 *
 * @author zmmbreeze / @zhoumm
 */

/* jshint sub:true, camelcase:false */
/* global lining:true */

(function (lining) {
    if (!lining || !lining.util || !lining.Lining) {
        return;
    }

    lining.util.on(document, 'beforelining', function (e) {
        var target = e.target;
        var effectName = target.getAttribute('data-effect');
        var effect = Effects[effectName];
        if (effect && effect['before']) {
            effect['before'].call(this, e);
        }
    });

    lining.util.on(document, 'afterlining', function (e) {
        var target = e.target;
        var effectName = target.getAttribute('data-effect');
        var effect = Effects[effectName];
        if (effect && effect['after']) {
            effect['after'].call(this, e);
        }
    });

    /**
     * @type {string} all css text.
     */
    var allCssText = '';
    /**
     * @type {Object.<string, Object>}
     */
    var Effects = {};
    /**
     * create effect
     * @param {string} name
     * @param {Object} effect
     * @param {string=} effect.css
     * @param {function(Event)=} effect.before
     * @param {function(Event)=} effect.after
     */
    var createEffect = function (name, effect) {
        Effects[name] = effect;
        allCssText += effect['css'];
    };
    /**
     * call for each line
     * @param {Element} element
     * @param {number} timeout
     * @param {function(Array.<Element>)} callback
     */
    var eachLine = function (element, timeout, callback) {
        var lines = Array.prototype.slice.call(element.getElementsByTagName('text-line'), 0);
        (function animate() {
            if (!lines.length) {
                return;
            }

            setTimeout(function () {
                callback(lines);
                animate();
            }, timeout);
        })();
    };

    // ---------------------------
    // Effects
    // ---------------------------

    /**
     * @type {string} basic Css
     */
    var basicCss = ''
        + '[data-effect="{name}"] {'
        +     'opacity:0;'
        + '}'
        + '[data-effect="{name}"][data-lining="end"],'
        + '.nolining [data-effect="{name}"] {'
        +     'opacity:1;'
        + '}'
        + '[data-effect="{name}"] text-line {'
        +     'opacity:0;'
        +     'transition:1s opacity;'
        +     '-webkit-transform:translate3d(0, 0, 0);'
        +     'transform:translate3d(0, 0, 0);'
        +     '-webkit-font-smoothing:antialiased;'
        + '}'
        + '[data-effect="{name}"] text-line[effect-end] {'
        +     'opacity:1;'
        + '}';
    /**
     * basic after callbacks
     * @param {Event} e event
     */
    var basicAfterCallback = function (e) {
        eachLine(e.target, 150, function (lines) {
            lines.shift().setAttribute('effect-end', '');
        });
    };

    createEffect('fadeIn', {
        'css': basicCss.replace(/{name}/g, 'fadeIn'),
        'after': basicAfterCallback
    });

    createEffect('slideIn', {
        'css': basicCss.replace(/{name}/g, 'slideIn')
            + '[data-effect="slideIn"] text-line {'
            +     'transition:1s opacity, .6s top;'
            +     'position:relative;'
            +     'top:100px;'
            + '}'
            + '[data-effect="slideIn"] text-line[effect-end] {'
            +     'top:0;'
            + '}',
        'after': basicAfterCallback
    });

    createEffect('slideInFromLeft', {
        'css': basicCss.replace(/{name}/g, 'slideInFromLeft')
            + '[data-effect="slideInFromLeft"] text-line {'
            +     'transition:1s opacity, .2s left;'
            +     'position:relative;'
            +     'left:-100%;'
            + '}'
            + '[data-effect="slideInFromLeft"] text-line[effect-end] {'
            +     'left:0;'
            + '}',
        'after': basicAfterCallback
    });

    createEffect('slideInFromRight', {
        'css': basicCss.replace(/{name}/g, 'slideInFromRight')
            + '[data-effect="slideInFromRight"] text-line {'
            +     'transition:1s opacity, .6s left;'
            +     'position:relative;'
            +     'left:100%;'
            + '}'
            + '[data-effect="slideInFromRight"] text-line[effect-end] {'
            +     'left:0;'
            + '}',
        'after': basicAfterCallback
    });
    lining.util.createStyle(allCssText);
})(lining);
