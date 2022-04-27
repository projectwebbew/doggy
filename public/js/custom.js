$.ajaxSetup({
    headers:
        {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
});


// linkCheck = $('.form-check-input').add();
// let formCheck = $('.checkBoxForm');
// linkCheck.click(function (e) {
//     formCheck.submit();
// })
// linkCheck.each(function (index, element) {
//     if (element.checked) {
//         $('section_one').scrollTop(600)
//     }
//
// })

$(".update-cart").click(function (e) {
    e.preventDefault();

    var ele = $(this);

    $.ajax({
        url: 'update-cart',
        method: "patch",
        data: {
            id: ele.next().val(),
            quantity: ele.parents("tr").find(".quantity").val()
        },

        success: function (response) {
            console.log(response)
            window.location.reload();
        }
    });
});
$(".remove-from-cart").click(function (e) {
    e.preventDefault();
    var ele = $(this);
    if (confirm("Are you sure")) {
        $.ajax({
            url: 'remove-from-cart',
            method: "DELETE",
            data: {
                id: ele.parents("tr").find(".id").val(),
            },
            success: function (response) {
                window.location.reload();
            }
        });
    }
});
