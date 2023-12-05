const OWNER_ID = 3;

$( document ).ready(function() {
    $.ajax({
        url: '/ajax/get_server_data.php',
        method: 'POST',
        data: {
            owner_id: OWNER_ID
        },
        success: function (data) {
            data = JSON.parse(data);
            console.log(data['data']);
            createTable(data['data']);
        }
    })

    // create function create table in div#server_data and insert data to table
    function createTable(data) {
        // console.log(data);
        let table_html = '<table class="table"><thead><tr><th>servers.id</th><th>ip</th><th>owners.name</th></tr></thead><tbody>';
        $.each(data, function (key, value) {
            let ip = value.ip == null ? '—' : value.ip;
            table_html += '<tr><td>' + value.server_id + '</td><td>' + ip + '</td><td>' + value.owner_name; + '</td></tr>';
        });
        table_html += '</tbody></table>';
        $('#server_data').html(table_html);
    }
});