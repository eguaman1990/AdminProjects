/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
! function(a) {
    "use strict";
    var b = function(a) {
            var b = arguments,
                c = !0,
                d = 1;
            return a = a.replace(/%s/g, function() {
                var a = b[d++];
                return "undefined" == typeof a ? (c = !1, "") : a
            }), c ? a : ""
        },
        c = function(b, c, d, e) {
            var f = "";
            return a.each(b, function(a, b) {
                return b[c] === e ? (f = b[d], !1) : !0
            }), f
        },
        d = function(b, c) {
            var d = -1;
            return a.each(b, function(a, b) {
                return b.field === c ? (d = a, !1) : !0
            }), d
        },
        e = function() {
            var b, c, d = a("<p/>").addClass("fixed-table-scroll-inner"),
                e = a("<div/>").addClass("fixed-table-scroll-outer");
            return e.append(d), a("body").append(e), b = d[0].offsetWidth, e.css("overflow", "scroll"), c = d[0].offsetWidth, b === c && (c = e[0].clientWidth), e.remove(), b - c
        },
        f = function(b, c, d, e) {
            if ("string" == typeof c) {
                var f = c.split(".");
                f.length > 1 ? (c = window, a.each(f, function(a, b) {
                    c = c[b]
                })) : c = window[c]
            }
            return "object" == typeof c ? c : "function" == typeof c ? c.apply(b, d) : e
        },
        g = function(a) {
            return "string" == typeof a ? a.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#039;") : a
        },
        h = function(b, c) {
            this.options = c, this.$el = a(b), this.$el_ = this.$el.clone(), this.timeoutId_ = 0, this.init()
        };
    h.DEFAULTS = {
        classes: "table table-hover",
        height: void 0,
        undefinedText: "-",
        sortName: void 0,
        sortOrder: "asc",
        striped: !1,
        columns: [],
        data: [],
        method: "get",
        url: void 0,
        cache: !0,
        contentType: "application/json",
        dataType: "json",
        ajaxOptions: {},
        queryParams: function(a) {
            return a
        },
        queryParamsType: "limit",
        responseHandler: function(a) {
            return a
        },
        pagination: !1,
        sidePagination: "client",
        totalRows: 0,
        pageNumber: 1,
        pageSize: 10,
        pageList: [10, 25, 50, 100],
        search: !1,
        searchAlign: "right",
        selectItemName: "btSelectItem",
        showHeader: !0,
        showColumns: !1,
        showPaginationSwitch: !1,
        showRefresh: !1,
        showToggle: !1,
        buttonsAlign: "right",
        smartDisplay: !0,
        minimumCountColumns: 1,
        idField: void 0,
        cardView: !1,
        trimOnSearch: !0,
        clickToSelect: !1,
        singleSelect: !1,
        toolbar: void 0,
        toolbarAlign: "left",
        checkboxHeader: !0,
        sortable: !0,
        maintainSelected: !1,
        searchTimeOut: 500,
        iconSize: void 0,
        iconsPrefix: "glyphicon",
        icons: {
            paginationSwitchDown: "glyphicon-collapse-down icon-chevron-down",
            paginationSwitchUp: "glyphicon-collapse-up icon-chevron-up",
            refresh: "glyphicon-refresh icon-refresh",
            toggle: "glyphicon-list-alt icon-list-alt",
            columns: "glyphicon-th icon-th"
        },
        rowStyle: function() {
            return {}
        },
        rowAttributes: function() {
            return {}
        },
        onAll: function() {
            return !1
        },
        onClickRow: function() {
            return !1
        },
        onDblClickRow: function() {
            return !1
        },
        onSort: function() {
            return !1
        },
        onCheck: function() {
            return !1
        },
        onUncheck: function() {
            return !1
        },
        onCheckAll: function() {
            return !1
        },
        onUncheckAll: function() {
            return !1
        },
        onLoadSuccess: function() {
            return !1
        },
        onLoadError: function() {
            return !1
        },
        onColumnSwitch: function() {
            return !1
        },
        onPageChange: function() {
            return !1
        },
        onSearch: function() {
            return !1
        },
        onPreBody: function() {
            return !1
        },
        onPostBody: function() {
            return !1
        },
        onPostHeader: function() {
            return !1
        }
    }, h.LOCALES = [], h.LOCALES["en-US"] = {
        formatLoadingMessage: function() {
            return "Loading, please wait..."
        },
        formatRecordsPerPage: function(a) {
            return b("%s records per page", a)
        },
        formatShowingRows: function(a, c, d) {
            return b("Showing %s to %s of %s rows", a, c, d)
        },
        formatSearch: function() {
            return "Search"
        },
        formatNoMatches: function() {
            return "No matching records found"
        },
        formatPaginationSwitch: function() {
            return "Hide/Show pagination"
        },
        formatRefresh: function() {
            return "Refresh"
        },
        formatToggle: function() {
            return "Toggle"
        },
        formatColumns: function() {
            return "Columns"
        }
    }, a.extend(h.DEFAULTS, h.LOCALES["en-US"]), h.COLUMN_DEFAULTS = {
        radio: !1,
        checkbox: !1,
        checkboxEnabled: !0,
        field: void 0,
        title: void 0,
        "class": void 0,
        align: void 0,
        halign: void 0,
        valign: void 0,
        width: void 0,
        sortable: !1,
        order: "asc",
        visible: !0,
        switchable: !0,
        clickToSelect: !0,
        formatter: void 0,
        events: void 0,
        sorter: void 0,
        cellStyle: void 0,
        searchable: !0
    }, h.EVENTS = {
        "all.bs.table": "onAll",
        "click-row.bs.table": "onClickRow",
        "dbl-click-row.bs.table": "onDblClickRow",
        "sort.bs.table": "onSort",
        "check.bs.table": "onCheck",
        "uncheck.bs.table": "onUncheck",
        "check-all.bs.table": "onCheckAll",
        "uncheck-all.bs.table": "onUncheckAll",
        "load-success.bs.table": "onLoadSuccess",
        "load-error.bs.table": "onLoadError",
        "column-switch.bs.table": "onColumnSwitch",
        "page-change.bs.table": "onPageChange",
        "search.bs.table": "onSearch",
        "pre-body.bs.table": "onPreBody",
        "post-body.bs.table": "onPostBody",
        "post-header.bs.table": "onPostHeader"
    }, h.prototype.init = function() {
        this.initContainer(), this.initTable(), this.initHeader(), this.initData(), this.initToolbar(), this.initPagination(), this.initBody(), this.initServer()
    }, h.prototype.initContainer = function() {
        this.$container = a(['<div class="bootstrap-table">', '<div class="fixed-table-toolbar"></div>', '<div class="fixed-table-container">', '<div class="fixed-table-header"><table></table></div>', '<div class="fixed-table-body">', '<div class="fixed-table-loading">', this.options.formatLoadingMessage(), "</div>", "</div>", '<div class="fixed-table-pagination"></div>', "</div>", "</div>"].join("")), this.$container.insertAfter(this.$el), this.$container.find(".fixed-table-body").append(this.$el), this.$container.after('<div class="clearfix"></div>'), this.$loading = this.$container.find(".fixed-table-loading"), this.$el.addClass(this.options.classes), this.options.striped && this.$el.addClass("table-striped")
    }, h.prototype.initTable = function() {
        var b = this,
            c = [],
            d = [];
        this.$header = this.$el.find("thead"), this.$header.length || (this.$header = a("<thead></thead>").appendTo(this.$el)), this.$header.find("tr").length || this.$header.append("<tr></tr>"), this.$header.find("th").each(function() {
            var b = a.extend({}, {
                title: a(this).html(),
                "class": a(this).attr("class")
            }, a(this).data());
            c.push(b)
        }), this.options.columns = a.extend([], c, this.options.columns), a.each(this.options.columns, function(c, d) {
            b.options.columns[c] = a.extend({}, h.COLUMN_DEFAULTS, {
                field: c
            }, d)
        }), this.options.data.length || (this.$el.find("tbody tr").each(function() {
            var c = {};
            c._id = a(this).attr("id"), c._class = a(this).attr("class"), a(this).find("td").each(function(d) {
                var e = b.options.columns[d].field;
                c[e] = a(this).html(), c["_" + e + "_id"] = a(this).attr("id"), c["_" + e + "_class"] = a(this).attr("class"), c["_" + e + "_data"] = a(this).data()
            }), d.push(c)
        }), this.options.data = d)
    }, h.prototype.initHeader = function() {
        var c = this,
            d = [],
            e = [];
        this.header = {
            fields: [],
            styles: [],
            classes: [],
            formatters: [],
            events: [],
            sorters: [],
            cellStyles: [],
            clickToSelects: [],
            searchables: []
        }, a.each(this.options.columns, function(a, f) {
            {
                var g = "",
                    h = "",
                    i = "",
                    j = "",
                    k = b(' class="%s"', f["class"]);
                c.options.sortOrder || f.order
            }
            f.visible && (h = b("text-align: %s; ", f.halign ? f.halign : f.align), i = b("text-align: %s; ", f.align), j = b("vertical-align: %s; ", f.valign), j += b("width: %spx; ", f.checkbox || f.radio ? 36 : f.width), d.push(f), c.header.fields.push(f.field), c.header.styles.push(i + j), c.header.classes.push(k), c.header.formatters.push(f.formatter), c.header.events.push(f.events), c.header.sorters.push(f.sorter), c.header.cellStyles.push(f.cellStyle), c.header.clickToSelects.push(f.clickToSelect), c.header.searchables.push(f.searchable), e.push("<th", f.checkbox || f.radio ? b(' class="bs-checkbox %s"', f["class"] || "") : k, b(' style="%s"', h + j), ">"), e.push(b('<div class="th-inner %s">', c.options.sortable && f.sortable ? "sortable" : "")), g = f.title, c.options.sortName === f.field && c.options.sortable && f.sortable && (g += c.getCaretHtml()), f.checkbox && (!c.options.singleSelect && c.options.checkboxHeader && (g = '<input name="btSelectAll" type="checkbox" />'), c.header.stateField = f.field), f.radio && (g = "", c.header.stateField = f.field, c.options.singleSelect = !0), e.push(g), e.push("</div>"), e.push('<div class="fht-cell"></div>'), e.push("</th>"))
        }), this.$header.find("tr").html(e.join("")), this.$header.find("th").each(function(b) {
            a(this).data(d[b])
        }), this.$container.off("click", "th").on("click", "th", function(b) {
            c.options.sortable && a(this).data().sortable && c.onSort(b)
        }), !this.options.showHeader || this.options.cardView ? (this.$header.hide(), this.$container.find(".fixed-table-header").hide(), this.$loading.css("top", 0)) : (this.$header.show(), this.$container.find(".fixed-table-header").show(), this.$loading.css("top", "37px")), this.$selectAll = this.$header.find('[name="btSelectAll"]'), this.$container.off("click", '[name="btSelectAll"]').on("click", '[name="btSelectAll"]', function() {
            var b = a(this).prop("checked");
            c[b ? "checkAll" : "uncheckAll"]()
        })
    }, h.prototype.initData = function(a, b) {
        this.data = "append" === b ? this.data.concat(a) : "prepend" === b ? [].concat(a).concat(this.data) : a || this.options.data, this.options.data = this.data, "server" !== this.options.sidePagination && this.initSort()
    }, h.prototype.initSort = function() {
        var b = this,
            c = this.options.sortName,
            d = "desc" === this.options.sortOrder ? -1 : 1,
            e = a.inArray(this.options.sortName, this.header.fields); - 1 !== e && this.data.sort(function(g, h) {
            var i = g[c],
                j = h[c],
                k = f(b.header, b.header.sorters[e], [i, j]);
            return void 0 !== k ? d * k : void 0 !== k ? d * k : ((void 0 === i || null === i) && (i = ""), (void 0 === j || null === j) && (j = ""), a.isNumeric(i) && a.isNumeric(j) ? (i = parseFloat(i), j = parseFloat(j), j > i ? -1 * d : d) : i === j ? 0 : ("string" != typeof i && (i = i.toString()), -1 === i.localeCompare(j) ? -1 * d : d))
        })
    }, h.prototype.onSort = function(b) {
        var c = a(b.currentTarget),
            d = this.$header.find("th").eq(c.index());
        return this.$header.add(this.$header_).find("span.order").remove(), this.options.sortName === c.data("field") ? this.options.sortOrder = "asc" === this.options.sortOrder ? "desc" : "asc" : (this.options.sortName = c.data("field"), this.options.sortOrder = "asc" === c.data("order") ? "desc" : "asc"), this.trigger("sort", this.options.sortName, this.options.sortOrder), c.add(d).data("order", this.options.sortOrder).find(".th-inner").append(this.getCaretHtml()), "server" === this.options.sidePagination ? void this.initServer() : (this.initSort(), void this.initBody())
    }, h.prototype.initToolbar = function() {
        var c, d, e = this,
            g = [],
            h = 0,
            i = 0;
        this.$toolbar = this.$container.find(".fixed-table-toolbar").html(""), "string" == typeof this.options.toolbar && a(b('<div class="bars pull-%s"></div>', this.options.toolbarAlign)).appendTo(this.$toolbar).append(a(this.options.toolbar)), g = [b('<div class="columns columns-%s btn-group pull-%s">', this.options.buttonsAlign, this.options.buttonsAlign)], "string" == typeof this.options.icons && (this.options.icons = f(null, this.options.icons)), this.options.showPaginationSwitch && g.push(b('<button class="btn btn-default" type="button" name="paginationSwitch" title="%s">', this.options.formatPaginationSwitch()), b('<i class="%s %s"></i>', this.options.iconsPrefix, this.options.icons.paginationSwitchDown), "</button>"), this.options.showRefresh && g.push(b('<button class="btn btn-default' + (void 0 === this.options.iconSize ? "" : " btn-" + this.options.iconSize) + '" type="button" name="refresh" title="%s">', this.options.formatRefresh()), b('<i class="%s %s"></i>', this.options.iconsPrefix, this.options.icons.refresh), "</button>"), this.options.showToggle && g.push(b('<button class="btn btn-default' + (void 0 === this.options.iconSize ? "" : " btn-" + this.options.iconSize) + '" type="button" name="toggle" title="%s">', this.options.formatToggle()), b('<i class="%s %s"></i>', this.options.iconsPrefix, this.options.icons.toggle), "</button>"), this.options.showColumns && (g.push(b('<div class="keep-open btn-group" title="%s">', this.options.formatColumns()), '<button type="button" class="btn btn-default' + (void 0 == this.options.iconSize ? "" : " btn-" + this.options.iconSize) + ' dropdown-toggle" data-toggle="dropdown">', b('<i class="%s %s"></i>', this.options.iconsPrefix, this.options.icons.columns), ' <span class="caret"></span>', "</button>", '<ul class="dropdown-menu" role="menu">'), a.each(this.options.columns, function(a, c) {
            if (!c.radio && !c.checkbox) {
                var d = c.visible ? ' checked="checked"' : "";
                c.switchable && (g.push(b('<li><label><input type="checkbox" data-field="%s" value="%s"%s> %s</label></li>', c.field, a, d, c.title)), i++)
            }
        }), g.push("</ul>", "</div>")), g.push("</div>"), (this.showToolbar || g.length > 2) && this.$toolbar.append(g.join("")), this.options.showPaginationSwitch && this.$toolbar.find('button[name="paginationSwitch"]').off("click").on("click", a.proxy(this.togglePagination, this)), this.options.showRefresh && this.$toolbar.find('button[name="refresh"]').off("click").on("click", a.proxy(this.refresh, this)), this.options.showToggle && this.$toolbar.find('button[name="toggle"]').off("click").on("click", function() {
            e.options.cardView = !e.options.cardView, e.initHeader(), e.initBody()
        }), this.options.showColumns && (c = this.$toolbar.find(".keep-open"), i <= this.options.minimumCountColumns && c.find("input").prop("disabled", !0), c.find("li").off("click").on("click", function(a) {
            a.stopImmediatePropagation()
        }), c.find("input").off("click").on("click", function() {
            var b = a(this);
            e.toggleColumn(b.val(), b.prop("checked"), !1), e.trigger("column-switch", a(this).data("field"), b.prop("checked"))
        })), this.options.search && (g = [], g.push('<div class="pull-' + this.options.searchAlign + ' search">', b('<input class="form-control' + (void 0 === this.options.iconSize ? "" : " input-" + this.options.iconSize) + '" type="text" placeholder="%s">', this.options.formatSearch()), "</div>"), this.$toolbar.append(g.join("")), d = this.$toolbar.find(".search input"), d.off("keyup").on("keyup", function(a) {
            clearTimeout(h), h = setTimeout(function() {
                e.onSearch(a)
            }, e.options.searchTimeOut)
        }))
    }, h.prototype.onSearch = function(b) {
        var c = a.trim(a(b.currentTarget).val());
        this.options.trimOnSearch && a(b.currentTarget).val(c), c !== this.searchText && (this.searchText = c, this.options.pageNumber = 1, this.initSearch(), this.updatePagination(), this.trigger("search", c))
    }, h.prototype.initSearch = function() {
        var b = this;
        if ("server" !== this.options.sidePagination) {
            var c = this.searchText && this.searchText.toLowerCase(),
                d = a.isEmptyObject(this.filterColumns) ? null : this.filterColumns;
            this.data = d ? a.grep(this.options.data, function(a) {
                for (var b in d)
                    if (a[b] !== d[b]) return !1;
                return !0
            }) : this.options.data, this.data = c ? a.grep(this.data, function(d, e) {
                for (var g in d) {
                    g = a.isNumeric(g) ? parseInt(g, 10) : g;
                    var h = d[g];
                    h = f(b.header, b.header.formatters[a.inArray(g, b.header.fields)], [h, d, e], h);
                    var i = a.inArray(g, b.header.fields);
                    if (-1 !== i && b.header.searchables[i] && ("string" == typeof h || "number" == typeof h) && -1 !== (h + "").toLowerCase().indexOf(c)) return !0
                }
                return !1
            }) : this.data
        }
    }, h.prototype.initPagination = function() {
        if (this.$pagination = this.$container.find(".fixed-table-pagination"), !this.options.pagination) return void this.$pagination.hide();
        this.$pagination.show();
        var c, d, e, f, g, h, i, j, k, l = this,
            m = [],
            n = this.getData();
        "server" !== this.options.sidePagination && (this.options.totalRows = n.length), this.totalPages = 0, this.options.totalRows && (this.totalPages = ~~((this.options.totalRows - 1) / this.options.pageSize) + 1, this.options.totalPages = this.totalPages), this.totalPages > 0 && this.options.pageNumber > this.totalPages && (this.options.pageNumber = this.totalPages), this.pageFrom = (this.options.pageNumber - 1) * this.options.pageSize + 1, this.pageTo = this.options.pageNumber * this.options.pageSize, this.pageTo > this.options.totalRows && (this.pageTo = this.options.totalRows), m.push('<div class="pull-left pagination-detail">', '<span class="pagination-info">', this.options.formatShowingRows(this.pageFrom, this.pageTo, this.options.totalRows), "</span>"), m.push('<span class="page-list">');
        var o = ['<span class="btn-group dropup">', '<button type="button" class="btn btn-default ' + (void 0 === this.options.iconSize ? "" : " btn-" + this.options.iconSize) + ' dropdown-toggle" data-toggle="dropdown">', '<span class="page-size">', this.options.pageSize, "</span>", ' <span class="caret"></span>', "</button>", '<ul class="dropdown-menu" role="menu">'],
            p = this.options.pageList;
        if ("string" == typeof this.options.pageList) {
            var q = this.options.pageList.replace("[", "").replace("]", "").replace(/ /g, "").split(",");
            p = [], a.each(q, function(a, b) {
                p.push(+b)
            })
        }
        for (a.each(p, function(a, c) {
                if (!l.options.smartDisplay || 0 === a || p[a - 1] <= l.options.totalRows) {
                    var d = c === l.options.pageSize ? ' class="active"' : "";
                    o.push(b('<li%s><a href="javascript:void(0)">%s</a></li>', d, c))
                }
            }), o.push("</ul></span>"), m.push(this.options.formatRecordsPerPage(o.join(""))), m.push("</span>"), m.push("</div>", '<div class="pull-right pagination">', '<ul class="pagination' + (void 0 === this.options.iconSize ? "" : " pagination-" + this.options.iconSize) + '">', '<li class="page-first"><a href="javascript:void(0)">&lt;&lt;</a></li>', '<li class="page-pre"><a href="javascript:void(0)">&lt;</a></li>'), this.totalPages < 5 ? (d = 1, e = this.totalPages) : (d = this.options.pageNumber - 2, e = d + 4, 1 > d && (d = 1, e = 5), e > this.totalPages && (e = this.totalPages, d = e - 4)), c = d; e >= c; c++) m.push('<li class="page-number' + (c === this.options.pageNumber ? " active" : "") + '">', '<a href="javascript:void(0)">', c, "</a>", "</li>");
        m.push('<li class="page-next"><a href="javascript:void(0)">&gt;</a></li>', '<li class="page-last"><a href="javascript:void(0)">&gt;&gt;</a></li>', "</ul>", "</div>"), this.$pagination.html(m.join("")), f = this.$pagination.find(".page-list a"), g = this.$pagination.find(".page-first"), h = this.$pagination.find(".page-pre"), i = this.$pagination.find(".page-next"), j = this.$pagination.find(".page-last"), k = this.$pagination.find(".page-number"), this.options.pageNumber <= 1 && (g.addClass("disabled"), h.addClass("disabled")), this.options.pageNumber >= this.totalPages && (i.addClass("disabled"), j.addClass("disabled")), this.options.smartDisplay && (this.totalPages <= 1 && this.$pagination.find("div.pagination").hide(), (this.options.pageList.length < 2 || this.options.totalRows <= this.options.pageList[0]) && this.$pagination.find("span.page-list").hide(), this.$pagination[this.getData().length ? "show" : "hide"]()), f.off("click").on("click", a.proxy(this.onPageListChange, this)), g.off("click").on("click", a.proxy(this.onPageFirst, this)), h.off("click").on("click", a.proxy(this.onPagePre, this)), i.off("click").on("click", a.proxy(this.onPageNext, this)), j.off("click").on("click", a.proxy(this.onPageLast, this)), k.off("click").on("click", a.proxy(this.onPageNumber, this))
    }, h.prototype.updatePagination = function(b) {
        b && a(b.currentTarget).hasClass("disabled") || (this.options.maintainSelected || this.resetRows(), this.initPagination(), "server" === this.options.sidePagination ? this.initServer() : this.initBody(), this.trigger("page-change", this.options.pageNumber, this.options.pageSize))
    }, h.prototype.onPageListChange = function(b) {
        var c = a(b.currentTarget);
        c.parent().addClass("active").siblings().removeClass("active"), this.options.pageSize = +c.text(), this.$toolbar.find(".page-size").text(this.options.pageSize), this.updatePagination(b)
    }, h.prototype.onPageFirst = function(a) {
        this.options.pageNumber = 1, this.updatePagination(a)
    }, h.prototype.onPagePre = function(a) {
        this.options.pageNumber--, this.updatePagination(a)
    }, h.prototype.onPageNext = function(a) {
        this.options.pageNumber++, this.updatePagination(a)
    }, h.prototype.onPageLast = function(a) {
        this.options.pageNumber = this.totalPages, this.updatePagination(a)
    }, h.prototype.onPageNumber = function(b) {
        this.options.pageNumber !== +a(b.currentTarget).text() && (this.options.pageNumber = +a(b.currentTarget).text(), this.updatePagination(b))
    }, h.prototype.initBody = function(e) {
        var h = this,
            i = [],
            j = this.getData();
        this.trigger("pre-body", j), this.$body = this.$el.find("tbody"), this.$body.length || (this.$body = a("<tbody></tbody>").appendTo(this.$el)), this.options.pagination && "server" !== this.options.sidePagination || (this.pageFrom = 1, this.pageTo = j.length);
        for (var k = this.pageFrom - 1; k < this.pageTo; k++) {
            var l = j[k],
                m = {},
                n = [],
                o = {},
                p = [];
            if (m = f(this.options, this.options.rowStyle, [l, k], m), m && m.css)
                for (var q in m.css) n.push(q + ": " + m.css[q]);
            if (o = f(this.options, this.options.rowAttributes, [l, k], o))
                for (var q in o) p.push(b('%s="%s"', q, g(o[q])));
            i.push("<tr", b(" %s", p.join(" ")), b(' id="%s"', a.isArray(l) ? void 0 : l._id), b(' class="%s"', m.classes || (a.isArray(l) ? void 0 : l._class)), b(' data-index="%s"', k), ">"), this.options.cardView && i.push(b('<td colspan="%s">', this.header.fields.length)), a.each(this.header.fields, function(e, g) {
                var j = "",
                    o = l[g],
                    p = "",
                    q = {},
                    r = "",
                    s = h.header.classes[e],
                    t = "",
                    u = h.options.columns[d(h.options.columns, g)];
                if (m = b('style="%s"', n.concat(h.header.styles[e]).join("; ")), o = f(h.header, h.header.formatters[e], [o, l, k], o), l["_" + g + "_id"] && (r = b(' id="%s"', l["_" + g + "_id"])), l["_" + g + "_class"] && (s = b(' class="%s"', l["_" + g + "_class"])), q = f(h.header, h.header.cellStyles[e], [o, l, k], q), q.classes && (s = b(' class="%s"', q.classes)), q.css) {
                    var v = [];
                    for (var w in q.css) v.push(w + ": " + q.css[w]);
                    m = b('style="%s"', v.concat(h.header.styles[e]).join("; "))
                }
                l["_" + g + "_data"] && !a.isEmptyObject(l["_" + g + "_data"]) && a.each(l["_" + g + "_data"], function(a, c) {
                    "index" !== a && (t += b(' data-%s="%s"', a, c))
                }), u.checkbox || u.radio ? (p = u.checkbox ? "checkbox" : p, p = u.radio ? "radio" : p, j = [h.options.cardView ? '<div class="card-view">' : '<td class="bs-checkbox">', "<input" + b(' data-index="%s"', k) + b(' name="%s"', h.options.selectItemName) + b(' type="%s"', p) + b(' value="%s"', l[h.options.idField]) + b(' checked="%s"', o === !0 || o && o.checked ? "checked" : void 0) + b(' disabled="%s"', !u.checkboxEnabled || o && o.disabled ? "disabled" : void 0) + " />", h.options.cardView ? "</div>" : "</td>"].join("")) : (o = "undefined" == typeof o || null === o ? h.options.undefinedText : o, j = h.options.cardView ? ['<div class="card-view">', h.options.showHeader ? b('<span class="title" %s>%s</span>', m, c(h.options.columns, "field", "title", g)) : "", b('<span class="value">%s</span>', o), "</div>"].join("") : [b("<td%s %s %s %s>", r, s, m, t), o, "</td>"].join(""), h.options.cardView && h.options.smartDisplay && "" === o && (j = "")), i.push(j)
            }), this.options.cardView && i.push("</td>"), i.push("</tr>")
        }
        i.length || i.push('<tr class="no-records-found">', b('<td colspan="%s">%s</td>', this.header.fields.length, this.options.formatNoMatches()), "</tr>"), this.$body.html(i.join("")), e || this.scrollTo(0), this.$body.find("> tr > td").off("click").on("click", function() {
            var c = a(this).parent();
            h.trigger("click-row", h.data[c.data("index")], c), h.options.clickToSelect && h.header.clickToSelects[c.children().index(a(this))] && c.find(b('[name="%s"]', h.options.selectItemName))[0].click()
        }), this.$body.find("tr").off("dblclick").on("dblclick", function() {
            h.trigger("dbl-click-row", h.data[a(this).data("index")], a(this))
        }), this.$selectItem = this.$body.find(b('[name="%s"]', this.options.selectItemName)), this.$selectItem.off("click").on("click", function(b) {
            b.stopImmediatePropagation();
            var c = a(this).prop("checked"),
                d = h.data[a(this).data("index")];
            d[h.header.stateField] = c, h.trigger(c ? "check" : "uncheck", d), h.options.singleSelect && (h.$selectItem.not(this).each(function() {
                h.data[a(this).data("index")][h.header.stateField] = !1
            }), h.$selectItem.filter(":checked").not(this).prop("checked", !1)), h.updateSelected()
        }), a.each(this.header.events, function(b, c) {
            if (c) {
                "string" == typeof c && (c = f(null, c));
                for (var d in c) h.$body.find("tr").each(function() {
                    var e = a(this),
                        f = e.find(h.options.cardView ? ".card-view" : "td").eq(b),
                        g = d.indexOf(" "),
                        i = d.substring(0, g),
                        j = d.substring(g + 1),
                        k = c[d];
                    f.find(j).off(i).on(i, function(a) {
                        var c = e.data("index"),
                            d = h.data[c],
                            f = d[h.header.fields[b]];
                        k.apply(this, [a, f, d, c])
                    })
                })
            }
        }), this.updateSelected(), this.resetView(), this.trigger("post-body")
    }, h.prototype.initServer = function(b, c) {
        var d = this,
            e = {},
            g = {
                pageSize: this.options.pageSize,
                pageNumber: this.options.pageNumber,
                searchText: this.searchText,
                sortName: this.options.sortName,
                sortOrder: this.options.sortOrder
            };
        this.options.url && ("limit" === this.options.queryParamsType && (g = {
            search: g.searchText,
            sort: g.sortName,
            order: g.sortOrder
        }, this.options.pagination && (g.limit = this.options.pageSize, g.offset = this.options.pageSize * (this.options.pageNumber - 1))), e = f(this.options, this.options.queryParams, [g], e), a.extend(e, c || {}), e !== !1 && (b || this.$loading.show(), a.ajax(a.extend({}, f(null, this.options.ajaxOptions), {
            type: this.options.method,
            url: this.options.url,
            data: "application/json" === this.options.contentType && "post" === this.options.method ? JSON.stringify(e) : e,
            cache: this.options.cache,
            contentType: this.options.contentType,
            dataType: this.options.dataType,
            success: function(a) {
                a = f(d.options, d.options.responseHandler, [a], a), d.load(a), d.trigger("load-success", a)
            },
            error: function(a) {
                d.trigger("load-error", a.status)
            },
            complete: function() {
                b || d.$loading.hide()
            }
        }))))
    }, h.prototype.getCaretHtml = function() {
        return ['<span class="order' + ("desc" === this.options.sortOrder ? "" : " dropup") + '">', '<span class="caret" style="margin: 10px 5px;"></span>', "</span>"].join("")
    }, h.prototype.updateSelected = function() {
        var b = this.$selectItem.filter(":enabled").length === this.$selectItem.filter(":enabled").filter(":checked").length;
        this.$selectAll.add(this.$selectAll_).prop("checked", b), this.$selectItem.each(function() {
            a(this).parents("tr")[a(this).prop("checked") ? "addClass" : "removeClass"]("selected")
        })
    }, h.prototype.updateRows = function(b) {
        var c = this;
        this.$selectItem.each(function() {
            c.data[a(this).data("index")][c.header.stateField] = b
        })
    }, h.prototype.resetRows = function() {
        var b = this;
        a.each(this.data, function(a, c) {
            b.$selectAll.prop("checked", !1), b.$selectItem.prop("checked", !1), c[b.header.stateField] = !1
        })
    }, h.prototype.trigger = function(b) {
        var c = Array.prototype.slice.call(arguments, 1);
        b += ".bs.table", this.options[h.EVENTS[b]].apply(this.options, c), this.$el.trigger(a.Event(b), c), this.options.onAll(b, c), this.$el.trigger(a.Event("all.bs.table"), [b, c])
    }, h.prototype.resetHeader = function() {
        var b = this,
            c = this.$container.find(".fixed-table-header"),
            d = this.$container.find(".fixed-table-body"),
            f = this.$el.width() > d.width() ? e() : 0;
        return this.$el.is(":hidden") ? (clearTimeout(this.timeoutId_), void(this.timeoutId_ = setTimeout(a.proxy(this.resetHeader, this), 100))) : (this.$header_ = this.$header.clone(!0, !0), this.$selectAll_ = this.$header_.find('[name="btSelectAll"]'), void setTimeout(function() {
            c.css({
                height: "37px",
                "border-bottom": "1px solid #dddddd",
                "margin-right": f
            }).find("table").css("width", b.$el.css("width")).html("").attr("class", b.$el.attr("class")).append(b.$header_), b.$header.find("th").each(function(c) {
                b.$header_.find("th").eq(c).data(a(this).data())
            }), b.$body.find("tr:first-child:not(.no-records-found) > *").each(function(c) {
                b.$header_.find("div.fht-cell").eq(c).width(a(this).innerWidth())
            }), b.$el.css("margin-top", -b.$header.height()), d.off("scroll").on("scroll", function() {
                c.scrollLeft(a(this).scrollLeft())
            }), b.trigger("post-header")
        }))
    }, h.prototype.toggleColumn = function(a, c, d) {
        if (-1 !== a && (this.options.columns[a].visible = c, this.initHeader(), this.initSearch(), this.initPagination(), this.initBody(), this.options.showColumns)) {
            var e = this.$toolbar.find(".keep-open input").prop("disabled", !1);
            d && e.filter(b('[value="%s"]', a)).prop("checked", c), e.filter(":checked").length <= this.options.minimumCountColumns && e.filter(":checked").prop("disabled", !0)
        }
    }, h.prototype.resetView = function(a) {
        {
            var b = this;
            this.header
        }
        if (a && a.height && (this.options.height = a.height), this.$selectAll.prop("checked", this.$selectItem.length > 0 && this.$selectItem.length === this.$selectItem.filter(":checked").length), this.options.height) {
            var c = +this.$toolbar.children().outerHeight(!0),
                d = +this.$pagination.children().outerHeight(!0),
                e = this.options.height - c - d;
            this.$container.find(".fixed-table-container").css("height", e + "px")
        }
        return this.options.cardView ? (b.$el.css("margin-top", "0"), void b.$container.find(".fixed-table-container").css("padding-bottom", "0")) : (this.options.showHeader && this.options.height ? this.resetHeader() : this.trigger("post-header"), void(this.options.height && this.options.showHeader && this.$container.find(".fixed-table-container").css("padding-bottom", "37px")))
    }, h.prototype.getData = function() {
        return this.searchText || !a.isEmptyObject(this.filterColumns) ? this.data : this.options.data
    }, h.prototype.load = function(b) {
        var c = !1;
        "server" === this.options.sidePagination ? (this.options.totalRows = b.total, c = b.fixedScroll, b = b.rows) : a.isArray(b) || (c = b.fixedScroll, b = b.data), this.initData(b), this.initSearch(), this.initPagination(), this.initBody(c)
    }, h.prototype.append = function(a) {
        this.initData(a, "append"), this.initSearch(), this.initPagination(), this.initBody(!0)
    }, h.prototype.prepend = function(a) {
        this.initData(a, "prepend"), this.initSearch(), this.initPagination(), this.initBody(!0)
    }, h.prototype.remove = function(b) {
        var c, d, e = this.options.data.length;
        if (b.hasOwnProperty("field") && b.hasOwnProperty("values")) {
            for (c = e - 1; c >= 0; c--) d = this.options.data[c], d.hasOwnProperty(b.field) && -1 !== a.inArray(d[b.field], b.values) && this.options.data.splice(c, 1);
            e !== this.options.data.length && (this.initSearch(), this.initPagination(), this.initBody(!0))
        }
    }, h.prototype.insertRow = function(a) {
        a.hasOwnProperty("index") && a.hasOwnProperty("row") && (this.data.splice(a.index, 0, a.row), this.initBody(!0))
    }, h.prototype.updateRow = function(b) {
        b.hasOwnProperty("index") && b.hasOwnProperty("row") && (a.extend(this.data[b.index], b.row), this.initBody(!0))
    }, h.prototype.mergeCells = function(b) {
        var c, d, e = b.index,
            f = a.inArray(b.field, this.header.fields),
            g = b.rowspan || 1,
            h = b.colspan || 1,
            i = this.$body.find("tr"),
            j = i.eq(e).find("td").eq(f);
        if (!(0 > e || 0 > f || e >= this.data.length)) {
            for (c = e; e + g > c; c++)
                for (d = f; f + h > d; d++) i.eq(c).find("td").eq(d).hide();
            j.attr("rowspan", g).attr("colspan", h).show()
        }
    }, h.prototype.getOptions = function() {
        return this.options
    }, h.prototype.getSelections = function() {
        var b = this;
        return a.grep(this.data, function(a) {
            return a[b.header.stateField]
        })
    }, h.prototype.checkAll = function() {
        this.checkAll_(!0)
    }, h.prototype.uncheckAll = function() {
        this.checkAll_(!1)
    }, h.prototype.checkAll_ = function(a) {
        var b;
        a || (b = this.getSelections()), this.$selectItem.filter(":enabled").prop("checked", a), this.updateRows(a), this.updateSelected(), a && (b = this.getSelections()), this.trigger(a ? "check-all" : "uncheck-all", b)
    }, h.prototype.check = function(a) {
        this.check_(!0, a)
    }, h.prototype.uncheck = function(a) {
        this.check_(!1, a)
    }, h.prototype.check_ = function(a, c) {
        this.$selectItem.filter(b('[data-index="%s"]', c)).prop("checked", a), this.data[c][this.header.stateField] = a, this.updateSelected(), this.trigger(a ? "check" : "uncheck", this.data[c])
    }, h.prototype.checkBy = function(a) {
        this.checkBy_(!0, a)
    }, h.prototype.uncheckBy = function(a) {
        this.checkBy_(!1, a)
    }, h.prototype.checkBy_ = function(c, d) {
        if (d.hasOwnProperty("field") && d.hasOwnProperty("values")) {
            var e = this;
            a.each(this.options.data, function(f, g) {
                return g.hasOwnProperty(d.field) ? void(-1 !== a.inArray(g[d.field], d.values) && (e.$selectItem.filter(b('[data-index="%s"]', f)).prop("checked", c), g[e.header.stateField] = c, e.trigger(c ? "check" : "uncheck", g))) : !1
            }), this.updateSelected()
        }
    }, h.prototype.destroy = function() {
        this.$el.insertBefore(this.$container), a(this.options.toolbar).insertBefore(this.$el), this.$container.next().remove(), this.$container.remove(), this.$el.html(this.$el_.html()).css("margin-top", "0").attr("class", this.$el_.attr("class") || "")
    }, h.prototype.showLoading = function() {
        this.$loading.show()
    }, h.prototype.hideLoading = function() {
        this.$loading.hide()
    }, h.prototype.togglePagination = function() {
        this.options.pagination = !this.options.pagination;
        var a = this.$toolbar.find('button[name="paginationSwitch"] i');
        this.options.pagination ? a.attr("class", this.options.iconsPrefix + " " + this.options.icons.paginationSwitchDown) : a.attr("class", this.options.iconsPrefix + " " + this.options.icons.paginationSwitchUp), this.updatePagination()
    }, h.prototype.refresh = function(a) {
        a && a.url && (this.options.url = a.url, this.options.pageNumber = 1), this.initServer(a && a.silent, a && a.query)
    }, h.prototype.showColumn = function(a) {
        this.toggleColumn(d(this.options.columns, a), !0, !0)
    }, h.prototype.hideColumn = function(a) {
        this.toggleColumn(d(this.options.columns, a), !1, !0)
    }, h.prototype.filterBy = function(b) {
        this.filterColumns = a.isEmptyObject(b) ? {} : b, this.options.pageNumber = 1, this.initSearch(), this.updatePagination()
    }, h.prototype.scrollTo = function(a) {
        var b = this.$container.find(".fixed-table-body");
        "string" == typeof a && (a = "bottom" === a ? b[0].scrollHeight : 0), "number" == typeof a && b.scrollTop(a)
    }, h.prototype.selectPage = function(a) {
        a > 0 && a <= this.options.totalPages && (this.options.pageNumber = a, this.updatePagination())
    }, h.prototype.prevPage = function() {
        this.options.pageNumber > 1 && (this.options.pageNumber--, this.updatePagination())
    }, h.prototype.nextPage = function() {
        this.options.pageNumber < this.options.totalPages && (this.options.pageNumber++, this.updatePagination())
    }, h.prototype.toggleView = function() {
        this.options.cardView = !this.options.cardView, this.initHeader(), this.initBody()
    };
    var i = ["getOptions", "getSelections", "getData", "load", "append", "prepend", "remove", "insertRow", "updateRow", "mergeCells", "checkAll", "uncheckAll", "check", "uncheck", "checkBy", "uncheckBy", "refresh", "resetView", "destroy", "showLoading", "hideLoading", "showColumn", "hideColumn", "filterBy", "scrollTo", "selectPage", "prevPage", "nextPage", "togglePagination", "toggleView"];
    a.fn.bootstrapTable = function(b, c) {
        var d;
        return this.each(function() {
            var e = a(this),
                f = e.data("bootstrap.table"),
                g = a.extend({}, h.DEFAULTS, e.data(), "object" == typeof b && b);
            if ("string" == typeof b) {
                if (a.inArray(b, i) < 0) throw "Unknown method: " + b;
                if (!f) return;
                d = f[b](c), "destroy" === b && e.removeData("bootstrap.table")
            }
            f || e.data("bootstrap.table", f = new h(this, g))
        }), "undefined" == typeof d ? this : d
    }, a.fn.bootstrapTable.Constructor = h, a.fn.bootstrapTable.defaults = h.DEFAULTS, a.fn.bootstrapTable.columnDefaults = h.COLUMN_DEFAULTS, a.fn.bootstrapTable.locales = h.LOCALES, a.fn.bootstrapTable.methods = i, a(function() {
        a('[data-toggle="table"]').bootstrapTable()
    })
}(jQuery);

