$(document).ready(function () {
    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'login.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#message').removeClass('error-message').addClass('success-message').text(response.message);
                    setTimeout(function () {
                        window.location.href = 'index.php';
                    }, 1000);
                } else {
                    $('#message').addClass('error-message').text(response.message);
                }
            },
            error: function () {
                $('#message').addClass('error-message').text('Eroare la procesarea cererii.');
            }
        });
    });

    $('#register-form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: 'register.php',
            type: 'POST',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    $('#message').removeClass('error-message').addClass('success-message').text(response.message);
                    setTimeout(function () {
                        window.location.href = 'index.php';
                    }, 1000);
                } else {
                    $('#message').addClass('error-message').text(response.message);
                }
            },
            error: function () {
                $('#message').addClass('error-message').text('Eroare la procesarea cererii.');
            }
        });
    });
});