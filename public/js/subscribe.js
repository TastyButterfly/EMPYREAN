document.addEventListener('DOMContentLoaded', function() {
    const selectedPlan = localStorage.getItem('selectedPlan');
    if (selectedPlan) {
        const radioButton = document.getElementById(selectedPlan);
        if (radioButton) {
            radioButton.checked = true;
        }
        localStorage.removeItem('selectedPlan');
    }
});