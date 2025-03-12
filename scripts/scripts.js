document.addEventListener('DOMContentLoaded', () => {
    fetch('get_countries.php')
        .then(response => response.json())
        .then(data => {
            const countrySelect = document.getElementById('pais_id');
            data.forEach(country => {
                const option = document.createElement('option');
                option.value = country.id;
                option.textContent = country.nombre;
                countrySelect.appendChild(option);
            });
        });
});

function updateCities() {
    const countryId = document.getElementById('pais_id').value;
    const citySelect = document.getElementById('ciudad');
    citySelect.innerHTML = '<option value="">Selecciona tu ciudad</option>';
    
    if (countryId) {
        fetch(`get_cities.php?pais_id=${countryId}`)
            .then(response => response.json())
            .then(data => {
                data.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.id;
                    option.textContent = city.nombre;
                    citySelect.appendChild(option);
                });
            });
    }
}

function togglePassword() {
    const passwordField = document.getElementById("password");
    const confirmPasswordField = document.getElementById("confirm-password");
    const showPassword = document.getElementById("show-password");

    const type = showPassword.checked ? 'text' : 'password';
    passwordField.type = type;
    confirmPasswordField.type = type;
}

function validatePassword() {
    const passwordField = document.getElementById("password");
    const errorMessage = document.getElementById("error-message");
    const password = passwordField.value;

    const validations = [
        { test: /.{8,}/, message: "Debe tener al menos 8 caracteres." },
        { test: /[a-z]/, message: "Debe contener al menos una letra minúscula." },
        { test: /[A-Z]/, message: "Debe contener al menos una letra mayúscula." },
        { test: /[!@#$%^&*(),.?":{}|<>]/, message: "Debe contener al menos un carácter especial." },
        { test: /[0-9]/, message: "Debe contener al menos un número." }
    ];

    const errors = validations
        .filter(validation => !validation.test.test(password))
        .map(validation => validation.message);

    if (errors.length > 0) {
        errorMessage.innerHTML = errors.join("<br>");
        passwordField.classList.add("input-error");
    } else {
        errorMessage.innerHTML = "";
        passwordField.classList.remove("input-error");
    }
}

function validateConfirmPassword() {
    var passwordField = document.getElementById("password");
    var confirmPasswordField = document.getElementById("confirm-password");
    var errorMessage = document.getElementById("error-message");

    if (confirmPasswordField.value !== passwordField.value) {
        errorMessage.innerHTML = "Las contraseñas no coinciden.";
        confirmPasswordField.classList.add("input-error");
    } else {
        errorMessage.innerHTML = "";
        confirmPasswordField.classList.remove("input-error");
    }
}