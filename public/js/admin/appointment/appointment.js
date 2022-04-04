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

    $("#doctor_id").select2({
        dropdownParent: $("#modal_create"),
    });
    $("#patient_id").select2({
        dropdownParent: $("#modal_create"),
    });
    $("#e_doctor_id").select2({
        dropdownParent: $("#modal_update"),
    });
    $("#e_patient_id").select2({
        dropdownParent: $("#modal_update"),
    });
    $(document).on("select2:open", () => {
        document.querySelector(".select2-search__field").focus();
    });

    $("#time").flatpickr({
        allowInput: true,
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    });

    $("#date").flatpickr({
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
    });

    $("#e_appointment_time").flatpickr({
        allowInput: true,
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
    });

    $("#e_appointment_date").flatpickr({
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "Y-m-d",
    });

    ClassicEditor.create(document.querySelector("#doctor_comment")).catch(
        (error) => {
            console.error(error);
        }
    );

    // Model Delete
    $(".table tbody").on("click", ".dropdown-menu li .btn-cancel", function () {
        let id = $(this).attr("data-id");
        $("#appointment_id").val(id);
    });

    $(".table tbody").on("click", ".dropdown-menu li .btn-edit", function () {
        let id = $(this).attr("data-id");
        let _this = $(this).parents("tr");
        $(`#e_doctor_id option[value=${_this.find(".doctor_id").text()}]`).prop("selected", true).trigger('change');
        $(`#e_patient_id option[value=${_this.find(".patient_id").text()}]`).prop("selected", true).trigger('change');

        $("#e_appointment_id").val(id);
        $(".e_appointment_date").val(_this.find(".appointment_date").text());
        $(".e_appointment_time").val(_this.find(".appointment_time").text());
        $(".e_reason_for_appointment").val(
            _this.find(".reason_for_appointment").text()
        );
        $(".e_doctor_comment").val(_this.find(".doctor_comment").text());

        if (_this.find(".appointment_status a").text() == " Appointment") {
            $("#e_appointment_status option[value='0']").prop("selected", true);
        } else if (_this.find(".appointment_status a").text() == " Arrived") {
            $("#e_appointment_status option[value='1']").prop("selected", true);
        } else if (_this.find(".appointment_status a").text() == " Pending") {
            $("#e_appointment_status option[value='2']").prop("selected", true);
        } else if (_this.find(".appointment_status a").text() == " Completed") {
            $("#e_appointment_status option[value='3']").prop("selected", true);
        } else if (_this.find(".appointment_status a").text() == " Cancel") {
            $("#e_appointment_status option[value='4']").prop("selected", true);
        }
    });
});
