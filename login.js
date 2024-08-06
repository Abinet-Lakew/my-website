const loginForm = document.getElementById('login-form');
const errorMessage = document.getElementById('error-message');

loginForm.addEventListener('submit', async (event) => {
  event.preventDefault(); // Prevent default form submission

  const username = document.getElementById('username').value;
  const password = document.getElementById('password').value;
  const role = document.getElementById('role').value;

  // Basic form validation (client-side)
  if (!username || !password || !role) {
    errorMessage.textContent = 'Please fill in all fields.';
    return;
  }

  try {
    const response = await fetch('/login', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ username, password, role }),
    });

    if (response.ok) {
      const data = await response.json();
      if (data.success) {
        // Login successful - redirect based on role (replace with actual redirection logic)
        const redirectUrl = {
          student: '/student-dashboard',
          admin: '/admin-dashboard',
          faculty: '/faculty-dashboard',
        };

        if (redirectUrl[role]) {
          window.location.href = redirectUrl[role];
        } else {
          // Handle unexpected role (unlikely, but good practice)
          errorMessage.textContent = 'Invalid role received from server.';
        }
      } else {
        // Handle login failure from server
        errorMessage.textContent = data.error || 'Login failed.';
      }
    } else {
      // Handle network or server errors
      errorMessage.textContent = 'An error occurred. Please try again later.';
    }
  } catch (error) {
    // Handle unexpected errors
    console.error('Error during login:', error);
    errorMessage.textContent = 'An unexpected error occurred.';
  }
});
