$(function() {
    $(".schedule").addClass("active");

    $("#doctor_id").select2({
        dropdownParent: $("#modal_create"),
    });
    $("#patient_id").select2({
        dropdownParent: $("#modal_create"),
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

    
    ClassicEditor.create(document.querySelector("#doctor_comment"),{
        removePlugins: ['CKFinderUploadAdapter', 'CKFinder', 'EasyImage', 'Image', 'ImageToolbar'],
    }).catch(
        (error) => {
            console.error(error);
        }
    );

})



