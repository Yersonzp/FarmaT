document.getElementById('registration-form').addEventListener('submit', function(event) {
    event.preventDefault();
  
    var birthdate = new Date(document.getElementById('birthdate').value);
    var today = new Date();
    var age = today.getFullYear() - birthdate.getFullYear();
    var monthDiff = today.getMonth() - birthdate.getMonth();
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthdate.getDate())) {
      age--;
    }
  
    if (age < 18) {
      alert("Debes ser mayor de edad para registrarte.");
      return;
    }
  
    var data = {
      username: document.getElementById('username').value,
      email: document.getElementById('email').value,
      birthdate: document.getElementById('birthdate').value,
      password: document.getElementById('password').value
    };
  
    fetch('/register', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify(data)
    }).then(response => response.text())
      .then(data => {
        alert(data);
      }).catch(error => {
        console.error('Error:', error);
      });
  });
  
  document.getElementById('password').addEventListener('input', function() {
    var password = this.value;
    var strengthBadge = document.getElementById('password-strength');
    var strength = 0;
  
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
  
    switch (strength) {
      case 0:
        strengthBadge.style.backgroundColor = '#e74c3c';
        strengthBadge.innerText = 'Débil';
        break;
      case 1:
        strengthBadge.style.backgroundColor = '#f39c12';
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
  