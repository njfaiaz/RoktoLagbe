!(function (a, b) {
    "use strict";
    "object" == typeof module && "object" == typeof module.exports
        ? (module.exports = a.document
              ? b(a, !0)
              : function (a) {
                    if (!a.document)
                        throw new Error(
                            "jQuery requires a window with a document"
                        );
                    return b(a);
                })
        : b(a);
})("undefined" != typeof window ? window : this, function (a, b) {
    "use strict";
    function c(a, b, c) {
        var d,
            e = (b = b || ga).createElement("script");
        if (((e.text = a), c)) for (d in ua) c[d] && (e[d] = c[d]);
        b.head.appendChild(e).parentNode.removeChild(e);
    }
    function d(a) {
        return null == a
            ? a + ""
            : "object" == typeof a || "function" == typeof a
            ? ma[na.call(a)] || "object"
            : typeof a;
    }
    function e(a) {
        var b = !!a && "length" in a && a.length,
            c = d(a);
        return (
            !sa(a) &&
            !ta(a) &&
            ("array" === c ||
                0 === b ||
                ("number" == typeof b && b > 0 && b - 1 in a))
        );
    }
    function f(a, b) {
        return a.nodeName && a.nodeName.toLowerCase() === b.toLowerCase();
    }
    function g(a, b, c) {
        return sa(b)
            ? va.grep(a, function (a, d) {
                  return !!b.call(a, d, a) !== c;
              })
            : b.nodeType
            ? va.grep(a, function (a) {
                  return (a === b) !== c;
              })
            : "string" != typeof b
            ? va.grep(a, function (a) {
                  return la.call(b, a) > -1 !== c;
              })
            : va.filter(b, a, c);
    }
    function h(a, b) {
        for (; (a = a[b]) && 1 !== a.nodeType; );
        return a;
    }
    function i(a) {
        var b = {};
        return (
            va.each(a.match(Ga) || [], function (a, c) {
                b[c] = !0;
            }),
            b
        );
    }
    function j(a) {
        return a;
    }
    function k(a) {
        throw a;
    }
    function l(a, b, c, d) {
        var e;
        try {
            a && sa((e = a.promise))
                ? e.call(a).done(b).fail(c)
                : a && sa((e = a.then))
                ? e.call(a, b, c)
                : b.apply(void 0, [a].slice(d));
        } catch (a) {
            c.apply(void 0, [a]);
        }
    }
    function m() {
        ga.removeEventListener("DOMContentLoaded", m),
            a.removeEventListener("load", m),
            va.ready();
    }
    function n(a, b) {
        return b.toUpperCase();
    }
    function o(a) {
        return a.replace(Ka, "ms-").replace(La, n);
    }
    function p() {
        this.expando = va.expando + p.uid++;
    }
    function q(a) {
        return (
            "true" === a ||
            ("false" !== a &&
                ("null" === a
                    ? null
                    : a === +a + ""
                    ? +a
                    : Pa.test(a)
                    ? JSON.parse(a)
                    : a))
        );
    }
    function r(a, b, c) {
        var d;
        if (void 0 === c && 1 === a.nodeType)
            if (
                ((d = "data-" + b.replace(Qa, "-$&").toLowerCase()),
                "string" == typeof (c = a.getAttribute(d)))
            ) {
                try {
                    c = q(c);
                } catch (a) {}
                Oa.set(a, b, c);
            } else c = void 0;
        return c;
    }
    function s(a, b, c, d) {
        var e,
            f,
            g = 20,
            h = d
                ? function () {
                      return d.cur();
                  }
                : function () {
                      return va.css(a, b, "");
                  },
            i = h(),
            j = (c && c[3]) || (va.cssNumber[b] ? "" : "px"),
            k =
                (va.cssNumber[b] || ("px" !== j && +i)) &&
                Sa.exec(va.css(a, b));
        if (k && k[3] !== j) {
            for (i /= 2, j = j || k[3], k = +i || 1; g--; )
                va.style(a, b, k + j),
                    (1 - f) * (1 - (f = h() / i || 0.5)) <= 0 && (g = 0),
                    (k /= f);
            (k *= 2), va.style(a, b, k + j), (c = c || []);
        }
        return (
            c &&
                ((k = +k || +i || 0),
                (e = c[1] ? k + (c[1] + 1) * c[2] : +c[2]),
                d && ((d.unit = j), (d.start = k), (d.end = e))),
            e
        );
    }
    function t(a) {
        var b,
            c = a.ownerDocument,
            d = a.nodeName,
            e = Wa[d];
        return (
            e ||
            ((b = c.body.appendChild(c.createElement(d))),
            (e = va.css(b, "display")),
            b.parentNode.removeChild(b),
            "none" === e && (e = "block"),
            (Wa[d] = e),
            e)
        );
    }
    function u(a, b) {
        for (var c, d, e = [], f = 0, g = a.length; f < g; f++)
            (d = a[f]).style &&
                ((c = d.style.display),
                b
                    ? ("none" === c &&
                          ((e[f] = Na.get(d, "display") || null),
                          e[f] || (d.style.display = "")),
                      "" === d.style.display && Ua(d) && (e[f] = t(d)))
                    : "none" !== c &&
                      ((e[f] = "none"), Na.set(d, "display", c)));
        for (f = 0; f < g; f++) null != e[f] && (a[f].style.display = e[f]);
        return a;
    }
    function v(a, b) {
        var c;
        return (
            (c =
                void 0 !== a.getElementsByTagName
                    ? a.getElementsByTagName(b || "*")
                    : void 0 !== a.querySelectorAll
                    ? a.querySelectorAll(b || "*")
                    : []),
            void 0 === b || (b && f(a, b)) ? va.merge([a], c) : c
        );
    }
    function w(a, b) {
        for (var c = 0, d = a.length; c < d; c++)
            Na.set(a[c], "globalEval", !b || Na.get(b[c], "globalEval"));
    }
    function x(a, b, c, e, f) {
        for (
            var g,
                h,
                i,
                j,
                k,
                l,
                m = b.createDocumentFragment(),
                n = [],
                o = 0,
                p = a.length;
            o < p;
            o++
        )
            if ((g = a[o]) || 0 === g)
                if ("object" === d(g)) va.merge(n, g.nodeType ? [g] : g);
                else if (_a.test(g)) {
                    for (
                        h = h || m.appendChild(b.createElement("div")),
                            i = (Ya.exec(g) || ["", ""])[1].toLowerCase(),
                            j = $a[i] || $a._default,
                            h.innerHTML = j[1] + va.htmlPrefilter(g) + j[2],
                            l = j[0];
                        l--;

                    )
                        h = h.lastChild;
                    va.merge(n, h.childNodes),
                        ((h = m.firstChild).textContent = "");
                } else n.push(b.createTextNode(g));
        for (m.textContent = "", o = 0; (g = n[o++]); )
            if (e && va.inArray(g, e) > -1) f && f.push(g);
            else if (
                ((k = va.contains(g.ownerDocument, g)),
                (h = v(m.appendChild(g), "script")),
                k && w(h),
                c)
            )
                for (l = 0; (g = h[l++]); ) Za.test(g.type || "") && c.push(g);
        return m;
    }
    function y() {
        return !0;
    }
    function z() {
        return !1;
    }
    function A() {
        try {
            return ga.activeElement;
        } catch (a) {}
    }
    function B(a, b, c, d, e, f) {
        var g, h;
        if ("object" == typeof b) {
            "string" != typeof c && ((d = d || c), (c = void 0));
            for (h in b) B(a, h, c, d, b[h], f);
            return a;
        }
        if (
            (null == d && null == e
                ? ((e = c), (d = c = void 0))
                : null == e &&
                  ("string" == typeof c
                      ? ((e = d), (d = void 0))
                      : ((e = d), (d = c), (c = void 0))),
            !1 === e)
        )
            e = z;
        else if (!e) return a;
        return (
            1 === f &&
                ((g = e),
                ((e = function (a) {
                    return va().off(a), g.apply(this, arguments);
                }).guid = g.guid || (g.guid = va.guid++))),
            a.each(function () {
                va.event.add(this, b, e, d, c);
            })
        );
    }
    function C(a, b) {
        return f(a, "table") && f(11 !== b.nodeType ? b : b.firstChild, "tr")
            ? va(a).children("tbody")[0] || a
            : a;
    }
    function D(a) {
        return (a.type = (null !== a.getAttribute("type")) + "/" + a.type), a;
    }
    function E(a) {
        return (
            "true/" === (a.type || "").slice(0, 5)
                ? (a.type = a.type.slice(5))
                : a.removeAttribute("type"),
            a
        );
    }
    function F(a, b) {
        var c, d, e, f, g, h, i, j;
        if (1 === b.nodeType) {
            if (
                Na.hasData(a) &&
                ((f = Na.access(a)), (g = Na.set(b, f)), (j = f.events))
            ) {
                delete g.handle, (g.events = {});
                for (e in j)
                    for (c = 0, d = j[e].length; c < d; c++)
                        va.event.add(b, e, j[e][c]);
            }
            Oa.hasData(a) &&
                ((h = Oa.access(a)), (i = va.extend({}, h)), Oa.set(b, i));
        }
    }
    function G(a, b) {
        var c = b.nodeName.toLowerCase();
        "input" === c && Xa.test(a.type)
            ? (b.checked = a.checked)
            : ("input" !== c && "textarea" !== c) ||
              (b.defaultValue = a.defaultValue);
    }
    function H(a, b, d, e) {
        b = ja.apply([], b);
        var f,
            g,
            h,
            i,
            j,
            k,
            l = 0,
            m = a.length,
            n = m - 1,
            o = b[0],
            p = sa(o);
        if (
            p ||
            (m > 1 && "string" == typeof o && !ra.checkClone && gb.test(o))
        )
            return a.each(function (c) {
                var f = a.eq(c);
                p && (b[0] = o.call(this, c, f.html())), H(f, b, d, e);
            });
        if (
            m &&
            ((f = x(b, a[0].ownerDocument, !1, a, e)),
            (g = f.firstChild),
            1 === f.childNodes.length && (f = g),
            g || e)
        ) {
            for (i = (h = va.map(v(f, "script"), D)).length; l < m; l++)
                (j = f),
                    l !== n &&
                        ((j = va.clone(j, !0, !0)),
                        i && va.merge(h, v(j, "script"))),
                    d.call(a[l], j, l);
            if (i)
                for (
                    k = h[h.length - 1].ownerDocument, va.map(h, E), l = 0;
                    l < i;
                    l++
                )
                    (j = h[l]),
                        Za.test(j.type || "") &&
                            !Na.access(j, "globalEval") &&
                            va.contains(k, j) &&
                            (j.src && "module" !== (j.type || "").toLowerCase()
                                ? va._evalUrl && va._evalUrl(j.src)
                                : c(j.textContent.replace(hb, ""), k, j));
        }
        return a;
    }
    function I(a, b, c) {
        for (var d, e = b ? va.filter(b, a) : a, f = 0; null != (d = e[f]); f++)
            c || 1 !== d.nodeType || va.cleanData(v(d)),
                d.parentNode &&
                    (c && va.contains(d.ownerDocument, d) && w(v(d, "script")),
                    d.parentNode.removeChild(d));
        return a;
    }
    function J(a, b, c) {
        var d,
            e,
            f,
            g,
            h = a.style;
        return (
            (c = c || jb(a)) &&
                ("" !== (g = c.getPropertyValue(b) || c[b]) ||
                    va.contains(a.ownerDocument, a) ||
                    (g = va.style(a, b)),
                !ra.pixelBoxStyles() &&
                    ib.test(g) &&
                    kb.test(b) &&
                    ((d = h.width),
                    (e = h.minWidth),
                    (f = h.maxWidth),
                    (h.minWidth = h.maxWidth = h.width = g),
                    (g = c.width),
                    (h.width = d),
                    (h.minWidth = e),
                    (h.maxWidth = f))),
            void 0 !== g ? g + "" : g
        );
    }
    function K(a, b) {
        return {
            get: function () {
                if (!a()) return (this.get = b).apply(this, arguments);
                delete this.get;
            },
        };
    }
    function L(a) {
        if (a in qb) return a;
        for (var b = a[0].toUpperCase() + a.slice(1), c = pb.length; c--; )
            if ((a = pb[c] + b) in qb) return a;
    }
    function M(a) {
        var b = va.cssProps[a];
        return b || (b = va.cssProps[a] = L(a) || a), b;
    }
    function N(a, b, c) {
        var d = Sa.exec(b);
        return d ? Math.max(0, d[2] - (c || 0)) + (d[3] || "px") : b;
    }
    function O(a, b, c, d, e, f) {
        var g = "width" === b ? 1 : 0,
            h = 0,
            i = 0;
        if (c === (d ? "border" : "content")) return 0;
        for (; g < 4; g += 2)
            "margin" === c && (i += va.css(a, c + Ta[g], !0, e)),
                d
                    ? ("content" === c &&
                          (i -= va.css(a, "padding" + Ta[g], !0, e)),
                      "margin" !== c &&
                          (i -= va.css(a, "border" + Ta[g] + "Width", !0, e)))
                    : ((i += va.css(a, "padding" + Ta[g], !0, e)),
                      "padding" !== c
                          ? (i += va.css(a, "border" + Ta[g] + "Width", !0, e))
                          : (h += va.css(
                                a,
                                "border" + Ta[g] + "Width",
                                !0,
                                e
                            )));
        return (
            !d &&
                f >= 0 &&
                (i += Math.max(
                    0,
                    Math.ceil(
                        a["offset" + b[0].toUpperCase() + b.slice(1)] -
                            f -
                            i -
                            h -
                            0.5
                    )
                )),
            i
        );
    }
    function P(a, b, c) {
        var d = jb(a),
            e = J(a, b, d),
            f = "border-box" === va.css(a, "boxSizing", !1, d),
            g = f;
        if (ib.test(e)) {
            if (!c) return e;
            e = "auto";
        }
        return (
            (g = g && (ra.boxSizingReliable() || e === a.style[b])),
            ("auto" === e ||
                (!parseFloat(e) && "inline" === va.css(a, "display", !1, d))) &&
                ((e = a["offset" + b[0].toUpperCase() + b.slice(1)]), (g = !0)),
            (e = parseFloat(e) || 0) +
                O(a, b, c || (f ? "border" : "content"), g, d, e) +
                "px"
        );
    }
    function Q(a, b, c, d, e) {
        return new Q.prototype.init(a, b, c, d, e);
    }
    function R() {
        sb &&
            (!1 === ga.hidden && a.requestAnimationFrame
                ? a.requestAnimationFrame(R)
                : a.setTimeout(R, va.fx.interval),
            va.fx.tick());
    }
    function S() {
        return (
            a.setTimeout(function () {
                rb = void 0;
            }),
            (rb = Date.now())
        );
    }
    function T(a, b) {
        var c,
            d = 0,
            e = { height: a };
        for (b = b ? 1 : 0; d < 4; d += 2 - b)
            e["margin" + (c = Ta[d])] = e["padding" + c] = a;
        return b && (e.opacity = e.width = a), e;
    }
    function U(a, b, c) {
        for (
            var d,
                e = (X.tweeners[b] || []).concat(X.tweeners["*"]),
                f = 0,
                g = e.length;
            f < g;
            f++
        )
            if ((d = e[f].call(c, b, a))) return d;
    }
    function V(a, b, c) {
        var d,
            e,
            f,
            g,
            h,
            i,
            j,
            k,
            l = "width" in b || "height" in b,
            m = this,
            n = {},
            o = a.style,
            p = a.nodeType && Ua(a),
            q = Na.get(a, "fxshow");
        c.queue ||
            (null == (g = va._queueHooks(a, "fx")).unqueued &&
                ((g.unqueued = 0),
                (h = g.empty.fire),
                (g.empty.fire = function () {
                    g.unqueued || h();
                })),
            g.unqueued++,
            m.always(function () {
                m.always(function () {
                    g.unqueued--, va.queue(a, "fx").length || g.empty.fire();
                });
            }));
        for (d in b)
            if (((e = b[d]), tb.test(e))) {
                if (
                    (delete b[d],
                    (f = f || "toggle" === e),
                    e === (p ? "hide" : "show"))
                ) {
                    if ("show" !== e || !q || void 0 === q[d]) continue;
                    p = !0;
                }
                n[d] = (q && q[d]) || va.style(a, d);
            }
        if ((i = !va.isEmptyObject(b)) || !va.isEmptyObject(n)) {
            l &&
                1 === a.nodeType &&
                ((c.overflow = [o.overflow, o.overflowX, o.overflowY]),
                null == (j = q && q.display) && (j = Na.get(a, "display")),
                "none" === (k = va.css(a, "display")) &&
                    (j
                        ? (k = j)
                        : (u([a], !0),
                          (j = a.style.display || j),
                          (k = va.css(a, "display")),
                          u([a]))),
                ("inline" === k || ("inline-block" === k && null != j)) &&
                    "none" === va.css(a, "float") &&
                    (i ||
                        (m.done(function () {
                            o.display = j;
                        }),
                        null == j &&
                            ((k = o.display), (j = "none" === k ? "" : k))),
                    (o.display = "inline-block"))),
                c.overflow &&
                    ((o.overflow = "hidden"),
                    m.always(function () {
                        (o.overflow = c.overflow[0]),
                            (o.overflowX = c.overflow[1]),
                            (o.overflowY = c.overflow[2]);
                    })),
                (i = !1);
            for (d in n)
                i ||
                    (q
                        ? "hidden" in q && (p = q.hidden)
                        : (q = Na.access(a, "fxshow", { display: j })),
                    f && (q.hidden = !p),
                    p && u([a], !0),
                    m.done(function () {
                        p || u([a]), Na.remove(a, "fxshow");
                        for (d in n) va.style(a, d, n[d]);
                    })),
                    (i = U(p ? q[d] : 0, d, m)),
                    d in q ||
                        ((q[d] = i.start),
                        p && ((i.end = i.start), (i.start = 0)));
        }
    }
    function W(a, b) {
        var c, d, e, f, g;
        for (c in a)
            if (
                ((d = o(c)),
                (e = b[d]),
                (f = a[c]),
                Array.isArray(f) && ((e = f[1]), (f = a[c] = f[0])),
                c !== d && ((a[d] = f), delete a[c]),
                (g = va.cssHooks[d]) && "expand" in g)
            ) {
                (f = g.expand(f)), delete a[d];
                for (c in f) c in a || ((a[c] = f[c]), (b[c] = e));
            } else b[d] = e;
    }
    function X(a, b, c) {
        var d,
            e,
            f = 0,
            g = X.prefilters.length,
            h = va.Deferred().always(function () {
                delete i.elem;
            }),
            i = function () {
                if (e) return !1;
                for (
                    var b = rb || S(),
                        c = Math.max(0, j.startTime + j.duration - b),
                        d = 1 - (c / j.duration || 0),
                        f = 0,
                        g = j.tweens.length;
                    f < g;
                    f++
                )
                    j.tweens[f].run(d);
                return (
                    h.notifyWith(a, [j, d, c]),
                    d < 1 && g
                        ? c
                        : (g || h.notifyWith(a, [j, 1, 0]),
                          h.resolveWith(a, [j]),
                          !1)
                );
            },
            j = h.promise({
                elem: a,
                props: va.extend({}, b),
                opts: va.extend(
                    !0,
                    { specialEasing: {}, easing: va.easing._default },
                    c
                ),
                originalProperties: b,
                originalOptions: c,
                startTime: rb || S(),
                duration: c.duration,
                tweens: [],
                createTween: function (b, c) {
                    var d = va.Tween(
                        a,
                        j.opts,
                        b,
                        c,
                        j.opts.specialEasing[b] || j.opts.easing
                    );
                    return j.tweens.push(d), d;
                },
                stop: function (b) {
                    var c = 0,
                        d = b ? j.tweens.length : 0;
                    if (e) return this;
                    for (e = !0; c < d; c++) j.tweens[c].run(1);
                    return (
                        b
                            ? (h.notifyWith(a, [j, 1, 0]),
                              h.resolveWith(a, [j, b]))
                            : h.rejectWith(a, [j, b]),
                        this
                    );
                },
            }),
            k = j.props;
        for (W(k, j.opts.specialEasing); f < g; f++)
            if ((d = X.prefilters[f].call(j, a, k, j.opts)))
                return (
                    sa(d.stop) &&
                        (va._queueHooks(j.elem, j.opts.queue).stop =
                            d.stop.bind(d)),
                    d
                );
        return (
            va.map(k, U, j),
            sa(j.opts.start) && j.opts.start.call(a, j),
            j
                .progress(j.opts.progress)
                .done(j.opts.done, j.opts.complete)
                .fail(j.opts.fail)
                .always(j.opts.always),
            va.fx.timer(
                va.extend(i, { elem: a, anim: j, queue: j.opts.queue })
            ),
            j
        );
    }
    function Y(a) {
        return (a.match(Ga) || []).join(" ");
    }
    function Z(a) {
        return (a.getAttribute && a.getAttribute("class")) || "";
    }
    function $(a) {
        return Array.isArray(a)
            ? a
            : "string" == typeof a
            ? a.match(Ga) || []
            : [];
    }
    function _(a, b, c, e) {
        var f;
        if (Array.isArray(b))
            va.each(b, function (b, d) {
                c || Fb.test(a)
                    ? e(a, d)
                    : _(
                          a +
                              "[" +
                              ("object" == typeof d && null != d ? b : "") +
                              "]",
                          d,
                          c,
                          e
                      );
            });
        else if (c || "object" !== d(b)) e(a, b);
        else for (f in b) _(a + "[" + f + "]", b[f], c, e);
    }
    function aa(a) {
        return function (b, c) {
            "string" != typeof b && ((c = b), (b = "*"));
            var d,
                e = 0,
                f = b.toLowerCase().match(Ga) || [];
            if (sa(c))
                for (; (d = f[e++]); )
                    "+" === d[0]
                        ? ((d = d.slice(1) || "*"),
                          (a[d] = a[d] || []).unshift(c))
                        : (a[d] = a[d] || []).push(c);
        };
    }
    function ba(a, b, c, d) {
        function e(h) {
            var i;
            return (
                (f[h] = !0),
                va.each(a[h] || [], function (a, h) {
                    var j = h(b, c, d);
                    return "string" != typeof j || g || f[j]
                        ? g
                            ? !(i = j)
                            : void 0
                        : (b.dataTypes.unshift(j), e(j), !1);
                }),
                i
            );
        }
        var f = {},
            g = a === Rb;
        return e(b.dataTypes[0]) || (!f["*"] && e("*"));
    }
    function ca(a, b) {
        var c,
            d,
            e = va.ajaxSettings.flatOptions || {};
        for (c in b) void 0 !== b[c] && ((e[c] ? a : d || (d = {}))[c] = b[c]);
        return d && va.extend(!0, a, d), a;
    }
    function da(a, b, c) {
        for (var d, e, f, g, h = a.contents, i = a.dataTypes; "*" === i[0]; )
            i.shift(),
                void 0 === d &&
                    (d = a.mimeType || b.getResponseHeader("Content-Type"));
        if (d)
            for (e in h)
                if (h[e] && h[e].test(d)) {
                    i.unshift(e);
                    break;
                }
        if (i[0] in c) f = i[0];
        else {
            for (e in c) {
                if (!i[0] || a.converters[e + " " + i[0]]) {
                    f = e;
                    break;
                }
                g || (g = e);
            }
            f = f || g;
        }
        if (f) return f !== i[0] && i.unshift(f), c[f];
    }
    function ea(a, b, c, d) {
        var e,
            f,
            g,
            h,
            i,
            j = {},
            k = a.dataTypes.slice();
        if (k[1]) for (g in a.converters) j[g.toLowerCase()] = a.converters[g];
        for (f = k.shift(); f; )
            if (
                (a.responseFields[f] && (c[a.responseFields[f]] = b),
                !i && d && a.dataFilter && (b = a.dataFilter(b, a.dataType)),
                (i = f),
                (f = k.shift()))
            )
                if ("*" === f) f = i;
                else if ("*" !== i && i !== f) {
                    if (!(g = j[i + " " + f] || j["* " + f]))
                        for (e in j)
                            if (
                                (h = e.split(" "))[1] === f &&
                                (g = j[i + " " + h[0]] || j["* " + h[0]])
                            ) {
                                !0 === g
                                    ? (g = j[e])
                                    : !0 !== j[e] &&
                                      ((f = h[0]), k.unshift(h[1]));
                                break;
                            }
                    if (!0 !== g)
                        if (g && a.throws) b = g(b);
                        else
                            try {
                                b = g(b);
                            } catch (a) {
                                return {
                                    state: "parsererror",
                                    error: g
                                        ? a
                                        : "No conversion from " +
                                          i +
                                          " to " +
                                          f,
                                };
                            }
                }
        return { state: "success", data: b };
    }
    var fa = [],
        ga = a.document,
        ha = Object.getPrototypeOf,
        ia = fa.slice,
        ja = fa.concat,
        ka = fa.push,
        la = fa.indexOf,
        ma = {},
        na = ma.toString,
        oa = ma.hasOwnProperty,
        pa = oa.toString,
        qa = pa.call(Object),
        ra = {},
        sa = function (a) {
            return "function" == typeof a && "number" != typeof a.nodeType;
        },
        ta = function (a) {
            return null != a && a === a.window;
        },
        ua = { type: !0, src: !0, noModule: !0 },
        va = function (a, b) {
            return new va.fn.init(a, b);
        },
        wa = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
    (va.fn = va.prototype =
        {
            jquery: "3.3.1",
            constructor: va,
            length: 0,
            toArray: function () {
                return ia.call(this);
            },
            get: function (a) {
                return null == a
                    ? ia.call(this)
                    : a < 0
                    ? this[a + this.length]
                    : this[a];
            },
            pushStack: function (a) {
                var b = va.merge(this.constructor(), a);
                return (b.prevObject = this), b;
            },
            each: function (a) {
                return va.each(this, a);
            },
            map: function (a) {
                return this.pushStack(
                    va.map(this, function (b, c) {
                        return a.call(b, c, b);
                    })
                );
            },
            slice: function () {
                return this.pushStack(ia.apply(this, arguments));
            },
            first: function () {
                return this.eq(0);
            },
            last: function () {
                return this.eq(-1);
            },
            eq: function (a) {
                var b = this.length,
                    c = +a + (a < 0 ? b : 0);
                return this.pushStack(c >= 0 && c < b ? [this[c]] : []);
            },
            end: function () {
                return this.prevObject || this.constructor();
            },
            push: ka,
            sort: fa.sort,
            splice: fa.splice,
        }),
        (va.extend = va.fn.extend =
            function () {
                var a,
                    b,
                    c,
                    d,
                    e,
                    f,
                    g = arguments[0] || {},
                    h = 1,
                    i = arguments.length,
                    j = !1;
                for (
                    "boolean" == typeof g &&
                        ((j = g), (g = arguments[h] || {}), h++),
                        "object" == typeof g || sa(g) || (g = {}),
                        h === i && ((g = this), h--);
                    h < i;
                    h++
                )
                    if (null != (a = arguments[h]))
                        for (b in a)
                            (c = g[b]),
                                g !== (d = a[b]) &&
                                    (j &&
                                    d &&
                                    (va.isPlainObject(d) ||
                                        (e = Array.isArray(d)))
                                        ? (e
                                              ? ((e = !1),
                                                (f =
                                                    c && Array.isArray(c)
                                                        ? c
                                                        : []))
                                              : (f =
                                                    c && va.isPlainObject(c)
                                                        ? c
                                                        : {}),
                                          (g[b] = va.extend(j, f, d)))
                                        : void 0 !== d && (g[b] = d));
                return g;
            }),
        va.extend({
            expando: "jQuery" + ("3.3.1" + Math.random()).replace(/\D/g, ""),
            isReady: !0,
            error: function (a) {
                throw new Error(a);
            },
            noop: function () {},
            isPlainObject: function (a) {
                var b, c;
                return !(
                    !a ||
                    "[object Object]" !== na.call(a) ||
                    ((b = ha(a)) &&
                        ("function" !=
                            typeof (c =
                                oa.call(b, "constructor") && b.constructor) ||
                            pa.call(c) !== qa))
                );
            },
            isEmptyObject: function (a) {
                var b;
                for (b in a) return !1;
                return !0;
            },
            globalEval: function (a) {
                c(a);
            },
            each: function (a, b) {
                var c,
                    d = 0;
                if (e(a))
                    for (
                        c = a.length;
                        d < c && !1 !== b.call(a[d], d, a[d]);
                        d++
                    );
                else for (d in a) if (!1 === b.call(a[d], d, a[d])) break;
                return a;
            },
            trim: function (a) {
                return null == a ? "" : (a + "").replace(wa, "");
            },
            makeArray: function (a, b) {
                var c = b || [];
                return (
                    null != a &&
                        (e(Object(a))
                            ? va.merge(c, "string" == typeof a ? [a] : a)
                            : ka.call(c, a)),
                    c
                );
            },
            inArray: function (a, b, c) {
                return null == b ? -1 : la.call(b, a, c);
            },
            merge: function (a, b) {
                for (var c = +b.length, d = 0, e = a.length; d < c; d++)
                    a[e++] = b[d];
                return (a.length = e), a;
            },
            grep: function (a, b, c) {
                for (var d = [], e = 0, f = a.length, g = !c; e < f; e++)
                    !b(a[e], e) !== g && d.push(a[e]);
                return d;
            },
            map: function (a, b, c) {
                var d,
                    f,
                    g = 0,
                    h = [];
                if (e(a))
                    for (d = a.length; g < d; g++)
                        null != (f = b(a[g], g, c)) && h.push(f);
                else for (g in a) null != (f = b(a[g], g, c)) && h.push(f);
                return ja.apply([], h);
            },
            guid: 1,
            support: ra,
        }),
        "function" == typeof Symbol &&
            (va.fn[Symbol.iterator] = fa[Symbol.iterator]),
        va.each(
            "Boolean Number String Function Array Date RegExp Object Error Symbol".split(
                " "
            ),
            function (a, b) {
                ma["[object " + b + "]"] = b.toLowerCase();
            }
        );
    var xa = (function (a) {
        function b(a, b, c, d) {
            var e,
                f,
                g,
                h,
                i,
                k,
                m,
                n = b && b.ownerDocument,
                o = b ? b.nodeType : 9;
            if (
                ((c = c || []),
                "string" != typeof a || !a || (1 !== o && 9 !== o && 11 !== o))
            )
                return c;
            if (
                !d &&
                ((b ? b.ownerDocument || b : N) !== F && E(b), (b = b || F), H)
            ) {
                if (11 !== o && (i = pa.exec(a)))
                    if ((e = i[1])) {
                        if (9 === o) {
                            if (!(g = b.getElementById(e))) return c;
                            if (g.id === e) return c.push(g), c;
                        } else if (
                            n &&
                            (g = n.getElementById(e)) &&
                            L(b, g) &&
                            g.id === e
                        )
                            return c.push(g), c;
                    } else {
                        if (i[2])
                            return Y.apply(c, b.getElementsByTagName(a)), c;
                        if (
                            (e = i[3]) &&
                            u.getElementsByClassName &&
                            b.getElementsByClassName
                        )
                            return Y.apply(c, b.getElementsByClassName(e)), c;
                    }
                if (u.qsa && !S[a + " "] && (!I || !I.test(a))) {
                    if (1 !== o) (n = b), (m = a);
                    else if ("object" !== b.nodeName.toLowerCase()) {
                        for (
                            (h = b.getAttribute("id"))
                                ? (h = h.replace(ta, ua))
                                : b.setAttribute("id", (h = M)),
                                f = (k = y(a)).length;
                            f--;

                        )
                            k[f] = "#" + h + " " + l(k[f]);
                        (m = k.join(",")),
                            (n = (qa.test(a) && j(b.parentNode)) || b);
                    }
                    if (m)
                        try {
                            return Y.apply(c, n.querySelectorAll(m)), c;
                        } catch (a) {
                        } finally {
                            h === M && b.removeAttribute("id");
                        }
                }
            }
            return A(a.replace(fa, "$1"), b, c, d);
        }
        function c() {
            function a(c, d) {
                return (
                    b.push(c + " ") > v.cacheLength && delete a[b.shift()],
                    (a[c + " "] = d)
                );
            }
            var b = [];
            return a;
        }
        function d(a) {
            return (a[M] = !0), a;
        }
        function e(a) {
            var b = F.createElement("fieldset");
            try {
                return !!a(b);
            } catch (a) {
                return !1;
            } finally {
                b.parentNode && b.parentNode.removeChild(b), (b = null);
            }
        }
        function f(a, b) {
            for (var c = a.split("|"), d = c.length; d--; )
                v.attrHandle[c[d]] = b;
        }
        function g(a, b) {
            var c = b && a,
                d =
                    c &&
                    1 === a.nodeType &&
                    1 === b.nodeType &&
                    a.sourceIndex - b.sourceIndex;
            if (d) return d;
            if (c) for (; (c = c.nextSibling); ) if (c === b) return -1;
            return a ? 1 : -1;
        }
        function h(a) {
            return function (b) {
                return "form" in b
                    ? b.parentNode && !1 === b.disabled
                        ? "label" in b
                            ? "label" in b.parentNode
                                ? b.parentNode.disabled === a
                                : b.disabled === a
                            : b.isDisabled === a ||
                              (b.isDisabled !== !a && wa(b) === a)
                        : b.disabled === a
                    : "label" in b && b.disabled === a;
            };
        }
        function i(a) {
            return d(function (b) {
                return (
                    (b = +b),
                    d(function (c, d) {
                        for (var e, f = a([], c.length, b), g = f.length; g--; )
                            c[(e = f[g])] && (c[e] = !(d[e] = c[e]));
                    })
                );
            });
        }
        function j(a) {
            return a && void 0 !== a.getElementsByTagName && a;
        }
        function k() {}
        function l(a) {
            for (var b = 0, c = a.length, d = ""; b < c; b++) d += a[b].value;
            return d;
        }
        function m(a, b, c) {
            var d = b.dir,
                e = b.next,
                f = e || d,
                g = c && "parentNode" === f,
                h = P++;
            return b.first
                ? function (b, c, e) {
                      for (; (b = b[d]); )
                          if (1 === b.nodeType || g) return a(b, c, e);
                      return !1;
                  }
                : function (b, c, i) {
                      var j,
                          k,
                          l,
                          m = [O, h];
                      if (i) {
                          for (; (b = b[d]); )
                              if ((1 === b.nodeType || g) && a(b, c, i))
                                  return !0;
                      } else
                          for (; (b = b[d]); )
                              if (1 === b.nodeType || g)
                                  if (
                                      ((l = b[M] || (b[M] = {})),
                                      (k =
                                          l[b.uniqueID] ||
                                          (l[b.uniqueID] = {})),
                                      e && e === b.nodeName.toLowerCase())
                                  )
                                      b = b[d] || b;
                                  else {
                                      if (
                                          (j = k[f]) &&
                                          j[0] === O &&
                                          j[1] === h
                                      )
                                          return (m[2] = j[2]);
                                      if (((k[f] = m), (m[2] = a(b, c, i))))
                                          return !0;
                                  }
                      return !1;
                  };
        }
        function n(a) {
            return a.length > 1
                ? function (b, c, d) {
                      for (var e = a.length; e--; )
                          if (!a[e](b, c, d)) return !1;
                      return !0;
                  }
                : a[0];
        }
        function o(a, c, d) {
            for (var e = 0, f = c.length; e < f; e++) b(a, c[e], d);
            return d;
        }
        function p(a, b, c, d, e) {
            for (var f, g = [], h = 0, i = a.length, j = null != b; h < i; h++)
                (f = a[h]) &&
                    ((c && !c(f, d, e)) || (g.push(f), j && b.push(h)));
            return g;
        }
        function q(a, b, c, e, f, g) {
            return (
                e && !e[M] && (e = q(e)),
                f && !f[M] && (f = q(f, g)),
                d(function (d, g, h, i) {
                    var j,
                        k,
                        l,
                        m = [],
                        n = [],
                        q = g.length,
                        r = d || o(b || "*", h.nodeType ? [h] : h, []),
                        s = !a || (!d && b) ? r : p(r, m, a, h, i),
                        t = c ? (f || (d ? a : q || e) ? [] : g) : s;
                    if ((c && c(s, t, h, i), e))
                        for (j = p(t, n), e(j, [], h, i), k = j.length; k--; )
                            (l = j[k]) && (t[n[k]] = !(s[n[k]] = l));
                    if (d) {
                        if (f || a) {
                            if (f) {
                                for (j = [], k = t.length; k--; )
                                    (l = t[k]) && j.push((s[k] = l));
                                f(null, (t = []), j, i);
                            }
                            for (k = t.length; k--; )
                                (l = t[k]) &&
                                    (j = f ? $(d, l) : m[k]) > -1 &&
                                    (d[j] = !(g[j] = l));
                        }
                    } else (t = p(t === g ? t.splice(q, t.length) : t)), f ? f(null, g, t, i) : Y.apply(g, t);
                })
            );
        }
        function r(a) {
            for (
                var b,
                    c,
                    d,
                    e = a.length,
                    f = v.relative[a[0].type],
                    g = f || v.relative[" "],
                    h = f ? 1 : 0,
                    i = m(
                        function (a) {
                            return a === b;
                        },
                        g,
                        !0
                    ),
                    j = m(
                        function (a) {
                            return $(b, a) > -1;
                        },
                        g,
                        !0
                    ),
                    k = [
                        function (a, c, d) {
                            var e =
                                (!f && (d || c !== B)) ||
                                ((b = c).nodeType ? i(a, c, d) : j(a, c, d));
                            return (b = null), e;
                        },
                    ];
                h < e;
                h++
            )
                if ((c = v.relative[a[h].type])) k = [m(n(k), c)];
                else {
                    if (
                        (c = v.filter[a[h].type].apply(null, a[h].matches))[M]
                    ) {
                        for (d = ++h; d < e && !v.relative[a[d].type]; d++);
                        return q(
                            h > 1 && n(k),
                            h > 1 &&
                                l(
                                    a
                                        .slice(0, h - 1)
                                        .concat({
                                            value:
                                                " " === a[h - 2].type
                                                    ? "*"
                                                    : "",
                                        })
                                ).replace(fa, "$1"),
                            c,
                            h < d && r(a.slice(h, d)),
                            d < e && r((a = a.slice(d))),
                            d < e && l(a)
                        );
                    }
                    k.push(c);
                }
            return n(k);
        }
        function s(a, c) {
            var e = c.length > 0,
                f = a.length > 0,
                g = function (d, g, h, i, j) {
                    var k,
                        l,
                        m,
                        n = 0,
                        o = "0",
                        q = d && [],
                        r = [],
                        s = B,
                        t = d || (f && v.find.TAG("*", j)),
                        u = (O += null == s ? 1 : Math.random() || 0.1),
                        w = t.length;
                    for (
                        j && (B = g === F || g || j);
                        o !== w && null != (k = t[o]);
                        o++
                    ) {
                        if (f && k) {
                            for (
                                l = 0,
                                    g ||
                                        k.ownerDocument === F ||
                                        (E(k), (h = !H));
                                (m = a[l++]);

                            )
                                if (m(k, g || F, h)) {
                                    i.push(k);
                                    break;
                                }
                            j && (O = u);
                        }
                        e && ((k = !m && k) && n--, d && q.push(k));
                    }
                    if (((n += o), e && o !== n)) {
                        for (l = 0; (m = c[l++]); ) m(q, r, g, h);
                        if (d) {
                            if (n > 0)
                                for (; o--; )
                                    q[o] || r[o] || (r[o] = W.call(i));
                            r = p(r);
                        }
                        Y.apply(i, r),
                            j &&
                                !d &&
                                r.length > 0 &&
                                n + c.length > 1 &&
                                b.uniqueSort(i);
                    }
                    return j && ((O = u), (B = s)), q;
                };
            return e ? d(g) : g;
        }
        var t,
            u,
            v,
            w,
            x,
            y,
            z,
            A,
            B,
            C,
            D,
            E,
            F,
            G,
            H,
            I,
            J,
            K,
            L,
            M = "sizzle" + 1 * new Date(),
            N = a.document,
            O = 0,
            P = 0,
            Q = c(),
            R = c(),
            S = c(),
            T = function (a, b) {
                return a === b && (D = !0), 0;
            },
            U = {}.hasOwnProperty,
            V = [],
            W = V.pop,
            X = V.push,
            Y = V.push,
            Z = V.slice,
            $ = function (a, b) {
                for (var c = 0, d = a.length; c < d; c++)
                    if (a[c] === b) return c;
                return -1;
            },
            _ =
                "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
            aa = "[\\x20\\t\\r\\n\\f]",
            ba = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
            ca =
                "\\[" +
                aa +
                "*(" +
                ba +
                ")(?:" +
                aa +
                "*([*^$|!~]?=)" +
                aa +
                "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" +
                ba +
                "))|)" +
                aa +
                "*\\]",
            da =
                ":(" +
                ba +
                ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" +
                ca +
                ")*)|.*)\\)|)",
            ea = new RegExp(aa + "+", "g"),
            fa = new RegExp(
                "^" + aa + "+|((?:^|[^\\\\])(?:\\\\.)*)" + aa + "+$",
                "g"
            ),
            ga = new RegExp("^" + aa + "*," + aa + "*"),
            ha = new RegExp("^" + aa + "*([>+~]|" + aa + ")" + aa + "*"),
            ia = new RegExp("=" + aa + "*([^\\]'\"]*?)" + aa + "*\\]", "g"),
            ja = new RegExp(da),
            ka = new RegExp("^" + ba + "$"),
            la = {
                ID: new RegExp("^#(" + ba + ")"),
                CLASS: new RegExp("^\\.(" + ba + ")"),
                TAG: new RegExp("^(" + ba + "|[*])"),
                ATTR: new RegExp("^" + ca),
                PSEUDO: new RegExp("^" + da),
                CHILD: new RegExp(
                    "^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" +
                        aa +
                        "*(even|odd|(([+-]|)(\\d*)n|)" +
                        aa +
                        "*(?:([+-]|)" +
                        aa +
                        "*(\\d+)|))" +
                        aa +
                        "*\\)|)",
                    "i"
                ),
                bool: new RegExp("^(?:" + _ + ")$", "i"),
                needsContext: new RegExp(
                    "^" +
                        aa +
                        "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" +
                        aa +
                        "*((?:-\\d)?\\d*)" +
                        aa +
                        "*\\)|)(?=[^-]|$)",
                    "i"
                ),
            },
            ma = /^(?:input|select|textarea|button)$/i,
            na = /^h\d$/i,
            oa = /^[^{]+\{\s*\[native \w/,
            pa = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
            qa = /[+~]/,
            ra = new RegExp(
                "\\\\([\\da-f]{1,6}" + aa + "?|(" + aa + ")|.)",
                "ig"
            ),
            sa = function (a, b, c) {
                var d = "0x" + b - 65536;
                return d !== d || c
                    ? b
                    : d < 0
                    ? String.fromCharCode(d + 65536)
                    : String.fromCharCode(
                          (d >> 10) | 55296,
                          (1023 & d) | 56320
                      );
            },
            ta = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
            ua = function (a, b) {
                return b
                    ? "\0" === a
                        ? "�"
                        : a.slice(0, -1) +
                          "\\" +
                          a.charCodeAt(a.length - 1).toString(16) +
                          " "
                    : "\\" + a;
            },
            va = function () {
                E();
            },
            wa = m(
                function (a) {
                    return !0 === a.disabled && ("form" in a || "label" in a);
                },
                { dir: "parentNode", next: "legend" }
            );
        try {
            Y.apply((V = Z.call(N.childNodes)), N.childNodes),
                V[N.childNodes.length].nodeType;
        } catch (a) {
            Y = {
                apply: V.length
                    ? function (a, b) {
                          X.apply(a, Z.call(b));
                      }
                    : function (a, b) {
                          for (var c = a.length, d = 0; (a[c++] = b[d++]); );
                          a.length = c - 1;
                      },
            };
        }
        (u = b.support = {}),
            (x = b.isXML =
                function (a) {
                    var b = a && (a.ownerDocument || a).documentElement;
                    return !!b && "HTML" !== b.nodeName;
                }),
            (E = b.setDocument =
                function (a) {
                    var b,
                        c,
                        d = a ? a.ownerDocument || a : N;
                    return d !== F && 9 === d.nodeType && d.documentElement
                        ? ((F = d),
                          (G = F.documentElement),
                          (H = !x(F)),
                          N !== F &&
                              (c = F.defaultView) &&
                              c.top !== c &&
                              (c.addEventListener
                                  ? c.addEventListener("unload", va, !1)
                                  : c.attachEvent &&
                                    c.attachEvent("onunload", va)),
                          (u.attributes = e(function (a) {
                              return (
                                  (a.className = "i"),
                                  !a.getAttribute("className")
                              );
                          })),
                          (u.getElementsByTagName = e(function (a) {
                              return (
                                  a.appendChild(F.createComment("")),
                                  !a.getElementsByTagName("*").length
                              );
                          })),
                          (u.getElementsByClassName = oa.test(
                              F.getElementsByClassName
                          )),
                          (u.getById = e(function (a) {
                              return (
                                  (G.appendChild(a).id = M),
                                  !F.getElementsByName ||
                                      !F.getElementsByName(M).length
                              );
                          })),
                          u.getById
                              ? ((v.filter.ID = function (a) {
                                    var b = a.replace(ra, sa);
                                    return function (a) {
                                        return a.getAttribute("id") === b;
                                    };
                                }),
                                (v.find.ID = function (a, b) {
                                    if (void 0 !== b.getElementById && H) {
                                        var c = b.getElementById(a);
                                        return c ? [c] : [];
                                    }
                                }))
                              : ((v.filter.ID = function (a) {
                                    var b = a.replace(ra, sa);
                                    return function (a) {
                                        var c =
                                            void 0 !== a.getAttributeNode &&
                                            a.getAttributeNode("id");
                                        return c && c.value === b;
                                    };
                                }),
                                (v.find.ID = function (a, b) {
                                    if (void 0 !== b.getElementById && H) {
                                        var c,
                                            d,
                                            e,
                                            f = b.getElementById(a);
                                        if (f) {
                                            if (
                                                (c =
                                                    f.getAttributeNode("id")) &&
                                                c.value === a
                                            )
                                                return [f];
                                            for (
                                                e = b.getElementsByName(a),
                                                    d = 0;
                                                (f = e[d++]);

                                            )
                                                if (
                                                    (c =
                                                        f.getAttributeNode(
                                                            "id"
                                                        )) &&
                                                    c.value === a
                                                )
                                                    return [f];
                                        }
                                        return [];
                                    }
                                })),
                          (v.find.TAG = u.getElementsByTagName
                              ? function (a, b) {
                                    return void 0 !== b.getElementsByTagName
                                        ? b.getElementsByTagName(a)
                                        : u.qsa
                                        ? b.querySelectorAll(a)
                                        : void 0;
                                }
                              : function (a, b) {
                                    var c,
                                        d = [],
                                        e = 0,
                                        f = b.getElementsByTagName(a);
                                    if ("*" === a) {
                                        for (; (c = f[e++]); )
                                            1 === c.nodeType && d.push(c);
                                        return d;
                                    }
                                    return f;
                                }),
                          (v.find.CLASS =
                              u.getElementsByClassName &&
                              function (a, b) {
                                  if (void 0 !== b.getElementsByClassName && H)
                                      return b.getElementsByClassName(a);
                              }),
                          (J = []),
                          (I = []),
                          (u.qsa = oa.test(F.querySelectorAll)) &&
                              (e(function (a) {
                                  (G.appendChild(a).innerHTML =
                                      "<a id='" +
                                      M +
                                      "'></a><select id='" +
                                      M +
                                      "-\r\\' msallowcapture=''><option selected=''></option></select>"),
                                      a.querySelectorAll("[msallowcapture^='']")
                                          .length &&
                                          I.push(
                                              "[*^$]=" + aa + "*(?:''|\"\")"
                                          ),
                                      a.querySelectorAll("[selected]").length ||
                                          I.push(
                                              "\\[" +
                                                  aa +
                                                  "*(?:value|" +
                                                  _ +
                                                  ")"
                                          ),
                                      a.querySelectorAll("[id~=" + M + "-]")
                                          .length || I.push("~="),
                                      a.querySelectorAll(":checked").length ||
                                          I.push(":checked"),
                                      a.querySelectorAll("a#" + M + "+*")
                                          .length || I.push(".#.+[+~]");
                              }),
                              e(function (a) {
                                  a.innerHTML =
                                      "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                                  var b = F.createElement("input");
                                  b.setAttribute("type", "hidden"),
                                      a
                                          .appendChild(b)
                                          .setAttribute("name", "D"),
                                      a.querySelectorAll("[name=d]").length &&
                                          I.push("name" + aa + "*[*^$|!~]?="),
                                      2 !==
                                          a.querySelectorAll(":enabled")
                                              .length &&
                                          I.push(":enabled", ":disabled"),
                                      (G.appendChild(a).disabled = !0),
                                      2 !==
                                          a.querySelectorAll(":disabled")
                                              .length &&
                                          I.push(":enabled", ":disabled"),
                                      a.querySelectorAll("*,:x"),
                                      I.push(",.*:");
                              })),
                          (u.matchesSelector = oa.test(
                              (K =
                                  G.matches ||
                                  G.webkitMatchesSelector ||
                                  G.mozMatchesSelector ||
                                  G.oMatchesSelector ||
                                  G.msMatchesSelector)
                          )) &&
                              e(function (a) {
                                  (u.disconnectedMatch = K.call(a, "*")),
                                      K.call(a, "[s!='']:x"),
                                      J.push("!=", da);
                              }),
                          (I = I.length && new RegExp(I.join("|"))),
                          (J = J.length && new RegExp(J.join("|"))),
                          (b = oa.test(G.compareDocumentPosition)),
                          (L =
                              b || oa.test(G.contains)
                                  ? function (a, b) {
                                        var c =
                                                9 === a.nodeType
                                                    ? a.documentElement
                                                    : a,
                                            d = b && b.parentNode;
                                        return (
                                            a === d ||
                                            !(
                                                !d ||
                                                1 !== d.nodeType ||
                                                !(c.contains
                                                    ? c.contains(d)
                                                    : a.compareDocumentPosition &&
                                                      16 &
                                                          a.compareDocumentPosition(
                                                              d
                                                          ))
                                            )
                                        );
                                    }
                                  : function (a, b) {
                                        if (b)
                                            for (; (b = b.parentNode); )
                                                if (b === a) return !0;
                                        return !1;
                                    }),
                          (T = b
                              ? function (a, b) {
                                    if (a === b) return (D = !0), 0;
                                    var c =
                                        !a.compareDocumentPosition -
                                        !b.compareDocumentPosition;
                                    return (
                                        c ||
                                        (1 &
                                            (c =
                                                (a.ownerDocument || a) ===
                                                (b.ownerDocument || b)
                                                    ? a.compareDocumentPosition(
                                                          b
                                                      )
                                                    : 1) ||
                                        (!u.sortDetached &&
                                            b.compareDocumentPosition(a) === c)
                                            ? a === F ||
                                              (a.ownerDocument === N && L(N, a))
                                                ? -1
                                                : b === F ||
                                                  (b.ownerDocument === N &&
                                                      L(N, b))
                                                ? 1
                                                : C
                                                ? $(C, a) - $(C, b)
                                                : 0
                                            : 4 & c
                                            ? -1
                                            : 1)
                                    );
                                }
                              : function (a, b) {
                                    if (a === b) return (D = !0), 0;
                                    var c,
                                        d = 0,
                                        e = a.parentNode,
                                        f = b.parentNode,
                                        h = [a],
                                        i = [b];
                                    if (!e || !f)
                                        return a === F
                                            ? -1
                                            : b === F
                                            ? 1
                                            : e
                                            ? -1
                                            : f
                                            ? 1
                                            : C
                                            ? $(C, a) - $(C, b)
                                            : 0;
                                    if (e === f) return g(a, b);
                                    for (c = a; (c = c.parentNode); )
                                        h.unshift(c);
                                    for (c = b; (c = c.parentNode); )
                                        i.unshift(c);
                                    for (; h[d] === i[d]; ) d++;
                                    return d
                                        ? g(h[d], i[d])
                                        : h[d] === N
                                        ? -1
                                        : i[d] === N
                                        ? 1
                                        : 0;
                                }),
                          F)
                        : F;
                }),
            (b.matches = function (a, c) {
                return b(a, null, null, c);
            }),
            (b.matchesSelector = function (a, c) {
                if (
                    ((a.ownerDocument || a) !== F && E(a),
                    (c = c.replace(ia, "='$1']")),
                    u.matchesSelector &&
                        H &&
                        !S[c + " "] &&
                        (!J || !J.test(c)) &&
                        (!I || !I.test(c)))
                )
                    try {
                        var d = K.call(a, c);
                        if (
                            d ||
                            u.disconnectedMatch ||
                            (a.document && 11 !== a.document.nodeType)
                        )
                            return d;
                    } catch (a) {}
                return b(c, F, null, [a]).length > 0;
            }),
            (b.contains = function (a, b) {
                return (a.ownerDocument || a) !== F && E(a), L(a, b);
            }),
            (b.attr = function (a, b) {
                (a.ownerDocument || a) !== F && E(a);
                var c = v.attrHandle[b.toLowerCase()],
                    d =
                        c && U.call(v.attrHandle, b.toLowerCase())
                            ? c(a, b, !H)
                            : void 0;
                return void 0 !== d
                    ? d
                    : u.attributes || !H
                    ? a.getAttribute(b)
                    : (d = a.getAttributeNode(b)) && d.specified
                    ? d.value
                    : null;
            }),
            (b.escape = function (a) {
                return (a + "").replace(ta, ua);
            }),
            (b.error = function (a) {
                throw new Error("Syntax error, unrecognized expression: " + a);
            }),
            (b.uniqueSort = function (a) {
                var b,
                    c = [],
                    d = 0,
                    e = 0;
                if (
                    ((D = !u.detectDuplicates),
                    (C = !u.sortStable && a.slice(0)),
                    a.sort(T),
                    D)
                ) {
                    for (; (b = a[e++]); ) b === a[e] && (d = c.push(e));
                    for (; d--; ) a.splice(c[d], 1);
                }
                return (C = null), a;
            }),
            (w = b.getText =
                function (a) {
                    var b,
                        c = "",
                        d = 0,
                        e = a.nodeType;
                    if (e) {
                        if (1 === e || 9 === e || 11 === e) {
                            if ("string" == typeof a.textContent)
                                return a.textContent;
                            for (a = a.firstChild; a; a = a.nextSibling)
                                c += w(a);
                        } else if (3 === e || 4 === e) return a.nodeValue;
                    } else for (; (b = a[d++]); ) c += w(b);
                    return c;
                }),
            ((v = b.selectors =
                {
                    cacheLength: 50,
                    createPseudo: d,
                    match: la,
                    attrHandle: {},
                    find: {},
                    relative: {
                        ">": { dir: "parentNode", first: !0 },
                        " ": { dir: "parentNode" },
                        "+": { dir: "previousSibling", first: !0 },
                        "~": { dir: "previousSibling" },
                    },
                    preFilter: {
                        ATTR: function (a) {
                            return (
                                (a[1] = a[1].replace(ra, sa)),
                                (a[3] = (a[3] || a[4] || a[5] || "").replace(
                                    ra,
                                    sa
                                )),
                                "~=" === a[2] && (a[3] = " " + a[3] + " "),
                                a.slice(0, 4)
                            );
                        },
                        CHILD: function (a) {
                            return (
                                (a[1] = a[1].toLowerCase()),
                                "nth" === a[1].slice(0, 3)
                                    ? (a[3] || b.error(a[0]),
                                      (a[4] = +(a[4]
                                          ? a[5] + (a[6] || 1)
                                          : 2 *
                                            ("even" === a[3] ||
                                                "odd" === a[3]))),
                                      (a[5] = +(a[7] + a[8] || "odd" === a[3])))
                                    : a[3] && b.error(a[0]),
                                a
                            );
                        },
                        PSEUDO: function (a) {
                            var b,
                                c = !a[6] && a[2];
                            return la.CHILD.test(a[0])
                                ? null
                                : (a[3]
                                      ? (a[2] = a[4] || a[5] || "")
                                      : c &&
                                        ja.test(c) &&
                                        (b = y(c, !0)) &&
                                        (b =
                                            c.indexOf(")", c.length - b) -
                                            c.length) &&
                                        ((a[0] = a[0].slice(0, b)),
                                        (a[2] = c.slice(0, b))),
                                  a.slice(0, 3));
                        },
                    },
                    filter: {
                        TAG: function (a) {
                            var b = a.replace(ra, sa).toLowerCase();
                            return "*" === a
                                ? function () {
                                      return !0;
                                  }
                                : function (a) {
                                      return (
                                          a.nodeName &&
                                          a.nodeName.toLowerCase() === b
                                      );
                                  };
                        },
                        CLASS: function (a) {
                            var b = Q[a + " "];
                            return (
                                b ||
                                ((b = new RegExp(
                                    "(^|" + aa + ")" + a + "(" + aa + "|$)"
                                )) &&
                                    Q(a, function (a) {
                                        return b.test(
                                            ("string" == typeof a.className &&
                                                a.className) ||
                                                (void 0 !== a.getAttribute &&
                                                    a.getAttribute("class")) ||
                                                ""
                                        );
                                    }))
                            );
                        },
                        ATTR: function (a, c, d) {
                            return function (e) {
                                var f = b.attr(e, a);
                                return null == f
                                    ? "!=" === c
                                    : !c ||
                                          ((f += ""),
                                          "=" === c
                                              ? f === d
                                              : "!=" === c
                                              ? f !== d
                                              : "^=" === c
                                              ? d && 0 === f.indexOf(d)
                                              : "*=" === c
                                              ? d && f.indexOf(d) > -1
                                              : "$=" === c
                                              ? d && f.slice(-d.length) === d
                                              : "~=" === c
                                              ? (
                                                    " " +
                                                    f.replace(ea, " ") +
                                                    " "
                                                ).indexOf(d) > -1
                                              : "|=" === c &&
                                                (f === d ||
                                                    f.slice(0, d.length + 1) ===
                                                        d + "-"));
                            };
                        },
                        CHILD: function (a, b, c, d, e) {
                            var f = "nth" !== a.slice(0, 3),
                                g = "last" !== a.slice(-4),
                                h = "of-type" === b;
                            return 1 === d && 0 === e
                                ? function (a) {
                                      return !!a.parentNode;
                                  }
                                : function (b, c, i) {
                                      var j,
                                          k,
                                          l,
                                          m,
                                          n,
                                          o,
                                          p =
                                              f !== g
                                                  ? "nextSibling"
                                                  : "previousSibling",
                                          q = b.parentNode,
                                          r = h && b.nodeName.toLowerCase(),
                                          s = !i && !h,
                                          t = !1;
                                      if (q) {
                                          if (f) {
                                              for (; p; ) {
                                                  for (m = b; (m = m[p]); )
                                                      if (
                                                          h
                                                              ? m.nodeName.toLowerCase() ===
                                                                r
                                                              : 1 === m.nodeType
                                                      )
                                                          return !1;
                                                  o = p =
                                                      "only" === a &&
                                                      !o &&
                                                      "nextSibling";
                                              }
                                              return !0;
                                          }
                                          if (
                                              ((o = [
                                                  g
                                                      ? q.firstChild
                                                      : q.lastChild,
                                              ]),
                                              g && s)
                                          ) {
                                              for (
                                                  t =
                                                      (n =
                                                          (j =
                                                              (k =
                                                                  (l =
                                                                      (m = q)[
                                                                          M
                                                                      ] ||
                                                                      (m[M] =
                                                                          {}))[
                                                                      m.uniqueID
                                                                  ] ||
                                                                  (l[
                                                                      m.uniqueID
                                                                  ] = {}))[a] ||
                                                              [])[0] === O &&
                                                          j[1]) && j[2],
                                                      m = n && q.childNodes[n];
                                                  (m =
                                                      (++n && m && m[p]) ||
                                                      (t = n = 0) ||
                                                      o.pop());

                                              )
                                                  if (
                                                      1 === m.nodeType &&
                                                      ++t &&
                                                      m === b
                                                  ) {
                                                      k[a] = [O, n, t];
                                                      break;
                                                  }
                                          } else if (
                                              (s &&
                                                  (t = n =
                                                      (j =
                                                          (k =
                                                              (l =
                                                                  (m = b)[M] ||
                                                                  (m[M] = {}))[
                                                                  m.uniqueID
                                                              ] ||
                                                              (l[m.uniqueID] =
                                                                  {}))[a] ||
                                                          [])[0] === O && j[1]),
                                              !1 === t)
                                          )
                                              for (
                                                  ;
                                                  (m =
                                                      (++n && m && m[p]) ||
                                                      (t = n = 0) ||
                                                      o.pop()) &&
                                                  ((h
                                                      ? m.nodeName.toLowerCase() !==
                                                        r
                                                      : 1 !== m.nodeType) ||
                                                      !++t ||
                                                      (s &&
                                                          ((k =
                                                              (l =
                                                                  m[M] ||
                                                                  (m[M] = {}))[
                                                                  m.uniqueID
                                                              ] ||
                                                              (l[m.uniqueID] =
                                                                  {}))[a] = [
                                                              O,
                                                              t,
                                                          ]),
                                                      m !== b));

                                              );
                                          return (
                                              (t -= e) === d ||
                                              (t % d == 0 && t / d >= 0)
                                          );
                                      }
                                  };
                        },
                        PSEUDO: function (a, c) {
                            var e,
                                f =
                                    v.pseudos[a] ||
                                    v.setFilters[a.toLowerCase()] ||
                                    b.error("unsupported pseudo: " + a);
                            return f[M]
                                ? f(c)
                                : f.length > 1
                                ? ((e = [a, a, "", c]),
                                  v.setFilters.hasOwnProperty(a.toLowerCase())
                                      ? d(function (a, b) {
                                            for (
                                                var d,
                                                    e = f(a, c),
                                                    g = e.length;
                                                g--;

                                            )
                                                a[(d = $(a, e[g]))] = !(b[d] =
                                                    e[g]);
                                        })
                                      : function (a) {
                                            return f(a, 0, e);
                                        })
                                : f;
                        },
                    },
                    pseudos: {
                        not: d(function (a) {
                            var b = [],
                                c = [],
                                e = z(a.replace(fa, "$1"));
                            return e[M]
                                ? d(function (a, b, c, d) {
                                      for (
                                          var f,
                                              g = e(a, null, d, []),
                                              h = a.length;
                                          h--;

                                      )
                                          (f = g[h]) && (a[h] = !(b[h] = f));
                                  })
                                : function (a, d, f) {
                                      return (
                                          (b[0] = a),
                                          e(b, null, f, c),
                                          (b[0] = null),
                                          !c.pop()
                                      );
                                  };
                        }),
                        has: d(function (a) {
                            return function (c) {
                                return b(a, c).length > 0;
                            };
                        }),
                        contains: d(function (a) {
                            return (
                                (a = a.replace(ra, sa)),
                                function (b) {
                                    return (
                                        (
                                            b.textContent ||
                                            b.innerText ||
                                            w(b)
                                        ).indexOf(a) > -1
                                    );
                                }
                            );
                        }),
                        lang: d(function (a) {
                            return (
                                ka.test(a || "") ||
                                    b.error("unsupported lang: " + a),
                                (a = a.replace(ra, sa).toLowerCase()),
                                function (b) {
                                    var c;
                                    do {
                                        if (
                                            (c = H
                                                ? b.lang
                                                : b.getAttribute("xml:lang") ||
                                                  b.getAttribute("lang"))
                                        )
                                            return (
                                                (c = c.toLowerCase()) === a ||
                                                0 === c.indexOf(a + "-")
                                            );
                                    } while (
                                        (b = b.parentNode) &&
                                        1 === b.nodeType
                                    );
                                    return !1;
                                }
                            );
                        }),
                        target: function (b) {
                            var c = a.location && a.location.hash;
                            return c && c.slice(1) === b.id;
                        },
                        root: function (a) {
                            return a === G;
                        },
                        focus: function (a) {
                            return (
                                a === F.activeElement &&
                                (!F.hasFocus || F.hasFocus()) &&
                                !!(a.type || a.href || ~a.tabIndex)
                            );
                        },
                        enabled: h(!1),
                        disabled: h(!0),
                        checked: function (a) {
                            var b = a.nodeName.toLowerCase();
                            return (
                                ("input" === b && !!a.checked) ||
                                ("option" === b && !!a.selected)
                            );
                        },
                        selected: function (a) {
                            return (
                                a.parentNode && a.parentNode.selectedIndex,
                                !0 === a.selected
                            );
                        },
                        empty: function (a) {
                            for (a = a.firstChild; a; a = a.nextSibling)
                                if (a.nodeType < 6) return !1;
                            return !0;
                        },
                        parent: function (a) {
                            return !v.pseudos.empty(a);
                        },
                        header: function (a) {
                            return na.test(a.nodeName);
                        },
                        input: function (a) {
                            return ma.test(a.nodeName);
                        },
                        button: function (a) {
                            var b = a.nodeName.toLowerCase();
                            return (
                                ("input" === b && "button" === a.type) ||
                                "button" === b
                            );
                        },
                        text: function (a) {
                            var b;
                            return (
                                "input" === a.nodeName.toLowerCase() &&
                                "text" === a.type &&
                                (null == (b = a.getAttribute("type")) ||
                                    "text" === b.toLowerCase())
                            );
                        },
                        first: i(function () {
                            return [0];
                        }),
                        last: i(function (a, b) {
                            return [b - 1];
                        }),
                        eq: i(function (a, b, c) {
                            return [c < 0 ? c + b : c];
                        }),
                        even: i(function (a, b) {
                            for (var c = 0; c < b; c += 2) a.push(c);
                            return a;
                        }),
                        odd: i(function (a, b) {
                            for (var c = 1; c < b; c += 2) a.push(c);
                            return a;
                        }),
                        lt: i(function (a, b, c) {
                            for (var d = c < 0 ? c + b : c; --d >= 0; )
                                a.push(d);
                            return a;
                        }),
                        gt: i(function (a, b, c) {
                            for (var d = c < 0 ? c + b : c; ++d < b; )
                                a.push(d);
                            return a;
                        }),
                    },
                }).pseudos.nth = v.pseudos.eq);
        for (t in {
            radio: !0,
            checkbox: !0,
            file: !0,
            password: !0,
            image: !0,
        })
            v.pseudos[t] = (function (a) {
                return function (b) {
                    return "input" === b.nodeName.toLowerCase() && b.type === a;
                };
            })(t);
        for (t in { submit: !0, reset: !0 })
            v.pseudos[t] = (function (a) {
                return function (b) {
                    var c = b.nodeName.toLowerCase();
                    return ("input" === c || "button" === c) && b.type === a;
                };
            })(t);
        return (
            (k.prototype = v.filters = v.pseudos),
            (v.setFilters = new k()),
            (y = b.tokenize =
                function (a, c) {
                    var d,
                        e,
                        f,
                        g,
                        h,
                        i,
                        j,
                        k = R[a + " "];
                    if (k) return c ? 0 : k.slice(0);
                    for (h = a, i = [], j = v.preFilter; h; ) {
                        (d && !(e = ga.exec(h))) ||
                            (e && (h = h.slice(e[0].length) || h),
                            i.push((f = []))),
                            (d = !1),
                            (e = ha.exec(h)) &&
                                ((d = e.shift()),
                                f.push({
                                    value: d,
                                    type: e[0].replace(fa, " "),
                                }),
                                (h = h.slice(d.length)));
                        for (g in v.filter)
                            !(e = la[g].exec(h)) ||
                                (j[g] && !(e = j[g](e))) ||
                                ((d = e.shift()),
                                f.push({ value: d, type: g, matches: e }),
                                (h = h.slice(d.length)));
                        if (!d) break;
                    }
                    return c ? h.length : h ? b.error(a) : R(a, i).slice(0);
                }),
            (z = b.compile =
                function (a, b) {
                    var c,
                        d = [],
                        e = [],
                        f = S[a + " "];
                    if (!f) {
                        for (b || (b = y(a)), c = b.length; c--; )
                            (f = r(b[c]))[M] ? d.push(f) : e.push(f);
                        (f = S(a, s(e, d))).selector = a;
                    }
                    return f;
                }),
            (A = b.select =
                function (a, b, c, d) {
                    var e,
                        f,
                        g,
                        h,
                        i,
                        k = "function" == typeof a && a,
                        m = !d && y((a = k.selector || a));
                    if (((c = c || []), 1 === m.length)) {
                        if (
                            (f = m[0] = m[0].slice(0)).length > 2 &&
                            "ID" === (g = f[0]).type &&
                            9 === b.nodeType &&
                            H &&
                            v.relative[f[1].type]
                        ) {
                            if (
                                !(b = (v.find.ID(
                                    g.matches[0].replace(ra, sa),
                                    b
                                ) || [])[0])
                            )
                                return c;
                            k && (b = b.parentNode),
                                (a = a.slice(f.shift().value.length));
                        }
                        for (
                            e = la.needsContext.test(a) ? 0 : f.length;
                            e-- && ((g = f[e]), !v.relative[(h = g.type)]);

                        )
                            if (
                                (i = v.find[h]) &&
                                (d = i(
                                    g.matches[0].replace(ra, sa),
                                    (qa.test(f[0].type) && j(b.parentNode)) || b
                                ))
                            ) {
                                if ((f.splice(e, 1), !(a = d.length && l(f))))
                                    return Y.apply(c, d), c;
                                break;
                            }
                    }
                    return (
                        (k || z(a, m))(
                            d,
                            b,
                            !H,
                            c,
                            !b || (qa.test(a) && j(b.parentNode)) || b
                        ),
                        c
                    );
                }),
            (u.sortStable = M.split("").sort(T).join("") === M),
            (u.detectDuplicates = !!D),
            E(),
            (u.sortDetached = e(function (a) {
                return (
                    1 & a.compareDocumentPosition(F.createElement("fieldset"))
                );
            })),
            e(function (a) {
                return (
                    (a.innerHTML = "<a href='#'></a>"),
                    "#" === a.firstChild.getAttribute("href")
                );
            }) ||
                f("type|href|height|width", function (a, b, c) {
                    if (!c)
                        return a.getAttribute(
                            b,
                            "type" === b.toLowerCase() ? 1 : 2
                        );
                }),
            (u.attributes &&
                e(function (a) {
                    return (
                        (a.innerHTML = "<input/>"),
                        a.firstChild.setAttribute("value", ""),
                        "" === a.firstChild.getAttribute("value")
                    );
                })) ||
                f("value", function (a, b, c) {
                    if (!c && "input" === a.nodeName.toLowerCase())
                        return a.defaultValue;
                }),
            e(function (a) {
                return null == a.getAttribute("disabled");
            }) ||
                f(_, function (a, b, c) {
                    var d;
                    if (!c)
                        return !0 === a[b]
                            ? b.toLowerCase()
                            : (d = a.getAttributeNode(b)) && d.specified
                            ? d.value
                            : null;
                }),
            b
        );
    })(a);
    (va.find = xa),
        (va.expr = xa.selectors),
        (va.expr[":"] = va.expr.pseudos),
        (va.uniqueSort = va.unique = xa.uniqueSort),
        (va.text = xa.getText),
        (va.isXMLDoc = xa.isXML),
        (va.contains = xa.contains),
        (va.escapeSelector = xa.escape);
    var ya = function (a, b, c) {
            for (var d = [], e = void 0 !== c; (a = a[b]) && 9 !== a.nodeType; )
                if (1 === a.nodeType) {
                    if (e && va(a).is(c)) break;
                    d.push(a);
                }
            return d;
        },
        za = function (a, b) {
            for (var c = []; a; a = a.nextSibling)
                1 === a.nodeType && a !== b && c.push(a);
            return c;
        },
        Aa = va.expr.match.needsContext,
        Ba = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
    (va.filter = function (a, b, c) {
        var d = b[0];
        return (
            c && (a = ":not(" + a + ")"),
            1 === b.length && 1 === d.nodeType
                ? va.find.matchesSelector(d, a)
                    ? [d]
                    : []
                : va.find.matches(
                      a,
                      va.grep(b, function (a) {
                          return 1 === a.nodeType;
                      })
                  )
        );
    }),
        va.fn.extend({
            find: function (a) {
                var b,
                    c,
                    d = this.length,
                    e = this;
                if ("string" != typeof a)
                    return this.pushStack(
                        va(a).filter(function () {
                            for (b = 0; b < d; b++)
                                if (va.contains(e[b], this)) return !0;
                        })
                    );
                for (c = this.pushStack([]), b = 0; b < d; b++)
                    va.find(a, e[b], c);
                return d > 1 ? va.uniqueSort(c) : c;
            },
            filter: function (a) {
                return this.pushStack(g(this, a || [], !1));
            },
            not: function (a) {
                return this.pushStack(g(this, a || [], !0));
            },
            is: function (a) {
                return !!g(
                    this,
                    "string" == typeof a && Aa.test(a) ? va(a) : a || [],
                    !1
                ).length;
            },
        });
    var Ca,
        Da = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
    ((va.fn.init = function (a, b, c) {
        var d, e;
        if (!a) return this;
        if (((c = c || Ca), "string" == typeof a)) {
            if (
                !(d =
                    "<" === a[0] && ">" === a[a.length - 1] && a.length >= 3
                        ? [null, a, null]
                        : Da.exec(a)) ||
                (!d[1] && b)
            )
                return !b || b.jquery
                    ? (b || c).find(a)
                    : this.constructor(b).find(a);
            if (d[1]) {
                if (
                    ((b = b instanceof va ? b[0] : b),
                    va.merge(
                        this,
                        va.parseHTML(
                            d[1],
                            b && b.nodeType ? b.ownerDocument || b : ga,
                            !0
                        )
                    ),
                    Ba.test(d[1]) && va.isPlainObject(b))
                )
                    for (d in b)
                        sa(this[d]) ? this[d](b[d]) : this.attr(d, b[d]);
                return this;
            }
            return (
                (e = ga.getElementById(d[2])) &&
                    ((this[0] = e), (this.length = 1)),
                this
            );
        }
        return a.nodeType
            ? ((this[0] = a), (this.length = 1), this)
            : sa(a)
            ? void 0 !== c.ready
                ? c.ready(a)
                : a(va)
            : va.makeArray(a, this);
    }).prototype = va.fn),
        (Ca = va(ga));
    var Ea = /^(?:parents|prev(?:Until|All))/,
        Fa = { children: !0, contents: !0, next: !0, prev: !0 };
    va.fn.extend({
        has: function (a) {
            var b = va(a, this),
                c = b.length;
            return this.filter(function () {
                for (var a = 0; a < c; a++)
                    if (va.contains(this, b[a])) return !0;
            });
        },
        closest: function (a, b) {
            var c,
                d = 0,
                e = this.length,
                f = [],
                g = "string" != typeof a && va(a);
            if (!Aa.test(a))
                for (; d < e; d++)
                    for (c = this[d]; c && c !== b; c = c.parentNode)
                        if (
                            c.nodeType < 11 &&
                            (g
                                ? g.index(c) > -1
                                : 1 === c.nodeType &&
                                  va.find.matchesSelector(c, a))
                        ) {
                            f.push(c);
                            break;
                        }
            return this.pushStack(f.length > 1 ? va.uniqueSort(f) : f);
        },
        index: function (a) {
            return a
                ? "string" == typeof a
                    ? la.call(va(a), this[0])
                    : la.call(this, a.jquery ? a[0] : a)
                : this[0] && this[0].parentNode
                ? this.first().prevAll().length
                : -1;
        },
        add: function (a, b) {
            return this.pushStack(
                va.uniqueSort(va.merge(this.get(), va(a, b)))
            );
        },
        addBack: function (a) {
            return this.add(
                null == a ? this.prevObject : this.prevObject.filter(a)
            );
        },
    }),
        va.each(
            {
                parent: function (a) {
                    var b = a.parentNode;
                    return b && 11 !== b.nodeType ? b : null;
                },
                parents: function (a) {
                    return ya(a, "parentNode");
                },
                parentsUntil: function (a, b, c) {
                    return ya(a, "parentNode", c);
                },
                next: function (a) {
                    return h(a, "nextSibling");
                },
                prev: function (a) {
                    return h(a, "previousSibling");
                },
                nextAll: function (a) {
                    return ya(a, "nextSibling");
                },
                prevAll: function (a) {
                    return ya(a, "previousSibling");
                },
                nextUntil: function (a, b, c) {
                    return ya(a, "nextSibling", c);
                },
                prevUntil: function (a, b, c) {
                    return ya(a, "previousSibling", c);
                },
                siblings: function (a) {
                    return za((a.parentNode || {}).firstChild, a);
                },
                children: function (a) {
                    return za(a.firstChild);
                },
                contents: function (a) {
                    return f(a, "iframe")
                        ? a.contentDocument
                        : (f(a, "template") && (a = a.content || a),
                          va.merge([], a.childNodes));
                },
            },
            function (a, b) {
                va.fn[a] = function (c, d) {
                    var e = va.map(this, b, c);
                    return (
                        "Until" !== a.slice(-5) && (d = c),
                        d && "string" == typeof d && (e = va.filter(d, e)),
                        this.length > 1 &&
                            (Fa[a] || va.uniqueSort(e),
                            Ea.test(a) && e.reverse()),
                        this.pushStack(e)
                    );
                };
            }
        );
    var Ga = /[^\x20\t\r\n\f]+/g;
    (va.Callbacks = function (a) {
        a = "string" == typeof a ? i(a) : va.extend({}, a);
        var b,
            c,
            e,
            f,
            g = [],
            h = [],
            j = -1,
            k = function () {
                for (f = f || a.once, e = b = !0; h.length; j = -1)
                    for (c = h.shift(); ++j < g.length; )
                        !1 === g[j].apply(c[0], c[1]) &&
                            a.stopOnFalse &&
                            ((j = g.length), (c = !1));
                a.memory || (c = !1), (b = !1), f && (g = c ? [] : "");
            },
            l = {
                add: function () {
                    return (
                        g &&
                            (c && !b && ((j = g.length - 1), h.push(c)),
                            (function b(c) {
                                va.each(c, function (c, e) {
                                    sa(e)
                                        ? (a.unique && l.has(e)) || g.push(e)
                                        : e &&
                                          e.length &&
                                          "string" !== d(e) &&
                                          b(e);
                                });
                            })(arguments),
                            c && !b && k()),
                        this
                    );
                },
                remove: function () {
                    return (
                        va.each(arguments, function (a, b) {
                            for (var c; (c = va.inArray(b, g, c)) > -1; )
                                g.splice(c, 1), c <= j && j--;
                        }),
                        this
                    );
                },
                has: function (a) {
                    return a ? va.inArray(a, g) > -1 : g.length > 0;
                },
                empty: function () {
                    return g && (g = []), this;
                },
                disable: function () {
                    return (f = h = []), (g = c = ""), this;
                },
                disabled: function () {
                    return !g;
                },
                lock: function () {
                    return (f = h = []), c || b || (g = c = ""), this;
                },
                locked: function () {
                    return !!f;
                },
                fireWith: function (a, c) {
                    return (
                        f ||
                            ((c = [a, (c = c || []).slice ? c.slice() : c]),
                            h.push(c),
                            b || k()),
                        this
                    );
                },
                fire: function () {
                    return l.fireWith(this, arguments), this;
                },
                fired: function () {
                    return !!e;
                },
            };
        return l;
    }),
        va.extend({
            Deferred: function (b) {
                var c = [
                        [
                            "notify",
                            "progress",
                            va.Callbacks("memory"),
                            va.Callbacks("memory"),
                            2,
                        ],
                        [
                            "resolve",
                            "done",
                            va.Callbacks("once memory"),
                            va.Callbacks("once memory"),
                            0,
                            "resolved",
                        ],
                        [
                            "reject",
                            "fail",
                            va.Callbacks("once memory"),
                            va.Callbacks("once memory"),
                            1,
                            "rejected",
                        ],
                    ],
                    d = "pending",
                    e = {
                        state: function () {
                            return d;
                        },
                        always: function () {
                            return f.done(arguments).fail(arguments), this;
                        },
                        catch: function (a) {
                            return e.then(null, a);
                        },
                        pipe: function () {
                            var a = arguments;
                            return va
                                .Deferred(function (b) {
                                    va.each(c, function (c, d) {
                                        var e = sa(a[d[4]]) && a[d[4]];
                                        f[d[1]](function () {
                                            var a =
                                                e && e.apply(this, arguments);
                                            a && sa(a.promise)
                                                ? a
                                                      .promise()
                                                      .progress(b.notify)
                                                      .done(b.resolve)
                                                      .fail(b.reject)
                                                : b[d[0] + "With"](
                                                      this,
                                                      e ? [a] : arguments
                                                  );
                                        });
                                    }),
                                        (a = null);
                                })
                                .promise();
                        },
                        then: function (b, d, e) {
                            function f(b, c, d, e) {
                                return function () {
                                    var h = this,
                                        i = arguments,
                                        l = function () {
                                            var a, l;
                                            if (!(b < g)) {
                                                if (
                                                    (a = d.apply(h, i)) ===
                                                    c.promise()
                                                )
                                                    throw new TypeError(
                                                        "Thenable self-resolution"
                                                    );
                                                (l =
                                                    a &&
                                                    ("object" == typeof a ||
                                                        "function" ==
                                                            typeof a) &&
                                                    a.then),
                                                    sa(l)
                                                        ? e
                                                            ? l.call(
                                                                  a,
                                                                  f(g, c, j, e),
                                                                  f(g, c, k, e)
                                                              )
                                                            : (g++,
                                                              l.call(
                                                                  a,
                                                                  f(g, c, j, e),
                                                                  f(g, c, k, e),
                                                                  f(
                                                                      g,
                                                                      c,
                                                                      j,
                                                                      c.notifyWith
                                                                  )
                                                              ))
                                                        : (d !== j &&
                                                              ((h = void 0),
                                                              (i = [a])),
                                                          (e || c.resolveWith)(
                                                              h,
                                                              i
                                                          ));
                                            }
                                        },
                                        m = e
                                            ? l
                                            : function () {
                                                  try {
                                                      l();
                                                  } catch (a) {
                                                      va.Deferred
                                                          .exceptionHook &&
                                                          va.Deferred.exceptionHook(
                                                              a,
                                                              m.stackTrace
                                                          ),
                                                          b + 1 >= g &&
                                                              (d !== k &&
                                                                  ((h = void 0),
                                                                  (i = [a])),
                                                              c.rejectWith(
                                                                  h,
                                                                  i
                                                              ));
                                                  }
                                              };
                                    b
                                        ? m()
                                        : (va.Deferred.getStackHook &&
                                              (m.stackTrace =
                                                  va.Deferred.getStackHook()),
                                          a.setTimeout(m));
                                };
                            }
                            var g = 0;
                            return va
                                .Deferred(function (a) {
                                    c[0][3].add(
                                        f(0, a, sa(e) ? e : j, a.notifyWith)
                                    ),
                                        c[1][3].add(f(0, a, sa(b) ? b : j)),
                                        c[2][3].add(f(0, a, sa(d) ? d : k));
                                })
                                .promise();
                        },
                        promise: function (a) {
                            return null != a ? va.extend(a, e) : e;
                        },
                    },
                    f = {};
                return (
                    va.each(c, function (a, b) {
                        var g = b[2],
                            h = b[5];
                        (e[b[1]] = g.add),
                            h &&
                                g.add(
                                    function () {
                                        d = h;
                                    },
                                    c[3 - a][2].disable,
                                    c[3 - a][3].disable,
                                    c[0][2].lock,
                                    c[0][3].lock
                                ),
                            g.add(b[3].fire),
                            (f[b[0]] = function () {
                                return (
                                    f[b[0] + "With"](
                                        this === f ? void 0 : this,
                                        arguments
                                    ),
                                    this
                                );
                            }),
                            (f[b[0] + "With"] = g.fireWith);
                    }),
                    e.promise(f),
                    b && b.call(f, f),
                    f
                );
            },
            when: function (a) {
                var b = arguments.length,
                    c = b,
                    d = Array(c),
                    e = ia.call(arguments),
                    f = va.Deferred(),
                    g = function (a) {
                        return function (c) {
                            (d[a] = this),
                                (e[a] =
                                    arguments.length > 1
                                        ? ia.call(arguments)
                                        : c),
                                --b || f.resolveWith(d, e);
                        };
                    };
                if (
                    b <= 1 &&
                    (l(a, f.done(g(c)).resolve, f.reject, !b),
                    "pending" === f.state() || sa(e[c] && e[c].then))
                )
                    return f.then();
                for (; c--; ) l(e[c], g(c), f.reject);
                return f.promise();
            },
        });
    var Ha = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
    (va.Deferred.exceptionHook = function (b, c) {
        a.console &&
            a.console.warn &&
            b &&
            Ha.test(b.name) &&
            a.console.warn(
                "jQuery.Deferred exception: " + b.message,
                b.stack,
                c
            );
    }),
        (va.readyException = function (b) {
            a.setTimeout(function () {
                throw b;
            });
        });
    var Ia = va.Deferred();
    (va.fn.ready = function (a) {
        return (
            Ia.then(a).catch(function (a) {
                va.readyException(a);
            }),
            this
        );
    }),
        va.extend({
            isReady: !1,
            readyWait: 1,
            ready: function (a) {
                (!0 === a ? --va.readyWait : va.isReady) ||
                    ((va.isReady = !0),
                    (!0 !== a && --va.readyWait > 0) ||
                        Ia.resolveWith(ga, [va]));
            },
        }),
        (va.ready.then = Ia.then),
        "complete" === ga.readyState ||
        ("loading" !== ga.readyState && !ga.documentElement.doScroll)
            ? a.setTimeout(va.ready)
            : (ga.addEventListener("DOMContentLoaded", m),
              a.addEventListener("load", m));
    var Ja = function (a, b, c, e, f, g, h) {
            var i = 0,
                j = a.length,
                k = null == c;
            if ("object" === d(c)) {
                f = !0;
                for (i in c) Ja(a, b, i, c[i], !0, g, h);
            } else if (
                void 0 !== e &&
                ((f = !0),
                sa(e) || (h = !0),
                k &&
                    (h
                        ? (b.call(a, e), (b = null))
                        : ((k = b),
                          (b = function (a, b, c) {
                              return k.call(va(a), c);
                          }))),
                b)
            )
                for (; i < j; i++)
                    b(a[i], c, h ? e : e.call(a[i], i, b(a[i], c)));
            return f ? a : k ? b.call(a) : j ? b(a[0], c) : g;
        },
        Ka = /^-ms-/,
        La = /-([a-z])/g,
        Ma = function (a) {
            return 1 === a.nodeType || 9 === a.nodeType || !+a.nodeType;
        };
    (p.uid = 1),
        (p.prototype = {
            cache: function (a) {
                var b = a[this.expando];
                return (
                    b ||
                        ((b = {}),
                        Ma(a) &&
                            (a.nodeType
                                ? (a[this.expando] = b)
                                : Object.defineProperty(a, this.expando, {
                                      value: b,
                                      configurable: !0,
                                  }))),
                    b
                );
            },
            set: function (a, b, c) {
                var d,
                    e = this.cache(a);
                if ("string" == typeof b) e[o(b)] = c;
                else for (d in b) e[o(d)] = b[d];
                return e;
            },
            get: function (a, b) {
                return void 0 === b
                    ? this.cache(a)
                    : a[this.expando] && a[this.expando][o(b)];
            },
            access: function (a, b, c) {
                return void 0 === b ||
                    (b && "string" == typeof b && void 0 === c)
                    ? this.get(a, b)
                    : (this.set(a, b, c), void 0 !== c ? c : b);
            },
            remove: function (a, b) {
                var c,
                    d = a[this.expando];
                if (void 0 !== d) {
                    if (void 0 !== b) {
                        c = (b = Array.isArray(b)
                            ? b.map(o)
                            : (b = o(b)) in d
                            ? [b]
                            : b.match(Ga) || []).length;
                        for (; c--; ) delete d[b[c]];
                    }
                    (void 0 === b || va.isEmptyObject(d)) &&
                        (a.nodeType
                            ? (a[this.expando] = void 0)
                            : delete a[this.expando]);
                }
            },
            hasData: function (a) {
                var b = a[this.expando];
                return void 0 !== b && !va.isEmptyObject(b);
            },
        });
    var Na = new p(),
        Oa = new p(),
        Pa = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
        Qa = /[A-Z]/g;
    va.extend({
        hasData: function (a) {
            return Oa.hasData(a) || Na.hasData(a);
        },
        data: function (a, b, c) {
            return Oa.access(a, b, c);
        },
        removeData: function (a, b) {
            Oa.remove(a, b);
        },
        _data: function (a, b, c) {
            return Na.access(a, b, c);
        },
        _removeData: function (a, b) {
            Na.remove(a, b);
        },
    }),
        va.fn.extend({
            data: function (a, b) {
                var c,
                    d,
                    e,
                    f = this[0],
                    g = f && f.attributes;
                if (void 0 === a) {
                    if (
                        this.length &&
                        ((e = Oa.get(f)),
                        1 === f.nodeType && !Na.get(f, "hasDataAttrs"))
                    ) {
                        for (c = g.length; c--; )
                            g[c] &&
                                0 === (d = g[c].name).indexOf("data-") &&
                                ((d = o(d.slice(5))), r(f, d, e[d]));
                        Na.set(f, "hasDataAttrs", !0);
                    }
                    return e;
                }
                return "object" == typeof a
                    ? this.each(function () {
                          Oa.set(this, a);
                      })
                    : Ja(
                          this,
                          function (b) {
                              var c;
                              if (f && void 0 === b) {
                                  if (void 0 !== (c = Oa.get(f, a))) return c;
                                  if (void 0 !== (c = r(f, a))) return c;
                              } else
                                  this.each(function () {
                                      Oa.set(this, a, b);
                                  });
                          },
                          null,
                          b,
                          arguments.length > 1,
                          null,
                          !0
                      );
            },
            removeData: function (a) {
                return this.each(function () {
                    Oa.remove(this, a);
                });
            },
        }),
        va.extend({
            queue: function (a, b, c) {
                var d;
                if (a)
                    return (
                        (b = (b || "fx") + "queue"),
                        (d = Na.get(a, b)),
                        c &&
                            (!d || Array.isArray(c)
                                ? (d = Na.access(a, b, va.makeArray(c)))
                                : d.push(c)),
                        d || []
                    );
            },
            dequeue: function (a, b) {
                b = b || "fx";
                var c = va.queue(a, b),
                    d = c.length,
                    e = c.shift(),
                    f = va._queueHooks(a, b),
                    g = function () {
                        va.dequeue(a, b);
                    };
                "inprogress" === e && ((e = c.shift()), d--),
                    e &&
                        ("fx" === b && c.unshift("inprogress"),
                        delete f.stop,
                        e.call(a, g, f)),
                    !d && f && f.empty.fire();
            },
            _queueHooks: function (a, b) {
                var c = b + "queueHooks";
                return (
                    Na.get(a, c) ||
                    Na.access(a, c, {
                        empty: va.Callbacks("once memory").add(function () {
                            Na.remove(a, [b + "queue", c]);
                        }),
                    })
                );
            },
        }),
        va.fn.extend({
            queue: function (a, b) {
                var c = 2;
                return (
                    "string" != typeof a && ((b = a), (a = "fx"), c--),
                    arguments.length < c
                        ? va.queue(this[0], a)
                        : void 0 === b
                        ? this
                        : this.each(function () {
                              var c = va.queue(this, a, b);
                              va._queueHooks(this, a),
                                  "fx" === a &&
                                      "inprogress" !== c[0] &&
                                      va.dequeue(this, a);
                          })
                );
            },
            dequeue: function (a) {
                return this.each(function () {
                    va.dequeue(this, a);
                });
            },
            clearQueue: function (a) {
                return this.queue(a || "fx", []);
            },
            promise: function (a, b) {
                var c,
                    d = 1,
                    e = va.Deferred(),
                    f = this,
                    g = this.length,
                    h = function () {
                        --d || e.resolveWith(f, [f]);
                    };
                for (
                    "string" != typeof a && ((b = a), (a = void 0)),
                        a = a || "fx";
                    g--;

                )
                    (c = Na.get(f[g], a + "queueHooks")) &&
                        c.empty &&
                        (d++, c.empty.add(h));
                return h(), e.promise(b);
            },
        });
    var Ra = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
        Sa = new RegExp("^(?:([+-])=|)(" + Ra + ")([a-z%]*)$", "i"),
        Ta = ["Top", "Right", "Bottom", "Left"],
        Ua = function (a, b) {
            return (
                "none" === (a = b || a).style.display ||
                ("" === a.style.display &&
                    va.contains(a.ownerDocument, a) &&
                    "none" === va.css(a, "display"))
            );
        },
        Va = function (a, b, c, d) {
            var e,
                f,
                g = {};
            for (f in b) (g[f] = a.style[f]), (a.style[f] = b[f]);
            e = c.apply(a, d || []);
            for (f in b) a.style[f] = g[f];
            return e;
        },
        Wa = {};
    va.fn.extend({
        show: function () {
            return u(this, !0);
        },
        hide: function () {
            return u(this);
        },
        toggle: function (a) {
            return "boolean" == typeof a
                ? a
                    ? this.show()
                    : this.hide()
                : this.each(function () {
                      Ua(this) ? va(this).show() : va(this).hide();
                  });
        },
    });
    var Xa = /^(?:checkbox|radio)$/i,
        Ya = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i,
        Za = /^$|^module$|\/(?:java|ecma)script/i,
        $a = {
            option: [1, "<select multiple='multiple'>", "</select>"],
            thead: [1, "<table>", "</table>"],
            col: [2, "<table><colgroup>", "</colgroup></table>"],
            tr: [2, "<table><tbody>", "</tbody></table>"],
            td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
            _default: [0, "", ""],
        };
    ($a.optgroup = $a.option),
        ($a.tbody = $a.tfoot = $a.colgroup = $a.caption = $a.thead),
        ($a.th = $a.td);
    var _a = /<|&#?\w+;/;
    !(function () {
        var a = ga
                .createDocumentFragment()
                .appendChild(ga.createElement("div")),
            b = ga.createElement("input");
        b.setAttribute("type", "radio"),
            b.setAttribute("checked", "checked"),
            b.setAttribute("name", "t"),
            a.appendChild(b),
            (ra.checkClone = a.cloneNode(!0).cloneNode(!0).lastChild.checked),
            (a.innerHTML = "<textarea>x</textarea>"),
            (ra.noCloneChecked = !!a.cloneNode(!0).lastChild.defaultValue);
    })();
    var ab = ga.documentElement,
        bb = /^key/,
        cb = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
        db = /^([^.]*)(?:\.(.+)|)/;
    (va.event = {
        global: {},
        add: function (a, b, c, d, e) {
            var f,
                g,
                h,
                i,
                j,
                k,
                l,
                m,
                n,
                o,
                p,
                q = Na.get(a);
            if (q)
                for (
                    c.handler && ((c = (f = c).handler), (e = f.selector)),
                        e && va.find.matchesSelector(ab, e),
                        c.guid || (c.guid = va.guid++),
                        (i = q.events) || (i = q.events = {}),
                        (g = q.handle) ||
                            (g = q.handle =
                                function (b) {
                                    return void 0 !== va &&
                                        va.event.triggered !== b.type
                                        ? va.event.dispatch.apply(a, arguments)
                                        : void 0;
                                }),
                        j = (b = (b || "").match(Ga) || [""]).length;
                    j--;

                )
                    (n = p = (h = db.exec(b[j]) || [])[1]),
                        (o = (h[2] || "").split(".").sort()),
                        n &&
                            ((l = va.event.special[n] || {}),
                            (n = (e ? l.delegateType : l.bindType) || n),
                            (l = va.event.special[n] || {}),
                            (k = va.extend(
                                {
                                    type: n,
                                    origType: p,
                                    data: d,
                                    handler: c,
                                    guid: c.guid,
                                    selector: e,
                                    needsContext:
                                        e && va.expr.match.needsContext.test(e),
                                    namespace: o.join("."),
                                },
                                f
                            )),
                            (m = i[n]) ||
                                (((m = i[n] = []).delegateCount = 0),
                                (l.setup && !1 !== l.setup.call(a, d, o, g)) ||
                                    (a.addEventListener &&
                                        a.addEventListener(n, g))),
                            l.add &&
                                (l.add.call(a, k),
                                k.handler.guid || (k.handler.guid = c.guid)),
                            e ? m.splice(m.delegateCount++, 0, k) : m.push(k),
                            (va.event.global[n] = !0));
        },
        remove: function (a, b, c, d, e) {
            var f,
                g,
                h,
                i,
                j,
                k,
                l,
                m,
                n,
                o,
                p,
                q = Na.hasData(a) && Na.get(a);
            if (q && (i = q.events)) {
                for (j = (b = (b || "").match(Ga) || [""]).length; j--; )
                    if (
                        ((h = db.exec(b[j]) || []),
                        (n = p = h[1]),
                        (o = (h[2] || "").split(".").sort()),
                        n)
                    ) {
                        for (
                            l = va.event.special[n] || {},
                                m =
                                    i[
                                        (n =
                                            (d ? l.delegateType : l.bindType) ||
                                            n)
                                    ] || [],
                                h =
                                    h[2] &&
                                    new RegExp(
                                        "(^|\\.)" +
                                            o.join("\\.(?:.*\\.|)") +
                                            "(\\.|$)"
                                    ),
                                g = f = m.length;
                            f--;

                        )
                            (k = m[f]),
                                (!e && p !== k.origType) ||
                                    (c && c.guid !== k.guid) ||
                                    (h && !h.test(k.namespace)) ||
                                    (d &&
                                        d !== k.selector &&
                                        ("**" !== d || !k.selector)) ||
                                    (m.splice(f, 1),
                                    k.selector && m.delegateCount--,
                                    l.remove && l.remove.call(a, k));
                        g &&
                            !m.length &&
                            ((l.teardown &&
                                !1 !== l.teardown.call(a, o, q.handle)) ||
                                va.removeEvent(a, n, q.handle),
                            delete i[n]);
                    } else for (n in i) va.event.remove(a, n + b[j], c, d, !0);
                va.isEmptyObject(i) && Na.remove(a, "handle events");
            }
        },
        dispatch: function (a) {
            var b,
                c,
                d,
                e,
                f,
                g,
                h = va.event.fix(a),
                i = new Array(arguments.length),
                j = (Na.get(this, "events") || {})[h.type] || [],
                k = va.event.special[h.type] || {};
            for (i[0] = h, b = 1; b < arguments.length; b++)
                i[b] = arguments[b];
            if (
                ((h.delegateTarget = this),
                !k.preDispatch || !1 !== k.preDispatch.call(this, h))
            ) {
                for (
                    g = va.event.handlers.call(this, h, j), b = 0;
                    (e = g[b++]) && !h.isPropagationStopped();

                )
                    for (
                        h.currentTarget = e.elem, c = 0;
                        (f = e.handlers[c++]) &&
                        !h.isImmediatePropagationStopped();

                    )
                        (h.rnamespace && !h.rnamespace.test(f.namespace)) ||
                            ((h.handleObj = f),
                            (h.data = f.data),
                            void 0 !==
                                (d = (
                                    (va.event.special[f.origType] || {})
                                        .handle || f.handler
                                ).apply(e.elem, i)) &&
                                !1 === (h.result = d) &&
                                (h.preventDefault(), h.stopPropagation()));
                return k.postDispatch && k.postDispatch.call(this, h), h.result;
            }
        },
        handlers: function (a, b) {
            var c,
                d,
                e,
                f,
                g,
                h = [],
                i = b.delegateCount,
                j = a.target;
            if (i && j.nodeType && !("click" === a.type && a.button >= 1))
                for (; j !== this; j = j.parentNode || this)
                    if (
                        1 === j.nodeType &&
                        ("click" !== a.type || !0 !== j.disabled)
                    ) {
                        for (f = [], g = {}, c = 0; c < i; c++)
                            void 0 === g[(e = (d = b[c]).selector + " ")] &&
                                (g[e] = d.needsContext
                                    ? va(e, this).index(j) > -1
                                    : va.find(e, this, null, [j]).length),
                                g[e] && f.push(d);
                        f.length && h.push({ elem: j, handlers: f });
                    }
            return (
                (j = this),
                i < b.length && h.push({ elem: j, handlers: b.slice(i) }),
                h
            );
        },
        addProp: function (a, b) {
            Object.defineProperty(va.Event.prototype, a, {
                enumerable: !0,
                configurable: !0,
                get: sa(b)
                    ? function () {
                          if (this.originalEvent) return b(this.originalEvent);
                      }
                    : function () {
                          if (this.originalEvent) return this.originalEvent[a];
                      },
                set: function (b) {
                    Object.defineProperty(this, a, {
                        enumerable: !0,
                        configurable: !0,
                        writable: !0,
                        value: b,
                    });
                },
            });
        },
        fix: function (a) {
            return a[va.expando] ? a : new va.Event(a);
        },
        special: {
            load: { noBubble: !0 },
            focus: {
                trigger: function () {
                    if (this !== A() && this.focus) return this.focus(), !1;
                },
                delegateType: "focusin",
            },
            blur: {
                trigger: function () {
                    if (this === A() && this.blur) return this.blur(), !1;
                },
                delegateType: "focusout",
            },
            click: {
                trigger: function () {
                    if (
                        "checkbox" === this.type &&
                        this.click &&
                        f(this, "input")
                    )
                        return this.click(), !1;
                },
                _default: function (a) {
                    return f(a.target, "a");
                },
            },
            beforeunload: {
                postDispatch: function (a) {
                    void 0 !== a.result &&
                        a.originalEvent &&
                        (a.originalEvent.returnValue = a.result);
                },
            },
        },
    }),
        (va.removeEvent = function (a, b, c) {
            a.removeEventListener && a.removeEventListener(b, c);
        }),
        (va.Event = function (a, b) {
            if (!(this instanceof va.Event)) return new va.Event(a, b);
            a && a.type
                ? ((this.originalEvent = a),
                  (this.type = a.type),
                  (this.isDefaultPrevented =
                      a.defaultPrevented ||
                      (void 0 === a.defaultPrevented && !1 === a.returnValue)
                          ? y
                          : z),
                  (this.target =
                      a.target && 3 === a.target.nodeType
                          ? a.target.parentNode
                          : a.target),
                  (this.currentTarget = a.currentTarget),
                  (this.relatedTarget = a.relatedTarget))
                : (this.type = a),
                b && va.extend(this, b),
                (this.timeStamp = (a && a.timeStamp) || Date.now()),
                (this[va.expando] = !0);
        }),
        (va.Event.prototype = {
            constructor: va.Event,
            isDefaultPrevented: z,
            isPropagationStopped: z,
            isImmediatePropagationStopped: z,
            isSimulated: !1,
            preventDefault: function () {
                var a = this.originalEvent;
                (this.isDefaultPrevented = y),
                    a && !this.isSimulated && a.preventDefault();
            },
            stopPropagation: function () {
                var a = this.originalEvent;
                (this.isPropagationStopped = y),
                    a && !this.isSimulated && a.stopPropagation();
            },
            stopImmediatePropagation: function () {
                var a = this.originalEvent;
                (this.isImmediatePropagationStopped = y),
                    a && !this.isSimulated && a.stopImmediatePropagation(),
                    this.stopPropagation();
            },
        }),
        va.each(
            {
                altKey: !0,
                bubbles: !0,
                cancelable: !0,
                changedTouches: !0,
                ctrlKey: !0,
                detail: !0,
                eventPhase: !0,
                metaKey: !0,
                pageX: !0,
                pageY: !0,
                shiftKey: !0,
                view: !0,
                char: !0,
                charCode: !0,
                key: !0,
                keyCode: !0,
                button: !0,
                buttons: !0,
                clientX: !0,
                clientY: !0,
                offsetX: !0,
                offsetY: !0,
                pointerId: !0,
                pointerType: !0,
                screenX: !0,
                screenY: !0,
                targetTouches: !0,
                toElement: !0,
                touches: !0,
                which: function (a) {
                    var b = a.button;
                    return null == a.which && bb.test(a.type)
                        ? null != a.charCode
                            ? a.charCode
                            : a.keyCode
                        : !a.which && void 0 !== b && cb.test(a.type)
                        ? 1 & b
                            ? 1
                            : 2 & b
                            ? 3
                            : 4 & b
                            ? 2
                            : 0
                        : a.which;
                },
            },
            va.event.addProp
        ),
        va.each(
            {
                mouseenter: "mouseover",
                mouseleave: "mouseout",
                pointerenter: "pointerover",
                pointerleave: "pointerout",
            },
            function (a, b) {
                va.event.special[a] = {
                    delegateType: b,
                    bindType: b,
                    handle: function (a) {
                        var c,
                            d = this,
                            e = a.relatedTarget,
                            f = a.handleObj;
                        return (
                            (e && (e === d || va.contains(d, e))) ||
                                ((a.type = f.origType),
                                (c = f.handler.apply(this, arguments)),
                                (a.type = b)),
                            c
                        );
                    },
                };
            }
        ),
        va.fn.extend({
            on: function (a, b, c, d) {
                return B(this, a, b, c, d);
            },
            one: function (a, b, c, d) {
                return B(this, a, b, c, d, 1);
            },
            off: function (a, b, c) {
                var d, e;
                if (a && a.preventDefault && a.handleObj)
                    return (
                        (d = a.handleObj),
                        va(a.delegateTarget).off(
                            d.namespace
                                ? d.origType + "." + d.namespace
                                : d.origType,
                            d.selector,
                            d.handler
                        ),
                        this
                    );
                if ("object" == typeof a) {
                    for (e in a) this.off(e, b, a[e]);
                    return this;
                }
                return (
                    (!1 !== b && "function" != typeof b) ||
                        ((c = b), (b = void 0)),
                    !1 === c && (c = z),
                    this.each(function () {
                        va.event.remove(this, a, c, b);
                    })
                );
            },
        });
    var eb =
            /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
        fb = /<script|<style|<link/i,
        gb = /checked\s*(?:[^=]|=\s*.checked.)/i,
        hb = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
    va.extend({
        htmlPrefilter: function (a) {
            return a.replace(eb, "<$1></$2>");
        },
        clone: function (a, b, c) {
            var d,
                e,
                f,
                g,
                h = a.cloneNode(!0),
                i = va.contains(a.ownerDocument, a);
            if (
                !(
                    ra.noCloneChecked ||
                    (1 !== a.nodeType && 11 !== a.nodeType) ||
                    va.isXMLDoc(a)
                )
            )
                for (g = v(h), d = 0, e = (f = v(a)).length; d < e; d++)
                    G(f[d], g[d]);
            if (b)
                if (c)
                    for (
                        f = f || v(a), g = g || v(h), d = 0, e = f.length;
                        d < e;
                        d++
                    )
                        F(f[d], g[d]);
                else F(a, h);
            return (
                (g = v(h, "script")).length > 0 && w(g, !i && v(a, "script")), h
            );
        },
        cleanData: function (a) {
            for (
                var b, c, d, e = va.event.special, f = 0;
                void 0 !== (c = a[f]);
                f++
            )
                if (Ma(c)) {
                    if ((b = c[Na.expando])) {
                        if (b.events)
                            for (d in b.events)
                                e[d]
                                    ? va.event.remove(c, d)
                                    : va.removeEvent(c, d, b.handle);
                        c[Na.expando] = void 0;
                    }
                    c[Oa.expando] && (c[Oa.expando] = void 0);
                }
        },
    }),
        va.fn.extend({
            detach: function (a) {
                return I(this, a, !0);
            },
            remove: function (a) {
                return I(this, a);
            },
            text: function (a) {
                return Ja(
                    this,
                    function (a) {
                        return void 0 === a
                            ? va.text(this)
                            : this.empty().each(function () {
                                  (1 !== this.nodeType &&
                                      11 !== this.nodeType &&
                                      9 !== this.nodeType) ||
                                      (this.textContent = a);
                              });
                    },
                    null,
                    a,
                    arguments.length
                );
            },
            append: function () {
                return H(this, arguments, function (a) {
                    (1 !== this.nodeType &&
                        11 !== this.nodeType &&
                        9 !== this.nodeType) ||
                        C(this, a).appendChild(a);
                });
            },
            prepend: function () {
                return H(this, arguments, function (a) {
                    if (
                        1 === this.nodeType ||
                        11 === this.nodeType ||
                        9 === this.nodeType
                    ) {
                        var b = C(this, a);
                        b.insertBefore(a, b.firstChild);
                    }
                });
            },
            before: function () {
                return H(this, arguments, function (a) {
                    this.parentNode && this.parentNode.insertBefore(a, this);
                });
            },
            after: function () {
                return H(this, arguments, function (a) {
                    this.parentNode &&
                        this.parentNode.insertBefore(a, this.nextSibling);
                });
            },
            empty: function () {
                for (var a, b = 0; null != (a = this[b]); b++)
                    1 === a.nodeType &&
                        (va.cleanData(v(a, !1)), (a.textContent = ""));
                return this;
            },
            clone: function (a, b) {
                return (
                    (a = null != a && a),
                    (b = null == b ? a : b),
                    this.map(function () {
                        return va.clone(this, a, b);
                    })
                );
            },
            html: function (a) {
                return Ja(
                    this,
                    function (a) {
                        var b = this[0] || {},
                            c = 0,
                            d = this.length;
                        if (void 0 === a && 1 === b.nodeType)
                            return b.innerHTML;
                        if (
                            "string" == typeof a &&
                            !fb.test(a) &&
                            !$a[(Ya.exec(a) || ["", ""])[1].toLowerCase()]
                        ) {
                            a = va.htmlPrefilter(a);
                            try {
                                for (; c < d; c++)
                                    1 === (b = this[c] || {}).nodeType &&
                                        (va.cleanData(v(b, !1)),
                                        (b.innerHTML = a));
                                b = 0;
                            } catch (a) {}
                        }
                        b && this.empty().append(a);
                    },
                    null,
                    a,
                    arguments.length
                );
            },
            replaceWith: function () {
                var a = [];
                return H(
                    this,
                    arguments,
                    function (b) {
                        var c = this.parentNode;
                        va.inArray(this, a) < 0 &&
                            (va.cleanData(v(this)),
                            c && c.replaceChild(b, this));
                    },
                    a
                );
            },
        }),
        va.each(
            {
                appendTo: "append",
                prependTo: "prepend",
                insertBefore: "before",
                insertAfter: "after",
                replaceAll: "replaceWith",
            },
            function (a, b) {
                va.fn[a] = function (a) {
                    for (
                        var c, d = [], e = va(a), f = e.length - 1, g = 0;
                        g <= f;
                        g++
                    )
                        (c = g === f ? this : this.clone(!0)),
                            va(e[g])[b](c),
                            ka.apply(d, c.get());
                    return this.pushStack(d);
                };
            }
        );
    var ib = new RegExp("^(" + Ra + ")(?!px)[a-z%]+$", "i"),
        jb = function (b) {
            var c = b.ownerDocument.defaultView;
            return (c && c.opener) || (c = a), c.getComputedStyle(b);
        },
        kb = new RegExp(Ta.join("|"), "i");
    !(function () {
        function b() {
            if (j) {
                (i.style.cssText =
                    "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0"),
                    (j.style.cssText =
                        "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%"),
                    ab.appendChild(i).appendChild(j);
                var b = a.getComputedStyle(j);
                (d = "1%" !== b.top),
                    (h = 12 === c(b.marginLeft)),
                    (j.style.right = "60%"),
                    (g = 36 === c(b.right)),
                    (e = 36 === c(b.width)),
                    (j.style.position = "absolute"),
                    (f = 36 === j.offsetWidth || "absolute"),
                    ab.removeChild(i),
                    (j = null);
            }
        }
        function c(a) {
            return Math.round(parseFloat(a));
        }
        var d,
            e,
            f,
            g,
            h,
            i = ga.createElement("div"),
            j = ga.createElement("div");
        j.style &&
            ((j.style.backgroundClip = "content-box"),
            (j.cloneNode(!0).style.backgroundClip = ""),
            (ra.clearCloneStyle = "content-box" === j.style.backgroundClip),
            va.extend(ra, {
                boxSizingReliable: function () {
                    return b(), e;
                },
                pixelBoxStyles: function () {
                    return b(), g;
                },
                pixelPosition: function () {
                    return b(), d;
                },
                reliableMarginLeft: function () {
                    return b(), h;
                },
                scrollboxSize: function () {
                    return b(), f;
                },
            }));
    })();
    var lb = /^(none|table(?!-c[ea]).+)/,
        mb = /^--/,
        nb = { position: "absolute", visibility: "hidden", display: "block" },
        ob = { letterSpacing: "0", fontWeight: "400" },
        pb = ["Webkit", "Moz", "ms"],
        qb = ga.createElement("div").style;
    va.extend({
        cssHooks: {
            opacity: {
                get: function (a, b) {
                    if (b) {
                        var c = J(a, "opacity");
                        return "" === c ? "1" : c;
                    }
                },
            },
        },
        cssNumber: {
            animationIterationCount: !0,
            columnCount: !0,
            fillOpacity: !0,
            flexGrow: !0,
            flexShrink: !0,
            fontWeight: !0,
            lineHeight: !0,
            opacity: !0,
            order: !0,
            orphans: !0,
            widows: !0,
            zIndex: !0,
            zoom: !0,
        },
        cssProps: {},
        style: function (a, b, c, d) {
            if (a && 3 !== a.nodeType && 8 !== a.nodeType && a.style) {
                var e,
                    f,
                    g,
                    h = o(b),
                    i = mb.test(b),
                    j = a.style;
                if (
                    (i || (b = M(h)),
                    (g = va.cssHooks[b] || va.cssHooks[h]),
                    void 0 === c)
                )
                    return g && "get" in g && void 0 !== (e = g.get(a, !1, d))
                        ? e
                        : j[b];
                "string" == (f = typeof c) &&
                    (e = Sa.exec(c)) &&
                    e[1] &&
                    ((c = s(a, b, e)), (f = "number")),
                    null != c &&
                        c === c &&
                        ("number" === f &&
                            (c += (e && e[3]) || (va.cssNumber[h] ? "" : "px")),
                        ra.clearCloneStyle ||
                            "" !== c ||
                            0 !== b.indexOf("background") ||
                            (j[b] = "inherit"),
                        (g && "set" in g && void 0 === (c = g.set(a, c, d))) ||
                            (i ? j.setProperty(b, c) : (j[b] = c)));
            }
        },
        css: function (a, b, c, d) {
            var e,
                f,
                g,
                h = o(b);
            return (
                mb.test(b) || (b = M(h)),
                (g = va.cssHooks[b] || va.cssHooks[h]) &&
                    "get" in g &&
                    (e = g.get(a, !0, c)),
                void 0 === e && (e = J(a, b, d)),
                "normal" === e && b in ob && (e = ob[b]),
                "" === c || c
                    ? ((f = parseFloat(e)),
                      !0 === c || isFinite(f) ? f || 0 : e)
                    : e
            );
        },
    }),
        va.each(["height", "width"], function (a, b) {
            va.cssHooks[b] = {
                get: function (a, c, d) {
                    if (c)
                        return !lb.test(va.css(a, "display")) ||
                            (a.getClientRects().length &&
                                a.getBoundingClientRect().width)
                            ? P(a, b, d)
                            : Va(a, nb, function () {
                                  return P(a, b, d);
                              });
                },
                set: function (a, c, d) {
                    var e,
                        f = jb(a),
                        g = "border-box" === va.css(a, "boxSizing", !1, f),
                        h = d && O(a, b, d, g, f);
                    return (
                        g &&
                            ra.scrollboxSize() === f.position &&
                            (h -= Math.ceil(
                                a["offset" + b[0].toUpperCase() + b.slice(1)] -
                                    parseFloat(f[b]) -
                                    O(a, b, "border", !1, f) -
                                    0.5
                            )),
                        h &&
                            (e = Sa.exec(c)) &&
                            "px" !== (e[3] || "px") &&
                            ((a.style[b] = c), (c = va.css(a, b))),
                        N(a, c, h)
                    );
                },
            };
        }),
        (va.cssHooks.marginLeft = K(ra.reliableMarginLeft, function (a, b) {
            if (b)
                return (
                    (parseFloat(J(a, "marginLeft")) ||
                        a.getBoundingClientRect().left -
                            Va(a, { marginLeft: 0 }, function () {
                                return a.getBoundingClientRect().left;
                            })) + "px"
                );
        })),
        va.each({ margin: "", padding: "", border: "Width" }, function (a, b) {
            (va.cssHooks[a + b] = {
                expand: function (c) {
                    for (
                        var d = 0,
                            e = {},
                            f = "string" == typeof c ? c.split(" ") : [c];
                        d < 4;
                        d++
                    )
                        e[a + Ta[d] + b] = f[d] || f[d - 2] || f[0];
                    return e;
                },
            }),
                "margin" !== a && (va.cssHooks[a + b].set = N);
        }),
        va.fn.extend({
            css: function (a, b) {
                return Ja(
                    this,
                    function (a, b, c) {
                        var d,
                            e,
                            f = {},
                            g = 0;
                        if (Array.isArray(b)) {
                            for (d = jb(a), e = b.length; g < e; g++)
                                f[b[g]] = va.css(a, b[g], !1, d);
                            return f;
                        }
                        return void 0 !== c ? va.style(a, b, c) : va.css(a, b);
                    },
                    a,
                    b,
                    arguments.length > 1
                );
            },
        }),
        (va.Tween = Q),
        (Q.prototype = {
            constructor: Q,
            init: function (a, b, c, d, e, f) {
                (this.elem = a),
                    (this.prop = c),
                    (this.easing = e || va.easing._default),
                    (this.options = b),
                    (this.start = this.now = this.cur()),
                    (this.end = d),
                    (this.unit = f || (va.cssNumber[c] ? "" : "px"));
            },
            cur: function () {
                var a = Q.propHooks[this.prop];
                return a && a.get
                    ? a.get(this)
                    : Q.propHooks._default.get(this);
            },
            run: function (a) {
                var b,
                    c = Q.propHooks[this.prop];
                return (
                    this.options.duration
                        ? (this.pos = b =
                              va.easing[this.easing](
                                  a,
                                  this.options.duration * a,
                                  0,
                                  1,
                                  this.options.duration
                              ))
                        : (this.pos = b = a),
                    (this.now = (this.end - this.start) * b + this.start),
                    this.options.step &&
                        this.options.step.call(this.elem, this.now, this),
                    c && c.set ? c.set(this) : Q.propHooks._default.set(this),
                    this
                );
            },
        }),
        (Q.prototype.init.prototype = Q.prototype),
        (Q.propHooks = {
            _default: {
                get: function (a) {
                    var b;
                    return 1 !== a.elem.nodeType ||
                        (null != a.elem[a.prop] && null == a.elem.style[a.prop])
                        ? a.elem[a.prop]
                        : (b = va.css(a.elem, a.prop, "")) && "auto" !== b
                        ? b
                        : 0;
                },
                set: function (a) {
                    va.fx.step[a.prop]
                        ? va.fx.step[a.prop](a)
                        : 1 !== a.elem.nodeType ||
                          (null == a.elem.style[va.cssProps[a.prop]] &&
                              !va.cssHooks[a.prop])
                        ? (a.elem[a.prop] = a.now)
                        : va.style(a.elem, a.prop, a.now + a.unit);
                },
            },
        }),
        (Q.propHooks.scrollTop = Q.propHooks.scrollLeft =
            {
                set: function (a) {
                    a.elem.nodeType &&
                        a.elem.parentNode &&
                        (a.elem[a.prop] = a.now);
                },
            }),
        (va.easing = {
            linear: function (a) {
                return a;
            },
            swing: function (a) {
                return 0.5 - Math.cos(a * Math.PI) / 2;
            },
            _default: "swing",
        }),
        (va.fx = Q.prototype.init),
        (va.fx.step = {});
    var rb,
        sb,
        tb = /^(?:toggle|show|hide)$/,
        ub = /queueHooks$/;
    (va.Animation = va.extend(X, {
        tweeners: {
            "*": [
                function (a, b) {
                    var c = this.createTween(a, b);
                    return s(c.elem, a, Sa.exec(b), c), c;
                },
            ],
        },
        tweener: function (a, b) {
            sa(a) ? ((b = a), (a = ["*"])) : (a = a.match(Ga));
            for (var c, d = 0, e = a.length; d < e; d++)
                (c = a[d]),
                    (X.tweeners[c] = X.tweeners[c] || []),
                    X.tweeners[c].unshift(b);
        },
        prefilters: [V],
        prefilter: function (a, b) {
            b ? X.prefilters.unshift(a) : X.prefilters.push(a);
        },
    })),
        (va.speed = function (a, b, c) {
            var d =
                a && "object" == typeof a
                    ? va.extend({}, a)
                    : {
                          complete: c || (!c && b) || (sa(a) && a),
                          duration: a,
                          easing: (c && b) || (b && !sa(b) && b),
                      };
            return (
                va.fx.off
                    ? (d.duration = 0)
                    : "number" != typeof d.duration &&
                      (d.duration in va.fx.speeds
                          ? (d.duration = va.fx.speeds[d.duration])
                          : (d.duration = va.fx.speeds._default)),
                (null != d.queue && !0 !== d.queue) || (d.queue = "fx"),
                (d.old = d.complete),
                (d.complete = function () {
                    sa(d.old) && d.old.call(this),
                        d.queue && va.dequeue(this, d.queue);
                }),
                d
            );
        }),
        va.fn.extend({
            fadeTo: function (a, b, c, d) {
                return this.filter(Ua)
                    .css("opacity", 0)
                    .show()
                    .end()
                    .animate({ opacity: b }, a, c, d);
            },
            animate: function (a, b, c, d) {
                var e = va.isEmptyObject(a),
                    f = va.speed(b, c, d),
                    g = function () {
                        var b = X(this, va.extend({}, a), f);
                        (e || Na.get(this, "finish")) && b.stop(!0);
                    };
                return (
                    (g.finish = g),
                    e || !1 === f.queue ? this.each(g) : this.queue(f.queue, g)
                );
            },
            stop: function (a, b, c) {
                var d = function (a) {
                    var b = a.stop;
                    delete a.stop, b(c);
                };
                return (
                    "string" != typeof a && ((c = b), (b = a), (a = void 0)),
                    b && !1 !== a && this.queue(a || "fx", []),
                    this.each(function () {
                        var b = !0,
                            e = null != a && a + "queueHooks",
                            f = va.timers,
                            g = Na.get(this);
                        if (e) g[e] && g[e].stop && d(g[e]);
                        else
                            for (e in g)
                                g[e] && g[e].stop && ub.test(e) && d(g[e]);
                        for (e = f.length; e--; )
                            f[e].elem !== this ||
                                (null != a && f[e].queue !== a) ||
                                (f[e].anim.stop(c), (b = !1), f.splice(e, 1));
                        (!b && c) || va.dequeue(this, a);
                    })
                );
            },
            finish: function (a) {
                return (
                    !1 !== a && (a = a || "fx"),
                    this.each(function () {
                        var b,
                            c = Na.get(this),
                            d = c[a + "queue"],
                            e = c[a + "queueHooks"],
                            f = va.timers,
                            g = d ? d.length : 0;
                        for (
                            c.finish = !0,
                                va.queue(this, a, []),
                                e && e.stop && e.stop.call(this, !0),
                                b = f.length;
                            b--;

                        )
                            f[b].elem === this &&
                                f[b].queue === a &&
                                (f[b].anim.stop(!0), f.splice(b, 1));
                        for (b = 0; b < g; b++)
                            d[b] && d[b].finish && d[b].finish.call(this);
                        delete c.finish;
                    })
                );
            },
        }),
        va.each(["toggle", "show", "hide"], function (a, b) {
            var c = va.fn[b];
            va.fn[b] = function (a, d, e) {
                return null == a || "boolean" == typeof a
                    ? c.apply(this, arguments)
                    : this.animate(T(b, !0), a, d, e);
            };
        }),
        va.each(
            {
                slideDown: T("show"),
                slideUp: T("hide"),
                slideToggle: T("toggle"),
                fadeIn: { opacity: "show" },
                fadeOut: { opacity: "hide" },
                fadeToggle: { opacity: "toggle" },
            },
            function (a, b) {
                va.fn[a] = function (a, c, d) {
                    return this.animate(b, a, c, d);
                };
            }
        ),
        (va.timers = []),
        (va.fx.tick = function () {
            var a,
                b = 0,
                c = va.timers;
            for (rb = Date.now(); b < c.length; b++)
                (a = c[b])() || c[b] !== a || c.splice(b--, 1);
            c.length || va.fx.stop(), (rb = void 0);
        }),
        (va.fx.timer = function (a) {
            va.timers.push(a), va.fx.start();
        }),
        (va.fx.interval = 13),
        (va.fx.start = function () {
            sb || ((sb = !0), R());
        }),
        (va.fx.stop = function () {
            sb = null;
        }),
        (va.fx.speeds = { slow: 600, fast: 200, _default: 400 }),
        (va.fn.delay = function (b, c) {
            return (
                (b = va.fx ? va.fx.speeds[b] || b : b),
                (c = c || "fx"),
                this.queue(c, function (c, d) {
                    var e = a.setTimeout(c, b);
                    d.stop = function () {
                        a.clearTimeout(e);
                    };
                })
            );
        }),
        (function () {
            var a = ga.createElement("input"),
                b = ga
                    .createElement("select")
                    .appendChild(ga.createElement("option"));
            (a.type = "checkbox"),
                (ra.checkOn = "" !== a.value),
                (ra.optSelected = b.selected),
                ((a = ga.createElement("input")).value = "t"),
                (a.type = "radio"),
                (ra.radioValue = "t" === a.value);
        })();
    var vb,
        wb = va.expr.attrHandle;
    va.fn.extend({
        attr: function (a, b) {
            return Ja(this, va.attr, a, b, arguments.length > 1);
        },
        removeAttr: function (a) {
            return this.each(function () {
                va.removeAttr(this, a);
            });
        },
    }),
        va.extend({
            attr: function (a, b, c) {
                var d,
                    e,
                    f = a.nodeType;
                if (3 !== f && 8 !== f && 2 !== f)
                    return void 0 === a.getAttribute
                        ? va.prop(a, b, c)
                        : ((1 === f && va.isXMLDoc(a)) ||
                              (e =
                                  va.attrHooks[b.toLowerCase()] ||
                                  (va.expr.match.bool.test(b) ? vb : void 0)),
                          void 0 !== c
                              ? null === c
                                  ? void va.removeAttr(a, b)
                                  : e &&
                                    "set" in e &&
                                    void 0 !== (d = e.set(a, c, b))
                                  ? d
                                  : (a.setAttribute(b, c + ""), c)
                              : e && "get" in e && null !== (d = e.get(a, b))
                              ? d
                              : null == (d = va.find.attr(a, b))
                              ? void 0
                              : d);
            },
            attrHooks: {
                type: {
                    set: function (a, b) {
                        if (!ra.radioValue && "radio" === b && f(a, "input")) {
                            var c = a.value;
                            return (
                                a.setAttribute("type", b), c && (a.value = c), b
                            );
                        }
                    },
                },
            },
            removeAttr: function (a, b) {
                var c,
                    d = 0,
                    e = b && b.match(Ga);
                if (e && 1 === a.nodeType)
                    for (; (c = e[d++]); ) a.removeAttribute(c);
            },
        }),
        (vb = {
            set: function (a, b, c) {
                return !1 === b ? va.removeAttr(a, c) : a.setAttribute(c, c), c;
            },
        }),
        va.each(va.expr.match.bool.source.match(/\w+/g), function (a, b) {
            var c = wb[b] || va.find.attr;
            wb[b] = function (a, b, d) {
                var e,
                    f,
                    g = b.toLowerCase();
                return (
                    d ||
                        ((f = wb[g]),
                        (wb[g] = e),
                        (e = null != c(a, b, d) ? g : null),
                        (wb[g] = f)),
                    e
                );
            };
        });
    var xb = /^(?:input|select|textarea|button)$/i,
        yb = /^(?:a|area)$/i;
    va.fn.extend({
        prop: function (a, b) {
            return Ja(this, va.prop, a, b, arguments.length > 1);
        },
        removeProp: function (a) {
            return this.each(function () {
                delete this[va.propFix[a] || a];
            });
        },
    }),
        va.extend({
            prop: function (a, b, c) {
                var d,
                    e,
                    f = a.nodeType;
                if (3 !== f && 8 !== f && 2 !== f)
                    return (
                        (1 === f && va.isXMLDoc(a)) ||
                            ((b = va.propFix[b] || b), (e = va.propHooks[b])),
                        void 0 !== c
                            ? e && "set" in e && void 0 !== (d = e.set(a, c, b))
                                ? d
                                : (a[b] = c)
                            : e && "get" in e && null !== (d = e.get(a, b))
                            ? d
                            : a[b]
                    );
            },
            propHooks: {
                tabIndex: {
                    get: function (a) {
                        var b = va.find.attr(a, "tabindex");
                        return b
                            ? parseInt(b, 10)
                            : xb.test(a.nodeName) ||
                              (yb.test(a.nodeName) && a.href)
                            ? 0
                            : -1;
                    },
                },
            },
            propFix: { for: "htmlFor", class: "className" },
        }),
        ra.optSelected ||
            (va.propHooks.selected = {
                get: function (a) {
                    var b = a.parentNode;
                    return (
                        b && b.parentNode && b.parentNode.selectedIndex, null
                    );
                },
                set: function (a) {
                    var b = a.parentNode;
                    b &&
                        (b.selectedIndex,
                        b.parentNode && b.parentNode.selectedIndex);
                },
            }),
        va.each(
            [
                "tabIndex",
                "readOnly",
                "maxLength",
                "cellSpacing",
                "cellPadding",
                "rowSpan",
                "colSpan",
                "useMap",
                "frameBorder",
                "contentEditable",
            ],
            function () {
                va.propFix[this.toLowerCase()] = this;
            }
        ),
        va.fn.extend({
            addClass: function (a) {
                var b,
                    c,
                    d,
                    e,
                    f,
                    g,
                    h,
                    i = 0;
                if (sa(a))
                    return this.each(function (b) {
                        va(this).addClass(a.call(this, b, Z(this)));
                    });
                if ((b = $(a)).length)
                    for (; (c = this[i++]); )
                        if (
                            ((e = Z(c)),
                            (d = 1 === c.nodeType && " " + Y(e) + " "))
                        ) {
                            for (g = 0; (f = b[g++]); )
                                d.indexOf(" " + f + " ") < 0 && (d += f + " ");
                            e !== (h = Y(d)) && c.setAttribute("class", h);
                        }
                return this;
            },
            removeClass: function (a) {
                var b,
                    c,
                    d,
                    e,
                    f,
                    g,
                    h,
                    i = 0;
                if (sa(a))
                    return this.each(function (b) {
                        va(this).removeClass(a.call(this, b, Z(this)));
                    });
                if (!arguments.length) return this.attr("class", "");
                if ((b = $(a)).length)
                    for (; (c = this[i++]); )
                        if (
                            ((e = Z(c)),
                            (d = 1 === c.nodeType && " " + Y(e) + " "))
                        ) {
                            for (g = 0; (f = b[g++]); )
                                for (; d.indexOf(" " + f + " ") > -1; )
                                    d = d.replace(" " + f + " ", " ");
                            e !== (h = Y(d)) && c.setAttribute("class", h);
                        }
                return this;
            },
            toggleClass: function (a, b) {
                var c = typeof a,
                    d = "string" === c || Array.isArray(a);
                return "boolean" == typeof b && d
                    ? b
                        ? this.addClass(a)
                        : this.removeClass(a)
                    : sa(a)
                    ? this.each(function (c) {
                          va(this).toggleClass(a.call(this, c, Z(this), b), b);
                      })
                    : this.each(function () {
                          var b, e, f, g;
                          if (d)
                              for (
                                  e = 0, f = va(this), g = $(a);
                                  (b = g[e++]);

                              )
                                  f.hasClass(b)
                                      ? f.removeClass(b)
                                      : f.addClass(b);
                          else
                              (void 0 !== a && "boolean" !== c) ||
                                  ((b = Z(this)) &&
                                      Na.set(this, "__className__", b),
                                  this.setAttribute &&
                                      this.setAttribute(
                                          "class",
                                          b || !1 === a
                                              ? ""
                                              : Na.get(this, "__className__") ||
                                                    ""
                                      ));
                      });
            },
            hasClass: function (a) {
                var b,
                    c,
                    d = 0;
                for (b = " " + a + " "; (c = this[d++]); )
                    if (
                        1 === c.nodeType &&
                        (" " + Y(Z(c)) + " ").indexOf(b) > -1
                    )
                        return !0;
                return !1;
            },
        });
    var zb = /\r/g;
    va.fn.extend({
        val: function (a) {
            var b,
                c,
                d,
                e = this[0];
            return arguments.length
                ? ((d = sa(a)),
                  this.each(function (c) {
                      var e;
                      1 === this.nodeType &&
                          (null == (e = d ? a.call(this, c, va(this).val()) : a)
                              ? (e = "")
                              : "number" == typeof e
                              ? (e += "")
                              : Array.isArray(e) &&
                                (e = va.map(e, function (a) {
                                    return null == a ? "" : a + "";
                                })),
                          ((b =
                              va.valHooks[this.type] ||
                              va.valHooks[this.nodeName.toLowerCase()]) &&
                              "set" in b &&
                              void 0 !== b.set(this, e, "value")) ||
                              (this.value = e));
                  }))
                : e
                ? (b =
                      va.valHooks[e.type] ||
                      va.valHooks[e.nodeName.toLowerCase()]) &&
                  "get" in b &&
                  void 0 !== (c = b.get(e, "value"))
                    ? c
                    : "string" == typeof (c = e.value)
                    ? c.replace(zb, "")
                    : null == c
                    ? ""
                    : c
                : void 0;
        },
    }),
        va.extend({
            valHooks: {
                option: {
                    get: function (a) {
                        var b = va.find.attr(a, "value");
                        return null != b ? b : Y(va.text(a));
                    },
                },
                select: {
                    get: function (a) {
                        var b,
                            c,
                            d,
                            e = a.options,
                            g = a.selectedIndex,
                            h = "select-one" === a.type,
                            i = h ? null : [],
                            j = h ? g + 1 : e.length;
                        for (d = g < 0 ? j : h ? g : 0; d < j; d++)
                            if (
                                ((c = e[d]).selected || d === g) &&
                                !c.disabled &&
                                (!c.parentNode.disabled ||
                                    !f(c.parentNode, "optgroup"))
                            ) {
                                if (((b = va(c).val()), h)) return b;
                                i.push(b);
                            }
                        return i;
                    },
                    set: function (a, b) {
                        for (
                            var c,
                                d,
                                e = a.options,
                                f = va.makeArray(b),
                                g = e.length;
                            g--;

                        )
                            ((d = e[g]).selected =
                                va.inArray(va.valHooks.option.get(d), f) >
                                -1) && (c = !0);
                        return c || (a.selectedIndex = -1), f;
                    },
                },
            },
        }),
        va.each(["radio", "checkbox"], function () {
            (va.valHooks[this] = {
                set: function (a, b) {
                    if (Array.isArray(b))
                        return (a.checked = va.inArray(va(a).val(), b) > -1);
                },
            }),
                ra.checkOn ||
                    (va.valHooks[this].get = function (a) {
                        return null === a.getAttribute("value")
                            ? "on"
                            : a.value;
                    });
        }),
        (ra.focusin = "onfocusin" in a);
    var Ab = /^(?:focusinfocus|focusoutblur)$/,
        Bb = function (a) {
            a.stopPropagation();
        };
    va.extend(va.event, {
        trigger: function (b, c, d, e) {
            var f,
                g,
                h,
                i,
                j,
                k,
                l,
                m,
                n = [d || ga],
                o = oa.call(b, "type") ? b.type : b,
                p = oa.call(b, "namespace") ? b.namespace.split(".") : [];
            if (
                ((g = m = h = d = d || ga),
                3 !== d.nodeType &&
                    8 !== d.nodeType &&
                    !Ab.test(o + va.event.triggered) &&
                    (o.indexOf(".") > -1 &&
                        ((o = (p = o.split(".")).shift()), p.sort()),
                    (j = o.indexOf(":") < 0 && "on" + o),
                    (b = b[va.expando]
                        ? b
                        : new va.Event(o, "object" == typeof b && b)),
                    (b.isTrigger = e ? 2 : 3),
                    (b.namespace = p.join(".")),
                    (b.rnamespace = b.namespace
                        ? new RegExp(
                              "(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"
                          )
                        : null),
                    (b.result = void 0),
                    b.target || (b.target = d),
                    (c = null == c ? [b] : va.makeArray(c, [b])),
                    (l = va.event.special[o] || {}),
                    e || !l.trigger || !1 !== l.trigger.apply(d, c)))
            ) {
                if (!e && !l.noBubble && !ta(d)) {
                    for (
                        i = l.delegateType || o,
                            Ab.test(i + o) || (g = g.parentNode);
                        g;
                        g = g.parentNode
                    )
                        n.push(g), (h = g);
                    h === (d.ownerDocument || ga) &&
                        n.push(h.defaultView || h.parentWindow || a);
                }
                for (f = 0; (g = n[f++]) && !b.isPropagationStopped(); )
                    (m = g),
                        (b.type = f > 1 ? i : l.bindType || o),
                        (k =
                            (Na.get(g, "events") || {})[b.type] &&
                            Na.get(g, "handle")) && k.apply(g, c),
                        (k = j && g[j]) &&
                            k.apply &&
                            Ma(g) &&
                            ((b.result = k.apply(g, c)),
                            !1 === b.result && b.preventDefault());
                return (
                    (b.type = o),
                    e ||
                        b.isDefaultPrevented() ||
                        (l._default && !1 !== l._default.apply(n.pop(), c)) ||
                        !Ma(d) ||
                        (j &&
                            sa(d[o]) &&
                            !ta(d) &&
                            ((h = d[j]) && (d[j] = null),
                            (va.event.triggered = o),
                            b.isPropagationStopped() &&
                                m.addEventListener(o, Bb),
                            d[o](),
                            b.isPropagationStopped() &&
                                m.removeEventListener(o, Bb),
                            (va.event.triggered = void 0),
                            h && (d[j] = h))),
                    b.result
                );
            }
        },
        simulate: function (a, b, c) {
            var d = va.extend(new va.Event(), c, { type: a, isSimulated: !0 });
            va.event.trigger(d, null, b);
        },
    }),
        va.fn.extend({
            trigger: function (a, b) {
                return this.each(function () {
                    va.event.trigger(a, b, this);
                });
            },
            triggerHandler: function (a, b) {
                var c = this[0];
                if (c) return va.event.trigger(a, b, c, !0);
            },
        }),
        ra.focusin ||
            va.each({ focus: "focusin", blur: "focusout" }, function (a, b) {
                var c = function (a) {
                    va.event.simulate(b, a.target, va.event.fix(a));
                };
                va.event.special[b] = {
                    setup: function () {
                        var d = this.ownerDocument || this,
                            e = Na.access(d, b);
                        e || d.addEventListener(a, c, !0),
                            Na.access(d, b, (e || 0) + 1);
                    },
                    teardown: function () {
                        var d = this.ownerDocument || this,
                            e = Na.access(d, b) - 1;
                        e
                            ? Na.access(d, b, e)
                            : (d.removeEventListener(a, c, !0),
                              Na.remove(d, b));
                    },
                };
            });
    var Cb = a.location,
        Db = Date.now(),
        Eb = /\?/;
    va.parseXML = function (b) {
        var c;
        if (!b || "string" != typeof b) return null;
        try {
            c = new a.DOMParser().parseFromString(b, "text/xml");
        } catch (a) {
            c = void 0;
        }
        return (
            (c && !c.getElementsByTagName("parsererror").length) ||
                va.error("Invalid XML: " + b),
            c
        );
    };
    var Fb = /\[\]$/,
        Gb = /\r?\n/g,
        Hb = /^(?:submit|button|image|reset|file)$/i,
        Ib = /^(?:input|select|textarea|keygen)/i;
    (va.param = function (a, b) {
        var c,
            d = [],
            e = function (a, b) {
                var c = sa(b) ? b() : b;
                d[d.length] =
                    encodeURIComponent(a) +
                    "=" +
                    encodeURIComponent(null == c ? "" : c);
            };
        if (Array.isArray(a) || (a.jquery && !va.isPlainObject(a)))
            va.each(a, function () {
                e(this.name, this.value);
            });
        else for (c in a) _(c, a[c], b, e);
        return d.join("&");
    }),
        va.fn.extend({
            serialize: function () {
                return va.param(this.serializeArray());
            },
            serializeArray: function () {
                return this.map(function () {
                    var a = va.prop(this, "elements");
                    return a ? va.makeArray(a) : this;
                })
                    .filter(function () {
                        var a = this.type;
                        return (
                            this.name &&
                            !va(this).is(":disabled") &&
                            Ib.test(this.nodeName) &&
                            !Hb.test(a) &&
                            (this.checked || !Xa.test(a))
                        );
                    })
                    .map(function (a, b) {
                        var c = va(this).val();
                        return null == c
                            ? null
                            : Array.isArray(c)
                            ? va.map(c, function (a) {
                                  return {
                                      name: b.name,
                                      value: a.replace(Gb, "\r\n"),
                                  };
                              })
                            : { name: b.name, value: c.replace(Gb, "\r\n") };
                    })
                    .get();
            },
        });
    var Jb = /%20/g,
        Kb = /#.*$/,
        Lb = /([?&])_=[^&]*/,
        Mb = /^(.*?):[ \t]*([^\r\n]*)$/gm,
        Nb = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
        Ob = /^(?:GET|HEAD)$/,
        Pb = /^\/\//,
        Qb = {},
        Rb = {},
        Sb = "*/".concat("*"),
        Tb = ga.createElement("a");
    (Tb.href = Cb.href),
        va.extend({
            active: 0,
            lastModified: {},
            etag: {},
            ajaxSettings: {
                url: Cb.href,
                type: "GET",
                isLocal: Nb.test(Cb.protocol),
                global: !0,
                processData: !0,
                async: !0,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                accepts: {
                    "*": Sb,
                    text: "text/plain",
                    html: "text/html",
                    xml: "application/xml, text/xml",
                    json: "application/json, text/javascript",
                },
                contents: { xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/ },
                responseFields: {
                    xml: "responseXML",
                    text: "responseText",
                    json: "responseJSON",
                },
                converters: {
                    "* text": String,
                    "text html": !0,
                    "text json": JSON.parse,
                    "text xml": va.parseXML,
                },
                flatOptions: { url: !0, context: !0 },
            },
            ajaxSetup: function (a, b) {
                return b
                    ? ca(ca(a, va.ajaxSettings), b)
                    : ca(va.ajaxSettings, a);
            },
            ajaxPrefilter: aa(Qb),
            ajaxTransport: aa(Rb),
            ajax: function (b, c) {
                function d(b, c, d, h) {
                    var j,
                        m,
                        n,
                        u,
                        v,
                        w = c;
                    k ||
                        ((k = !0),
                        i && a.clearTimeout(i),
                        (e = void 0),
                        (g = h || ""),
                        (x.readyState = b > 0 ? 4 : 0),
                        (j = (b >= 200 && b < 300) || 304 === b),
                        d && (u = da(o, x, d)),
                        (u = ea(o, u, x, j)),
                        j
                            ? (o.ifModified &&
                                  ((v = x.getResponseHeader("Last-Modified")) &&
                                      (va.lastModified[f] = v),
                                  (v = x.getResponseHeader("etag")) &&
                                      (va.etag[f] = v)),
                              204 === b || "HEAD" === o.type
                                  ? (w = "nocontent")
                                  : 304 === b
                                  ? (w = "notmodified")
                                  : ((w = u.state),
                                    (m = u.data),
                                    (j = !(n = u.error))))
                            : ((n = w),
                              (!b && w) || ((w = "error"), b < 0 && (b = 0))),
                        (x.status = b),
                        (x.statusText = (c || w) + ""),
                        j
                            ? r.resolveWith(p, [m, w, x])
                            : r.rejectWith(p, [x, w, n]),
                        x.statusCode(t),
                        (t = void 0),
                        l &&
                            q.trigger(j ? "ajaxSuccess" : "ajaxError", [
                                x,
                                o,
                                j ? m : n,
                            ]),
                        s.fireWith(p, [x, w]),
                        l &&
                            (q.trigger("ajaxComplete", [x, o]),
                            --va.active || va.event.trigger("ajaxStop")));
                }
                "object" == typeof b && ((c = b), (b = void 0)), (c = c || {});
                var e,
                    f,
                    g,
                    h,
                    i,
                    j,
                    k,
                    l,
                    m,
                    n,
                    o = va.ajaxSetup({}, c),
                    p = o.context || o,
                    q =
                        o.context && (p.nodeType || p.jquery)
                            ? va(p)
                            : va.event,
                    r = va.Deferred(),
                    s = va.Callbacks("once memory"),
                    t = o.statusCode || {},
                    u = {},
                    v = {},
                    w = "canceled",
                    x = {
                        readyState: 0,
                        getResponseHeader: function (a) {
                            var b;
                            if (k) {
                                if (!h)
                                    for (h = {}; (b = Mb.exec(g)); )
                                        h[b[1].toLowerCase()] = b[2];
                                b = h[a.toLowerCase()];
                            }
                            return null == b ? null : b;
                        },
                        getAllResponseHeaders: function () {
                            return k ? g : null;
                        },
                        setRequestHeader: function (a, b) {
                            return (
                                null == k &&
                                    ((a = v[a.toLowerCase()] =
                                        v[a.toLowerCase()] || a),
                                    (u[a] = b)),
                                this
                            );
                        },
                        overrideMimeType: function (a) {
                            return null == k && (o.mimeType = a), this;
                        },
                        statusCode: function (a) {
                            var b;
                            if (a)
                                if (k) x.always(a[x.status]);
                                else for (b in a) t[b] = [t[b], a[b]];
                            return this;
                        },
                        abort: function (a) {
                            var b = a || w;
                            return e && e.abort(b), d(0, b), this;
                        },
                    };
                if (
                    (r.promise(x),
                    (o.url = ((b || o.url || Cb.href) + "").replace(
                        Pb,
                        Cb.protocol + "//"
                    )),
                    (o.type = c.method || c.type || o.method || o.type),
                    (o.dataTypes = (o.dataType || "*")
                        .toLowerCase()
                        .match(Ga) || [""]),
                    null == o.crossDomain)
                ) {
                    j = ga.createElement("a");
                    try {
                        (j.href = o.url),
                            (j.href = j.href),
                            (o.crossDomain =
                                Tb.protocol + "//" + Tb.host !=
                                j.protocol + "//" + j.host);
                    } catch (a) {
                        o.crossDomain = !0;
                    }
                }
                if (
                    (o.data &&
                        o.processData &&
                        "string" != typeof o.data &&
                        (o.data = va.param(o.data, o.traditional)),
                    ba(Qb, o, c, x),
                    k)
                )
                    return x;
                (l = va.event && o.global) &&
                    0 == va.active++ &&
                    va.event.trigger("ajaxStart"),
                    (o.type = o.type.toUpperCase()),
                    (o.hasContent = !Ob.test(o.type)),
                    (f = o.url.replace(Kb, "")),
                    o.hasContent
                        ? o.data &&
                          o.processData &&
                          0 ===
                              (o.contentType || "").indexOf(
                                  "application/x-www-form-urlencoded"
                              ) &&
                          (o.data = o.data.replace(Jb, "+"))
                        : ((n = o.url.slice(f.length)),
                          o.data &&
                              (o.processData || "string" == typeof o.data) &&
                              ((f += (Eb.test(f) ? "&" : "?") + o.data),
                              delete o.data),
                          !1 === o.cache &&
                              ((f = f.replace(Lb, "$1")),
                              (n = (Eb.test(f) ? "&" : "?") + "_=" + Db++ + n)),
                          (o.url = f + n)),
                    o.ifModified &&
                        (va.lastModified[f] &&
                            x.setRequestHeader(
                                "If-Modified-Since",
                                va.lastModified[f]
                            ),
                        va.etag[f] &&
                            x.setRequestHeader("If-None-Match", va.etag[f])),
                    ((o.data && o.hasContent && !1 !== o.contentType) ||
                        c.contentType) &&
                        x.setRequestHeader("Content-Type", o.contentType),
                    x.setRequestHeader(
                        "Accept",
                        o.dataTypes[0] && o.accepts[o.dataTypes[0]]
                            ? o.accepts[o.dataTypes[0]] +
                                  ("*" !== o.dataTypes[0]
                                      ? ", " + Sb + "; q=0.01"
                                      : "")
                            : o.accepts["*"]
                    );
                for (m in o.headers) x.setRequestHeader(m, o.headers[m]);
                if (o.beforeSend && (!1 === o.beforeSend.call(p, x, o) || k))
                    return x.abort();
                if (
                    ((w = "abort"),
                    s.add(o.complete),
                    x.done(o.success),
                    x.fail(o.error),
                    (e = ba(Rb, o, c, x)))
                ) {
                    if (
                        ((x.readyState = 1),
                        l && q.trigger("ajaxSend", [x, o]),
                        k)
                    )
                        return x;
                    o.async &&
                        o.timeout > 0 &&
                        (i = a.setTimeout(function () {
                            x.abort("timeout");
                        }, o.timeout));
                    try {
                        (k = !1), e.send(u, d);
                    } catch (a) {
                        if (k) throw a;
                        d(-1, a);
                    }
                } else d(-1, "No Transport");
                return x;
            },
            getJSON: function (a, b, c) {
                return va.get(a, b, c, "json");
            },
            getScript: function (a, b) {
                return va.get(a, void 0, b, "script");
            },
        }),
        va.each(["get", "post"], function (a, b) {
            va[b] = function (a, c, d, e) {
                return (
                    sa(c) && ((e = e || d), (d = c), (c = void 0)),
                    va.ajax(
                        va.extend(
                            {
                                url: a,
                                type: b,
                                dataType: e,
                                data: c,
                                success: d,
                            },
                            va.isPlainObject(a) && a
                        )
                    )
                );
            };
        }),
        (va._evalUrl = function (a) {
            return va.ajax({
                url: a,
                type: "GET",
                dataType: "script",
                cache: !0,
                async: !1,
                global: !1,
                throws: !0,
            });
        }),
        va.fn.extend({
            wrapAll: function (a) {
                var b;
                return (
                    this[0] &&
                        (sa(a) && (a = a.call(this[0])),
                        (b = va(a, this[0].ownerDocument).eq(0).clone(!0)),
                        this[0].parentNode && b.insertBefore(this[0]),
                        b
                            .map(function () {
                                for (var a = this; a.firstElementChild; )
                                    a = a.firstElementChild;
                                return a;
                            })
                            .append(this)),
                    this
                );
            },
            wrapInner: function (a) {
                return sa(a)
                    ? this.each(function (b) {
                          va(this).wrapInner(a.call(this, b));
                      })
                    : this.each(function () {
                          var b = va(this),
                              c = b.contents();
                          c.length ? c.wrapAll(a) : b.append(a);
                      });
            },
            wrap: function (a) {
                var b = sa(a);
                return this.each(function (c) {
                    va(this).wrapAll(b ? a.call(this, c) : a);
                });
            },
            unwrap: function (a) {
                return (
                    this.parent(a)
                        .not("body")
                        .each(function () {
                            va(this).replaceWith(this.childNodes);
                        }),
                    this
                );
            },
        }),
        (va.expr.pseudos.hidden = function (a) {
            return !va.expr.pseudos.visible(a);
        }),
        (va.expr.pseudos.visible = function (a) {
            return !!(
                a.offsetWidth ||
                a.offsetHeight ||
                a.getClientRects().length
            );
        }),
        (va.ajaxSettings.xhr = function () {
            try {
                return new a.XMLHttpRequest();
            } catch (a) {}
        });
    var Ub = { 0: 200, 1223: 204 },
        Vb = va.ajaxSettings.xhr();
    (ra.cors = !!Vb && "withCredentials" in Vb),
        (ra.ajax = Vb = !!Vb),
        va.ajaxTransport(function (b) {
            var c, d;
            if (ra.cors || (Vb && !b.crossDomain))
                return {
                    send: function (e, f) {
                        var g,
                            h = b.xhr();
                        if (
                            (h.open(
                                b.type,
                                b.url,
                                b.async,
                                b.username,
                                b.password
                            ),
                            b.xhrFields)
                        )
                            for (g in b.xhrFields) h[g] = b.xhrFields[g];
                        b.mimeType &&
                            h.overrideMimeType &&
                            h.overrideMimeType(b.mimeType),
                            b.crossDomain ||
                                e["X-Requested-With"] ||
                                (e["X-Requested-With"] = "XMLHttpRequest");
                        for (g in e) h.setRequestHeader(g, e[g]);
                        (c = function (a) {
                            return function () {
                                c &&
                                    ((c =
                                        d =
                                        h.onload =
                                        h.onerror =
                                        h.onabort =
                                        h.ontimeout =
                                        h.onreadystatechange =
                                            null),
                                    "abort" === a
                                        ? h.abort()
                                        : "error" === a
                                        ? "number" != typeof h.status
                                            ? f(0, "error")
                                            : f(h.status, h.statusText)
                                        : f(
                                              Ub[h.status] || h.status,
                                              h.statusText,
                                              "text" !==
                                                  (h.responseType || "text") ||
                                                  "string" !=
                                                      typeof h.responseText
                                                  ? { binary: h.response }
                                                  : { text: h.responseText },
                                              h.getAllResponseHeaders()
                                          ));
                            };
                        }),
                            (h.onload = c()),
                            (d = h.onerror = h.ontimeout = c("error")),
                            void 0 !== h.onabort
                                ? (h.onabort = d)
                                : (h.onreadystatechange = function () {
                                      4 === h.readyState &&
                                          a.setTimeout(function () {
                                              c && d();
                                          });
                                  }),
                            (c = c("abort"));
                        try {
                            h.send((b.hasContent && b.data) || null);
                        } catch (a) {
                            if (c) throw a;
                        }
                    },
                    abort: function () {
                        c && c();
                    },
                };
        }),
        va.ajaxPrefilter(function (a) {
            a.crossDomain && (a.contents.script = !1);
        }),
        va.ajaxSetup({
            accepts: {
                script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript",
            },
            contents: { script: /\b(?:java|ecma)script\b/ },
            converters: {
                "text script": function (a) {
                    return va.globalEval(a), a;
                },
            },
        }),
        va.ajaxPrefilter("script", function (a) {
            void 0 === a.cache && (a.cache = !1),
                a.crossDomain && (a.type = "GET");
        }),
        va.ajaxTransport("script", function (a) {
            if (a.crossDomain) {
                var b, c;
                return {
                    send: function (d, e) {
                        (b = va("<script>")
                            .prop({ charset: a.scriptCharset, src: a.url })
                            .on(
                                "load error",
                                (c = function (a) {
                                    b.remove(),
                                        (c = null),
                                        a &&
                                            e(
                                                "error" === a.type ? 404 : 200,
                                                a.type
                                            );
                                })
                            )),
                            ga.head.appendChild(b[0]);
                    },
                    abort: function () {
                        c && c();
                    },
                };
            }
        });
    var Wb = [],
        Xb = /(=)\?(?=&|$)|\?\?/;
    va.ajaxSetup({
        jsonp: "callback",
        jsonpCallback: function () {
            var a = Wb.pop() || va.expando + "_" + Db++;
            return (this[a] = !0), a;
        },
    }),
        va.ajaxPrefilter("json jsonp", function (b, c, d) {
            var e,
                f,
                g,
                h =
                    !1 !== b.jsonp &&
                    (Xb.test(b.url)
                        ? "url"
                        : "string" == typeof b.data &&
                          0 ===
                              (b.contentType || "").indexOf(
                                  "application/x-www-form-urlencoded"
                              ) &&
                          Xb.test(b.data) &&
                          "data");
            if (h || "jsonp" === b.dataTypes[0])
                return (
                    (e = b.jsonpCallback =
                        sa(b.jsonpCallback)
                            ? b.jsonpCallback()
                            : b.jsonpCallback),
                    h
                        ? (b[h] = b[h].replace(Xb, "$1" + e))
                        : !1 !== b.jsonp &&
                          (b.url +=
                              (Eb.test(b.url) ? "&" : "?") + b.jsonp + "=" + e),
                    (b.converters["script json"] = function () {
                        return g || va.error(e + " was not called"), g[0];
                    }),
                    (b.dataTypes[0] = "json"),
                    (f = a[e]),
                    (a[e] = function () {
                        g = arguments;
                    }),
                    d.always(function () {
                        void 0 === f ? va(a).removeProp(e) : (a[e] = f),
                            b[e] &&
                                ((b.jsonpCallback = c.jsonpCallback),
                                Wb.push(e)),
                            g && sa(f) && f(g[0]),
                            (g = f = void 0);
                    }),
                    "script"
                );
        }),
        (ra.createHTMLDocument = (function () {
            var a = ga.implementation.createHTMLDocument("").body;
            return (
                (a.innerHTML = "<form></form><form></form>"),
                2 === a.childNodes.length
            );
        })()),
        (va.parseHTML = function (a, b, c) {
            if ("string" != typeof a) return [];
            "boolean" == typeof b && ((c = b), (b = !1));
            var d, e, f;
            return (
                b ||
                    (ra.createHTMLDocument
                        ? (((d = (b =
                              ga.implementation.createHTMLDocument(
                                  ""
                              )).createElement("base")).href =
                              ga.location.href),
                          b.head.appendChild(d))
                        : (b = ga)),
                (e = Ba.exec(a)),
                (f = !c && []),
                e
                    ? [b.createElement(e[1])]
                    : ((e = x([a], b, f)),
                      f && f.length && va(f).remove(),
                      va.merge([], e.childNodes))
            );
        }),
        (va.fn.load = function (a, b, c) {
            var d,
                e,
                f,
                g = this,
                h = a.indexOf(" ");
            return (
                h > -1 && ((d = Y(a.slice(h))), (a = a.slice(0, h))),
                sa(b)
                    ? ((c = b), (b = void 0))
                    : b && "object" == typeof b && (e = "POST"),
                g.length > 0 &&
                    va
                        .ajax({
                            url: a,
                            type: e || "GET",
                            dataType: "html",
                            data: b,
                        })
                        .done(function (a) {
                            (f = arguments),
                                g.html(
                                    d
                                        ? va("<div>")
                                              .append(va.parseHTML(a))
                                              .find(d)
                                        : a
                                );
                        })
                        .always(
                            c &&
                                function (a, b) {
                                    g.each(function () {
                                        c.apply(
                                            this,
                                            f || [a.responseText, b, a]
                                        );
                                    });
                                }
                        ),
                this
            );
        }),
        va.each(
            [
                "ajaxStart",
                "ajaxStop",
                "ajaxComplete",
                "ajaxError",
                "ajaxSuccess",
                "ajaxSend",
            ],
            function (a, b) {
                va.fn[b] = function (a) {
                    return this.on(b, a);
                };
            }
        ),
        (va.expr.pseudos.animated = function (a) {
            return va.grep(va.timers, function (b) {
                return a === b.elem;
            }).length;
        }),
        (va.offset = {
            setOffset: function (a, b, c) {
                var d,
                    e,
                    f,
                    g,
                    h,
                    i,
                    j = va.css(a, "position"),
                    k = va(a),
                    l = {};
                "static" === j && (a.style.position = "relative"),
                    (h = k.offset()),
                    (f = va.css(a, "top")),
                    (i = va.css(a, "left")),
                    ("absolute" === j || "fixed" === j) &&
                    (f + i).indexOf("auto") > -1
                        ? ((g = (d = k.position()).top), (e = d.left))
                        : ((g = parseFloat(f) || 0), (e = parseFloat(i) || 0)),
                    sa(b) && (b = b.call(a, c, va.extend({}, h))),
                    null != b.top && (l.top = b.top - h.top + g),
                    null != b.left && (l.left = b.left - h.left + e),
                    "using" in b ? b.using.call(a, l) : k.css(l);
            },
        }),
        va.fn.extend({
            offset: function (a) {
                if (arguments.length)
                    return void 0 === a
                        ? this
                        : this.each(function (b) {
                              va.offset.setOffset(this, a, b);
                          });
                var b,
                    c,
                    d = this[0];
                return d
                    ? d.getClientRects().length
                        ? ((b = d.getBoundingClientRect()),
                          (c = d.ownerDocument.defaultView),
                          {
                              top: b.top + c.pageYOffset,
                              left: b.left + c.pageXOffset,
                          })
                        : { top: 0, left: 0 }
                    : void 0;
            },
            position: function () {
                if (this[0]) {
                    var a,
                        b,
                        c,
                        d = this[0],
                        e = { top: 0, left: 0 };
                    if ("fixed" === va.css(d, "position"))
                        b = d.getBoundingClientRect();
                    else {
                        for (
                            b = this.offset(),
                                c = d.ownerDocument,
                                a = d.offsetParent || c.documentElement;
                            a &&
                            (a === c.body || a === c.documentElement) &&
                            "static" === va.css(a, "position");

                        )
                            a = a.parentNode;
                        a &&
                            a !== d &&
                            1 === a.nodeType &&
                            (((e = va(a).offset()).top += va.css(
                                a,
                                "borderTopWidth",
                                !0
                            )),
                            (e.left += va.css(a, "borderLeftWidth", !0)));
                    }
                    return {
                        top: b.top - e.top - va.css(d, "marginTop", !0),
                        left: b.left - e.left - va.css(d, "marginLeft", !0),
                    };
                }
            },
            offsetParent: function () {
                return this.map(function () {
                    for (
                        var a = this.offsetParent;
                        a && "static" === va.css(a, "position");

                    )
                        a = a.offsetParent;
                    return a || ab;
                });
            },
        }),
        va.each(
            { scrollLeft: "pageXOffset", scrollTop: "pageYOffset" },
            function (a, b) {
                var c = "pageYOffset" === b;
                va.fn[a] = function (d) {
                    return Ja(
                        this,
                        function (a, d, e) {
                            var f;
                            if (
                                (ta(a)
                                    ? (f = a)
                                    : 9 === a.nodeType && (f = a.defaultView),
                                void 0 === e)
                            )
                                return f ? f[b] : a[d];
                            f
                                ? f.scrollTo(
                                      c ? f.pageXOffset : e,
                                      c ? e : f.pageYOffset
                                  )
                                : (a[d] = e);
                        },
                        a,
                        d,
                        arguments.length
                    );
                };
            }
        ),
        va.each(["top", "left"], function (a, b) {
            va.cssHooks[b] = K(ra.pixelPosition, function (a, c) {
                if (c)
                    return (
                        (c = J(a, b)),
                        ib.test(c) ? va(a).position()[b] + "px" : c
                    );
            });
        }),
        va.each({ Height: "height", Width: "width" }, function (a, b) {
            va.each(
                { padding: "inner" + a, content: b, "": "outer" + a },
                function (c, d) {
                    va.fn[d] = function (e, f) {
                        var g =
                                arguments.length &&
                                (c || "boolean" != typeof e),
                            h =
                                c ||
                                (!0 === e || !0 === f ? "margin" : "border");
                        return Ja(
                            this,
                            function (b, c, e) {
                                var f;
                                return ta(b)
                                    ? 0 === d.indexOf("outer")
                                        ? b["inner" + a]
                                        : b.document.documentElement[
                                              "client" + a
                                          ]
                                    : 9 === b.nodeType
                                    ? ((f = b.documentElement),
                                      Math.max(
                                          b.body["scroll" + a],
                                          f["scroll" + a],
                                          b.body["offset" + a],
                                          f["offset" + a],
                                          f["client" + a]
                                      ))
                                    : void 0 === e
                                    ? va.css(b, c, h)
                                    : va.style(b, c, e, h);
                            },
                            b,
                            g ? e : void 0,
                            g
                        );
                    };
                }
            );
        }),
        va.each(
            "blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(
                " "
            ),
            function (a, b) {
                va.fn[b] = function (a, c) {
                    return arguments.length > 0
                        ? this.on(b, null, a, c)
                        : this.trigger(b);
                };
            }
        ),
        va.fn.extend({
            hover: function (a, b) {
                return this.mouseenter(a).mouseleave(b || a);
            },
        }),
        va.fn.extend({
            bind: function (a, b, c) {
                return this.on(a, null, b, c);
            },
            unbind: function (a, b) {
                return this.off(a, null, b);
            },
            delegate: function (a, b, c, d) {
                return this.on(b, a, c, d);
            },
            undelegate: function (a, b, c) {
                return 1 === arguments.length
                    ? this.off(a, "**")
                    : this.off(b, a || "**", c);
            },
        }),
        (va.proxy = function (a, b) {
            var c, d, e;
            if (("string" == typeof b && ((c = a[b]), (b = a), (a = c)), sa(a)))
                return (
                    (d = ia.call(arguments, 2)),
                    (e = function () {
                        return a.apply(b || this, d.concat(ia.call(arguments)));
                    }),
                    (e.guid = a.guid = a.guid || va.guid++),
                    e
                );
        }),
        (va.holdReady = function (a) {
            a ? va.readyWait++ : va.ready(!0);
        }),
        (va.isArray = Array.isArray),
        (va.parseJSON = JSON.parse),
        (va.nodeName = f),
        (va.isFunction = sa),
        (va.isWindow = ta),
        (va.camelCase = o),
        (va.type = d),
        (va.now = Date.now),
        (va.isNumeric = function (a) {
            var b = va.type(a);
            return (
                ("number" === b || "string" === b) && !isNaN(a - parseFloat(a))
            );
        }),
        "function" == typeof define &&
            define.amd &&
            define("jquery", [], function () {
                return va;
            });
    var Yb = a.jQuery,
        Zb = a.$;
    return (
        (va.noConflict = function (b) {
            return (
                a.$ === va && (a.$ = Zb),
                b && a.jQuery === va && (a.jQuery = Yb),
                va
            );
        }),
        b || (a.jQuery = a.$ = va),
        va
    );
}),
    (function (a, b) {
        "object" == typeof exports && "undefined" != typeof module
            ? (module.exports = b())
            : "function" == typeof define && define.amd
            ? define(b)
            : (a.Popper = b());
    })(this, function () {
        "use strict";
        function a(a) {
            return a && "[object Function]" === {}.toString.call(a);
        }
        function b(a, b) {
            if (1 !== a.nodeType) return [];
            var c = getComputedStyle(a, null);
            return b ? c[b] : c;
        }
        function c(a) {
            return "HTML" === a.nodeName ? a : a.parentNode || a.host;
        }
        function d(a) {
            if (!a) return document.body;
            switch (a.nodeName) {
                case "HTML":
                case "BODY":
                    return a.ownerDocument.body;
                case "#document":
                    return a.body;
            }
            var e = b(a),
                f = e.overflow,
                g = e.overflowX;
            return /(auto|scroll)/.test(f + e.overflowY + g) ? a : d(c(a));
        }
        function e(a) {
            var c = a && a.offsetParent,
                d = c && c.nodeName;
            return d && "BODY" !== d && "HTML" !== d
                ? -1 !== ["TD", "TABLE"].indexOf(c.nodeName) &&
                  "static" === b(c, "position")
                    ? e(c)
                    : c
                : a
                ? a.ownerDocument.documentElement
                : document.documentElement;
        }
        function f(a) {
            var b = a.nodeName;
            return (
                "BODY" !== b && ("HTML" === b || e(a.firstElementChild) === a)
            );
        }
        function g(a) {
            return null === a.parentNode ? a : g(a.parentNode);
        }
        function h(a, b) {
            if (!(a && a.nodeType && b && b.nodeType))
                return document.documentElement;
            var c =
                    a.compareDocumentPosition(b) &
                    Node.DOCUMENT_POSITION_FOLLOWING,
                d = c ? a : b,
                i = c ? b : a,
                j = document.createRange();
            j.setStart(d, 0), j.setEnd(i, 0);
            var k = j.commonAncestorContainer;
            if ((a !== k && b !== k) || d.contains(i)) return f(k) ? k : e(k);
            var l = g(a);
            return l.host ? h(l.host, b) : h(a, g(b).host);
        }
        function i(a) {
            var b =
                    1 < arguments.length && void 0 !== arguments[1]
                        ? arguments[1]
                        : "top",
                c = "top" === b ? "scrollTop" : "scrollLeft",
                d = a.nodeName;
            if ("BODY" === d || "HTML" === d) {
                var e = a.ownerDocument.documentElement;
                return (a.ownerDocument.scrollingElement || e)[c];
            }
            return a[c];
        }
        function j(a, b) {
            var c =
                    2 < arguments.length &&
                    void 0 !== arguments[2] &&
                    arguments[2],
                d = i(b, "top"),
                e = i(b, "left"),
                f = c ? -1 : 1;
            return (
                (a.top += d * f),
                (a.bottom += d * f),
                (a.left += e * f),
                (a.right += e * f),
                a
            );
        }
        function k(a, b) {
            var c = "x" === b ? "Left" : "Top",
                d = "Left" == c ? "Right" : "Bottom";
            return (
                parseFloat(a["border" + c + "Width"], 10) +
                parseFloat(a["border" + d + "Width"], 10)
            );
        }
        function l(a, b, c, d) {
            return X(
                b["offset" + a],
                b["scroll" + a],
                c["client" + a],
                c["offset" + a],
                c["scroll" + a],
                da()
                    ? c["offset" + a] +
                          d["margin" + ("Height" === a ? "Top" : "Left")] +
                          d["margin" + ("Height" === a ? "Bottom" : "Right")]
                    : 0
            );
        }
        function m() {
            var a = document.body,
                b = document.documentElement,
                c = da() && getComputedStyle(b);
            return { height: l("Height", a, b, c), width: l("Width", a, b, c) };
        }
        function n(a) {
            return ha({}, a, {
                right: a.left + a.width,
                bottom: a.top + a.height,
            });
        }
        function o(a) {
            var c = {};
            if (da())
                try {
                    c = a.getBoundingClientRect();
                    var d = i(a, "top"),
                        e = i(a, "left");
                    (c.top += d),
                        (c.left += e),
                        (c.bottom += d),
                        (c.right += e);
                } catch (a) {}
            else c = a.getBoundingClientRect();
            var f = {
                    left: c.left,
                    top: c.top,
                    width: c.right - c.left,
                    height: c.bottom - c.top,
                },
                g = "HTML" === a.nodeName ? m() : {},
                h = g.width || a.clientWidth || f.right - f.left,
                j = g.height || a.clientHeight || f.bottom - f.top,
                l = a.offsetWidth - h,
                o = a.offsetHeight - j;
            if (l || o) {
                var p = b(a);
                (l -= k(p, "x")),
                    (o -= k(p, "y")),
                    (f.width -= l),
                    (f.height -= o);
            }
            return n(f);
        }
        function p(a, c) {
            var e = da(),
                f = "HTML" === c.nodeName,
                g = o(a),
                h = o(c),
                i = d(a),
                k = b(c),
                l = parseFloat(k.borderTopWidth, 10),
                m = parseFloat(k.borderLeftWidth, 10),
                p = n({
                    top: g.top - h.top - l,
                    left: g.left - h.left - m,
                    width: g.width,
                    height: g.height,
                });
            if (((p.marginTop = 0), (p.marginLeft = 0), !e && f)) {
                var q = parseFloat(k.marginTop, 10),
                    r = parseFloat(k.marginLeft, 10);
                (p.top -= l - q),
                    (p.bottom -= l - q),
                    (p.left -= m - r),
                    (p.right -= m - r),
                    (p.marginTop = q),
                    (p.marginLeft = r);
            }
            return (
                (e ? c.contains(i) : c === i && "BODY" !== i.nodeName) &&
                    (p = j(p, c)),
                p
            );
        }
        function q(a) {
            var b = a.ownerDocument.documentElement,
                c = p(a, b),
                d = X(b.clientWidth, window.innerWidth || 0),
                e = X(b.clientHeight, window.innerHeight || 0),
                f = i(b),
                g = i(b, "left");
            return n({
                top: f - c.top + c.marginTop,
                left: g - c.left + c.marginLeft,
                width: d,
                height: e,
            });
        }
        function r(a) {
            var d = a.nodeName;
            return (
                "BODY" !== d &&
                "HTML" !== d &&
                ("fixed" === b(a, "position") || r(c(a)))
            );
        }
        function s(a, b, e, f) {
            var g = { top: 0, left: 0 },
                i = h(a, b);
            if ("viewport" === f) g = q(i);
            else {
                var j;
                "scrollParent" === f
                    ? ((j = d(c(b))),
                      "BODY" === j.nodeName &&
                          (j = a.ownerDocument.documentElement))
                    : (j =
                          "window" === f ? a.ownerDocument.documentElement : f);
                var k = p(j, i);
                if ("HTML" !== j.nodeName || r(i)) g = k;
                else {
                    var l = m(),
                        n = l.height,
                        o = l.width;
                    (g.top += k.top - k.marginTop),
                        (g.bottom = n + k.top),
                        (g.left += k.left - k.marginLeft),
                        (g.right = o + k.left);
                }
            }
            return (
                (g.left += e), (g.top += e), (g.right -= e), (g.bottom -= e), g
            );
        }
        function t(a) {
            return a.width * a.height;
        }
        function u(a, b, c, d, e) {
            var f =
                5 < arguments.length && void 0 !== arguments[5]
                    ? arguments[5]
                    : 0;
            if (-1 === a.indexOf("auto")) return a;
            var g = s(c, d, f, e),
                h = {
                    top: { width: g.width, height: b.top - g.top },
                    right: { width: g.right - b.right, height: g.height },
                    bottom: { width: g.width, height: g.bottom - b.bottom },
                    left: { width: b.left - g.left, height: g.height },
                },
                i = Object.keys(h)
                    .map(function (a) {
                        return ha({ key: a }, h[a], { area: t(h[a]) });
                    })
                    .sort(function (a, b) {
                        return b.area - a.area;
                    }),
                j = i.filter(function (a) {
                    var b = a.width,
                        d = a.height;
                    return b >= c.clientWidth && d >= c.clientHeight;
                }),
                k = 0 < j.length ? j[0].key : i[0].key,
                l = a.split("-")[1];
            return k + (l ? "-" + l : "");
        }
        function v(a, b, c) {
            return p(c, h(b, c));
        }
        function w(a) {
            var b = getComputedStyle(a),
                c = parseFloat(b.marginTop) + parseFloat(b.marginBottom),
                d = parseFloat(b.marginLeft) + parseFloat(b.marginRight);
            return { width: a.offsetWidth + d, height: a.offsetHeight + c };
        }
        function x(a) {
            var b = {
                left: "right",
                right: "left",
                bottom: "top",
                top: "bottom",
            };
            return a.replace(/left|right|bottom|top/g, function (a) {
                return b[a];
            });
        }
        function y(a, b, c) {
            c = c.split("-")[0];
            var d = w(a),
                e = { width: d.width, height: d.height },
                f = -1 !== ["right", "left"].indexOf(c),
                g = f ? "top" : "left",
                h = f ? "left" : "top",
                i = f ? "height" : "width",
                j = f ? "width" : "height";
            return (
                (e[g] = b[g] + b[i] / 2 - d[i] / 2),
                (e[h] = c === h ? b[h] - d[j] : b[x(h)]),
                e
            );
        }
        function z(a, b) {
            return Array.prototype.find ? a.find(b) : a.filter(b)[0];
        }
        function A(a, b, c) {
            if (Array.prototype.findIndex)
                return a.findIndex(function (a) {
                    return a[b] === c;
                });
            var d = z(a, function (a) {
                return a[b] === c;
            });
            return a.indexOf(d);
        }
        function B(b, c, d) {
            return (
                (void 0 === d ? b : b.slice(0, A(b, "name", d))).forEach(
                    function (b) {
                        b.function &&
                            console.warn(
                                "`modifier.function` is deprecated, use `modifier.fn`!"
                            );
                        var d = b.function || b.fn;
                        b.enabled &&
                            a(d) &&
                            ((c.offsets.popper = n(c.offsets.popper)),
                            (c.offsets.reference = n(c.offsets.reference)),
                            (c = d(c, b)));
                    }
                ),
                c
            );
        }
        function C() {
            if (!this.state.isDestroyed) {
                var a = {
                    instance: this,
                    styles: {},
                    arrowStyles: {},
                    attributes: {},
                    flipped: !1,
                    offsets: {},
                };
                (a.offsets.reference = v(
                    this.state,
                    this.popper,
                    this.reference
                )),
                    (a.placement = u(
                        this.options.placement,
                        a.offsets.reference,
                        this.popper,
                        this.reference,
                        this.options.modifiers.flip.boundariesElement,
                        this.options.modifiers.flip.padding
                    )),
                    (a.originalPlacement = a.placement),
                    (a.offsets.popper = y(
                        this.popper,
                        a.offsets.reference,
                        a.placement
                    )),
                    (a.offsets.popper.position = "absolute"),
                    (a = B(this.modifiers, a)),
                    this.state.isCreated
                        ? this.options.onUpdate(a)
                        : ((this.state.isCreated = !0),
                          this.options.onCreate(a));
            }
        }
        function D(a, b) {
            return a.some(function (a) {
                var c = a.name;
                return a.enabled && c === b;
            });
        }
        function E(a) {
            for (
                var b = [!1, "ms", "Webkit", "Moz", "O"],
                    c = a.charAt(0).toUpperCase() + a.slice(1),
                    d = 0;
                d < b.length - 1;
                d++
            ) {
                var e = b[d],
                    f = e ? "" + e + c : a;
                if (void 0 !== document.body.style[f]) return f;
            }
            return null;
        }
        function F() {
            return (
                (this.state.isDestroyed = !0),
                D(this.modifiers, "applyStyle") &&
                    (this.popper.removeAttribute("x-placement"),
                    (this.popper.style.left = ""),
                    (this.popper.style.position = ""),
                    (this.popper.style.top = ""),
                    (this.popper.style[E("transform")] = "")),
                this.disableEventListeners(),
                this.options.removeOnDestroy &&
                    this.popper.parentNode.removeChild(this.popper),
                this
            );
        }
        function G(a) {
            var b = a.ownerDocument;
            return b ? b.defaultView : window;
        }
        function H(a, b, c, e) {
            var f = "BODY" === a.nodeName,
                g = f ? a.ownerDocument.defaultView : a;
            g.addEventListener(b, c, { passive: !0 }),
                f || H(d(g.parentNode), b, c, e),
                e.push(g);
        }
        function I(a, b, c, e) {
            (c.updateBound = e),
                G(a).addEventListener("resize", c.updateBound, { passive: !0 });
            var f = d(a);
            return (
                H(f, "scroll", c.updateBound, c.scrollParents),
                (c.scrollElement = f),
                (c.eventsEnabled = !0),
                c
            );
        }
        function J() {
            this.state.eventsEnabled ||
                (this.state = I(
                    this.reference,
                    this.options,
                    this.state,
                    this.scheduleUpdate
                ));
        }
        function K(a, b) {
            return (
                G(a).removeEventListener("resize", b.updateBound),
                b.scrollParents.forEach(function (a) {
                    a.removeEventListener("scroll", b.updateBound);
                }),
                (b.updateBound = null),
                (b.scrollParents = []),
                (b.scrollElement = null),
                (b.eventsEnabled = !1),
                b
            );
        }
        function L() {
            this.state.eventsEnabled &&
                (cancelAnimationFrame(this.scheduleUpdate),
                (this.state = K(this.reference, this.state)));
        }
        function M(a) {
            return "" !== a && !isNaN(parseFloat(a)) && isFinite(a);
        }
        function N(a, b) {
            Object.keys(b).forEach(function (c) {
                var d = "";
                -1 !==
                    [
                        "width",
                        "height",
                        "top",
                        "right",
                        "bottom",
                        "left",
                    ].indexOf(c) &&
                    M(b[c]) &&
                    (d = "px"),
                    (a.style[c] = b[c] + d);
            });
        }
        function O(a, b) {
            Object.keys(b).forEach(function (c) {
                !1 === b[c] ? a.removeAttribute(c) : a.setAttribute(c, b[c]);
            });
        }
        function P(a, b, c) {
            var d = z(a, function (a) {
                    return a.name === b;
                }),
                e =
                    !!d &&
                    a.some(function (a) {
                        return a.name === c && a.enabled && a.order < d.order;
                    });
            if (!e) {
                var f = "`" + b + "`";
                console.warn(
                    "`" +
                        c +
                        "` modifier is required by " +
                        f +
                        " modifier in order to work, be sure to include it before " +
                        f +
                        "!"
                );
            }
            return e;
        }
        function Q(a) {
            return "end" === a ? "start" : "start" === a ? "end" : a;
        }
        function R(a) {
            var b =
                    1 < arguments.length &&
                    void 0 !== arguments[1] &&
                    arguments[1],
                c = ja.indexOf(a),
                d = ja.slice(c + 1).concat(ja.slice(0, c));
            return b ? d.reverse() : d;
        }
        function S(a, b, c, d) {
            var e = a.match(/((?:\-|\+)?\d*\.?\d*)(.*)/),
                f = +e[1],
                g = e[2];
            if (!f) return a;
            if (0 === g.indexOf("%")) {
                var h;
                switch (g) {
                    case "%p":
                        h = c;
                        break;
                    case "%":
                    case "%r":
                    default:
                        h = d;
                }
                return (n(h)[b] / 100) * f;
            }
            if ("vh" === g || "vw" === g) {
                return (
                    (("vh" === g
                        ? X(
                              document.documentElement.clientHeight,
                              window.innerHeight || 0
                          )
                        : X(
                              document.documentElement.clientWidth,
                              window.innerWidth || 0
                          )) /
                        100) *
                    f
                );
            }
            return f;
        }
        function T(a, b, c, d) {
            var e = [0, 0],
                f = -1 !== ["right", "left"].indexOf(d),
                g = a.split(/(\+|\-)/).map(function (a) {
                    return a.trim();
                }),
                h = g.indexOf(
                    z(g, function (a) {
                        return -1 !== a.search(/,|\s/);
                    })
                );
            g[h] &&
                -1 === g[h].indexOf(",") &&
                console.warn(
                    "Offsets separated by white space(s) are deprecated, use a comma (,) instead."
                );
            var i = /\s*,\s*|\s+/,
                j =
                    -1 === h
                        ? [g]
                        : [
                              g.slice(0, h).concat([g[h].split(i)[0]]),
                              [g[h].split(i)[1]].concat(g.slice(h + 1)),
                          ];
            return (
                (j = j.map(function (a, d) {
                    var e = (1 === d ? !f : f) ? "height" : "width",
                        g = !1;
                    return a
                        .reduce(function (a, b) {
                            return "" === a[a.length - 1] &&
                                -1 !== ["+", "-"].indexOf(b)
                                ? ((a[a.length - 1] = b), (g = !0), a)
                                : g
                                ? ((a[a.length - 1] += b), (g = !1), a)
                                : a.concat(b);
                        }, [])
                        .map(function (a) {
                            return S(a, e, b, c);
                        });
                })),
                j.forEach(function (a, b) {
                    a.forEach(function (c, d) {
                        M(c) && (e[b] += c * ("-" === a[d - 1] ? -1 : 1));
                    });
                }),
                e
            );
        }
        function U(a, b) {
            var c,
                d = b.offset,
                e = a.placement,
                f = a.offsets,
                g = f.popper,
                h = f.reference,
                i = e.split("-")[0];
            return (
                (c = M(+d) ? [+d, 0] : T(d, g, h, i)),
                "left" === i
                    ? ((g.top += c[0]), (g.left -= c[1]))
                    : "right" === i
                    ? ((g.top += c[0]), (g.left += c[1]))
                    : "top" === i
                    ? ((g.left += c[0]), (g.top -= c[1]))
                    : "bottom" === i && ((g.left += c[0]), (g.top += c[1])),
                (a.popper = g),
                a
            );
        }
        for (
            var V = Math.min,
                W = Math.floor,
                X = Math.max,
                Y =
                    "undefined" != typeof window &&
                    "undefined" != typeof document,
                Z = ["Edge", "Trident", "Firefox"],
                $ = 0,
                _ = 0;
            _ < Z.length;
            _ += 1
        )
            if (Y && 0 <= navigator.userAgent.indexOf(Z[_])) {
                $ = 1;
                break;
            }
        var aa,
            ba = Y && window.Promise,
            ca = ba
                ? function (a) {
                      var b = !1;
                      return function () {
                          b ||
                              ((b = !0),
                              window.Promise.resolve().then(function () {
                                  (b = !1), a();
                              }));
                      };
                  }
                : function (a) {
                      var b = !1;
                      return function () {
                          b ||
                              ((b = !0),
                              setTimeout(function () {
                                  (b = !1), a();
                              }, $));
                      };
                  },
            da = function () {
                return (
                    void 0 == aa &&
                        (aa = -1 !== navigator.appVersion.indexOf("MSIE 10")),
                    aa
                );
            },
            ea = function (a, b) {
                if (!(a instanceof b))
                    throw new TypeError("Cannot call a class as a function");
            },
            fa = (function () {
                function a(a, b) {
                    for (var c, d = 0; d < b.length; d++)
                        (c = b[d]),
                            (c.enumerable = c.enumerable || !1),
                            (c.configurable = !0),
                            "value" in c && (c.writable = !0),
                            Object.defineProperty(a, c.key, c);
                }
                return function (b, c, d) {
                    return c && a(b.prototype, c), d && a(b, d), b;
                };
            })(),
            ga = function (a, b, c) {
                return (
                    b in a
                        ? Object.defineProperty(a, b, {
                              value: c,
                              enumerable: !0,
                              configurable: !0,
                              writable: !0,
                          })
                        : (a[b] = c),
                    a
                );
            },
            ha =
                Object.assign ||
                function (a) {
                    for (var b, c = 1; c < arguments.length; c++)
                        for (var d in (b = arguments[c]))
                            Object.prototype.hasOwnProperty.call(b, d) &&
                                (a[d] = b[d]);
                    return a;
                },
            ia = [
                "auto-start",
                "auto",
                "auto-end",
                "top-start",
                "top",
                "top-end",
                "right-start",
                "right",
                "right-end",
                "bottom-end",
                "bottom",
                "bottom-start",
                "left-end",
                "left",
                "left-start",
            ],
            ja = ia.slice(3),
            ka = {
                FLIP: "flip",
                CLOCKWISE: "clockwise",
                COUNTERCLOCKWISE: "counterclockwise",
            },
            la = (function () {
                function b(c, d) {
                    var e = this,
                        f =
                            2 < arguments.length && void 0 !== arguments[2]
                                ? arguments[2]
                                : {};
                    ea(this, b),
                        (this.scheduleUpdate = function () {
                            return requestAnimationFrame(e.update);
                        }),
                        (this.update = ca(this.update.bind(this))),
                        (this.options = ha({}, b.Defaults, f)),
                        (this.state = {
                            isDestroyed: !1,
                            isCreated: !1,
                            scrollParents: [],
                        }),
                        (this.reference = c && c.jquery ? c[0] : c),
                        (this.popper = d && d.jquery ? d[0] : d),
                        (this.options.modifiers = {}),
                        Object.keys(
                            ha({}, b.Defaults.modifiers, f.modifiers)
                        ).forEach(function (a) {
                            e.options.modifiers[a] = ha(
                                {},
                                b.Defaults.modifiers[a] || {},
                                f.modifiers ? f.modifiers[a] : {}
                            );
                        }),
                        (this.modifiers = Object.keys(this.options.modifiers)
                            .map(function (a) {
                                return ha({ name: a }, e.options.modifiers[a]);
                            })
                            .sort(function (a, b) {
                                return a.order - b.order;
                            })),
                        this.modifiers.forEach(function (b) {
                            b.enabled &&
                                a(b.onLoad) &&
                                b.onLoad(
                                    e.reference,
                                    e.popper,
                                    e.options,
                                    b,
                                    e.state
                                );
                        }),
                        this.update();
                    var g = this.options.eventsEnabled;
                    g && this.enableEventListeners(),
                        (this.state.eventsEnabled = g);
                }
                return (
                    fa(b, [
                        {
                            key: "update",
                            value: function () {
                                return C.call(this);
                            },
                        },
                        {
                            key: "destroy",
                            value: function () {
                                return F.call(this);
                            },
                        },
                        {
                            key: "enableEventListeners",
                            value: function () {
                                return J.call(this);
                            },
                        },
                        {
                            key: "disableEventListeners",
                            value: function () {
                                return L.call(this);
                            },
                        },
                    ]),
                    b
                );
            })();
        return (
            (la.Utils = (
                "undefined" == typeof window ? global : window
            ).PopperUtils),
            (la.placements = ia),
            (la.Defaults = {
                placement: "bottom",
                eventsEnabled: !0,
                removeOnDestroy: !1,
                onCreate: function () {},
                onUpdate: function () {},
                modifiers: {
                    shift: {
                        order: 100,
                        enabled: !0,
                        fn: function (a) {
                            var b = a.placement,
                                c = b.split("-")[0],
                                d = b.split("-")[1];
                            if (d) {
                                var e = a.offsets,
                                    f = e.reference,
                                    g = e.popper,
                                    h = -1 !== ["bottom", "top"].indexOf(c),
                                    i = h ? "left" : "top",
                                    j = h ? "width" : "height",
                                    k = {
                                        start: ga({}, i, f[i]),
                                        end: ga({}, i, f[i] + f[j] - g[j]),
                                    };
                                a.offsets.popper = ha({}, g, k[d]);
                            }
                            return a;
                        },
                    },
                    offset: { order: 200, enabled: !0, fn: U, offset: 0 },
                    preventOverflow: {
                        order: 300,
                        enabled: !0,
                        fn: function (a, b) {
                            var c = b.boundariesElement || e(a.instance.popper);
                            a.instance.reference === c && (c = e(c));
                            var d = s(
                                a.instance.popper,
                                a.instance.reference,
                                b.padding,
                                c
                            );
                            b.boundaries = d;
                            var f = b.priority,
                                g = a.offsets.popper,
                                h = {
                                    primary: function (a) {
                                        var c = g[a];
                                        return (
                                            g[a] < d[a] &&
                                                !b.escapeWithReference &&
                                                (c = X(g[a], d[a])),
                                            ga({}, a, c)
                                        );
                                    },
                                    secondary: function (a) {
                                        var c = "right" === a ? "left" : "top",
                                            e = g[c];
                                        return (
                                            g[a] > d[a] &&
                                                !b.escapeWithReference &&
                                                (e = V(
                                                    g[c],
                                                    d[a] -
                                                        ("right" === a
                                                            ? g.width
                                                            : g.height)
                                                )),
                                            ga({}, c, e)
                                        );
                                    },
                                };
                            return (
                                f.forEach(function (a) {
                                    var b =
                                        -1 === ["left", "top"].indexOf(a)
                                            ? "secondary"
                                            : "primary";
                                    g = ha({}, g, h[b](a));
                                }),
                                (a.offsets.popper = g),
                                a
                            );
                        },
                        priority: ["left", "right", "top", "bottom"],
                        padding: 5,
                        boundariesElement: "scrollParent",
                    },
                    keepTogether: {
                        order: 400,
                        enabled: !0,
                        fn: function (a) {
                            var b = a.offsets,
                                c = b.popper,
                                d = b.reference,
                                e = a.placement.split("-")[0],
                                f = W,
                                g = -1 !== ["top", "bottom"].indexOf(e),
                                h = g ? "right" : "bottom",
                                i = g ? "left" : "top",
                                j = g ? "width" : "height";
                            return (
                                c[h] < f(d[i]) &&
                                    (a.offsets.popper[i] = f(d[i]) - c[j]),
                                c[i] > f(d[h]) &&
                                    (a.offsets.popper[i] = f(d[h])),
                                a
                            );
                        },
                    },
                    arrow: {
                        order: 500,
                        enabled: !0,
                        fn: function (a, c) {
                            var d;
                            if (
                                !P(
                                    a.instance.modifiers,
                                    "arrow",
                                    "keepTogether"
                                )
                            )
                                return a;
                            var e = c.element;
                            if ("string" == typeof e) {
                                if (!(e = a.instance.popper.querySelector(e)))
                                    return a;
                            } else if (!a.instance.popper.contains(e))
                                return (
                                    console.warn(
                                        "WARNING: `arrow.element` must be child of its popper element!"
                                    ),
                                    a
                                );
                            var f = a.placement.split("-")[0],
                                g = a.offsets,
                                h = g.popper,
                                i = g.reference,
                                j = -1 !== ["left", "right"].indexOf(f),
                                k = j ? "height" : "width",
                                l = j ? "Top" : "Left",
                                m = l.toLowerCase(),
                                o = j ? "left" : "top",
                                p = j ? "bottom" : "right",
                                q = w(e)[k];
                            i[p] - q < h[m] &&
                                (a.offsets.popper[m] -= h[m] - (i[p] - q)),
                                i[m] + q > h[p] &&
                                    (a.offsets.popper[m] += i[m] + q - h[p]),
                                (a.offsets.popper = n(a.offsets.popper));
                            var r = i[m] + i[k] / 2 - q / 2,
                                s = b(a.instance.popper),
                                t = parseFloat(s["margin" + l], 10),
                                u = parseFloat(s["border" + l + "Width"], 10),
                                v = r - a.offsets.popper[m] - t - u;
                            return (
                                (v = X(V(h[k] - q, v), 0)),
                                (a.arrowElement = e),
                                (a.offsets.arrow =
                                    ((d = {}),
                                    ga(d, m, Math.round(v)),
                                    ga(d, o, ""),
                                    d)),
                                a
                            );
                        },
                        element: "[x-arrow]",
                    },
                    flip: {
                        order: 600,
                        enabled: !0,
                        fn: function (a, b) {
                            if (D(a.instance.modifiers, "inner")) return a;
                            if (
                                a.flipped &&
                                a.placement === a.originalPlacement
                            )
                                return a;
                            var c = s(
                                    a.instance.popper,
                                    a.instance.reference,
                                    b.padding,
                                    b.boundariesElement
                                ),
                                d = a.placement.split("-")[0],
                                e = x(d),
                                f = a.placement.split("-")[1] || "",
                                g = [];
                            switch (b.behavior) {
                                case ka.FLIP:
                                    g = [d, e];
                                    break;
                                case ka.CLOCKWISE:
                                    g = R(d);
                                    break;
                                case ka.COUNTERCLOCKWISE:
                                    g = R(d, !0);
                                    break;
                                default:
                                    g = b.behavior;
                            }
                            return (
                                g.forEach(function (h, i) {
                                    if (d !== h || g.length === i + 1) return a;
                                    (d = a.placement.split("-")[0]), (e = x(d));
                                    var j = a.offsets.popper,
                                        k = a.offsets.reference,
                                        l = W,
                                        m =
                                            ("left" === d &&
                                                l(j.right) > l(k.left)) ||
                                            ("right" === d &&
                                                l(j.left) < l(k.right)) ||
                                            ("top" === d &&
                                                l(j.bottom) > l(k.top)) ||
                                            ("bottom" === d &&
                                                l(j.top) < l(k.bottom)),
                                        n = l(j.left) < l(c.left),
                                        o = l(j.right) > l(c.right),
                                        p = l(j.top) < l(c.top),
                                        q = l(j.bottom) > l(c.bottom),
                                        r =
                                            ("left" === d && n) ||
                                            ("right" === d && o) ||
                                            ("top" === d && p) ||
                                            ("bottom" === d && q),
                                        s = -1 !== ["top", "bottom"].indexOf(d),
                                        t =
                                            !!b.flipVariations &&
                                            ((s && "start" === f && n) ||
                                                (s && "end" === f && o) ||
                                                (!s && "start" === f && p) ||
                                                (!s && "end" === f && q));
                                    (m || r || t) &&
                                        ((a.flipped = !0),
                                        (m || r) && (d = g[i + 1]),
                                        t && (f = Q(f)),
                                        (a.placement = d + (f ? "-" + f : "")),
                                        (a.offsets.popper = ha(
                                            {},
                                            a.offsets.popper,
                                            y(
                                                a.instance.popper,
                                                a.offsets.reference,
                                                a.placement
                                            )
                                        )),
                                        (a = B(
                                            a.instance.modifiers,
                                            a,
                                            "flip"
                                        )));
                                }),
                                a
                            );
                        },
                        behavior: "flip",
                        padding: 5,
                        boundariesElement: "viewport",
                    },
                    inner: {
                        order: 700,
                        enabled: !1,
                        fn: function (a) {
                            var b = a.placement,
                                c = b.split("-")[0],
                                d = a.offsets,
                                e = d.popper,
                                f = d.reference,
                                g = -1 !== ["left", "right"].indexOf(c),
                                h = -1 === ["top", "left"].indexOf(c);
                            return (
                                (e[g ? "left" : "top"] =
                                    f[c] - (h ? e[g ? "width" : "height"] : 0)),
                                (a.placement = x(b)),
                                (a.offsets.popper = n(e)),
                                a
                            );
                        },
                    },
                    hide: {
                        order: 800,
                        enabled: !0,
                        fn: function (a) {
                            if (
                                !P(
                                    a.instance.modifiers,
                                    "hide",
                                    "preventOverflow"
                                )
                            )
                                return a;
                            var b = a.offsets.reference,
                                c = z(a.instance.modifiers, function (a) {
                                    return "preventOverflow" === a.name;
                                }).boundaries;
                            if (
                                b.bottom < c.top ||
                                b.left > c.right ||
                                b.top > c.bottom ||
                                b.right < c.left
                            ) {
                                if (!0 === a.hide) return a;
                                (a.hide = !0),
                                    (a.attributes["x-out-of-boundaries"] = "");
                            } else {
                                if (!1 === a.hide) return a;
                                (a.hide = !1),
                                    (a.attributes["x-out-of-boundaries"] = !1);
                            }
                            return a;
                        },
                    },
                    computeStyle: {
                        order: 850,
                        enabled: !0,
                        fn: function (a, b) {
                            var c = b.x,
                                d = b.y,
                                f = a.offsets.popper,
                                g = z(a.instance.modifiers, function (a) {
                                    return "applyStyle" === a.name;
                                }).gpuAcceleration;
                            void 0 !== g &&
                                console.warn(
                                    "WARNING: `gpuAcceleration` option moved to `computeStyle` modifier and will not be supported in future versions of Popper.js!"
                                );
                            var h,
                                i,
                                j = void 0 === g ? b.gpuAcceleration : g,
                                k = e(a.instance.popper),
                                l = o(k),
                                m = { position: f.position },
                                n = {
                                    left: W(f.left),
                                    top: W(f.top),
                                    bottom: W(f.bottom),
                                    right: W(f.right),
                                },
                                p = "bottom" === c ? "top" : "bottom",
                                q = "right" === d ? "left" : "right",
                                r = E("transform");
                            if (
                                ((i =
                                    "bottom" == p
                                        ? -l.height + n.bottom
                                        : n.top),
                                (h =
                                    "right" == q ? -l.width + n.right : n.left),
                                j && r)
                            )
                                (m[r] =
                                    "translate3d(" + h + "px, " + i + "px, 0)"),
                                    (m[p] = 0),
                                    (m[q] = 0),
                                    (m.willChange = "transform");
                            else {
                                var s = "bottom" == p ? -1 : 1,
                                    t = "right" == q ? -1 : 1;
                                (m[p] = i * s),
                                    (m[q] = h * t),
                                    (m.willChange = p + ", " + q);
                            }
                            var u = { "x-placement": a.placement };
                            return (
                                (a.attributes = ha({}, u, a.attributes)),
                                (a.styles = ha({}, m, a.styles)),
                                (a.arrowStyles = ha(
                                    {},
                                    a.offsets.arrow,
                                    a.arrowStyles
                                )),
                                a
                            );
                        },
                        gpuAcceleration: !0,
                        x: "bottom",
                        y: "right",
                    },
                    applyStyle: {
                        order: 900,
                        enabled: !0,
                        fn: function (a) {
                            return (
                                N(a.instance.popper, a.styles),
                                O(a.instance.popper, a.attributes),
                                a.arrowElement &&
                                    Object.keys(a.arrowStyles).length &&
                                    N(a.arrowElement, a.arrowStyles),
                                a
                            );
                        },
                        onLoad: function (a, b, c, d, e) {
                            var f = v(e, b, a),
                                g = u(
                                    c.placement,
                                    f,
                                    b,
                                    a,
                                    c.modifiers.flip.boundariesElement,
                                    c.modifiers.flip.padding
                                );
                            return (
                                b.setAttribute("x-placement", g),
                                N(b, { position: "absolute" }),
                                c
                            );
                        },
                        gpuAcceleration: void 0,
                    },
                },
            }),
            la
        );
    }),
    (function (a, b) {
        "object" == typeof exports && "undefined" != typeof module
            ? b(exports, require("jquery"), require("popper.js"))
            : "function" == typeof define && define.amd
            ? define(["exports", "jquery", "popper.js"], b)
            : b((a.bootstrap = {}), a.jQuery, a.Popper);
    })(this, function (a, b, c) {
        "use strict";
        function d(a, b) {
            for (var c = 0; c < b.length; c++) {
                var d = b[c];
                (d.enumerable = d.enumerable || !1),
                    (d.configurable = !0),
                    "value" in d && (d.writable = !0),
                    Object.defineProperty(a, d.key, d);
            }
        }
        function e(a, b, c) {
            return b && d(a.prototype, b), c && d(a, c), a;
        }
        function f(a, b, c) {
            return (
                b in a
                    ? Object.defineProperty(a, b, {
                          value: c,
                          enumerable: !0,
                          configurable: !0,
                          writable: !0,
                      })
                    : (a[b] = c),
                a
            );
        }
        function g(a) {
            for (var b = 1; b < arguments.length; b++) {
                var c = null != arguments[b] ? arguments[b] : {},
                    d = Object.keys(c);
                "function" == typeof Object.getOwnPropertySymbols &&
                    (d = d.concat(
                        Object.getOwnPropertySymbols(c).filter(function (a) {
                            return Object.getOwnPropertyDescriptor(
                                c,
                                a
                            ).enumerable;
                        })
                    )),
                    d.forEach(function (b) {
                        f(a, b, c[b]);
                    });
            }
            return a;
        }
        function h(a, b) {
            (a.prototype = Object.create(b.prototype)),
                (a.prototype.constructor = a),
                (a.__proto__ = b);
        }
        (b = b && b.hasOwnProperty("default") ? b.default : b),
            (c = c && c.hasOwnProperty("default") ? c.default : c);
        var i = (function (a) {
                function b(a) {
                    return {}.toString
                        .call(a)
                        .match(/\s([a-z]+)/i)[1]
                        .toLowerCase();
                }
                function c() {
                    return {
                        bindType: e,
                        delegateType: e,
                        handle: function (b) {
                            if (a(b.target).is(this))
                                return b.handleObj.handler.apply(
                                    this,
                                    arguments
                                );
                        },
                    };
                }
                function d(b) {
                    var c = this,
                        d = !1;
                    return (
                        a(this).one(f.TRANSITION_END, function () {
                            d = !0;
                        }),
                        setTimeout(function () {
                            d || f.triggerTransitionEnd(c);
                        }, b),
                        this
                    );
                }
                var e = "transitionend",
                    f = {
                        TRANSITION_END: "bsTransitionEnd",
                        getUID: function (a) {
                            do {
                                a += ~~(1e6 * Math.random());
                            } while (document.getElementById(a));
                            return a;
                        },
                        getSelectorFromElement: function (a) {
                            var b = a.getAttribute("data-target");
                            (b && "#" !== b) ||
                                (b = a.getAttribute("href") || "");
                            try {
                                return document.querySelector(b) ? b : null;
                            } catch (a) {
                                return null;
                            }
                        },
                        getTransitionDurationFromElement: function (b) {
                            if (!b) return 0;
                            var c = a(b).css("transition-duration");
                            return parseFloat(c)
                                ? ((c = c.split(",")[0]), 1e3 * parseFloat(c))
                                : 0;
                        },
                        reflow: function (a) {
                            return a.offsetHeight;
                        },
                        triggerTransitionEnd: function (b) {
                            a(b).trigger(e);
                        },
                        supportsTransitionEnd: function () {
                            return Boolean(e);
                        },
                        isElement: function (a) {
                            return (a[0] || a).nodeType;
                        },
                        typeCheckConfig: function (a, c, d) {
                            for (var e in d)
                                if (
                                    Object.prototype.hasOwnProperty.call(d, e)
                                ) {
                                    var g = d[e],
                                        h = c[e],
                                        i =
                                            h && f.isElement(h)
                                                ? "element"
                                                : b(h);
                                    if (!new RegExp(g).test(i))
                                        throw new Error(
                                            a.toUpperCase() +
                                                ': Option "' +
                                                e +
                                                '" provided type "' +
                                                i +
                                                '" but expected type "' +
                                                g +
                                                '".'
                                        );
                                }
                        },
                    };
                return (
                    (function () {
                        (a.fn.emulateTransitionEnd = d),
                            (a.event.special[f.TRANSITION_END] = c());
                    })(),
                    f
                );
            })(b),
            j = (function (a) {
                var b = "alert",
                    c = a.fn[b],
                    d = { DISMISS: '[data-dismiss="alert"]' },
                    f = {
                        CLOSE: "close.bs.alert",
                        CLOSED: "closed.bs.alert",
                        CLICK_DATA_API: "click.bs.alert.data-api",
                    },
                    g = { ALERT: "alert", FADE: "fade", SHOW: "show" },
                    h = (function () {
                        function b(a) {
                            this._element = a;
                        }
                        var c = b.prototype;
                        return (
                            (c.close = function (a) {
                                var b = this._element;
                                a && (b = this._getRootElement(a)),
                                    this._triggerCloseEvent(
                                        b
                                    ).isDefaultPrevented() ||
                                        this._removeElement(b);
                            }),
                            (c.dispose = function () {
                                a.removeData(this._element, "bs.alert"),
                                    (this._element = null);
                            }),
                            (c._getRootElement = function (b) {
                                var c = i.getSelectorFromElement(b),
                                    d = !1;
                                return (
                                    c && (d = document.querySelector(c)),
                                    d || (d = a(b).closest("." + g.ALERT)[0]),
                                    d
                                );
                            }),
                            (c._triggerCloseEvent = function (b) {
                                var c = a.Event(f.CLOSE);
                                return a(b).trigger(c), c;
                            }),
                            (c._removeElement = function (b) {
                                var c = this;
                                if (
                                    (a(b).removeClass(g.SHOW),
                                    !a(b).hasClass(g.FADE))
                                )
                                    return void this._destroyElement(b);
                                var d = i.getTransitionDurationFromElement(b);
                                a(b)
                                    .one(i.TRANSITION_END, function (a) {
                                        return c._destroyElement(b, a);
                                    })
                                    .emulateTransitionEnd(d);
                            }),
                            (c._destroyElement = function (b) {
                                a(b).detach().trigger(f.CLOSED).remove();
                            }),
                            (b._jQueryInterface = function (c) {
                                return this.each(function () {
                                    var d = a(this),
                                        e = d.data("bs.alert");
                                    e ||
                                        ((e = new b(this)),
                                        d.data("bs.alert", e)),
                                        "close" === c && e[c](this);
                                });
                            }),
                            (b._handleDismiss = function (a) {
                                return function (b) {
                                    b && b.preventDefault(), a.close(this);
                                };
                            }),
                            e(b, null, [
                                {
                                    key: "VERSION",
                                    get: function () {
                                        return "4.1.3";
                                    },
                                },
                            ]),
                            b
                        );
                    })();
                return (
                    a(document).on(
                        f.CLICK_DATA_API,
                        d.DISMISS,
                        h._handleDismiss(new h())
                    ),
                    (a.fn[b] = h._jQueryInterface),
                    (a.fn[b].Constructor = h),
                    (a.fn[b].noConflict = function () {
                        return (a.fn[b] = c), h._jQueryInterface;
                    }),
                    h
                );
            })(b),
            k = (function (a) {
                var b = "button",
                    c = a.fn[b],
                    d = { ACTIVE: "active", BUTTON: "btn", FOCUS: "focus" },
                    f = {
                        DATA_TOGGLE_CARROT: '[data-toggle^="button"]',
                        DATA_TOGGLE: '[data-toggle="buttons"]',
                        INPUT: "input",
                        ACTIVE: ".active",
                        BUTTON: ".btn",
                    },
                    g = {
                        CLICK_DATA_API: "click.bs.button.data-api",
                        FOCUS_BLUR_DATA_API:
                            "focus.bs.button.data-api blur.bs.button.data-api",
                    },
                    h = (function () {
                        function b(a) {
                            this._element = a;
                        }
                        var c = b.prototype;
                        return (
                            (c.toggle = function () {
                                var b = !0,
                                    c = !0,
                                    e = a(this._element).closest(
                                        f.DATA_TOGGLE
                                    )[0];
                                if (e) {
                                    var g = this._element.querySelector(
                                        f.INPUT
                                    );
                                    if (g) {
                                        if ("radio" === g.type)
                                            if (
                                                g.checked &&
                                                this._element.classList.contains(
                                                    d.ACTIVE
                                                )
                                            )
                                                b = !1;
                                            else {
                                                var h = e.querySelector(
                                                    f.ACTIVE
                                                );
                                                h && a(h).removeClass(d.ACTIVE);
                                            }
                                        if (b) {
                                            if (
                                                g.hasAttribute("disabled") ||
                                                e.hasAttribute("disabled") ||
                                                g.classList.contains(
                                                    "disabled"
                                                ) ||
                                                e.classList.contains("disabled")
                                            )
                                                return;
                                            (g.checked =
                                                !this._element.classList.contains(
                                                    d.ACTIVE
                                                )),
                                                a(g).trigger("change");
                                        }
                                        g.focus(), (c = !1);
                                    }
                                }
                                c &&
                                    this._element.setAttribute(
                                        "aria-pressed",
                                        !this._element.classList.contains(
                                            d.ACTIVE
                                        )
                                    ),
                                    b && a(this._element).toggleClass(d.ACTIVE);
                            }),
                            (c.dispose = function () {
                                a.removeData(this._element, "bs.button"),
                                    (this._element = null);
                            }),
                            (b._jQueryInterface = function (c) {
                                return this.each(function () {
                                    var d = a(this).data("bs.button");
                                    d ||
                                        ((d = new b(this)),
                                        a(this).data("bs.button", d)),
                                        "toggle" === c && d[c]();
                                });
                            }),
                            e(b, null, [
                                {
                                    key: "VERSION",
                                    get: function () {
                                        return "4.1.3";
                                    },
                                },
                            ]),
                            b
                        );
                    })();
                return (
                    a(document)
                        .on(
                            g.CLICK_DATA_API,
                            f.DATA_TOGGLE_CARROT,
                            function (b) {
                                b.preventDefault();
                                var c = b.target;
                                a(c).hasClass(d.BUTTON) ||
                                    (c = a(c).closest(f.BUTTON)),
                                    h._jQueryInterface.call(a(c), "toggle");
                            }
                        )
                        .on(
                            g.FOCUS_BLUR_DATA_API,
                            f.DATA_TOGGLE_CARROT,
                            function (b) {
                                var c = a(b.target).closest(f.BUTTON)[0];
                                a(c).toggleClass(
                                    d.FOCUS,
                                    /^focus(in)?$/.test(b.type)
                                );
                            }
                        ),
                    (a.fn[b] = h._jQueryInterface),
                    (a.fn[b].Constructor = h),
                    (a.fn[b].noConflict = function () {
                        return (a.fn[b] = c), h._jQueryInterface;
                    }),
                    h
                );
            })(b),
            l = (function (a) {
                var b = "carousel",
                    c = "bs.carousel",
                    d = "." + c,
                    f = a.fn[b],
                    h = {
                        interval: 5e3,
                        keyboard: !0,
                        slide: !1,
                        pause: "hover",
                        wrap: !0,
                    },
                    j = {
                        interval: "(number|boolean)",
                        keyboard: "boolean",
                        slide: "(boolean|string)",
                        pause: "(string|boolean)",
                        wrap: "boolean",
                    },
                    k = {
                        NEXT: "next",
                        PREV: "prev",
                        LEFT: "left",
                        RIGHT: "right",
                    },
                    l = {
                        SLIDE: "slide" + d,
                        SLID: "slid" + d,
                        KEYDOWN: "keydown" + d,
                        MOUSEENTER: "mouseenter" + d,
                        MOUSELEAVE: "mouseleave" + d,
                        TOUCHEND: "touchend" + d,
                        LOAD_DATA_API: "load.bs.carousel.data-api",
                        CLICK_DATA_API: "click.bs.carousel.data-api",
                    },
                    m = {
                        CAROUSEL: "carousel",
                        ACTIVE: "active",
                        SLIDE: "slide",
                        RIGHT: "carousel-item-right",
                        LEFT: "carousel-item-left",
                        NEXT: "carousel-item-next",
                        PREV: "carousel-item-prev",
                        ITEM: "carousel-item",
                    },
                    n = {
                        ACTIVE: ".active",
                        ACTIVE_ITEM: ".active.carousel-item",
                        ITEM: ".carousel-item",
                        NEXT_PREV: ".carousel-item-next, .carousel-item-prev",
                        INDICATORS: ".carousel-indicators",
                        DATA_SLIDE: "[data-slide], [data-slide-to]",
                        DATA_RIDE: '[data-ride="carousel"]',
                    },
                    o = (function () {
                        function f(b, c) {
                            (this._items = null),
                                (this._interval = null),
                                (this._activeElement = null),
                                (this._isPaused = !1),
                                (this._isSliding = !1),
                                (this.touchTimeout = null),
                                (this._config = this._getConfig(c)),
                                (this._element = a(b)[0]),
                                (this._indicatorsElement =
                                    this._element.querySelector(n.INDICATORS)),
                                this._addEventListeners();
                        }
                        var o = f.prototype;
                        return (
                            (o.next = function () {
                                this._isSliding || this._slide(k.NEXT);
                            }),
                            (o.nextWhenVisible = function () {
                                !document.hidden &&
                                    a(this._element).is(":visible") &&
                                    "hidden" !==
                                        a(this._element).css("visibility") &&
                                    this.next();
                            }),
                            (o.prev = function () {
                                this._isSliding || this._slide(k.PREV);
                            }),
                            (o.pause = function (a) {
                                a || (this._isPaused = !0),
                                    this._element.querySelector(n.NEXT_PREV) &&
                                        (i.triggerTransitionEnd(this._element),
                                        this.cycle(!0)),
                                    clearInterval(this._interval),
                                    (this._interval = null);
                            }),
                            (o.cycle = function (a) {
                                a || (this._isPaused = !1),
                                    this._interval &&
                                        (clearInterval(this._interval),
                                        (this._interval = null)),
                                    this._config.interval &&
                                        !this._isPaused &&
                                        (this._interval = setInterval(
                                            (document.visibilityState
                                                ? this.nextWhenVisible
                                                : this.next
                                            ).bind(this),
                                            this._config.interval
                                        ));
                            }),
                            (o.to = function (b) {
                                var c = this;
                                this._activeElement =
                                    this._element.querySelector(n.ACTIVE_ITEM);
                                var d = this._getItemIndex(this._activeElement);
                                if (!(b > this._items.length - 1 || b < 0)) {
                                    if (this._isSliding)
                                        return void a(this._element).one(
                                            l.SLID,
                                            function () {
                                                return c.to(b);
                                            }
                                        );
                                    if (d === b)
                                        return this.pause(), void this.cycle();
                                    var e = b > d ? k.NEXT : k.PREV;
                                    this._slide(e, this._items[b]);
                                }
                            }),
                            (o.dispose = function () {
                                a(this._element).off(d),
                                    a.removeData(this._element, c),
                                    (this._items = null),
                                    (this._config = null),
                                    (this._element = null),
                                    (this._interval = null),
                                    (this._isPaused = null),
                                    (this._isSliding = null),
                                    (this._activeElement = null),
                                    (this._indicatorsElement = null);
                            }),
                            (o._getConfig = function (a) {
                                return (
                                    (a = g({}, h, a)),
                                    i.typeCheckConfig(b, a, j),
                                    a
                                );
                            }),
                            (o._addEventListeners = function () {
                                var b = this;
                                this._config.keyboard &&
                                    a(this._element).on(
                                        l.KEYDOWN,
                                        function (a) {
                                            return b._keydown(a);
                                        }
                                    ),
                                    "hover" === this._config.pause &&
                                        (a(this._element)
                                            .on(l.MOUSEENTER, function (a) {
                                                return b.pause(a);
                                            })
                                            .on(l.MOUSELEAVE, function (a) {
                                                return b.cycle(a);
                                            }),
                                        "ontouchstart" in
                                            document.documentElement &&
                                            a(this._element).on(
                                                l.TOUCHEND,
                                                function () {
                                                    b.pause(),
                                                        b.touchTimeout &&
                                                            clearTimeout(
                                                                b.touchTimeout
                                                            ),
                                                        (b.touchTimeout =
                                                            setTimeout(
                                                                function (a) {
                                                                    return b.cycle(
                                                                        a
                                                                    );
                                                                },
                                                                500 +
                                                                    b._config
                                                                        .interval
                                                            ));
                                                }
                                            ));
                            }),
                            (o._keydown = function (a) {
                                if (!/input|textarea/i.test(a.target.tagName))
                                    switch (a.which) {
                                        case 37:
                                            a.preventDefault(), this.prev();
                                            break;
                                        case 39:
                                            a.preventDefault(), this.next();
                                    }
                            }),
                            (o._getItemIndex = function (a) {
                                return (
                                    (this._items =
                                        a && a.parentNode
                                            ? [].slice.call(
                                                  a.parentNode.querySelectorAll(
                                                      n.ITEM
                                                  )
                                              )
                                            : []),
                                    this._items.indexOf(a)
                                );
                            }),
                            (o._getItemByDirection = function (a, b) {
                                var c = a === k.NEXT,
                                    d = a === k.PREV,
                                    e = this._getItemIndex(b),
                                    f = this._items.length - 1;
                                if (
                                    ((d && 0 === e) || (c && e === f)) &&
                                    !this._config.wrap
                                )
                                    return b;
                                var g = a === k.PREV ? -1 : 1,
                                    h = (e + g) % this._items.length;
                                return -1 === h
                                    ? this._items[this._items.length - 1]
                                    : this._items[h];
                            }),
                            (o._triggerSlideEvent = function (b, c) {
                                var d = this._getItemIndex(b),
                                    e = this._getItemIndex(
                                        this._element.querySelector(
                                            n.ACTIVE_ITEM
                                        )
                                    ),
                                    f = a.Event(l.SLIDE, {
                                        relatedTarget: b,
                                        direction: c,
                                        from: e,
                                        to: d,
                                    });
                                return a(this._element).trigger(f), f;
                            }),
                            (o._setActiveIndicatorElement = function (b) {
                                if (this._indicatorsElement) {
                                    var c = [].slice.call(
                                        this._indicatorsElement.querySelectorAll(
                                            n.ACTIVE
                                        )
                                    );
                                    a(c).removeClass(m.ACTIVE);
                                    var d =
                                        this._indicatorsElement.children[
                                            this._getItemIndex(b)
                                        ];
                                    d && a(d).addClass(m.ACTIVE);
                                }
                            }),
                            (o._slide = function (b, c) {
                                var d,
                                    e,
                                    f,
                                    g = this,
                                    h = this._element.querySelector(
                                        n.ACTIVE_ITEM
                                    ),
                                    j = this._getItemIndex(h),
                                    o =
                                        c ||
                                        (h && this._getItemByDirection(b, h)),
                                    p = this._getItemIndex(o),
                                    q = Boolean(this._interval);
                                if (
                                    (b === k.NEXT
                                        ? ((d = m.LEFT),
                                          (e = m.NEXT),
                                          (f = k.LEFT))
                                        : ((d = m.RIGHT),
                                          (e = m.PREV),
                                          (f = k.RIGHT)),
                                    o && a(o).hasClass(m.ACTIVE))
                                )
                                    return void (this._isSliding = !1);
                                if (
                                    !this._triggerSlideEvent(
                                        o,
                                        f
                                    ).isDefaultPrevented() &&
                                    h &&
                                    o
                                ) {
                                    (this._isSliding = !0),
                                        q && this.pause(),
                                        this._setActiveIndicatorElement(o);
                                    var r = a.Event(l.SLID, {
                                        relatedTarget: o,
                                        direction: f,
                                        from: j,
                                        to: p,
                                    });
                                    if (a(this._element).hasClass(m.SLIDE)) {
                                        a(o).addClass(e),
                                            i.reflow(o),
                                            a(h).addClass(d),
                                            a(o).addClass(d);
                                        var s =
                                            i.getTransitionDurationFromElement(
                                                h
                                            );
                                        a(h)
                                            .one(i.TRANSITION_END, function () {
                                                a(o)
                                                    .removeClass(d + " " + e)
                                                    .addClass(m.ACTIVE),
                                                    a(h).removeClass(
                                                        m.ACTIVE +
                                                            " " +
                                                            e +
                                                            " " +
                                                            d
                                                    ),
                                                    (g._isSliding = !1),
                                                    setTimeout(function () {
                                                        return a(
                                                            g._element
                                                        ).trigger(r);
                                                    }, 0);
                                            })
                                            .emulateTransitionEnd(s);
                                    } else
                                        a(h).removeClass(m.ACTIVE),
                                            a(o).addClass(m.ACTIVE),
                                            (this._isSliding = !1),
                                            a(this._element).trigger(r);
                                    q && this.cycle();
                                }
                            }),
                            (f._jQueryInterface = function (b) {
                                return this.each(function () {
                                    var d = a(this).data(c),
                                        e = g({}, h, a(this).data());
                                    "object" == typeof b && (e = g({}, e, b));
                                    var i = "string" == typeof b ? b : e.slide;
                                    if (
                                        (d ||
                                            ((d = new f(this, e)),
                                            a(this).data(c, d)),
                                        "number" == typeof b)
                                    )
                                        d.to(b);
                                    else if ("string" == typeof i) {
                                        if (void 0 === d[i])
                                            throw new TypeError(
                                                'No method named "' + i + '"'
                                            );
                                        d[i]();
                                    } else e.interval && (d.pause(), d.cycle());
                                });
                            }),
                            (f._dataApiClickHandler = function (b) {
                                var d = i.getSelectorFromElement(this);
                                if (d) {
                                    var e = a(d)[0];
                                    if (e && a(e).hasClass(m.CAROUSEL)) {
                                        var h = g(
                                                {},
                                                a(e).data(),
                                                a(this).data()
                                            ),
                                            j =
                                                this.getAttribute(
                                                    "data-slide-to"
                                                );
                                        j && (h.interval = !1),
                                            f._jQueryInterface.call(a(e), h),
                                            j && a(e).data(c).to(j),
                                            b.preventDefault();
                                    }
                                }
                            }),
                            e(f, null, [
                                {
                                    key: "VERSION",
                                    get: function () {
                                        return "4.1.3";
                                    },
                                },
                                {
                                    key: "Default",
                                    get: function () {
                                        return h;
                                    },
                                },
                            ]),
                            f
                        );
                    })();
                return (
                    a(document).on(
                        l.CLICK_DATA_API,
                        n.DATA_SLIDE,
                        o._dataApiClickHandler
                    ),
                    a(window).on(l.LOAD_DATA_API, function () {
                        for (
                            var b = [].slice.call(
                                    document.querySelectorAll(n.DATA_RIDE)
                                ),
                                c = 0,
                                d = b.length;
                            c < d;
                            c++
                        ) {
                            var e = a(b[c]);
                            o._jQueryInterface.call(e, e.data());
                        }
                    }),
                    (a.fn[b] = o._jQueryInterface),
                    (a.fn[b].Constructor = o),
                    (a.fn[b].noConflict = function () {
                        return (a.fn[b] = f), o._jQueryInterface;
                    }),
                    o
                );
            })(b),
            m = (function (a) {
                var b = "collapse",
                    c = "bs.collapse",
                    d = a.fn[b],
                    f = { toggle: !0, parent: "" },
                    h = { toggle: "boolean", parent: "(string|element)" },
                    j = {
                        SHOW: "show.bs.collapse",
                        SHOWN: "shown.bs.collapse",
                        HIDE: "hide.bs.collapse",
                        HIDDEN: "hidden.bs.collapse",
                        CLICK_DATA_API: "click.bs.collapse.data-api",
                    },
                    k = {
                        SHOW: "show",
                        COLLAPSE: "collapse",
                        COLLAPSING: "collapsing",
                        COLLAPSED: "collapsed",
                    },
                    l = { WIDTH: "width", HEIGHT: "height" },
                    m = {
                        ACTIVES: ".show, .collapsing",
                        DATA_TOGGLE: '[data-toggle="collapse"]',
                    },
                    n = (function () {
                        function d(b, c) {
                            (this._isTransitioning = !1),
                                (this._element = b),
                                (this._config = this._getConfig(c)),
                                (this._triggerArray = a.makeArray(
                                    document.querySelectorAll(
                                        '[data-toggle="collapse"][href="#' +
                                            b.id +
                                            '"],[data-toggle="collapse"][data-target="#' +
                                            b.id +
                                            '"]'
                                    )
                                ));
                            for (
                                var d = [].slice.call(
                                        document.querySelectorAll(m.DATA_TOGGLE)
                                    ),
                                    e = 0,
                                    f = d.length;
                                e < f;
                                e++
                            ) {
                                var g = d[e],
                                    h = i.getSelectorFromElement(g),
                                    j = [].slice
                                        .call(document.querySelectorAll(h))
                                        .filter(function (a) {
                                            return a === b;
                                        });
                                null !== h &&
                                    j.length > 0 &&
                                    ((this._selector = h),
                                    this._triggerArray.push(g));
                            }
                            (this._parent = this._config.parent
                                ? this._getParent()
                                : null),
                                this._config.parent ||
                                    this._addAriaAndCollapsedClass(
                                        this._element,
                                        this._triggerArray
                                    ),
                                this._config.toggle && this.toggle();
                        }
                        var n = d.prototype;
                        return (
                            (n.toggle = function () {
                                a(this._element).hasClass(k.SHOW)
                                    ? this.hide()
                                    : this.show();
                            }),
                            (n.show = function () {
                                var b = this;
                                if (
                                    !this._isTransitioning &&
                                    !a(this._element).hasClass(k.SHOW)
                                ) {
                                    var e, f;
                                    if (
                                        (this._parent &&
                                            ((e = [].slice
                                                .call(
                                                    this._parent.querySelectorAll(
                                                        m.ACTIVES
                                                    )
                                                )
                                                .filter(function (a) {
                                                    return (
                                                        a.getAttribute(
                                                            "data-parent"
                                                        ) === b._config.parent
                                                    );
                                                })),
                                            0 === e.length && (e = null)),
                                        !(
                                            e &&
                                            (f = a(e)
                                                .not(this._selector)
                                                .data(c)) &&
                                            f._isTransitioning
                                        ))
                                    ) {
                                        var g = a.Event(j.SHOW);
                                        if (
                                            (a(this._element).trigger(g),
                                            !g.isDefaultPrevented())
                                        ) {
                                            e &&
                                                (d._jQueryInterface.call(
                                                    a(e).not(this._selector),
                                                    "hide"
                                                ),
                                                f || a(e).data(c, null));
                                            var h = this._getDimension();
                                            a(this._element)
                                                .removeClass(k.COLLAPSE)
                                                .addClass(k.COLLAPSING),
                                                (this._element.style[h] = 0),
                                                this._triggerArray.length &&
                                                    a(this._triggerArray)
                                                        .removeClass(
                                                            k.COLLAPSED
                                                        )
                                                        .attr(
                                                            "aria-expanded",
                                                            !0
                                                        ),
                                                this.setTransitioning(!0);
                                            var l = function () {
                                                    a(b._element)
                                                        .removeClass(
                                                            k.COLLAPSING
                                                        )
                                                        .addClass(k.COLLAPSE)
                                                        .addClass(k.SHOW),
                                                        (b._element.style[h] =
                                                            ""),
                                                        b.setTransitioning(!1),
                                                        a(b._element).trigger(
                                                            j.SHOWN
                                                        );
                                                },
                                                n =
                                                    h[0].toUpperCase() +
                                                    h.slice(1),
                                                o = "scroll" + n,
                                                p =
                                                    i.getTransitionDurationFromElement(
                                                        this._element
                                                    );
                                            a(this._element)
                                                .one(i.TRANSITION_END, l)
                                                .emulateTransitionEnd(p),
                                                (this._element.style[h] =
                                                    this._element[o] + "px");
                                        }
                                    }
                                }
                            }),
                            (n.hide = function () {
                                var b = this;
                                if (
                                    !this._isTransitioning &&
                                    a(this._element).hasClass(k.SHOW)
                                ) {
                                    var c = a.Event(j.HIDE);
                                    if (
                                        (a(this._element).trigger(c),
                                        !c.isDefaultPrevented())
                                    ) {
                                        var d = this._getDimension();
                                        (this._element.style[d] =
                                            this._element.getBoundingClientRect()[
                                                d
                                            ] + "px"),
                                            i.reflow(this._element),
                                            a(this._element)
                                                .addClass(k.COLLAPSING)
                                                .removeClass(k.COLLAPSE)
                                                .removeClass(k.SHOW);
                                        var e = this._triggerArray.length;
                                        if (e > 0)
                                            for (var f = 0; f < e; f++) {
                                                var g = this._triggerArray[f],
                                                    h =
                                                        i.getSelectorFromElement(
                                                            g
                                                        );
                                                if (null !== h) {
                                                    var l = a(
                                                        [].slice.call(
                                                            document.querySelectorAll(
                                                                h
                                                            )
                                                        )
                                                    );
                                                    l.hasClass(k.SHOW) ||
                                                        a(g)
                                                            .addClass(
                                                                k.COLLAPSED
                                                            )
                                                            .attr(
                                                                "aria-expanded",
                                                                !1
                                                            );
                                                }
                                            }
                                        this.setTransitioning(!0);
                                        var m = function () {
                                            b.setTransitioning(!1),
                                                a(b._element)
                                                    .removeClass(k.COLLAPSING)
                                                    .addClass(k.COLLAPSE)
                                                    .trigger(j.HIDDEN);
                                        };
                                        this._element.style[d] = "";
                                        var n =
                                            i.getTransitionDurationFromElement(
                                                this._element
                                            );
                                        a(this._element)
                                            .one(i.TRANSITION_END, m)
                                            .emulateTransitionEnd(n);
                                    }
                                }
                            }),
                            (n.setTransitioning = function (a) {
                                this._isTransitioning = a;
                            }),
                            (n.dispose = function () {
                                a.removeData(this._element, c),
                                    (this._config = null),
                                    (this._parent = null),
                                    (this._element = null),
                                    (this._triggerArray = null),
                                    (this._isTransitioning = null);
                            }),
                            (n._getConfig = function (a) {
                                return (
                                    (a = g({}, f, a)),
                                    (a.toggle = Boolean(a.toggle)),
                                    i.typeCheckConfig(b, a, h),
                                    a
                                );
                            }),
                            (n._getDimension = function () {
                                return a(this._element).hasClass(l.WIDTH)
                                    ? l.WIDTH
                                    : l.HEIGHT;
                            }),
                            (n._getParent = function () {
                                var b = this,
                                    c = null;
                                i.isElement(this._config.parent)
                                    ? ((c = this._config.parent),
                                      void 0 !== this._config.parent.jquery &&
                                          (c = this._config.parent[0]))
                                    : (c = document.querySelector(
                                          this._config.parent
                                      ));
                                var e =
                                        '[data-toggle="collapse"][data-parent="' +
                                        this._config.parent +
                                        '"]',
                                    f = [].slice.call(c.querySelectorAll(e));
                                return (
                                    a(f).each(function (a, c) {
                                        b._addAriaAndCollapsedClass(
                                            d._getTargetFromElement(c),
                                            [c]
                                        );
                                    }),
                                    c
                                );
                            }),
                            (n._addAriaAndCollapsedClass = function (b, c) {
                                if (b) {
                                    var d = a(b).hasClass(k.SHOW);
                                    c.length &&
                                        a(c)
                                            .toggleClass(k.COLLAPSED, !d)
                                            .attr("aria-expanded", d);
                                }
                            }),
                            (d._getTargetFromElement = function (a) {
                                var b = i.getSelectorFromElement(a);
                                return b ? document.querySelector(b) : null;
                            }),
                            (d._jQueryInterface = function (b) {
                                return this.each(function () {
                                    var e = a(this),
                                        h = e.data(c),
                                        i = g(
                                            {},
                                            f,
                                            e.data(),
                                            "object" == typeof b && b ? b : {}
                                        );
                                    if (
                                        (!h &&
                                            i.toggle &&
                                            /show|hide/.test(b) &&
                                            (i.toggle = !1),
                                        h ||
                                            ((h = new d(this, i)),
                                            e.data(c, h)),
                                        "string" == typeof b)
                                    ) {
                                        if (void 0 === h[b])
                                            throw new TypeError(
                                                'No method named "' + b + '"'
                                            );
                                        h[b]();
                                    }
                                });
                            }),
                            e(d, null, [
                                {
                                    key: "VERSION",
                                    get: function () {
                                        return "4.1.3";
                                    },
                                },
                                {
                                    key: "Default",
                                    get: function () {
                                        return f;
                                    },
                                },
                            ]),
                            d
                        );
                    })();
                return (
                    a(document).on(
                        j.CLICK_DATA_API,
                        m.DATA_TOGGLE,
                        function (b) {
                            "A" === b.currentTarget.tagName &&
                                b.preventDefault();
                            var d = a(this),
                                e = i.getSelectorFromElement(this),
                                f = [].slice.call(document.querySelectorAll(e));
                            a(f).each(function () {
                                var b = a(this),
                                    e = b.data(c),
                                    f = e ? "toggle" : d.data();
                                n._jQueryInterface.call(b, f);
                            });
                        }
                    ),
                    (a.fn[b] = n._jQueryInterface),
                    (a.fn[b].Constructor = n),
                    (a.fn[b].noConflict = function () {
                        return (a.fn[b] = d), n._jQueryInterface;
                    }),
                    n
                );
            })(b),
            n = (function (a) {
                var b = "dropdown",
                    d = "bs.dropdown",
                    f = "." + d,
                    h = a.fn[b],
                    j = new RegExp("38|40|27"),
                    k = {
                        HIDE: "hide" + f,
                        HIDDEN: "hidden" + f,
                        SHOW: "show" + f,
                        SHOWN: "shown" + f,
                        CLICK: "click" + f,
                        CLICK_DATA_API: "click.bs.dropdown.data-api",
                        KEYDOWN_DATA_API: "keydown.bs.dropdown.data-api",
                        KEYUP_DATA_API: "keyup.bs.dropdown.data-api",
                    },
                    l = {
                        DISABLED: "disabled",
                        SHOW: "show",
                        DROPUP: "dropup",
                        DROPRIGHT: "dropright",
                        DROPLEFT: "dropleft",
                        MENURIGHT: "dropdown-menu-right",
                        MENULEFT: "dropdown-menu-left",
                        POSITION_STATIC: "position-static",
                    },
                    m = {
                        DATA_TOGGLE: '[data-toggle="dropdown"]',
                        FORM_CHILD: ".dropdown form",
                        MENU: ".dropdown-menu",
                        NAVBAR_NAV: ".navbar-nav",
                        VISIBLE_ITEMS:
                            ".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)",
                    },
                    n = {
                        TOP: "top-start",
                        TOPEND: "top-end",
                        BOTTOM: "bottom-start",
                        BOTTOMEND: "bottom-end",
                        RIGHT: "right-start",
                        RIGHTEND: "right-end",
                        LEFT: "left-start",
                        LEFTEND: "left-end",
                    },
                    o = {
                        offset: 0,
                        flip: !0,
                        boundary: "scrollParent",
                        reference: "toggle",
                        display: "dynamic",
                    },
                    p = {
                        offset: "(number|string|function)",
                        flip: "boolean",
                        boundary: "(string|element)",
                        reference: "(string|element)",
                        display: "string",
                    },
                    q = (function () {
                        function h(a, b) {
                            (this._element = a),
                                (this._popper = null),
                                (this._config = this._getConfig(b)),
                                (this._menu = this._getMenuElement()),
                                (this._inNavbar = this._detectNavbar()),
                                this._addEventListeners();
                        }
                        var q = h.prototype;
                        return (
                            (q.toggle = function () {
                                if (
                                    !this._element.disabled &&
                                    !a(this._element).hasClass(l.DISABLED)
                                ) {
                                    var b = h._getParentFromElement(
                                            this._element
                                        ),
                                        d = a(this._menu).hasClass(l.SHOW);
                                    if ((h._clearMenus(), !d)) {
                                        var e = {
                                                relatedTarget: this._element,
                                            },
                                            f = a.Event(k.SHOW, e);
                                        if (
                                            (a(b).trigger(f),
                                            !f.isDefaultPrevented())
                                        ) {
                                            if (!this._inNavbar) {
                                                if (void 0 === c)
                                                    throw new TypeError(
                                                        "Bootstrap dropdown require Popper.js (https://popper.js.org)"
                                                    );
                                                var g = this._element;
                                                "parent" ===
                                                this._config.reference
                                                    ? (g = b)
                                                    : i.isElement(
                                                          this._config.reference
                                                      ) &&
                                                      ((g =
                                                          this._config
                                                              .reference),
                                                      void 0 !==
                                                          this._config.reference
                                                              .jquery &&
                                                          (g =
                                                              this._config
                                                                  .reference[0])),
                                                    "scrollParent" !==
                                                        this._config.boundary &&
                                                        a(b).addClass(
                                                            l.POSITION_STATIC
                                                        ),
                                                    (this._popper = new c(
                                                        g,
                                                        this._menu,
                                                        this._getPopperConfig()
                                                    ));
                                            }
                                            "ontouchstart" in
                                                document.documentElement &&
                                                0 ===
                                                    a(b).closest(m.NAVBAR_NAV)
                                                        .length &&
                                                a(document.body)
                                                    .children()
                                                    .on(
                                                        "mouseover",
                                                        null,
                                                        a.noop
                                                    ),
                                                this._element.focus(),
                                                this._element.setAttribute(
                                                    "aria-expanded",
                                                    !0
                                                ),
                                                a(this._menu).toggleClass(
                                                    l.SHOW
                                                ),
                                                a(b)
                                                    .toggleClass(l.SHOW)
                                                    .trigger(
                                                        a.Event(k.SHOWN, e)
                                                    );
                                        }
                                    }
                                }
                            }),
                            (q.dispose = function () {
                                a.removeData(this._element, d),
                                    a(this._element).off(f),
                                    (this._element = null),
                                    (this._menu = null),
                                    null !== this._popper &&
                                        (this._popper.destroy(),
                                        (this._popper = null));
                            }),
                            (q.update = function () {
                                (this._inNavbar = this._detectNavbar()),
                                    null !== this._popper &&
                                        this._popper.scheduleUpdate();
                            }),
                            (q._addEventListeners = function () {
                                var b = this;
                                a(this._element).on(k.CLICK, function (a) {
                                    a.preventDefault(),
                                        a.stopPropagation(),
                                        b.toggle();
                                });
                            }),
                            (q._getConfig = function (c) {
                                return (
                                    (c = g(
                                        {},
                                        this.constructor.Default,
                                        a(this._element).data(),
                                        c
                                    )),
                                    i.typeCheckConfig(
                                        b,
                                        c,
                                        this.constructor.DefaultType
                                    ),
                                    c
                                );
                            }),
                            (q._getMenuElement = function () {
                                if (!this._menu) {
                                    var a = h._getParentFromElement(
                                        this._element
                                    );
                                    a && (this._menu = a.querySelector(m.MENU));
                                }
                                return this._menu;
                            }),
                            (q._getPlacement = function () {
                                var b = a(this._element.parentNode),
                                    c = n.BOTTOM;
                                return (
                                    b.hasClass(l.DROPUP)
                                        ? ((c = n.TOP),
                                          a(this._menu).hasClass(l.MENURIGHT) &&
                                              (c = n.TOPEND))
                                        : b.hasClass(l.DROPRIGHT)
                                        ? (c = n.RIGHT)
                                        : b.hasClass(l.DROPLEFT)
                                        ? (c = n.LEFT)
                                        : a(this._menu).hasClass(l.MENURIGHT) &&
                                          (c = n.BOTTOMEND),
                                    c
                                );
                            }),
                            (q._detectNavbar = function () {
                                return (
                                    a(this._element).closest(".navbar").length >
                                    0
                                );
                            }),
                            (q._getPopperConfig = function () {
                                var a = this,
                                    b = {};
                                "function" == typeof this._config.offset
                                    ? (b.fn = function (b) {
                                          return (
                                              (b.offsets = g(
                                                  {},
                                                  b.offsets,
                                                  a._config.offset(b.offsets) ||
                                                      {}
                                              )),
                                              b
                                          );
                                      })
                                    : (b.offset = this._config.offset);
                                var c = {
                                    placement: this._getPlacement(),
                                    modifiers: {
                                        offset: b,
                                        flip: { enabled: this._config.flip },
                                        preventOverflow: {
                                            boundariesElement:
                                                this._config.boundary,
                                        },
                                    },
                                };
                                return (
                                    "static" === this._config.display &&
                                        (c.modifiers.applyStyle = {
                                            enabled: !1,
                                        }),
                                    c
                                );
                            }),
                            (h._jQueryInterface = function (b) {
                                return this.each(function () {
                                    var c = a(this).data(d),
                                        e = "object" == typeof b ? b : null;
                                    if (
                                        (c ||
                                            ((c = new h(this, e)),
                                            a(this).data(d, c)),
                                        "string" == typeof b)
                                    ) {
                                        if (void 0 === c[b])
                                            throw new TypeError(
                                                'No method named "' + b + '"'
                                            );
                                        c[b]();
                                    }
                                });
                            }),
                            (h._clearMenus = function (b) {
                                if (
                                    !b ||
                                    (3 !== b.which &&
                                        ("keyup" !== b.type || 9 === b.which))
                                )
                                    for (
                                        var c = [].slice.call(
                                                document.querySelectorAll(
                                                    m.DATA_TOGGLE
                                                )
                                            ),
                                            e = 0,
                                            f = c.length;
                                        e < f;
                                        e++
                                    ) {
                                        var g = h._getParentFromElement(c[e]),
                                            i = a(c[e]).data(d),
                                            j = { relatedTarget: c[e] };
                                        if (
                                            (b &&
                                                "click" === b.type &&
                                                (j.clickEvent = b),
                                            i)
                                        ) {
                                            var n = i._menu;
                                            if (
                                                a(g).hasClass(l.SHOW) &&
                                                !(
                                                    b &&
                                                    (("click" === b.type &&
                                                        /input|textarea/i.test(
                                                            b.target.tagName
                                                        )) ||
                                                        ("keyup" === b.type &&
                                                            9 === b.which)) &&
                                                    a.contains(g, b.target)
                                                )
                                            ) {
                                                var o = a.Event(k.HIDE, j);
                                                a(g).trigger(o),
                                                    o.isDefaultPrevented() ||
                                                        ("ontouchstart" in
                                                            document.documentElement &&
                                                            a(document.body)
                                                                .children()
                                                                .off(
                                                                    "mouseover",
                                                                    null,
                                                                    a.noop
                                                                ),
                                                        c[e].setAttribute(
                                                            "aria-expanded",
                                                            "false"
                                                        ),
                                                        a(n).removeClass(
                                                            l.SHOW
                                                        ),
                                                        a(g)
                                                            .removeClass(l.SHOW)
                                                            .trigger(
                                                                a.Event(
                                                                    k.HIDDEN,
                                                                    j
                                                                )
                                                            ));
                                            }
                                        }
                                    }
                            }),
                            (h._getParentFromElement = function (a) {
                                var b,
                                    c = i.getSelectorFromElement(a);
                                return (
                                    c && (b = document.querySelector(c)),
                                    b || a.parentNode
                                );
                            }),
                            (h._dataApiKeydownHandler = function (b) {
                                if (
                                    (/input|textarea/i.test(b.target.tagName)
                                        ? !(
                                              32 === b.which ||
                                              (27 !== b.which &&
                                                  ((40 !== b.which &&
                                                      38 !== b.which) ||
                                                      a(b.target).closest(
                                                          m.MENU
                                                      ).length))
                                          )
                                        : j.test(b.which)) &&
                                    (b.preventDefault(),
                                    b.stopPropagation(),
                                    !this.disabled &&
                                        !a(this).hasClass(l.DISABLED))
                                ) {
                                    var c = h._getParentFromElement(this),
                                        d = a(c).hasClass(l.SHOW);
                                    if (
                                        (!d &&
                                            (27 !== b.which ||
                                                32 !== b.which)) ||
                                        (d &&
                                            (27 === b.which || 32 === b.which))
                                    ) {
                                        if (27 === b.which) {
                                            var e = c.querySelector(
                                                m.DATA_TOGGLE
                                            );
                                            a(e).trigger("focus");
                                        }
                                        return void a(this).trigger("click");
                                    }
                                    var f = [].slice.call(
                                        c.querySelectorAll(m.VISIBLE_ITEMS)
                                    );
                                    if (0 !== f.length) {
                                        var g = f.indexOf(b.target);
                                        38 === b.which && g > 0 && g--,
                                            40 === b.which &&
                                                g < f.length - 1 &&
                                                g++,
                                            g < 0 && (g = 0),
                                            f[g].focus();
                                    }
                                }
                            }),
                            e(h, null, [
                                {
                                    key: "VERSION",
                                    get: function () {
                                        return "4.1.3";
                                    },
                                },
                                {
                                    key: "Default",
                                    get: function () {
                                        return o;
                                    },
                                },
                                {
                                    key: "DefaultType",
                                    get: function () {
                                        return p;
                                    },
                                },
                            ]),
                            h
                        );
                    })();
                return (
                    a(document)
                        .on(
                            k.KEYDOWN_DATA_API,
                            m.DATA_TOGGLE,
                            q._dataApiKeydownHandler
                        )
                        .on(
                            k.KEYDOWN_DATA_API,
                            m.MENU,
                            q._dataApiKeydownHandler
                        )
                        .on(
                            k.CLICK_DATA_API + " " + k.KEYUP_DATA_API,
                            q._clearMenus
                        )
                        .on(k.CLICK_DATA_API, m.DATA_TOGGLE, function (b) {
                            b.preventDefault(),
                                b.stopPropagation(),
                                q._jQueryInterface.call(a(this), "toggle");
                        })
                        .on(k.CLICK_DATA_API, m.FORM_CHILD, function (a) {
                            a.stopPropagation();
                        }),
                    (a.fn[b] = q._jQueryInterface),
                    (a.fn[b].Constructor = q),
                    (a.fn[b].noConflict = function () {
                        return (a.fn[b] = h), q._jQueryInterface;
                    }),
                    q
                );
            })(b),
            o = (function (a) {
                var b = "modal",
                    c = ".bs.modal",
                    d = a.fn[b],
                    f = { backdrop: !0, keyboard: !0, focus: !0, show: !0 },
                    h = {
                        backdrop: "(boolean|string)",
                        keyboard: "boolean",
                        focus: "boolean",
                        show: "boolean",
                    },
                    j = {
                        HIDE: "hide.bs.modal",
                        HIDDEN: "hidden.bs.modal",
                        SHOW: "show.bs.modal",
                        SHOWN: "shown.bs.modal",
                        FOCUSIN: "focusin.bs.modal",
                        RESIZE: "resize.bs.modal",
                        CLICK_DISMISS: "click.dismiss.bs.modal",
                        KEYDOWN_DISMISS: "keydown.dismiss.bs.modal",
                        MOUSEUP_DISMISS: "mouseup.dismiss.bs.modal",
                        MOUSEDOWN_DISMISS: "mousedown.dismiss.bs.modal",
                        CLICK_DATA_API: "click.bs.modal.data-api",
                    },
                    k = {
                        SCROLLBAR_MEASURER: "modal-scrollbar-measure",
                        BACKDROP: "modal-backdrop",
                        OPEN: "modal-open",
                        FADE: "fade",
                        SHOW: "show",
                    },
                    l = {
                        DIALOG: ".modal-dialog",
                        DATA_TOGGLE: '[data-toggle="modal"]',
                        DATA_DISMISS: '[data-dismiss="modal"]',
                        FIXED_CONTENT:
                            ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
                        STICKY_CONTENT: ".sticky-top",
                    },
                    m = (function () {
                        function d(a, b) {
                            (this._config = this._getConfig(b)),
                                (this._element = a),
                                (this._dialog = a.querySelector(l.DIALOG)),
                                (this._backdrop = null),
                                (this._isShown = !1),
                                (this._isBodyOverflowing = !1),
                                (this._ignoreBackdropClick = !1),
                                (this._scrollbarWidth = 0);
                        }
                        var m = d.prototype;
                        return (
                            (m.toggle = function (a) {
                                return this._isShown
                                    ? this.hide()
                                    : this.show(a);
                            }),
                            (m.show = function (b) {
                                var c = this;
                                if (!this._isTransitioning && !this._isShown) {
                                    a(this._element).hasClass(k.FADE) &&
                                        (this._isTransitioning = !0);
                                    var d = a.Event(j.SHOW, {
                                        relatedTarget: b,
                                    });
                                    a(this._element).trigger(d),
                                        this._isShown ||
                                            d.isDefaultPrevented() ||
                                            ((this._isShown = !0),
                                            this._checkScrollbar(),
                                            this._setScrollbar(),
                                            this._adjustDialog(),
                                            a(document.body).addClass(k.OPEN),
                                            this._setEscapeEvent(),
                                            this._setResizeEvent(),
                                            a(this._element).on(
                                                j.CLICK_DISMISS,
                                                l.DATA_DISMISS,
                                                function (a) {
                                                    return c.hide(a);
                                                }
                                            ),
                                            a(this._dialog).on(
                                                j.MOUSEDOWN_DISMISS,
                                                function () {
                                                    a(c._element).one(
                                                        j.MOUSEUP_DISMISS,
                                                        function (b) {
                                                            a(b.target).is(
                                                                c._element
                                                            ) &&
                                                                (c._ignoreBackdropClick =
                                                                    !0);
                                                        }
                                                    );
                                                }
                                            ),
                                            this._showBackdrop(function () {
                                                return c._showElement(b);
                                            }));
                                }
                            }),
                            (m.hide = function (b) {
                                var c = this;
                                if (
                                    (b && b.preventDefault(),
                                    !this._isTransitioning && this._isShown)
                                ) {
                                    var d = a.Event(j.HIDE);
                                    if (
                                        (a(this._element).trigger(d),
                                        this._isShown &&
                                            !d.isDefaultPrevented())
                                    ) {
                                        this._isShown = !1;
                                        var e = a(this._element).hasClass(
                                            k.FADE
                                        );
                                        if (
                                            (e && (this._isTransitioning = !0),
                                            this._setEscapeEvent(),
                                            this._setResizeEvent(),
                                            a(document).off(j.FOCUSIN),
                                            a(this._element).removeClass(
                                                k.SHOW
                                            ),
                                            a(this._element).off(
                                                j.CLICK_DISMISS
                                            ),
                                            a(this._dialog).off(
                                                j.MOUSEDOWN_DISMISS
                                            ),
                                            e)
                                        ) {
                                            var f =
                                                i.getTransitionDurationFromElement(
                                                    this._element
                                                );
                                            a(this._element)
                                                .one(
                                                    i.TRANSITION_END,
                                                    function (a) {
                                                        return c._hideModal(a);
                                                    }
                                                )
                                                .emulateTransitionEnd(f);
                                        } else this._hideModal();
                                    }
                                }
                            }),
                            (m.dispose = function () {
                                a.removeData(this._element, "bs.modal"),
                                    a(
                                        window,
                                        document,
                                        this._element,
                                        this._backdrop
                                    ).off(c),
                                    (this._config = null),
                                    (this._element = null),
                                    (this._dialog = null),
                                    (this._backdrop = null),
                                    (this._isShown = null),
                                    (this._isBodyOverflowing = null),
                                    (this._ignoreBackdropClick = null),
                                    (this._scrollbarWidth = null);
                            }),
                            (m.handleUpdate = function () {
                                this._adjustDialog();
                            }),
                            (m._getConfig = function (a) {
                                return (
                                    (a = g({}, f, a)),
                                    i.typeCheckConfig(b, a, h),
                                    a
                                );
                            }),
                            (m._showElement = function (b) {
                                var c = this,
                                    d = a(this._element).hasClass(k.FADE);
                                (this._element.parentNode &&
                                    this._element.parentNode.nodeType ===
                                        Node.ELEMENT_NODE) ||
                                    document.body.appendChild(this._element),
                                    (this._element.style.display = "block"),
                                    this._element.removeAttribute(
                                        "aria-hidden"
                                    ),
                                    (this._element.scrollTop = 0),
                                    d && i.reflow(this._element),
                                    a(this._element).addClass(k.SHOW),
                                    this._config.focus && this._enforceFocus();
                                var e = a.Event(j.SHOWN, { relatedTarget: b }),
                                    f = function () {
                                        c._config.focus && c._element.focus(),
                                            (c._isTransitioning = !1),
                                            a(c._element).trigger(e);
                                    };
                                if (d) {
                                    var g = i.getTransitionDurationFromElement(
                                        this._element
                                    );
                                    a(this._dialog)
                                        .one(i.TRANSITION_END, f)
                                        .emulateTransitionEnd(g);
                                } else f();
                            }),
                            (m._enforceFocus = function () {
                                var b = this;
                                a(document)
                                    .off(j.FOCUSIN)
                                    .on(j.FOCUSIN, function (c) {
                                        document !== c.target &&
                                            b._element !== c.target &&
                                            0 ===
                                                a(b._element).has(c.target)
                                                    .length &&
                                            b._element.focus();
                                    });
                            }),
                            (m._setEscapeEvent = function () {
                                var b = this;
                                this._isShown && this._config.keyboard
                                    ? a(this._element).on(
                                          j.KEYDOWN_DISMISS,
                                          function (a) {
                                              27 === a.which &&
                                                  (a.preventDefault(),
                                                  b.hide());
                                          }
                                      )
                                    : this._isShown ||
                                      a(this._element).off(j.KEYDOWN_DISMISS);
                            }),
                            (m._setResizeEvent = function () {
                                var b = this;
                                this._isShown
                                    ? a(window).on(j.RESIZE, function (a) {
                                          return b.handleUpdate(a);
                                      })
                                    : a(window).off(j.RESIZE);
                            }),
                            (m._hideModal = function () {
                                var b = this;
                                (this._element.style.display = "none"),
                                    this._element.setAttribute(
                                        "aria-hidden",
                                        !0
                                    ),
                                    (this._isTransitioning = !1),
                                    this._showBackdrop(function () {
                                        a(document.body).removeClass(k.OPEN),
                                            b._resetAdjustments(),
                                            b._resetScrollbar(),
                                            a(b._element).trigger(j.HIDDEN);
                                    });
                            }),
                            (m._removeBackdrop = function () {
                                this._backdrop &&
                                    (a(this._backdrop).remove(),
                                    (this._backdrop = null));
                            }),
                            (m._showBackdrop = function (b) {
                                var c = this,
                                    d = a(this._element).hasClass(k.FADE)
                                        ? k.FADE
                                        : "";
                                if (this._isShown && this._config.backdrop) {
                                    if (
                                        ((this._backdrop =
                                            document.createElement("div")),
                                        (this._backdrop.className = k.BACKDROP),
                                        d && this._backdrop.classList.add(d),
                                        a(this._backdrop).appendTo(
                                            document.body
                                        ),
                                        a(this._element).on(
                                            j.CLICK_DISMISS,
                                            function (a) {
                                                if (c._ignoreBackdropClick)
                                                    return void (c._ignoreBackdropClick =
                                                        !1);
                                                a.target === a.currentTarget &&
                                                    ("static" ===
                                                    c._config.backdrop
                                                        ? c._element.focus()
                                                        : c.hide());
                                            }
                                        ),
                                        d && i.reflow(this._backdrop),
                                        a(this._backdrop).addClass(k.SHOW),
                                        !b)
                                    )
                                        return;
                                    if (!d) return void b();
                                    var e = i.getTransitionDurationFromElement(
                                        this._backdrop
                                    );
                                    a(this._backdrop)
                                        .one(i.TRANSITION_END, b)
                                        .emulateTransitionEnd(e);
                                } else if (!this._isShown && this._backdrop) {
                                    a(this._backdrop).removeClass(k.SHOW);
                                    var f = function () {
                                        c._removeBackdrop(), b && b();
                                    };
                                    if (a(this._element).hasClass(k.FADE)) {
                                        var g =
                                            i.getTransitionDurationFromElement(
                                                this._backdrop
                                            );
                                        a(this._backdrop)
                                            .one(i.TRANSITION_END, f)
                                            .emulateTransitionEnd(g);
                                    } else f();
                                } else b && b();
                            }),
                            (m._adjustDialog = function () {
                                var a =
                                    this._element.scrollHeight >
                                    document.documentElement.clientHeight;
                                !this._isBodyOverflowing &&
                                    a &&
                                    (this._element.style.paddingLeft =
                                        this._scrollbarWidth + "px"),
                                    this._isBodyOverflowing &&
                                        !a &&
                                        (this._element.style.paddingRight =
                                            this._scrollbarWidth + "px");
                            }),
                            (m._resetAdjustments = function () {
                                (this._element.style.paddingLeft = ""),
                                    (this._element.style.paddingRight = "");
                            }),
                            (m._checkScrollbar = function () {
                                var a = document.body.getBoundingClientRect();
                                (this._isBodyOverflowing =
                                    a.left + a.right < window.innerWidth),
                                    (this._scrollbarWidth =
                                        this._getScrollbarWidth());
                            }),
                            (m._setScrollbar = function () {
                                var b = this;
                                if (this._isBodyOverflowing) {
                                    var c = [].slice.call(
                                            document.querySelectorAll(
                                                l.FIXED_CONTENT
                                            )
                                        ),
                                        d = [].slice.call(
                                            document.querySelectorAll(
                                                l.STICKY_CONTENT
                                            )
                                        );
                                    a(c).each(function (c, d) {
                                        var e = d.style.paddingRight,
                                            f = a(d).css("padding-right");
                                        a(d)
                                            .data("padding-right", e)
                                            .css(
                                                "padding-right",
                                                parseFloat(f) +
                                                    b._scrollbarWidth +
                                                    "px"
                                            );
                                    }),
                                        a(d).each(function (c, d) {
                                            var e = d.style.marginRight,
                                                f = a(d).css("margin-right");
                                            a(d)
                                                .data("margin-right", e)
                                                .css(
                                                    "margin-right",
                                                    parseFloat(f) -
                                                        b._scrollbarWidth +
                                                        "px"
                                                );
                                        });
                                    var e = document.body.style.paddingRight,
                                        f = a(document.body).css(
                                            "padding-right"
                                        );
                                    a(document.body)
                                        .data("padding-right", e)
                                        .css(
                                            "padding-right",
                                            parseFloat(f) +
                                                this._scrollbarWidth +
                                                "px"
                                        );
                                }
                            }),
                            (m._resetScrollbar = function () {
                                var b = [].slice.call(
                                    document.querySelectorAll(l.FIXED_CONTENT)
                                );
                                a(b).each(function (b, c) {
                                    var d = a(c).data("padding-right");
                                    a(c).removeData("padding-right"),
                                        (c.style.paddingRight = d || "");
                                });
                                var c = [].slice.call(
                                    document.querySelectorAll(
                                        "" + l.STICKY_CONTENT
                                    )
                                );
                                a(c).each(function (b, c) {
                                    var d = a(c).data("margin-right");
                                    void 0 !== d &&
                                        a(c)
                                            .css("margin-right", d)
                                            .removeData("margin-right");
                                });
                                var d = a(document.body).data("padding-right");
                                a(document.body).removeData("padding-right"),
                                    (document.body.style.paddingRight =
                                        d || "");
                            }),
                            (m._getScrollbarWidth = function () {
                                var a = document.createElement("div");
                                (a.className = k.SCROLLBAR_MEASURER),
                                    document.body.appendChild(a);
                                var b =
                                    a.getBoundingClientRect().width -
                                    a.clientWidth;
                                return document.body.removeChild(a), b;
                            }),
                            (d._jQueryInterface = function (b, c) {
                                return this.each(function () {
                                    var e = a(this).data("bs.modal"),
                                        h = g(
                                            {},
                                            f,
                                            a(this).data(),
                                            "object" == typeof b && b ? b : {}
                                        );
                                    if (
                                        (e ||
                                            ((e = new d(this, h)),
                                            a(this).data("bs.modal", e)),
                                        "string" == typeof b)
                                    ) {
                                        if (void 0 === e[b])
                                            throw new TypeError(
                                                'No method named "' + b + '"'
                                            );
                                        e[b](c);
                                    } else h.show && e.show(c);
                                });
                            }),
                            e(d, null, [
                                {
                                    key: "VERSION",
                                    get: function () {
                                        return "4.1.3";
                                    },
                                },
                                {
                                    key: "Default",
                                    get: function () {
                                        return f;
                                    },
                                },
                            ]),
                            d
                        );
                    })();
                return (
                    a(document).on(
                        j.CLICK_DATA_API,
                        l.DATA_TOGGLE,
                        function (b) {
                            var c,
                                d = this,
                                e = i.getSelectorFromElement(this);
                            e && (c = document.querySelector(e));
                            var f = a(c).data("bs.modal")
                                ? "toggle"
                                : g({}, a(c).data(), a(this).data());
                            ("A" !== this.tagName && "AREA" !== this.tagName) ||
                                b.preventDefault();
                            var h = a(c).one(j.SHOW, function (b) {
                                b.isDefaultPrevented() ||
                                    h.one(j.HIDDEN, function () {
                                        a(d).is(":visible") && d.focus();
                                    });
                            });
                            m._jQueryInterface.call(a(c), f, this);
                        }
                    ),
                    (a.fn[b] = m._jQueryInterface),
                    (a.fn[b].Constructor = m),
                    (a.fn[b].noConflict = function () {
                        return (a.fn[b] = d), m._jQueryInterface;
                    }),
                    m
                );
            })(b),
            p = (function (a) {
                var b = "tooltip",
                    d = ".bs.tooltip",
                    f = a.fn[b],
                    h = new RegExp("(^|\\s)bs-tooltip\\S+", "g"),
                    j = {
                        animation: "boolean",
                        template: "string",
                        title: "(string|element|function)",
                        trigger: "string",
                        delay: "(number|object)",
                        html: "boolean",
                        selector: "(string|boolean)",
                        placement: "(string|function)",
                        offset: "(number|string)",
                        container: "(string|element|boolean)",
                        fallbackPlacement: "(string|array)",
                        boundary: "(string|element)",
                    },
                    k = {
                        AUTO: "auto",
                        TOP: "top",
                        RIGHT: "right",
                        BOTTOM: "bottom",
                        LEFT: "left",
                    },
                    l = {
                        animation: !0,
                        template:
                            '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
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
                    },
                    m = { SHOW: "show", OUT: "out" },
                    n = {
                        HIDE: "hide" + d,
                        HIDDEN: "hidden" + d,
                        SHOW: "show" + d,
                        SHOWN: "shown" + d,
                        INSERTED: "inserted" + d,
                        CLICK: "click" + d,
                        FOCUSIN: "focusin" + d,
                        FOCUSOUT: "focusout" + d,
                        MOUSEENTER: "mouseenter" + d,
                        MOUSELEAVE: "mouseleave" + d,
                    },
                    o = { FADE: "fade", SHOW: "show" },
                    p = {
                        TOOLTIP: ".tooltip",
                        TOOLTIP_INNER: ".tooltip-inner",
                        ARROW: ".arrow",
                    },
                    q = {
                        HOVER: "hover",
                        FOCUS: "focus",
                        CLICK: "click",
                        MANUAL: "manual",
                    },
                    r = (function () {
                        function f(a, b) {
                            if (void 0 === c)
                                throw new TypeError(
                                    "Bootstrap tooltips require Popper.js (https://popper.js.org)"
                                );
                            (this._isEnabled = !0),
                                (this._timeout = 0),
                                (this._hoverState = ""),
                                (this._activeTrigger = {}),
                                (this._popper = null),
                                (this.element = a),
                                (this.config = this._getConfig(b)),
                                (this.tip = null),
                                this._setListeners();
                        }
                        var r = f.prototype;
                        return (
                            (r.enable = function () {
                                this._isEnabled = !0;
                            }),
                            (r.disable = function () {
                                this._isEnabled = !1;
                            }),
                            (r.toggleEnabled = function () {
                                this._isEnabled = !this._isEnabled;
                            }),
                            (r.toggle = function (b) {
                                if (this._isEnabled)
                                    if (b) {
                                        var c = this.constructor.DATA_KEY,
                                            d = a(b.currentTarget).data(c);
                                        d ||
                                            ((d = new this.constructor(
                                                b.currentTarget,
                                                this._getDelegateConfig()
                                            )),
                                            a(b.currentTarget).data(c, d)),
                                            (d._activeTrigger.click =
                                                !d._activeTrigger.click),
                                            d._isWithActiveTrigger()
                                                ? d._enter(null, d)
                                                : d._leave(null, d);
                                    } else {
                                        if (
                                            a(this.getTipElement()).hasClass(
                                                o.SHOW
                                            )
                                        )
                                            return void this._leave(null, this);
                                        this._enter(null, this);
                                    }
                            }),
                            (r.dispose = function () {
                                clearTimeout(this._timeout),
                                    a.removeData(
                                        this.element,
                                        this.constructor.DATA_KEY
                                    ),
                                    a(this.element).off(
                                        this.constructor.EVENT_KEY
                                    ),
                                    a(this.element)
                                        .closest(".modal")
                                        .off("hide.bs.modal"),
                                    this.tip && a(this.tip).remove(),
                                    (this._isEnabled = null),
                                    (this._timeout = null),
                                    (this._hoverState = null),
                                    (this._activeTrigger = null),
                                    null !== this._popper &&
                                        this._popper.destroy(),
                                    (this._popper = null),
                                    (this.element = null),
                                    (this.config = null),
                                    (this.tip = null);
                            }),
                            (r.show = function () {
                                var b = this;
                                if ("none" === a(this.element).css("display"))
                                    throw new Error(
                                        "Please use show on visible elements"
                                    );
                                var d = a.Event(this.constructor.Event.SHOW);
                                if (this.isWithContent() && this._isEnabled) {
                                    a(this.element).trigger(d);
                                    var e = a.contains(
                                        this.element.ownerDocument
                                            .documentElement,
                                        this.element
                                    );
                                    if (d.isDefaultPrevented() || !e) return;
                                    var f = this.getTipElement(),
                                        g = i.getUID(this.constructor.NAME);
                                    f.setAttribute("id", g),
                                        this.element.setAttribute(
                                            "aria-describedby",
                                            g
                                        ),
                                        this.setContent(),
                                        this.config.animation &&
                                            a(f).addClass(o.FADE);
                                    var h =
                                            "function" ==
                                            typeof this.config.placement
                                                ? this.config.placement.call(
                                                      this,
                                                      f,
                                                      this.element
                                                  )
                                                : this.config.placement,
                                        j = this._getAttachment(h);
                                    this.addAttachmentClass(j);
                                    var k =
                                        !1 === this.config.container
                                            ? document.body
                                            : a(document).find(
                                                  this.config.container
                                              );
                                    a(f).data(this.constructor.DATA_KEY, this),
                                        a.contains(
                                            this.element.ownerDocument
                                                .documentElement,
                                            this.tip
                                        ) || a(f).appendTo(k),
                                        a(this.element).trigger(
                                            this.constructor.Event.INSERTED
                                        ),
                                        (this._popper = new c(this.element, f, {
                                            placement: j,
                                            modifiers: {
                                                offset: {
                                                    offset: this.config.offset,
                                                },
                                                flip: {
                                                    behavior:
                                                        this.config
                                                            .fallbackPlacement,
                                                },
                                                arrow: { element: p.ARROW },
                                                preventOverflow: {
                                                    boundariesElement:
                                                        this.config.boundary,
                                                },
                                            },
                                            onCreate: function (a) {
                                                a.originalPlacement !==
                                                    a.placement &&
                                                    b._handlePopperPlacementChange(
                                                        a
                                                    );
                                            },
                                            onUpdate: function (a) {
                                                b._handlePopperPlacementChange(
                                                    a
                                                );
                                            },
                                        })),
                                        a(f).addClass(o.SHOW),
                                        "ontouchstart" in
                                            document.documentElement &&
                                            a(document.body)
                                                .children()
                                                .on("mouseover", null, a.noop);
                                    var l = function () {
                                        b.config.animation &&
                                            b._fixTransition();
                                        var c = b._hoverState;
                                        (b._hoverState = null),
                                            a(b.element).trigger(
                                                b.constructor.Event.SHOWN
                                            ),
                                            c === m.OUT && b._leave(null, b);
                                    };
                                    if (a(this.tip).hasClass(o.FADE)) {
                                        var n =
                                            i.getTransitionDurationFromElement(
                                                this.tip
                                            );
                                        a(this.tip)
                                            .one(i.TRANSITION_END, l)
                                            .emulateTransitionEnd(n);
                                    } else l();
                                }
                            }),
                            (r.hide = function (b) {
                                var c = this,
                                    d = this.getTipElement(),
                                    e = a.Event(this.constructor.Event.HIDE),
                                    f = function () {
                                        c._hoverState !== m.SHOW &&
                                            d.parentNode &&
                                            d.parentNode.removeChild(d),
                                            c._cleanTipClass(),
                                            c.element.removeAttribute(
                                                "aria-describedby"
                                            ),
                                            a(c.element).trigger(
                                                c.constructor.Event.HIDDEN
                                            ),
                                            null !== c._popper &&
                                                c._popper.destroy(),
                                            b && b();
                                    };
                                if (
                                    (a(this.element).trigger(e),
                                    !e.isDefaultPrevented())
                                ) {
                                    if (
                                        (a(d).removeClass(o.SHOW),
                                        "ontouchstart" in
                                            document.documentElement &&
                                            a(document.body)
                                                .children()
                                                .off("mouseover", null, a.noop),
                                        (this._activeTrigger[q.CLICK] = !1),
                                        (this._activeTrigger[q.FOCUS] = !1),
                                        (this._activeTrigger[q.HOVER] = !1),
                                        a(this.tip).hasClass(o.FADE))
                                    ) {
                                        var g =
                                            i.getTransitionDurationFromElement(
                                                d
                                            );
                                        a(d)
                                            .one(i.TRANSITION_END, f)
                                            .emulateTransitionEnd(g);
                                    } else f();
                                    this._hoverState = "";
                                }
                            }),
                            (r.update = function () {
                                null !== this._popper &&
                                    this._popper.scheduleUpdate();
                            }),
                            (r.isWithContent = function () {
                                return Boolean(this.getTitle());
                            }),
                            (r.addAttachmentClass = function (b) {
                                a(this.getTipElement()).addClass(
                                    "bs-tooltip-" + b
                                );
                            }),
                            (r.getTipElement = function () {
                                return (
                                    (this.tip =
                                        this.tip || a(this.config.template)[0]),
                                    this.tip
                                );
                            }),
                            (r.setContent = function () {
                                var b = this.getTipElement();
                                this.setElementContent(
                                    a(b.querySelectorAll(p.TOOLTIP_INNER)),
                                    this.getTitle()
                                ),
                                    a(b).removeClass(o.FADE + " " + o.SHOW);
                            }),
                            (r.setElementContent = function (b, c) {
                                var d = this.config.html;
                                "object" == typeof c && (c.nodeType || c.jquery)
                                    ? d
                                        ? a(c).parent().is(b) ||
                                          b.empty().append(c)
                                        : b.text(a(c).text())
                                    : b[d ? "html" : "text"](c);
                            }),
                            (r.getTitle = function () {
                                var a = this.element.getAttribute(
                                    "data-original-title"
                                );
                                return (
                                    a ||
                                        (a =
                                            "function" ==
                                            typeof this.config.title
                                                ? this.config.title.call(
                                                      this.element
                                                  )
                                                : this.config.title),
                                    a
                                );
                            }),
                            (r._getAttachment = function (a) {
                                return k[a.toUpperCase()];
                            }),
                            (r._setListeners = function () {
                                var b = this;
                                this.config.trigger
                                    .split(" ")
                                    .forEach(function (c) {
                                        if ("click" === c)
                                            a(b.element).on(
                                                b.constructor.Event.CLICK,
                                                b.config.selector,
                                                function (a) {
                                                    return b.toggle(a);
                                                }
                                            );
                                        else if (c !== q.MANUAL) {
                                            var d =
                                                    c === q.HOVER
                                                        ? b.constructor.Event
                                                              .MOUSEENTER
                                                        : b.constructor.Event
                                                              .FOCUSIN,
                                                e =
                                                    c === q.HOVER
                                                        ? b.constructor.Event
                                                              .MOUSELEAVE
                                                        : b.constructor.Event
                                                              .FOCUSOUT;
                                            a(b.element)
                                                .on(
                                                    d,
                                                    b.config.selector,
                                                    function (a) {
                                                        return b._enter(a);
                                                    }
                                                )
                                                .on(
                                                    e,
                                                    b.config.selector,
                                                    function (a) {
                                                        return b._leave(a);
                                                    }
                                                );
                                        }
                                        a(b.element)
                                            .closest(".modal")
                                            .on("hide.bs.modal", function () {
                                                return b.hide();
                                            });
                                    }),
                                    this.config.selector
                                        ? (this.config = g({}, this.config, {
                                              trigger: "manual",
                                              selector: "",
                                          }))
                                        : this._fixTitle();
                            }),
                            (r._fixTitle = function () {
                                var a = typeof this.element.getAttribute(
                                    "data-original-title"
                                );
                                (this.element.getAttribute("title") ||
                                    "string" !== a) &&
                                    (this.element.setAttribute(
                                        "data-original-title",
                                        this.element.getAttribute("title") || ""
                                    ),
                                    this.element.setAttribute("title", ""));
                            }),
                            (r._enter = function (b, c) {
                                var d = this.constructor.DATA_KEY;
                                return (
                                    (c = c || a(b.currentTarget).data(d)),
                                    c ||
                                        ((c = new this.constructor(
                                            b.currentTarget,
                                            this._getDelegateConfig()
                                        )),
                                        a(b.currentTarget).data(d, c)),
                                    b &&
                                        (c._activeTrigger[
                                            "focusin" === b.type
                                                ? q.FOCUS
                                                : q.HOVER
                                        ] = !0),
                                    a(c.getTipElement()).hasClass(o.SHOW) ||
                                    c._hoverState === m.SHOW
                                        ? void (c._hoverState = m.SHOW)
                                        : (clearTimeout(c._timeout),
                                          (c._hoverState = m.SHOW),
                                          c.config.delay && c.config.delay.show
                                              ? void (c._timeout = setTimeout(
                                                    function () {
                                                        c._hoverState ===
                                                            m.SHOW && c.show();
                                                    },
                                                    c.config.delay.show
                                                ))
                                              : void c.show())
                                );
                            }),
                            (r._leave = function (b, c) {
                                var d = this.constructor.DATA_KEY;
                                if (
                                    ((c = c || a(b.currentTarget).data(d)),
                                    c ||
                                        ((c = new this.constructor(
                                            b.currentTarget,
                                            this._getDelegateConfig()
                                        )),
                                        a(b.currentTarget).data(d, c)),
                                    b &&
                                        (c._activeTrigger[
                                            "focusout" === b.type
                                                ? q.FOCUS
                                                : q.HOVER
                                        ] = !1),
                                    !c._isWithActiveTrigger())
                                ) {
                                    if (
                                        (clearTimeout(c._timeout),
                                        (c._hoverState = m.OUT),
                                        !c.config.delay || !c.config.delay.hide)
                                    )
                                        return void c.hide();
                                    c._timeout = setTimeout(function () {
                                        c._hoverState === m.OUT && c.hide();
                                    }, c.config.delay.hide);
                                }
                            }),
                            (r._isWithActiveTrigger = function () {
                                for (var a in this._activeTrigger)
                                    if (this._activeTrigger[a]) return !0;
                                return !1;
                            }),
                            (r._getConfig = function (c) {
                                return (
                                    (c = g(
                                        {},
                                        this.constructor.Default,
                                        a(this.element).data(),
                                        "object" == typeof c && c ? c : {}
                                    )),
                                    "number" == typeof c.delay &&
                                        (c.delay = {
                                            show: c.delay,
                                            hide: c.delay,
                                        }),
                                    "number" == typeof c.title &&
                                        (c.title = c.title.toString()),
                                    "number" == typeof c.content &&
                                        (c.content = c.content.toString()),
                                    i.typeCheckConfig(
                                        b,
                                        c,
                                        this.constructor.DefaultType
                                    ),
                                    c
                                );
                            }),
                            (r._getDelegateConfig = function () {
                                var a = {};
                                if (this.config)
                                    for (var b in this.config)
                                        this.constructor.Default[b] !==
                                            this.config[b] &&
                                            (a[b] = this.config[b]);
                                return a;
                            }),
                            (r._cleanTipClass = function () {
                                var b = a(this.getTipElement()),
                                    c = b.attr("class").match(h);
                                null !== c &&
                                    c.length &&
                                    b.removeClass(c.join(""));
                            }),
                            (r._handlePopperPlacementChange = function (a) {
                                var b = a.instance;
                                (this.tip = b.popper),
                                    this._cleanTipClass(),
                                    this.addAttachmentClass(
                                        this._getAttachment(a.placement)
                                    );
                            }),
                            (r._fixTransition = function () {
                                var b = this.getTipElement(),
                                    c = this.config.animation;
                                null === b.getAttribute("x-placement") &&
                                    (a(b).removeClass(o.FADE),
                                    (this.config.animation = !1),
                                    this.hide(),
                                    this.show(),
                                    (this.config.animation = c));
                            }),
                            (f._jQueryInterface = function (b) {
                                return this.each(function () {
                                    var c = a(this).data("bs.tooltip"),
                                        d = "object" == typeof b && b;
                                    if (
                                        (c || !/dispose|hide/.test(b)) &&
                                        (c ||
                                            ((c = new f(this, d)),
                                            a(this).data("bs.tooltip", c)),
                                        "string" == typeof b)
                                    ) {
                                        if (void 0 === c[b])
                                            throw new TypeError(
                                                'No method named "' + b + '"'
                                            );
                                        c[b]();
                                    }
                                });
                            }),
                            e(f, null, [
                                {
                                    key: "VERSION",
                                    get: function () {
                                        return "4.1.3";
                                    },
                                },
                                {
                                    key: "Default",
                                    get: function () {
                                        return l;
                                    },
                                },
                                {
                                    key: "NAME",
                                    get: function () {
                                        return b;
                                    },
                                },
                                {
                                    key: "DATA_KEY",
                                    get: function () {
                                        return "bs.tooltip";
                                    },
                                },
                                {
                                    key: "Event",
                                    get: function () {
                                        return n;
                                    },
                                },
                                {
                                    key: "EVENT_KEY",
                                    get: function () {
                                        return d;
                                    },
                                },
                                {
                                    key: "DefaultType",
                                    get: function () {
                                        return j;
                                    },
                                },
                            ]),
                            f
                        );
                    })();
                return (
                    (a.fn[b] = r._jQueryInterface),
                    (a.fn[b].Constructor = r),
                    (a.fn[b].noConflict = function () {
                        return (a.fn[b] = f), r._jQueryInterface;
                    }),
                    r
                );
            })(b),
            q = (function (a) {
                var b = "popover",
                    c = ".bs.popover",
                    d = a.fn[b],
                    f = new RegExp("(^|\\s)bs-popover\\S+", "g"),
                    i = g({}, p.Default, {
                        placement: "right",
                        trigger: "click",
                        content: "",
                        template:
                            '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
                    }),
                    j = g({}, p.DefaultType, {
                        content: "(string|element|function)",
                    }),
                    k = { FADE: "fade", SHOW: "show" },
                    l = { TITLE: ".popover-header", CONTENT: ".popover-body" },
                    m = {
                        HIDE: "hide" + c,
                        HIDDEN: "hidden" + c,
                        SHOW: "show" + c,
                        SHOWN: "shown" + c,
                        INSERTED: "inserted" + c,
                        CLICK: "click" + c,
                        FOCUSIN: "focusin" + c,
                        FOCUSOUT: "focusout" + c,
                        MOUSEENTER: "mouseenter" + c,
                        MOUSELEAVE: "mouseleave" + c,
                    },
                    n = (function (d) {
                        function g() {
                            return d.apply(this, arguments) || this;
                        }
                        h(g, d);
                        var n = g.prototype;
                        return (
                            (n.isWithContent = function () {
                                return this.getTitle() || this._getContent();
                            }),
                            (n.addAttachmentClass = function (b) {
                                a(this.getTipElement()).addClass(
                                    "bs-popover-" + b
                                );
                            }),
                            (n.getTipElement = function () {
                                return (
                                    (this.tip =
                                        this.tip || a(this.config.template)[0]),
                                    this.tip
                                );
                            }),
                            (n.setContent = function () {
                                var b = a(this.getTipElement());
                                this.setElementContent(
                                    b.find(l.TITLE),
                                    this.getTitle()
                                );
                                var c = this._getContent();
                                "function" == typeof c &&
                                    (c = c.call(this.element)),
                                    this.setElementContent(
                                        b.find(l.CONTENT),
                                        c
                                    ),
                                    b.removeClass(k.FADE + " " + k.SHOW);
                            }),
                            (n._getContent = function () {
                                return (
                                    this.element.getAttribute("data-content") ||
                                    this.config.content
                                );
                            }),
                            (n._cleanTipClass = function () {
                                var b = a(this.getTipElement()),
                                    c = b.attr("class").match(f);
                                null !== c &&
                                    c.length > 0 &&
                                    b.removeClass(c.join(""));
                            }),
                            (g._jQueryInterface = function (b) {
                                return this.each(function () {
                                    var c = a(this).data("bs.popover"),
                                        d = "object" == typeof b ? b : null;
                                    if (
                                        (c || !/destroy|hide/.test(b)) &&
                                        (c ||
                                            ((c = new g(this, d)),
                                            a(this).data("bs.popover", c)),
                                        "string" == typeof b)
                                    ) {
                                        if (void 0 === c[b])
                                            throw new TypeError(
                                                'No method named "' + b + '"'
                                            );
                                        c[b]();
                                    }
                                });
                            }),
                            e(g, null, [
                                {
                                    key: "VERSION",
                                    get: function () {
                                        return "4.1.3";
                                    },
                                },
                                {
                                    key: "Default",
                                    get: function () {
                                        return i;
                                    },
                                },
                                {
                                    key: "NAME",
                                    get: function () {
                                        return b;
                                    },
                                },
                                {
                                    key: "DATA_KEY",
                                    get: function () {
                                        return "bs.popover";
                                    },
                                },
                                {
                                    key: "Event",
                                    get: function () {
                                        return m;
                                    },
                                },
                                {
                                    key: "EVENT_KEY",
                                    get: function () {
                                        return c;
                                    },
                                },
                                {
                                    key: "DefaultType",
                                    get: function () {
                                        return j;
                                    },
                                },
                            ]),
                            g
                        );
                    })(p);
                return (
                    (a.fn[b] = n._jQueryInterface),
                    (a.fn[b].Constructor = n),
                    (a.fn[b].noConflict = function () {
                        return (a.fn[b] = d), n._jQueryInterface;
                    }),
                    n
                );
            })(b),
            r = (function (a) {
                var b = "scrollspy",
                    c = a.fn[b],
                    d = { offset: 10, method: "auto", target: "" },
                    f = {
                        offset: "number",
                        method: "string",
                        target: "(string|element)",
                    },
                    h = {
                        ACTIVATE: "activate.bs.scrollspy",
                        SCROLL: "scroll.bs.scrollspy",
                        LOAD_DATA_API: "load.bs.scrollspy.data-api",
                    },
                    j = {
                        DROPDOWN_ITEM: "dropdown-item",
                        DROPDOWN_MENU: "dropdown-menu",
                        ACTIVE: "active",
                    },
                    k = {
                        DATA_SPY: '[data-spy="scroll"]',
                        ACTIVE: ".active",
                        NAV_LIST_GROUP: ".nav, .list-group",
                        NAV_LINKS: ".nav-link",
                        NAV_ITEMS: ".nav-item",
                        LIST_ITEMS: ".list-group-item",
                        DROPDOWN: ".dropdown",
                        DROPDOWN_ITEMS: ".dropdown-item",
                        DROPDOWN_TOGGLE: ".dropdown-toggle",
                    },
                    l = { OFFSET: "offset", POSITION: "position" },
                    m = (function () {
                        function c(b, c) {
                            var d = this;
                            (this._element = b),
                                (this._scrollElement =
                                    "BODY" === b.tagName ? window : b),
                                (this._config = this._getConfig(c)),
                                (this._selector =
                                    this._config.target +
                                    " " +
                                    k.NAV_LINKS +
                                    "," +
                                    this._config.target +
                                    " " +
                                    k.LIST_ITEMS +
                                    "," +
                                    this._config.target +
                                    " " +
                                    k.DROPDOWN_ITEMS),
                                (this._offsets = []),
                                (this._targets = []),
                                (this._activeTarget = null),
                                (this._scrollHeight = 0),
                                a(this._scrollElement).on(
                                    h.SCROLL,
                                    function (a) {
                                        return d._process(a);
                                    }
                                ),
                                this.refresh(),
                                this._process();
                        }
                        var m = c.prototype;
                        return (
                            (m.refresh = function () {
                                var b = this,
                                    c =
                                        this._scrollElement ===
                                        this._scrollElement.window
                                            ? l.OFFSET
                                            : l.POSITION,
                                    d =
                                        "auto" === this._config.method
                                            ? c
                                            : this._config.method,
                                    e =
                                        d === l.POSITION
                                            ? this._getScrollTop()
                                            : 0;
                                (this._offsets = []),
                                    (this._targets = []),
                                    (this._scrollHeight =
                                        this._getScrollHeight()),
                                    [].slice
                                        .call(
                                            document.querySelectorAll(
                                                this._selector
                                            )
                                        )
                                        .map(function (b) {
                                            var c,
                                                f = i.getSelectorFromElement(b);
                                            if (
                                                (f &&
                                                    (c =
                                                        document.querySelector(
                                                            f
                                                        )),
                                                c)
                                            ) {
                                                var g =
                                                    c.getBoundingClientRect();
                                                if (g.width || g.height)
                                                    return [
                                                        a(c)[d]().top + e,
                                                        f,
                                                    ];
                                            }
                                            return null;
                                        })
                                        .filter(function (a) {
                                            return a;
                                        })
                                        .sort(function (a, b) {
                                            return a[0] - b[0];
                                        })
                                        .forEach(function (a) {
                                            b._offsets.push(a[0]),
                                                b._targets.push(a[1]);
                                        });
                            }),
                            (m.dispose = function () {
                                a.removeData(this._element, "bs.scrollspy"),
                                    a(this._scrollElement).off(".bs.scrollspy"),
                                    (this._element = null),
                                    (this._scrollElement = null),
                                    (this._config = null),
                                    (this._selector = null),
                                    (this._offsets = null),
                                    (this._targets = null),
                                    (this._activeTarget = null),
                                    (this._scrollHeight = null);
                            }),
                            (m._getConfig = function (c) {
                                if (
                                    ((c = g(
                                        {},
                                        d,
                                        "object" == typeof c && c ? c : {}
                                    )),
                                    "string" != typeof c.target)
                                ) {
                                    var e = a(c.target).attr("id");
                                    e ||
                                        ((e = i.getUID(b)),
                                        a(c.target).attr("id", e)),
                                        (c.target = "#" + e);
                                }
                                return i.typeCheckConfig(b, c, f), c;
                            }),
                            (m._getScrollTop = function () {
                                return this._scrollElement === window
                                    ? this._scrollElement.pageYOffset
                                    : this._scrollElement.scrollTop;
                            }),
                            (m._getScrollHeight = function () {
                                return (
                                    this._scrollElement.scrollHeight ||
                                    Math.max(
                                        document.body.scrollHeight,
                                        document.documentElement.scrollHeight
                                    )
                                );
                            }),
                            (m._getOffsetHeight = function () {
                                return this._scrollElement === window
                                    ? window.innerHeight
                                    : this._scrollElement.getBoundingClientRect()
                                          .height;
                            }),
                            (m._process = function () {
                                var a =
                                        this._getScrollTop() +
                                        this._config.offset,
                                    b = this._getScrollHeight(),
                                    c =
                                        this._config.offset +
                                        b -
                                        this._getOffsetHeight();
                                if (
                                    (this._scrollHeight !== b && this.refresh(),
                                    a >= c)
                                ) {
                                    var d =
                                        this._targets[this._targets.length - 1];
                                    return void (
                                        this._activeTarget !== d &&
                                        this._activate(d)
                                    );
                                }
                                if (
                                    this._activeTarget &&
                                    a < this._offsets[0] &&
                                    this._offsets[0] > 0
                                )
                                    return (
                                        (this._activeTarget = null),
                                        void this._clear()
                                    );
                                for (
                                    var e = this._offsets.length, f = e;
                                    f--;

                                ) {
                                    this._activeTarget !== this._targets[f] &&
                                        a >= this._offsets[f] &&
                                        (void 0 === this._offsets[f + 1] ||
                                            a < this._offsets[f + 1]) &&
                                        this._activate(this._targets[f]);
                                }
                            }),
                            (m._activate = function (b) {
                                (this._activeTarget = b), this._clear();
                                var c = this._selector.split(",");
                                c = c.map(function (a) {
                                    return (
                                        a +
                                        '[data-target="' +
                                        b +
                                        '"],' +
                                        a +
                                        '[href="' +
                                        b +
                                        '"]'
                                    );
                                });
                                var d = a(
                                    [].slice.call(
                                        document.querySelectorAll(c.join(","))
                                    )
                                );
                                d.hasClass(j.DROPDOWN_ITEM)
                                    ? (d
                                          .closest(k.DROPDOWN)
                                          .find(k.DROPDOWN_TOGGLE)
                                          .addClass(j.ACTIVE),
                                      d.addClass(j.ACTIVE))
                                    : (d.addClass(j.ACTIVE),
                                      d
                                          .parents(k.NAV_LIST_GROUP)
                                          .prev(
                                              k.NAV_LINKS + ", " + k.LIST_ITEMS
                                          )
                                          .addClass(j.ACTIVE),
                                      d
                                          .parents(k.NAV_LIST_GROUP)
                                          .prev(k.NAV_ITEMS)
                                          .children(k.NAV_LINKS)
                                          .addClass(j.ACTIVE)),
                                    a(this._scrollElement).trigger(h.ACTIVATE, {
                                        relatedTarget: b,
                                    });
                            }),
                            (m._clear = function () {
                                var b = [].slice.call(
                                    document.querySelectorAll(this._selector)
                                );
                                a(b).filter(k.ACTIVE).removeClass(j.ACTIVE);
                            }),
                            (c._jQueryInterface = function (b) {
                                return this.each(function () {
                                    var d = a(this).data("bs.scrollspy"),
                                        e = "object" == typeof b && b;
                                    if (
                                        (d ||
                                            ((d = new c(this, e)),
                                            a(this).data("bs.scrollspy", d)),
                                        "string" == typeof b)
                                    ) {
                                        if (void 0 === d[b])
                                            throw new TypeError(
                                                'No method named "' + b + '"'
                                            );
                                        d[b]();
                                    }
                                });
                            }),
                            e(c, null, [
                                {
                                    key: "VERSION",
                                    get: function () {
                                        return "4.1.3";
                                    },
                                },
                                {
                                    key: "Default",
                                    get: function () {
                                        return d;
                                    },
                                },
                            ]),
                            c
                        );
                    })();
                return (
                    a(window).on(h.LOAD_DATA_API, function () {
                        for (
                            var b = [].slice.call(
                                    document.querySelectorAll(k.DATA_SPY)
                                ),
                                c = b.length,
                                d = c;
                            d--;

                        ) {
                            var e = a(b[d]);
                            m._jQueryInterface.call(e, e.data());
                        }
                    }),
                    (a.fn[b] = m._jQueryInterface),
                    (a.fn[b].Constructor = m),
                    (a.fn[b].noConflict = function () {
                        return (a.fn[b] = c), m._jQueryInterface;
                    }),
                    m
                );
            })(b),
            s = (function (a) {
                var b = a.fn.tab,
                    c = {
                        HIDE: "hide.bs.tab",
                        HIDDEN: "hidden.bs.tab",
                        SHOW: "show.bs.tab",
                        SHOWN: "shown.bs.tab",
                        CLICK_DATA_API: "click.bs.tab.data-api",
                    },
                    d = {
                        DROPDOWN_MENU: "dropdown-menu",
                        ACTIVE: "active",
                        DISABLED: "disabled",
                        FADE: "fade",
                        SHOW: "show",
                    },
                    f = {
                        DROPDOWN: ".dropdown",
                        NAV_LIST_GROUP: ".nav, .list-group",
                        ACTIVE: ".active",
                        ACTIVE_UL: "> li > .active",
                        DATA_TOGGLE:
                            '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]',
                        DROPDOWN_TOGGLE: ".dropdown-toggle",
                        DROPDOWN_ACTIVE_CHILD: "> .dropdown-menu .active",
                    },
                    g = (function () {
                        function b(a) {
                            this._element = a;
                        }
                        var g = b.prototype;
                        return (
                            (g.show = function () {
                                var b = this;
                                if (
                                    !(
                                        (this._element.parentNode &&
                                            this._element.parentNode
                                                .nodeType ===
                                                Node.ELEMENT_NODE &&
                                            a(this._element).hasClass(
                                                d.ACTIVE
                                            )) ||
                                        a(this._element).hasClass(d.DISABLED)
                                    )
                                ) {
                                    var e,
                                        g,
                                        h = a(this._element).closest(
                                            f.NAV_LIST_GROUP
                                        )[0],
                                        j = i.getSelectorFromElement(
                                            this._element
                                        );
                                    if (h) {
                                        var k =
                                            "UL" === h.nodeName
                                                ? f.ACTIVE_UL
                                                : f.ACTIVE;
                                        (g = a.makeArray(a(h).find(k))),
                                            (g = g[g.length - 1]);
                                    }
                                    var l = a.Event(c.HIDE, {
                                            relatedTarget: this._element,
                                        }),
                                        m = a.Event(c.SHOW, {
                                            relatedTarget: g,
                                        });
                                    if (
                                        (g && a(g).trigger(l),
                                        a(this._element).trigger(m),
                                        !m.isDefaultPrevented() &&
                                            !l.isDefaultPrevented())
                                    ) {
                                        j && (e = document.querySelector(j)),
                                            this._activate(this._element, h);
                                        var n = function () {
                                            var d = a.Event(c.HIDDEN, {
                                                    relatedTarget: b._element,
                                                }),
                                                e = a.Event(c.SHOWN, {
                                                    relatedTarget: g,
                                                });
                                            a(g).trigger(d),
                                                a(b._element).trigger(e);
                                        };
                                        e
                                            ? this._activate(e, e.parentNode, n)
                                            : n();
                                    }
                                }
                            }),
                            (g.dispose = function () {
                                a.removeData(this._element, "bs.tab"),
                                    (this._element = null);
                            }),
                            (g._activate = function (b, c, e) {
                                var g,
                                    h = this;
                                g =
                                    "UL" === c.nodeName
                                        ? a(c).find(f.ACTIVE_UL)
                                        : a(c).children(f.ACTIVE);
                                var j = g[0],
                                    k = e && j && a(j).hasClass(d.FADE),
                                    l = function () {
                                        return h._transitionComplete(b, j, e);
                                    };
                                if (j && k) {
                                    var m =
                                        i.getTransitionDurationFromElement(j);
                                    a(j)
                                        .one(i.TRANSITION_END, l)
                                        .emulateTransitionEnd(m);
                                } else l();
                            }),
                            (g._transitionComplete = function (b, c, e) {
                                if (c) {
                                    a(c).removeClass(d.SHOW + " " + d.ACTIVE);
                                    var g = a(c.parentNode).find(
                                        f.DROPDOWN_ACTIVE_CHILD
                                    )[0];
                                    g && a(g).removeClass(d.ACTIVE),
                                        "tab" === c.getAttribute("role") &&
                                            c.setAttribute("aria-selected", !1);
                                }
                                if (
                                    (a(b).addClass(d.ACTIVE),
                                    "tab" === b.getAttribute("role") &&
                                        b.setAttribute("aria-selected", !0),
                                    i.reflow(b),
                                    a(b).addClass(d.SHOW),
                                    b.parentNode &&
                                        a(b.parentNode).hasClass(
                                            d.DROPDOWN_MENU
                                        ))
                                ) {
                                    var h = a(b).closest(f.DROPDOWN)[0];
                                    if (h) {
                                        var j = [].slice.call(
                                            h.querySelectorAll(
                                                f.DROPDOWN_TOGGLE
                                            )
                                        );
                                        a(j).addClass(d.ACTIVE);
                                    }
                                    b.setAttribute("aria-expanded", !0);
                                }
                                e && e();
                            }),
                            (b._jQueryInterface = function (c) {
                                return this.each(function () {
                                    var d = a(this),
                                        e = d.data("bs.tab");
                                    if (
                                        (e ||
                                            ((e = new b(this)),
                                            d.data("bs.tab", e)),
                                        "string" == typeof c)
                                    ) {
                                        if (void 0 === e[c])
                                            throw new TypeError(
                                                'No method named "' + c + '"'
                                            );
                                        e[c]();
                                    }
                                });
                            }),
                            e(b, null, [
                                {
                                    key: "VERSION",
                                    get: function () {
                                        return "4.1.3";
                                    },
                                },
                            ]),
                            b
                        );
                    })();
                return (
                    a(document).on(
                        c.CLICK_DATA_API,
                        f.DATA_TOGGLE,
                        function (b) {
                            b.preventDefault(),
                                g._jQueryInterface.call(a(this), "show");
                        }
                    ),
                    (a.fn.tab = g._jQueryInterface),
                    (a.fn.tab.Constructor = g),
                    (a.fn.tab.noConflict = function () {
                        return (a.fn.tab = b), g._jQueryInterface;
                    }),
                    g
                );
            })(b);
        !(function (a) {
            if (void 0 === a)
                throw new TypeError(
                    "Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript."
                );
            var b = a.fn.jquery.split(" ")[0].split(".");
            if (
                (b[0] < 2 && b[1] < 9) ||
                (1 === b[0] && 9 === b[1] && b[2] < 1) ||
                b[0] >= 4
            )
                throw new Error(
                    "Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0"
                );
        })(b),
            (a.Util = i),
            (a.Alert = j),
            (a.Button = k),
            (a.Carousel = l),
            (a.Collapse = m),
            (a.Dropdown = n),
            (a.Modal = o),
            (a.Popover = q),
            (a.Scrollspy = r),
            (a.Tab = s),
            (a.Tooltip = p),
            Object.defineProperty(a, "__esModule", { value: !0 });
    });
