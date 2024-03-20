zbp.plugin.unbind("comment.reply.start", "system");
zbp.plugin.on("comment.reply.start", "quietlee", function (d) {
    var M = d;
    $("#inpRevID").val(M);
    var c = $("#comt-respond");
    var P = $("#cancel-reply");
    c.before($("<div id='temp-frm' style='display:none'>")).addClass("reply-frm");
    $("#AjaxComment" + M).before(c);
    c.addClass("");
    P.show().click(function () {
        var d = $("#temp-frm");
        $("#inpRevID").val(0);
        if (!d.length || !c.length) return d.before(c);
        d.remove();
        $(this).hide();
        c.removeClass("");
        $(".commentlist").before(c);
        return false
    });
    try {
        $("#txaArticle").focus()
    } catch (d) {
    }
    return false
});
zbp.plugin.on("comment.get", "quietlee", function (d, M) {
    $(".com-page").html("Waiting...")
});
zbp.plugin.on("comment.got", "quietlee", function () {
    UBBFace();
    $("#cancel-reply").click()
});
zbp.plugin.on("comment.post.success", "quietlee", function () {
    $("#cancel-reply").click()
});

function addNumber(d) {
    document.getElementById("txaArticle").value += d
}

if ($("#comment-tools,.msgarticle,.comment-content").length) {
    objActive = "txaArticle";

    function InsertText(d, M, c) {
        if (M == "") {
            return ""
        }
        var P = document.getElementById(d);
        if (document.selection) {
            if (P.currPos) {
                if (c && P.value == "") {
                    P.currPos.text = M
                } else {
                    P.currPos.text += M
                }
            } else {
                P.value += M
            }
        } else {
            if (c) {
                P.value = P.value.slice(0, P.selectionStart) + M + P.value.slice(P.selectionEnd, P.value.length)
            } else {
                P.value = P.value.slice(0, P.selectionStart) + M + P.value.slice(P.selectionStart, P.value.length)
            }
        }
    }

    function ReplaceText(d, M, c) {
        var P = document.getElementById(d);
        var cj;
        if (document.selection && document.selection.type == "Text") {
            if (P.currPos) {
                var e = document.selection.createRange();
                e.text = M + e.text + c;
                return ""
            } else {
                cj = M + c;
                return cj
            }
        } else {
            if (P.selectionStart || P.selectionEnd) {
                cj = M + P.value.slice(P.selectionStart, P.selectionEnd) + c;
                return cj
            } else {
                cj = M + c;
                return cj
            }
        }
    }
}
if ($(".face-show").length) {
    $("a.face-show").click(function () {
        $(".ComtoolsFrame").slideToggle(15)
    })
}

function UBBFace() {
    if ($(".msgarticle,#divNewcomm,#divComments").length) {
        $(".msgarticle,#divNewcomm,#divComments").each(function d() {
            var M = $(this).html();
            M = M.replace(/\[B\](.*)\[\/B\]/g, "<strong>$1</strong>");
            M = M.replace(/\[U\](.*)\[\/U\]/g, "<u>$1</u>");
            M = M.replace(/\[S\](.*)\[\/S\]/g, "<del>$1</del>");
            M = M.replace(/\[I\](.*)\[\/I\]/g, "<em>$1</em>");
            M = M.replace(/\[([A-Za-z0-9]*)\]/g, '<img src="' + bloghost + '/zb_users/theme/cardslee/include/emotion/$1.png" alt="$1.png">');
            $(this).html(M)
        })
    }
}

