"use strict";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*!
  * Bootstrap v4.3.1 (https://getbootstrap.com/)
  * Copyright 2011-2019 The Bootstrap Authors (https://github.com/twbs/bootstrap/graphs/contributors)
  * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
  */
!function (t, e) {
  "object" == (typeof exports === "undefined" ? "undefined" : _typeof(exports)) && "undefined" != typeof module ? e(exports, require("jquery"), require("popper.js")) : "function" == typeof define && define.amd ? define(["exports", "jquery", "popper.js"], e) : e((t = t || self).bootstrap = {}, t.jQuery, t.Popper);
}(void 0, function (t, g, u) {
  "use strict";

  function i(t, e) {
    for (var n = 0; n < e.length; n++) {
      var i = e[n];
      i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(t, i.key, i);
    }
  }

  function s(t, e, n) {
    return e && i(t.prototype, e), n && i(t, n), t;
  }

  function l(o) {
    for (var t = 1; t < arguments.length; t++) {
      var r = null != arguments[t] ? arguments[t] : {},
          e = Object.keys(r);
      "function" == typeof Object.getOwnPropertySymbols && (e = e.concat(Object.getOwnPropertySymbols(r).filter(function (t) {
        return Object.getOwnPropertyDescriptor(r, t).enumerable;
      }))), e.forEach(function (t) {
        var e, n, i;
        e = o, i = r[n = t], n in e ? Object.defineProperty(e, n, {
          value: i,
          enumerable: !0,
          configurable: !0,
          writable: !0
        }) : e[n] = i;
      });
    }

    return o;
  }

  g = g && g.hasOwnProperty("default") ? g.default : g, u = u && u.hasOwnProperty("default") ? u.default : u;
  var e = "transitionend";

  function n(t) {
    var e = this,
        n = !1;
    return g(this).one(_.TRANSITION_END, function () {
      n = !0;
    }), setTimeout(function () {
      n || _.triggerTransitionEnd(e);
    }, t), this;
  }

  var _ = {
    TRANSITION_END: "bsTransitionEnd",
    getUID: function getUID(t) {
      for (; t += ~~(1e6 * Math.random()), document.getElementById(t);) {
        ;
      }

      return t;
    },
    getSelectorFromElement: function getSelectorFromElement(t) {
      var e = t.getAttribute("data-target");

      if (!e || "#" === e) {
        var n = t.getAttribute("href");
        e = n && "#" !== n ? n.trim() : "";
      }

      try {
        return document.querySelector(e) ? e : null;
      } catch (t) {
        return null;
      }
    },
    getTransitionDurationFromElement: function getTransitionDurationFromElement(t) {
      if (!t) return 0;
      var e = g(t).css("transition-duration"),
          n = g(t).css("transition-delay"),
          i = parseFloat(e),
          o = parseFloat(n);
      return i || o ? (e = e.split(",")[0], n = n.split(",")[0], 1e3 * (parseFloat(e) + parseFloat(n))) : 0;
    },
    reflow: function reflow(t) {
      return t.offsetHeight;
    },
    triggerTransitionEnd: function triggerTransitionEnd(t) {
      g(t).trigger(e);
    },
    supportsTransitionEnd: function supportsTransitionEnd() {
      return Boolean(e);
    },
    isElement: function isElement(t) {
      return (t[0] || t).nodeType;
    },
    typeCheckConfig: function typeCheckConfig(t, e, n) {
      for (var i in n) {
        if (Object.prototype.hasOwnProperty.call(n, i)) {
          var o = n[i],
              r = e[i],
              s = r && _.isElement(r) ? "element" : (a = r, {}.toString.call(a).match(/\s([a-z]+)/i)[1].toLowerCase());
          if (!new RegExp(o).test(s)) throw new Error(t.toUpperCase() + ': Option "' + i + '" provided type "' + s + '" but expected type "' + o + '".');
        }
      }

      var a;
    },
    findShadowRoot: function findShadowRoot(t) {
      if (!document.documentElement.attachShadow) return null;
      if ("function" != typeof t.getRootNode) return t instanceof ShadowRoot ? t : t.parentNode ? _.findShadowRoot(t.parentNode) : null;
      var e = t.getRootNode();
      return e instanceof ShadowRoot ? e : null;
    }
  };
  g.fn.emulateTransitionEnd = n, g.event.special[_.TRANSITION_END] = {
    bindType: e,
    delegateType: e,
    handle: function handle(t) {
      if (g(t.target).is(this)) return t.handleObj.handler.apply(this, arguments);
    }
  };

  var o = "alert",
      r = "bs.alert",
      a = "." + r,
      c = g.fn[o],
      h = {
    CLOSE: "close" + a,
    CLOSED: "closed" + a,
    CLICK_DATA_API: "click" + a + ".data-api"
  },
      f = "alert",
      d = "fade",
      m = "show",
      p = function () {
    function i(t) {
      this._element = t;
    }

    var t = i.prototype;
    return t.close = function (t) {
      var e = this._element;
      t && (e = this._getRootElement(t)), this._triggerCloseEvent(e).isDefaultPrevented() || this._removeElement(e);
    }, t.dispose = function () {
      g.removeData(this._element, r), this._element = null;
    }, t._getRootElement = function (t) {
      var e = _.getSelectorFromElement(t),
          n = !1;

      return e && (n = document.querySelector(e)), n || (n = g(t).closest("." + f)[0]), n;
    }, t._triggerCloseEvent = function (t) {
      var e = g.Event(h.CLOSE);
      return g(t).trigger(e), e;
    }, t._removeElement = function (e) {
      var n = this;

      if (g(e).removeClass(m), g(e).hasClass(d)) {
        var t = _.getTransitionDurationFromElement(e);

        g(e).one(_.TRANSITION_END, function (t) {
          return n._destroyElement(e, t);
        }).emulateTransitionEnd(t);
      } else this._destroyElement(e);
    }, t._destroyElement = function (t) {
      g(t).detach().trigger(h.CLOSED).remove();
    }, i._jQueryInterface = function (n) {
      return this.each(function () {
        var t = g(this),
            e = t.data(r);
        e || (e = new i(this), t.data(r, e)), "close" === n && e[n](this);
      });
    }, i._handleDismiss = function (e) {
      return function (t) {
        t && t.preventDefault(), e.close(this);
      };
    }, s(i, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }]), i;
  }();

  g(document).on(h.CLICK_DATA_API, '[data-dismiss="alert"]', p._handleDismiss(new p())), g.fn[o] = p._jQueryInterface, g.fn[o].Constructor = p, g.fn[o].noConflict = function () {
    return g.fn[o] = c, p._jQueryInterface;
  };

  var v = "button",
      y = "bs.button",
      E = "." + y,
      C = ".data-api",
      T = g.fn[v],
      S = "active",
      b = "btn",
      I = "focus",
      D = '[data-toggle^="button"]',
      w = '[data-toggle="buttons"]',
      A = 'input:not([type="hidden"])',
      N = ".active",
      O = ".btn",
      k = {
    CLICK_DATA_API: "click" + E + C,
    FOCUS_BLUR_DATA_API: "focus" + E + C + " blur" + E + C
  },
      P = function () {
    function n(t) {
      this._element = t;
    }

    var t = n.prototype;
    return t.toggle = function () {
      var t = !0,
          e = !0,
          n = g(this._element).closest(w)[0];

      if (n) {
        var i = this._element.querySelector(A);

        if (i) {
          if ("radio" === i.type) if (i.checked && this._element.classList.contains(S)) t = !1;else {
            var o = n.querySelector(N);
            o && g(o).removeClass(S);
          }

          if (t) {
            if (i.hasAttribute("disabled") || n.hasAttribute("disabled") || i.classList.contains("disabled") || n.classList.contains("disabled")) return;
            i.checked = !this._element.classList.contains(S), g(i).trigger("change");
          }

          i.focus(), e = !1;
        }
      }

      e && this._element.setAttribute("aria-pressed", !this._element.classList.contains(S)), t && g(this._element).toggleClass(S);
    }, t.dispose = function () {
      g.removeData(this._element, y), this._element = null;
    }, n._jQueryInterface = function (e) {
      return this.each(function () {
        var t = g(this).data(y);
        t || (t = new n(this), g(this).data(y, t)), "toggle" === e && t[e]();
      });
    }, s(n, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }]), n;
  }();

  g(document).on(k.CLICK_DATA_API, D, function (t) {
    t.preventDefault();
    var e = t.target;
    g(e).hasClass(b) || (e = g(e).closest(O)), P._jQueryInterface.call(g(e), "toggle");
  }).on(k.FOCUS_BLUR_DATA_API, D, function (t) {
    var e = g(t.target).closest(O)[0];
    g(e).toggleClass(I, /^focus(in)?$/.test(t.type));
  }), g.fn[v] = P._jQueryInterface, g.fn[v].Constructor = P, g.fn[v].noConflict = function () {
    return g.fn[v] = T, P._jQueryInterface;
  };

  var L = "carousel",
      j = "bs.carousel",
      H = "." + j,
      R = ".data-api",
      x = g.fn[L],
      F = {
    interval: 5e3,
    keyboard: !0,
    slide: !1,
    pause: "hover",
    wrap: !0,
    touch: !0
  },
      U = {
    interval: "(number|boolean)",
    keyboard: "boolean",
    slide: "(boolean|string)",
    pause: "(string|boolean)",
    wrap: "boolean",
    touch: "boolean"
  },
      W = "next",
      q = "prev",
      M = "left",
      K = "right",
      Q = {
    SLIDE: "slide" + H,
    SLID: "slid" + H,
    KEYDOWN: "keydown" + H,
    MOUSEENTER: "mouseenter" + H,
    MOUSELEAVE: "mouseleave" + H,
    TOUCHSTART: "touchstart" + H,
    TOUCHMOVE: "touchmove" + H,
    TOUCHEND: "touchend" + H,
    POINTERDOWN: "pointerdown" + H,
    POINTERUP: "pointerup" + H,
    DRAG_START: "dragstart" + H,
    LOAD_DATA_API: "load" + H + R,
    CLICK_DATA_API: "click" + H + R
  },
      B = "carousel",
      V = "active",
      Y = "slide",
      z = "carousel-item-right",
      X = "carousel-item-left",
      $ = "carousel-item-next",
      G = "carousel-item-prev",
      J = "pointer-event",
      Z = ".active",
      tt = ".active.carousel-item",
      et = ".carousel-item",
      nt = ".carousel-item img",
      it = ".carousel-item-next, .carousel-item-prev",
      ot = ".carousel-indicators",
      rt = "[data-slide], [data-slide-to]",
      st = '[data-ride="carousel"]',
      at = {
    TOUCH: "touch",
    PEN: "pen"
  },
      lt = function () {
    function r(t, e) {
      this._items = null, this._interval = null, this._activeElement = null, this._isPaused = !1, this._isSliding = !1, this.touchTimeout = null, this.touchStartX = 0, this.touchDeltaX = 0, this._config = this._getConfig(e), this._element = t, this._indicatorsElement = this._element.querySelector(ot), this._touchSupported = "ontouchstart" in document.documentElement || 0 < navigator.maxTouchPoints, this._pointerEvent = Boolean(window.PointerEvent || window.MSPointerEvent), this._addEventListeners();
    }

    var t = r.prototype;
    return t.next = function () {
      this._isSliding || this._slide(W);
    }, t.nextWhenVisible = function () {
      !document.hidden && g(this._element).is(":visible") && "hidden" !== g(this._element).css("visibility") && this.next();
    }, t.prev = function () {
      this._isSliding || this._slide(q);
    }, t.pause = function (t) {
      t || (this._isPaused = !0), this._element.querySelector(it) && (_.triggerTransitionEnd(this._element), this.cycle(!0)), clearInterval(this._interval), this._interval = null;
    }, t.cycle = function (t) {
      t || (this._isPaused = !1), this._interval && (clearInterval(this._interval), this._interval = null), this._config.interval && !this._isPaused && (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval));
    }, t.to = function (t) {
      var e = this;
      this._activeElement = this._element.querySelector(tt);

      var n = this._getItemIndex(this._activeElement);

      if (!(t > this._items.length - 1 || t < 0)) if (this._isSliding) g(this._element).one(Q.SLID, function () {
        return e.to(t);
      });else {
        if (n === t) return this.pause(), void this.cycle();
        var i = n < t ? W : q;

        this._slide(i, this._items[t]);
      }
    }, t.dispose = function () {
      g(this._element).off(H), g.removeData(this._element, j), this._items = null, this._config = null, this._element = null, this._interval = null, this._isPaused = null, this._isSliding = null, this._activeElement = null, this._indicatorsElement = null;
    }, t._getConfig = function (t) {
      return t = l({}, F, t), _.typeCheckConfig(L, t, U), t;
    }, t._handleSwipe = function () {
      var t = Math.abs(this.touchDeltaX);

      if (!(t <= 40)) {
        var e = t / this.touchDeltaX;
        0 < e && this.prev(), e < 0 && this.next();
      }
    }, t._addEventListeners = function () {
      var e = this;
      this._config.keyboard && g(this._element).on(Q.KEYDOWN, function (t) {
        return e._keydown(t);
      }), "hover" === this._config.pause && g(this._element).on(Q.MOUSEENTER, function (t) {
        return e.pause(t);
      }).on(Q.MOUSELEAVE, function (t) {
        return e.cycle(t);
      }), this._config.touch && this._addTouchEventListeners();
    }, t._addTouchEventListeners = function () {
      var n = this;

      if (this._touchSupported) {
        var e = function e(t) {
          n._pointerEvent && at[t.originalEvent.pointerType.toUpperCase()] ? n.touchStartX = t.originalEvent.clientX : n._pointerEvent || (n.touchStartX = t.originalEvent.touches[0].clientX);
        },
            i = function i(t) {
          n._pointerEvent && at[t.originalEvent.pointerType.toUpperCase()] && (n.touchDeltaX = t.originalEvent.clientX - n.touchStartX), n._handleSwipe(), "hover" === n._config.pause && (n.pause(), n.touchTimeout && clearTimeout(n.touchTimeout), n.touchTimeout = setTimeout(function (t) {
            return n.cycle(t);
          }, 500 + n._config.interval));
        };

        g(this._element.querySelectorAll(nt)).on(Q.DRAG_START, function (t) {
          return t.preventDefault();
        }), this._pointerEvent ? (g(this._element).on(Q.POINTERDOWN, function (t) {
          return e(t);
        }), g(this._element).on(Q.POINTERUP, function (t) {
          return i(t);
        }), this._element.classList.add(J)) : (g(this._element).on(Q.TOUCHSTART, function (t) {
          return e(t);
        }), g(this._element).on(Q.TOUCHMOVE, function (t) {
          var e;
          (e = t).originalEvent.touches && 1 < e.originalEvent.touches.length ? n.touchDeltaX = 0 : n.touchDeltaX = e.originalEvent.touches[0].clientX - n.touchStartX;
        }), g(this._element).on(Q.TOUCHEND, function (t) {
          return i(t);
        }));
      }
    }, t._keydown = function (t) {
      if (!/input|textarea/i.test(t.target.tagName)) switch (t.which) {
        case 37:
          t.preventDefault(), this.prev();
          break;

        case 39:
          t.preventDefault(), this.next();
      }
    }, t._getItemIndex = function (t) {
      return this._items = t && t.parentNode ? [].slice.call(t.parentNode.querySelectorAll(et)) : [], this._items.indexOf(t);
    }, t._getItemByDirection = function (t, e) {
      var n = t === W,
          i = t === q,
          o = this._getItemIndex(e),
          r = this._items.length - 1;

      if ((i && 0 === o || n && o === r) && !this._config.wrap) return e;
      var s = (o + (t === q ? -1 : 1)) % this._items.length;
      return -1 === s ? this._items[this._items.length - 1] : this._items[s];
    }, t._triggerSlideEvent = function (t, e) {
      var n = this._getItemIndex(t),
          i = this._getItemIndex(this._element.querySelector(tt)),
          o = g.Event(Q.SLIDE, {
        relatedTarget: t,
        direction: e,
        from: i,
        to: n
      });

      return g(this._element).trigger(o), o;
    }, t._setActiveIndicatorElement = function (t) {
      if (this._indicatorsElement) {
        var e = [].slice.call(this._indicatorsElement.querySelectorAll(Z));
        g(e).removeClass(V);

        var n = this._indicatorsElement.children[this._getItemIndex(t)];

        n && g(n).addClass(V);
      }
    }, t._slide = function (t, e) {
      var n,
          i,
          o,
          r = this,
          s = this._element.querySelector(tt),
          a = this._getItemIndex(s),
          l = e || s && this._getItemByDirection(t, s),
          c = this._getItemIndex(l),
          h = Boolean(this._interval);

      if (o = t === W ? (n = X, i = $, M) : (n = z, i = G, K), l && g(l).hasClass(V)) this._isSliding = !1;else if (!this._triggerSlideEvent(l, o).isDefaultPrevented() && s && l) {
        this._isSliding = !0, h && this.pause(), this._setActiveIndicatorElement(l);
        var u = g.Event(Q.SLID, {
          relatedTarget: l,
          direction: o,
          from: a,
          to: c
        });

        if (g(this._element).hasClass(Y)) {
          g(l).addClass(i), _.reflow(l), g(s).addClass(n), g(l).addClass(n);
          var f = parseInt(l.getAttribute("data-interval"), 10);
          this._config.interval = f ? (this._config.defaultInterval = this._config.defaultInterval || this._config.interval, f) : this._config.defaultInterval || this._config.interval;

          var d = _.getTransitionDurationFromElement(s);

          g(s).one(_.TRANSITION_END, function () {
            g(l).removeClass(n + " " + i).addClass(V), g(s).removeClass(V + " " + i + " " + n), r._isSliding = !1, setTimeout(function () {
              return g(r._element).trigger(u);
            }, 0);
          }).emulateTransitionEnd(d);
        } else g(s).removeClass(V), g(l).addClass(V), this._isSliding = !1, g(this._element).trigger(u);

        h && this.cycle();
      }
    }, r._jQueryInterface = function (i) {
      return this.each(function () {
        var t = g(this).data(j),
            e = l({}, F, g(this).data());
        "object" == _typeof(i) && (e = l({}, e, i));
        var n = "string" == typeof i ? i : e.slide;
        if (t || (t = new r(this, e), g(this).data(j, t)), "number" == typeof i) t.to(i);else if ("string" == typeof n) {
          if ("undefined" == typeof t[n]) throw new TypeError('No method named "' + n + '"');
          t[n]();
        } else e.interval && e.ride && (t.pause(), t.cycle());
      });
    }, r._dataApiClickHandler = function (t) {
      var e = _.getSelectorFromElement(this);

      if (e) {
        var n = g(e)[0];

        if (n && g(n).hasClass(B)) {
          var i = l({}, g(n).data(), g(this).data()),
              o = this.getAttribute("data-slide-to");
          o && (i.interval = !1), r._jQueryInterface.call(g(n), i), o && g(n).data(j).to(o), t.preventDefault();
        }
      }
    }, s(r, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }, {
      key: "Default",
      get: function get() {
        return F;
      }
    }]), r;
  }();

  g(document).on(Q.CLICK_DATA_API, rt, lt._dataApiClickHandler), g(window).on(Q.LOAD_DATA_API, function () {
    for (var t = [].slice.call(document.querySelectorAll(st)), e = 0, n = t.length; e < n; e++) {
      var i = g(t[e]);

      lt._jQueryInterface.call(i, i.data());
    }
  }), g.fn[L] = lt._jQueryInterface, g.fn[L].Constructor = lt, g.fn[L].noConflict = function () {
    return g.fn[L] = x, lt._jQueryInterface;
  };

  var ct = "collapse",
      ht = "bs.collapse",
      ut = "." + ht,
      ft = g.fn[ct],
      dt = {
    toggle: !0,
    parent: ""
  },
      gt = {
    toggle: "boolean",
    parent: "(string|element)"
  },
      _t = {
    SHOW: "show" + ut,
    SHOWN: "shown" + ut,
    HIDE: "hide" + ut,
    HIDDEN: "hidden" + ut,
    CLICK_DATA_API: "click" + ut + ".data-api"
  },
      mt = "show",
      pt = "collapse",
      vt = "collapsing",
      yt = "collapsed",
      Et = "width",
      Ct = "height",
      Tt = ".show, .collapsing",
      St = '[data-toggle="collapse"]',
      bt = function () {
    function a(e, t) {
      this._isTransitioning = !1, this._element = e, this._config = this._getConfig(t), this._triggerArray = [].slice.call(document.querySelectorAll('[data-toggle="collapse"][href="#' + e.id + '"],[data-toggle="collapse"][data-target="#' + e.id + '"]'));

      for (var n = [].slice.call(document.querySelectorAll(St)), i = 0, o = n.length; i < o; i++) {
        var r = n[i],
            s = _.getSelectorFromElement(r),
            a = [].slice.call(document.querySelectorAll(s)).filter(function (t) {
          return t === e;
        });

        null !== s && 0 < a.length && (this._selector = s, this._triggerArray.push(r));
      }

      this._parent = this._config.parent ? this._getParent() : null, this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray), this._config.toggle && this.toggle();
    }

    var t = a.prototype;
    return t.toggle = function () {
      g(this._element).hasClass(mt) ? this.hide() : this.show();
    }, t.show = function () {
      var t,
          e,
          n = this;

      if (!this._isTransitioning && !g(this._element).hasClass(mt) && (this._parent && 0 === (t = [].slice.call(this._parent.querySelectorAll(Tt)).filter(function (t) {
        return "string" == typeof n._config.parent ? t.getAttribute("data-parent") === n._config.parent : t.classList.contains(pt);
      })).length && (t = null), !(t && (e = g(t).not(this._selector).data(ht)) && e._isTransitioning))) {
        var i = g.Event(_t.SHOW);

        if (g(this._element).trigger(i), !i.isDefaultPrevented()) {
          t && (a._jQueryInterface.call(g(t).not(this._selector), "hide"), e || g(t).data(ht, null));

          var o = this._getDimension();

          g(this._element).removeClass(pt).addClass(vt), this._element.style[o] = 0, this._triggerArray.length && g(this._triggerArray).removeClass(yt).attr("aria-expanded", !0), this.setTransitioning(!0);

          var r = "scroll" + (o[0].toUpperCase() + o.slice(1)),
              s = _.getTransitionDurationFromElement(this._element);

          g(this._element).one(_.TRANSITION_END, function () {
            g(n._element).removeClass(vt).addClass(pt).addClass(mt), n._element.style[o] = "", n.setTransitioning(!1), g(n._element).trigger(_t.SHOWN);
          }).emulateTransitionEnd(s), this._element.style[o] = this._element[r] + "px";
        }
      }
    }, t.hide = function () {
      var t = this;

      if (!this._isTransitioning && g(this._element).hasClass(mt)) {
        var e = g.Event(_t.HIDE);

        if (g(this._element).trigger(e), !e.isDefaultPrevented()) {
          var n = this._getDimension();

          this._element.style[n] = this._element.getBoundingClientRect()[n] + "px", _.reflow(this._element), g(this._element).addClass(vt).removeClass(pt).removeClass(mt);
          var i = this._triggerArray.length;
          if (0 < i) for (var o = 0; o < i; o++) {
            var r = this._triggerArray[o],
                s = _.getSelectorFromElement(r);

            if (null !== s) g([].slice.call(document.querySelectorAll(s))).hasClass(mt) || g(r).addClass(yt).attr("aria-expanded", !1);
          }
          this.setTransitioning(!0);
          this._element.style[n] = "";

          var a = _.getTransitionDurationFromElement(this._element);

          g(this._element).one(_.TRANSITION_END, function () {
            t.setTransitioning(!1), g(t._element).removeClass(vt).addClass(pt).trigger(_t.HIDDEN);
          }).emulateTransitionEnd(a);
        }
      }
    }, t.setTransitioning = function (t) {
      this._isTransitioning = t;
    }, t.dispose = function () {
      g.removeData(this._element, ht), this._config = null, this._parent = null, this._element = null, this._triggerArray = null, this._isTransitioning = null;
    }, t._getConfig = function (t) {
      return (t = l({}, dt, t)).toggle = Boolean(t.toggle), _.typeCheckConfig(ct, t, gt), t;
    }, t._getDimension = function () {
      return g(this._element).hasClass(Et) ? Et : Ct;
    }, t._getParent = function () {
      var t,
          n = this;
      _.isElement(this._config.parent) ? (t = this._config.parent, "undefined" != typeof this._config.parent.jquery && (t = this._config.parent[0])) : t = document.querySelector(this._config.parent);
      var e = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]',
          i = [].slice.call(t.querySelectorAll(e));
      return g(i).each(function (t, e) {
        n._addAriaAndCollapsedClass(a._getTargetFromElement(e), [e]);
      }), t;
    }, t._addAriaAndCollapsedClass = function (t, e) {
      var n = g(t).hasClass(mt);
      e.length && g(e).toggleClass(yt, !n).attr("aria-expanded", n);
    }, a._getTargetFromElement = function (t) {
      var e = _.getSelectorFromElement(t);

      return e ? document.querySelector(e) : null;
    }, a._jQueryInterface = function (i) {
      return this.each(function () {
        var t = g(this),
            e = t.data(ht),
            n = l({}, dt, t.data(), "object" == _typeof(i) && i ? i : {});

        if (!e && n.toggle && /show|hide/.test(i) && (n.toggle = !1), e || (e = new a(this, n), t.data(ht, e)), "string" == typeof i) {
          if ("undefined" == typeof e[i]) throw new TypeError('No method named "' + i + '"');
          e[i]();
        }
      });
    }, s(a, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }, {
      key: "Default",
      get: function get() {
        return dt;
      }
    }]), a;
  }();

  g(document).on(_t.CLICK_DATA_API, St, function (t) {
    "A" === t.currentTarget.tagName && t.preventDefault();

    var n = g(this),
        e = _.getSelectorFromElement(this),
        i = [].slice.call(document.querySelectorAll(e));

    g(i).each(function () {
      var t = g(this),
          e = t.data(ht) ? "toggle" : n.data();

      bt._jQueryInterface.call(t, e);
    });
  }), g.fn[ct] = bt._jQueryInterface, g.fn[ct].Constructor = bt, g.fn[ct].noConflict = function () {
    return g.fn[ct] = ft, bt._jQueryInterface;
  };

  var It = "dropdown",
      Dt = "bs.dropdown",
      wt = "." + Dt,
      At = ".data-api",
      Nt = g.fn[It],
      Ot = new RegExp("38|40|27"),
      kt = {
    HIDE: "hide" + wt,
    HIDDEN: "hidden" + wt,
    SHOW: "show" + wt,
    SHOWN: "shown" + wt,
    CLICK: "click" + wt,
    CLICK_DATA_API: "click" + wt + At,
    KEYDOWN_DATA_API: "keydown" + wt + At,
    KEYUP_DATA_API: "keyup" + wt + At
  },
      Pt = "disabled",
      Lt = "show",
      jt = "dropup",
      Ht = "dropright",
      Rt = "dropleft",
      xt = "dropdown-menu-right",
      Ft = "position-static",
      Ut = '[data-toggle="dropdown"]',
      Wt = ".dropdown form",
      qt = ".dropdown-menu",
      Mt = ".navbar-nav",
      Kt = ".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)",
      Qt = "top-start",
      Bt = "top-end",
      Vt = "bottom-start",
      Yt = "bottom-end",
      zt = "right-start",
      Xt = "left-start",
      $t = {
    offset: 0,
    flip: !0,
    boundary: "scrollParent",
    reference: "toggle",
    display: "dynamic"
  },
      Gt = {
    offset: "(number|string|function)",
    flip: "boolean",
    boundary: "(string|element)",
    reference: "(string|element)",
    display: "string"
  },
      Jt = function () {
    function c(t, e) {
      this._element = t, this._popper = null, this._config = this._getConfig(e), this._menu = this._getMenuElement(), this._inNavbar = this._detectNavbar(), this._addEventListeners();
    }

    var t = c.prototype;
    return t.toggle = function () {
      if (!this._element.disabled && !g(this._element).hasClass(Pt)) {
        var t = c._getParentFromElement(this._element),
            e = g(this._menu).hasClass(Lt);

        if (c._clearMenus(), !e) {
          var n = {
            relatedTarget: this._element
          },
              i = g.Event(kt.SHOW, n);

          if (g(t).trigger(i), !i.isDefaultPrevented()) {
            if (!this._inNavbar) {
              if ("undefined" == typeof u) throw new TypeError("Bootstrap's dropdowns require Popper.js (https://popper.js.org/)");
              var o = this._element;
              "parent" === this._config.reference ? o = t : _.isElement(this._config.reference) && (o = this._config.reference, "undefined" != typeof this._config.reference.jquery && (o = this._config.reference[0])), "scrollParent" !== this._config.boundary && g(t).addClass(Ft), this._popper = new u(o, this._menu, this._getPopperConfig());
            }

            "ontouchstart" in document.documentElement && 0 === g(t).closest(Mt).length && g(document.body).children().on("mouseover", null, g.noop), this._element.focus(), this._element.setAttribute("aria-expanded", !0), g(this._menu).toggleClass(Lt), g(t).toggleClass(Lt).trigger(g.Event(kt.SHOWN, n));
          }
        }
      }
    }, t.show = function () {
      if (!(this._element.disabled || g(this._element).hasClass(Pt) || g(this._menu).hasClass(Lt))) {
        var t = {
          relatedTarget: this._element
        },
            e = g.Event(kt.SHOW, t),
            n = c._getParentFromElement(this._element);

        g(n).trigger(e), e.isDefaultPrevented() || (g(this._menu).toggleClass(Lt), g(n).toggleClass(Lt).trigger(g.Event(kt.SHOWN, t)));
      }
    }, t.hide = function () {
      if (!this._element.disabled && !g(this._element).hasClass(Pt) && g(this._menu).hasClass(Lt)) {
        var t = {
          relatedTarget: this._element
        },
            e = g.Event(kt.HIDE, t),
            n = c._getParentFromElement(this._element);

        g(n).trigger(e), e.isDefaultPrevented() || (g(this._menu).toggleClass(Lt), g(n).toggleClass(Lt).trigger(g.Event(kt.HIDDEN, t)));
      }
    }, t.dispose = function () {
      g.removeData(this._element, Dt), g(this._element).off(wt), this._element = null, (this._menu = null) !== this._popper && (this._popper.destroy(), this._popper = null);
    }, t.update = function () {
      this._inNavbar = this._detectNavbar(), null !== this._popper && this._popper.scheduleUpdate();
    }, t._addEventListeners = function () {
      var e = this;
      g(this._element).on(kt.CLICK, function (t) {
        t.preventDefault(), t.stopPropagation(), e.toggle();
      });
    }, t._getConfig = function (t) {
      return t = l({}, this.constructor.Default, g(this._element).data(), t), _.typeCheckConfig(It, t, this.constructor.DefaultType), t;
    }, t._getMenuElement = function () {
      if (!this._menu) {
        var t = c._getParentFromElement(this._element);

        t && (this._menu = t.querySelector(qt));
      }

      return this._menu;
    }, t._getPlacement = function () {
      var t = g(this._element.parentNode),
          e = Vt;
      return t.hasClass(jt) ? (e = Qt, g(this._menu).hasClass(xt) && (e = Bt)) : t.hasClass(Ht) ? e = zt : t.hasClass(Rt) ? e = Xt : g(this._menu).hasClass(xt) && (e = Yt), e;
    }, t._detectNavbar = function () {
      return 0 < g(this._element).closest(".navbar").length;
    }, t._getOffset = function () {
      var e = this,
          t = {};
      return "function" == typeof this._config.offset ? t.fn = function (t) {
        return t.offsets = l({}, t.offsets, e._config.offset(t.offsets, e._element) || {}), t;
      } : t.offset = this._config.offset, t;
    }, t._getPopperConfig = function () {
      var t = {
        placement: this._getPlacement(),
        modifiers: {
          offset: this._getOffset(),
          flip: {
            enabled: this._config.flip
          },
          preventOverflow: {
            boundariesElement: this._config.boundary
          }
        }
      };
      return "static" === this._config.display && (t.modifiers.applyStyle = {
        enabled: !1
      }), t;
    }, c._jQueryInterface = function (e) {
      return this.each(function () {
        var t = g(this).data(Dt);

        if (t || (t = new c(this, "object" == _typeof(e) ? e : null), g(this).data(Dt, t)), "string" == typeof e) {
          if ("undefined" == typeof t[e]) throw new TypeError('No method named "' + e + '"');
          t[e]();
        }
      });
    }, c._clearMenus = function (t) {
      if (!t || 3 !== t.which && ("keyup" !== t.type || 9 === t.which)) for (var e = [].slice.call(document.querySelectorAll(Ut)), n = 0, i = e.length; n < i; n++) {
        var o = c._getParentFromElement(e[n]),
            r = g(e[n]).data(Dt),
            s = {
          relatedTarget: e[n]
        };

        if (t && "click" === t.type && (s.clickEvent = t), r) {
          var a = r._menu;

          if (g(o).hasClass(Lt) && !(t && ("click" === t.type && /input|textarea/i.test(t.target.tagName) || "keyup" === t.type && 9 === t.which) && g.contains(o, t.target))) {
            var l = g.Event(kt.HIDE, s);
            g(o).trigger(l), l.isDefaultPrevented() || ("ontouchstart" in document.documentElement && g(document.body).children().off("mouseover", null, g.noop), e[n].setAttribute("aria-expanded", "false"), g(a).removeClass(Lt), g(o).removeClass(Lt).trigger(g.Event(kt.HIDDEN, s)));
          }
        }
      }
    }, c._getParentFromElement = function (t) {
      var e,
          n = _.getSelectorFromElement(t);

      return n && (e = document.querySelector(n)), e || t.parentNode;
    }, c._dataApiKeydownHandler = function (t) {
      if ((/input|textarea/i.test(t.target.tagName) ? !(32 === t.which || 27 !== t.which && (40 !== t.which && 38 !== t.which || g(t.target).closest(qt).length)) : Ot.test(t.which)) && (t.preventDefault(), t.stopPropagation(), !this.disabled && !g(this).hasClass(Pt))) {
        var e = c._getParentFromElement(this),
            n = g(e).hasClass(Lt);

        if (n && (!n || 27 !== t.which && 32 !== t.which)) {
          var i = [].slice.call(e.querySelectorAll(Kt));

          if (0 !== i.length) {
            var o = i.indexOf(t.target);
            38 === t.which && 0 < o && o--, 40 === t.which && o < i.length - 1 && o++, o < 0 && (o = 0), i[o].focus();
          }
        } else {
          if (27 === t.which) {
            var r = e.querySelector(Ut);
            g(r).trigger("focus");
          }

          g(this).trigger("click");
        }
      }
    }, s(c, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }, {
      key: "Default",
      get: function get() {
        return $t;
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return Gt;
      }
    }]), c;
  }();

  g(document).on(kt.KEYDOWN_DATA_API, Ut, Jt._dataApiKeydownHandler).on(kt.KEYDOWN_DATA_API, qt, Jt._dataApiKeydownHandler).on(kt.CLICK_DATA_API + " " + kt.KEYUP_DATA_API, Jt._clearMenus).on(kt.CLICK_DATA_API, Ut, function (t) {
    t.preventDefault(), t.stopPropagation(), Jt._jQueryInterface.call(g(this), "toggle");
  }).on(kt.CLICK_DATA_API, Wt, function (t) {
    t.stopPropagation();
  }), g.fn[It] = Jt._jQueryInterface, g.fn[It].Constructor = Jt, g.fn[It].noConflict = function () {
    return g.fn[It] = Nt, Jt._jQueryInterface;
  };

  var Zt = "modal",
      te = "bs.modal",
      ee = "." + te,
      ne = g.fn[Zt],
      ie = {
    backdrop: !0,
    keyboard: !0,
    focus: !0,
    show: !0
  },
      oe = {
    backdrop: "(boolean|string)",
    keyboard: "boolean",
    focus: "boolean",
    show: "boolean"
  },
      re = {
    HIDE: "hide" + ee,
    HIDDEN: "hidden" + ee,
    SHOW: "show" + ee,
    SHOWN: "shown" + ee,
    FOCUSIN: "focusin" + ee,
    RESIZE: "resize" + ee,
    CLICK_DISMISS: "click.dismiss" + ee,
    KEYDOWN_DISMISS: "keydown.dismiss" + ee,
    MOUSEUP_DISMISS: "mouseup.dismiss" + ee,
    MOUSEDOWN_DISMISS: "mousedown.dismiss" + ee,
    CLICK_DATA_API: "click" + ee + ".data-api"
  },
      se = "modal-dialog-scrollable",
      ae = "modal-scrollbar-measure",
      le = "modal-backdrop",
      ce = "modal-open",
      he = "fade",
      ue = "show",
      fe = ".modal-dialog",
      de = ".modal-body",
      ge = '[data-toggle="modal"]',
      _e = '[data-dismiss="modal"]',
      me = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
      pe = ".sticky-top",
      ve = function () {
    function o(t, e) {
      this._config = this._getConfig(e), this._element = t, this._dialog = t.querySelector(fe), this._backdrop = null, this._isShown = !1, this._isBodyOverflowing = !1, this._ignoreBackdropClick = !1, this._isTransitioning = !1, this._scrollbarWidth = 0;
    }

    var t = o.prototype;
    return t.toggle = function (t) {
      return this._isShown ? this.hide() : this.show(t);
    }, t.show = function (t) {
      var e = this;

      if (!this._isShown && !this._isTransitioning) {
        g(this._element).hasClass(he) && (this._isTransitioning = !0);
        var n = g.Event(re.SHOW, {
          relatedTarget: t
        });
        g(this._element).trigger(n), this._isShown || n.isDefaultPrevented() || (this._isShown = !0, this._checkScrollbar(), this._setScrollbar(), this._adjustDialog(), this._setEscapeEvent(), this._setResizeEvent(), g(this._element).on(re.CLICK_DISMISS, _e, function (t) {
          return e.hide(t);
        }), g(this._dialog).on(re.MOUSEDOWN_DISMISS, function () {
          g(e._element).one(re.MOUSEUP_DISMISS, function (t) {
            g(t.target).is(e._element) && (e._ignoreBackdropClick = !0);
          });
        }), this._showBackdrop(function () {
          return e._showElement(t);
        }));
      }
    }, t.hide = function (t) {
      var e = this;

      if (t && t.preventDefault(), this._isShown && !this._isTransitioning) {
        var n = g.Event(re.HIDE);

        if (g(this._element).trigger(n), this._isShown && !n.isDefaultPrevented()) {
          this._isShown = !1;
          var i = g(this._element).hasClass(he);

          if (i && (this._isTransitioning = !0), this._setEscapeEvent(), this._setResizeEvent(), g(document).off(re.FOCUSIN), g(this._element).removeClass(ue), g(this._element).off(re.CLICK_DISMISS), g(this._dialog).off(re.MOUSEDOWN_DISMISS), i) {
            var o = _.getTransitionDurationFromElement(this._element);

            g(this._element).one(_.TRANSITION_END, function (t) {
              return e._hideModal(t);
            }).emulateTransitionEnd(o);
          } else this._hideModal();
        }
      }
    }, t.dispose = function () {
      [window, this._element, this._dialog].forEach(function (t) {
        return g(t).off(ee);
      }), g(document).off(re.FOCUSIN), g.removeData(this._element, te), this._config = null, this._element = null, this._dialog = null, this._backdrop = null, this._isShown = null, this._isBodyOverflowing = null, this._ignoreBackdropClick = null, this._isTransitioning = null, this._scrollbarWidth = null;
    }, t.handleUpdate = function () {
      this._adjustDialog();
    }, t._getConfig = function (t) {
      return t = l({}, ie, t), _.typeCheckConfig(Zt, t, oe), t;
    }, t._showElement = function (t) {
      var e = this,
          n = g(this._element).hasClass(he);
      this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE || document.body.appendChild(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), g(this._dialog).hasClass(se) ? this._dialog.querySelector(de).scrollTop = 0 : this._element.scrollTop = 0, n && _.reflow(this._element), g(this._element).addClass(ue), this._config.focus && this._enforceFocus();

      var i = g.Event(re.SHOWN, {
        relatedTarget: t
      }),
          o = function o() {
        e._config.focus && e._element.focus(), e._isTransitioning = !1, g(e._element).trigger(i);
      };

      if (n) {
        var r = _.getTransitionDurationFromElement(this._dialog);

        g(this._dialog).one(_.TRANSITION_END, o).emulateTransitionEnd(r);
      } else o();
    }, t._enforceFocus = function () {
      var e = this;
      g(document).off(re.FOCUSIN).on(re.FOCUSIN, function (t) {
        document !== t.target && e._element !== t.target && 0 === g(e._element).has(t.target).length && e._element.focus();
      });
    }, t._setEscapeEvent = function () {
      var e = this;
      this._isShown && this._config.keyboard ? g(this._element).on(re.KEYDOWN_DISMISS, function (t) {
        27 === t.which && (t.preventDefault(), e.hide());
      }) : this._isShown || g(this._element).off(re.KEYDOWN_DISMISS);
    }, t._setResizeEvent = function () {
      var e = this;
      this._isShown ? g(window).on(re.RESIZE, function (t) {
        return e.handleUpdate(t);
      }) : g(window).off(re.RESIZE);
    }, t._hideModal = function () {
      var t = this;
      this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._isTransitioning = !1, this._showBackdrop(function () {
        g(document.body).removeClass(ce), t._resetAdjustments(), t._resetScrollbar(), g(t._element).trigger(re.HIDDEN);
      });
    }, t._removeBackdrop = function () {
      this._backdrop && (g(this._backdrop).remove(), this._backdrop = null);
    }, t._showBackdrop = function (t) {
      var e = this,
          n = g(this._element).hasClass(he) ? he : "";

      if (this._isShown && this._config.backdrop) {
        if (this._backdrop = document.createElement("div"), this._backdrop.className = le, n && this._backdrop.classList.add(n), g(this._backdrop).appendTo(document.body), g(this._element).on(re.CLICK_DISMISS, function (t) {
          e._ignoreBackdropClick ? e._ignoreBackdropClick = !1 : t.target === t.currentTarget && ("static" === e._config.backdrop ? e._element.focus() : e.hide());
        }), n && _.reflow(this._backdrop), g(this._backdrop).addClass(ue), !t) return;
        if (!n) return void t();

        var i = _.getTransitionDurationFromElement(this._backdrop);

        g(this._backdrop).one(_.TRANSITION_END, t).emulateTransitionEnd(i);
      } else if (!this._isShown && this._backdrop) {
        g(this._backdrop).removeClass(ue);

        var o = function o() {
          e._removeBackdrop(), t && t();
        };

        if (g(this._element).hasClass(he)) {
          var r = _.getTransitionDurationFromElement(this._backdrop);

          g(this._backdrop).one(_.TRANSITION_END, o).emulateTransitionEnd(r);
        } else o();
      } else t && t();
    }, t._adjustDialog = function () {
      var t = this._element.scrollHeight > document.documentElement.clientHeight;
      !this._isBodyOverflowing && t && (this._element.style.paddingLeft = this._scrollbarWidth + "px"), this._isBodyOverflowing && !t && (this._element.style.paddingRight = this._scrollbarWidth + "px");
    }, t._resetAdjustments = function () {
      this._element.style.paddingLeft = "", this._element.style.paddingRight = "";
    }, t._checkScrollbar = function () {
      var t = document.body.getBoundingClientRect();
      this._isBodyOverflowing = t.left + t.right < window.innerWidth, this._scrollbarWidth = this._getScrollbarWidth();
    }, t._setScrollbar = function () {
      var o = this;

      if (this._isBodyOverflowing) {
        var t = [].slice.call(document.querySelectorAll(me)),
            e = [].slice.call(document.querySelectorAll(pe));
        g(t).each(function (t, e) {
          var n = e.style.paddingRight,
              i = g(e).css("padding-right");
          g(e).data("padding-right", n).css("padding-right", parseFloat(i) + o._scrollbarWidth + "px");
        }), g(e).each(function (t, e) {
          var n = e.style.marginRight,
              i = g(e).css("margin-right");
          g(e).data("margin-right", n).css("margin-right", parseFloat(i) - o._scrollbarWidth + "px");
        });
        var n = document.body.style.paddingRight,
            i = g(document.body).css("padding-right");
        g(document.body).data("padding-right", n).css("padding-right", parseFloat(i) + this._scrollbarWidth + "px");
      }

      g(document.body).addClass(ce);
    }, t._resetScrollbar = function () {
      var t = [].slice.call(document.querySelectorAll(me));
      g(t).each(function (t, e) {
        var n = g(e).data("padding-right");
        g(e).removeData("padding-right"), e.style.paddingRight = n || "";
      });
      var e = [].slice.call(document.querySelectorAll("" + pe));
      g(e).each(function (t, e) {
        var n = g(e).data("margin-right");
        "undefined" != typeof n && g(e).css("margin-right", n).removeData("margin-right");
      });
      var n = g(document.body).data("padding-right");
      g(document.body).removeData("padding-right"), document.body.style.paddingRight = n || "";
    }, t._getScrollbarWidth = function () {
      var t = document.createElement("div");
      t.className = ae, document.body.appendChild(t);
      var e = t.getBoundingClientRect().width - t.clientWidth;
      return document.body.removeChild(t), e;
    }, o._jQueryInterface = function (n, i) {
      return this.each(function () {
        var t = g(this).data(te),
            e = l({}, ie, g(this).data(), "object" == _typeof(n) && n ? n : {});

        if (t || (t = new o(this, e), g(this).data(te, t)), "string" == typeof n) {
          if ("undefined" == typeof t[n]) throw new TypeError('No method named "' + n + '"');
          t[n](i);
        } else e.show && t.show(i);
      });
    }, s(o, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }, {
      key: "Default",
      get: function get() {
        return ie;
      }
    }]), o;
  }();

  g(document).on(re.CLICK_DATA_API, ge, function (t) {
    var e,
        n = this,
        i = _.getSelectorFromElement(this);

    i && (e = document.querySelector(i));
    var o = g(e).data(te) ? "toggle" : l({}, g(e).data(), g(this).data());
    "A" !== this.tagName && "AREA" !== this.tagName || t.preventDefault();
    var r = g(e).one(re.SHOW, function (t) {
      t.isDefaultPrevented() || r.one(re.HIDDEN, function () {
        g(n).is(":visible") && n.focus();
      });
    });

    ve._jQueryInterface.call(g(e), o, this);
  }), g.fn[Zt] = ve._jQueryInterface, g.fn[Zt].Constructor = ve, g.fn[Zt].noConflict = function () {
    return g.fn[Zt] = ne, ve._jQueryInterface;
  };
  var ye = ["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"],
      Ee = {
    "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
    a: ["target", "href", "title", "rel"],
    area: [],
    b: [],
    br: [],
    col: [],
    code: [],
    div: [],
    em: [],
    hr: [],
    h1: [],
    h2: [],
    h3: [],
    h4: [],
    h5: [],
    h6: [],
    i: [],
    img: ["src", "alt", "title", "width", "height"],
    li: [],
    ol: [],
    p: [],
    pre: [],
    s: [],
    small: [],
    span: [],
    sub: [],
    sup: [],
    strong: [],
    u: [],
    ul: []
  },
      Ce = /^(?:(?:https?|mailto|ftp|tel|file):|[^&:/?#]*(?:[/?#]|$))/gi,
      Te = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[a-z0-9+/]+=*$/i;

  function Se(t, s, e) {
    if (0 === t.length) return t;
    if (e && "function" == typeof e) return e(t);

    for (var n = new window.DOMParser().parseFromString(t, "text/html"), a = Object.keys(s), l = [].slice.call(n.body.querySelectorAll("*")), i = function i(t, e) {
      var n = l[t],
          i = n.nodeName.toLowerCase();
      if (-1 === a.indexOf(n.nodeName.toLowerCase())) return n.parentNode.removeChild(n), "continue";
      var o = [].slice.call(n.attributes),
          r = [].concat(s["*"] || [], s[i] || []);
      o.forEach(function (t) {
        (function (t, e) {
          var n = t.nodeName.toLowerCase();
          if (-1 !== e.indexOf(n)) return -1 === ye.indexOf(n) || Boolean(t.nodeValue.match(Ce) || t.nodeValue.match(Te));

          for (var i = e.filter(function (t) {
            return t instanceof RegExp;
          }), o = 0, r = i.length; o < r; o++) {
            if (n.match(i[o])) return !0;
          }

          return !1;
        })(t, r) || n.removeAttribute(t.nodeName);
      });
    }, o = 0, r = l.length; o < r; o++) {
      i(o);
    }

    return n.body.innerHTML;
  }

  var be = "tooltip",
      Ie = "bs.tooltip",
      De = "." + Ie,
      we = g.fn[be],
      Ae = "bs-tooltip",
      Ne = new RegExp("(^|\\s)" + Ae + "\\S+", "g"),
      Oe = ["sanitize", "whiteList", "sanitizeFn"],
      ke = {
    animation: "boolean",
    template: "string",
    title: "(string|element|function)",
    trigger: "string",
    delay: "(number|object)",
    html: "boolean",
    selector: "(string|boolean)",
    placement: "(string|function)",
    offset: "(number|string|function)",
    container: "(string|element|boolean)",
    fallbackPlacement: "(string|array)",
    boundary: "(string|element)",
    sanitize: "boolean",
    sanitizeFn: "(null|function)",
    whiteList: "object"
  },
      Pe = {
    AUTO: "auto",
    TOP: "top",
    RIGHT: "right",
    BOTTOM: "bottom",
    LEFT: "left"
  },
      Le = {
    animation: !0,
    template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
    trigger: "hover focus",
    title: "",
    delay: 0,
    html: !1,
    selector: !1,
    placement: "top",
    offset: 0,
    container: !1,
    fallbackPlacement: "flip",
    boundary: "scrollParent",
    sanitize: !0,
    sanitizeFn: null,
    whiteList: Ee
  },
      je = "show",
      He = "out",
      Re = {
    HIDE: "hide" + De,
    HIDDEN: "hidden" + De,
    SHOW: "show" + De,
    SHOWN: "shown" + De,
    INSERTED: "inserted" + De,
    CLICK: "click" + De,
    FOCUSIN: "focusin" + De,
    FOCUSOUT: "focusout" + De,
    MOUSEENTER: "mouseenter" + De,
    MOUSELEAVE: "mouseleave" + De
  },
      xe = "fade",
      Fe = "show",
      Ue = ".tooltip-inner",
      We = ".arrow",
      qe = "hover",
      Me = "focus",
      Ke = "click",
      Qe = "manual",
      Be = function () {
    function i(t, e) {
      if ("undefined" == typeof u) throw new TypeError("Bootstrap's tooltips require Popper.js (https://popper.js.org/)");
      this._isEnabled = !0, this._timeout = 0, this._hoverState = "", this._activeTrigger = {}, this._popper = null, this.element = t, this.config = this._getConfig(e), this.tip = null, this._setListeners();
    }

    var t = i.prototype;
    return t.enable = function () {
      this._isEnabled = !0;
    }, t.disable = function () {
      this._isEnabled = !1;
    }, t.toggleEnabled = function () {
      this._isEnabled = !this._isEnabled;
    }, t.toggle = function (t) {
      if (this._isEnabled) if (t) {
        var e = this.constructor.DATA_KEY,
            n = g(t.currentTarget).data(e);
        n || (n = new this.constructor(t.currentTarget, this._getDelegateConfig()), g(t.currentTarget).data(e, n)), n._activeTrigger.click = !n._activeTrigger.click, n._isWithActiveTrigger() ? n._enter(null, n) : n._leave(null, n);
      } else {
        if (g(this.getTipElement()).hasClass(Fe)) return void this._leave(null, this);

        this._enter(null, this);
      }
    }, t.dispose = function () {
      clearTimeout(this._timeout), g.removeData(this.element, this.constructor.DATA_KEY), g(this.element).off(this.constructor.EVENT_KEY), g(this.element).closest(".modal").off("hide.bs.modal"), this.tip && g(this.tip).remove(), this._isEnabled = null, this._timeout = null, this._hoverState = null, (this._activeTrigger = null) !== this._popper && this._popper.destroy(), this._popper = null, this.element = null, this.config = null, this.tip = null;
    }, t.show = function () {
      var e = this;
      if ("none" === g(this.element).css("display")) throw new Error("Please use show on visible elements");
      var t = g.Event(this.constructor.Event.SHOW);

      if (this.isWithContent() && this._isEnabled) {
        g(this.element).trigger(t);

        var n = _.findShadowRoot(this.element),
            i = g.contains(null !== n ? n : this.element.ownerDocument.documentElement, this.element);

        if (t.isDefaultPrevented() || !i) return;

        var o = this.getTipElement(),
            r = _.getUID(this.constructor.NAME);

        o.setAttribute("id", r), this.element.setAttribute("aria-describedby", r), this.setContent(), this.config.animation && g(o).addClass(xe);

        var s = "function" == typeof this.config.placement ? this.config.placement.call(this, o, this.element) : this.config.placement,
            a = this._getAttachment(s);

        this.addAttachmentClass(a);

        var l = this._getContainer();

        g(o).data(this.constructor.DATA_KEY, this), g.contains(this.element.ownerDocument.documentElement, this.tip) || g(o).appendTo(l), g(this.element).trigger(this.constructor.Event.INSERTED), this._popper = new u(this.element, o, {
          placement: a,
          modifiers: {
            offset: this._getOffset(),
            flip: {
              behavior: this.config.fallbackPlacement
            },
            arrow: {
              element: We
            },
            preventOverflow: {
              boundariesElement: this.config.boundary
            }
          },
          onCreate: function onCreate(t) {
            t.originalPlacement !== t.placement && e._handlePopperPlacementChange(t);
          },
          onUpdate: function onUpdate(t) {
            return e._handlePopperPlacementChange(t);
          }
        }), g(o).addClass(Fe), "ontouchstart" in document.documentElement && g(document.body).children().on("mouseover", null, g.noop);

        var c = function c() {
          e.config.animation && e._fixTransition();
          var t = e._hoverState;
          e._hoverState = null, g(e.element).trigger(e.constructor.Event.SHOWN), t === He && e._leave(null, e);
        };

        if (g(this.tip).hasClass(xe)) {
          var h = _.getTransitionDurationFromElement(this.tip);

          g(this.tip).one(_.TRANSITION_END, c).emulateTransitionEnd(h);
        } else c();
      }
    }, t.hide = function (t) {
      var e = this,
          n = this.getTipElement(),
          i = g.Event(this.constructor.Event.HIDE),
          o = function o() {
        e._hoverState !== je && n.parentNode && n.parentNode.removeChild(n), e._cleanTipClass(), e.element.removeAttribute("aria-describedby"), g(e.element).trigger(e.constructor.Event.HIDDEN), null !== e._popper && e._popper.destroy(), t && t();
      };

      if (g(this.element).trigger(i), !i.isDefaultPrevented()) {
        if (g(n).removeClass(Fe), "ontouchstart" in document.documentElement && g(document.body).children().off("mouseover", null, g.noop), this._activeTrigger[Ke] = !1, this._activeTrigger[Me] = !1, this._activeTrigger[qe] = !1, g(this.tip).hasClass(xe)) {
          var r = _.getTransitionDurationFromElement(n);

          g(n).one(_.TRANSITION_END, o).emulateTransitionEnd(r);
        } else o();

        this._hoverState = "";
      }
    }, t.update = function () {
      null !== this._popper && this._popper.scheduleUpdate();
    }, t.isWithContent = function () {
      return Boolean(this.getTitle());
    }, t.addAttachmentClass = function (t) {
      g(this.getTipElement()).addClass(Ae + "-" + t);
    }, t.getTipElement = function () {
      return this.tip = this.tip || g(this.config.template)[0], this.tip;
    }, t.setContent = function () {
      var t = this.getTipElement();
      this.setElementContent(g(t.querySelectorAll(Ue)), this.getTitle()), g(t).removeClass(xe + " " + Fe);
    }, t.setElementContent = function (t, e) {
      "object" != _typeof(e) || !e.nodeType && !e.jquery ? this.config.html ? (this.config.sanitize && (e = Se(e, this.config.whiteList, this.config.sanitizeFn)), t.html(e)) : t.text(e) : this.config.html ? g(e).parent().is(t) || t.empty().append(e) : t.text(g(e).text());
    }, t.getTitle = function () {
      var t = this.element.getAttribute("data-original-title");
      return t || (t = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), t;
    }, t._getOffset = function () {
      var e = this,
          t = {};
      return "function" == typeof this.config.offset ? t.fn = function (t) {
        return t.offsets = l({}, t.offsets, e.config.offset(t.offsets, e.element) || {}), t;
      } : t.offset = this.config.offset, t;
    }, t._getContainer = function () {
      return !1 === this.config.container ? document.body : _.isElement(this.config.container) ? g(this.config.container) : g(document).find(this.config.container);
    }, t._getAttachment = function (t) {
      return Pe[t.toUpperCase()];
    }, t._setListeners = function () {
      var i = this;
      this.config.trigger.split(" ").forEach(function (t) {
        if ("click" === t) g(i.element).on(i.constructor.Event.CLICK, i.config.selector, function (t) {
          return i.toggle(t);
        });else if (t !== Qe) {
          var e = t === qe ? i.constructor.Event.MOUSEENTER : i.constructor.Event.FOCUSIN,
              n = t === qe ? i.constructor.Event.MOUSELEAVE : i.constructor.Event.FOCUSOUT;
          g(i.element).on(e, i.config.selector, function (t) {
            return i._enter(t);
          }).on(n, i.config.selector, function (t) {
            return i._leave(t);
          });
        }
      }), g(this.element).closest(".modal").on("hide.bs.modal", function () {
        i.element && i.hide();
      }), this.config.selector ? this.config = l({}, this.config, {
        trigger: "manual",
        selector: ""
      }) : this._fixTitle();
    }, t._fixTitle = function () {
      var t = _typeof(this.element.getAttribute("data-original-title"));

      (this.element.getAttribute("title") || "string" !== t) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""));
    }, t._enter = function (t, e) {
      var n = this.constructor.DATA_KEY;
      (e = e || g(t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), g(t.currentTarget).data(n, e)), t && (e._activeTrigger["focusin" === t.type ? Me : qe] = !0), g(e.getTipElement()).hasClass(Fe) || e._hoverState === je ? e._hoverState = je : (clearTimeout(e._timeout), e._hoverState = je, e.config.delay && e.config.delay.show ? e._timeout = setTimeout(function () {
        e._hoverState === je && e.show();
      }, e.config.delay.show) : e.show());
    }, t._leave = function (t, e) {
      var n = this.constructor.DATA_KEY;
      (e = e || g(t.currentTarget).data(n)) || (e = new this.constructor(t.currentTarget, this._getDelegateConfig()), g(t.currentTarget).data(n, e)), t && (e._activeTrigger["focusout" === t.type ? Me : qe] = !1), e._isWithActiveTrigger() || (clearTimeout(e._timeout), e._hoverState = He, e.config.delay && e.config.delay.hide ? e._timeout = setTimeout(function () {
        e._hoverState === He && e.hide();
      }, e.config.delay.hide) : e.hide());
    }, t._isWithActiveTrigger = function () {
      for (var t in this._activeTrigger) {
        if (this._activeTrigger[t]) return !0;
      }

      return !1;
    }, t._getConfig = function (t) {
      var e = g(this.element).data();
      return Object.keys(e).forEach(function (t) {
        -1 !== Oe.indexOf(t) && delete e[t];
      }), "number" == typeof (t = l({}, this.constructor.Default, e, "object" == _typeof(t) && t ? t : {})).delay && (t.delay = {
        show: t.delay,
        hide: t.delay
      }), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), _.typeCheckConfig(be, t, this.constructor.DefaultType), t.sanitize && (t.template = Se(t.template, t.whiteList, t.sanitizeFn)), t;
    }, t._getDelegateConfig = function () {
      var t = {};
      if (this.config) for (var e in this.config) {
        this.constructor.Default[e] !== this.config[e] && (t[e] = this.config[e]);
      }
      return t;
    }, t._cleanTipClass = function () {
      var t = g(this.getTipElement()),
          e = t.attr("class").match(Ne);
      null !== e && e.length && t.removeClass(e.join(""));
    }, t._handlePopperPlacementChange = function (t) {
      var e = t.instance;
      this.tip = e.popper, this._cleanTipClass(), this.addAttachmentClass(this._getAttachment(t.placement));
    }, t._fixTransition = function () {
      var t = this.getTipElement(),
          e = this.config.animation;
      null === t.getAttribute("x-placement") && (g(t).removeClass(xe), this.config.animation = !1, this.hide(), this.show(), this.config.animation = e);
    }, i._jQueryInterface = function (n) {
      return this.each(function () {
        var t = g(this).data(Ie),
            e = "object" == _typeof(n) && n;

        if ((t || !/dispose|hide/.test(n)) && (t || (t = new i(this, e), g(this).data(Ie, t)), "string" == typeof n)) {
          if ("undefined" == typeof t[n]) throw new TypeError('No method named "' + n + '"');
          t[n]();
        }
      });
    }, s(i, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }, {
      key: "Default",
      get: function get() {
        return Le;
      }
    }, {
      key: "NAME",
      get: function get() {
        return be;
      }
    }, {
      key: "DATA_KEY",
      get: function get() {
        return Ie;
      }
    }, {
      key: "Event",
      get: function get() {
        return Re;
      }
    }, {
      key: "EVENT_KEY",
      get: function get() {
        return De;
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return ke;
      }
    }]), i;
  }();

  g.fn[be] = Be._jQueryInterface, g.fn[be].Constructor = Be, g.fn[be].noConflict = function () {
    return g.fn[be] = we, Be._jQueryInterface;
  };

  var Ve = "popover",
      Ye = "bs.popover",
      ze = "." + Ye,
      Xe = g.fn[Ve],
      $e = "bs-popover",
      Ge = new RegExp("(^|\\s)" + $e + "\\S+", "g"),
      Je = l({}, Be.Default, {
    placement: "right",
    trigger: "click",
    content: "",
    template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'
  }),
      Ze = l({}, Be.DefaultType, {
    content: "(string|element|function)"
  }),
      tn = "fade",
      en = "show",
      nn = ".popover-header",
      on = ".popover-body",
      rn = {
    HIDE: "hide" + ze,
    HIDDEN: "hidden" + ze,
    SHOW: "show" + ze,
    SHOWN: "shown" + ze,
    INSERTED: "inserted" + ze,
    CLICK: "click" + ze,
    FOCUSIN: "focusin" + ze,
    FOCUSOUT: "focusout" + ze,
    MOUSEENTER: "mouseenter" + ze,
    MOUSELEAVE: "mouseleave" + ze
  },
      sn = function (t) {
    var e, n;

    function i() {
      return t.apply(this, arguments) || this;
    }

    n = t, (e = i).prototype = Object.create(n.prototype), (e.prototype.constructor = e).__proto__ = n;
    var o = i.prototype;
    return o.isWithContent = function () {
      return this.getTitle() || this._getContent();
    }, o.addAttachmentClass = function (t) {
      g(this.getTipElement()).addClass($e + "-" + t);
    }, o.getTipElement = function () {
      return this.tip = this.tip || g(this.config.template)[0], this.tip;
    }, o.setContent = function () {
      var t = g(this.getTipElement());
      this.setElementContent(t.find(nn), this.getTitle());

      var e = this._getContent();

      "function" == typeof e && (e = e.call(this.element)), this.setElementContent(t.find(on), e), t.removeClass(tn + " " + en);
    }, o._getContent = function () {
      return this.element.getAttribute("data-content") || this.config.content;
    }, o._cleanTipClass = function () {
      var t = g(this.getTipElement()),
          e = t.attr("class").match(Ge);
      null !== e && 0 < e.length && t.removeClass(e.join(""));
    }, i._jQueryInterface = function (n) {
      return this.each(function () {
        var t = g(this).data(Ye),
            e = "object" == _typeof(n) ? n : null;

        if ((t || !/dispose|hide/.test(n)) && (t || (t = new i(this, e), g(this).data(Ye, t)), "string" == typeof n)) {
          if ("undefined" == typeof t[n]) throw new TypeError('No method named "' + n + '"');
          t[n]();
        }
      });
    }, s(i, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }, {
      key: "Default",
      get: function get() {
        return Je;
      }
    }, {
      key: "NAME",
      get: function get() {
        return Ve;
      }
    }, {
      key: "DATA_KEY",
      get: function get() {
        return Ye;
      }
    }, {
      key: "Event",
      get: function get() {
        return rn;
      }
    }, {
      key: "EVENT_KEY",
      get: function get() {
        return ze;
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return Ze;
      }
    }]), i;
  }(Be);

  g.fn[Ve] = sn._jQueryInterface, g.fn[Ve].Constructor = sn, g.fn[Ve].noConflict = function () {
    return g.fn[Ve] = Xe, sn._jQueryInterface;
  };

  var an = "scrollspy",
      ln = "bs.scrollspy",
      cn = "." + ln,
      hn = g.fn[an],
      un = {
    offset: 10,
    method: "auto",
    target: ""
  },
      fn = {
    offset: "number",
    method: "string",
    target: "(string|element)"
  },
      dn = {
    ACTIVATE: "activate" + cn,
    SCROLL: "scroll" + cn,
    LOAD_DATA_API: "load" + cn + ".data-api"
  },
      gn = "dropdown-item",
      _n = "active",
      mn = '[data-spy="scroll"]',
      pn = ".nav, .list-group",
      vn = ".nav-link",
      yn = ".nav-item",
      En = ".list-group-item",
      Cn = ".dropdown",
      Tn = ".dropdown-item",
      Sn = ".dropdown-toggle",
      bn = "offset",
      In = "position",
      Dn = function () {
    function n(t, e) {
      var n = this;
      this._element = t, this._scrollElement = "BODY" === t.tagName ? window : t, this._config = this._getConfig(e), this._selector = this._config.target + " " + vn + "," + this._config.target + " " + En + "," + this._config.target + " " + Tn, this._offsets = [], this._targets = [], this._activeTarget = null, this._scrollHeight = 0, g(this._scrollElement).on(dn.SCROLL, function (t) {
        return n._process(t);
      }), this.refresh(), this._process();
    }

    var t = n.prototype;
    return t.refresh = function () {
      var e = this,
          t = this._scrollElement === this._scrollElement.window ? bn : In,
          o = "auto" === this._config.method ? t : this._config.method,
          r = o === In ? this._getScrollTop() : 0;
      this._offsets = [], this._targets = [], this._scrollHeight = this._getScrollHeight(), [].slice.call(document.querySelectorAll(this._selector)).map(function (t) {
        var e,
            n = _.getSelectorFromElement(t);

        if (n && (e = document.querySelector(n)), e) {
          var i = e.getBoundingClientRect();
          if (i.width || i.height) return [g(e)[o]().top + r, n];
        }

        return null;
      }).filter(function (t) {
        return t;
      }).sort(function (t, e) {
        return t[0] - e[0];
      }).forEach(function (t) {
        e._offsets.push(t[0]), e._targets.push(t[1]);
      });
    }, t.dispose = function () {
      g.removeData(this._element, ln), g(this._scrollElement).off(cn), this._element = null, this._scrollElement = null, this._config = null, this._selector = null, this._offsets = null, this._targets = null, this._activeTarget = null, this._scrollHeight = null;
    }, t._getConfig = function (t) {
      if ("string" != typeof (t = l({}, un, "object" == _typeof(t) && t ? t : {})).target) {
        var e = g(t.target).attr("id");
        e || (e = _.getUID(an), g(t.target).attr("id", e)), t.target = "#" + e;
      }

      return _.typeCheckConfig(an, t, fn), t;
    }, t._getScrollTop = function () {
      return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop;
    }, t._getScrollHeight = function () {
      return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
    }, t._getOffsetHeight = function () {
      return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height;
    }, t._process = function () {
      var t = this._getScrollTop() + this._config.offset,
          e = this._getScrollHeight(),
          n = this._config.offset + e - this._getOffsetHeight();

      if (this._scrollHeight !== e && this.refresh(), n <= t) {
        var i = this._targets[this._targets.length - 1];
        this._activeTarget !== i && this._activate(i);
      } else {
        if (this._activeTarget && t < this._offsets[0] && 0 < this._offsets[0]) return this._activeTarget = null, void this._clear();

        for (var o = this._offsets.length; o--;) {
          this._activeTarget !== this._targets[o] && t >= this._offsets[o] && ("undefined" == typeof this._offsets[o + 1] || t < this._offsets[o + 1]) && this._activate(this._targets[o]);
        }
      }
    }, t._activate = function (e) {
      this._activeTarget = e, this._clear();

      var t = this._selector.split(",").map(function (t) {
        return t + '[data-target="' + e + '"],' + t + '[href="' + e + '"]';
      }),
          n = g([].slice.call(document.querySelectorAll(t.join(","))));

      n.hasClass(gn) ? (n.closest(Cn).find(Sn).addClass(_n), n.addClass(_n)) : (n.addClass(_n), n.parents(pn).prev(vn + ", " + En).addClass(_n), n.parents(pn).prev(yn).children(vn).addClass(_n)), g(this._scrollElement).trigger(dn.ACTIVATE, {
        relatedTarget: e
      });
    }, t._clear = function () {
      [].slice.call(document.querySelectorAll(this._selector)).filter(function (t) {
        return t.classList.contains(_n);
      }).forEach(function (t) {
        return t.classList.remove(_n);
      });
    }, n._jQueryInterface = function (e) {
      return this.each(function () {
        var t = g(this).data(ln);

        if (t || (t = new n(this, "object" == _typeof(e) && e), g(this).data(ln, t)), "string" == typeof e) {
          if ("undefined" == typeof t[e]) throw new TypeError('No method named "' + e + '"');
          t[e]();
        }
      });
    }, s(n, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }, {
      key: "Default",
      get: function get() {
        return un;
      }
    }]), n;
  }();

  g(window).on(dn.LOAD_DATA_API, function () {
    for (var t = [].slice.call(document.querySelectorAll(mn)), e = t.length; e--;) {
      var n = g(t[e]);

      Dn._jQueryInterface.call(n, n.data());
    }
  }), g.fn[an] = Dn._jQueryInterface, g.fn[an].Constructor = Dn, g.fn[an].noConflict = function () {
    return g.fn[an] = hn, Dn._jQueryInterface;
  };

  var wn = "bs.tab",
      An = "." + wn,
      Nn = g.fn.tab,
      On = {
    HIDE: "hide" + An,
    HIDDEN: "hidden" + An,
    SHOW: "show" + An,
    SHOWN: "shown" + An,
    CLICK_DATA_API: "click" + An + ".data-api"
  },
      kn = "dropdown-menu",
      Pn = "active",
      Ln = "disabled",
      jn = "fade",
      Hn = "show",
      Rn = ".dropdown",
      xn = ".nav, .list-group",
      Fn = ".active",
      Un = "> li > .active",
      Wn = '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]',
      qn = ".dropdown-toggle",
      Mn = "> .dropdown-menu .active",
      Kn = function () {
    function i(t) {
      this._element = t;
    }

    var t = i.prototype;
    return t.show = function () {
      var n = this;

      if (!(this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && g(this._element).hasClass(Pn) || g(this._element).hasClass(Ln))) {
        var t,
            i,
            e = g(this._element).closest(xn)[0],
            o = _.getSelectorFromElement(this._element);

        if (e) {
          var r = "UL" === e.nodeName || "OL" === e.nodeName ? Un : Fn;
          i = (i = g.makeArray(g(e).find(r)))[i.length - 1];
        }

        var s = g.Event(On.HIDE, {
          relatedTarget: this._element
        }),
            a = g.Event(On.SHOW, {
          relatedTarget: i
        });

        if (i && g(i).trigger(s), g(this._element).trigger(a), !a.isDefaultPrevented() && !s.isDefaultPrevented()) {
          o && (t = document.querySelector(o)), this._activate(this._element, e);

          var l = function l() {
            var t = g.Event(On.HIDDEN, {
              relatedTarget: n._element
            }),
                e = g.Event(On.SHOWN, {
              relatedTarget: i
            });
            g(i).trigger(t), g(n._element).trigger(e);
          };

          t ? this._activate(t, t.parentNode, l) : l();
        }
      }
    }, t.dispose = function () {
      g.removeData(this._element, wn), this._element = null;
    }, t._activate = function (t, e, n) {
      var i = this,
          o = (!e || "UL" !== e.nodeName && "OL" !== e.nodeName ? g(e).children(Fn) : g(e).find(Un))[0],
          r = n && o && g(o).hasClass(jn),
          s = function s() {
        return i._transitionComplete(t, o, n);
      };

      if (o && r) {
        var a = _.getTransitionDurationFromElement(o);

        g(o).removeClass(Hn).one(_.TRANSITION_END, s).emulateTransitionEnd(a);
      } else s();
    }, t._transitionComplete = function (t, e, n) {
      if (e) {
        g(e).removeClass(Pn);
        var i = g(e.parentNode).find(Mn)[0];
        i && g(i).removeClass(Pn), "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !1);
      }

      if (g(t).addClass(Pn), "tab" === t.getAttribute("role") && t.setAttribute("aria-selected", !0), _.reflow(t), t.classList.contains(jn) && t.classList.add(Hn), t.parentNode && g(t.parentNode).hasClass(kn)) {
        var o = g(t).closest(Rn)[0];

        if (o) {
          var r = [].slice.call(o.querySelectorAll(qn));
          g(r).addClass(Pn);
        }

        t.setAttribute("aria-expanded", !0);
      }

      n && n();
    }, i._jQueryInterface = function (n) {
      return this.each(function () {
        var t = g(this),
            e = t.data(wn);

        if (e || (e = new i(this), t.data(wn, e)), "string" == typeof n) {
          if ("undefined" == typeof e[n]) throw new TypeError('No method named "' + n + '"');
          e[n]();
        }
      });
    }, s(i, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }]), i;
  }();

  g(document).on(On.CLICK_DATA_API, Wn, function (t) {
    t.preventDefault(), Kn._jQueryInterface.call(g(this), "show");
  }), g.fn.tab = Kn._jQueryInterface, g.fn.tab.Constructor = Kn, g.fn.tab.noConflict = function () {
    return g.fn.tab = Nn, Kn._jQueryInterface;
  };

  var Qn = "toast",
      Bn = "bs.toast",
      Vn = "." + Bn,
      Yn = g.fn[Qn],
      zn = {
    CLICK_DISMISS: "click.dismiss" + Vn,
    HIDE: "hide" + Vn,
    HIDDEN: "hidden" + Vn,
    SHOW: "show" + Vn,
    SHOWN: "shown" + Vn
  },
      Xn = "fade",
      $n = "hide",
      Gn = "show",
      Jn = "showing",
      Zn = {
    animation: "boolean",
    autohide: "boolean",
    delay: "number"
  },
      ti = {
    animation: !0,
    autohide: !0,
    delay: 500
  },
      ei = '[data-dismiss="toast"]',
      ni = function () {
    function i(t, e) {
      this._element = t, this._config = this._getConfig(e), this._timeout = null, this._setListeners();
    }

    var t = i.prototype;
    return t.show = function () {
      var t = this;
      g(this._element).trigger(zn.SHOW), this._config.animation && this._element.classList.add(Xn);

      var e = function e() {
        t._element.classList.remove(Jn), t._element.classList.add(Gn), g(t._element).trigger(zn.SHOWN), t._config.autohide && t.hide();
      };

      if (this._element.classList.remove($n), this._element.classList.add(Jn), this._config.animation) {
        var n = _.getTransitionDurationFromElement(this._element);

        g(this._element).one(_.TRANSITION_END, e).emulateTransitionEnd(n);
      } else e();
    }, t.hide = function (t) {
      var e = this;
      this._element.classList.contains(Gn) && (g(this._element).trigger(zn.HIDE), t ? this._close() : this._timeout = setTimeout(function () {
        e._close();
      }, this._config.delay));
    }, t.dispose = function () {
      clearTimeout(this._timeout), this._timeout = null, this._element.classList.contains(Gn) && this._element.classList.remove(Gn), g(this._element).off(zn.CLICK_DISMISS), g.removeData(this._element, Bn), this._element = null, this._config = null;
    }, t._getConfig = function (t) {
      return t = l({}, ti, g(this._element).data(), "object" == _typeof(t) && t ? t : {}), _.typeCheckConfig(Qn, t, this.constructor.DefaultType), t;
    }, t._setListeners = function () {
      var t = this;
      g(this._element).on(zn.CLICK_DISMISS, ei, function () {
        return t.hide(!0);
      });
    }, t._close = function () {
      var t = this,
          e = function e() {
        t._element.classList.add($n), g(t._element).trigger(zn.HIDDEN);
      };

      if (this._element.classList.remove(Gn), this._config.animation) {
        var n = _.getTransitionDurationFromElement(this._element);

        g(this._element).one(_.TRANSITION_END, e).emulateTransitionEnd(n);
      } else e();
    }, i._jQueryInterface = function (n) {
      return this.each(function () {
        var t = g(this),
            e = t.data(Bn);

        if (e || (e = new i(this, "object" == _typeof(n) && n), t.data(Bn, e)), "string" == typeof n) {
          if ("undefined" == typeof e[n]) throw new TypeError('No method named "' + n + '"');
          e[n](this);
        }
      });
    }, s(i, null, [{
      key: "VERSION",
      get: function get() {
        return "4.3.1";
      }
    }, {
      key: "DefaultType",
      get: function get() {
        return Zn;
      }
    }, {
      key: "Default",
      get: function get() {
        return ti;
      }
    }]), i;
  }();

  g.fn[Qn] = ni._jQueryInterface, g.fn[Qn].Constructor = ni, g.fn[Qn].noConflict = function () {
    return g.fn[Qn] = Yn, ni._jQueryInterface;
  }, function () {
    if ("undefined" == typeof g) throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
    var t = g.fn.jquery.split(" ")[0].split(".");
    if (t[0] < 2 && t[1] < 9 || 1 === t[0] && 9 === t[1] && t[2] < 1 || 4 <= t[0]) throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0");
  }(), t.Util = _, t.Alert = p, t.Button = P, t.Carousel = lt, t.Collapse = bt, t.Dropdown = Jt, t.Modal = ve, t.Popover = sn, t.Scrollspy = Dn, t.Tab = Kn, t.Toast = ni, t.Tooltip = Be, Object.defineProperty(t, "__esModule", {
    value: !0
  });
});
"use strict";
"use strict";

