window.onload = () => {
    const selectBox = document.querySelector('#select-box');
    if (selectBox) {
        // console.log(selectBox.children);
        let newArr = selectBox.children;
        newArr = Array.from(newArr);
        // console.log(newArr);
        
            selectBox.addEventListener('change', event => {
                newArr.forEach(element => {
                    if (event.target.value === element.value) {
                        document.querySelector('#main-form').submit();
                    }
                })
            })
    }
}