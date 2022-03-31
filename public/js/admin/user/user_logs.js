$(function () {
    $(".user").addClass("active");
    $(".user ul").addClass("show ");
    $(".user a.menu-item-user-log").addClass("active");

    var datatable = $(".table").DataTable({
        order: [[0, 'desc']],
        language: {
            paginate: {
                next: "<i class='fa-solid fa-angles-right'></i>",
                previous: "<i class='fa-solid fa-angles-left'></i>",
            },
        },
        lengthMenu: [15, 20, 30, 50, 100],
    });

    $("#search_name").on("keyup", function () {
        datatable.column(1).search(this.value).draw();
    });
    $("#search_status").on("change", function () {
        regex = "\\b" + this.value + "\\b";
        datatable.column(6).search(regex, true, false).draw();
    });

    // Model Delete
    $(".table tbody").on("click", ".dropdown-menu li .btn-delete", function () {
        console.log(555);
        let id = $(this).attr("data-id");
        $("#delete_user_id").val(id);
    });

    $(".table tbody").on("click", ".dropdown-menu li .btn-edit", function () {
        let id = $(this).attr("data-id");
        let _this = $(this).parents('tr');
        $("#e_user_id").val(id);
        $("#e_user_name").val(_this.find('.user_name').text());
        $("#e_user_email").val(_this.find('.user_email').text());
        $(`#e_user_role option[value=${_this.find('.user_role').text()}]`).prop("selected", true)
        if(_this.find('.user_status a').text() == ' Abnormal') {
            $("#e_user_status option[value='0']").prop("selected", true)
        }else if(_this.find('.user_status a').text() == ' Normal') {
            $("#e_user_status option[value='1']").prop("selected", true)
        }
        $("#e_old_image").val(_this.find('.user_image').attr('alt'));

    });
});
