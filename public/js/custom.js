
let linkCheck = $('.form-check-input').add();
let formCheck = $('.checkBoxForm');
linkCheck.click(function (e) {
    formCheck.submit();
})
linkCheck.each(function (index, element) {
    if (element.checked){
        $('section_one').scrollTop(600)
    }

})

