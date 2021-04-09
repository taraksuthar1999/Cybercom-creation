var config = function () {

};
config.prototype = {
    addRow: function () {
        let row = ' <tr><td><input type="text" name="config[new][title]" value="" id=""></td><td><input type="text" name="config[new][code]" id="" value=""></td><td><input type="text" name="config[new][value]" id="" value=""></td><td><a class="btn btn-danger bt" onclick="config.removeRow(this)" href="javascript:void(0)">Delete</a></td></tr>';
        $('#configTable').append(row);
    },
    removeRow: function (btn) {
        $(btn).closest('tr').remove();
    },
}
var config = new config();