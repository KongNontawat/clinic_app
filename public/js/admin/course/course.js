$(function () {
    $(".course").addClass("active");
    $(".course ul").addClass("show ");
    $(".course a.menu-item-course").addClass("active");

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
            { orderable: false, targets: 1 },
            { orderable: false, targets: 2 },
            { orderable: false, targets: 7 },
            { orderable: false, targets: 8 },
            { orderable: false, targets: 9 },
            { targets: [1, 2], searchable: true },
            { targets: '_all', searchable: false }
        ],

    });

    $("#search_name").on("keyup", function () {
        datatable.column(1).search(this.value).draw();
    });

    // $('#search_name').unbind().on('keyup', function () {
    //     var searchTerm = this.value.toLowerCase();
    //     $.fn.dataTable.ext.search.push(function (settings, data, dataIndex) {
    //         //search only in column 1 and 2
    //         if (~data[0].toLowerCase().indexOf(searchTerm)) return true;
    //         if (~data[1].toLowerCase().indexOf(searchTerm)) return true;
    //         return false;
    //     })
    //     datatable.draw();
    //     $.fn.dataTable.ext.search.pop();
    // })

    $("#search_category").on("change", function () {
        regex = "\\b" + this.value + "\\b";
        datatable.column(2).search(regex, true, false).draw();
    });
    $("#search_type").on("change", function () {
        regex = "\\b" + this.value + "\\b";
        datatable.column(7).search(regex, true, false).draw();
    });
    $("#search_status").on("change", function () {
        regex = "\\b" + this.value + "\\b";
        datatable.column(8).search(regex, true, false).draw();
    });

    ClassicEditor.create(document.querySelector("#course_detail"), {
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageToolbar'],
    }).catch(
        (error) => {
            console.error(error);
        }
    );

    let e_course_detail;
    ClassicEditor.create(document.querySelector("#e_course_detail"), {
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageToolbar'],
    })
        .then(editor => {
            e_course_detail = editor;
        })
        .catch(
            (error) => {
                console.error(error);
            }
        );

    // Model Delete
    $(".table tbody").on("click", ".dropdown-menu li .btn-delete", function () {
        let id = $(this).attr("data-id");
        $("#delete_course_id").val(id);
    });

    $(".table tbody").on("click", ".dropdown-menu li .btn-edit", function () {
        let id = $(this).attr("data-id");
        $.ajax({
            url: '../../admin/course/edit',
            method: 'get',
            data: { course_id: id }
        }).done(function (res) {
            $('#course_id').val(res.course_id);
            $(`.e_course_category_id option[value=${res.course_category_id}]`).prop("selected", true).trigger('change');
            $(".e_course_name").val(res.course_name);
            $(".e_course_doctor_price").val(res.course_doctor_price);
            $(".e_course_assistant_price").val(res.course_assistant_price);
            $(".e_course_course_price").val(res.course_course_price);
            $(".e_course_total_price").val(res.course_total_price);
            $(".e_course_number_of_time").val(res.course_number_of_time);
            $(`input:radio[value='${res.course_type}']`).prop("checked", true);

            if (res.course_status == '0') {
                $("#e_course_status option[value='0']").prop("selected", true)
            } else if (res.course_status == '1') {
                $("#e_course_status option[value='1']").prop("selected", true)
            }

            e_course_detail.setData(res.course_detail);

        }).fail(function (err) {
            console.error(err);
        })
    });


    $(".on_course_course_price").on("keyup", function () {
        let total = Number($('.on_course_doctor_price').val()) + Number($('.on_course_assistant_price').val()) + Number($('.on_course_course_price').val());
        $('.on_course_total_price').val(total)
    });
    $(".on_course_assistant_price").on("keyup", function () {
        let total = Number($('.on_course_doctor_price').val()) + Number($('.on_course_assistant_price').val()) + Number($('.on_course_course_price').val());
        $('.on_course_total_price').val(total)
    });
    $(".on_course_doctor_price").on("keyup", function () {
        let total = Number($('.on_course_doctor_price').val()) + Number($('.on_course_assistant_price').val()) + Number($('.on_course_course_price').val());
        $('.on_course_total_price').val(total)
    });
    $(".e_course_course_price").on("keyup", function () {
        let total = Number($('.e_course_doctor_price').val()) + Number($('.e_course_assistant_price').val()) + Number($('.e_course_course_price').val());
        $('.e_course_total_price').val(total)
    });
    $(".e_course_assistant_price").on("keyup", function () {
        let total = Number($('.e_course_doctor_price').val()) + Number($('.e_course_assistant_price').val()) + Number($('.e_course_course_price').val());
        $('.e_course_total_price').val(total)
    });
    $(".e_course_doctor_price").on("keyup", function () {
        let total = Number($('.e_course_doctor_price').val()) + Number($('.e_course_assistant_price').val()) + Number($('.e_course_course_price').val());
        $('.e_course_total_price').val(total)
    });
});
