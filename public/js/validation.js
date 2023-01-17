$("#formValidation").validate({
    ignore: [],
    debug: false,
    rules: {
        product_type_name: {
            required: true,
            minlength: 6,
        },
        note: {
            required: true,
        },
    },
    messages: {
        product_type_name: {
            required: "Tên loại sản phẩm không được bỏ trống",
            minlength: "Tên loại sản phẩm phải có ít nhất 6 ký tự",
        },
        note: {
            required: "Ghi chú không được bỏ trống",
        },
    },
    submitHandler: function (form) {
        alert("click add");
        form.submit();
    },
});
