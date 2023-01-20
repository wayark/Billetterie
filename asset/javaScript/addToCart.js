const displayInput = (element) => {
    if (element.value == "10+") {
        let input = element.parentElement.parentElement.parentElement.querySelector('.form-10more'); 

        element.parentElement.parentElement.style.display = 'none';
        input.style.display = 'flex';  
    } else {
        element.form.submit();
    }
}