$(function () {
    $(".doctor").addClass("active");

    var datatable = $(".table").DataTable({
        language: {
            paginate: {
                next: "<i class='fa-solid fa-angles-right'></i>",
                previous: "<i class='fa-solid fa-angles-left'></i>",
            },
        },
        lengthMenu: [5, 10, 75, 100],
        search: {
            caseInsensitive: true,
        },
    });

    $("#search_name").on("keyup", function () {
        datatable.column(2).search(this.value).draw();
    });
    $("#search_status").on("change", function () {
        regex = "\\b" + this.value + "\\b";
        datatable.column(6).search(regex, true, false).draw();
    });

    // Model Delete
    $(".table tbody").on("click", ".dropdown-menu li .btn-delete", function () {
        console.log(555);
        let id = $(this).attr("data-id");
        $("#delete_doctor_id").val(id);
    });
});
