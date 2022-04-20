$(function () {
    $(".patient").addClass("active");
    $(".patient ul").addClass("show ");

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
            {autoWidth: false, width: "5%", orderable: false, targets: 0 },
            { orderable: false, targets: 3 },
            { targets: 3, visible: false},
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
            {autoWidth: false, width: "5%", orderable: false, targets: 0 },
            { orderable: false, targets: 3 },
            { targets: 3, visible: false},
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
});
