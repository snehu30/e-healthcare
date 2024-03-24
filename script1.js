document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    // You can implement logic here to handle form submission, such as sending an email or storing the message in a database

    // For demonstration purposes, let's just log the form data to the console
    const formData = new FormData(this);
    const formDataObject = {};
    formData.forEach((value, key) => {
        formDataObject[key] = value;
    });
    console.log('Form data:', formDataObject);

    // Clear the form fields after submission (optional)
    this.reset();
});