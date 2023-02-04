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
        admin_name: {
            required: true,
            minlength: 5,
            maxlength: 50,
        },
        admin_email: {
            required: true,
            email: 100,
        },
        admin_phone: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10,
        },
        admin_password: {
            required: true,
            minlength: 5,
        },
        password_confirmation: {
            required: true,
            equalTo: "#admin_password",
        },
        calculation_name: {
            required: true,
            minlength: 2,
        },
        supplier_name: {
            required: true,
            minlength: 5,
            maxlength: 50,
        },
        supplier_email: {
            required: true,
            email: 100,
        },
        supplier_phone: {
            required: true,
            digits: true,
            minlength: 10,
            maxlength: 10,
        },
        supplier_website: {
            required: true,
        },
    },
    messages: {
        product_type_name: {
            required: "Tên loại sản phẩm không được bỏ trống",
            min: "Tên loại sản phẩm phải có ít nhất 6 ký tự",
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