// UBBFace();
// zbp.plugin.on("comment.post.success", "cardslee", function (d, M, c, P) {
//     $("#cancel-reply").click();
//     UBBFace()
// });
(function (d, M) {
    d(function () {
        var M = d("#cundang"), c = d(".al_mon_list.item h3", M), P = d(".al_post_list", M),
            cj = d(".al_post_list:first,.al_mon_list.item:nth-child(2) ul.al_post_list", M);
        P.hide();
        cj.show();
        c.css("cursor", "pointer").on("click", function () {
            d(this).next().slideToggle(0)
        });
        var e = function (d, M, c) {
            if (d > P.length) {
                return
            }
            if (M == "up") {
                P.eq(d).slideUp(c, function () {
                    e(d + 1, M, c - 10 < 1 ? 0 : c - 10)
                })
            } else {
                P.eq(d).slideDown(c, function () {
                    e(d + 1, M, c - 10 < 1 ? 0 : c - 10)
                })
            }
        };
        d("#al_expand_collapse").on("click", function (M) {
            M.preventDefault();
            if (d(this).data("s")) {
                d(this).data("s", "");
                e(0, "up", 300)
            } else {
                d(this).data("s", 1);
                e(0, "down", 300)
            }
        })
    })
})(jQuery, window);
(function (d) {
    d.fn.lazyload = function (M) {
        var c = {threshold: 0, failurelimit: 0, event: "scroll", effect: "show", container: window};
        if (M) {
            d.extend(c, M)
        }
        var P = this;
        if ("scroll" == c.event) {
            d(c.container).bind("scroll", function (M) {
                var cj = 0;
                P.each(function () {
                    if (d.abovethetop(this, c) || d.leftofbegin(this, c)) {
                    } else if (!d.belowthefold(this, c) && !d.rightoffold(this, c)) {
                        d(this).trigger("appear")
                    } else {
                        if (cj++ > c.failurelimit) {
                            return false
                        }
                    }
                });
                var e = d.grep(P, function (d) {
                    return !d.loaded
                });
                P = d(e)
            })
        }
        this.each(function () {
            var M = this;
            if (undefined == d(M).attr("original")) {
                d(M).attr("original", d(M).attr("src"))
            }
            if ("scroll" != c.event || undefined == d(M).attr("src") || c.placeholder == d(M).attr("src") || (d.abovethetop(M, c) || d.leftofbegin(M, c) || d.belowthefold(M, c) || d.rightoffold(M, c))) {
                if (c.placeholder) {
                    d(M).attr("src", c.placeholder)
                } else {
                    d(M).removeAttr("src")
                }
                M.loaded = false
            } else {
                M.loaded = true
            }
            d(M).one("appear", function () {
                if (!this.loaded) {
                    d("<img />").bind("load", function () {
                        d(M).hide().attr("src", d(M).attr("original"))[c.effect](c.effectspeed);
                        M.loaded = true
                    }).attr("src", d(M).attr("original"))
                }
            });
            if ("scroll" != c.event) {
                d(M).bind(c.event, function (c) {
                    if (!M.loaded) {
                        d(M).trigger("appear")
                    }
                })
            }
        });
        d(c.container).trigger(c.event);
        return this
    };
    d.belowthefold = function (M, c) {
        if (c.container === undefined || c.container === window) {
            var P = d(window).height() + d(window).scrollTop()
        } else {
            var P = d(c.container).offset().top + d(c.container).height()
        }
        return P <= d(M).offset().top - c.threshold
    };
    d.rightoffold = function (M, c) {
        if (c.container === undefined || c.container === window) {
            var P = d(window).width() + d(window).scrollLeft()
        } else {
            var P = d(c.container).offset().left + d(c.container).width()
        }
        return P <= d(M).offset().left - c.threshold
    };
    d.abovethetop = function (M, c) {
        if (c.container === undefined || c.container === window) {
            var P = d(window).scrollTop()
        } else {
            var P = d(c.container).offset().top
        }
        return P >= d(M).offset().top + c.threshold + d(M).height()
    };
    d.leftofbegin = function (M, c) {
        if (c.container === undefined || c.container === window) {
            var P = d(window).scrollLeft()
        } else {
            var P = d(c.container).offset().left
        }
        return P >= d(M).offset().left + c.threshold + d(M).width()
    };
    d.extend(d.expr[":"], {
        "below-the-fold": "$.belowthefold(a, {threshold : 0, container: window})",
        "above-the-fold": "!$.belowthefold(a, {threshold : 0, container: window})",
        "right-of-fold": "$.rightoffold(a, {threshold : 0, container: window})",
        "left-of-fold": "!$.rightoffold(a, {threshold : 0, container: window})"
    })
})(jQuery);
$(function () {
    $(".top_list_text li:first-child").addClass("on");
    $(".top_list_text li").hover(function () {
        $(this).addClass("on").siblings().removeClass("on")
    });
    $("img.lazy").lazyload({
        placeholder: bloghost + "zb_users/theme/cardslee/style/images/grey.gif",
        effect: "fadeIn",
        threshold: 200,
        failurelimit: 30
    })
});
jQuery(document).ready(function (d) {
    d("#font-change span").click(function () {
        var M = ".single-entry p";
        var c = 1;
        var P = 15;
        var cj = d(M).css("fontSize");
        var e = parseFloat(cj, 10);
        var G = cj.slice(-2);
        var dh = d(this).attr("id");
        switch (dh) {
            case"font-dec":
                e -= c;
                break;
            case"font-inc":
                e += c;
                break;
            default:
                e = P
        }
        d(M).css("fontSize", e + G);
        return false
    })
});
(function (d) {
    d.fn.theiaStickySidebar = function (M) {
        var c = {
            containerSelector: "",
            additionalMarginTop: 0,
            additionalMarginBottom: 0,
            updateSidebarHeight: true,
            minWidth: 0,
            disableOnResponsiveLayouts: true,
            sidebarBehavior: "modern"
        };
        M = d.extend(c, M);
        M.additionalMarginTop = parseInt(M.additionalMarginTop) || 0;
        M.additionalMarginBottom = parseInt(M.additionalMarginBottom) || 0;
        P(M, this);

        function P(M, c) {
            var P = cj(M, c);
            if (!P) {
                console.log("TST: Body width smaller than options.minWidth. Init is delayed.");
                d(document).scroll(function (M, c) {
                    return function (P) {
                        var e = cj(M, c);
                        if (e) {
                            d(this).unbind(P)
                        }
                    }
                }(M, c));
                d(window).resize(function (M, c) {
                    return function (P) {
                        var e = cj(M, c);
                        if (e) {
                            d(this).unbind(P)
                        }
                    }
                }(M, c))
            }
        }

        function cj(M, c) {
            if (M.initialized === true) {
                return true
            }
            if (d("body").width() < M.minWidth) {
                return false
            }
            e(M, c);
            return true
        }

        function e(M, c) {
            M.initialized = true;
            d("head").append(d('<style>.theiaStickySidebar:after {content: ""; display: table; clear: both;}</style>'));
            c.each(function () {
                var c = {};
                c.sidebar = d(this);
                c.options = M || {};
                c.container = d(c.options.containerSelector);
                if (c.container.length == 0) {
                    c.container = c.sidebar.parent()
                }
                c.sidebar.parents().css("-webkit-transform", "none");
                c.sidebar.css({
                    position: "relative",
                    overflow: "visible",
                    "-webkit-box-sizing": "border-box",
                    "-moz-box-sizing": "border-box",
                    "box-sizing": "border-box"
                });
                c.stickySidebar = c.sidebar.find(".theiaStickySidebar");
                if (c.stickySidebar.length == 0) {
                    var P = /(?:text|application)\/(?:x-)?(?:javascript|ecmascript)/i;
                    c.sidebar.find("script").filter(function (d, M) {
                        return M.type.length === 0 || M.type.match(P)
                    }).remove();
                    c.stickySidebar = d("<div>").addClass("theiaStickySidebar").append(c.sidebar.children());
                    c.sidebar.append(c.stickySidebar)
                }
                c.marginTop = parseInt(c.sidebar.css("margin-top"));
                c.marginBottom = parseInt(c.sidebar.css("margin-bottom"));
                c.paddingTop = parseInt(c.sidebar.css("padding-top"));
                c.paddingBottom = parseInt(c.sidebar.css("padding-bottom"));
                var cj = c.stickySidebar.offset().top;
                var e = c.stickySidebar.outerHeight();
                c.stickySidebar.css("padding-top", 0);
                c.stickySidebar.css("padding-bottom", 0);
                cj -= c.stickySidebar.offset().top;
                e = c.stickySidebar.outerHeight() - e - cj;
                if (cj == 0) {
                    c.stickySidebar.css("padding-top", 0);
                    c.stickySidebarPaddingTop = 0
                } else {
                    c.stickySidebarPaddingTop = 0
                }
                if (e == 0) {
                    c.stickySidebar.css("padding-bottom", 0);
                    c.stickySidebarPaddingBottom = 0
                } else {
                    c.stickySidebarPaddingBottom = 0
                }
                c.previousScrollTop = null;
                c.fixedScrollTop = 0;
                G();
                c.onScroll = function (c) {
                    if (!c.stickySidebar.is(":visible")) {
                        return
                    }
                    if (d("body").width() < c.options.minWidth) {
                        G();
                        return
                    }
                    if (c.options.disableOnResponsiveLayouts) {
                        var P = c.sidebar.outerWidth(c.sidebar.css("float") == "none");
                        if (P + 50 > c.container.width()) {
                            G();
                            return
                        }
                    }
                    var cj = d(document).scrollTop();
                    var e = "static";
                    if (cj >= c.container.offset().top + (c.paddingTop + c.marginTop - c.options.additionalMarginTop)) {
                        var f = c.paddingTop + c.marginTop + M.additionalMarginTop;
                        var R = c.paddingBottom + c.marginBottom + M.additionalMarginBottom;
                        var a = c.container.offset().top;
                        var T = c.container.offset().top + dh(c.container);
                        var dH = 0 + M.additionalMarginTop;
                        var b;
                        var Rb = c.stickySidebar.outerHeight() + f + R < d(window).height();
                        if (Rb) {
                            b = dH + c.stickySidebar.outerHeight()
                        } else {
                            b = d(window).height() - c.marginBottom - c.paddingBottom - M.additionalMarginBottom
                        }
                        var K = a - cj + c.paddingTop + c.marginTop;
                        var fK = T - cj - c.paddingBottom - c.marginBottom;
                        var cF = c.stickySidebar.offset().top - cj;
                        var g = c.previousScrollTop - cj;
                        if (c.stickySidebar.css("position") == "fixed") {
                            if (c.options.sidebarBehavior == "modern") {
                                cF += g
                            }
                        }
                        if (c.options.sidebarBehavior == "stick-to-top") {
                            cF = M.additionalMarginTop
                        }
                        if (c.options.sidebarBehavior == "stick-to-bottom") {
                            cF = b - c.stickySidebar.outerHeight()
                        }
                        if (g > 0) {
                            cF = Math.min(cF, dH)
                        } else {
                            cF = Math.max(cF, b - c.stickySidebar.outerHeight())
                        }
                        cF = Math.max(cF, K);
                        cF = Math.min(cF, fK - c.stickySidebar.outerHeight());
                        var Pe = c.container.height() == c.stickySidebar.outerHeight();
                        if (!Pe && cF == dH) {
                            e = "fixed"
                        } else if (!Pe && cF == b - c.stickySidebar.outerHeight()) {
                            e = "fixed"
                        } else if (cj + cF - c.sidebar.offset().top - c.paddingTop <= M.additionalMarginTop) {
                            e = "static"
                        } else {
                            e = "absolute"
                        }
                    }
                    if (e == "fixed") {
                        c.stickySidebar.css({
                            position: "fixed",
                            width: c.sidebar.width(),
                            top: cF,
                            left: c.sidebar.offset().left + parseInt(c.sidebar.css("padding-left"))
                        })
                    } else if (e == "absolute") {
                        var Th = {};
                        if (c.stickySidebar.css("position") != "absolute") {
                            Th.position = "absolute";
                            Th.top = cj + cF - c.sidebar.offset().top - c.stickySidebarPaddingTop - c.stickySidebarPaddingBottom
                        }
                        Th.width = c.sidebar.width();
                        Th.left = "";
                        c.stickySidebar.css(Th)
                    } else if (e == "static") {
                        G()
                    }
                    if (e != "static") {
                        if (c.options.updateSidebarHeight == true) {
                            c.sidebar.css({"min-height": c.stickySidebar.outerHeight() + c.stickySidebar.offset().top - c.sidebar.offset().top + c.paddingBottom})
                        }
                    }
                    c.previousScrollTop = cj
                };
                c.onScroll(c);
                d(document).scroll(function (d) {
                    return function () {
                        d.onScroll(d)
                    }
                }(c));
                d(window).resize(function (d) {
                    return function () {
                        d.stickySidebar.css({position: "static"});
                        d.onScroll(d)
                    }
                }(c));

                function G() {
                    c.fixedScrollTop = 0;
                    c.sidebar.css({"min-height": "0px"});
                    c.stickySidebar.css({position: "static", width: ""})
                }

                function dh(M) {
                    var c = M.height();
                    M.children().each(function () {
                        c = Math.max(c, d(this).height())
                    });
                    return c
                }
            })
        }
    }
})(jQuery);
$(document).ready(function () {
    $(".main-content .side").theiaStickySidebar({additionalMarginTop: 20, additionalMarginBottom: 10})
});
$(document).on("click", "#loadmore a:not(.noajx)", function () {
    var d = $(this);
    var M = d.attr("href").replace("?ajx=wrap", "");
    $(this).addClass("#loadmore").text("加载中...");
    $.ajax({
        url: M, beforeSend: function () {
        }, success: function (d) {
            $(".auto-side .auto-main").append($(d).find(".auto-list"));
            nextHref = $(d).find(".auto-side .loadmore a").attr("href");
            $("#loadmore a").removeClass("loading").text("点击加载更多");
            if (nextHref != undefined) {
                $("#loadmore").removeClass("loading");
                $(".auto-side .loadmore a").attr("href", nextHref)
            } else {
                $("#loadmore").removeClass("loading");
                $("#post_over").attr("href", "javascript:;").text("没有啦!!!").attr("class", "noajx load-more disabled")
            }
        }, complete: function () {
            $(".auto-list img").lazyload({
                placeholder: bloghost + "zb_users/theme/cardslee/style/images/grey.gif",
                failurelimit: 30
            })
        }, error: function () {
            location.href = M
        }
    });
    return false
});
jQuery(document).ready(function () {
    $("<span class='toggle-btn'><i class='icon font-chevron-down'></i></span>").insertBefore(".sub-menu");
    $("#list1,#list2,#list3,.widget:nth-child(1),.widget:nth-child(2)").removeClass("wow");
    $("#list1,#list2,#list3,.widget:nth-child(1),.widget:nth-child(2)").removeClass("fadeInDown");
    var d = $(".nav-sousuo,.search_top");
    $("i.top-search").click(function () {
        $(".m_searchform").slideToggle()
    });
    $(".nav-sjlogo i.nav-bar").click(function () {
        $(".nav-bar").toggleClass("on");
        $("body.home").toggleClass("cur");
        $(".mobile_nav").toggleClass("mobile_nav_on")
    });
    jQuery(".mobile_aside .nav-pills > li,.mobile_aside .nav-pills > li ul li").each(function () {
        jQuery(this).children(".mobile_aside .toggle-btn").bind("click", function () {
            $(".mobile_aside .sub-menu").addClass("active");
            jQuery(this).children().addClass(function () {
                if (jQuery(this).hasClass("active")) {
                    jQuery(this).removeClass("active");
                    return ""
                }
                return "active"
            });
            jQuery(this).siblings(".mobile_aside .sub-menu").slideToggle()
        })
    })
});
jQuery(document).ready(function (d) {
    var M = d(".nav-pills").attr("data-type");
    d(".nav-pills>li ").each(function () {
        try {
            var c = d(this).attr("id");
            if ("index" == M) {
                if (c == "nvabar-item-index") {
                    d("#nvabar-item-index").addClass("active")
                }
            } else if ("category" == M) {
                var P = d(".nav-pills").attr("data-infoid");
                if (P != null) {
                    var cj = P.split(" ");
                    for (var e = 0; e < cj.length; e++) {
                        if (c == "navbar-category-" + cj[e]) {
                            d("#navbar-category-" + cj[e] + "").addClass("active")
                        }
                    }
                }
            } else if ("article" == M) {
                var P = d(".nav-pills").attr("data-infoid");
                if (P != null) {
                    var cj = P.split(" ");
                    for (var e = 0; e < cj.length; e++) {
                        if (c == "navbar-category-" + cj[e]) {
                            d("#navbar-category-" + cj[e] + "").addClass("active")
                        }
                    }
                }
            } else if ("page" == M) {
                var P = d(".nav-pills").attr("data-infoid");
                if (P != null) {
                    if (c == "navbar-page-" + P) {
                        d("#navbar-page-" + P + "").addClass("active")
                    }
                }
            } else if ("tag" == M) {
                var P = d(".nav-pills").attr("data-infoid");
                if (P != null) {
                    if (c == "navbar-tag-" + P) {
                        d("#navbar-tag-" + P + "").addClass("active")
                    }
                }
            }
        } catch (d) {
        }
    });
    d(".nav-pills").delegate("a", "click", function () {
        d(".nav-pills>li").each(function () {
            d(this).removeClass("active")
        });
        if (d(this).closest("ul") != null && d(this).closest("ul").length != 0) {
            if (d(this).closest("ul").attr("id") == "menu-navigation") {
                d(this).addClass("active")
            } else {
                d(this).closest("ul").closest("li").addClass("active")
            }
        }
    })
});

