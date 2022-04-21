$(function () {
    $(".user").addClass("active");
    $(".user ul").addClass("show ");
    $(".user a.menu-item-user-log").addClass("active");

    var minDate, maxDate;

    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date(data[5]);

        if (
            (min === "" && max === "") ||
            (min === "" && data[5] <= max) ||
            (min <= data[5] && max === "") ||
            (min <= data[5] && data[5] <= max)
        ) {
            return true;
        }
        return false;
    });

    $("#min").flatpickr({
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "d-m-Y",
    });
    $("#max").flatpickr({
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "d-m-Y",
    });

    minDate = $("#min");
    maxDate = $("#max");

    var datatable = $(".table").DataTable({
        order: [[0, 'desc']],
        language: {
            paginate: {
                next: "<i class='fa-solid fa-angles-right'></i>",
                previous: "<i class='fa-solid fa-angles-left'></i>",
            },
        },
        lengthMenu: [15, 20, 30, 50, 100],
        columnDefs: [
            { orderable: false, targets: 1 },
            { orderable: false, targets: 2 },
            { orderable: false, targets: 3 },
        ],
    });

    $("#search_name").on("keyup", function () {
        datatable.column(1).search(this.value).draw();
    });
    $("#search_status").on("change", function () {
        datatable.column(4).search(this.value).draw();
    });
    $("#min, #max").on("change", function () {
        datatable.draw();
    });

    // Model Delete
    $(".table tbody").on("click", ".dropdown-menu li .btn-delete", function () {
        let id = $(this).attr("data-id");
        $("#delete_user_id").val(id);
    });

    $(".table tbody").on("click", ".dropdown-menu li .btn-edit", function () {
        let id = $(this).attr("data-id");
        let _this = $(this).parents('tr');
        $("#e_user_id").val(id);
        $("#e_user_name").val(_this.find('.user_name').text());
        $("#e_user_email").val(_this.find('.user_email').text());
        $(`#e_user_role option[value=${_this.find('.user_role').text()}]`).prop("selected", true)
        if(_this.find('.user_status a').text() == ' Abnormal') {
            $("#e_user_status option[value='0']").prop("selected", true)
        }else if(_this.find('.user_status a').text() == ' Normal') {
            $("#e_user_status option[value='1']").prop("selected", true)
        }
        $("#e_old_image").val(_this.find('.user_image').attr('alt'));

    });
});
