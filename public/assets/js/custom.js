//! custom toastr
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-bottom-left",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

//! validate vnd
$("input[data-type='currency']").on({
    keyup: function() {
        formatCurrency($(this));
    },
    blur: function() {
        formatCurrency($(this), "blur");
    }
});

function loadInput() {
    $("input[data-type='currency']").on({
        keyup: function() {
            formatCurrency($(this));
        },
        blur: function() {
            formatCurrency($(this), "blur");
        }
    });
}

function formatNumber(n) {
    if (n.length >= 0 && n.length <= 20) {
        return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    } else {
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'Số tiền không hợp lệ !',
            showConfirmButton: false,
            timer: 1200
        });
        return '';
    }
}

function formatCurrency(input, blur) {
    var input_val = input.val();
    if (input_val === "") { return; }
    var original_len = input_val.length;
    var caret_pos = input.prop("selectionStart");
    if (input_val.indexOf(".") >= 0) {
        var decimal_pos = input_val.indexOf(".");
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);
        left_side = formatNumber(left_side);
        right_side = formatNumber(right_side);
        if (blur === "blur") {
            right_side += "";
        }
        right_side = right_side.substring(0, 0);
        input_val = left_side + "." + right_side;

    } else {
        input_val = formatNumber(input_val);
        input_val = input_val;
        if (blur === "blur") {
            input_val += "";
        }
    }
    input.val(input_val);
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}

function formatDollar(num) {
    var p = num.toFixed(2).split(".");
    return p[0].split("").reverse().reduce(function(acc, num, i, orig) {
        return num == "-" ? acc : num + (i && !(i % 3) ? "," : "") + acc;
    }, "");
}

//! validate phone
$("input[data-type='phone']").on('change', function() {
    var phone = $(this).val();
    if (phone != "" && phone.length > 0 && phone.length <= 15) {
        var phone_regex = /^[0-9]{6,13}$/;
        if (phone.match(phone_regex)) {
            return phone;
        } else {
            toastr["error"]("Số điện thoại không đúng định dạng!<br> Nhập lại đi em ơi <3");
            return $(this).val('');
        }
    }
});

function loadCheckPhone() {
    $("input[data-type='phone']").on('change', function() {
        var phone = $(this).val();
        if (phone != "" && phone.length > 0 && phone.length <= 15) {
            var phone_regex = /^[0-9]{6,13}$/;
            if (phone.match(phone_regex)) {
                return phone;
            } else {
                toastr["error"]("Số điện thoại không đúng định dạng !<br> Nhập lại đi em ơi <3");
                return $(this).val('');
            }
        }
    });
}

//! validate number
$("input[data-type='number']").on('change', function() {
    var num = $(this).val();
    console.log(num);
    var dataVal = $(this).attr('data-val');
    if (num != "" && num.length > 0 && num.length <= 25) {
        var number_regex = /^[0-9]{6,50}$/;
        if (num.match(number_regex)) {
            return num;
        } else {
            toastr["error"](dataVal + " không đúng định dạng!");
            return $(this).val('');
        }
    }
});

function loadCheckNumber() {
    $("input[data-type='number']").on('change', function() {
        var num = $(this).val();
        var dataVal = $(this).attr('data-val');
        if (num != "" && num.length > 0 && num.length <= 25) {
            var number_regex = /^[0-9]{6,50}$/;
            if (num.match(number_regex)) {
                return num;
            } else {
                toastr["error"](dataVal + " không đúng định dạng!");
                return $(this).val('');
            }
        }
    });
}

//! validate percent
$("input[data-type='percent']").on('change', function() {
    var num = $(this).val();
    var dataVal = $(this).attr('data-val');
    if (num != "") {
        var number_regex = /(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)/;
        if (num.match(number_regex)) {
            return num;
        } else {
            toastr["error"](dataVal + " không đúng định dạng!");
            return $(this).val('');
        }
    }
});

function loadCheckPercent() {
    $("input[data-type='percent']").on('change', function() {
        var num = $(this).val();
        var dataVal = $(this).attr('data-val');
        if (num != "") {
            var number_regex = /(^100(\.0{1,2})?$)|(^([1-9]([0-9])?|0)(\.[0-9]{1,2})?$)/;
            if (num.match(number_regex)) {
                return num;
            } else {
                toastr["error"](dataVal + " không đúng định dạng!");
                return $(this).val('');
            }
        }
    });
}

// ! Validate property properties
$("input[data-type='numberProperty']").on('change', function() {
    var num = $(this).val();
    console.log(num);
    if (num != "" && num.length > 0 && num.length <= 25) {
        var number_regex = /^[A-Za-z0-9]{4,100}$/;
        if (num.match(number_regex)) {
            return num;
        } else {
            toastr["error"]("không đúng định dạng!");
            return $(this).val('');
        }
    }
});

function loadCheckNumberProperty() {
    $("input[data-type='numberProperty']").on('change', function() {
        var num = $(this).val();
        if (num != "" && num.length > 0 && num.length <= 25) {
            var number_regex = /^[A-Za-z0-9]{4,100}$/;
            if (num.match(number_regex)) {
                return num;
            } else {
                toastr["error"]("Không đúng định dạng!");
                return $(this).val('');
            }
        }
    });
}

function notification(position, icon, title, width, showConfirmButton, timer) {
    Swal.fire({
        position: position,
        icon: icon,
        title: title,
        width: width,
        showConfirmButton: showConfirmButton,
        timer: timer
    });
}