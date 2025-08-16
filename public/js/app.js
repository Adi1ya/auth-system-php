// Example: Show success/error messages with fadeout
document.addEventListener("DOMContentLoaded", () => {
  const alerts = document.querySelectorAll(".alert");
  alerts.forEach(alert => {
    setTimeout(() => { alert.style.opacity = "0"; }, 3000);
    setTimeout(() => { alert.remove(); }, 4000);
  });
});
