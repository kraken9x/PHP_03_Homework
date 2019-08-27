window.onload = () => {
    const selectBox = document.querySelector('#select-box');
    const selectBox2 = document.querySelector('#select-box2');
    const submitFunction = (selectBox, mainForm) => {
        if (selectBox) {
            // console.log(selectBox.children);
            let newArr = selectBox.children;
            newArr = Array.from(newArr);
            // console.log(newArr);
            
                selectBox.addEventListener('change', event => {
                    newArr.forEach(element => {
                        if (event.target.value === element.value) {                                                   
                            
                            event.target.selected = "selected";
                            document.querySelector(`#${mainForm}`).submit();
                            
                        }
                    })
                })
        }
    };

    submitFunction(selectBox, 'main-form');    
    submitFunction(selectBox2, 'main-form2');
}