$(function () {
    $(".appointment").addClass("active");

    var minDate, maxDate;

    $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date(data[3]);

        if (
            (min === "" && max === "") ||
            (min === "" && data[3] <= max) ||
            (min <= data[3] && max === "") ||
            (min <= data[3] && data[3] <= max)
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
        order: [[3, 'asc'], [4, 'asc']],
        language: {
            paginate: {
                next: "<i class='fa-solid fa-angles-right'></i>",
                previous: "<i class='fa-solid fa-angles-left'></i>",
            },
        },
        lengthMenu: [10, 15, 20, 30, 50, 100],
        columnDefs: [
            { orderable: false, targets: 2 },
            { orderable: false, targets: 6 }
        ],
    });


    $("#search_name").on("keyup", function () {
        datatable.column([1,2]).search(this.value).draw();
    });
    $("#search_status").on("change", function () {
        datatable.column(5).search(this.value).draw();
    });
    $("#min, #max").on("change", function () {
        datatable.draw();
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
        altFormat: "d m Y",
        dateFormat: "Y-m-d",
    });

    ClassicEditor.create(document.querySelector("#doctor_comment")).catch(
        (error) => {
            console.error(error);
        }
    );

    let e_doctor_comment;
    ClassicEditor.create(document.querySelector("#e_doctor_comment"))
        .then(editor => {
            e_doctor_comment = editor;
        })
        .catch(
            (error) => {
                console.error(error);
            }
        );

    // Model Delete
    $(".table tbody").on("click", ".dropdown-menu li .btn-cancel", function () {
        let id = $(this).attr("data-id");
        $("#appointment_id").val(id);
    });

    $(".table tbody").on("click", ".dropdown-menu li .btn-view", function () {
        let id = $(this).attr("data-id");
        $('#modal_detail').modal('show');
        $.ajax({
            method: 'get',
            data: {
                id: id
            },
            url: "../admin/appointment/show"
        }).done(function (res) {
            let data = res[0];
            $('.show_patient_name').text(`${data.patient_title} ${data.patient_fname} ${data.patient_lname}`)
            $('.show_patient_opd').text(`${data.opd_id}`)
            var date = data.patient_birthdate;
            var age = 0;
            var dob_year = date.substring(6, 10);
            var date_now = new Date().getFullYear();
            var dob_month = date.substring(3, 5);
            var month_now = new Date().getMonth() + 1;
            if (dob_month <= month_now) {
                age = date_now - dob_year;
            } else {
                age = date_now - dob_year - 1;
            }
            $('.show_patient_age').text(`${age} ปี`)
            $('.show_patient_phone').text(`${data.patient_phone}`)

            if (data.congenital_disease != null) {
                $('.show_patient_congenital_disease').text(`${data.congenital_disease}`)
            } else {
                $('.show_patient_congenital_disease').text(`-`)
            }
            if (data.drug_allergies != null) {
                $('.show_patient_drug_allergies').text(`${data.drug_allergies}`)
            } else {
                $('.show_patient_drug_allergies').text(`-`)
            }
            let appointment_date = new Date(data.appointment_date);
            let appointment_date_th = appointment_date.toLocaleDateString('th-TH', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
            })
            $('.show_appointment_number').text(`${data.appointment_number}`)
            $('.show_appointment_date').text(`${appointment_date_th}`)
            $('.show_appointment_time').text(`${data.appointment_time} น.`)
            $('.show_doctor_name').text(`${data.doctor_title} ${data.doctor_fname} ${data.doctor_lname}`)


            $('.show_reason_for_appointment').text(`${data.reason_for_appointment}`)
            $('.show_doctor_comment').html(`${data.doctor_comment}`)

            let year = new Date(data.created_at).getFullYear();
            let month = new Date(data.created_at).getMonth();
            let day = new Date(data.created_at).getDate();

            let created_at = new Date(data.created_at);
            let date_th = created_at.toLocaleDateString('th-TH', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
            })

            $('.show_created_at').text(`${date_th}`)



        })
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
        e_doctor_comment.setData(_this.find(".doctor_comment").text());

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
