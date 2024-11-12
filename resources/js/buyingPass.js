function selectPlan(planId) {
    localStorage.setItem('selectedPlan', planId);
    window.location.href = "{{url('/subscribe')}}";
}