(function () {
    var t = "system-default", e = ["comment.verifydata", "comment.postsuccess", "comment.posterror"],
        n = {"comment.reply": "comment.reply.start", "userinfo.savefromhtml": "userinfo.readFromHtml"},
        o = function (o, r) {
            if ("undefined" == typeof jQuery && void 0 === r) throw new Error("No jQuery!");
            this.$ = r || window.jQuery, Object.keys || (Object.keys = function (t) {
                return this.$.map(t, function (t, e) {
                    return e
                })
            }), console || (window.console = {}, console.logs = [], console.log = console.error = console.warn = function () {
                console.logs.push(arguments)
            }), e = e.concat(Object.keys(n));
            var s = this;
            return i(this), o = o || {}, o.cookiepath = o.cookiepath || "/", o.bloghost = o.bloghost || location.origin, o.ajaxurl = o.ajaxurl || location.origin, o.commentmaxlength = o.commentmaxlength || 1e3, o.lang = o.lang || {}, o.comment = o.comment || {}, o.comment.inputs = o.comment.inputs || {}, o.comment.useDefaultEvents = o.comment.useDefaultEvents || !1, this.eachOnCommentInputs = function (t) {
                return s.$.each(o.comment.inputs, t)
            }, this.eachOnCommentInputs(function (t, e) {
                !e.getter && e.selector && (e.getter = function () {
                    return s.$(e.selector).val()
                }), !e.setter && e.selector && (e.setter = function (t) {
                    return s.$(e.selector).val(t)
                }), e.validator || (e.validator = function (t, n) {
                    for (t = t || e.getter(); ;) {
                        if (t = t || "", t = t.toString().trim(), "" === t) {
                            if (e.required) break;
                            return n(null)
                        }
                        if (e.validateRule && (e.validateRule.lastIndex = 0, !e.validateRule.test(t))) break;
                        return n(null)
                    }
                    var o = new Error(e.validateFailedMessage || s.options.lang.error[e.validateFailedErrorCode]);
                    return o.code = e.validateFailedErrorCode, n(o)
                })
            }), this.options = o, this.plugin.on("userinfo.output", "system", function () {
                s.eachOnCommentInputs(function (t, e) {
                    e.saveLocally && (s.userinfo[t] = s.cookie.get("zbp_userinfo_" + t), s.userinfo[t] && e.setter(s.userinfo[t]))
                })
            }), this.plugin.on("userinfo.readFromHtml", "system", function () {
                s.eachOnCommentInputs(function (t, e) {
                    e.saveLocally && (s.userinfo[t] = e.getter())
                }), s.userinfo.save()
            }), this.plugin.on("userinfo.save", "system", function () {
                s.eachOnCommentInputs(function (t, e) {
                    e.saveLocally && (s.userinfo[t] = e.getter(), s.cookie.set("zbp_userinfo_" + t, s.userinfo[t]))
                })
            }), this.plugin.on("comment.get", "system", function (t, e) {
                s.$.get(s.options.bloghost + "zb_system/cmd.php?act=getcmt&postid=" + t + "&page=" + e, function (n, o, i) {
                    s.plugin.emit("comment.got", [t, e], n, o, i)
                })
            }), this.plugin.on("comment.post.validate", "system", function (t) {
                var e = 0, n = !1, o = function (o) {
                    if (!n) {
                        if (o) return n = !0, void s.plugin.emit("comment.post.validate.error", o, t);
                        if (e++, e === Object.keys(s.options.comment.inputs).length) {
                            var i = {no: 0, msg: ""};
                            if (s.plugin.emit("comment.verifydata", i, t), i.no > 0) {
                                o = new Error(i.msg);
                                return o.code = i.no, void s.plugin.emit("comment.post.validate.error", o, t)
                            }
                            s.plugin.emit("comment.post.validate.success", t)
                        }
                    }
                };
                s.eachOnCommentInputs(function (e, n) {
                    n.validator(t[e], o)
                })
            }), this.plugin.on("comment.post.start", "system", function (t) {
                s.eachOnCommentInputs(function (e, n) {
                    t[e] = t[e] || n.getter()
                }), t.commentKey = (new Date).getTime() + "" + Math.random(), s.plugin.emit("comment.post.validate", t)
            }), this.plugin.on("comment.post.validate.error", "system", function (t, e) {
                s.plugin.emit("comment.post.error", t, e)
            }), this.plugin.on("comment.post.validate.success", "system", function (t) {
                s.$.post(t.action, t).done(function (e, n, o) {
                    s.plugin.emit("comment.postsuccess", t, e, n, o);
                    var i = s.$.parseJSON(e);
                    if (i.err && i.err.code > 0) {
                        var r = new Error(i.err.msg);
                        r.code = i.err.code, s.plugin.emit("comment.post.error", r, t, i, n, o)
                    } else s.plugin.emit("comment.post.success", t, i, n, o)
                }).fail(function (e, n) {
                    var o = new Error(n);
                    o.code = 255, s.plugin.emit("comment.post.error", o, t, n, e)
                })
            }), this.plugin.on("comment.post.success", "system", function (t, e, n, o) {
                s.plugin.emit("comment.post.done", null, t, e, n, o)
            }), this.plugin.on("comment.post.error", "system", function (t, e, n, o, i) {
                s.plugin.emit("comment.posterror", {
                    jqXHR: i,
                    msg: t.message,
                    code: t.code
                }, e), s.plugin.emit("comment.post.done", t, e, n, o, i)
            }), this.options.comment.useDefaultEvents && (this.plugin.on("comment.reply.start", t, function (t) {
                this.$("#inpRevID").val(t), this.$("#cancel-reply").show().bind("click", function () {
                    return s.plugin.emit("comment.reply.cancel"), s.$("#inpRevID").val(0), s.$(this).hide(), window.location.hash = "#comment", !1
                }), window.location.hash = "#comment"
            }), this.plugin.on("comment.got", t, function (t, e, n, o) {
                this.$("#AjaxCommentBegin").nextUntil("#AjaxCommentEnd").remove(), this.$("#AjaxCommentBegin").after(e)
            }), this.plugin.on("comment.post.start", t, function () {
                var t = s.$("#inpId").parent("form").find(":submit");
                t.data("orig", t.val()).val("Waiting...").attr("disabled", "disabled").addClass("loading")
            }), this.plugin.on("comment.post.done", t, function (t) {
                var e = s.$("#inpId").parent("form").find(":submit");
                e.removeClass("loading").removeAttr("disabled"), e.data("orig") && e.val(e.data("orig"))
            }), this.plugin.on("comment.post.success", t, function (t, e, n, o) {
                "0" === t.replyid.toString() ? this.$(e.data.html).insertAfter("#AjaxCommentBegin") : this.$(e.data.html).insertAfter("#AjaxComment" + t.replyid), location.hash = "#cmt" + e.data.ID, this.$("#txaArticle").val(""), this.userinfo.readFromHtml()
            }), this.plugin.on("comment.post.error", t, function (t) {
                throw alert(t.message), new Error("ERROR - " + t.message)
            })), this
        };
    o.prototype._plugins = {};
    var i = function (o) {
        o.utils = {}, o.utils.getFromIndex = function (t, e) {
            for (var n = [], o = t; o < e.length; o++) n.push(e[o]);
            return n
        };
        var i = function () {
        };
        i.prototype.checkIsInterfaceDeprecated = function (t) {
            return e.indexOf(t) >= 0 && (console.warn("Interface '" + t + "' is deprecated in ZBP 1.6, please update your plugin or theme!"), !0)
        }, i.prototype.bind = i.prototype.on = i.prototype.addListener = function (t, e, i) {
            return this.checkIsInterfaceDeprecated(t) && n[t] && (t = n[t]), void 0 === o._plugins[t] && (o._plugins[t] = {}), o._plugins[t][e] = i, o
        }, i.prototype.unbind = i.prototype.removeListener = function (e, i) {
            return i || (i = ""), this.checkIsInterfaceDeprecated(e) && "system" === i && (i = t, n[e] && (e = n[e])), "" === i ? o._plugins[e] = {} : o._plugins[e] && (o._plugins[e][i] = null, delete o._plugins[e][i]), o
        }, i.prototype.emit = function (t) {
            var e = o.utils.getFromIndex(1, arguments);
            for (var n in o._plugins[t]) o._plugins[t][n].apply(o, e);
            return o
        }, i.prototype.listenerCount = function (t) {
            return Object.keys(o._plugins[t])
        }, o.plugin = new i;
        var r = function () {
        };
        r.prototype.get = function (t) {
            var e = document.cookie.match(new RegExp("(^| )" + t + "=([^;]*)(;|$)"));
            return e ? unescape(e[2]) : null
        }, r.prototype.set = function (t, e, n) {
            var i = new Date;
            return n && i.setTime(i.getTime() + parseInt(24 * n * 60 * 60 * 1e3)), document.cookie = t + "=" + escape(e) + "; " + (n ? "expires=" + i.toGMTString() + "; " : "") + "path=" + o.options.cookiepath, o
        }, o.cookie = new r;
        var s = function () {
        };
        s.prototype.output = function () {
            return o.plugin.emit("userinfo.output"), o
        }, s.prototype.save = function () {
            return o.plugin.emit("userinfo.save"), o
        }, s.prototype.saveFromHtml = s.prototype.readFromHtml = function () {
            return o.plugin.emit("userinfo.readFromHtml"), o
        }, o.userinfo = new s;
        var u = function () {
        };
        u.prototype.get = function (t, e) {
            o.plugin.emit("comment.get", t, e)
        }, u.prototype.reply = function (t) {
            o.plugin.emit("comment.reply.start", t)
        }, u.prototype.post = function (t) {
            t = t || {};
            try {
                o.plugin.emit("comment.post.start", t)
            } catch (t) {
                console.error(t)
            }
            return !1
        }, o.comment = new u
    };
    "function" == typeof define && define.amd ? define("zbp", [], function () {
        return o
    }) : "function" == typeof define && define.cmd ? define("zbp", [], function (t, e, n) {
        n.exports = o
    }) : "undefined" != typeof module ? module.exports = o : window.ZBP = o
})();

