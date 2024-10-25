
function showForm(formId) {
    const forms = document.querySelectorAll('.form-container');
    const currentForm = document.querySelector('.form-container.active');

    if (currentForm) {
        currentForm.classList.remove('active');
        currentForm.classList.add(
            formId < currentForm.id ? 'exit-left' : 'exit-right'
        );

        setTimeout(() => {
            currentForm.style.display = 'none';
            currentForm.classList.remove('exit-left', 'exit-right');
        }, 500);
    }

    const selectedForm = document.getElementById(formId);
    selectedForm.style.display = 'block';

    // Small delay to ensure display: block has taken effect
    setTimeout(() => {
        selectedForm.classList.add('active');
    }, 10);
}

// Initialize the first form on page load
document.addEventListener('DOMContentLoaded', () => {
    showForm('form1');
});