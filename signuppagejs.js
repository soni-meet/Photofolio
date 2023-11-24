document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault();
  
    const form = event.target;
    const username = form.elements.username.value;
    const email = form.elements.email.value;
    const password = form.elements.password.value;
  
    if (!username || !email || !password) {
      return alert('All fields are required');
    }
  
    if (password.length < 8) {
      return alert('Password must be at least 8 characters');
    }
   if(password.length>=8){
    form.submit();}
});