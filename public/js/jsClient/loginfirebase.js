var firebaseConfig = {

    // apiKey: "AIzaSyB2CqirEwrZeVC6YKIHitaIHCxLHygOlAs",
    // authDomain: "fir-6cd66.firebaseapp.com",
    // databaseURL: "https://fir-6cd66-default-rtdb.firebaseio.com",
    // projectId: "fir-6cd66",
    // storageBucket: "fir-6cd66.appspot.com",
    // messagingSenderId: "167315184992",
    // appId: "1:167315184992:web:9bfc9570f1fd3179611205",
    // measurementId: "G-0195R4LR4V"

    apiKey: "AIzaSyBSbVUQA5U6G07cOnpm14IKXEsLVtqeD6U",
    authDomain: "thanhdo-b6fce.firebaseapp.com",
    projectId: "thanhdo-b6fce",
    storageBucket: "thanhdo-b6fce.appspot.com",
    messagingSenderId: "747430092503",
    appId: "1:747430092503:web:d9dc31224fb446dc42da92",
    measurementId: "G-DXMKVE7M6L"


    // apiKey: "AIzaSyCJ8pbe36jbzUmVQK_pFOZlPKXRW6JNoG8",
    // authDomain: "test2-5f15d.firebaseapp.com",
    // projectId: "test2-5f15d",
    // storageBucket: "test2-5f15d.appspot.com",
    // messagingSenderId: "660182456617",
    // appId: "1:660182456617:web:89d3c4ddf2b96307efff38",
    // measurementId: "G-31DTR2L4VF"
};
firebase.initializeApp(firebaseConfig);

window.onload = function () {
    render();
};
document.getElementById("number").addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        sendOTP();
    }
});

function checkEnter(event) {
    if (event.key === "Enter") {
        verify(); // Gọi hàm verify() khi ấn Enter
    }
}

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
        'size': 'invisible',
        'callback': (response) => {
            // reCAPTCHA solved, allow signInWithPhoneNumber.
            // onSignInSubmit();
        }
    });
    recaptchaVerifier.render();
}


var coderesult;

function validatePhoneNumber(input) {
    var phoneNumber = input.value;
    var formattedPhoneNumber = '';
    for (var i = 0; i < phoneNumber.length; i++) {
        if (phoneNumber[i] >= '0' && phoneNumber[i] <= '9') {
            formattedPhoneNumber += phoneNumber[i];
        }
    }
    if (formattedPhoneNumber !== phoneNumber) {
        input.value = formattedPhoneNumber;
    }
}

var currentSendOTPButton;  // Biến lưu trữ nút "Gửi OTP" hiện tại
function sendOTP(phoneInputId, buttonId) {
    var number = "+84" + $("#" + phoneInputId).val();

    var phonePattern = /^(\+84|0)[0-9]{9,10}$/;
    currentSendOTPButton = buttonId;
    if (phonePattern.test(number)) {
        // kiểm tra số điện thoại
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            toastr.options = {
                "positionClass": "toast-top-center",
            };
            toastr['success']
            ('Gửi OTP thành công');
            localStorage.setItem("phoneNumber", number);
            localStorage.setItem("verificationId", confirmationResult.verificationId); // Lưu verificationId vào localStorage
            document.getElementById("popupContainer2").style.display = "block";
            document.getElementById("popupContainer").style.display = "none";

            const resendOTPButton = document.getElementById('resendOTPButton');
            resendOTPButton.classList.remove('fxt-btn-resend'); // Remove the class
            resendOTPButton.disabled = true;
            resendButtonCooldown = true;
            startCountdown(60);
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    } else {
        toastr.options = {
            "positionClass": "toast-top-center",
        };
        toastr['error']
        ('Xin vui lòng nhập số điện thoại');
    }
}

