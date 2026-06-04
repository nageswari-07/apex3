// Password visibility toggle
function togglePassword(id) {
    const input = document.getElementById(id);

    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}

// Simple welcome animation
window.addEventListener("load", () => {
    document.body.style.opacity = "1";
});

// Confirm delete action
function confirmDelete() {
    return confirm("Are you sure you want to delete your account?");
}

// Image preview before upload
function previewImage(event) {
    const reader = new FileReader();

    reader.onload = function() {
        const output = document.getElementById('preview');
        output.src = reader.result;
    }

    reader.readAsDataURL(event.target.files[0]);
}