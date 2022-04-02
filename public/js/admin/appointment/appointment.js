$(function () {
    $(".appointment").addClass("active");

    var datatable = $(".table").DataTable({
        language: {
            paginate: {
                next: "<i class='fa-solid fa-angles-right'></i>",
                previous: "<i class='fa-solid fa-angles-left'></i>",
            },
        },
        lengthMenu: [10, 15, 20, 30, 50, 100],
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
        let id = $(this).attr("data-id");
        $("#delete_user_id").val(id);
    });

    $(".table tbody").on("click", ".dropdown-menu li .btn-edit", function () {

    });

    $("#time").flatpickr({
        allowInput: true,
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });

    $("#date").flatpickr({
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "d-m-Y",
    });

    ClassicEditor
    .create( document.querySelector( '#note_editor' ) )
    .catch( error => {
        console.error( error );
    } );
});
