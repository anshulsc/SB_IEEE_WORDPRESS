/*! ally.js - v1.4.1 - https://allyjs.io/ - MIT License */
!(function (e) {
    if ("object" == typeof exports && "undefined" != typeof module) module.exports = e();
    else if ("function" == typeof define && define.amd) define([], e);
    else {
        var t;
        (t = "undefined" != typeof window ? window : "undefined" != typeof global ? global : "undefined" != typeof self ? self : this), (t.ally = e());
    }
})(function () {
    var e;
    return (function t(e, n, r) {
        function i(a, u) {
            if (!n[a]) {
                if (!e[a]) {
                    var s = "function" == typeof require && require;
                    if (!u && s) return s(a, !0);
                    if (o) return o(a, !0);
                    var l = new Error("Cannot find module '" + a + "'");
                    throw ((l.code = "MODULE_NOT_FOUND"), l);
                }
                var c = (n[a] = { exports: {} });
                e[a][0].call(
                    c.exports,
                    function (t) {
                        var n = e[a][1][t];
                        return i(n ? n : t);
                    },
                    c,
                    c.exports,
                    t,
                    e,
                    n,
                    r
                );
            }
            return n[a].exports;
        }
        for (var o = "function" == typeof require && require, a = 0; a < r.length; a++) i(r[a]);
        return i;
    })(
        {
            1: [
                function (e, t) {
                    "use strict";
                    function n(e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
                    }
                    function r(e) {
                        return e && "object" === ("undefined" == typeof e ? "undefined" : ft(e)) && "default" in e ? e["default"] : e;
                    }
                    function i() {
                        var e = { activeElement: document.activeElement, windowScrollTop: window.scrollTop, windowScrollLeft: window.scrollLeft, bodyScrollTop: document.body.scrollTop, bodyScrollLeft: document.body.scrollLeft },
                            t = document.createElement("iframe");
                        t.setAttribute("style", "position:absolute; position:fixed; top:0; left:-2px; width:1px; height:1px; overflow:hidden;"),
                            t.setAttribute("aria-live", "off"),
                            t.setAttribute("aria-busy", "true"),
                            t.setAttribute("aria-hidden", "true"),
                            document.body.appendChild(t);
                        var n = t.contentWindow,
                            r = n.document;
                        r.open(), r.close();
                        var i = r.createElement("div");
                        return r.body.appendChild(i), (e.iframe = t), (e.wrapper = i), (e.window = n), (e.document = r), e;
                    }
                    function o(e, t) {
                        e.wrapper.innerHTML = "";
                        var n = "string" == typeof t.element ? e.document.createElement(t.element) : t.element(e.wrapper, e.document),
                            r = t.mutate && t.mutate(n, e.wrapper, e.document);
                        return r || r === !1 || (r = n), !n.parentNode && e.wrapper.appendChild(n), r && r.focus && r.focus(), t.validate ? t.validate(n, r, e.document) : e.document.activeElement === r;
                    }
                    function a(e) {
                        e.activeElement === document.body
                            ? (document.activeElement && document.activeElement.blur && document.activeElement.blur(), Et.is.IE10 && document.body.focus())
                            : e.activeElement && e.activeElement.focus && e.activeElement.focus(),
                            document.body.removeChild(e.iframe),
                            (window.scrollTop = e.windowScrollTop),
                            (window.scrollLeft = e.windowScrollLeft),
                            (document.body.scrollTop = e.bodyScrollTop),
                            (document.body.scrollLeft = e.bodyScrollLeft);
                    }
                    function u(e) {
                        var t = void 0;
                        try {
                            (t = window.localStorage && window.localStorage.getItem(e)), (t = t ? JSON.parse(t) : {});
                        } catch (n) {
                            t = {};
                        }
                        return t;
                    }
                    function s(e, t) {
                        if (document.hasFocus())
                            try {
                                window.localStorage && window.localStorage.setItem(e, JSON.stringify(t));
                            } catch (n) {}
                        else
                            try {
                                window.localStorage && window.localStorage.removeItem(e);
                            } catch (n) {}
                    }
                    function l() {
                        var e = document.createElement("div");
                        return (e.innerHTML = '<svg><foreignObject width="30" height="30">\n      <input type="text"/>\n  </foreignObject></svg>'), e.firstChild.firstChild;
                    }
                    function c(e) {
                        return '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">' + e + "</svg>";
                    }
                    function d(e) {
                        if (!e.focus)
                            try {
                                HTMLElement.prototype.focus.call(e);
                            } catch (t) {
                                xn(e);
                            }
                    }
                    function f(e, t, n) {
                        return d(t), n.activeElement === t;
                    }
                    function m() {
                        var e = Ft(Pn);
                        return (
                            Object.keys(_n).forEach(function (t) {
                                e[t] = _n[t]();
                            }),
                            e
                        );
                    }
                    function b() {
                        zn.warn("trying to focus inert element", this);
                    }
                    function v(e, t) {
                        if (t) {
                            var n = jn(e);
                            $n({ element: e, attribute: "tabindex", temporaryValue: "-1", saveValue: null !== n ? n : "" });
                        } else $n({ element: e, attribute: "tabindex" });
                    }
                    function h(e, t) {
                        Zn({ element: e, attribute: "controls", remove: t });
                    }
                    function g(e, t) {
                        $n({ element: e, attribute: "focusable", temporaryValue: t ? "false" : void 0 });
                    }
                    function p(e, t) {
                        Zn({ element: e, attribute: "xlink:href", remove: t });
                    }
                    function x(e, t) {
                        $n({ element: e, attribute: "aria-disabled", temporaryValue: t ? "true" : void 0 });
                    }
                    function y(e, t) {
                        t ? (e.focus = b) : delete e.focus;
                    }
                    function w(e, t) {
                        if (t) {
                            var n = e.style.pointerEvents || "";
                            e.setAttribute("data-inert-pointer-events", n), (e.style.pointerEvents = "none");
                        } else {
                            var r = e.getAttribute("data-inert-pointer-events");
                            e.removeAttribute("data-inert-pointer-events"), (e.style.pointerEvents = r);
                        }
                    }
                    function E(e, t) {
                        x(e, t), v(e, t), y(e, t), w(e, t);
                        var n = e.nodeName.toLowerCase();
                        ("video" === n || "audio" === n) && h(e, t),
                            ("svg" === n || e.ownerSVGElement) && (Jn.focusSvgFocusableAttribute ? g(e, t) : Jn.focusSvgTabindexAttribute || "a" !== n || p(e, t)),
                            t ? e.setAttribute("data-ally-disabled", "true") : e.removeAttribute("data-ally-disabled");
                    }
                    function S(e) {
                        er.some(function (t) {
                            return e[t] ? ((tr = t), !0) : !1;
                        });
                    }
                    function T(e, t) {
                        return tr || S(e), e[tr](t);
                    }
                    function A(e) {
                        var t = e.webkitUserModify || "";
                        return Boolean(t && -1 !== t.indexOf("write"));
                    }
                    function O(e) {
                        return [e.getPropertyValue("overflow"), e.getPropertyValue("overflow-x"), e.getPropertyValue("overflow-y")].some(function (e) {
                            return "auto" === e || "scroll" === e;
                        });
                    }
                    function C(e) {
                        return e.display.indexOf("flex") > -1;
                    }
                    function I(e, t, n, r) {
                        return "div" !== t && "span" !== t ? !1 : n && "div" !== n && "span" !== n && !O(r) ? !1 : e.offsetHeight < e.scrollHeight || e.offsetWidth < e.scrollWidth;
                    }
                    function L() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.context,
                            n = e.except,
                            r = void 0 === n ? { flexbox: !1, scrollable: !1, shadow: !1 } : n;
                        nr || (nr = Bn());
                        var i = ht({ label: "is/focus-relevant", resolveDocument: !0, context: t });
                        if (!r.shadow && i.shadowRoot) return !0;
                        var o = i.nodeName.toLowerCase();
                        if ("input" === o && "hidden" === i.type) return !1;
                        if ("input" === o || "select" === o || "button" === o || "textarea" === o) return !0;
                        if ("legend" === o && nr.focusRedirectLegend) return !0;
                        if ("label" === o) return !0;
                        if ("area" === o) return !0;
                        if ("a" === o && i.hasAttribute("href")) return !0;
                        if ("object" === o && i.hasAttribute("usemap")) return !1;
                        if ("object" === o) {
                            var a = i.getAttribute("type");
                            if (!nr.focusObjectSvg && "image/svg+xml" === a) return !1;
                            if (!nr.focusObjectSwf && "application/x-shockwave-flash" === a) return !1;
                        }
                        if ("iframe" === o || "object" === o) return !0;
                        if ("embed" === o || "keygen" === o) return !0;
                        if (i.hasAttribute("contenteditable")) return !0;
                        if ("audio" === o && (nr.focusAudioWithoutControls || i.hasAttribute("controls"))) return !0;
                        if ("video" === o && (nr.focusVideoWithoutControls || i.hasAttribute("controls"))) return !0;
                        if (nr.focusSummary && "summary" === o) return !0;
                        var u = Hn(i);
                        if ("img" === o && i.hasAttribute("usemap")) return (u && nr.focusImgUsemapTabindex) || nr.focusRedirectImgUsemap;
                        if (nr.focusTable && ("table" === o || "td" === o)) return !0;
                        if (nr.focusFieldset && "fieldset" === o) return !0;
                        var s = "svg" === o,
                            l = i.ownerSVGElement,
                            c = i.getAttribute("focusable"),
                            d = jn(i);
                        if ("use" === o && null !== d && !nr.focusSvgUseTabindex) return !1;
                        if ("foreignobject" === o) return null !== d && nr.focusSvgForeignobjectTabindex;
                        if (T(i, "svg a") && i.hasAttribute("xlink:href")) return !0;
                        if ((s || l) && i.focus && !nr.focusSvgNegativeTabindexAttribute && 0 > d) return !1;
                        if (s) return u || nr.focusSvg || nr.focusSvgInIframe || Boolean(nr.focusSvgFocusableAttribute && c && "true" === c);
                        if (l) {
                            if (nr.focusSvgTabindexAttribute && u) return !0;
                            if (nr.focusSvgFocusableAttribute) return "true" === c;
                        }
                        if (u) return !0;
                        var f = window.getComputedStyle(i, null);
                        if (A(f)) return !0;
                        if (nr.focusImgIsmap && "img" === o && i.hasAttribute("ismap")) {
                            var m = Yn({ context: i }).some(function (e) {
                                return "a" === e.nodeName.toLowerCase() && e.hasAttribute("href");
                            });
                            if (m) return !0;
                        }
                        if (!r.scrollable && nr.focusScrollContainer)
                            if (nr.focusScrollContainerWithoutOverflow) {
                                if (I(i, o)) return !0;
                            } else if (O(f)) return !0;
                        if (!r.flexbox && nr.focusFlexboxContainer && C(f)) return !0;
                        var b = i.parentElement;
                        if (!r.scrollable && b) {
                            var v = b.nodeName.toLowerCase(),
                                h = window.getComputedStyle(b, null);
                            if (nr.focusScrollBody && I(b, o, v, h)) return !0;
                            if (nr.focusChildrenOfFocusableFlexbox && C(h)) return !0;
                        }
                        return !1;
                    }
                    function N(e, t) {
                        if (e.findIndex) return e.findIndex(t);
                        var n = e.length;
                        if (0 === n) return -1;
                        for (var r = 0; n > r; r++) if (t(e[r], r, e)) return r;
                        return -1;
                    }
                    function M(e) {
                        if ((ur || (ur = ar("object, iframe")), void 0 !== e._frameElement)) return e._frameElement;
                        e._frameElement = null;
                        var t = e.parent.document.querySelectorAll(ur);
                        return (
                            [].some.call(t, function (t) {
                                var n = ir(t);
                                return n !== e.document ? !1 : ((e._frameElement = t), !0);
                            }),
                            e._frameElement
                        );
                    }
                    function k(e) {
                        var t = yt(e);
                        if (!t.parent || t.parent === t) return null;
                        try {
                            return t.frameElement || M(t);
                        } catch (n) {
                            return null;
                        }
                    }
                    function _(e, t) {
                        return window.getComputedStyle(e, null).getPropertyValue(t);
                    }
                    function P(e) {
                        return e.some(function (e) {
                            return "none" === _(e, "display");
                        });
                    }
                    function F(e) {
                        var t = N(e, function (e) {
                            var t = _(e, "visibility");
                            return "hidden" === t || "collapse" === t;
                        });
                        if (-1 === t) return !1;
                        var n = N(e, function (e) {
                            return "visible" === _(e, "visibility");
                        });
                        return -1 === n ? !0 : n > t ? !0 : !1;
                    }
                    function B(e) {
                        var t = 1;
                        return (
                            "summary" === e[0].nodeName.toLowerCase() && (t = 2),
                            e.slice(t).some(function (e) {
                                return "details" === e.nodeName.toLowerCase() && e.open === !1;
                            })
                        );
                    }
                    function D() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.context,
                            n = e.except,
                            r = void 0 === n ? { notRendered: !1, cssDisplay: !1, cssVisibility: !1, detailsElement: !1, browsingContext: !1 } : n,
                            i = ht({ label: "is/visible", resolveDocument: !0, context: t }),
                            o = i.nodeName.toLowerCase();
                        if (!r.notRendered && sr.test(o)) return !0;
                        var a = Yn({ context: i }),
                            u = "audio" === o && !i.hasAttribute("controls");
                        if (!r.cssDisplay && P(u ? a.slice(1) : a)) return !1;
                        if (!r.cssVisibility && F(a)) return !1;
                        if (!r.detailsElement && B(a)) return !1;
                        if (!r.browsingContext) {
                            var s = k(i),
                                l = D.except(r);
                            if (s && !l(s)) return !1;
                        }
                        return !0;
                    }
                    function R(e, t) {
                        var n = t.querySelector('map[name="' + bt(e) + '"]');
                        return n || null;
                    }
                    function W(e) {
                        var t = e.getAttribute("usemap");
                        if (!t) return null;
                        var n = pt(e);
                        return R(t.slice(1), n);
                    }
                    function H(e) {
                        var t = e.parentElement;
                        if (!t.name || "map" !== t.nodeName.toLowerCase()) return null;
                        var n = pt(e);
                        return n.querySelector('img[usemap="#' + bt(t.name) + '"]') || null;
                    }
                    function j(e) {
                        var t = e.nodeName.toLowerCase();
                        return "fieldset" === t && e.disabled;
                    }
                    function q(e) {
                        var t = e.nodeName.toLowerCase();
                        return "form" === t && e.disabled;
                    }
                    function G() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.context,
                            n = e.except,
                            r = void 0 === n ? { onlyFocusableBrowsingContext: !1, visible: !1 } : n,
                            i = ht({ label: "is/only-tabbable", resolveDocument: !0, context: t });
                        if (!r.visible && !lr(i)) return !1;
                        if (!r.onlyFocusableBrowsingContext && (Et.is.GECKO || Et.is.TRIDENT || Et.is.EDGE)) {
                            var o = k(i);
                            if (o && jn(o) < 0) return !1;
                        }
                        var a = i.nodeName.toLowerCase(),
                            u = jn(i);
                        return "label" === a && Et.is.GECKO ? null !== u && u >= 0 : Et.is.GECKO && i.ownerSVGElement && !i.focus && "a" === a && i.hasAttribute("xlink:href") && Et.is.GECKO ? !0 : !1;
                    }
                    function K(e) {
                        var t = e.nodeName.toLowerCase();
                        if ("embed" === t || "keygen" === t) return !0;
                        var n = jn(e);
                        if (e.shadowRoot && null === n) return !0;
                        if ("label" === t) return !vr.focusLabelTabindex || null === n;
                        if ("legend" === t) return null === n;
                        if (vr.focusSvgFocusableAttribute && (e.ownerSVGElement || "svg" === t)) {
                            var r = e.getAttribute("focusable");
                            return r && "false" === r;
                        }
                        return "img" === t && e.hasAttribute("usemap") ? null === n || !vr.focusImgUsemapTabindex : "area" === t ? !dr(e) : !1;
                    }
                    function V() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.context,
                            n = e.except,
                            r = void 0 === n ? { disabled: !1, visible: !1, onlyTabbable: !1 } : n;
                        vr || (vr = Bn());
                        var i = br.rules.except({ onlyFocusableBrowsingContext: !0, visible: r.visible }),
                            o = ht({ label: "is/focusable", resolveDocument: !0, context: t }),
                            a = rr.rules({ context: o, except: r });
                        if (!a || K(o)) return !1;
                        if (!r.disabled && mr(o)) return !1;
                        if (!r.onlyTabbable && i(o)) return !1;
                        if (!r.visible) {
                            var u = { context: o, except: {} };
                            if ((vr.focusInHiddenIframe && (u.except.browsingContext = !0), vr.focusObjectSvgHidden)) {
                                var s = o.nodeName.toLowerCase();
                                "object" === s && (u.except.cssVisibility = !0);
                            }
                            if (!lr.rules(u)) return !1;
                        }
                        var l = k(o);
                        if (l) {
                            var c = l.nodeName.toLowerCase();
                            if (!("object" !== c || vr.focusInZeroDimensionObject || (l.offsetWidth && l.offsetHeight))) return !1;
                        }
                        var d = o.nodeName.toLowerCase();
                        return "svg" === d && vr.focusSvgInIframe && !l && null === o.getAttribute("tabindex") ? !1 : !0;
                    }
                    function Z(e) {
                        var t = function (t) {
                            return t.shadowRoot ? NodeFilter.FILTER_ACCEPT : e(t) ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_SKIP;
                        };
                        return (t.acceptNode = t), t;
                    }
                    function $() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.context,
                            n = e.includeContext,
                            r = e.includeOnlyTabbable,
                            i = e.strategy;
                        t || (t = document.documentElement);
                        for (var o = hr.rules.except({ onlyTabbable: r }), a = pt(t), u = a.createTreeWalker(t, NodeFilter.SHOW_ELEMENT, "all" === i ? gr : Z(o), !1), s = []; u.nextNode(); )
                            u.currentNode.shadowRoot ? (o(u.currentNode) && s.push(u.currentNode), (s = s.concat($({ context: u.currentNode.shadowRoot, includeOnlyTabbable: r, strategy: i })))) : s.push(u.currentNode);
                        return n && ("all" === i ? rr(t) && s.unshift(t) : o(t) && s.unshift(t)), s;
                    }
                    function U() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.context,
                            n = e.includeContext,
                            r = e.includeOnlyTabbable,
                            i = yr(),
                            o = t.querySelectorAll(i),
                            a = hr.rules.except({ onlyTabbable: r }),
                            u = [].filter.call(o, a);
                        return n && a(t) && u.unshift(t), u;
                    }
                    function X() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.context,
                            n = e.except,
                            r = void 0 === n ? { flexbox: !1, scrollable: !1, shadow: !1, visible: !1, onlyTabbable: !1 } : n;
                        Er || (Er = Bn());
                        var i = ht({ label: "is/tabbable", resolveDocument: !0, context: t });
                        if (Et.is.BLINK && Et.is.ANDROID && Et.majorVersion > 42) return !1;
                        var o = k(i);
                        if (o) {
                            if (Et.is.WEBKIT && Et.is.IOS) return !1;
                            if (jn(o) < 0) return !1;
                            if (!r.visible && (Et.is.BLINK || Et.is.WEBKIT) && !lr(o)) return !1;
                            var a = o.nodeName.toLowerCase();
                            if ("object" === a) {
                                var u = ("Chrome" === Et.name && Et.majorVersion >= 54) || ("Opera" === Et.name && Et.majorVersion >= 41);
                                if (Et.is.WEBKIT || (Et.is.BLINK && !u)) return !1;
                            }
                        }
                        var s = i.nodeName.toLowerCase(),
                            l = jn(i),
                            c = null === l ? null : l >= 0;
                        if (Et.is.EDGE && Et.majorVersion >= 14 && o && i.ownerSVGElement && 0 > l) return !0;
                        var d = c !== !1,
                            f = null !== l && l >= 0;
                        if (i.hasAttribute("contenteditable")) return d;
                        if (Sr.test(s) && c !== !0) return !1;
                        if (Et.is.WEBKIT && Et.is.IOS) {
                            var m = ("input" === s && "text" === i.type) || "password" === i.type || "select" === s || "textarea" === s || i.hasAttribute("contenteditable");
                            if (!m) {
                                var b = window.getComputedStyle(i, null);
                                m = A(b);
                            }
                            if (!m) return !1;
                        }
                        if ("use" === s && null !== l && (Et.is.BLINK || (Et.is.WEBKIT && 9 === Et.majorVersion))) return !0;
                        if (T(i, "svg a") && i.hasAttribute("xlink:href")) {
                            if (d) return !0;
                            if (i.focus && !Er.focusSvgNegativeTabindexAttribute) return !0;
                        }
                        if ("svg" === s && Er.focusSvgInIframe && d) return !0;
                        if (Et.is.TRIDENT || Et.is.EDGE) {
                            if ("svg" === s) return Er.focusSvg ? !0 : i.hasAttribute("focusable") || f;
                            if (i.ownerSVGElement) return Er.focusSvgTabindexAttribute && f ? !0 : i.hasAttribute("focusable");
                        }
                        if (void 0 === i.tabIndex) return Boolean(r.onlyTabbable);
                        if ("audio" === s) {
                            if (!i.hasAttribute("controls")) return !1;
                            if (Et.is.BLINK) return !0;
                        }
                        if ("video" === s)
                            if (i.hasAttribute("controls")) {
                                if (Et.is.BLINK || Et.is.GECKO) return !0;
                            } else if (Et.is.TRIDENT || Et.is.EDGE) return !1;
                        if ("object" === s && (Et.is.BLINK || Et.is.WEBKIT)) return !1;
                        if ("iframe" === s) return !1;
                        if (!r.scrollable && Et.is.GECKO) {
                            var v = window.getComputedStyle(i, null);
                            if (O(v)) return d;
                        }
                        if (Et.is.TRIDENT || Et.is.EDGE) {
                            if ("area" === s) {
                                var h = H(i);
                                if (h && jn(h) < 0) return !1;
                            }
                            var g = window.getComputedStyle(i, null);
                            if (A(g)) return i.tabIndex >= 0;
                            if (!r.flexbox && C(g)) return null !== l ? f : Tr(i) && Ar(i);
                            if (I(i, s)) return !1;
                            var p = i.parentElement;
                            if (p) {
                                var x = p.nodeName.toLowerCase(),
                                    y = window.getComputedStyle(p, null);
                                if (I(p, s, x, y)) return !1;
                                if (C(y)) return f;
                            }
                        }
                        return i.tabIndex >= 0;
                    }
                    function z(e, t) {
                        return e.compareDocumentPosition(t) & Node.DOCUMENT_POSITION_FOLLOWING ? -1 : 1;
                    }
                    function J(e, t) {
                        return N(e, function (e) {
                            return t.compareDocumentPosition(e) & Node.DOCUMENT_POSITION_FOLLOWING;
                        });
                    }
                    function Q(e, t, n) {
                        var r = [];
                        return (
                            t.forEach(function (t) {
                                var i = !0,
                                    o = e.indexOf(t);
                                -1 === o && ((o = J(e, t)), (i = !1)), -1 === o && (o = e.length);
                                var a = vt(n ? n(t) : t);
                                a.length && r.push({ offset: o, replace: i, elements: a });
                            }),
                            r
                        );
                    }
                    function Y(e, t) {
                        var n = 0;
                        t.sort(function (e, t) {
                            return e.offset - t.offset;
                        }),
                            t.forEach(function (t) {
                                var r = t.replace ? 1 : 0,
                                    i = [t.offset + n, r].concat(t.elements);
                                e.splice.apply(e, i), (n += t.elements.length - r);
                            });
                    }
                    function ee(e) {
                        var t = e.nodeName.toLowerCase();
                        return "input" === t || "textarea" === t || "select" === t || "button" === t;
                    }
                    function te(e, t) {
                        var n = e.getAttribute("for");
                        return n ? t.getElementById(n) : e.querySelector("input, select, textarea");
                    }
                    function ne(e) {
                        var t = e.parentNode,
                            n = wr({ context: t, strategy: "strict" });
                        return n.filter(ee)[0] || null;
                    }
                    function re(e, t) {
                        var n = Cr({ context: t.body, strategy: "strict" });
                        if (!n.length) return null;
                        var r = Lr({ list: n, elements: [e] }),
                            i = r.indexOf(e);
                        return i === r.length - 1 ? null : r[i + 1];
                    }
                    function ie(e, t) {
                        if (!Nr.focusRedirectLegend) return null;
                        var n = e.parentNode;
                        return "fieldset" !== n.nodeName.toLowerCase() ? null : "tabbable" === Nr.focusRedirectLegend ? re(e, t) : ne(e, t);
                    }
                    function oe(e) {
                        if (!Nr.focusRedirectImgUsemap) return null;
                        var t = W(e);
                        return (t && t.querySelector("area")) || null;
                    }
                    function ae(e) {
                        var t = Yn({ context: e }),
                            n = t.slice(1).map(function (e) {
                                return { element: e, scrollTop: e.scrollTop, scrollLeft: e.scrollLeft };
                            });
                        return function () {
                            n.forEach(function (e) {
                                (e.element.scrollTop = e.scrollTop), (e.element.scrollLeft = e.scrollLeft);
                            });
                        };
                    }
                    function ue(e) {
                        if (e.focus) return e.focus(), xt(e) ? e : null;
                        var t = yt(e);
                        try {
                            return t.HTMLElement.prototype.focus.call(e), xt(e) ? e : null;
                        } catch (n) {
                            var r = xn(e);
                            return r && xt(e) ? e : null;
                        }
                    }
                    function se() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.force;
                        t ? (this.instances = 0) : this.instances--, this.instances || (this.disengage(), (this._result = null));
                    }
                    function le() {
                        return this.instances ? (this.instances++, this._result) : (this.instances++, (this._result = this.engage() || {}), (this._result.disengage = se.bind(this)), this._result);
                    }
                    function ce() {}
                    function de() {
                        if (document.activeElement) {
                            if (document.activeElement !== Wr) {
                                var e = new Dr("active-element", { bubbles: !1, cancelable: !1, detail: { focus: document.activeElement, blur: Wr } });
                                document.dispatchEvent(e), (Wr = document.activeElement);
                            }
                        } else document.body.focus();
                        Hr !== !1 && (Hr = requestAnimationFrame(de));
                    }
                    function fe() {
                        (Hr = !0), (Wr = document.activeElement), de();
                    }
                    function me() {
                        cancelAnimationFrame(Hr), (Hr = !1);
                    }
                    function be() {
                        for (var e = [document.activeElement]; e[0] && e[0].shadowRoot; ) e.unshift(e[0].shadowRoot.activeElement);
                        return e;
                    }
                    function ve() {
                        var e = Gr({ context: document.activeElement });
                        return [document.activeElement].concat(e);
                    }
                    function he() {
                        this.context && (this.context.forEach(this.disengage), (this.context = null), (this.engage = null), (this.disengage = null));
                    }
                    function ge() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.context;
                        return (this.context = vt(t || document)), this.context.forEach(this.engage), { disengage: he.bind(this) };
                    }
                    function pe() {}
                    function xe() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.parent,
                            n = e.element,
                            r = e.includeSelf;
                        if (t)
                            return function (e) {
                                return Boolean((r && e === t) || t.compareDocumentPosition(e) & Node.DOCUMENT_POSITION_CONTAINED_BY);
                            };
                        if (n)
                            return function (e) {
                                return Boolean((r && n === e) || e.compareDocumentPosition(n) & Node.DOCUMENT_POSITION_CONTAINED_BY);
                            };
                        throw new TypeError("util/compare-position#getParentComparator required either options.parent or options.element");
                    }
                    function ye(e) {
                        var t = e.context,
                            n = e.filter,
                            r = function (e) {
                                var t = xe({ parent: e });
                                return n.some(t);
                            },
                            i = [],
                            o = function (e) {
                                return n.some(function (t) {
                                    return e === t;
                                })
                                    ? NodeFilter.FILTER_REJECT
                                    : r(e)
                                    ? NodeFilter.FILTER_ACCEPT
                                    : (i.push(e), NodeFilter.FILTER_REJECT);
                            };
                        o.acceptNode = o;
                        for (var a = pt(t), u = a.createTreeWalker(t, NodeFilter.SHOW_ELEMENT, o, !1); u.nextNode(); );
                        return i;
                    }
                    function we() {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = e.context,
                            n = ht({ label: "query/shadow-hosts", resolveDocument: !0, defaultToDocument: !0, context: t }),
                            r = pt(t),
                            i = r.createTreeWalker(n, NodeFilter.SHOW_ELEMENT, mi, !1),
                            o = [];
                        for (n.shadowRoot && (o.push(n), (o = o.concat(we({ context: n.shadowRoot })))); i.nextNode(); ) o.push(i.currentNode), (o = o.concat(we({ context: i.currentNode.shadowRoot })));
                        return o;
                    }
                    function Ee(e) {
                        return Qn(e, !0);
                    }
                    function Se(e) {
                        return Qn(e, !1);
                    }
                    function Te(e) {
                        $n({ element: e, attribute: "aria-hidden", temporaryValue: "true" });
                    }
                    function Ae(e) {
                        $n({ element: e, attribute: "aria-hidden" });
                    }
                    function Oe(e, t) {
                        var n = e.indexOf(t);
                        if (n > 0) {
                            var r = e.splice(n, 1);
                            return r.concat(e);
                        }
                        return e;
                    }
                    function Ce(e, t) {
                        return Ii.tabsequenceAreaAtImgPosition && (e = Ti(e, t)), (e = Ci(e));
                    }
                    function Ie(e) {
                        var t = e ? null : !1;
                        return { altKey: t, ctrlKey: t, metaKey: t, shiftKey: t };
                    }
                    function Le(e) {
                        var t = -1 !== e.indexOf("*"),
                            n = Ie(t);
                        return (
                            e.forEach(function (e) {
                                if ("*" !== e) {
                                    var t = !0,
                                        r = e.slice(0, 1);
                                    "?" === r ? (t = null) : "!" === r && (t = !1), t !== !0 && (e = e.slice(1));
                                    var i = Ri[e];
                                    if (!i) throw new TypeError('Unknown modifier "' + e + '"');
                                    n[i] = t;
                                }
                            }),
                            n
                        );
                    }
                    function Ne(e) {
                        var t = Ni[e] || parseInt(e, 10);
                        if (!t || "number" != typeof t || isNaN(t)) throw new TypeError('Unknown key "' + e + '"');
                        return [t].concat(Ni._alias[t] || []);
                    }
                    function Me(e, t) {
                        return !Wi.some(function (n) {
                            return "boolean" == typeof e[n] && Boolean(t[n]) !== e[n];
                        });
                    }
                    function ke() {
                        (Zi = 0), ($i = 0);
                    }
                    function _e(e) {
                        e.isPrimary !== !1 && Zi++;
                    }
                    function Pe(e) {
                        return e.isPrimary !== !1
                            ? e.touches
                                ? void (Zi = e.touches.length)
                                : void (window.setImmediate || window.setTimeout)(function () {
                                      Zi = Math.max(Zi - 1, 0);
                                  })
                            : void 0;
                    }
                    function Fe(e) {
                        switch (e.keyCode || e.which) {
                            case 16:
                            case 17:
                            case 18:
                            case 91:
                            case 93:
                                return;
                        }
                        $i++;
                    }
                    function Be(e) {
                        switch (e.keyCode || e.which) {
                            case 16:
                            case 17:
                            case 18:
                            case 91:
                            case 93:
                                return;
                        }
                        (window.setImmediate || window.setTimeout)(function () {
                            $i = Math.max($i - 1, 0);
                        });
                    }
                    function De() {
                        return { pointer: Boolean(Zi), key: Boolean($i) };
                    }
                    function Re() {
                        (Zi = $i = 0),
                            window.removeEventListener("blur", ke, !1),
                            document.documentElement.removeEventListener("keydown", Fe, !0),
                            document.documentElement.removeEventListener("keyup", Be, !0),
                            Ui.forEach(function (e) {
                                document.documentElement.removeEventListener(e, _e, !0);
                            }),
                            Xi.forEach(function (e) {
                                document.documentElement.removeEventListener(e, Pe, !0);
                            });
                    }
                    function We() {
                        return (
                            window.addEventListener("blur", ke, !1),
                            document.documentElement.addEventListener("keydown", Fe, !0),
                            document.documentElement.addEventListener("keyup", Be, !0),
                            Ui.forEach(function (e) {
                                document.documentElement.addEventListener(e, _e, !0);
                            }),
                            Xi.forEach(function (e) {
                                document.documentElement.addEventListener(e, Pe, !0);
                            }),
                            { get: De }
                        );
                    }
                    function He(e) {
                        return e.hasAttribute("autofocus");
                    }
                    function je(e) {
                        return e.tabIndex <= 0;
                    }
                    function qe(e) {
                        var t = (e.getAttribute && e.getAttribute("class")) || "";
                        return "" === t ? [] : t.split(" ");
                    }
                    function Ge(e, t, n) {
                        var r = qe(e),
                            i = r.indexOf(t),
                            o = -1 !== i,
                            a = void 0 !== n ? n : !o;
                        a !== o && (a || r.splice(i, 1), a && r.push(t), e.setAttribute("class", r.join(" ")));
                    }
                    function Ke(e, t) {
                        return Ge(e, t, !1);
                    }
                    function Ve(e, t) {
                        return Ge(e, t, !0);
                    }
                    function Ze(e) {
                        var t = "";
                        if (e.type === to || "shadow-focus" === e.type) {
                            var n = ro.get();
                            t = ao || (n.pointer && "pointer") || (n.key && "key") || "script";
                        } else "initial" === e.type && (t = "initial");
                        document.documentElement.setAttribute("data-focus-source", t), e.type !== no && (uo[t] || Ve(document.documentElement, "focus-source-" + t), (uo[t] = !0), (oo = t));
                    }
                    function $e() {
                        return oo;
                    }
                    function Ue(e) {
                        return uo[e];
                    }
                    function Xe(e) {
                        ao = e;
                    }
                    function ze() {
                        ao = !1;
                    }
                    function Je() {
                        Ze({ type: no }),
                            (oo = ao = null),
                            Object.keys(uo).forEach(function (e) {
                                Ke(document.documentElement, "focus-source-" + e), (uo[e] = !1);
                            }),
                            ro.disengage(),
                            io && io.disengage(),
                            document.removeEventListener("shadow-focus", Ze, !0),
                            document.documentElement.removeEventListener(to, Ze, !0),
                            document.documentElement.removeEventListener(no, Ze, !0),
                            document.documentElement.removeAttribute("data-focus-source");
                    }
                    function Qe() {
                        return (
                            (io = $r()),
                            document.addEventListener("shadow-focus", Ze, !0),
                            document.documentElement.addEventListener(to, Ze, !0),
                            document.documentElement.addEventListener(no, Ze, !0),
                            (ro = zi()),
                            Ze({ type: "initial" }),
                            { used: Ue, current: $e, lock: Xe, unlock: ze }
                        );
                    }
                    function Ye(e) {
                        var t = e || Kr();
                        lo.cssShadowPiercingDeepCombinator || (t = t.slice(-1));
                        var n = [].slice.call(document.querySelectorAll(vo), 0),
                            r = t
                                .map(function (e) {
                                    return Yn({ context: e });
                                })
                                .reduce(function (e, t) {
                                    return t.concat(e);
                                }, []);
                        n.forEach(function (e) {
                            -1 === r.indexOf(e) && Ke(e, bo);
                        }),
                            r.forEach(function (e) {
                                -1 === n.indexOf(e) && Ve(e, bo);
                            });
                    }
                    function et() {
                        ho = (window.setImmediate || window.setTimeout)(function () {
                            Ye();
                        });
                    }
                    function tt() {
                        (window.clearImmediate || window.clearTimeout)(ho), Ye();
                    }
                    function nt(e) {
                        Ye(e.detail.elements);
                    }
                    function rt() {
                        go && go.disengage(),
                            (window.clearImmediate || window.clearTimeout)(ho),
                            document.removeEventListener(mo, et, !0),
                            document.removeEventListener(fo, tt, !0),
                            document.removeEventListener("shadow-focus", nt, !0),
                            [].forEach.call(document.querySelectorAll(vo), function (e) {
                                Ke(e, bo);
                            });
                    }
                    function it() {
                        lo || ((lo = Bn()), (vo = ar("." + bo))), (go = $r()), document.addEventListener(mo, et, !0), document.addEventListener(fo, tt, !0), document.addEventListener("shadow-focus", nt, !0), Ye();
                    }
                    function ot(e, t) {
                        var n = Math.max(e.top, t.top),
                            r = Math.max(e.left, t.left),
                            i = Math.max(Math.min(e.right, t.right), r),
                            o = Math.max(Math.min(e.bottom, t.bottom), n);
                        return { top: n, right: i, bottom: o, left: r, width: i - r, height: o - n };
                    }
                    function at() {
                        var e = window.innerWidth || document.documentElement.clientWidth,
                            t = window.innerHeight || document.documentElement.clientHeight;
                        return { top: 0, right: e, bottom: t, left: 0, width: e, height: t };
                    }
                    function ut(e) {
                        var t = e.getBoundingClientRect(),
                            n = e.offsetWidth - e.clientWidth,
                            r = e.offsetHeight - e.clientHeight,
                            i = { top: t.top, left: t.left, right: t.right - n, bottom: t.bottom - r, width: t.width - n, height: t.height - r, area: 0 };
                        return (i.area = i.width * i.height), i;
                    }
                    function st(e) {
                        var t = window.getComputedStyle(e, null),
                            n = "visible";
                        return t.getPropertyValue("overflow-x") !== n && t.getPropertyValue("overflow-y") !== n;
                    }
                    function lt(e) {
                        return st(e) ? e.offsetHeight < e.scrollHeight || e.offsetWidth < e.scrollWidth : !1;
                    }
                    function ct(e) {
                        var t = Yn({ context: e }).slice(1).filter(lt);
                        return t.length
                            ? t.reduce(function (e, t) {
                                  var n = ut(t),
                                      r = ot(n, e);
                                  return (r.area = Math.min(n.area, e.area)), r;
                              }, ut(t[0]))
                            : null;
                    }
                    var dt = (function () {
                            function e(e, t) {
                                for (var n = 0; n < t.length; n++) {
                                    var r = t[n];
                                    (r.enumerable = r.enumerable || !1), (r.configurable = !0), "value" in r && (r.writable = !0), Object.defineProperty(e, r.key, r);
                                }
                            }
                            return function (t, n, r) {
                                return n && e(t.prototype, n), r && e(t, r), t;
                            };
                        })(),
                        ft =
                            "function" == typeof Symbol && "symbol" == typeof Symbol.iterator
                                ? function (e) {
                                      return typeof e;
                                  }
                                : function (e) {
                                      return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e;
                                  },
                        mt = r(e("platform")),
                        bt = r(e("css.escape")),
                        vt = function (e) {
                            if (!e) return [];
                            if (Array.isArray(e)) return e;
                            if (void 0 !== e.nodeType) return [e];
                            if (("string" == typeof e && (e = document.querySelectorAll(e)), void 0 !== e.length)) return [].slice.call(e, 0);
                            throw new TypeError("unexpected input " + String(e));
                        },
                        ht = function (e) {
                            var t = e.context,
                                n = e.label,
                                r = void 0 === n ? "context-to-element" : n,
                                i = e.resolveDocument,
                                o = e.defaultToDocument,
                                a = vt(t)[0];
                            if ((i && a && a.nodeType === Node.DOCUMENT_NODE && (a = a.documentElement), !a && o)) return document.documentElement;
                            if (!a) throw new TypeError(r + " requires valid options.context");
                            if (a.nodeType !== Node.ELEMENT_NODE && a.nodeType !== Node.DOCUMENT_FRAGMENT_NODE) throw new TypeError(r + " requires options.context to be an Element");
                            return a;
                        },
                        gt = function () {
                            for (var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, t = e.context, n = ht({ label: "get/shadow-host", context: t }), r = null; n; ) (r = n), (n = n.parentNode);
                            return r.nodeType === r.DOCUMENT_FRAGMENT_NODE && r.host ? r.host : null;
                        },
                        pt = function (e) {
                            return e ? (e.nodeType === Node.DOCUMENT_NODE ? e : e.ownerDocument || document) : document;
                        },
                        xt = function (e) {
                            var t = ht({ label: "is/active-element", resolveDocument: !0, context: e }),
                                n = pt(t);
                            if (n.activeElement === t) return !0;
                            var r = gt({ context: t });
                            return r && r.shadowRoot.activeElement === t ? !0 : !1;
                        },
                        yt = function (e) {
                            var t = pt(e);
                            return t.defaultView || window;
                        },
                        wt = function (e) {
                            var t = ht({ label: "element/blur", context: e });
                            if (!xt(t)) return null;
                            var n = t.nodeName.toLowerCase();
                            if ("body" === n) return null;
                            if (t.blur) return t.blur(), document.activeElement;
                            var r = yt(t);
                            try {
                                r.HTMLElement.prototype.blur.call(t);
                            } catch (i) {
                                var o = r.document && r.document.body;
                                if (!o) return null;
                                var a = o.getAttribute("tabindex");
                                o.setAttribute("tabindex", "-1"), o.focus(), a ? o.setAttribute("tabindex", a) : o.removeAttribute("tabindex");
                            }
                            return r.document.activeElement;
                        },
                        Et = JSON.parse(JSON.stringify(mt)),
                        St = Et.os.family || "",
                        Tt = "Android" === St,
                        At = "Windows" === St.slice(0, 7),
                        Ot = "OS X" === St,
                        Ct = "iOS" === St,
                        It = "Blink" === Et.layout,
                        Lt = "Gecko" === Et.layout,
                        Nt = "Trident" === Et.layout,
                        Mt = "EdgeHTML" === Et.layout,
                        kt = "WebKit" === Et.layout,
                        _t = parseFloat(Et.version),
                        Pt = Math.floor(_t);
                    (Et.majorVersion = Pt), (Et.is = { ANDROID: Tt, WINDOWS: At, OSX: Ot, IOS: Ct, BLINK: It, GECKO: Lt, TRIDENT: Nt, EDGE: Mt, WEBKIT: kt, IE9: Nt && 9 === Pt, IE10: Nt && 10 === Pt, IE11: Nt && 11 === Pt });
                    var Ft = function (e) {
                            var t = i(),
                                n = {};
                            return (
                                Object.keys(e).map(function (r) {
                                    n[r] = o(t, e[r]);
                                }),
                                a(t),
                                n
                            );
                        },
                        Bt = "1.4.1",
                        Dt = ("undefined" != typeof window && window.navigator.userAgent) || "",
                        Rt = "ally-supports-cache",
                        Wt = u(Rt);
                    (Wt.userAgent !== Dt || Wt.version !== Bt) && (Wt = {}), (Wt.userAgent = Dt), (Wt.version = Bt);
                    var Ht = {
                            get: function () {
                                return Wt;
                            },
                            set: function (e) {
                                Object.keys(e).forEach(function (t) {
                                    Wt[t] = e[t];
                                }),
                                    (Wt.time = new Date().toISOString()),
                                    s(Rt, Wt);
                            },
                        },
                        jt = function () {
                            var e = void 0;
                            try {
                                document.querySelector("html >>> :first-child"), (e = ">>>");
                            } catch (t) {
                                try {
                                    document.querySelector("html /deep/ :first-child"), (e = "/deep/");
                                } catch (n) {
                                    e = "";
                                }
                            }
                            return e;
                        },
                        qt = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7",
                        Gt = {
                            element: "div",
                            mutate: function (e) {
                                return (
                                    (e.innerHTML = '<map name="image-map-tabindex-test"><area shape="rect" coords="63,19,144,45"></map><img usemap="#image-map-tabindex-test" tabindex="-1" alt="" src="' + qt + '">'), e.querySelector("area")
                                );
                            },
                        },
                        Kt = {
                            element: "div",
                            mutate: function (e) {
                                return (e.innerHTML = '<map name="image-map-tabindex-test"><area href="#void" tabindex="-1" shape="rect" coords="63,19,144,45"></map><img usemap="#image-map-tabindex-test" alt="" src="' + qt + '">'), !1;
                            },
                            validate: function (e, t, n) {
                                if (Et.is.GECKO) return !0;
                                var r = e.querySelector("area");
                                return r.focus(), n.activeElement === r;
                            },
                        },
                        Vt = {
                            element: "div",
                            mutate: function (e) {
                                return (e.innerHTML = '<map name="image-map-area-href-test"><area shape="rect" coords="63,19,144,45"></map><img usemap="#image-map-area-href-test" alt="" src="' + qt + '">'), e.querySelector("area");
                            },
                            validate: function (e, t, n) {
                                return Et.is.GECKO ? !0 : n.activeElement === t;
                            },
                        },
                        Zt = {
                            name: "can-focus-audio-without-controls",
                            element: "audio",
                            mutate: function (e) {
                                try {
                                    e.setAttribute("src", qt);
                                } catch (t) {}
                            },
                        },
                        $t = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZZ",
                        Ut = {
                            element: "div",
                            mutate: function (e) {
                                return (e.innerHTML = '<map name="broken-image-map-test"><area href="#void" shape="rect" coords="63,19,144,45"></map><img usemap="#broken-image-map-test" alt="" src="' + $t + '">'), e.querySelector("area");
                            },
                        },
                        Xt = {
                            element: "div",
                            mutate: function (e) {
                                return (
                                    e.setAttribute("tabindex", "-1"),
                                    e.setAttribute("style", "display: -webkit-flex; display: -ms-flexbox; display: flex;"),
                                    (e.innerHTML = '<span style="display: block;">hello</span>'),
                                    e.querySelector("span")
                                );
                            },
                        },
                        zt = {
                            element: "fieldset",
                            mutate: function (e) {
                                e.setAttribute("tabindex", 0), e.setAttribute("disabled", "disabled");
                            },
                        },
                        Jt = {
                            element: "fieldset",
                            mutate: function (e) {
                                e.innerHTML = "<legend>legend</legend><p>content</p>";
                            },
                        },
                        Qt = {
                            element: "span",
                            mutate: function (e) {
                                e.setAttribute("style", "display: -webkit-flex; display: -ms-flexbox; display: flex;"), (e.innerHTML = '<span style="display: block;">hello</span>');
                            },
                        },
                        Yt = {
                            element: "form",
                            mutate: function (e) {
                                e.setAttribute("tabindex", 0), e.setAttribute("disabled", "disabled");
                            },
                        },
                        en = {
                            element: "a",
                            mutate: function (e) {
                                return (e.href = "#void"), (e.innerHTML = '<img ismap src="' + qt + '" alt="">'), e.querySelector("img");
                            },
                        },
                        tn = {
                            element: "div",
                            mutate: function (e) {
                                return (
                                    (e.innerHTML = '<map name="image-map-tabindex-test"><area href="#void" shape="rect" coords="63,19,144,45"></map><img usemap="#image-map-tabindex-test" tabindex="-1" alt="" src="' + qt + '">'),
                                    e.querySelector("img")
                                );
                            },
                        },
                        nn = {
                            element: function (e, t) {
                                var n = t.createElement("iframe");
                                e.appendChild(n);
                                var r = n.contentWindow.document;
                                return r.open(), r.close(), n;
                            },
                            mutate: function (e) {
                                e.style.visibility = "hidden";
                                var t = e.contentWindow.document,
                                    n = t.createElement("input");
                                return t.body.appendChild(n), n;
                            },
                            validate: function (e) {
                                var t = e.contentWindow.document,
                                    n = t.querySelector("input");
                                return t.activeElement === n;
                            },
                        },
                        rn = !Et.is.WEBKIT,
                        on = function () {
                            return rn;
                        },
                        an = {
                            element: "div",
                            mutate: function (e) {
                                e.setAttribute("tabindex", "invalid-value");
                            },
                        },
                        un = {
                            element: "label",
                            mutate: function (e) {
                                e.setAttribute("tabindex", "-1");
                            },
                            validate: function (e, t, n) {
                                e.offsetHeight;
                                return e.focus(), n.activeElement === e;
                            },
                        },
                        sn =
                            "data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiBpZD0ic3ZnIj48dGV4dCB4PSIxMCIgeT0iMjAiIGlkPSJzdmctbGluay10ZXh0Ij50ZXh0PC90ZXh0Pjwvc3ZnPg==",
                        ln = {
                            element: "object",
                            mutate: function (e) {
                                e.setAttribute("type", "image/svg+xml"), e.setAttribute("data", sn), e.setAttribute("width", "200"), e.setAttribute("height", "50"), (e.style.visibility = "hidden");
                            },
                        },
                        cn = {
                            name: "can-focus-object-svg",
                            element: "object",
                            mutate: function (e) {
                                e.setAttribute("type", "image/svg+xml"), e.setAttribute("data", sn), e.setAttribute("width", "200"), e.setAttribute("height", "50");
                            },
                            validate: function (e, t, n) {
                                return Et.is.GECKO ? !0 : n.activeElement === e;
                            },
                        },
                        dn = !Et.is.IE9,
                        fn = function () {
                            return dn;
                        },
                        mn = {
                            element: "div",
                            mutate: function (e) {
                                return (
                                    (e.innerHTML = '<map name="focus-redirect-img-usemap"><area href="#void" shape="rect" coords="63,19,144,45"></map><img usemap="#focus-redirect-img-usemap" alt="" src="' + qt + '">'),
                                    e.querySelector("img")
                                );
                            },
                            validate: function (e, t, n) {
                                var r = e.querySelector("area");
                                return n.activeElement === r;
                            },
                        },
                        bn = {
                            element: "fieldset",
                            mutate: function (e) {
                                return (e.innerHTML = '<legend>legend</legend><input tabindex="-1"><input tabindex="0">'), !1;
                            },
                            validate: function (e, t, n) {
                                var r = e.querySelector('input[tabindex="-1"]'),
                                    i = e.querySelector('input[tabindex="0"]');
                                return e.focus(), e.querySelector("legend").focus(), (n.activeElement === r && "focusable") || (n.activeElement === i && "tabbable") || "";
                            },
                        },
                        vn = {
                            element: "div",
                            mutate: function (e) {
                                return e.setAttribute("style", "width: 100px; height: 50px; overflow: auto;"), (e.innerHTML = '<div style="width: 500px; height: 40px;">scrollable content</div>'), e.querySelector("div");
                            },
                        },
                        hn = {
                            element: "div",
                            mutate: function (e) {
                                e.setAttribute("style", "width: 100px; height: 50px;"), (e.innerHTML = '<div style="width: 500px; height: 40px;">scrollable content</div>');
                            },
                        },
                        gn = {
                            element: "div",
                            mutate: function (e) {
                                e.setAttribute("style", "width: 100px; height: 50px; overflow: auto;"), (e.innerHTML = '<div style="width: 500px; height: 40px;">scrollable content</div>');
                            },
                        },
                        pn = {
                            element: "details",
                            mutate: function (e) {
                                return (e.innerHTML = "<summary>foo</summary><p>content</p>"), e.firstElementChild;
                            },
                        },
                        xn = function (e) {
                            var t = e.ownerSVGElement || "svg" === e.nodeName.toLowerCase();
                            if (!t) return !1;
                            var n = l();
                            e.appendChild(n);
                            var r = n.querySelector("input");
                            return r.focus(), (r.disabled = !0), e.removeChild(n), !0;
                        },
                        yn = {
                            element: "div",
                            mutate: function (e) {
                                return (e.innerHTML = c('<text focusable="true">a</text>')), e.querySelector("text");
                            },
                            validate: f,
                        },
                        wn = {
                            element: "div",
                            mutate: function (e) {
                                return (e.innerHTML = c('<text tabindex="0">a</text>')), e.querySelector("text");
                            },
                            validate: f,
                        },
                        En = {
                            element: "div",
                            mutate: function (e) {
                                return (e.innerHTML = c('<text tabindex="-1">a</text>')), e.querySelector("text");
                            },
                            validate: f,
                        },
                        Sn = {
                            element: "div",
                            mutate: function (e) {
                                return (e.innerHTML = c(['<g id="ally-test-target"><a xlink:href="#void"><text>link</text></a></g>', '<use xlink:href="#ally-test-target" x="0" y="0" tabindex="-1" />'].join(""))), e.querySelector("use");
                            },
                            validate: f,
                        },
                        Tn = {
                            element: "div",
                            mutate: function (e) {
                                return (e.innerHTML = c('<foreignObject tabindex="-1"><input type="text" /></foreignObject>')), e.querySelector("foreignObject") || e.getElementsByTagName("foreignObject")[0];
                            },
                            validate: f,
                        },
                        An = Boolean(Et.is.GECKO && "undefined" != typeof SVGElement && SVGElement.prototype.focus),
                        On = function () {
                            return An;
                        },
                        Cn = {
                            element: "div",
                            mutate: function (e) {
                                return (e.innerHTML = c("")), e.firstChild;
                            },
                            validate: f,
                        },
                        In = {
                            element: "div",
                            mutate: function (e) {
                                e.setAttribute("tabindex", "3x");
                            },
                        },
                        Ln = {
                            element: "table",
                            mutate: function (e, t, n) {
                                var r = n.createDocumentFragment();
                                (r.innerHTML = "<tr><td>cell</td></tr>"), e.appendChild(r);
                            },
                        },
                        Nn = {
                            element: "video",
                            mutate: function (e) {
                                try {
                                    e.setAttribute("src", qt);
                                } catch (t) {}
                            },
                        },
                        Mn = Et.is.GECKO || Et.is.TRIDENT || Et.is.EDGE,
                        kn = function () {
                            return Mn;
                        },
                        _n = { cssShadowPiercingDeepCombinator: jt, focusInZeroDimensionObject: on, focusObjectSwf: fn, focusSvgInIframe: On, tabsequenceAreaAtImgPosition: kn },
                        Pn = {
                            focusAreaImgTabindex: Gt,
                            focusAreaTabindex: Kt,
                            focusAreaWithoutHref: Vt,
                            focusAudioWithoutControls: Zt,
                            focusBrokenImageMap: Ut,
                            focusChildrenOfFocusableFlexbox: Xt,
                            focusFieldsetDisabled: zt,
                            focusFieldset: Jt,
                            focusFlexboxContainer: Qt,
                            focusFormDisabled: Yt,
                            focusImgIsmap: en,
                            focusImgUsemapTabindex: tn,
                            focusInHiddenIframe: nn,
                            focusInvalidTabindex: an,
                            focusLabelTabindex: un,
                            focusObjectSvg: cn,
                            focusObjectSvgHidden: ln,
                            focusRedirectImgUsemap: mn,
                            focusRedirectLegend: bn,
                            focusScrollBody: vn,
                            focusScrollContainerWithoutOverflow: hn,
                            focusScrollContainer: gn,
                            focusSummary: pn,
                            focusSvgFocusableAttribute: yn,
                            focusSvgTabindexAttribute: wn,
                            focusSvgNegativeTabindexAttribute: En,
                            focusSvgUseTabindex: Sn,
                            focusSvgForeignobjectTabindex: Tn,
                            focusSvg: Cn,
                            focusTabindexTrailingCharacters: In,
                            focusTable: Ln,
                            focusVideoWithoutControls: Nn,
                        },
                        Fn = null,
                        Bn = function () {
                            return Fn ? Fn : ((Fn = Ht.get()), Fn.time || (Ht.set(m()), (Fn = Ht.get())), Fn);
                        },
                        Dn = void 0,
                        Rn = /^\s*(-|\+)?[0-9]+\s*$/,
                        Wn = /^\s*(-|\+)?[0-9]+.*$/,
                        Hn = function (e) {
                            Dn || (Dn = Bn());
                            var t = Dn.focusTabindexTrailingCharacters ? Wn : Rn,
                                n = ht({ label: "is/valid-tabindex", resolveDocument: !0, context: e }),
                                r = n.hasAttribute("tabindex"),
                                i = n.hasAttribute("tabIndex");
                            if (!r && !i) return !1;
                            var o = n.ownerSVGElement || "svg" === n.nodeName.toLowerCase();
                            if (o && !Dn.focusSvgTabindexAttribute) return !1;
                            if (Dn.focusInvalidTabindex) return !0;
                            var a = n.getAttribute(r ? "tabindex" : "tabIndex");
                            return "-32768" === a ? !1 : Boolean(a && t.test(a));
                        },
                        jn = function (e) {
                            if (!Hn(e)) return null;
                            var t = e.hasAttribute("tabindex"),
                                n = t ? "tabindex" : "tabIndex",
                                r = parseInt(e.getAttribute(n), 10);
                            return isNaN(r) ? -1 : r;
                        },
                        qn = void 0,
                        Gn = void 0,
                        Kn = { input: !0, select: !0, textarea: !0, button: !0, fieldset: !0, form: !0 },
                        Vn = function (e) {
                            qn || ((qn = Bn()), qn.focusFieldsetDisabled && delete Kn.fieldset, qn.focusFormDisabled && delete Kn.form, (Gn = new RegExp("^(" + Object.keys(Kn).join("|") + ")$")));
                            var t = ht({ label: "is/native-disabled-supported", context: e }),
                                n = t.nodeName.toLowerCase();
                            return Boolean(Gn.test(n));
                        },
                        Zn = function (e) {
                            var t = e.element,
                                n = e.attribute,
                                r = "data-cached-" + n,
                                i = t.getAttribute(r);
                            if (null === i) {
                                var o = t.getAttribute(n);
                                if (null === o) return;
                                t.setAttribute(r, o || ""), t.removeAttribute(n);
                            } else {
                                var a = t.getAttribute(r);
                                t.removeAttribute(r), t.setAttribute(n, a);
                            }
                        },
                        $n = function (e) {
                            var t = e.element,
                                n = e.attribute,
                                r = e.temporaryValue,
                                i = e.saveValue,
                                o = "data-cached-" + n;
                            if (void 0 !== r) {
                                var a = i || t.getAttribute(n);
                                t.setAttribute(o, a || ""), t.setAttribute(n, r);
                            } else {
                                var u = t.getAttribute(o);
                                t.removeAttribute(o), "" === u ? t.removeAttribute(n) : t.setAttribute(n, u);
                            }
                        },
                        Un = function () {},
                        Xn = { log: Un, debug: Un, info: Un, warn: Un, error: Un },
                        zn = "undefined" != typeof console ? console : Xn,
                        Jn = void 0,
                        Qn = function (e, t) {
                            Jn || (Jn = Bn());
                            var n = ht({ label: "element/disabled", context: e });
                            t = Boolean(t);
                            var r = n.hasAttribute("data-ally-disabled"),
                                i = 1 === arguments.length;
                            return Vn(n) ? (i ? n.disabled : ((n.disabled = t), n)) : i ? r : r === t ? n : (E(n, t), n);
                        },
                        Yn = function () {
                            for (var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, t = e.context, n = [], r = ht({ label: "get/parents", context: t }); r; )
                                n.push(r), (r = r.parentNode), r && r.nodeType !== Node.ELEMENT_NODE && (r = null);
                            return n;
                        },
                        er = ["matches", "webkitMatchesSelector", "mozMatchesSelector", "msMatchesSelector"],
                        tr = null,
                        nr = void 0;
                    L.except = function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = function (t) {
                                return L({ context: t, except: e });
                            };
                        return (t.rules = L), t;
                    };
                    var rr = L.except({}),
                        ir = function (e) {
                            try {
                                return e.contentDocument || (e.contentWindow && e.contentWindow.document) || (e.getSVGDocument && e.getSVGDocument()) || null;
                            } catch (t) {
                                return null;
                            }
                        },
                        or = void 0,
                        ar = function (e) {
                            if ("string" != typeof or) {
                                var t = jt();
                                t && (or = ", html " + t + " ");
                            }
                            return or
                                ? e +
                                      or +
                                      e
                                          .replace(/\s*,\s*/g, ",")
                                          .split(",")
                                          .join(or)
                                : e;
                        },
                        ur = void 0,
                        sr = /^(area)$/;
                    D.except = function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = function (t) {
                                return D({ context: t, except: e });
                            };
                        return (t.rules = D), t;
                    };
                    var lr = D.except({}),
                        cr = void 0,
                        dr = function (e) {
                            cr || (cr = Bn());
                            var t = ht({ label: "is/valid-area", context: e }),
                                n = t.nodeName.toLowerCase();
                            if ("area" !== n) return !1;
                            var r = t.hasAttribute("tabindex");
                            if (!cr.focusAreaTabindex && r) return !1;
                            var i = H(t);
                            if (!i || !lr(i)) return !1;
                            if (!cr.focusBrokenImageMap && (!i.complete || !i.naturalHeight || i.offsetWidth <= 0 || i.offsetHeight <= 0)) return !1;
                            if (!cr.focusAreaWithoutHref && !t.href) return (cr.focusAreaTabindex && r) || (cr.focusAreaImgTabindex && i.hasAttribute("tabindex"));
                            var o = Yn({ context: i })
                                .slice(1)
                                .some(function (e) {
                                    var t = e.nodeName.toLowerCase();
                                    return "button" === t || "a" === t;
                                });
                            return o ? !1 : !0;
                        },
                        fr = void 0,
                        mr = function (e) {
                            fr || (fr = Bn());
                            var t = ht({ label: "is/disabled", context: e });
                            if (t.hasAttribute("data-ally-disabled")) return !0;
                            if (!Vn(t)) return !1;
                            if (t.disabled) return !0;
                            var n = Yn({ context: t });
                            return n.some(j) ? !0 : !fr.focusFormDisabled && n.some(q) ? !0 : !1;
                        };
                    G.except = function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = function (t) {
                                return G({ context: t, except: e });
                            };
                        return (t.rules = G), t;
                    };
                    var br = G.except({}),
                        vr = void 0;
                    V.except = function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = function (t) {
                                return V({ context: t, except: e });
                            };
                        return (t.rules = V), t;
                    };
                    var hr = V.except({}),
                        gr = Z(rr),
                        pr = void 0,
                        xr = void 0,
                        yr = function () {
                            return (
                                pr || (pr = Bn()),
                                "string" == typeof xr
                                    ? xr
                                    : ((xr =
                                          "" +
                                          (pr.focusTable ? "table, td," : "") +
                                          (pr.focusFieldset ? "fieldset," : "") +
                                          "svg a,a[href],area[href],input, select, textarea, button,iframe, object, embed,keygen," +
                                          (pr.focusAudioWithoutControls ? "audio," : "audio[controls],") +
                                          (pr.focusVideoWithoutControls ? "video," : "video[controls],") +
                                          (pr.focusSummary ? "summary," : "") +
                                          "[tabindex],[contenteditable]"),
                                      (xr = ar(xr)))
                            );
                        },
                        wr = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.context,
                                n = e.includeContext,
                                r = e.includeOnlyTabbable,
                                i = e.strategy,
                                o = void 0 === i ? "quick" : i,
                                a = ht({ label: "query/focusable", resolveDocument: !0, defaultToDocument: !0, context: t }),
                                u = { context: a, includeContext: n, includeOnlyTabbable: r, strategy: o };
                            if ("quick" === o) return U(u);
                            if ("strict" === o || "all" === o) return $(u);
                            throw new TypeError('query/focusable requires option.strategy to be one of ["quick", "strict", "all"]');
                        },
                        Er = void 0,
                        Sr = /^(fieldset|table|td|body)$/;
                    X.except = function () {
                        var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                            t = function (t) {
                                return X({ context: t, except: e });
                            };
                        return (t.rules = X), t;
                    };
                    var Tr = rr.rules.except({ flexbox: !0 }),
                        Ar = X.except({ flexbox: !0 }),
                        Or = X.except({}),
                        Cr = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.context,
                                n = e.includeContext,
                                r = e.includeOnlyTabbable,
                                i = e.strategy,
                                o = Or.rules.except({ onlyTabbable: r });
                            return wr({ context: t, includeContext: n, includeOnlyTabbable: r, strategy: i }).filter(o);
                        },
                        Ir = function (e) {
                            return e.sort(z);
                        },
                        Lr = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.list,
                                n = e.elements,
                                r = e.resolveElement,
                                i = t.slice(0),
                                o = vt(n).slice(0);
                            Ir(o);
                            var a = Q(i, o, r);
                            return Y(i, a), i;
                        },
                        Nr = void 0,
                        Mr = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.context,
                                n = e.skipFocusable;
                            Nr || (Nr = Bn());
                            var r = ht({ label: "get/focus-redirect-target", context: t });
                            if (!n && hr(r)) return null;
                            var i = r.nodeName.toLowerCase(),
                                o = pt(r);
                            return "label" === i ? te(r, o) : "legend" === i ? ie(r, o) : "img" === i ? oe(r, o) : null;
                        },
                        kr = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.context,
                                n = e.except,
                                r = ht({ label: "get/focus-target", context: t }),
                                i = null,
                                o = function (e) {
                                    var t = hr.rules({ context: e, except: n });
                                    return t ? ((i = e), !0) : ((i = Mr({ context: e, skipFocusable: !0 })), Boolean(i));
                                };
                            return o(r) ? i : (Yn({ context: r }).slice(1).some(o), i);
                        },
                        _r = { flexbox: !0, scrollable: !0, onlyTabbable: !0 },
                        Pr = function (e) {
                            var t = arguments.length > 1 && void 0 !== arguments[1] ? arguments[1] : {},
                                n = t.defaultToAncestor,
                                r = t.undoScrolling,
                                i = ht({ label: "element/focus", context: e }),
                                o = hr.rules({ context: i, except: _r });
                            if (!n && !o) return null;
                            var a = kr({ context: i, except: _r });
                            if (!a) return null;
                            if (xt(a)) return a;
                            var u = void 0;
                            r && (u = ae(a));
                            var s = ue(a);
                            return u && u(), s;
                        },
                        Fr = { blur: wt, disabled: Qn, focus: Pr };
                    "undefined" != typeof window &&
                        (function () {
                            for (var e = 0, t = ["ms", "moz", "webkit", "o"], n = "", r = "", i = 0, o = t.length; o > i; ++i)
                                (n = window[t[i] + "RequestAnimationFrame"]), (r = window[t[i] + "CancelAnimationFrame"] || window[t[i] + "CancelRequestAnimationFrame"]);
                            "function" != typeof window.requestAnimationFrame &&
                                (window.requestAnimationFrame =
                                    window[n] ||
                                    function (t) {
                                        var n = new Date().getTime(),
                                            r = Math.max(0, 16 - (n - e)),
                                            i = window.setTimeout(function () {
                                                t(n + r);
                                            }, r);
                                        return (e = n + r), i;
                                    }),
                                "function" != typeof window.cancelAnimationFrame &&
                                    (window.cancelAnimationFrame =
                                        window[r] ||
                                        function (e) {
                                            clearTimeout(e);
                                        });
                        })();
                    var Br = ("undefined" != typeof window && window.CustomEvent) || function () {};
                    "function" != typeof Br &&
                        ((Br = function (e, t) {
                            var n = document.createEvent("CustomEvent");
                            return !t && (t = { bubbles: !1, cancelable: !1, detail: void 0 }), n.initCustomEvent(e, t.bubbles, t.cancelable, t.detail), n;
                        }),
                        (Br.prototype = window.Event.prototype));
                    var Dr = Br,
                        Rr = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.engage,
                                n = e.disengage,
                                r = { engage: t || ce, disengage: n || ce, instances: 0, _result: null };
                            return le.bind(r);
                        },
                        Wr = void 0,
                        Hr = void 0,
                        jr = Rr({ engage: fe, disengage: me }),
                        qr = function (e) {
                            var t = ht({ label: "is/shadowed", resolveDocument: !0, context: e });
                            return Boolean(gt({ context: t }));
                        },
                        Gr = function () {
                            for (var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {}, t = e.context, n = [], r = ht({ label: "get/shadow-host-parents", context: t }); r && (r = gt({ context: r })); ) n.push(r);
                            return n;
                        },
                        Kr = function () {
                            return null === document.activeElement && document.body.focus(), qr(document.activeElement) ? ve() : be();
                        },
                        Vr = void 0,
                        Zr = void 0;
                    "undefined" != typeof document && document.documentElement.createShadowRoot
                        ? !(function () {
                              var e = void 0,
                                  t = void 0,
                                  n = function () {
                                      i(),
                                          (window.clearImmediate || window.clearTimeout)(e),
                                          (e = (window.setImmediate || window.setTimeout)(function () {
                                              o();
                                          }));
                                  },
                                  r = function (e) {
                                      e.addEventListener("blur", n, !0), (t = e);
                                  },
                                  i = function () {
                                      t && t.removeEventListener("blur", n, !0), (t = null);
                                  },
                                  o = function () {
                                      var e = Kr();
                                      if (1 === e.length) return void i();
                                      r(e[0]);
                                      var t = new CustomEvent("shadow-focus", { bubbles: !1, cancelable: !1, detail: { elements: e, active: e[0], hosts: e.slice(1) } });
                                      document.dispatchEvent(t);
                                  },
                                  a = function () {
                                      (window.clearImmediate || window.clearTimeout)(e), o();
                                  };
                              (Vr = function () {
                                  document.addEventListener("focus", a, !0);
                              }),
                                  (Zr = function () {
                                      (window.clearImmediate || window.clearTimeout)(e), t && t.removeEventListener("blur", n, !0), document.removeEventListener("focus", a, !0);
                                  });
                          })()
                        : (Vr = Zr = function () {});
                    var $r = Rr({ engage: Vr, disengage: Zr }),
                        Ur = { activeElement: jr, shadowFocus: $r },
                        Xr = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.engage,
                                n = e.disengage,
                                r = { engage: t || pe, disengage: n || pe, context: null };
                            return ge.bind(r);
                        },
                        zr = void 0,
                        Jr = void 0,
                        Qr = Et.is.TRIDENT && (Et.is.IE10 || Et.is.IE11);
                    Qr
                        ? !(function () {
                              var e = function (e) {
                                  var t = kr({ context: e.target, except: { flexbox: !0, scrollable: !0 } });
                                  if (t && t !== e.target) {
                                      window.setImmediate(function () {
                                          t.focus();
                                      });
                                      var n = [].map.call(t.children, function (e) {
                                          var t = e.style.visibility || "",
                                              n = e.style.transition || "";
                                          return (e.style.visibility = "hidden"), (e.style.transition = "none"), [e, t, n];
                                      });
                                      window.setImmediate(function () {
                                          n.forEach(function (e) {
                                              (e[0].style.visibility = e[1]), (e[0].style.transition = e[2]);
                                          });
                                      });
                                  }
                              };
                              (zr = function (t) {
                                  t.addEventListener("mousedown", e, !0);
                              }),
                                  (Jr = function (t) {
                                      t.removeEventListener("mousedown", e, !0);
                                  });
                          })()
                        : (zr = function () {});
                    var Yr = Xr({ engage: zr, disengage: Jr }),
                        ei = void 0,
                        ti = void 0,
                        ni = Et.is.OSX && (Et.is.GECKO || Et.is.WEBKIT);
                    ni
                        ? !(function () {
                              var e = function (e) {
                                      if (!e.defaultPrevented && T(e.target, "input, button, button *")) {
                                          var t = kr({ context: e.target });
                                          (window.setImmediate || window.setTimeout)(function () {
                                              t.focus();
                                          });
                                      }
                                  },
                                  t = function (e) {
                                      if (!e.defaultPrevented && T(e.target, "label, label *")) {
                                          var t = kr({ context: e.target });
                                          t && t.focus();
                                      }
                                  };
                              (ei = function (n) {
                                  n.addEventListener("mousedown", e, !1), n.addEventListener("mouseup", t, !1);
                              }),
                                  (ti = function (n) {
                                      n.removeEventListener("mousedown", e, !1), n.removeEventListener("mouseup", t, !1);
                                  });
                          })()
                        : (ei = function () {});
                    var ri = Xr({ engage: ei, disengage: ti }),
                        ii = void 0,
                        oi = void 0,
                        ai = Et.is.WEBKIT;
                    ai
                        ? !(function () {
                              var e = function (e) {
                                  var t = kr({ context: e.target });
                                  !t ||
                                      (t.hasAttribute("tabindex") && Hn(t)) ||
                                      (t.setAttribute("tabindex", 0),
                                      (window.setImmediate || window.setTimeout)(function () {
                                          t.removeAttribute("tabindex");
                                      }, 0));
                              };
                              (ii = function (t) {
                                  t.addEventListener("mousedown", e, !0), t.addEventListener("touchstart", e, !0);
                              }),
                                  (oi = function (t) {
                                      t.removeEventListener("mousedown", e, !0), t.removeEventListener("touchstart", e, !0);
                                  });
                          })()
                        : (ii = function () {});
                    var ui = Xr({ engage: ii, disengage: oi }),
                        si = { pointerFocusChildren: Yr, pointerFocusInput: ri, pointerFocusParent: ui },
                        li = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.context,
                                n = pt(t),
                                r = void 0;
                            try {
                                r = n.activeElement;
                            } catch (i) {}
                            return (r && r.nodeType) || (r = n.body || n.documentElement), r;
                        },
                        ci = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.context,
                                n = e.filter;
                            if (((t = ht({ label: "get/insignificant-branches", defaultToDocument: !0, context: t })), (n = vt(n)), !n.length)) throw new TypeError("get/insignificant-branches requires valid options.filter");
                            return ye({ context: t, filter: n });
                        },
                        di = { activeElement: li, activeElements: Kr, focusRedirectTarget: Mr, focusTarget: kr, insignificantBranches: ci, parents: Yn, shadowHostParents: Gr, shadowHost: gt },
                        fi = { activeElement: xt, disabled: mr, focusRelevant: rr, focusable: hr, onlyTabbable: br, shadowed: qr, tabbable: Or, validArea: dr, validTabindex: Hn, visible: lr },
                        mi = function (e) {
                            return e.shadowRoot ? NodeFilter.FILTER_ACCEPT : NodeFilter.FILTER_SKIP;
                        };
                    mi.acceptNode = mi;
                    for (
                        var bi = { childList: !0, subtree: !0 },
                            vi = (function () {
                                function e() {
                                    var t = this,
                                        r = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                        i = r.context,
                                        o = r.callback,
                                        a = r.config;
                                    n(this, e),
                                        (this.config = a),
                                        (this.disengage = this.disengage.bind(this)),
                                        (this.clientObserver = new MutationObserver(o)),
                                        (this.hostObserver = new MutationObserver(function (e) {
                                            return e.forEach(t.handleHostMutation, t);
                                        })),
                                        this.observeContext(i),
                                        this.observeShadowHosts(i);
                                }
                                return (
                                    dt(e, [
                                        {
                                            key: "disengage",
                                            value: function () {
                                                this.clientObserver && this.clientObserver.disconnect(), (this.clientObserver = null), this.hostObserver && this.hostObserver.disconnect(), (this.hostObserver = null);
                                            },
                                        },
                                        {
                                            key: "observeShadowHosts",
                                            value: function (e) {
                                                var t = this,
                                                    n = we({ context: e });
                                                n.forEach(function (e) {
                                                    return t.observeContext(e.shadowRoot);
                                                });
                                            },
                                        },
                                        {
                                            key: "observeContext",
                                            value: function (e) {
                                                this.clientObserver.observe(e, this.config), this.hostObserver.observe(e, bi);
                                            },
                                        },
                                        {
                                            key: "handleHostMutation",
                                            value: function (e) {
                                                if ("childList" === e.type) {
                                                    var t = vt(e.addedNodes).filter(function (e) {
                                                        return e.nodeType === Node.ELEMENT_NODE;
                                                    });
                                                    t.forEach(this.observeShadowHosts, this);
                                                }
                                            },
                                        },
                                    ]),
                                    e
                                );
                            })(),
                            hi = function () {
                                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                    t = e.context,
                                    n = e.callback,
                                    r = e.config;
                                if ("function" != typeof n) throw new TypeError("observe/shadow-mutations requires options.callback to be a function");
                                if ("object" !== ("undefined" == typeof r ? "undefined" : ft(r))) throw new TypeError("observe/shadow-mutations requires options.config to be an object");
                                if (!window.MutationObserver) return { disengage: function () {} };
                                var i = ht({ label: "observe/shadow-mutations", resolveDocument: !0, defaultToDocument: !0, context: t }),
                                    o = new vi({ context: i, callback: n, config: r });
                                return { disengage: o.disengage };
                            },
                            gi = { attributes: !0, childList: !0, subtree: !0, attributeFilter: ["tabindex", "disabled", "data-ally-disabled"] },
                            pi = (function () {
                                function e() {
                                    var t = this,
                                        r = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                        i = r.context,
                                        o = r.filter;
                                    n(this, e),
                                        (this._context = vt(i || document.documentElement)[0]),
                                        (this._filter = vt(o)),
                                        (this._inertElementCache = []),
                                        (this.disengage = this.disengage.bind(this)),
                                        (this.handleMutation = this.handleMutation.bind(this)),
                                        (this.renderInert = this.renderInert.bind(this)),
                                        (this.filterElements = this.filterElements.bind(this)),
                                        (this.filterParentElements = this.filterParentElements.bind(this));
                                    var a = wr({ context: this._context, includeContext: !0, strategy: "all" });
                                    this.renderInert(a),
                                        (this.shadowObserver = hi({
                                            context: this._context,
                                            config: gi,
                                            callback: function (e) {
                                                return e.forEach(t.handleMutation);
                                            },
                                        }));
                                }
                                return (
                                    dt(e, [
                                        {
                                            key: "disengage",
                                            value: function () {
                                                this._context &&
                                                    (Se(this._context),
                                                    this._inertElementCache.forEach(function (e) {
                                                        return Se(e);
                                                    }),
                                                    (this._inertElementCache = null),
                                                    (this._filter = null),
                                                    (this._context = null),
                                                    this.shadowObserver && this.shadowObserver.disengage(),
                                                    (this.shadowObserver = null));
                                            },
                                        },
                                        {
                                            key: "listQueryFocusable",
                                            value: function (e) {
                                                return e
                                                    .map(function (e) {
                                                        return wr({ context: e, includeContext: !0, strategy: "all" });
                                                    })
                                                    .reduce(function (e, t) {
                                                        return e.concat(t);
                                                    }, []);
                                            },
                                        },
                                        {
                                            key: "renderInert",
                                            value: function (e) {
                                                var t = this,
                                                    n = function (e) {
                                                        t._inertElementCache.push(e), Ee(e);
                                                    };
                                                e.filter(this.filterElements)
                                                    .filter(this.filterParentElements)
                                                    .filter(function (e) {
                                                        return !Qn(e);
                                                    })
                                                    .forEach(n);
                                            },
                                        },
                                        {
                                            key: "filterElements",
                                            value: function (e) {
                                                var t = xe({ element: e, includeSelf: !0 });
                                                return !this._filter.some(t);
                                            },
                                        },
                                        {
                                            key: "filterParentElements",
                                            value: function (e) {
                                                var t = xe({ parent: e });
                                                return !this._filter.some(t);
                                            },
                                        },
                                        {
                                            key: "handleMutation",
                                            value: function (e) {
                                                if ("childList" === e.type) {
                                                    var t = vt(e.addedNodes).filter(function (e) {
                                                        return e.nodeType === Node.ELEMENT_NODE;
                                                    });
                                                    if (!t.length) return;
                                                    var n = this.listQueryFocusable(t);
                                                    this.renderInert(n);
                                                } else "attributes" === e.type && this.renderInert([e.target]);
                                            },
                                        },
                                    ]),
                                    e
                                );
                            })(),
                            xi = function () {
                                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                    t = e.context,
                                    n = e.filter,
                                    r = new pi({ context: t, filter: n });
                                return { disengage: r.disengage };
                            },
                            yi = { attributes: !1, childList: !0, subtree: !0 },
                            wi = (function () {
                                function e() {
                                    var t = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                        r = t.context,
                                        i = t.filter;
                                    n(this, e),
                                        (this._context = vt(r || document.documentElement)[0]),
                                        (this._filter = vt(i)),
                                        (this.disengage = this.disengage.bind(this)),
                                        (this.handleMutation = this.handleMutation.bind(this)),
                                        (this.isInsignificantBranch = this.isInsignificantBranch.bind(this));
                                    var o = ci({ context: this._context, filter: this._filter });
                                    o.forEach(Te), this.startObserver();
                                }
                                return (
                                    dt(e, [
                                        {
                                            key: "disengage",
                                            value: function () {
                                                this._context &&
                                                    ([].forEach.call(this._context.querySelectorAll("[data-cached-aria-hidden]"), Ae),
                                                    (this._context = null),
                                                    (this._filter = null),
                                                    this._observer && this._observer.disconnect(),
                                                    (this._observer = null));
                                            },
                                        },
                                        {
                                            key: "startObserver",
                                            value: function () {
                                                var e = this;
                                                window.MutationObserver &&
                                                    ((this._observer = new MutationObserver(function (t) {
                                                        return t.forEach(e.handleMutation);
                                                    })),
                                                    this._observer.observe(this._context, yi));
                                            },
                                        },
                                        {
                                            key: "handleMutation",
                                            value: function (e) {
                                                "childList" === e.type &&
                                                    vt(e.addedNodes)
                                                        .filter(function (e) {
                                                            return e.nodeType === Node.ELEMENT_NODE;
                                                        })
                                                        .filter(this.isInsignificantBranch)
                                                        .forEach(Te);
                                            },
                                        },
                                        {
                                            key: "isInsignificantBranch",
                                            value: function (e) {
                                                var t = Yn({ context: e });
                                                if (
                                                    t.some(function (e) {
                                                        return "true" === e.getAttribute("aria-hidden");
                                                    })
                                                )
                                                    return !1;
                                                var n = xe({ element: e });
                                                return this._filter.some(n) ? !1 : !0;
                                            },
                                        },
                                    ]),
                                    e
                                );
                            })(),
                            Ei = function () {
                                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                    t = e.context,
                                    n = e.filter,
                                    r = new wi({ context: t, filter: n });
                                return { disengage: r.disengage };
                            },
                            Si = (function () {
                                function e(t) {
                                    n(this, e), (this._document = pt(t)), (this.maps = {});
                                }
                                return (
                                    dt(e, [
                                        {
                                            key: "getAreasFor",
                                            value: function (e) {
                                                return this.maps[e] || this.addMapByName(e), this.maps[e];
                                            },
                                        },
                                        {
                                            key: "addMapByName",
                                            value: function (e) {
                                                var t = R(e, this._document);
                                                t && (this.maps[t.name] = Cr({ context: t }));
                                            },
                                        },
                                        {
                                            key: "extractAreasFromList",
                                            value: function (e) {
                                                return e.filter(function (e) {
                                                    var t = e.nodeName.toLowerCase();
                                                    if ("area" !== t) return !0;
                                                    var n = e.parentNode;
                                                    return this.maps[n.name] || (this.maps[n.name] = []), this.maps[n.name].push(e), !1;
                                                }, this);
                                            },
                                        },
                                    ]),
                                    e
                                );
                            })(),
                            Ti = function (e, t) {
                                var n = t.querySelectorAll("img[usemap]"),
                                    r = new Si(t),
                                    i = r.extractAreasFromList(e);
                                return n.length
                                    ? Lr({
                                          list: i,
                                          elements: n,
                                          resolveElement: function (e) {
                                              var t = e.getAttribute("usemap").slice(1);
                                              return r.getAreasFor(t);
                                          },
                                      })
                                    : i;
                            },
                            Ai = (function () {
                                function e(t, r) {
                                    n(this, e), (this.context = t), (this.sortElements = r), (this.hostCounter = 1), (this.inHost = {}), (this.inDocument = []), (this.hosts = {}), (this.elements = {});
                                }
                                return (
                                    dt(e, [
                                        {
                                            key: "_registerHost",
                                            value: function (e) {
                                                if (!e._sortingId) {
                                                    (e._sortingId = "shadow-" + this.hostCounter++), (this.hosts[e._sortingId] = e);
                                                    var t = gt({ context: e });
                                                    t ? (this._registerHost(t), this._registerHostParent(e, t)) : this.inDocument.push(e);
                                                }
                                            },
                                        },
                                        {
                                            key: "_registerHostParent",
                                            value: function (e, t) {
                                                this.inHost[t._sortingId] || (this.inHost[t._sortingId] = []), this.inHost[t._sortingId].push(e);
                                            },
                                        },
                                        {
                                            key: "_registerElement",
                                            value: function (e, t) {
                                                this.elements[t._sortingId] || (this.elements[t._sortingId] = []), this.elements[t._sortingId].push(e);
                                            },
                                        },
                                        {
                                            key: "extractElements",
                                            value: function (e) {
                                                return e.filter(function (e) {
                                                    var t = gt({ context: e });
                                                    return t ? (this._registerHost(t), this._registerElement(e, t), !1) : !0;
                                                }, this);
                                            },
                                        },
                                        {
                                            key: "sort",
                                            value: function (e) {
                                                var t = this._injectHosts(e);
                                                return (t = this._replaceHosts(t)), this._cleanup(), t;
                                            },
                                        },
                                        {
                                            key: "_injectHosts",
                                            value: function (e) {
                                                return (
                                                    Object.keys(this.hosts).forEach(function (e) {
                                                        var t = this.elements[e],
                                                            n = this.inHost[e],
                                                            r = this.hosts[e].shadowRoot;
                                                        this.elements[e] = this._merge(t, n, r);
                                                    }, this),
                                                    this._merge(e, this.inDocument, this.context)
                                                );
                                            },
                                        },
                                        {
                                            key: "_merge",
                                            value: function (e, t, n) {
                                                var r = Lr({ list: e, elements: t });
                                                return this.sortElements(r, n);
                                            },
                                        },
                                        {
                                            key: "_replaceHosts",
                                            value: function (e) {
                                                return Lr({ list: e, elements: this.inDocument, resolveElement: this._resolveHostElement.bind(this) });
                                            },
                                        },
                                        {
                                            key: "_resolveHostElement",
                                            value: function (e) {
                                                var t = Lr({ list: this.elements[e._sortingId], elements: this.inHost[e._sortingId], resolveElement: this._resolveHostElement.bind(this) }),
                                                    n = jn(e);
                                                return null !== n && n > -1 ? [e].concat(t) : t;
                                            },
                                        },
                                        {
                                            key: "_cleanup",
                                            value: function () {
                                                Object.keys(this.hosts).forEach(function (e) {
                                                    delete this.hosts[e]._sortingId;
                                                }, this);
                                            },
                                        },
                                    ]),
                                    e
                                );
                            })(),
                            Oi = function (e, t, n) {
                                var r = new Ai(t, n),
                                    i = r.extractElements(e);
                                return i.length === e.length ? n(e) : r.sort(i);
                            },
                            Ci = function (e) {
                                var t = {},
                                    n = [],
                                    r = e.filter(function (e) {
                                        var r = e.tabIndex;
                                        return void 0 === r && (r = jn(e)), 0 >= r || null === r || void 0 === r ? !0 : (t[r] || ((t[r] = []), n.push(r)), t[r].push(e), !1);
                                    }),
                                    i = n
                                        .sort()
                                        .map(function (e) {
                                            return t[e];
                                        })
                                        .reduceRight(function (e, t) {
                                            return t.concat(e);
                                        }, r);
                                return i;
                            },
                            Ii = void 0,
                            Li = function () {
                                var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                    t = e.context,
                                    n = e.includeContext,
                                    r = e.includeOnlyTabbable,
                                    i = e.strategy;
                                Ii || (Ii = Bn());
                                var o = vt(t)[0] || document.documentElement,
                                    a = Cr({ context: o, includeContext: n, includeOnlyTabbable: r, strategy: i });
                                return (a = document.body.createShadowRoot && Et.is.BLINK ? Oi(a, o, Ce) : Ce(a, o)), n && (a = Oe(a, o)), a;
                            },
                            Ni = {
                                tab: 9,
                                left: 37,
                                up: 38,
                                right: 39,
                                down: 40,
                                pageUp: 33,
                                "page-up": 33,
                                pageDown: 34,
                                "page-down": 34,
                                end: 35,
                                home: 36,
                                enter: 13,
                                escape: 27,
                                space: 32,
                                shift: 16,
                                capsLock: 20,
                                "caps-lock": 20,
                                ctrl: 17,
                                alt: 18,
                                meta: 91,
                                pause: 19,
                                insert: 45,
                                delete: 46,
                                backspace: 8,
                                _alias: { 91: [92, 93, 224] },
                            },
                            Mi = 1;
                        26 > Mi;
                        Mi++
                    )
                        Ni["f" + Mi] = Mi + 111;
                    for (var ki = 0; 10 > ki; ki++) {
                        var _i = ki + 48,
                            Pi = ki + 96;
                        (Ni[ki] = _i), (Ni["num-" + ki] = Pi), (Ni._alias[_i] = [Pi]);
                    }
                    for (var Fi = 0; 26 > Fi; Fi++) {
                        var Bi = Fi + 65,
                            Di = String.fromCharCode(Bi).toLowerCase();
                        Ni[Di] = Bi;
                    }
                    var Ri = { alt: "altKey", ctrl: "ctrlKey", meta: "metaKey", shift: "shiftKey" },
                        Wi = Object.keys(Ri).map(function (e) {
                            return Ri[e];
                        }),
                        Hi = function (e) {
                            return e.split(/\s+/).map(function (e) {
                                var t = e.split("+"),
                                    n = Le(t.slice(0, -1)),
                                    r = Ne(t.slice(-1));
                                return { keyCodes: r, modifiers: n, matchModifiers: Me.bind(null, n) };
                            });
                        },
                        ji = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = {},
                                n = vt(e.context)[0] || document.documentElement;
                            delete e.context;
                            var r = vt(e.filter);
                            delete e.filter;
                            var i = Object.keys(e);
                            if (!i.length) throw new TypeError("when/key requires at least one option key");
                            var o = function (e) {
                                e.keyCodes.forEach(function (n) {
                                    t[n] || (t[n] = []), t[n].push(e);
                                });
                            };
                            i.forEach(function (t) {
                                if ("function" != typeof e[t]) throw new TypeError('when/key requires option["' + t + '"] to be a function');
                                var n = function (n) {
                                    return (n.callback = e[t]), n;
                                };
                                Hi(t).map(n).forEach(o);
                            });
                            var a = function (e) {
                                if (!e.defaultPrevented) {
                                    if (r.length) {
                                        var i = xe({ element: e.target, includeSelf: !0 });
                                        if (r.some(i)) return;
                                    }
                                    var o = e.keyCode || e.which;
                                    t[o] &&
                                        t[o].forEach(function (t) {
                                            t.matchModifiers(e) && t.callback.call(n, e, u);
                                        });
                                }
                            };
                            n.addEventListener("keydown", a, !1);
                            var u = function () {
                                n.removeEventListener("keydown", a, !1);
                            };
                            return { disengage: u };
                        },
                        qi = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.context;
                            return (
                                t || (t = document.documentElement),
                                Li(),
                                ji({
                                    "?alt+?shift+tab": function (e) {
                                        e.preventDefault();
                                        var n = Li({ context: t }),
                                            r = e.shiftKey,
                                            i = n[0],
                                            o = n[n.length - 1],
                                            a = r ? i : o,
                                            u = r ? o : i;
                                        if (xt(a)) return void u.focus();
                                        var s = void 0,
                                            l = n.some(function (e, t) {
                                                return xt(e) ? ((s = t), !0) : !1;
                                            });
                                        if (!l) return void i.focus();
                                        var c = r ? -1 : 1;
                                        n[s + c].focus();
                                    },
                                })
                            );
                        },
                        Gi = { disabled: xi, hidden: Ei, tabFocus: qi },
                        Ki = {
                            "aria-busy": { default: "false", values: ["true", "false"] },
                            "aria-checked": { default: void 0, values: ["true", "false", "mixed", void 0] },
                            "aria-disabled": { default: "false", values: ["true", "false"] },
                            "aria-expanded": { default: void 0, values: ["true", "false", void 0] },
                            "aria-grabbed": { default: void 0, values: ["true", "false", void 0] },
                            "aria-hidden": { default: "false", values: ["true", "false"] },
                            "aria-invalid": { default: "false", values: ["true", "false", "grammar", "spelling"] },
                            "aria-pressed": { default: void 0, values: ["true", "false", "mixed", void 0] },
                            "aria-selected": { default: void 0, values: ["true", "false", void 0] },
                            "aria-atomic": { default: "false", values: ["true", "false"] },
                            "aria-autocomplete": { default: "none", values: ["inline", "list", "both", "none"] },
                            "aria-dropeffect": { default: "none", multiple: !0, values: ["copy", "move", "link", "execute", "popup", "none"] },
                            "aria-haspopup": { default: "false", values: ["true", "false"] },
                            "aria-live": { default: "off", values: ["off", "polite", "assertive"] },
                            "aria-multiline": { default: "false", values: ["true", "false"] },
                            "aria-multiselectable": { default: "false", values: ["true", "false"] },
                            "aria-orientation": { default: "horizontal", values: ["vertical", "horizontal"] },
                            "aria-readonly": { default: "false", values: ["true", "false"] },
                            "aria-relevant": { default: "additions text", multiple: !0, values: ["additions", "removals", "text", "all"] },
                            "aria-required": { default: "false", values: ["true", "false"] },
                            "aria-sort": { default: "none", other: !0, values: ["ascending", "descending", "none"] },
                        },
                        Vi = { attribute: Ki, keycode: Ni },
                        Zi = 0,
                        $i = 0,
                        Ui = ["touchstart", "pointerdown", "MSPointerDown", "mousedown"],
                        Xi = ["touchend", "touchcancel", "pointerup", "MSPointerUp", "pointercancel", "MSPointerCancel", "mouseup"],
                        zi = Rr({ engage: We, disengage: Re }),
                        Ji = { interactionType: zi, shadowMutations: hi },
                        Qi = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.context,
                                n = e.sequence,
                                r = e.strategy,
                                i = e.ignoreAutofocus,
                                o = e.defaultToContext,
                                a = e.includeOnlyTabbable,
                                u = -1;
                            n || ((t = vt(t || document.body)[0]), (n = Cr({ context: t, includeOnlyTabbable: a, strategy: r }))), n.length && !i && (u = N(n, He)), n.length && -1 === u && (u = N(n, je));
                            var s = hr.rules.except({ onlyTabbable: a });
                            return -1 === u && o && t && s(t) ? t : n[u] || null;
                        },
                        Yi = { firstTabbable: Qi, focusable: wr, shadowHosts: we, tabbable: Cr, tabsequence: Li },
                        eo = "undefined" != typeof document && "onfocusin" in document,
                        to = eo ? "focusin" : "focus",
                        no = eo ? "focusout" : "blur",
                        ro = void 0,
                        io = void 0,
                        oo = null,
                        ao = null,
                        uo = { pointer: !1, key: !1, script: !1, initial: !1 },
                        so = Rr({ engage: Qe, disengage: Je }),
                        lo = void 0,
                        co = "undefined" != typeof document && "onfocusin" in document,
                        fo = co ? "focusin" : "focus",
                        mo = co ? "focusout" : "blur",
                        bo = "ally-focus-within",
                        vo = void 0,
                        ho = void 0,
                        go = void 0,
                        po = Rr({ engage: it, disengage: rt }),
                        xo = { focusSource: so, focusWithin: po },
                        yo = function Oo(e) {
                            var t = e.getBoundingClientRect(),
                                n = at();
                            n.area = n.width * n.height;
                            var r = n,
                                i = ct(e);
                            if (i) {
                                if (!i.width || !i.height) return 0;
                                (r = ot(i, n)), (r.area = i.area);
                            }
                            var o = ot(t, r);
                            if (!o.width || !o.height) return 0;
                            var a = t.width * t.height,
                                u = Math.min(a, r.area),
                                Oo = (Math.round(o.width) * Math.round(o.height)) / u,
                                s = 1e4,
                                l = Math.round(Oo * s) / s;
                            return Math.min(l, 1);
                        },
                        wo = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.context,
                                n = e.callback,
                                r = e.area;
                            if ("function" != typeof n) throw new TypeError("when/visible-area requires options.callback to be a function");
                            "number" != typeof r && (r = 1);
                            var i = ht({ label: "when/visible-area", context: t }),
                                o = void 0,
                                a = null,
                                u = function () {
                                    o && cancelAnimationFrame(o);
                                },
                                s = function () {
                                    return !lr(i) || yo(i) < r || n(i) === !1;
                                },
                                l = function () {
                                    return s() ? void a() : void u();
                                };
                            return (
                                (a = function () {
                                    o = requestAnimationFrame(l);
                                }),
                                a(),
                                { disengage: u }
                            );
                        },
                        Eo = function () {
                            var e = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : {},
                                t = e.context,
                                n = e.callback,
                                r = e.area;
                            if ("function" != typeof n) throw new TypeError("when/focusable requires options.callback to be a function");
                            var i = ht({ label: "when/focusable", context: t }),
                                o = function (e) {
                                    return hr(e) ? n(e) : !1;
                                },
                                a = pt(i),
                                u = wo({ context: i, callback: o, area: r }),
                                s = function l() {
                                    a.removeEventListener("focus", l, !0), u && u.disengage();
                                };
                            return a.addEventListener("focus", s, !0), { disengage: s };
                        },
                        So = { focusable: Eo, key: ji, visibleArea: wo },
                        To = "undefined" != typeof window && window.ally,
                        Ao = {
                            element: Fr,
                            event: Ur,
                            fix: si,
                            get: di,
                            is: fi,
                            maintain: Gi,
                            map: Vi,
                            observe: Ji,
                            query: Yi,
                            style: xo,
                            when: So,
                            version: Bt,
                            noConflict: function () {
                                return "undefined" != typeof window && window.ally === this && (window.ally = To), this;
                            },
                        };
                    t.exports = Ao;
                },
                { "css.escape": 2, platform: 3 },
            ],
            2: [
                function (t, n, r) {
                    (function (t) {
                        !(function (t, i) {
                            "object" == typeof r ? (n.exports = i(t)) : "function" == typeof e && e.amd ? e([], i.bind(t, t)) : i(t);
                        })("undefined" != typeof t ? t : this, function (e) {
                            if (e.CSS && e.CSS.escape) return e.CSS.escape;
                            var t = function (e) {
                                if (0 == arguments.length) throw new TypeError("`CSS.escape` requires an argument.");
                                for (var t, n = String(e), r = n.length, i = -1, o = "", a = n.charCodeAt(0); ++i < r; )
                                    (t = n.charCodeAt(i)),
                                        (o +=
                                            0 != t
                                                ? (t >= 1 && 31 >= t) || 127 == t || (0 == i && t >= 48 && 57 >= t) || (1 == i && t >= 48 && 57 >= t && 45 == a)
                                                    ? "\\" + t.toString(16) + " "
                                                    : (0 != i || 1 != r || 45 != t) && (t >= 128 || 45 == t || 95 == t || (t >= 48 && 57 >= t) || (t >= 65 && 90 >= t) || (t >= 97 && 122 >= t))
                                                    ? n.charAt(i)
                                                    : "\\" + n.charAt(i)
                                                : "�");
                                return o;
                            };
                            return e.CSS || (e.CSS = {}), (e.CSS.escape = t), t;
                        });
                    }.call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {}));
                },
                {},
            ],
            3: [
                function (t, n, r) {
                    (function (t) {
                        (function () {
                            "use strict";
                            function i(e) {
                                return (e = String(e)), e.charAt(0).toUpperCase() + e.slice(1);
                            }
                            function o(e, t, n) {
                                var r = {
                                    "10.0": "10",
                                    6.4: "10 Technical Preview",
                                    6.3: "8.1",
                                    6.2: "8",
                                    6.1: "Server 2008 R2 / 7",
                                    "6.0": "Server 2008 / Vista",
                                    5.2: "Server 2003 / XP 64-bit",
                                    5.1: "XP",
                                    5.01: "2000 SP1",
                                    "5.0": "2000",
                                    "4.0": "NT",
                                    "4.90": "ME",
                                };
                                return (
                                    t && n && /^Win/i.test(e) && !/^Windows Phone /i.test(e) && (r = r[/[\d.]+$/.exec(e)]) && (e = "Windows " + r),
                                    (e = String(e)),
                                    t && n && (e = e.replace(RegExp(t, "i"), n)),
                                    (e = u(
                                        e
                                            .replace(/ ce$/i, " CE")
                                            .replace(/\bhpw/i, "web")
                                            .replace(/\bMacintosh\b/, "Mac OS")
                                            .replace(/_PowerPC\b/i, " OS")
                                            .replace(/\b(OS X) [^ \d]+/i, "$1")
                                            .replace(/\bMac (OS X)\b/, "$1")
                                            .replace(/\/(\d)/, " $1")
                                            .replace(/_/g, ".")
                                            .replace(/(?: BePC|[ .]*fc[ \d.]+)$/i, "")
                                            .replace(/\bx86\.64\b/gi, "x86_64")
                                            .replace(/\b(Windows Phone) OS\b/, "$1")
                                            .replace(/\b(Chrome OS \w+) [\d.]+\b/, "$1")
                                            .split(" on ")[0]
                                    ))
                                );
                            }
                            function a(e, t) {
                                var n = -1,
                                    r = e ? e.length : 0;
                                if ("number" == typeof r && r > -1 && w >= r) for (; ++n < r; ) t(e[n], n, e);
                                else s(e, t);
                            }
                            function u(e) {
                                return (e = m(e)), /^(?:webOS|i(?:OS|P))/.test(e) ? e : i(e);
                            }
                            function s(e, t) {
                                for (var n in e) A.call(e, n) && t(e[n], n, e);
                            }
                            function l(e) {
                                return null == e ? i(e) : O.call(e).slice(8, -1);
                            }
                            function c(e, t) {
                                var n = null != e ? typeof e[t] : "number";
                                return !/^(?:boolean|number|string|undefined)$/.test(n) && ("object" == n ? !!e[t] : !0);
                            }
                            function d(e) {
                                return String(e).replace(/([ -])(?!$)/g, "$1?");
                            }
                            function f(e, t) {
                                var n = null;
                                return (
                                    a(e, function (r, i) {
                                        n = t(n, r, i, e);
                                    }),
                                    n
                                );
                            }
                            function m(e) {
                                return String(e).replace(/^ +| +$/g, "");
                            }
                            function b(e) {
                                function t(t) {
                                    return f(t, function (t, n) {
                                        return t || (RegExp("\\b" + (n.pattern || d(n)) + "\\b", "i").exec(e) && (n.label || n));
                                    });
                                }
                                function n(t) {
                                    return f(t, function (t, n, r) {
                                        return t || ((n[X] || n[/^[a-z]+(?: +[a-z]+\b)*/i.exec(X)] || RegExp("\\b" + d(r) + "(?:\\b|\\w*\\d)", "i").exec(e)) && r);
                                    });
                                }
                                function r(t) {
                                    return f(t, function (t, n) {
                                        return t || (RegExp("\\b" + (n.pattern || d(n)) + "\\b", "i").exec(e) && (n.label || n));
                                    });
                                }
                                function i(t) {
                                    return f(t, function (t, n) {
                                        var r = n.pattern || d(n);
                                        return !t && (t = RegExp("\\b" + r + "(?:/[\\d.]+|[ \\w.]*)", "i").exec(e)) && (t = o(t, r, n.label || n)), t;
                                    });
                                }
                                function a(t) {
                                    return f(t, function (t, n) {
                                        var r = n.pattern || d(n);
                                        return (
                                            !t &&
                                                (t = RegExp("\\b" + r + " *\\d+[.\\w_]*", "i").exec(e) || RegExp("\\b" + r + "(?:; *(?:[a-z]+[_-])?[a-z]+\\d+|[^ ();-]*)", "i").exec(e)) &&
                                                ((t = String(n.label && !RegExp(r, "i").test(n.label) ? n.label : t).split("/"))[1] && !/[\d.]+/.test(t[0]) && (t[0] += " " + t[1]),
                                                (n = n.label || n),
                                                (t = u(
                                                    t[0]
                                                        .replace(RegExp(r, "i"), n)
                                                        .replace(RegExp("; *(?:" + n + "[_-])?", "i"), " ")
                                                        .replace(RegExp("(" + n + ")[-_.]?(\\w)", "i"), "$1 $2")
                                                ))),
                                            t
                                        );
                                    });
                                }
                                function v(t) {
                                    return f(t, function (t, n) {
                                        return t || (RegExp(n + "(?:-[\\d.]+/|(?: for [\\w-]+)?[ /-])([\\d.]+[^ ();/_-]*)", "i").exec(e) || 0)[1] || null;
                                    });
                                }
                                function p() {
                                    return this.description || "";
                                }
                                var x = h,
                                    y = e && "object" == typeof e && "String" != l(e);
                                y && ((x = e), (e = null));
                                var w = x.navigator || {},
                                    T = w.userAgent || "";
                                e || (e = T);
                                var A,
                                    C,
                                    I = y || S == g,
                                    L = y ? !!w.likeChrome : /\bChrome\b/.test(e) && !/internal|\n/i.test(O.toString()),
                                    N = "Object",
                                    M = y ? N : "ScriptBridgingProxyObject",
                                    k = y ? N : "Environment",
                                    _ = y && x.java ? "JavaPackage" : l(x.java),
                                    P = y ? N : "RuntimeObject",
                                    F = /\bJava/.test(_) && x.java,
                                    B = F && l(x.environment) == k,
                                    D = F ? "a" : "α",
                                    R = F ? "b" : "β",
                                    W = x.document || {},
                                    H = x.operamini || x.opera,
                                    j = E.test((j = y && H ? H["[[Class]]"] : l(H))) ? j : (H = null),
                                    q = e,
                                    G = [],
                                    K = null,
                                    V = e == T,
                                    Z = V && H && "function" == typeof H.version && H.version(),
                                    $ = t([{ label: "EdgeHTML", pattern: "Edge" }, "Trident", { label: "WebKit", pattern: "AppleWebKit" }, "iCab", "Presto", "NetFront", "Tasman", "KHTML", "Gecko"]),
                                    U = r([
                                        "Adobe AIR",
                                        "Arora",
                                        "Avant Browser",
                                        "Breach",
                                        "Camino",
                                        "Epiphany",
                                        "Fennec",
                                        "Flock",
                                        "Galeon",
                                        "GreenBrowser",
                                        "iCab",
                                        "Iceweasel",
                                        "K-Meleon",
                                        "Konqueror",
                                        "Lunascape",
                                        "Maxthon",
                                        { label: "Microsoft Edge", pattern: "Edge" },
                                        "Midori",
                                        "Nook Browser",
                                        "PaleMoon",
                                        "PhantomJS",
                                        "Raven",
                                        "Rekonq",
                                        "RockMelt",
                                        "SeaMonkey",
                                        { label: "Silk", pattern: "(?:Cloud9|Silk-Accelerated)" },
                                        "Sleipnir",
                                        "SlimBrowser",
                                        { label: "SRWare Iron", pattern: "Iron" },
                                        "Sunrise",
                                        "Swiftfox",
                                        "WebPositive",
                                        "Opera Mini",
                                        { label: "Opera Mini", pattern: "OPiOS" },
                                        "Opera",
                                        { label: "Opera", pattern: "OPR" },
                                        "Chrome",
                                        { label: "Chrome Mobile", pattern: "(?:CriOS|CrMo)" },
                                        { label: "Firefox", pattern: "(?:Firefox|Minefield)" },
                                        { label: "Firefox for iOS", pattern: "FxiOS" },
                                        { label: "IE", pattern: "IEMobile" },
                                        { label: "IE", pattern: "MSIE" },
                                        "Safari",
                                    ]),
                                    X = a([
                                        { label: "BlackBerry", pattern: "BB10" },
                                        "BlackBerry",
                                        { label: "Galaxy S", pattern: "GT-I9000" },
                                        { label: "Galaxy S2", pattern: "GT-I9100" },
                                        { label: "Galaxy S3", pattern: "GT-I9300" },
                                        { label: "Galaxy S4", pattern: "GT-I9500" },
                                        "Google TV",
                                        "Lumia",
                                        "iPad",
                                        "iPod",
                                        "iPhone",
                                        "Kindle",
                                        { label: "Kindle Fire", pattern: "(?:Cloud9|Silk-Accelerated)" },
                                        "Nexus",
                                        "Nook",
                                        "PlayBook",
                                        "PlayStation 3",
                                        "PlayStation 4",
                                        "PlayStation Vita",
                                        "TouchPad",
                                        "Transformer",
                                        { label: "Wii U", pattern: "WiiU" },
                                        "Wii",
                                        "Xbox One",
                                        { label: "Xbox 360", pattern: "Xbox" },
                                        "Xoom",
                                    ]),
                                    z = n({
                                        Apple: { iPad: 1, iPhone: 1, iPod: 1 },
                                        Archos: {},
                                        Amazon: { Kindle: 1, "Kindle Fire": 1 },
                                        Asus: { Transformer: 1 },
                                        "Barnes & Noble": { Nook: 1 },
                                        BlackBerry: { PlayBook: 1 },
                                        Google: { "Google TV": 1, Nexus: 1 },
                                        HP: { TouchPad: 1 },
                                        HTC: {},
                                        LG: {},
                                        Microsoft: { Xbox: 1, "Xbox One": 1 },
                                        Motorola: { Xoom: 1 },
                                        Nintendo: { "Wii U": 1, Wii: 1 },
                                        Nokia: { Lumia: 1 },
                                        Samsung: { "Galaxy S": 1, "Galaxy S2": 1, "Galaxy S3": 1, "Galaxy S4": 1 },
                                        Sony: { "PlayStation 4": 1, "PlayStation 3": 1, "PlayStation Vita": 1 },
                                    }),
                                    J = i([
                                        "Windows Phone",
                                        "Android",
                                        "CentOS",
                                        { label: "Chrome OS", pattern: "CrOS" },
                                        "Debian",
                                        "Fedora",
                                        "FreeBSD",
                                        "Gentoo",
                                        "Haiku",
                                        "Kubuntu",
                                        "Linux Mint",
                                        "OpenBSD",
                                        "Red Hat",
                                        "SuSE",
                                        "Ubuntu",
                                        "Xubuntu",
                                        "Cygwin",
                                        "Symbian OS",
                                        "hpwOS",
                                        "webOS ",
                                        "webOS",
                                        "Tablet OS",
                                        "Linux",
                                        "Mac OS X",
                                        "Macintosh",
                                        "Mac",
                                        "Windows 98;",
                                        "Windows ",
                                    ]);
                                if (
                                    ($ && ($ = [$]),
                                    z && !X && (X = a([z])),
                                    (A = /\bGoogle TV\b/.exec(X)) && (X = A[0]),
                                    /\bSimulator\b/i.test(e) && (X = (X ? X + " " : "") + "Simulator"),
                                    "Opera Mini" == U && /\bOPiOS\b/.test(e) && G.push("running in Turbo/Uncompressed mode"),
                                    "IE" == U && /\blike iPhone OS\b/.test(e)
                                        ? ((A = b(e.replace(/like iPhone OS/, ""))), (z = A.manufacturer), (X = A.product))
                                        : /^iP/.test(X)
                                        ? (U || (U = "Safari"), (J = "iOS" + ((A = / OS ([\d_]+)/i.exec(e)) ? " " + A[1].replace(/_/g, ".") : "")))
                                        : "Konqueror" != U || /buntu/i.test(J)
                                        ? (z && "Google" != z && ((/Chrome/.test(U) && !/\bMobile Safari\b/i.test(e)) || /\bVita\b/.test(X))) || (/\bAndroid\b/.test(J) && /^Chrome/.test(U) && /\bVersion\//i.test(e))
                                            ? ((U = "Android Browser"), (J = /\bAndroid\b/.test(J) ? J : "Android"))
                                            : "Silk" == U
                                            ? (/\bMobi/i.test(e) || ((J = "Android"), G.unshift("desktop mode")), /Accelerated *= *true/i.test(e) && G.unshift("accelerated"))
                                            : "PaleMoon" == U && (A = /\bFirefox\/([\d.]+)\b/.exec(e))
                                            ? G.push("identifying as Firefox " + A[1])
                                            : "Firefox" == U && (A = /\b(Mobile|Tablet|TV)\b/i.exec(e))
                                            ? (J || (J = "Firefox OS"), X || (X = A[1]))
                                            : (!U || (A = !/\bMinefield\b/i.test(e) && /\b(?:Firefox|Safari)\b/.exec(U))) &&
                                              (U && !X && /[\/,]|^[^(]+?\)/.test(e.slice(e.indexOf(A + "/") + 8)) && (U = null),
                                              (A = X || z || J) && (X || z || /\b(?:Android|Symbian OS|Tablet OS|webOS)\b/.test(J)) && (U = /[a-z]+(?: Hat)?/i.exec(/\bAndroid\b/.test(J) ? J : A) + " Browser"))
                                        : (J = "Kubuntu"),
                                    Z || (Z = v(["(?:Cloud9|CriOS|CrMo|Edge|FxiOS|IEMobile|Iron|Opera ?Mini|OPiOS|OPR|Raven|Silk(?!/[\\d.]+$))", "Version", d(U), "(?:Firefox|Minefield|NetFront)"])),
                                    (A =
                                        ("iCab" == $ && parseFloat(Z) > 3 && "WebKit") ||
                                        (/\bOpera\b/.test(U) && (/\bOPR\b/.test(e) ? "Blink" : "Presto")) ||
                                        (/\b(?:Midori|Nook|Safari)\b/i.test(e) && !/^(?:Trident|EdgeHTML)$/.test($) && "WebKit") ||
                                        (!$ && /\bMSIE\b/i.test(e) && ("Mac OS" == J ? "Tasman" : "Trident")) ||
                                        ("WebKit" == $ && /\bPlayStation\b(?! Vita\b)/i.test(U) && "NetFront")) && ($ = [A]),
                                    "IE" == U && (A = (/; *(?:XBLWP|ZuneWP)(\d+)/i.exec(e) || 0)[1])
                                        ? ((U += " Mobile"), (J = "Windows Phone " + (/\+$/.test(A) ? A : A + ".x")), G.unshift("desktop mode"))
                                        : /\bWPDesktop\b/i.test(e)
                                        ? ((U = "IE Mobile"), (J = "Windows Phone 8.x"), G.unshift("desktop mode"), Z || (Z = (/\brv:([\d.]+)/.exec(e) || 0)[1]))
                                        : "IE" != U && "Trident" == $ && (A = /\brv:([\d.]+)/.exec(e)) && (U && G.push("identifying as " + U + (Z ? " " + Z : "")), (U = "IE"), (Z = A[1])),
                                    V)
                                ) {
                                    if (c(x, "global"))
                                        if ((F && ((A = F.lang.System), (q = A.getProperty("os.arch")), (J = J || A.getProperty("os.name") + " " + A.getProperty("os.version"))), I && c(x, "system") && (A = [x.system])[0])) {
                                            J || (J = A[0].os || null);
                                            try {
                                                (A[1] = x.require("ringo/engine").version), (Z = A[1].join(".")), (U = "RingoJS");
                                            } catch (Q) {
                                                A[0].global.system == x.system && (U = "Narwhal");
                                            }
                                        } else "object" == typeof x.process && !x.process.browser && (A = x.process) ? ((U = "Node.js"), (q = A.arch), (J = A.platform), (Z = /[\d.]+/.exec(A.version)[0])) : B && (U = "Rhino");
                                    else
                                        l((A = x.runtime)) == M
                                            ? ((U = "Adobe AIR"), (J = A.flash.system.Capabilities.os))
                                            : l((A = x.phantom)) == P
                                            ? ((U = "PhantomJS"), (Z = (A = A.version || null) && A.major + "." + A.minor + "." + A.patch))
                                            : "number" == typeof W.documentMode &&
                                              (A = /\bTrident\/(\d+)/i.exec(e)) &&
                                              ((Z = [Z, W.documentMode]), (A = +A[1] + 4) != Z[1] && (G.push("IE " + Z[1] + " mode"), $ && ($[1] = ""), (Z[1] = A)), (Z = "IE" == U ? String(Z[1].toFixed(1)) : Z[0]));
                                    J = J && u(J);
                                }
                                Z &&
                                    (A = /(?:[ab]|dp|pre|[ab]\d+pre)(?:\d+\+?)?$/i.exec(Z) || /(?:alpha|beta)(?: ?\d)?/i.exec(e + ";" + (V && w.appMinorVersion)) || (/\bMinefield\b/i.test(e) && "a")) &&
                                    ((K = /b/i.test(A) ? "beta" : "alpha"), (Z = Z.replace(RegExp(A + "\\+?$"), "") + ("beta" == K ? R : D) + (/\d+\+?/.exec(A) || ""))),
                                    "Fennec" == U || ("Firefox" == U && /\b(?:Android|Firefox OS)\b/.test(J))
                                        ? (U = "Firefox Mobile")
                                        : "Maxthon" == U && Z
                                        ? (Z = Z.replace(/\.[\d.]+/, ".x"))
                                        : /\bXbox\b/i.test(X)
                                        ? ((J = null), "Xbox 360" == X && /\bIEMobile\b/.test(e) && G.unshift("mobile mode"))
                                        : (!/^(?:Chrome|IE|Opera)$/.test(U) && (!U || X || /Browser|Mobi/.test(U))) || ("Windows CE" != J && !/Mobi/i.test(e))
                                        ? "IE" == U && V && null === x.external
                                            ? G.unshift("platform preview")
                                            : (/\bBlackBerry\b/.test(X) || /\bBB10\b/.test(e)) && (A = (RegExp(X.replace(/ +/g, " *") + "/([.\\d]+)", "i").exec(e) || 0)[1] || Z)
                                            ? ((A = [A, /BB10/.test(e)]), (J = (A[1] ? ((X = null), (z = "BlackBerry")) : "Device Software") + " " + A[0]), (Z = null))
                                            : this != s &&
                                              "Wii" != X &&
                                              ((V && H) ||
                                                  (/Opera/.test(U) && /\b(?:MSIE|Firefox)\b/i.test(e)) ||
                                                  ("Firefox" == U && /\bOS X (?:\d+\.){2,}/.test(J)) ||
                                                  ("IE" == U && ((J && !/^Win/.test(J) && Z > 5.5) || (/\bWindows XP\b/.test(J) && Z > 8) || (8 == Z && !/\bTrident\b/.test(e))))) &&
                                              !E.test((A = b.call(s, e.replace(E, "") + ";"))) &&
                                              A.name &&
                                              ((A = "ing as " + A.name + ((A = A.version) ? " " + A : "")),
                                              E.test(U)
                                                  ? (/\bIE\b/.test(A) && "Mac OS" == J && (J = null), (A = "identify" + A))
                                                  : ((A = "mask" + A), (U = j ? u(j.replace(/([a-z])([A-Z])/g, "$1 $2")) : "Opera"), /\bIE\b/.test(A) && (J = null), V || (Z = null)),
                                              ($ = ["Presto"]),
                                              G.push(A))
                                        : (U += " Mobile"),
                                    (A = (/\bAppleWebKit\/([\d.]+\+?)/i.exec(e) || 0)[1]) &&
                                        ((A = [parseFloat(A.replace(/\.(\d)$/, ".0$1")), A]),
                                        "Safari" == U && "+" == A[1].slice(-1) ? ((U = "WebKit Nightly"), (K = "alpha"), (Z = A[1].slice(0, -1))) : (Z == A[1] || Z == (A[2] = (/\bSafari\/([\d.]+\+?)/i.exec(e) || 0)[1])) && (Z = null),
                                        (A[1] = (/\bChrome\/([\d.]+)/i.exec(e) || 0)[1]),
                                        537.36 == A[0] && 537.36 == A[2] && parseFloat(A[1]) >= 28 && "WebKit" == $ && ($ = ["Blink"]),
                                        V && (L || A[1])
                                            ? ($ && ($[1] = "like Chrome"),
                                              (A =
                                                  A[1] ||
                                                  ((A = A[0]),
                                                  530 > A
                                                      ? 1
                                                      : 532 > A
                                                      ? 2
                                                      : 532.05 > A
                                                      ? 3
                                                      : 533 > A
                                                      ? 4
                                                      : 534.03 > A
                                                      ? 5
                                                      : 534.07 > A
                                                      ? 6
                                                      : 534.1 > A
                                                      ? 7
                                                      : 534.13 > A
                                                      ? 8
                                                      : 534.16 > A
                                                      ? 9
                                                      : 534.24 > A
                                                      ? 10
                                                      : 534.3 > A
                                                      ? 11
                                                      : 535.01 > A
                                                      ? 12
                                                      : 535.02 > A
                                                      ? "13+"
                                                      : 535.07 > A
                                                      ? 15
                                                      : 535.11 > A
                                                      ? 16
                                                      : 535.19 > A
                                                      ? 17
                                                      : 536.05 > A
                                                      ? 18
                                                      : 536.1 > A
                                                      ? 19
                                                      : 537.01 > A
                                                      ? 20
                                                      : 537.11 > A
                                                      ? "21+"
                                                      : 537.13 > A
                                                      ? 23
                                                      : 537.18 > A
                                                      ? 24
                                                      : 537.24 > A
                                                      ? 25
                                                      : 537.36 > A
                                                      ? 26
                                                      : "Blink" != $
                                                      ? "27"
                                                      : "28")))
                                            : ($ && ($[1] = "like Safari"), (A = A[0]), (A = 400 > A ? 1 : 500 > A ? 2 : 526 > A ? 3 : 533 > A ? 4 : 534 > A ? "4+" : 535 > A ? 5 : 537 > A ? 6 : 538 > A ? 7 : 601 > A ? 8 : "8")),
                                        $ && ($[1] += " " + (A += "number" == typeof A ? ".x" : /[.+]/.test(A) ? "" : "+")),
                                        "Safari" == U && (!Z || parseInt(Z) > 45) && (Z = A)),
                                    "Opera" == U && (A = /\bzbov|zvav$/.exec(J))
                                        ? ((U += " "), G.unshift("desktop mode"), "zvav" == A ? ((U += "Mini"), (Z = null)) : (U += "Mobile"), (J = J.replace(RegExp(" *" + A + "$"), "")))
                                        : "Safari" == U && /\bChrome\b/.exec($ && $[1]) && (G.unshift("desktop mode"), (U = "Chrome Mobile"), (Z = null), /\bOS X\b/.test(J) ? ((z = "Apple"), (J = "iOS 4.3+")) : (J = null)),
                                    Z && 0 == Z.indexOf((A = /[\d.]+$/.exec(J))) && e.indexOf("/" + A + "-") > -1 && (J = m(J.replace(A, ""))),
                                    $ &&
                                        !/\b(?:Avant|Nook)\b/.test(U) &&
                                        (/Browser|Lunascape|Maxthon/.test(U) || ("Safari" != U && /^iOS/.test(J) && /\bSafari\b/.test($[1])) || (/^(?:Adobe|Arora|Breach|Midori|Opera|Phantom|Rekonq|Rock|Sleipnir|Web)/.test(U) && $[1])) &&
                                        (A = $[$.length - 1]) &&
                                        G.push(A),
                                    G.length && (G = ["(" + G.join("; ") + ")"]),
                                    z && X && X.indexOf(z) < 0 && G.push("on " + z),
                                    X && G.push((/^on /.test(G[G.length - 1]) ? "" : "on ") + X),
                                    J &&
                                        ((A = / ([\d.+]+)$/.exec(J)),
                                        (C = A && "/" == J.charAt(J.length - A[0].length - 1)),
                                        (J = {
                                            architecture: 32,
                                            family: A && !C ? J.replace(A[0], "") : J,
                                            version: A ? A[1] : null,
                                            toString: function () {
                                                var e = this.version;
                                                return this.family + (e && !C ? " " + e : "") + (64 == this.architecture ? " 64-bit" : "");
                                            },
                                        })),
                                    (A = /\b(?:AMD|IA|Win|WOW|x86_|x)64\b/i.exec(q)) && !/\bi686\b/i.test(q)
                                        ? (J && ((J.architecture = 64), (J.family = J.family.replace(RegExp(" *" + A), ""))),
                                          U && (/\bWOW64\b/i.test(e) || (V && /\w(?:86|32)$/.test(w.cpuClass || w.platform) && !/\bWin64; x64\b/i.test(e))) && G.unshift("32-bit"))
                                        : J && /^OS X/.test(J.family) && "Chrome" == U && parseFloat(Z) >= 39 && (J.architecture = 64),
                                    e || (e = null);
                                var Y = {};
                                return (
                                    (Y.description = e),
                                    (Y.layout = $ && $[0]),
                                    (Y.manufacturer = z),
                                    (Y.name = U),
                                    (Y.prerelease = K),
                                    (Y.product = X),
                                    (Y.ua = e),
                                    (Y.version = U && Z),
                                    (Y.os = J || {
                                        architecture: null,
                                        family: null,
                                        version: null,
                                        toString: function () {
                                            return "null";
                                        },
                                    }),
                                    (Y.parse = b),
                                    (Y.toString = p),
                                    Y.version && G.unshift(Z),
                                    Y.name && G.unshift(U),
                                    J && U && (J != String(J).split(" ")[0] || (J != U.split(" ")[0] && !X)) && G.push(X ? "(" + J + ")" : "on " + J),
                                    G.length && (Y.description = G.join(" ")),
                                    Y
                                );
                            }
                            var v = { function: !0, object: !0 },
                                h = (v[typeof window] && window) || this,
                                g = h,
                                p = v[typeof r] && r,
                                x = v[typeof n] && n && !n.nodeType && n,
                                y = p && x && "object" == typeof t && t;
                            !y || (y.global !== y && y.window !== y && y.self !== y) || (h = y);
                            var w = Math.pow(2, 53) - 1,
                                E = /\bOpera/,
                                S = this,
                                T = Object.prototype,
                                A = T.hasOwnProperty,
                                O = T.toString,
                                C = b();
                            "function" == typeof e && "object" == typeof e.amd && e.amd
                                ? ((h.platform = C),
                                  e(function () {
                                      return C;
                                  }))
                                : p && x
                                ? s(C, function (e, t) {
                                      p[t] = e;
                                  })
                                : (h.platform = C);
                        }.call(this));
                    }.call(this, "undefined" != typeof global ? global : "undefined" != typeof self ? self : "undefined" != typeof window ? window : {}));
                },
                {},
            ],
        },
        {},
        [1]
    )(1);
});
//# sourceMappingURL=ally.min.js.map
