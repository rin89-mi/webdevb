// assets/main.js
document.querySelectorAll(".reply-toggle").forEach((btn) => {
    btn.addEventListener("click", () => {
        const target = document.getElementById(btn.dataset.target);
        if (target) target.classList.toggle("hidden");
    });
});

const password = document.getElementById("password");
const toggle = document.getElementById("togglePassword");

if (password && toggle) {

    toggle.addEventListener("click", () => {

        if (password.type === "password") {
            password.type = "text";
            toggle.textContent = "🙈";
        } else {
            password.type = "password";
            toggle.textContent = "👁";
        }

    });

}
