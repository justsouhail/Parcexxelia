function handleInputChange(event) {
    const input = event.target;
    const dropdown = document.querySelector('#empSelect');
    const otherInput = document.querySelector('#Input');

    if (input.value.trim() !== '') {
        dropdown.disabled = true;
        otherInput.disabled = true;
    } else {
        dropdown.disabled = false;
        otherInput.disabled = false;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const input = document.querySelector('#Input');
    const dropdown = document.querySelector('#empSelect');

    input.addEventListener('input', handleInputChange);
    dropdown.addEventListener('change', handleInputChange);
});
