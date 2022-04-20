$(function () {
    $(".medicine").addClass("active");

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
        columnDefs: [
            { orderable: false, targets: 8 }
        ],

    });

    $("#search_name").on("keyup", function () {
        datatable.column(2).search(this.value).draw();
    });

    $("#search_category").on("change", function () {
        regex = "\\b" + this.value + "\\b";
        datatable.column(3).search(regex, true, false).draw();
    });
    $("#search_type").on("change", function () {
        datatable.column(1).search(this.value).draw();
    });
    $("#search_status").on("change", function () {
        regex = "\\b" + this.value + "\\b";
        datatable.column(7).search(regex, true, false).draw();
    });

    ClassicEditor.create(document.querySelector("#medicine_detail"), {
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageToolbar'],
    }).catch(
        (error) => {
            console.error(error);
        }
    );

    let e_medicine_detail;
    ClassicEditor.create(document.querySelector("#e_medicine_detail"), {
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageToolbar'],
    })
        .then(editor => {
            e_medicine_detail = editor;
        })
        .catch(
            (error) => {
                console.error(error);
            }
        );

    ClassicEditor.create(document.querySelector("#medicine_how_to_use"), {
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageToolbar'],
    }).catch(
        (error) => {
            console.error(error);
        }
    );

    let e_medicine_how_to_use;
    ClassicEditor.create(document.querySelector("#e_medicine_how_to_use"), {
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageToolbar'],
    })
        .then(editor => {
            e_medicine_how_to_use = editor;
        })
        .catch(
            (error) => {
                console.error(error);
            }
        );

    // Model Delete
    $(".table tbody").on("click", ".dropdown-menu li .btn-delete", function () {
        let id = $(this).attr("data-id");
        $("#delete_medicine_id").val(id);
    });

    $(".table tbody").on("click", ".dropdown-menu li .btn-edit", function () {
        let id = $(this).attr("data-id");
        $.ajax({
            url: '../../admin/medicine/edit',
            method: 'get',
            data: { medicine_id: id }
        }).done(function (res) {
            $(`.e_medicine_type:radio[value='${res.medicine_type}']`).prop("checked", true);

            $('#medicine_id').val(res.medicine_id);
            $(`.e_medicine_category_id option[value=${res.medicine_category_id}]`).prop("selected", true).trigger('change');
            $(".e_medicine_name").val(res.medicine_name);
            $(".e_medicine_price").val(res.medicine_price);
            $(".e_medicine_stock").val(res.medicine_stock);
            $(".e_medicine_unit").val(res.medicine_unit);
            $(`.e_medicine_licensed_doctor_id option[value=${res.medicine_licensed_doctor_id}]`).prop("selected", true).trigger('change');


            if (res.medicine_status == '0') {
                $("#e_medicine_status option[value='0']").prop("selected", true)
            } else if (res.medicine_status == '1') {
                $("#e_medicine_status option[value='1']").prop("selected", true)
            }

            e_medicine_how_to_use.setData(res.medicine_how_to_use);
            e_medicine_detail.setData(res.medicine_detail);

        }).fail(function (err) {
            console.error(err);
        })
    });

});
