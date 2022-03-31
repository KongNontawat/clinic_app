$(function () {
    $(".patient").addClass("active");
    $(".patient ul").addClass("show ");
    $(".patient a.menu-item-patient").addClass("active");

    
    var minDate, maxDate;

    // Custom filtering function which will search data in column four between two values
    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date(data[8]);

        if (
            (min === "" && max === "") ||
            (min === "" && data[8] <= max) ||
            (min <= data[8] && max === "") ||
            (min <= data[8] && data[8] <= max)
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
        language: {
            paginate: {
                next: "<i class='fa-solid fa-angles-right'></i>",
                previous: "<i class='fa-solid fa-angles-left'></i>",
            },
        },
        lengthMenu: [5, 10, 15, 20, 30, 50, 100],
        search: {
            caseInsensitive: true,
        },
    });

    

    $("#search_name").on("keyup", function () {
        datatable.column(1).search(this.value).draw();
    });
    $("#search_idcard").on("keyup", function () {
        datatable.column(2).search(this.value).draw();
    });
    $("#search_group").on("change", function () {
        datatable.column(7).search(this.value).draw();
    });
    $("#search_status").on("change", function () {
        regex = "\\b" + this.value + "\\b";
        datatable.column(9).search(regex, true, false).draw();
    });
    $("#min, #max").on("change", function () {
        datatable.draw();
    });

    var id_card = new Cleave("#search_idcard", {
        delimiter: " ",
        blocks: [1, 4, 5, 2, 1],
    });

    // Model Delete
    $('.table tbody').on('click',".dropdown-menu li .btn-delete", function () {
      console.log(555)
      let id = $(this).attr("data-id");
      $("#delete_patient_id").val(id);
  });
});