function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*
     _ _      _       _
 ___| (_) ___| | __  (_)___
/ __| | |/ __| |/ /  | / __|
\__ \ | | (__|   < _ | \__ \
|___/_|_|\___|_|\_(_)/ |___/
                   |__/

 Version: 1.8.0
  Author: Ken Wheeler
 Website: http://kenwheeler.github.io
    Docs: http://kenwheeler.github.io/slick
    Repo: http://github.com/kenwheeler/slick
  Issues: http://github.com/kenwheeler/slick/issues

 */

/* global window, document, define, jQuery, setInterval, clearInterval */
;

(function (factory) {
  'use strict';

  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory);
  } else if (typeof exports !== 'undefined') {
    module.exports = factory(require('jquery'));
  } else {
    factory(jQuery);
  }
})(function ($) {
  'use strict';

  var Slick = window.Slick || {};

  Slick = function () {
    var instanceUid = 0;

    function Slick(element, settings) {
      var _ = this,
          dataSettings;

      _.defaults = {
        accessibility: true,
        adaptiveHeight: false,
        appendArrows: $(element),
        appendDots: $(element),
        arrows: true,
        asNavFor: null,
        prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
        nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
        autoplay: false,
        autoplaySpeed: 3000,
        centerMode: false,
        centerPadding: '50px',
        cssEase: 'ease',
        customPaging: function customPaging(slider, i) {
          return $('<button type="button" />').text(i + 1);
        },
        dots: false,
        dotsClass: 'slick-dots',
        draggable: true,
        easing: 'linear',
        edgeFriction: 0.35,
        fade: false,
        focusOnSelect: false,
        focusOnChange: false,
        infinite: true,
        initialSlide: 0,
        lazyLoad: 'ondemand',
        mobileFirst: false,
        pauseOnHover: true,
        pauseOnFocus: true,
        pauseOnDotsHover: false,
        respondTo: 'window',
        responsive: null,
        rows: 1,
        rtl: false,
        slide: '',
        slidesPerRow: 1,
        slidesToShow: 1,
        slidesToScroll: 1,
        speed: 500,
        swipe: true,
        swipeToSlide: false,
        touchMove: true,
        touchThreshold: 5,
        useCSS: true,
        useTransform: true,
        variableWidth: false,
        vertical: false,
        verticalSwiping: false,
        waitForAnimate: true,
        zIndex: 1000
      };
      _.initials = {
        animating: false,
        dragging: false,
        autoPlayTimer: null,
        currentDirection: 0,
        currentLeft: null,
        currentSlide: 0,
        direction: 1,
        $dots: null,
        listWidth: null,
        listHeight: null,
        loadIndex: 0,
        $nextArrow: null,
        $prevArrow: null,
        scrolling: false,
        slideCount: null,
        slideWidth: null,
        $slideTrack: null,
        $slides: null,
        sliding: false,
        slideOffset: 0,
        swipeLeft: null,
        swiping: false,
        $list: null,
        touchObject: {},
        transformsEnabled: false,
        unslicked: false
      };
      $.extend(_, _.initials);
      _.activeBreakpoint = null;
      _.animType = null;
      _.animProp = null;
      _.breakpoints = [];
      _.breakpointSettings = [];
      _.cssTransitions = false;
      _.focussed = false;
      _.interrupted = false;
      _.hidden = 'hidden';
      _.paused = true;
      _.positionProp = null;
      _.respondTo = null;
      _.rowCount = 1;
      _.shouldClick = true;
      _.$slider = $(element);
      _.$slidesCache = null;
      _.transformType = null;
      _.transitionType = null;
      _.visibilityChange = 'visibilitychange';
      _.windowWidth = 0;
      _.windowTimer = null;
      dataSettings = $(element).data('slick') || {};
      _.options = $.extend({}, _.defaults, settings, dataSettings);
      _.currentSlide = _.options.initialSlide;
      _.originalSettings = _.options;

      if (typeof document.mozHidden !== 'undefined') {
        _.hidden = 'mozHidden';
        _.visibilityChange = 'mozvisibilitychange';
      } else if (typeof document.webkitHidden !== 'undefined') {
        _.hidden = 'webkitHidden';
        _.visibilityChange = 'webkitvisibilitychange';
      }

      _.autoPlay = $.proxy(_.autoPlay, _);
      _.autoPlayClear = $.proxy(_.autoPlayClear, _);
      _.autoPlayIterator = $.proxy(_.autoPlayIterator, _);
      _.changeSlide = $.proxy(_.changeSlide, _);
      _.clickHandler = $.proxy(_.clickHandler, _);
      _.selectHandler = $.proxy(_.selectHandler, _);
      _.setPosition = $.proxy(_.setPosition, _);
      _.swipeHandler = $.proxy(_.swipeHandler, _);
      _.dragHandler = $.proxy(_.dragHandler, _);
      _.keyHandler = $.proxy(_.keyHandler, _);
      _.instanceUid = instanceUid++; // A simple way to check for HTML strings
      // Strict HTML recognition (must start with <)
      // Extracted from jQuery v1.11 source

      _.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/;

      _.registerBreakpoints();

      _.init(true);
    }

    return Slick;
  }();

  Slick.prototype.activateADA = function () {
    var _ = this;

    _.$slideTrack.find('.slick-active').attr({
      'aria-hidden': 'false'
    }).find('a, input, button, select').attr({
      'tabindex': '0'
    });
  };

  Slick.prototype.addSlide = Slick.prototype.slickAdd = function (markup, index, addBefore) {
    var _ = this;

    if (typeof index === 'boolean') {
      addBefore = index;
      index = null;
    } else if (index < 0 || index >= _.slideCount) {
      return false;
    }

    _.unload();

    if (typeof index === 'number') {
      if (index === 0 && _.$slides.length === 0) {
        $(markup).appendTo(_.$slideTrack);
      } else if (addBefore) {
        $(markup).insertBefore(_.$slides.eq(index));
      } else {
        $(markup).insertAfter(_.$slides.eq(index));
      }
    } else {
      if (addBefore === true) {
        $(markup).prependTo(_.$slideTrack);
      } else {
        $(markup).appendTo(_.$slideTrack);
      }
    }

    _.$slides = _.$slideTrack.children(this.options.slide);

    _.$slideTrack.children(this.options.slide).detach();

    _.$slideTrack.append(_.$slides);

    _.$slides.each(function (index, element) {
      $(element).attr('data-slick-index', index);
    });

    _.$slidesCache = _.$slides;

    _.reinit();
  };

  Slick.prototype.animateHeight = function () {
    var _ = this;

    if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
      var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);

      _.$list.animate({
        height: targetHeight
      }, _.options.speed);
    }
  };

  Slick.prototype.animateSlide = function (targetLeft, callback) {
    var animProps = {},
        _ = this;

    _.animateHeight();

    if (_.options.rtl === true && _.options.vertical === false) {
      targetLeft = -targetLeft;
    }

    if (_.transformsEnabled === false) {
      if (_.options.vertical === false) {
        _.$slideTrack.animate({
          left: targetLeft
        }, _.options.speed, _.options.easing, callback);
      } else {
        _.$slideTrack.animate({
          top: targetLeft
        }, _.options.speed, _.options.easing, callback);
      }
    } else {
      if (_.cssTransitions === false) {
        if (_.options.rtl === true) {
          _.currentLeft = -_.currentLeft;
        }

        $({
          animStart: _.currentLeft
        }).animate({
          animStart: targetLeft
        }, {
          duration: _.options.speed,
          easing: _.options.easing,
          step: function step(now) {
            now = Math.ceil(now);

            if (_.options.vertical === false) {
              animProps[_.animType] = 'translate(' + now + 'px, 0px)';

              _.$slideTrack.css(animProps);
            } else {
              animProps[_.animType] = 'translate(0px,' + now + 'px)';

              _.$slideTrack.css(animProps);
            }
          },
          complete: function complete() {
            if (callback) {
              callback.call();
            }
          }
        });
      } else {
        _.applyTransition();

        targetLeft = Math.ceil(targetLeft);

        if (_.options.vertical === false) {
          animProps[_.animType] = 'translate3d(' + targetLeft + 'px, 0px, 0px)';
        } else {
          animProps[_.animType] = 'translate3d(0px,' + targetLeft + 'px, 0px)';
        }

        _.$slideTrack.css(animProps);

        if (callback) {
          setTimeout(function () {
            _.disableTransition();

            callback.call();
          }, _.options.speed);
        }
      }
    }
  };

  Slick.prototype.getNavTarget = function () {
    var _ = this,
        asNavFor = _.options.asNavFor;

    if (asNavFor && asNavFor !== null) {
      asNavFor = $(asNavFor).not(_.$slider);
    }

    return asNavFor;
  };

  Slick.prototype.asNavFor = function (index) {
    var _ = this,
        asNavFor = _.getNavTarget();

    if (asNavFor !== null && _typeof(asNavFor) === 'object') {
      asNavFor.each(function () {
        var target = $(this).slick('getSlick');

        if (!target.unslicked) {
          target.slideHandler(index, true);
        }
      });
    }
  };

  Slick.prototype.applyTransition = function (slide) {
    var _ = this,
        transition = {};

    if (_.options.fade === false) {
      transition[_.transitionType] = _.transformType + ' ' + _.options.speed + 'ms ' + _.options.cssEase;
    } else {
      transition[_.transitionType] = 'opacity ' + _.options.speed + 'ms ' + _.options.cssEase;
    }

    if (_.options.fade === false) {
      _.$slideTrack.css(transition);
    } else {
      _.$slides.eq(slide).css(transition);
    }
  };

  Slick.prototype.autoPlay = function () {
    var _ = this;

    _.autoPlayClear();

    if (_.slideCount > _.options.slidesToShow) {
      _.autoPlayTimer = setInterval(_.autoPlayIterator, _.options.autoplaySpeed);
    }
  };

  Slick.prototype.autoPlayClear = function () {
    var _ = this;

    if (_.autoPlayTimer) {
      clearInterval(_.autoPlayTimer);
    }
  };

  Slick.prototype.autoPlayIterator = function () {
    var _ = this,
        slideTo = _.currentSlide + _.options.slidesToScroll;

    if (!_.paused && !_.interrupted && !_.focussed) {
      if (_.options.infinite === false) {
        if (_.direction === 1 && _.currentSlide + 1 === _.slideCount - 1) {
          _.direction = 0;
        } else if (_.direction === 0) {
          slideTo = _.currentSlide - _.options.slidesToScroll;

          if (_.currentSlide - 1 === 0) {
            _.direction = 1;
          }
        }
      }

      _.slideHandler(slideTo);
    }
  };

  Slick.prototype.buildArrows = function () {
    var _ = this;

    if (_.options.arrows === true) {
      _.$prevArrow = $(_.options.prevArrow).addClass('slick-arrow');
      _.$nextArrow = $(_.options.nextArrow).addClass('slick-arrow');

      if (_.slideCount > _.options.slidesToShow) {
        _.$prevArrow.removeClass('slick-hidden').removeAttr('aria-hidden tabindex');

        _.$nextArrow.removeClass('slick-hidden').removeAttr('aria-hidden tabindex');

        if (_.htmlExpr.test(_.options.prevArrow)) {
          _.$prevArrow.prependTo(_.options.appendArrows);
        }

        if (_.htmlExpr.test(_.options.nextArrow)) {
          _.$nextArrow.appendTo(_.options.appendArrows);
        }

        if (_.options.infinite !== true) {
          _.$prevArrow.addClass('slick-disabled').attr('aria-disabled', 'true');
        }
      } else {
        _.$prevArrow.add(_.$nextArrow).addClass('slick-hidden').attr({
          'aria-disabled': 'true',
          'tabindex': '-1'
        });
      }
    }
  };

  Slick.prototype.buildDots = function () {
    var _ = this,
        i,
        dot;

    if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
      _.$slider.addClass('slick-dotted');

      dot = $('<ul />').addClass(_.options.dotsClass);

      for (i = 0; i <= _.getDotCount(); i += 1) {
        dot.append($('<li />').append(_.options.customPaging.call(this, _, i)));
      }

      _.$dots = dot.appendTo(_.options.appendDots);

      _.$dots.find('li').first().addClass('slick-active');
    }
  };

  Slick.prototype.buildOut = function () {
    var _ = this;

    _.$slides = _.$slider.children(_.options.slide + ':not(.slick-cloned)').addClass('slick-slide');
    _.slideCount = _.$slides.length;

    _.$slides.each(function (index, element) {
      $(element).attr('data-slick-index', index).data('originalStyling', $(element).attr('style') || '');
    });

    _.$slider.addClass('slick-slider');

    _.$slideTrack = _.slideCount === 0 ? $('<div class="slick-track"/>').appendTo(_.$slider) : _.$slides.wrapAll('<div class="slick-track"/>').parent();
    _.$list = _.$slideTrack.wrap('<div class="slick-list"/>').parent();

    _.$slideTrack.css('opacity', 0);

    if (_.options.centerMode === true || _.options.swipeToSlide === true) {
      _.options.slidesToScroll = 1;
    }

    $('img[data-lazy]', _.$slider).not('[src]').addClass('slick-loading');

    _.setupInfinite();

    _.buildArrows();

    _.buildDots();

    _.updateDots();

    _.setSlideClasses(typeof _.currentSlide === 'number' ? _.currentSlide : 0);

    if (_.options.draggable === true) {
      _.$list.addClass('draggable');
    }
  };

  Slick.prototype.buildRows = function () {
    var _ = this,
        a,
        b,
        c,
        newSlides,
        numOfSlides,
        originalSlides,
        slidesPerSection;

    newSlides = document.createDocumentFragment();
    originalSlides = _.$slider.children();

    if (_.options.rows > 0) {
      slidesPerSection = _.options.slidesPerRow * _.options.rows;
      numOfSlides = Math.ceil(originalSlides.length / slidesPerSection);

      for (a = 0; a < numOfSlides; a++) {
        var slide = document.createElement('div');

        for (b = 0; b < _.options.rows; b++) {
          var row = document.createElement('div');

          for (c = 0; c < _.options.slidesPerRow; c++) {
            var target = a * slidesPerSection + (b * _.options.slidesPerRow + c);

            if (originalSlides.get(target)) {
              row.appendChild(originalSlides.get(target));
            }
          }

          slide.appendChild(row);
        }

        newSlides.appendChild(slide);
      }

      _.$slider.empty().append(newSlides);

      _.$slider.children().children().children().css({
        'width': 100 / _.options.slidesPerRow + '%',
        'display': 'inline-block'
      });
    }
  };

  Slick.prototype.checkResponsive = function (initial, forceUpdate) {
    var _ = this,
        breakpoint,
        targetBreakpoint,
        respondToWidth,
        triggerBreakpoint = false;

    var sliderWidth = _.$slider.width();

    var windowWidth = window.innerWidth || $(window).width();

    if (_.respondTo === 'window') {
      respondToWidth = windowWidth;
    } else if (_.respondTo === 'slider') {
      respondToWidth = sliderWidth;
    } else if (_.respondTo === 'min') {
      respondToWidth = Math.min(windowWidth, sliderWidth);
    }

    if (_.options.responsive && _.options.responsive.length && _.options.responsive !== null) {
      targetBreakpoint = null;

      for (breakpoint in _.breakpoints) {
        if (_.breakpoints.hasOwnProperty(breakpoint)) {
          if (_.originalSettings.mobileFirst === false) {
            if (respondToWidth < _.breakpoints[breakpoint]) {
              targetBreakpoint = _.breakpoints[breakpoint];
            }
          } else {
            if (respondToWidth > _.breakpoints[breakpoint]) {
              targetBreakpoint = _.breakpoints[breakpoint];
            }
          }
        }
      }

      if (targetBreakpoint !== null) {
        if (_.activeBreakpoint !== null) {
          if (targetBreakpoint !== _.activeBreakpoint || forceUpdate) {
            _.activeBreakpoint = targetBreakpoint;

            if (_.breakpointSettings[targetBreakpoint] === 'unslick') {
              _.unslick(targetBreakpoint);
            } else {
              _.options = $.extend({}, _.originalSettings, _.breakpointSettings[targetBreakpoint]);

              if (initial === true) {
                _.currentSlide = _.options.initialSlide;
              }

              _.refresh(initial);
            }

            triggerBreakpoint = targetBreakpoint;
          }
        } else {
          _.activeBreakpoint = targetBreakpoint;

          if (_.breakpointSettings[targetBreakpoint] === 'unslick') {
            _.unslick(targetBreakpoint);
          } else {
            _.options = $.extend({}, _.originalSettings, _.breakpointSettings[targetBreakpoint]);

            if (initial === true) {
              _.currentSlide = _.options.initialSlide;
            }

            _.refresh(initial);
          }

          triggerBreakpoint = targetBreakpoint;
        }
      } else {
        if (_.activeBreakpoint !== null) {
          _.activeBreakpoint = null;
          _.options = _.originalSettings;

          if (initial === true) {
            _.currentSlide = _.options.initialSlide;
          }

          _.refresh(initial);

          triggerBreakpoint = targetBreakpoint;
        }
      } // only trigger breakpoints during an actual break. not on initialize.


      if (!initial && triggerBreakpoint !== false) {
        _.$slider.trigger('breakpoint', [_, triggerBreakpoint]);
      }
    }
  };

  Slick.prototype.changeSlide = function (event, dontAnimate) {
    var _ = this,
        $target = $(event.currentTarget),
        indexOffset,
        slideOffset,
        unevenOffset; // If target is a link, prevent default action.


    if ($target.is('a')) {
      event.preventDefault();
    } // If target is not the <li> element (ie: a child), find the <li>.


    if (!$target.is('li')) {
      $target = $target.closest('li');
    }

    unevenOffset = _.slideCount % _.options.slidesToScroll !== 0;
    indexOffset = unevenOffset ? 0 : (_.slideCount - _.currentSlide) % _.options.slidesToScroll;

    switch (event.data.message) {
      case 'previous':
        slideOffset = indexOffset === 0 ? _.options.slidesToScroll : _.options.slidesToShow - indexOffset;

        if (_.slideCount > _.options.slidesToShow) {
          _.slideHandler(_.currentSlide - slideOffset, false, dontAnimate);
        }

        break;

      case 'next':
        slideOffset = indexOffset === 0 ? _.options.slidesToScroll : indexOffset;

        if (_.slideCount > _.options.slidesToShow) {
          _.slideHandler(_.currentSlide + slideOffset, false, dontAnimate);
        }

        break;

      case 'index':
        var index = event.data.index === 0 ? 0 : event.data.index || $target.index() * _.options.slidesToScroll;

        _.slideHandler(_.checkNavigable(index), false, dontAnimate);

        $target.children().trigger('focus');
        break;

      default:
        return;
    }
  };

  Slick.prototype.checkNavigable = function (index) {
    var _ = this,
        navigables,
        prevNavigable;

    navigables = _.getNavigableIndexes();
    prevNavigable = 0;

    if (index > navigables[navigables.length - 1]) {
      index = navigables[navigables.length - 1];
    } else {
      for (var n in navigables) {
        if (index < navigables[n]) {
          index = prevNavigable;
          break;
        }

        prevNavigable = navigables[n];
      }
    }

    return index;
  };

  Slick.prototype.cleanUpEvents = function () {
    var _ = this;

    if (_.options.dots && _.$dots !== null) {
      $('li', _.$dots).off('click.slick', _.changeSlide).off('mouseenter.slick', $.proxy(_.interrupt, _, true)).off('mouseleave.slick', $.proxy(_.interrupt, _, false));

      if (_.options.accessibility === true) {
        _.$dots.off('keydown.slick', _.keyHandler);
      }
    }

    _.$slider.off('focus.slick blur.slick');

    if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
      _.$prevArrow && _.$prevArrow.off('click.slick', _.changeSlide);
      _.$nextArrow && _.$nextArrow.off('click.slick', _.changeSlide);

      if (_.options.accessibility === true) {
        _.$prevArrow && _.$prevArrow.off('keydown.slick', _.keyHandler);
        _.$nextArrow && _.$nextArrow.off('keydown.slick', _.keyHandler);
      }
    }

    _.$list.off('touchstart.slick mousedown.slick', _.swipeHandler);

    _.$list.off('touchmove.slick mousemove.slick', _.swipeHandler);

    _.$list.off('touchend.slick mouseup.slick', _.swipeHandler);

    _.$list.off('touchcancel.slick mouseleave.slick', _.swipeHandler);

    _.$list.off('click.slick', _.clickHandler);

    $(document).off(_.visibilityChange, _.visibility);

    _.cleanUpSlideEvents();

    if (_.options.accessibility === true) {
      _.$list.off('keydown.slick', _.keyHandler);
    }

    if (_.options.focusOnSelect === true) {
      $(_.$slideTrack).children().off('click.slick', _.selectHandler);
    }

    $(window).off('orientationchange.slick.slick-' + _.instanceUid, _.orientationChange);
    $(window).off('resize.slick.slick-' + _.instanceUid, _.resize);
    $('[draggable!=true]', _.$slideTrack).off('dragstart', _.preventDefault);
    $(window).off('load.slick.slick-' + _.instanceUid, _.setPosition);
  };

  Slick.prototype.cleanUpSlideEvents = function () {
    var _ = this;

    _.$list.off('mouseenter.slick', $.proxy(_.interrupt, _, true));

    _.$list.off('mouseleave.slick', $.proxy(_.interrupt, _, false));
  };

  Slick.prototype.cleanUpRows = function () {
    var _ = this,
        originalSlides;

    if (_.options.rows > 0) {
      originalSlides = _.$slides.children().children();
      originalSlides.removeAttr('style');

      _.$slider.empty().append(originalSlides);
    }
  };

  Slick.prototype.clickHandler = function (event) {
    var _ = this;

    if (_.shouldClick === false) {
      event.stopImmediatePropagation();
      event.stopPropagation();
      event.preventDefault();
    }
  };

  Slick.prototype.destroy = function (refresh) {
    var _ = this;

    _.autoPlayClear();

    _.touchObject = {};

    _.cleanUpEvents();

    $('.slick-cloned', _.$slider).detach();

    if (_.$dots) {
      _.$dots.remove();
    }

    if (_.$prevArrow && _.$prevArrow.length) {
      _.$prevArrow.removeClass('slick-disabled slick-arrow slick-hidden').removeAttr('aria-hidden aria-disabled tabindex').css('display', '');

      if (_.htmlExpr.test(_.options.prevArrow)) {
        _.$prevArrow.remove();
      }
    }

    if (_.$nextArrow && _.$nextArrow.length) {
      _.$nextArrow.removeClass('slick-disabled slick-arrow slick-hidden').removeAttr('aria-hidden aria-disabled tabindex').css('display', '');

      if (_.htmlExpr.test(_.options.nextArrow)) {
        _.$nextArrow.remove();
      }
    }

    if (_.$slides) {
      _.$slides.removeClass('slick-slide slick-active slick-center slick-visible slick-current').removeAttr('aria-hidden').removeAttr('data-slick-index').each(function () {
        $(this).attr('style', $(this).data('originalStyling'));
      });

      _.$slideTrack.children(this.options.slide).detach();

      _.$slideTrack.detach();

      _.$list.detach();

      _.$slider.append(_.$slides);
    }

    _.cleanUpRows();

    _.$slider.removeClass('slick-slider');

    _.$slider.removeClass('slick-initialized');

    _.$slider.removeClass('slick-dotted');

    _.unslicked = true;

    if (!refresh) {
      _.$slider.trigger('destroy', [_]);
    }
  };

  Slick.prototype.disableTransition = function (slide) {
    var _ = this,
        transition = {};

    transition[_.transitionType] = '';

    if (_.options.fade === false) {
      _.$slideTrack.css(transition);
    } else {
      _.$slides.eq(slide).css(transition);
    }
  };

  Slick.prototype.fadeSlide = function (slideIndex, callback) {
    var _ = this;

    if (_.cssTransitions === false) {
      _.$slides.eq(slideIndex).css({
        zIndex: _.options.zIndex
      });

      _.$slides.eq(slideIndex).animate({
        opacity: 1
      }, _.options.speed, _.options.easing, callback);
    } else {
      _.applyTransition(slideIndex);

      _.$slides.eq(slideIndex).css({
        opacity: 1,
        zIndex: _.options.zIndex
      });

      if (callback) {
        setTimeout(function () {
          _.disableTransition(slideIndex);

          callback.call();
        }, _.options.speed);
      }
    }
  };

  Slick.prototype.fadeSlideOut = function (slideIndex) {
    var _ = this;

    if (_.cssTransitions === false) {
      _.$slides.eq(slideIndex).animate({
        opacity: 0,
        zIndex: _.options.zIndex - 2
      }, _.options.speed, _.options.easing);
    } else {
      _.applyTransition(slideIndex);

      _.$slides.eq(slideIndex).css({
        opacity: 0,
        zIndex: _.options.zIndex - 2
      });
    }
  };

  Slick.prototype.filterSlides = Slick.prototype.slickFilter = function (filter) {
    var _ = this;

    if (filter !== null) {
      _.$slidesCache = _.$slides;

      _.unload();

      _.$slideTrack.children(this.options.slide).detach();

      _.$slidesCache.filter(filter).appendTo(_.$slideTrack);

      _.reinit();
    }
  };

  Slick.prototype.focusHandler = function () {
    var _ = this;

    _.$slider.off('focus.slick blur.slick').on('focus.slick blur.slick', '*', function (event) {
      event.stopImmediatePropagation();
      var $sf = $(this);
      setTimeout(function () {
        if (_.options.pauseOnFocus) {
          _.focussed = $sf.is(':focus');

          _.autoPlay();
        }
      }, 0);
    });
  };

  Slick.prototype.getCurrent = Slick.prototype.slickCurrentSlide = function () {
    var _ = this;

    return _.currentSlide;
  };

  Slick.prototype.getDotCount = function () {
    var _ = this;

    var breakPoint = 0;
    var counter = 0;
    var pagerQty = 0;

    if (_.options.infinite === true) {
      if (_.slideCount <= _.options.slidesToShow) {
        ++pagerQty;
      } else {
        while (breakPoint < _.slideCount) {
          ++pagerQty;
          breakPoint = counter + _.options.slidesToScroll;
          counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
        }
      }
    } else if (_.options.centerMode === true) {
      pagerQty = _.slideCount;
    } else if (!_.options.asNavFor) {
      pagerQty = 1 + Math.ceil((_.slideCount - _.options.slidesToShow) / _.options.slidesToScroll);
    } else {
      while (breakPoint < _.slideCount) {
        ++pagerQty;
        breakPoint = counter + _.options.slidesToScroll;
        counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
      }
    }

    return pagerQty - 1;
  };

  Slick.prototype.getLeft = function (slideIndex) {
    var _ = this,
        targetLeft,
        verticalHeight,
        verticalOffset = 0,
        targetSlide,
        coef;

    _.slideOffset = 0;
    verticalHeight = _.$slides.first().outerHeight(true);

    if (_.options.infinite === true) {
      if (_.slideCount > _.options.slidesToShow) {
        _.slideOffset = _.slideWidth * _.options.slidesToShow * -1;
        coef = -1;

        if (_.options.vertical === true && _.options.centerMode === true) {
          if (_.options.slidesToShow === 2) {
            coef = -1.5;
          } else if (_.options.slidesToShow === 1) {
            coef = -2;
          }
        }

        verticalOffset = verticalHeight * _.options.slidesToShow * coef;
      }

      if (_.slideCount % _.options.slidesToScroll !== 0) {
        if (slideIndex + _.options.slidesToScroll > _.slideCount && _.slideCount > _.options.slidesToShow) {
          if (slideIndex > _.slideCount) {
            _.slideOffset = (_.options.slidesToShow - (slideIndex - _.slideCount)) * _.slideWidth * -1;
            verticalOffset = (_.options.slidesToShow - (slideIndex - _.slideCount)) * verticalHeight * -1;
          } else {
            _.slideOffset = _.slideCount % _.options.slidesToScroll * _.slideWidth * -1;
            verticalOffset = _.slideCount % _.options.slidesToScroll * verticalHeight * -1;
          }
        }
      }
    } else {
      if (slideIndex + _.options.slidesToShow > _.slideCount) {
        _.slideOffset = (slideIndex + _.options.slidesToShow - _.slideCount) * _.slideWidth;
        verticalOffset = (slideIndex + _.options.slidesToShow - _.slideCount) * verticalHeight;
      }
    }

    if (_.slideCount <= _.options.slidesToShow) {
      _.slideOffset = 0;
      verticalOffset = 0;
    }

    if (_.options.centerMode === true && _.slideCount <= _.options.slidesToShow) {
      _.slideOffset = _.slideWidth * Math.floor(_.options.slidesToShow) / 2 - _.slideWidth * _.slideCount / 2;
    } else if (_.options.centerMode === true && _.options.infinite === true) {
      _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2) - _.slideWidth;
    } else if (_.options.centerMode === true) {
      _.slideOffset = 0;
      _.slideOffset += _.slideWidth * Math.floor(_.options.slidesToShow / 2);
    }

    if (_.options.vertical === false) {
      targetLeft = slideIndex * _.slideWidth * -1 + _.slideOffset;
    } else {
      targetLeft = slideIndex * verticalHeight * -1 + verticalOffset;
    }

    if (_.options.variableWidth === true) {
      if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
        targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex);
      } else {
        targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex + _.options.slidesToShow);
      }

      if (_.options.rtl === true) {
        if (targetSlide[0]) {
          targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1;
        } else {
          targetLeft = 0;
        }
      } else {
        targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0;
      }

      if (_.options.centerMode === true) {
        if (_.slideCount <= _.options.slidesToShow || _.options.infinite === false) {
          targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex);
        } else {
          targetSlide = _.$slideTrack.children('.slick-slide').eq(slideIndex + _.options.slidesToShow + 1);
        }

        if (_.options.rtl === true) {
          if (targetSlide[0]) {
            targetLeft = (_.$slideTrack.width() - targetSlide[0].offsetLeft - targetSlide.width()) * -1;
          } else {
            targetLeft = 0;
          }
        } else {
          targetLeft = targetSlide[0] ? targetSlide[0].offsetLeft * -1 : 0;
        }

        targetLeft += (_.$list.width() - targetSlide.outerWidth()) / 2;
      }
    }

    return targetLeft;
  };

  Slick.prototype.getOption = Slick.prototype.slickGetOption = function (option) {
    var _ = this;

    return _.options[option];
  };

  Slick.prototype.getNavigableIndexes = function () {
    var _ = this,
        breakPoint = 0,
        counter = 0,
        indexes = [],
        max;

    if (_.options.infinite === false) {
      max = _.slideCount;
    } else {
      breakPoint = _.options.slidesToScroll * -1;
      counter = _.options.slidesToScroll * -1;
      max = _.slideCount * 2;
    }

    while (breakPoint < max) {
      indexes.push(breakPoint);
      breakPoint = counter + _.options.slidesToScroll;
      counter += _.options.slidesToScroll <= _.options.slidesToShow ? _.options.slidesToScroll : _.options.slidesToShow;
    }

    return indexes;
  };

  Slick.prototype.getSlick = function () {
    return this;
  };

  Slick.prototype.getSlideCount = function () {
    var _ = this,
        slidesTraversed,
        swipedSlide,
        centerOffset;

    centerOffset = _.options.centerMode === true ? _.slideWidth * Math.floor(_.options.slidesToShow / 2) : 0;

    if (_.options.swipeToSlide === true) {
      _.$slideTrack.find('.slick-slide').each(function (index, slide) {
        if (slide.offsetLeft - centerOffset + $(slide).outerWidth() / 2 > _.swipeLeft * -1) {
          swipedSlide = slide;
          return false;
        }
      });

      slidesTraversed = Math.abs($(swipedSlide).attr('data-slick-index') - _.currentSlide) || 1;
      return slidesTraversed;
    } else {
      return _.options.slidesToScroll;
    }
  };

  Slick.prototype.goTo = Slick.prototype.slickGoTo = function (slide, dontAnimate) {
    var _ = this;

    _.changeSlide({
      data: {
        message: 'index',
        index: parseInt(slide)
      }
    }, dontAnimate);
  };

  Slick.prototype.init = function (creation) {
    var _ = this;

    if (!$(_.$slider).hasClass('slick-initialized')) {
      $(_.$slider).addClass('slick-initialized');

      _.buildRows();

      _.buildOut();

      _.setProps();

      _.startLoad();

      _.loadSlider();

      _.initializeEvents();

      _.updateArrows();

      _.updateDots();

      _.checkResponsive(true);

      _.focusHandler();
    }

    if (creation) {
      _.$slider.trigger('init', [_]);
    }

    if (_.options.accessibility === true) {
      _.initADA();
    }

    if (_.options.autoplay) {
      _.paused = false;

      _.autoPlay();
    }
  };

  Slick.prototype.initADA = function () {
    var _ = this,
        numDotGroups = Math.ceil(_.slideCount / _.options.slidesToShow),
        tabControlIndexes = _.getNavigableIndexes().filter(function (val) {
      return val >= 0 && val < _.slideCount;
    });

    _.$slides.add(_.$slideTrack.find('.slick-cloned')).attr({
      'aria-hidden': 'true',
      'tabindex': '-1'
    }).find('a, input, button, select').attr({
      'tabindex': '-1'
    });

    if (_.$dots !== null) {
      _.$slides.not(_.$slideTrack.find('.slick-cloned')).each(function (i) {
        var slideControlIndex = tabControlIndexes.indexOf(i);
        $(this).attr({
          'role': 'tabpanel',
          'id': 'slick-slide' + _.instanceUid + i,
          'tabindex': -1
        });

        if (slideControlIndex !== -1) {
          var ariaButtonControl = 'slick-slide-control' + _.instanceUid + slideControlIndex;

          if ($('#' + ariaButtonControl).length) {
            $(this).attr({
              'aria-describedby': ariaButtonControl
            });
          }
        }
      });

      _.$dots.attr('role', 'tablist').find('li').each(function (i) {
        var mappedSlideIndex = tabControlIndexes[i];
        $(this).attr({
          'role': 'presentation'
        });
        $(this).find('button').first().attr({
          'role': 'tab',
          'id': 'slick-slide-control' + _.instanceUid + i,
          'aria-controls': 'slick-slide' + _.instanceUid + mappedSlideIndex,
          'aria-label': i + 1 + ' of ' + numDotGroups,
          'aria-selected': null,
          'tabindex': '-1'
        });
      }).eq(_.currentSlide).find('button').attr({
        'aria-selected': 'true',
        'tabindex': '0'
      }).end();
    }

    for (var i = _.currentSlide, max = i + _.options.slidesToShow; i < max; i++) {
      if (_.options.focusOnChange) {
        _.$slides.eq(i).attr({
          'tabindex': '0'
        });
      } else {
        _.$slides.eq(i).removeAttr('tabindex');
      }
    }

    _.activateADA();
  };

  Slick.prototype.initArrowEvents = function () {
    var _ = this;

    if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
      _.$prevArrow.off('click.slick').on('click.slick', {
        message: 'previous'
      }, _.changeSlide);

      _.$nextArrow.off('click.slick').on('click.slick', {
        message: 'next'
      }, _.changeSlide);

      if (_.options.accessibility === true) {
        _.$prevArrow.on('keydown.slick', _.keyHandler);

        _.$nextArrow.on('keydown.slick', _.keyHandler);
      }
    }
  };

  Slick.prototype.initDotEvents = function () {
    var _ = this;

    if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
      $('li', _.$dots).on('click.slick', {
        message: 'index'
      }, _.changeSlide);

      if (_.options.accessibility === true) {
        _.$dots.on('keydown.slick', _.keyHandler);
      }
    }

    if (_.options.dots === true && _.options.pauseOnDotsHover === true && _.slideCount > _.options.slidesToShow) {
      $('li', _.$dots).on('mouseenter.slick', $.proxy(_.interrupt, _, true)).on('mouseleave.slick', $.proxy(_.interrupt, _, false));
    }
  };

  Slick.prototype.initSlideEvents = function () {
    var _ = this;

    if (_.options.pauseOnHover) {
      _.$list.on('mouseenter.slick', $.proxy(_.interrupt, _, true));

      _.$list.on('mouseleave.slick', $.proxy(_.interrupt, _, false));
    }
  };

  Slick.prototype.initializeEvents = function () {
    var _ = this;

    _.initArrowEvents();

    _.initDotEvents();

    _.initSlideEvents();

    _.$list.on('touchstart.slick mousedown.slick', {
      action: 'start'
    }, _.swipeHandler);

    _.$list.on('touchmove.slick mousemove.slick', {
      action: 'move'
    }, _.swipeHandler);

    _.$list.on('touchend.slick mouseup.slick', {
      action: 'end'
    }, _.swipeHandler);

    _.$list.on('touchcancel.slick mouseleave.slick', {
      action: 'end'
    }, _.swipeHandler);

    _.$list.on('click.slick', _.clickHandler);

    $(document).on(_.visibilityChange, $.proxy(_.visibility, _));

    if (_.options.accessibility === true) {
      _.$list.on('keydown.slick', _.keyHandler);
    }

    if (_.options.focusOnSelect === true) {
      $(_.$slideTrack).children().on('click.slick', _.selectHandler);
    }

    $(window).on('orientationchange.slick.slick-' + _.instanceUid, $.proxy(_.orientationChange, _));
    $(window).on('resize.slick.slick-' + _.instanceUid, $.proxy(_.resize, _));
    $('[draggable!=true]', _.$slideTrack).on('dragstart', _.preventDefault);
    $(window).on('load.slick.slick-' + _.instanceUid, _.setPosition);
    $(_.setPosition);
  };

  Slick.prototype.initUI = function () {
    var _ = this;

    if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
      _.$prevArrow.show();

      _.$nextArrow.show();
    }

    if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
      _.$dots.show();
    }
  };

  Slick.prototype.keyHandler = function (event) {
    var _ = this; //Dont slide if the cursor is inside the form fields and arrow keys are pressed


    if (!event.target.tagName.match('TEXTAREA|INPUT|SELECT')) {
      if (event.keyCode === 37 && _.options.accessibility === true) {
        _.changeSlide({
          data: {
            message: _.options.rtl === true ? 'next' : 'previous'
          }
        });
      } else if (event.keyCode === 39 && _.options.accessibility === true) {
        _.changeSlide({
          data: {
            message: _.options.rtl === true ? 'previous' : 'next'
          }
        });
      }
    }
  };

  Slick.prototype.lazyLoad = function () {
    var _ = this,
        loadRange,
        cloneRange,
        rangeStart,
        rangeEnd;

    function loadImages(imagesScope) {
      $('img[data-lazy]', imagesScope).each(function () {
        var image = $(this),
            imageSource = $(this).attr('data-lazy'),
            imageSrcSet = $(this).attr('data-srcset'),
            imageSizes = $(this).attr('data-sizes') || _.$slider.attr('data-sizes'),
            imageToLoad = document.createElement('img');

        imageToLoad.onload = function () {
          image.animate({
            opacity: 0
          }, 100, function () {
            if (imageSrcSet) {
              image.attr('srcset', imageSrcSet);

              if (imageSizes) {
                image.attr('sizes', imageSizes);
              }
            }

            image.attr('src', imageSource).animate({
              opacity: 1
            }, 200, function () {
              image.removeAttr('data-lazy data-srcset data-sizes').removeClass('slick-loading');
            });

            _.$slider.trigger('lazyLoaded', [_, image, imageSource]);
          });
        };

        imageToLoad.onerror = function () {
          image.removeAttr('data-lazy').removeClass('slick-loading').addClass('slick-lazyload-error');

          _.$slider.trigger('lazyLoadError', [_, image, imageSource]);
        };

        imageToLoad.src = imageSource;
      });
    }

    if (_.options.centerMode === true) {
      if (_.options.infinite === true) {
        rangeStart = _.currentSlide + (_.options.slidesToShow / 2 + 1);
        rangeEnd = rangeStart + _.options.slidesToShow + 2;
      } else {
        rangeStart = Math.max(0, _.currentSlide - (_.options.slidesToShow / 2 + 1));
        rangeEnd = 2 + (_.options.slidesToShow / 2 + 1) + _.currentSlide;
      }
    } else {
      rangeStart = _.options.infinite ? _.options.slidesToShow + _.currentSlide : _.currentSlide;
      rangeEnd = Math.ceil(rangeStart + _.options.slidesToShow);

      if (_.options.fade === true) {
        if (rangeStart > 0) rangeStart--;
        if (rangeEnd <= _.slideCount) rangeEnd++;
      }
    }

    loadRange = _.$slider.find('.slick-slide').slice(rangeStart, rangeEnd);

    if (_.options.lazyLoad === 'anticipated') {
      var prevSlide = rangeStart - 1,
          nextSlide = rangeEnd,
          $slides = _.$slider.find('.slick-slide');

      for (var i = 0; i < _.options.slidesToScroll; i++) {
        if (prevSlide < 0) prevSlide = _.slideCount - 1;
        loadRange = loadRange.add($slides.eq(prevSlide));
        loadRange = loadRange.add($slides.eq(nextSlide));
        prevSlide--;
        nextSlide++;
      }
    }

    loadImages(loadRange);

    if (_.slideCount <= _.options.slidesToShow) {
      cloneRange = _.$slider.find('.slick-slide');
      loadImages(cloneRange);
    } else if (_.currentSlide >= _.slideCount - _.options.slidesToShow) {
      cloneRange = _.$slider.find('.slick-cloned').slice(0, _.options.slidesToShow);
      loadImages(cloneRange);
    } else if (_.currentSlide === 0) {
      cloneRange = _.$slider.find('.slick-cloned').slice(_.options.slidesToShow * -1);
      loadImages(cloneRange);
    }
  };

  Slick.prototype.loadSlider = function () {
    var _ = this;

    _.setPosition();

    _.$slideTrack.css({
      opacity: 1
    });

    _.$slider.removeClass('slick-loading');

    _.initUI();

    if (_.options.lazyLoad === 'progressive') {
      _.progressiveLazyLoad();
    }
  };

  Slick.prototype.next = Slick.prototype.slickNext = function () {
    var _ = this;

    _.changeSlide({
      data: {
        message: 'next'
      }
    });
  };

  Slick.prototype.orientationChange = function () {
    var _ = this;

    _.checkResponsive();

    _.setPosition();
  };

  Slick.prototype.pause = Slick.prototype.slickPause = function () {
    var _ = this;

    _.autoPlayClear();

    _.paused = true;
  };

  Slick.prototype.play = Slick.prototype.slickPlay = function () {
    var _ = this;

    _.autoPlay();

    _.options.autoplay = true;
    _.paused = false;
    _.focussed = false;
    _.interrupted = false;
  };

  Slick.prototype.postSlide = function (index) {
    var _ = this;

    if (!_.unslicked) {
      _.$slider.trigger('afterChange', [_, index]);

      _.animating = false;

      if (_.slideCount > _.options.slidesToShow) {
        _.setPosition();
      }

      _.swipeLeft = null;

      if (_.options.autoplay) {
        _.autoPlay();
      }

      if (_.options.accessibility === true) {
        _.initADA();

        if (_.options.focusOnChange) {
          var $currentSlide = $(_.$slides.get(_.currentSlide));
          $currentSlide.attr('tabindex', 0).focus();
        }
      }
    }
  };

  Slick.prototype.prev = Slick.prototype.slickPrev = function () {
    var _ = this;

    _.changeSlide({
      data: {
        message: 'previous'
      }
    });
  };

  Slick.prototype.preventDefault = function (event) {
    event.preventDefault();
  };

  Slick.prototype.progressiveLazyLoad = function (tryCount) {
    tryCount = tryCount || 1;

    var _ = this,
        $imgsToLoad = $('img[data-lazy]', _.$slider),
        image,
        imageSource,
        imageSrcSet,
        imageSizes,
        imageToLoad;

    if ($imgsToLoad.length) {
      image = $imgsToLoad.first();
      imageSource = image.attr('data-lazy');
      imageSrcSet = image.attr('data-srcset');
      imageSizes = image.attr('data-sizes') || _.$slider.attr('data-sizes');
      imageToLoad = document.createElement('img');

      imageToLoad.onload = function () {
        if (imageSrcSet) {
          image.attr('srcset', imageSrcSet);

          if (imageSizes) {
            image.attr('sizes', imageSizes);
          }
        }

        image.attr('src', imageSource).removeAttr('data-lazy data-srcset data-sizes').removeClass('slick-loading');

        if (_.options.adaptiveHeight === true) {
          _.setPosition();
        }

        _.$slider.trigger('lazyLoaded', [_, image, imageSource]);

        _.progressiveLazyLoad();
      };

      imageToLoad.onerror = function () {
        if (tryCount < 3) {
          /**
           * try to load the image 3 times,
           * leave a slight delay so we don't get
           * servers blocking the request.
           */
          setTimeout(function () {
            _.progressiveLazyLoad(tryCount + 1);
          }, 500);
        } else {
          image.removeAttr('data-lazy').removeClass('slick-loading').addClass('slick-lazyload-error');

          _.$slider.trigger('lazyLoadError', [_, image, imageSource]);

          _.progressiveLazyLoad();
        }
      };

      imageToLoad.src = imageSource;
    } else {
      _.$slider.trigger('allImagesLoaded', [_]);
    }
  };

  Slick.prototype.refresh = function (initializing) {
    var _ = this,
        currentSlide,
        lastVisibleIndex;

    lastVisibleIndex = _.slideCount - _.options.slidesToShow; // in non-infinite sliders, we don't want to go past the
    // last visible index.

    if (!_.options.infinite && _.currentSlide > lastVisibleIndex) {
      _.currentSlide = lastVisibleIndex;
    } // if less slides than to show, go to start.


    if (_.slideCount <= _.options.slidesToShow) {
      _.currentSlide = 0;
    }

    currentSlide = _.currentSlide;

    _.destroy(true);

    $.extend(_, _.initials, {
      currentSlide: currentSlide
    });

    _.init();

    if (!initializing) {
      _.changeSlide({
        data: {
          message: 'index',
          index: currentSlide
        }
      }, false);
    }
  };

  Slick.prototype.registerBreakpoints = function () {
    var _ = this,
        breakpoint,
        currentBreakpoint,
        l,
        responsiveSettings = _.options.responsive || null;

    if ($.type(responsiveSettings) === 'array' && responsiveSettings.length) {
      _.respondTo = _.options.respondTo || 'window';

      for (breakpoint in responsiveSettings) {
        l = _.breakpoints.length - 1;

        if (responsiveSettings.hasOwnProperty(breakpoint)) {
          currentBreakpoint = responsiveSettings[breakpoint].breakpoint; // loop through the breakpoints and cut out any existing
          // ones with the same breakpoint number, we don't want dupes.

          while (l >= 0) {
            if (_.breakpoints[l] && _.breakpoints[l] === currentBreakpoint) {
              _.breakpoints.splice(l, 1);
            }

            l--;
          }

          _.breakpoints.push(currentBreakpoint);

          _.breakpointSettings[currentBreakpoint] = responsiveSettings[breakpoint].settings;
        }
      }

      _.breakpoints.sort(function (a, b) {
        return _.options.mobileFirst ? a - b : b - a;
      });
    }
  };

  Slick.prototype.reinit = function () {
    var _ = this;

    _.$slides = _.$slideTrack.children(_.options.slide).addClass('slick-slide');
    _.slideCount = _.$slides.length;

    if (_.currentSlide >= _.slideCount && _.currentSlide !== 0) {
      _.currentSlide = _.currentSlide - _.options.slidesToScroll;
    }

    if (_.slideCount <= _.options.slidesToShow) {
      _.currentSlide = 0;
    }

    _.registerBreakpoints();

    _.setProps();

    _.setupInfinite();

    _.buildArrows();

    _.updateArrows();

    _.initArrowEvents();

    _.buildDots();

    _.updateDots();

    _.initDotEvents();

    _.cleanUpSlideEvents();

    _.initSlideEvents();

    _.checkResponsive(false, true);

    if (_.options.focusOnSelect === true) {
      $(_.$slideTrack).children().on('click.slick', _.selectHandler);
    }

    _.setSlideClasses(typeof _.currentSlide === 'number' ? _.currentSlide : 0);

    _.setPosition();

    _.focusHandler();

    _.paused = !_.options.autoplay;

    _.autoPlay();

    _.$slider.trigger('reInit', [_]);
  };

  Slick.prototype.resize = function () {
    var _ = this;

    if ($(window).width() !== _.windowWidth) {
      clearTimeout(_.windowDelay);
      _.windowDelay = window.setTimeout(function () {
        _.windowWidth = $(window).width();

        _.checkResponsive();

        if (!_.unslicked) {
          _.setPosition();
        }
      }, 50);
    }
  };

  Slick.prototype.removeSlide = Slick.prototype.slickRemove = function (index, removeBefore, removeAll) {
    var _ = this;

    if (typeof index === 'boolean') {
      removeBefore = index;
      index = removeBefore === true ? 0 : _.slideCount - 1;
    } else {
      index = removeBefore === true ? --index : index;
    }

    if (_.slideCount < 1 || index < 0 || index > _.slideCount - 1) {
      return false;
    }

    _.unload();

    if (removeAll === true) {
      _.$slideTrack.children().remove();
    } else {
      _.$slideTrack.children(this.options.slide).eq(index).remove();
    }

    _.$slides = _.$slideTrack.children(this.options.slide);

    _.$slideTrack.children(this.options.slide).detach();

    _.$slideTrack.append(_.$slides);

    _.$slidesCache = _.$slides;

    _.reinit();
  };

  Slick.prototype.setCSS = function (position) {
    var _ = this,
        positionProps = {},
        x,
        y;

    if (_.options.rtl === true) {
      position = -position;
    }

    x = _.positionProp == 'left' ? Math.ceil(position) + 'px' : '0px';
    y = _.positionProp == 'top' ? Math.ceil(position) + 'px' : '0px';
    positionProps[_.positionProp] = position;

    if (_.transformsEnabled === false) {
      _.$slideTrack.css(positionProps);
    } else {
      positionProps = {};

      if (_.cssTransitions === false) {
        positionProps[_.animType] = 'translate(' + x + ', ' + y + ')';

        _.$slideTrack.css(positionProps);
      } else {
        positionProps[_.animType] = 'translate3d(' + x + ', ' + y + ', 0px)';

        _.$slideTrack.css(positionProps);
      }
    }
  };

  Slick.prototype.setDimensions = function () {
    var _ = this;

    if (_.options.vertical === false) {
      if (_.options.centerMode === true) {
        _.$list.css({
          padding: '0px ' + _.options.centerPadding
        });
      }
    } else {
      _.$list.height(_.$slides.first().outerHeight(true) * _.options.slidesToShow);

      if (_.options.centerMode === true) {
        _.$list.css({
          padding: _.options.centerPadding + ' 0px'
        });
      }
    }

    _.listWidth = _.$list.width();
    _.listHeight = _.$list.height();

    if (_.options.vertical === false && _.options.variableWidth === false) {
      _.slideWidth = Math.ceil(_.listWidth / _.options.slidesToShow);

      _.$slideTrack.width(Math.ceil(_.slideWidth * _.$slideTrack.children('.slick-slide').length));
    } else if (_.options.variableWidth === true) {
      _.$slideTrack.width(5000 * _.slideCount);
    } else {
      _.slideWidth = Math.ceil(_.listWidth);

      _.$slideTrack.height(Math.ceil(_.$slides.first().outerHeight(true) * _.$slideTrack.children('.slick-slide').length));
    }

    var offset = _.$slides.first().outerWidth(true) - _.$slides.first().width();

    if (_.options.variableWidth === false) _.$slideTrack.children('.slick-slide').width(_.slideWidth - offset);
  };

  Slick.prototype.setFade = function () {
    var _ = this,
        targetLeft;

    _.$slides.each(function (index, element) {
      targetLeft = _.slideWidth * index * -1;

      if (_.options.rtl === true) {
        $(element).css({
          position: 'relative',
          right: targetLeft,
          top: 0,
          zIndex: _.options.zIndex - 2,
          opacity: 0
        });
      } else {
        $(element).css({
          position: 'relative',
          left: targetLeft,
          top: 0,
          zIndex: _.options.zIndex - 2,
          opacity: 0
        });
      }
    });

    _.$slides.eq(_.currentSlide).css({
      zIndex: _.options.zIndex - 1,
      opacity: 1
    });
  };

  Slick.prototype.setHeight = function () {
    var _ = this;

    if (_.options.slidesToShow === 1 && _.options.adaptiveHeight === true && _.options.vertical === false) {
      var targetHeight = _.$slides.eq(_.currentSlide).outerHeight(true);

      _.$list.css('height', targetHeight);
    }
  };

  Slick.prototype.setOption = Slick.prototype.slickSetOption = function () {
    /**
     * accepts arguments in format of:
     *
     *  - for changing a single option's value:
     *     .slick("setOption", option, value, refresh )
     *
     *  - for changing a set of responsive options:
     *     .slick("setOption", 'responsive', [{}, ...], refresh )
     *
     *  - for updating multiple values at once (not responsive)
     *     .slick("setOption", { 'option': value, ... }, refresh )
     */
    var _ = this,
        l,
        item,
        option,
        value,
        refresh = false,
        type;

    if ($.type(arguments[0]) === 'object') {
      option = arguments[0];
      refresh = arguments[1];
      type = 'multiple';
    } else if ($.type(arguments[0]) === 'string') {
      option = arguments[0];
      value = arguments[1];
      refresh = arguments[2];

      if (arguments[0] === 'responsive' && $.type(arguments[1]) === 'array') {
        type = 'responsive';
      } else if (typeof arguments[1] !== 'undefined') {
        type = 'single';
      }
    }

    if (type === 'single') {
      _.options[option] = value;
    } else if (type === 'multiple') {
      $.each(option, function (opt, val) {
        _.options[opt] = val;
      });
    } else if (type === 'responsive') {
      for (item in value) {
        if ($.type(_.options.responsive) !== 'array') {
          _.options.responsive = [value[item]];
        } else {
          l = _.options.responsive.length - 1; // loop through the responsive object and splice out duplicates.

          while (l >= 0) {
            if (_.options.responsive[l].breakpoint === value[item].breakpoint) {
              _.options.responsive.splice(l, 1);
            }

            l--;
          }

          _.options.responsive.push(value[item]);
        }
      }
    }

    if (refresh) {
      _.unload();

      _.reinit();
    }
  };

  Slick.prototype.setPosition = function () {
    var _ = this;

    _.setDimensions();

    _.setHeight();

    if (_.options.fade === false) {
      _.setCSS(_.getLeft(_.currentSlide));
    } else {
      _.setFade();
    }

    _.$slider.trigger('setPosition', [_]);
  };

  Slick.prototype.setProps = function () {
    var _ = this,
        bodyStyle = document.body.style;

    _.positionProp = _.options.vertical === true ? 'top' : 'left';

    if (_.positionProp === 'top') {
      _.$slider.addClass('slick-vertical');
    } else {
      _.$slider.removeClass('slick-vertical');
    }

    if (bodyStyle.WebkitTransition !== undefined || bodyStyle.MozTransition !== undefined || bodyStyle.msTransition !== undefined) {
      if (_.options.useCSS === true) {
        _.cssTransitions = true;
      }
    }

    if (_.options.fade) {
      if (typeof _.options.zIndex === 'number') {
        if (_.options.zIndex < 3) {
          _.options.zIndex = 3;
        }
      } else {
        _.options.zIndex = _.defaults.zIndex;
      }
    }

    if (bodyStyle.OTransform !== undefined) {
      _.animType = 'OTransform';
      _.transformType = '-o-transform';
      _.transitionType = 'OTransition';
      if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) _.animType = false;
    }

    if (bodyStyle.MozTransform !== undefined) {
      _.animType = 'MozTransform';
      _.transformType = '-moz-transform';
      _.transitionType = 'MozTransition';
      if (bodyStyle.perspectiveProperty === undefined && bodyStyle.MozPerspective === undefined) _.animType = false;
    }

    if (bodyStyle.webkitTransform !== undefined) {
      _.animType = 'webkitTransform';
      _.transformType = '-webkit-transform';
      _.transitionType = 'webkitTransition';
      if (bodyStyle.perspectiveProperty === undefined && bodyStyle.webkitPerspective === undefined) _.animType = false;
    }

    if (bodyStyle.msTransform !== undefined) {
      _.animType = 'msTransform';
      _.transformType = '-ms-transform';
      _.transitionType = 'msTransition';
      if (bodyStyle.msTransform === undefined) _.animType = false;
    }

    if (bodyStyle.transform !== undefined && _.animType !== false) {
      _.animType = 'transform';
      _.transformType = 'transform';
      _.transitionType = 'transition';
    }

    _.transformsEnabled = _.options.useTransform && _.animType !== null && _.animType !== false;
  };

  Slick.prototype.setSlideClasses = function (index) {
    var _ = this,
        centerOffset,
        allSlides,
        indexOffset,
        remainder;

    allSlides = _.$slider.find('.slick-slide').removeClass('slick-active slick-center slick-current').attr('aria-hidden', 'true');

    _.$slides.eq(index).addClass('slick-current');

    if (_.options.centerMode === true) {
      var evenCoef = _.options.slidesToShow % 2 === 0 ? 1 : 0;
      centerOffset = Math.floor(_.options.slidesToShow / 2);

      if (_.options.infinite === true) {
        if (index >= centerOffset && index <= _.slideCount - 1 - centerOffset) {
          _.$slides.slice(index - centerOffset + evenCoef, index + centerOffset + 1).addClass('slick-active').attr('aria-hidden', 'false');
        } else {
          indexOffset = _.options.slidesToShow + index;
          allSlides.slice(indexOffset - centerOffset + 1 + evenCoef, indexOffset + centerOffset + 2).addClass('slick-active').attr('aria-hidden', 'false');
        }

        if (index === 0) {
          allSlides.eq(allSlides.length - 1 - _.options.slidesToShow).addClass('slick-center');
        } else if (index === _.slideCount - 1) {
          allSlides.eq(_.options.slidesToShow).addClass('slick-center');
        }
      }

      _.$slides.eq(index).addClass('slick-center');
    } else {
      if (index >= 0 && index <= _.slideCount - _.options.slidesToShow) {
        _.$slides.slice(index, index + _.options.slidesToShow).addClass('slick-active').attr('aria-hidden', 'false');
      } else if (allSlides.length <= _.options.slidesToShow) {
        allSlides.addClass('slick-active').attr('aria-hidden', 'false');
      } else {
        remainder = _.slideCount % _.options.slidesToShow;
        indexOffset = _.options.infinite === true ? _.options.slidesToShow + index : index;

        if (_.options.slidesToShow == _.options.slidesToScroll && _.slideCount - index < _.options.slidesToShow) {
          allSlides.slice(indexOffset - (_.options.slidesToShow - remainder), indexOffset + remainder).addClass('slick-active').attr('aria-hidden', 'false');
        } else {
          allSlides.slice(indexOffset, indexOffset + _.options.slidesToShow).addClass('slick-active').attr('aria-hidden', 'false');
        }
      }
    }

    if (_.options.lazyLoad === 'ondemand' || _.options.lazyLoad === 'anticipated') {
      _.lazyLoad();
    }
  };

  Slick.prototype.setupInfinite = function () {
    var _ = this,
        i,
        slideIndex,
        infiniteCount;

    if (_.options.fade === true) {
      _.options.centerMode = false;
    }

    if (_.options.infinite === true && _.options.fade === false) {
      slideIndex = null;

      if (_.slideCount > _.options.slidesToShow) {
        if (_.options.centerMode === true) {
          infiniteCount = _.options.slidesToShow + 1;
        } else {
          infiniteCount = _.options.slidesToShow;
        }

        for (i = _.slideCount; i > _.slideCount - infiniteCount; i -= 1) {
          slideIndex = i - 1;
          $(_.$slides[slideIndex]).clone(true).attr('id', '').attr('data-slick-index', slideIndex - _.slideCount).prependTo(_.$slideTrack).addClass('slick-cloned');
        }

        for (i = 0; i < infiniteCount + _.slideCount; i += 1) {
          slideIndex = i;
          $(_.$slides[slideIndex]).clone(true).attr('id', '').attr('data-slick-index', slideIndex + _.slideCount).appendTo(_.$slideTrack).addClass('slick-cloned');
        }

        _.$slideTrack.find('.slick-cloned').find('[id]').each(function () {
          $(this).attr('id', '');
        });
      }
    }
  };

  Slick.prototype.interrupt = function (toggle) {
    var _ = this;

    if (!toggle) {
      _.autoPlay();
    }

    _.interrupted = toggle;
  };

  Slick.prototype.selectHandler = function (event) {
    var _ = this;

    var targetElement = $(event.target).is('.slick-slide') ? $(event.target) : $(event.target).parents('.slick-slide');
    var index = parseInt(targetElement.attr('data-slick-index'));
    if (!index) index = 0;

    if (_.slideCount <= _.options.slidesToShow) {
      _.slideHandler(index, false, true);

      return;
    }

    _.slideHandler(index);
  };

  Slick.prototype.slideHandler = function (index, sync, dontAnimate) {
    var targetSlide,
        animSlide,
        oldSlide,
        slideLeft,
        targetLeft = null,
        _ = this,
        navTarget;

    sync = sync || false;

    if (_.animating === true && _.options.waitForAnimate === true) {
      return;
    }

    if (_.options.fade === true && _.currentSlide === index) {
      return;
    }

    if (sync === false) {
      _.asNavFor(index);
    }

    targetSlide = index;
    targetLeft = _.getLeft(targetSlide);
    slideLeft = _.getLeft(_.currentSlide);
    _.currentLeft = _.swipeLeft === null ? slideLeft : _.swipeLeft;

    if (_.options.infinite === false && _.options.centerMode === false && (index < 0 || index > _.getDotCount() * _.options.slidesToScroll)) {
      if (_.options.fade === false) {
        targetSlide = _.currentSlide;

        if (dontAnimate !== true && _.slideCount > _.options.slidesToShow) {
          _.animateSlide(slideLeft, function () {
            _.postSlide(targetSlide);
          });
        } else {
          _.postSlide(targetSlide);
        }
      }

      return;
    } else if (_.options.infinite === false && _.options.centerMode === true && (index < 0 || index > _.slideCount - _.options.slidesToScroll)) {
      if (_.options.fade === false) {
        targetSlide = _.currentSlide;

        if (dontAnimate !== true && _.slideCount > _.options.slidesToShow) {
          _.animateSlide(slideLeft, function () {
            _.postSlide(targetSlide);
          });
        } else {
          _.postSlide(targetSlide);
        }
      }

      return;
    }

    if (_.options.autoplay) {
      clearInterval(_.autoPlayTimer);
    }

    if (targetSlide < 0) {
      if (_.slideCount % _.options.slidesToScroll !== 0) {
        animSlide = _.slideCount - _.slideCount % _.options.slidesToScroll;
      } else {
        animSlide = _.slideCount + targetSlide;
      }
    } else if (targetSlide >= _.slideCount) {
      if (_.slideCount % _.options.slidesToScroll !== 0) {
        animSlide = 0;
      } else {
        animSlide = targetSlide - _.slideCount;
      }
    } else {
      animSlide = targetSlide;
    }

    _.animating = true;

    _.$slider.trigger('beforeChange', [_, _.currentSlide, animSlide]);

    oldSlide = _.currentSlide;
    _.currentSlide = animSlide;

    _.setSlideClasses(_.currentSlide);

    if (_.options.asNavFor) {
      navTarget = _.getNavTarget();
      navTarget = navTarget.slick('getSlick');

      if (navTarget.slideCount <= navTarget.options.slidesToShow) {
        navTarget.setSlideClasses(_.currentSlide);
      }
    }

    _.updateDots();

    _.updateArrows();

    if (_.options.fade === true) {
      if (dontAnimate !== true) {
        _.fadeSlideOut(oldSlide);

        _.fadeSlide(animSlide, function () {
          _.postSlide(animSlide);
        });
      } else {
        _.postSlide(animSlide);
      }

      _.animateHeight();

      return;
    }

    if (dontAnimate !== true && _.slideCount > _.options.slidesToShow) {
      _.animateSlide(targetLeft, function () {
        _.postSlide(animSlide);
      });
    } else {
      _.postSlide(animSlide);
    }
  };

  Slick.prototype.startLoad = function () {
    var _ = this;

    if (_.options.arrows === true && _.slideCount > _.options.slidesToShow) {
      _.$prevArrow.hide();

      _.$nextArrow.hide();
    }

    if (_.options.dots === true && _.slideCount > _.options.slidesToShow) {
      _.$dots.hide();
    }

    _.$slider.addClass('slick-loading');
  };

  Slick.prototype.swipeDirection = function () {
    var xDist,
        yDist,
        r,
        swipeAngle,
        _ = this;

    xDist = _.touchObject.startX - _.touchObject.curX;
    yDist = _.touchObject.startY - _.touchObject.curY;
    r = Math.atan2(yDist, xDist);
    swipeAngle = Math.round(r * 180 / Math.PI);

    if (swipeAngle < 0) {
      swipeAngle = 360 - Math.abs(swipeAngle);
    }

    if (swipeAngle <= 45 && swipeAngle >= 0) {
      return _.options.rtl === false ? 'left' : 'right';
    }

    if (swipeAngle <= 360 && swipeAngle >= 315) {
      return _.options.rtl === false ? 'left' : 'right';
    }

    if (swipeAngle >= 135 && swipeAngle <= 225) {
      return _.options.rtl === false ? 'right' : 'left';
    }

    if (_.options.verticalSwiping === true) {
      if (swipeAngle >= 35 && swipeAngle <= 135) {
        return 'down';
      } else {
        return 'up';
      }
    }

    return 'vertical';
  };

  Slick.prototype.swipeEnd = function (event) {
    var _ = this,
        slideCount,
        direction;

    _.dragging = false;
    _.swiping = false;

    if (_.scrolling) {
      _.scrolling = false;
      return false;
    }

    _.interrupted = false;
    _.shouldClick = _.touchObject.swipeLength > 10 ? false : true;

    if (_.touchObject.curX === undefined) {
      return false;
    }

    if (_.touchObject.edgeHit === true) {
      _.$slider.trigger('edge', [_, _.swipeDirection()]);
    }

    if (_.touchObject.swipeLength >= _.touchObject.minSwipe) {
      direction = _.swipeDirection();

      switch (direction) {
        case 'left':
        case 'down':
          slideCount = _.options.swipeToSlide ? _.checkNavigable(_.currentSlide + _.getSlideCount()) : _.currentSlide + _.getSlideCount();
          _.currentDirection = 0;
          break;

        case 'right':
        case 'up':
          slideCount = _.options.swipeToSlide ? _.checkNavigable(_.currentSlide - _.getSlideCount()) : _.currentSlide - _.getSlideCount();
          _.currentDirection = 1;
          break;

        default:
      }

      if (direction != 'vertical') {
        _.slideHandler(slideCount);

        _.touchObject = {};

        _.$slider.trigger('swipe', [_, direction]);
      }
    } else {
      if (_.touchObject.startX !== _.touchObject.curX) {
        _.slideHandler(_.currentSlide);

        _.touchObject = {};
      }
    }
  };

  Slick.prototype.swipeHandler = function (event) {
    var _ = this;

    if (_.options.swipe === false || 'ontouchend' in document && _.options.swipe === false) {
      return;
    } else if (_.options.draggable === false && event.type.indexOf('mouse') !== -1) {
      return;
    }

    _.touchObject.fingerCount = event.originalEvent && event.originalEvent.touches !== undefined ? event.originalEvent.touches.length : 1;
    _.touchObject.minSwipe = _.listWidth / _.options.touchThreshold;

    if (_.options.verticalSwiping === true) {
      _.touchObject.minSwipe = _.listHeight / _.options.touchThreshold;
    }

    switch (event.data.action) {
      case 'start':
        _.swipeStart(event);

        break;

      case 'move':
        _.swipeMove(event);

        break;

      case 'end':
        _.swipeEnd(event);

        break;
    }
  };

  Slick.prototype.swipeMove = function (event) {
    var _ = this,
        edgeWasHit = false,
        curLeft,
        swipeDirection,
        swipeLength,
        positionOffset,
        touches,
        verticalSwipeLength;

    touches = event.originalEvent !== undefined ? event.originalEvent.touches : null;

    if (!_.dragging || _.scrolling || touches && touches.length !== 1) {
      return false;
    }

    curLeft = _.getLeft(_.currentSlide);
    _.touchObject.curX = touches !== undefined ? touches[0].pageX : event.clientX;
    _.touchObject.curY = touches !== undefined ? touches[0].pageY : event.clientY;
    _.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(_.touchObject.curX - _.touchObject.startX, 2)));
    verticalSwipeLength = Math.round(Math.sqrt(Math.pow(_.touchObject.curY - _.touchObject.startY, 2)));

    if (!_.options.verticalSwiping && !_.swiping && verticalSwipeLength > 4) {
      _.scrolling = true;
      return false;
    }

    if (_.options.verticalSwiping === true) {
      _.touchObject.swipeLength = verticalSwipeLength;
    }

    swipeDirection = _.swipeDirection();

    if (event.originalEvent !== undefined && _.touchObject.swipeLength > 4) {
      _.swiping = true;
      event.preventDefault();
    }

    positionOffset = (_.options.rtl === false ? 1 : -1) * (_.touchObject.curX > _.touchObject.startX ? 1 : -1);

    if (_.options.verticalSwiping === true) {
      positionOffset = _.touchObject.curY > _.touchObject.startY ? 1 : -1;
    }

    swipeLength = _.touchObject.swipeLength;
    _.touchObject.edgeHit = false;

    if (_.options.infinite === false) {
      if (_.currentSlide === 0 && swipeDirection === 'right' || _.currentSlide >= _.getDotCount() && swipeDirection === 'left') {
        swipeLength = _.touchObject.swipeLength * _.options.edgeFriction;
        _.touchObject.edgeHit = true;
      }
    }

    if (_.options.vertical === false) {
      _.swipeLeft = curLeft + swipeLength * positionOffset;
    } else {
      _.swipeLeft = curLeft + swipeLength * (_.$list.height() / _.listWidth) * positionOffset;
    }

    if (_.options.verticalSwiping === true) {
      _.swipeLeft = curLeft + swipeLength * positionOffset;
    }

    if (_.options.fade === true || _.options.touchMove === false) {
      return false;
    }

    if (_.animating === true) {
      _.swipeLeft = null;
      return false;
    }

    _.setCSS(_.swipeLeft);
  };

  Slick.prototype.swipeStart = function (event) {
    var _ = this,
        touches;

    _.interrupted = true;

    if (_.touchObject.fingerCount !== 1 || _.slideCount <= _.options.slidesToShow) {
      _.touchObject = {};
      return false;
    }

    if (event.originalEvent !== undefined && event.originalEvent.touches !== undefined) {
      touches = event.originalEvent.touches[0];
    }

    _.touchObject.startX = _.touchObject.curX = touches !== undefined ? touches.pageX : event.clientX;
    _.touchObject.startY = _.touchObject.curY = touches !== undefined ? touches.pageY : event.clientY;
    _.dragging = true;
  };

  Slick.prototype.unfilterSlides = Slick.prototype.slickUnfilter = function () {
    var _ = this;

    if (_.$slidesCache !== null) {
      _.unload();

      _.$slideTrack.children(this.options.slide).detach();

      _.$slidesCache.appendTo(_.$slideTrack);

      _.reinit();
    }
  };

  Slick.prototype.unload = function () {
    var _ = this;

    $('.slick-cloned', _.$slider).remove();

    if (_.$dots) {
      _.$dots.remove();
    }

    if (_.$prevArrow && _.htmlExpr.test(_.options.prevArrow)) {
      _.$prevArrow.remove();
    }

    if (_.$nextArrow && _.htmlExpr.test(_.options.nextArrow)) {
      _.$nextArrow.remove();
    }

    _.$slides.removeClass('slick-slide slick-active slick-visible slick-current').attr('aria-hidden', 'true').css('width', '');
  };

  Slick.prototype.unslick = function (fromBreakpoint) {
    var _ = this;

    _.$slider.trigger('unslick', [_, fromBreakpoint]);

    _.destroy();
  };

  Slick.prototype.updateArrows = function () {
    var _ = this,
        centerOffset;

    centerOffset = Math.floor(_.options.slidesToShow / 2);

    if (_.options.arrows === true && _.slideCount > _.options.slidesToShow && !_.options.infinite) {
      _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

      _.$nextArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');

      if (_.currentSlide === 0) {
        _.$prevArrow.addClass('slick-disabled').attr('aria-disabled', 'true');

        _.$nextArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');
      } else if (_.currentSlide >= _.slideCount - _.options.slidesToShow && _.options.centerMode === false) {
        _.$nextArrow.addClass('slick-disabled').attr('aria-disabled', 'true');

        _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');
      } else if (_.currentSlide >= _.slideCount - 1 && _.options.centerMode === true) {
        _.$nextArrow.addClass('slick-disabled').attr('aria-disabled', 'true');

        _.$prevArrow.removeClass('slick-disabled').attr('aria-disabled', 'false');
      }
    }
  };

  Slick.prototype.updateDots = function () {
    var _ = this;

    if (_.$dots !== null) {
      _.$dots.find('li').removeClass('slick-active').end();

      _.$dots.find('li').eq(Math.floor(_.currentSlide / _.options.slidesToScroll)).addClass('slick-active');
    }
  };

  Slick.prototype.visibility = function () {
    var _ = this;

    if (_.options.autoplay) {
      if (document[_.hidden]) {
        _.interrupted = true;
      } else {
        _.interrupted = false;
      }
    }
  };

  $.fn.slick = function () {
    var _ = this,
        opt = arguments[0],
        args = Array.prototype.slice.call(arguments, 1),
        l = _.length,
        i,
        ret;

    for (i = 0; i < l; i++) {
      if (_typeof(opt) == 'object' || typeof opt == 'undefined') _[i].slick = new Slick(_[i], opt);else ret = _[i].slick[opt].apply(_[i].slick, args);
      if (typeof ret != 'undefined') return ret;
    }

    return _;
  };
});