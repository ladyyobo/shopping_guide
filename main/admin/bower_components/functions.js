function get_details(value, data_type, display) {
    if (value.length == -1) {
        //document.getElementById(display).innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(display).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "../../includes/actions/get_details_actions.php?product_id=" + value + "&info_type=" + data_type, true);
        xmlhttp.send();
    }
}