function verify(successAction) {
    var code = $("#verificationId").val();
    // Lấy số điện thoại từ localStorage
    var phoneNumber = localStorage.getItem("phoneNumber");
    // console.log(phoneNumber);
    var cleanedPhoneNumber = phoneNumber.replace(/^\+84/, ''); // Loại bỏ tiền tố +84
    const verificationId = localStorage.getItem("verificationId");
    if (!code) {
        toastr.options = {
            "positionClass": "toast-top-center",
        };
        toastr['error']
        ('Bạn chưa nhập OTP.');
        return;
    }
    const confirmationResult = firebase.auth.PhoneAuthProvider.credential(verificationId, code);
    firebase.auth().signInWithCredential(confirmationResult).then(function (result) {
        if (currentSendOTPButton === 'button1') {
            $.ajax({
                type: 'POST',
                url: '/process',
                data: {
                    phone_number: phoneNumber, // Truyền giá trị số điện thoại vào yêu cầu POST
                },
                success: function (data) {
                    if (data.user_type === 'ADMIN') {
                        window.location.href = "/admin/dashboard"; // Chuyển hướng đến trang admin
                    } else if (data.user_type === 'STYLIST') {
                        window.location.href = "/admin/booking_blade/index";
                    } else {
                        window.location.href = "/"; // Chuyển hướng đến trang người dùng thông thường
                    }
                },
            });
        } else if (currentSendOTPButton === 'button2') {
            window.location.href = '/user/booking?phone=' + cleanedPhoneNumber;
        }

    }).catch(function (error) {
        toastr.options = {
            "positionClass": "toast-top-center",
        };
        toastr['error']
        ('Mã OTP không hợp lệ.');
    });
}

function resendOTP() {
    var phoneNumber = localStorage.getItem("phoneNumber");
    var verificationId = localStorage.getItem("verificationId");
    // Thực hiện gửi lại OTP bằng cách sử dụng verificationId đã lưu trữ
    firebase.auth().signInWithPhoneNumber(phoneNumber, window.recaptchaVerifier)
        .then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            console.log(confirmationResult);
            toastr.options = {
                "positionClass": "toast-top-center",
            };
            toastr['success']
            ('Gửi lại OTP thành công');
            // Cập nhật lại verificationId mới
            localStorage.setItem("verificationId", confirmationResult.verificationId);

            const resendOTPButton = document.getElementById('resendOTPButton');
            resendOTPButton.classList.remove('fxt-btn-resend'); // Remove the class
            resendOTPButton.disabled = true;
            resendButtonCooldown = true;
            startCountdown(60);
        })
        .catch(function (error) {
            console.error("Lỗi khi gửi lại OTP:", error);
            toastr.options = {
                "positionClass": "toast-top-center",
            };
            toastr['error']
            ('Lỗi khi gửi lại OTP');
        });
}

// thực hiện nút ấn
var openButton = document.getElementById("openPopupButton");
var closeButton = document.getElementById("closePopupButton");
var closeOTP = document.getElementById("closePopupOTP");
var closePopupBooking = document.getElementById("closePopupBooking");
openButton.addEventListener("click", function () {
    popupContainer.style.display = "block";
});
closeButton.addEventListener("click", function () {
    popupContainer.style.display = "none";
});
closeOTP.addEventListener("click", function () {
    popupContainer2.style.display = "none";
});
closePopupBooking.addEventListener("click", function () {
    popupContainer3.style.display = "none";
});

let countdown;
let isCounting = false;
let resendButtonCooldown = false;

function startCountdown(seconds) {
    if (!isCounting) {
        isCounting = true;
        const countdownDisplay = document.getElementById('countdown');
        const resendOTPButton = document.getElementById('resendOTPButton');

        countdownDisplay.textContent = formatTime(seconds);

        countdown = setInterval(() => {
            seconds--;

            if (seconds < 0) {
                clearInterval(countdown);
                countdownDisplay.textContent = '';
                isCounting = false;
                resendButtonCooldown = false;
                resendOTPButton.disabled = false;
                resendOTPButton.classList.add('fxt-btn-resend'); // Add the class
            } else {
                countdownDisplay.textContent = formatTime(seconds);
            }
        }, 1000);
    }
}

function formatTime(seconds) {
    const minutes = Math.floor(seconds / 60);
    const remainingSeconds = seconds % 60;
    return `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
}

