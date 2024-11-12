function selectPlan(planId) {
    localStorage.setItem('selectedPlan', planId);
    window.location = "/subscribe";
}