document.getElementById("feedbackForm").addEventListener("submit", function (event) {
    event.preventDefault();

    // Collect form data
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    const feedback = {
        name,
        email,
        message
    };

    // Send feedback to server
    // fetch('/api/feedback', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json'
    //     },
    //     body: JSON.stringify(feedback)
    // });

    // Show toast notification
    const toast = document.getElementById('toast-simple');
    toast.classList.remove('hidden');
    setTimeout(() => {
        toast.classList.add('hidden');
    }, 3000);

    document.getElementById('feedbackForm').reset();
});