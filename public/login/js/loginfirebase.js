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
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}


var coderesult;
function sendOTP() {

    var number = "+84" + $("#number").val();
    var phonePattern = /^(\+84|0)[0-9]{9,10}$/;

    if (phonePattern.test(number)) {
        // kiểm tra số điện thoại
        firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
            window.confirmationResult = confirmationResult;
            coderesult = confirmationResult;
            console.log(coderesult);
            $("#successAuth").text("Gửi OTP thành công");
            $("#successAuth").show();
            localStorage.setItem("phoneNumber", number);
            localStorage.setItem("verificationId", confirmationResult.verificationId); // Lưu verificationId vào localStorage
            document.getElementById("popupContainer2").style.display = "block";
            document.getElementById("popupContainer").style.display = "none";
        }).catch(function (error) {
            $("#error").text(error.message);
            $("#error").show();
        });
    } else {
        $("#error").text("Số điện thoại không hợp lệ.");
        $("#error").show();
    }
}

function verify() {
    var code = $("#verificationId").val();
    // Lấy số điện thoại từ localStorage
    var phoneNumber = localStorage.getItem("phoneNumber");
    // console.log(phoneNumber);
    const verificationId = localStorage.getItem("verificationId");
    if (!code) {
        $("#error1").text("Bạn chưa nhập OTP.");
        $("#error1").show();
        return;
    }
    const confirmationResult = firebase.auth.PhoneAuthProvider.credential(verificationId, code);
    firebase.auth().signInWithCredential(confirmationResult).then(function (result) {

        $.ajax({
            type: 'POST',
            url: '/process',
            data: {
                phone_number: phoneNumber, // Truyền giá trị số điện thoại vào yêu cầu POST
            },
            success: function (data) {
                if (data.user_type === 'admin') {
                    window.location.href = "/admin/dashboard"; // Chuyển hướng đến trang admin
                } else {
                    window.location.href = "/"; // Chuyển hướng đến trang người dùng thông thường
                }
            },
        });
    }).catch(function (error) {
        $("#error1").text("Mã OTP không hợp lệ.");
        $("#error1").show();
    });
}

// thực hiện nút ấn
    var openButton = document.getElementById("openPopupButton");
    var closeButton = document.getElementById("closePopupButton");
    var closeOTP = document.getElementById("closePopupOTP");
    openButton.addEventListener("click", function () {
    popupContainer.style.display = "block";
});
    closeButton.addEventListener("click", function () {
    popupContainer.style.display = "none";
});
    closeOTP.addEventListener("click", function () {
    popupContainer2.style.display = "none";
});