function shareys(d, M, c, P, cj) {
    switch (d) {
        case"sina":
            M = "//service.weibo.com/share/share.php?title=" + encodeURIComponent("「" + c + "」" + cj + "阅读详情" + M) + "&pic=" + P;
            window.open(M);
            break;
        case"tqq":
            M = "//connect.qq.com/widget/shareqq/index.html?url=" + encodeURIComponent(M) + "&title=" + encodeURIComponent(c) + "&pics=" + P;
            window.open(M);
            break;
        case"qzone":
            M = "//sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=" + encodeURIComponent(M) + "&title=" + encodeURIComponent(c) + "&site=&pics=" + encodeURIComponent(P) + "&desc=" + encodeURIComponent(cj) + "&summary=" + encodeURIComponent(cj);
            window.open(M);
            break;
        case"ren":
            M = "//widget.renren.com/dialog/share?resourceUrl=" + encodeURIComponent(M) + "&srcUrl=" + P + "&title=" + encodeURIComponent(c), NaN + cj, window.open(M)
    }
}

$(document).keypress(function (d) {
    var M = $(".button");
    if (d.ctrlKey && d.which == 13 || d.which == 10) {
        M.click();
        document.body.focus();
        return
    }
    if (d.shiftKey && d.which == 13 || d.which == 10) M.click()
});
$(function () {
    $("#backtop").each(function () {
        $(this).find(".top").click(function () {
            $("html, body").animate({"scroll-top": 0}, "fast")
        });
        $(".bottom").click(function () {
            $("html, body").animate({scrollTop: $(".footer").offset().top}, 800);
            return false
        })
    });
    var d = false;
    $(window).scroll(function () {
        var M = $(window).scrollTop();
        if (M > 500) {
            $("#backtop").data("expanded", true)
        } else {
            $("#backtop").data("expanded", false)
        }
        if ($("#backtop").data("expanded") != d) {
            d = $("#backtop").data("expanded");
            if (d) {
                $("#backtop .top").slideDown()
            } else {
                $("#backtop .top").slideUp()
            }
        }
    })
});
$(function () {
    var d = $(".secnav");
    var M = $(document).scrollTop();
    var c = $(document);
    var P = $(".fixed-nav").outerHeight();
    $(window).scroll(function () {
        var cj = $(document).scrollTop();
        if (c.scrollTop() >= 0) {
            d.addClass("fixed-nav");
            $(".navTmp").fadeIn()
        } else {
            d.removeClass("fixed-nav fixed-enabled fixed-appear");
            $(".navTmp").fadeOut()
        }
        if (cj > P) {
            $(".fixed-nav").addClass("fixed-enabled")
        } else {
            $(".fixed-nav").removeClass("fixed-enabled")
        }
        if (cj > M) {
            $(".fixed-nav").removeClass("fixed-appear")
        } else {
            $(".fixed-nav").addClass("fixed-appear")
        }
        M = $(document).scrollTop()
    })
});
(function () {
    var d = $(document);
    var M = $("#divTags ul li");
    M.each(function () {
        var d = 10;
        var M = 0;
        var c = parseInt(Math.random() * (d - M + 1) + M);
        $(this).addClass("divTags" + c)
    })
})();

