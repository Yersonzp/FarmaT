document.getElementById('registration-form').addEventListener('submit', function(event) {
  event.preventDefault(); // Evita el envío del formulario estándar.

  // Obtener y calcular la edad del usuario.
  var birthdate = new Date(document.getElementById('birthdate').value);
  var today = new Date();
  var age = today.getFullYear() - birthdate.getFullYear();
  var monthDiff = today.getMonth() - birthdate.getMonth();
  if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
    age--;
  }

  // Verificar si el usuario es mayor de edad.
  if (age < 18) {
    alert("Debes ser mayor de edad para registrarte."); // Muestra una alerta si el usuario es menor de edad.
    return; // Detiene la ejecución de la función y evita el envío del formulario.
  }

  // Crear un objeto con los datos del formulario.
  var data = {
    username: document.getElementById('username').value,
    email: document.getElementById('email').value,
    birthdate: document.getElementById('birthdate').value,
    password: document.getElementById('password').value
  };

  // Enviar los datos del formulario usando fetch.
  fetch('registro.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  }).then(response => response.json())
    .then(data => {
      if (data.status === 'error') {
        showAlert(data.message);
      } else {
        showAlert(data.message, true);
      }
    }).catch(error => {
      console.error('Error:', error);
    });
});

function showAlert(message, success = false) {
  var alertBox = document.createElement('div');
  alertBox.className = 'alert-box ' + (success ? 'success' : 'error');
  alertBox.innerText = message;

  document.body.appendChild(alertBox);

  setTimeout(function() {
    document.body.removeChild(alertBox);
  }, 5000);
}

document.getElementById('password').addEventListener('input', function() {
  var password = this.value;
  var strengthBadge = document.getElementById('password-strength');
  var strength = 0;

  // Evaluar la fuerza de la contraseña en función de diversos criterios.
  if (password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)) {
    strength += 1;
  }

  if (password.match(/[~<>?]+/)) {
    strength += 1;
  }

  if (password.match(/[!@#$%^&*()]+/)) {
    strength += 1;
  }

  if (password.length > 5) {
    strength += 1;
  }

  // Actualizar el indicador de fuerza en función de la evaluación.
  switch (strength) {
    case 0:
    case 1:
      strengthBadge.style.backgroundColor = '#e74c3c';
      strengthBadge.innerText = 'Débil';
      break;
    case 2:
      strengthBadge.style.backgroundColor = '#f1c40f';
      strengthBadge.innerText = 'Moderada';
      break;
    case 3:
      strengthBadge.style.backgroundColor = '#27ae60';
      strengthBadge.innerText = 'Fuerte';
      break;
    case 4:
      strengthBadge.style.backgroundColor = '#2ecc71';
      strengthBadge.innerText = 'Muy Fuerte';
      break;
  }
});