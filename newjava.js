function validateForm() {
    let username = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    if (username === "" || password === "") {
        alert("Both fields must be filled out");
    }
}

function submitRating() {
    let rating = document.getElementById('rate-select').value;
    if (rating !== 'rating') {
        document.getElementById('response-message').innerText = "Thank you for submitting your response.";
    } else {
        alert("Please select a rating.");
    }
}
