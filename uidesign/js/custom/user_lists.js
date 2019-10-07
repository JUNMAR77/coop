let base_url = window.location.origin + '/' + window.location.pathname.split('/')[1] + '/';

$(function() {
    $('#myTable').DataTable();
    $(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
        // Order by the grouping
        $('#example tbody').on('click', 'tr.group', function() {
            var currentOrder = table.order()[0];
            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                table.order([2, 'desc']).draw();
            } else {
                table.order([2, 'asc']).draw();
            }
        });
    });
});
$('#example23').DataTable({
    dom: 'Bfrtip',
    buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
    ]
});
$('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-sm btn-primary mr-1');

function get_user_id(id) {
    $.ajax({
        url: base_url + 'get_user_details',
        type: 'get',
        data: {
            id: id
        },
        success: function(ret) {
            $.each(ret, function(index, row) {
                $('#set_name').text('NAME: ' + row.first_name + ' ' + row.last_name);
                $('#set_email').text('EMAIL: ' + row.email);
                $('#set_emp_type').text('CURRENT: ' + row.employee_type);
                $('#user_photo').attr('src', row.photo);
                $('#user_id').val(id);
            });
        },
        error: function(ret) {}
    });
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var filename = $("#inputGroupFile01").val();
        filename = filename.substring(filename.lastIndexOf('\\') + 1);
        reader.onload = function(e) {
            debugger;
            $('#blah').attr('src', e.target.result);
            $('#blah').hide();
            $('#blah').fadeIn(500);
            $('.custom-file-label').text(filename);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() {
    $('#trigger_update_button').click(function() {
        $('#submit_button_update').click();
    });
});
$('#blah').click(function() {
    $('#inputGroupFile01').click();
});
$("#inputGroupFile01").change(function(event) {
    readURL(this);
});

