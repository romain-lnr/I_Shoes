function PutValue(submit, stock_number, number) {
    var submit = document.querySelector(submit);
    submit.addEventListener("click", Number_change);

    function Number_change() {
        document.querySelector(stock_number).innerText = document.querySelector(number).value;
    }
}