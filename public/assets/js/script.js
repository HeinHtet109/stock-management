const productForm = document.getElementById('productForm');
const purchaseForm = document.getElementById('purchaseForm');

if(productForm){
    productForm.addEventListener('submit', function(e) {
        let form = this;
        let isValid = true;
        const nameError = document.getElementById('nameError');
        const priceError = document.getElementById('priceError');
        const qtyError = document.getElementById('qtyError');
    
        // Clear existing validation
        form.querySelectorAll('.form-control').forEach(input => {
            input.classList.remove('is-invalid');
        });
    
        // Validate name
        let name = form.name.value.trim();
        if (name.length < 1) {
            form.name.classList.add('is-invalid');
            nameError.textContent = "Product name is required.";
            isValid = false;
        }
    
        // Validate price
        let price = parseFloat(form.price.value);
        if (isNaN(price) || price <= 0) {
            form.price.classList.add('is-invalid');
            priceError.textContent = "Product price is invalid.";
            isValid = false;
        }
    
        // Validate quantity
        let quantity = parseInt(form.quantity.value);
        if (isNaN(quantity) || quantity < 0) {
            form.quantity.classList.add('is-invalid');
            qtyError.textContent = "Product quantity is invalid.";
            isValid = false;
        }
    
        if (!isValid) {
            e.preventDefault(); // Stop form submission
        }
    });    
}

if(purchaseForm) {
    let quantityInput = document.getElementById('qtyInput');
    let productPrice = document.getElementById('productPrice');
    let priceInput = document.getElementById('priceInput');

    const inputHandler = function(e) {
        priceInput.value = productPrice.value * e.target.value;
    }
    quantityInput.addEventListener('input', inputHandler);
    quantityInput.addEventListener('propertychange', inputHandler); // for IE8

    purchaseForm.addEventListener('submit', function(e) {
        let form = this;
        let isValid = true;
        
        const qtyError = document.getElementById('qtyError');
    
        // Clear existing validation
        form.querySelectorAll('.form-control').forEach(input => {
            input.classList.remove('is-invalid');
        });        
    
        // Validate quantity
        let quantity = parseInt(form.quantity.value);
        if (isNaN(quantity) || quantity < 0) {
            form.quantity.classList.add('is-invalid');
            qtyError.textContent = "Product quantity is invalid.";
            isValid = false;
        }
    
        if (!isValid) {
            e.preventDefault(); // Stop form submission
        }
    });
}
