$(function () {
    $(".employee").addClass("active");

    $(".btn-edit").on("click", function () {
        var inputs = document.querySelectorAll("input");
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].disabled = false;
        }
        var selects = document.querySelectorAll("select");
        for (var i = 0; i < selects.length; i++) {
            selects[i].disabled = false;
        }
        var textarea = document.querySelectorAll("textarea");
        for (var i = 0; i < textarea.length; i++) {
            textarea[i].disabled = false;
        }
        $(".btn-edit").hide();
        $("#btn-submit").toggleClass('d-none');
    });

    $("#dob").flatpickr({
        altInput: true,
        altFormat: "j F Y",
        dateFormat: "d-m-Y",
    });

    $("#dob").change(function () {
        var date = $(this).val();
        var dob_year = date.substring(6, 10);
        var date_now = new Date().getFullYear();
        var dob_month = date.substring(3, 5);
        var month_now = new Date().getMonth() + 1;
        if (dob_month <= month_now) {
            $("#age").val(date_now - dob_year);
        } else {
            $("#age").val(date_now - dob_year - 1);
        }
    });

    var phone_number = new Cleave("#phone_number", {
        delimiter: "-",
        blocks: [3, 3, 4],
    });

    $("#province_select").on("change", function () {
        let province_id = $(this).val();
        $.ajax({
            url: "../../../get_district/" + province_id,
            method: "get",
        }).done(function (res) {
            let html = `<option disabled selected>Please your District</option>`;
            $.each(res, function (index, row) {
                html += `
        <option value="${row.id}" {{ old('district_id') == ${row.id} ? "selected" :""}}>${row.name_th}</option>
        `;
            });
            $("#district_select").html(html);
        });
    });
    $("#district_select").on("change", function () {
        let district_id = $(this).val();
        $.ajax({
            url: "../../../get_subdistrict/" + district_id,
            method: "get",
        }).done(function (res) {
            let html = `<option disabled selected>Please your Subdistrict</option>`;
            $.each(res, function (index, row) {
                html += `
        <option value="${row.id}" data-id="${row.zip_code}" {{ old('subdistrict_id') == ${row.id} ? "selected" :""}}>${row.name_th}</option>
        `;
            });
            $("#subdistrict_select").html(html);
        });
    });

    $("#subdistrict_select").on("change", function () {
        let zip = $(this).val();
        let zip_code = $("#subdistrict_select option[value=" + zip + "]").attr(
            "data-id"
        );
        $("#zip_code").val(zip_code);
    });


    $("#province_select").select2();
    $("#district_select").select2();
    $("#subdistrict_select").select2();

    ClassicEditor
    .create( document.querySelector( '#aboutme_editor' ),{
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageToolbar'],
    } )
    .catch( error => {
        console.error( error );
    } );

    $("#form_edit_employee")
        .parsley()
        .on("field:validated", function () {
            var ok = $(".parsley-error").length === 0;
            $(".parsley-error").toggleClass("is-invalid", !ok);
        })
        .on("form:submit", function () {
            return true; // Don't submit form for this demo
        });

    $(document).on("select2:open", () => {
        document.querySelector(".select2-search__field").focus();
    });
});
