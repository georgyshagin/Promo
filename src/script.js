document.addEventListener('DOMContentLoaded', function(){
   
    const showMyDrinkInput = function() {
        const myDrink = document.querySelector('#drink');
        const myDrinkOption = document.querySelector('#myDrinkOption');
        const myDrinkInput = document.createElement('p');
        myDrinkInput.innerHTML = `
            <label for="my_drink"></label>
            <textarea name="my_drink" id="my_drink" cols="10" rows="1" class="materialize-textarea"></textarea>
        `;
        myDrink.addEventListener('change', function(e) {
            if (e.target.id === 'myDrinkOption') {                
                myDrink.append(myDrinkInput);
            } else if (!myDrinkOption.checked) {
                myDrinkInput.remove();
            }
        });        
    }    
    const showMyFoodInput = function() {
        const myFood = document.querySelector('#food');
        const myFoodOption = document.querySelector('#myFoodOption');
        const myFoodInput = document.createElement('p');
        myFoodInput.innerHTML = `
            <label for="my_food"></label>
            <textarea name="my_food" id="my_food" cols="10" rows="1" class="materialize-textarea"></textarea>
        `;
        myFood.addEventListener('change', function(e) {
            if (e.target.id === 'myFoodOption') {                
                myFood.append(myFoodInput);
            } else if (!myFoodOption.checked) {                
                myFoodInput.remove();
            }
        });        
    }    

    const showModal = function(){
        const overlay = document.querySelector('#overlay');
        overlay.style.display = 'block';
        setTimeout(() => overlay.style.display = '', 4000);
    }

    // const sendForm = (formData) => {
    //     const response = fetch("phpmailer/send.php", {
    //         method: "POST",
    //         body: formData
    //     });
    //     if (!response.ok) {
    //         throw new Error(`Ошибка по адресу ${url}, статус ошибки ${response.status}`);
    //     }
    //     return response.text();
    // };
    const form = document.querySelector('#form');

    form.addEventListener("submit", async function (e) {
        e.preventDefault();
        // const formData = new FormData(this);
        
        let response = await fetch('phpmailer/send.php', {
            method: 'POST',
            body: new FormData(form)
        });
        
        form.reset(); // очищаем поля формы
        showModal();
        
        

        // sendForm(formData)
        //     .then((response) => {
        //         form.reset(); // очищаем поля формы
        //         showModal();
        //     })
        //     .catch((err) => console.error(err))
    });   

    showMyDrinkInput();
    showMyFoodInput();
});
