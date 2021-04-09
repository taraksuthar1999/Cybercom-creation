var Base = function () {

};
Base.prototype = {
    alert: function () {
        alert(111);
    },
    url: null,
    params: {},
    method: 'post',
    form: null,
    setUrl: function (url) {
        this.url = url;
        return this;
    },
    getUrl: function () {
        return this.url;
    },
    setMethod: function (method) {
        this.method = method;
        return this;
    },
    getMethod: function () {
        return this.method;
    },
    resetParams: function () {
        this.params = {};
        return this;
    },
    setParams: function (params) {
        this.params = params;
        return this;
    },
    getParams: function (key) {
        if (typeof key === 'undefined') {

            return this.params;
        }

        if (typeof this.params[key] === 'undefined') {
            return null;

        }
        return this.params[key];
    },
    addParam: function (key, value) {
        this.param[key] = value;
        return thid;
    },
    removeParam: function (key) {
        if (typeof this.params[key] != undefined) {
            delete this.params[key];
        }
        return this;
    },
    setForm: function (button) {

        this.form = $(button).closest("form");
        this.setMethod(this.form.attr('method'));

        this.setUrl(this.form.attr('action'));

        this.setParams(this.form.serializeArray());

        return this;
    },
    load: function () {
        var request = jQuery.ajax({
            method: this.getMethod(),
            url: this.getUrl(),
            data: this.getParams(),
            success: function (response) {

                mage.manageHtml(response);
                // $(response.element.selector).html(response.element.html);
            },
        });
    },
    manageAction: function (button, url) {

        this.form = $(button).closest("form");

        this.form.attr('action', url);

        this.setForm(button);
        return this;
    },
    manageHtml: function (response) {


        if (typeof response.element == 'undefined') {
            return false;
        }
        else if (typeof response.element == 'object') {

            $.each(response.element, function (i, element) {

                $(element.selector).html(element.html);
            });
        }
        else {
            $(response.element.selector).html(response.element.html);

        }
    }



}
var mage = new Base();
// Obj.setParams({
//     'name': 'tarak',
//     'email': 't@gmail'
// });
// mage.setUrl('http://localhost:8080/projects/phpPractice/app/index.php?c=Product&a=test');
// mage.load();
