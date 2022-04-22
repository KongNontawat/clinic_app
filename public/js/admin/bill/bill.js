$(function () {
    $(".patient").addClass("active");
    $(".patient ul").addClass("show ");

    $("#date").flatpickr({
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "d-m-Y",
        defaultDate: "today"
    });

    var datatable = $("#table_medicine").DataTable({
        language: {
            paginate: {
                next: "<i class='fa-solid fa-angles-right'></i>",
                previous: "<i class='fa-solid fa-angles-left'></i>",
            },
        },
        lengthChange: false,
        pageLength: 15,
        search: {
            caseInsensitive: true,
        },
        columnDefs: [
            { autoWidth: false, width: "5%", orderable: false, targets: 0 },
            { orderable: false, targets: 3 },
            { targets: 2, visible: false },
        ],
        fixedColumns: true
    });

    $("#search_name").on("keyup", function () {
        datatable.column(2).search(this.value).draw();
    });
    $("#search_category").on("change", function () {
        regex = "\\b" + this.value + "\\b";
        datatable.column(3).search(regex, true, false).draw();
    });

    var table_course = $("#table_course").DataTable({
        language: {
            paginate: {
                next: "<i class='fa-solid fa-angles-right'></i>",
                previous: "<i class='fa-solid fa-angles-left'></i>",
            },
        },
        lengthChange: false,
        pageLength: 15,
        search: {
            caseInsensitive: true,
        },
        columnDefs: [
            { autoWidth: false, width: "5%", orderable: false, targets: 0 },
            { orderable: false, targets: 3 },
            { targets: 3, visible: false },
        ],
        fixedColumns: true
    });

    $("#search_name_course").on("keyup", function () {
        table_course.column(2).search(this.value).draw();
    });
    $("#search_category_course").on("change", function () {
        regex = "\\b" + this.value + "\\b";
        table_course.column(3).search(regex, true, false).draw();
    });

    // Model Delete
    // $(".table tbody").on("click", ".dropdown-menu li .btn-delete", function () {
    //     let id = $(this).attr("data-id");
    //     $("#delete_employee_id").val(id);
    // });

    $('.medicine_check').on('click', function () {
        let id = $(this).attr("data-id");
        let _this = $(this).parents('tr');
        let medicine_id = _this.find('.medicine_id').text();
        let medicine_name = _this.find('.medicine_name').text();
        let medicine_price = _this.find('.medicine_price').text();
        let medicine_unit = _this.find('.medicine_unit').text();

        let bill_list = ``;
        if ($('#bill_list tr').length == 0) {
            bill_list = `
            <tr>
                <td class="text-center bill_list_id">${medicine_id}</td>
                <td class="ps-2">${medicine_name}</td>
                <td class="text-end">${medicine_price}</td>
                <td class="text-end bill_list_amount">0</td>
                <td class="text-center">${medicine_unit}</td>
                <td class="text-end">${medicine_price}</td>
                <td class="text-center">
                    <a href="" class="me-1"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="" class="fs-5 pt-2 text-danger"><i class="fa-solid fa-xmark"></i></a>
                </td>
            </tr>
            `;
            $('#bill_list').append(bill_list);
        }


        $.each($('#bill_list tr'), function (i, e) {
            if ($('.bill_list_id').text()[i] == medicine_id) {
                console.log(Number($('.bill_list_amount').text()[i]) + 1)
                $('.bill_list_amount').text()[i] = Number($('.bill_list_amount').text()[i]) + 1
            } else {

            }
        })
    })
});