function switchNightMode() {
    if (zbp.cookie.get("night") == "1" || $("body").hasClass("night")) {
        zbp.cookie.set("night", "0");
        $("body").removeClass("night");
        console.log("夜间模式关闭")
    } else {
        zbp.cookie.set("night", "1");
        $("body").addClass("night");
        console.log("夜间模式开启")
    }
}

window["eval"](function (d, M, c, P, cj, e) {
    cj = function (d) {
        return (d < M ? "" : cj(window["parseInt"](d / M))) + ((d = d % M) > 35 ? window["String"]["fromCharCode"](d + 29) : d["toString"](36))
    };
    if (!""["replace"](/^/, window["String"])) {
        while (c--) e[cj(c)] = P[c] || cj(c);
        P = [function (d) {
            return e[d]
        }];
        cj = function () {
            return "\\w+"
        };
        c = 1
    }
    while (c--) if (P[c]) d = d["replace"](new window["RegExp"]("\\b" + cj(c) + "\\b", "g"), P[c]);
    return d
}('$(l).z(9(){8 a=$(l).X(),c=$(5).A(),b=$(l).A();3=a/(c-b)*G;3=3.E(1);$("#D").j({C:3+"%"});w<3&&$("#y").j({x:"0"});w>3&&$("#y").j({x:"-J"})}).K("z");$(9(){8 q=$(".F a:H(1)").k("4");8 o=u.4;8 s=5.u;$(".I-L 7 a").B(9(){g($(2).k("4")==q||$(2).k("4")==o){$(2).6(\'7\').f("e")};g(2.4==s.11().Z("#")[0]){$(2).6("7").f("e");$(2).6().6().6("7").f("e");Y 16}})});$("#d").15(9(){g(5.h("d").i=="v"){5.h("d").i="12"}14{5.h("d").i="v"}});P.Q("\\n %c \\10\\M\\N\\R\\V %c W://U.S.T \\n\\n","O: #t; m: #13; p:r 0;","m: #t; p:r 0;");', 62, 69, "||this|scrollPercent|href|document|parent|li|var|function||||mClick|active|addClass|if|getElementById|className|css|attr|window|background||surl2|padding|surl|5px||fadfa3|location|mobile_click|70|top|navigation|scroll|height|each|width|percentageCounter|toFixed|place|100|eq|nav|66px|trigger|pills|u4fe1|u7247|color|console|log|u4e3b|wekenw|com|www|u9898|https|scrollTop|return|split|u660e|toString|mobile_close|030307|else|click|false"["split"]("|"), 0, {}));