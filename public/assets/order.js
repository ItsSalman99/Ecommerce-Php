// /* remove optional word when focusing on the input on small screens */

// let optionalArray = document.querySelectorAll(
//   ".order .fill-box .form-group input + span"
// ); //any span after input

// optionalArray.forEach((element) => {
//   element.previousElementSibling.onfocus = () => {
//     //the input which has "optional" word
//     if (window.innerWidth < 768) {
//       //remove on small screens
//       element.classList.add("d-none");
//     }
//   };
//   element.previousElementSibling.onblur = () => {
//     element.classList.remove("d-none");
//   };
// });

// /******************************************************************/

// /* Validate login form */

// //address section
// let addressForm = document.querySelector(".address .form-container"),
//   addressContinueBtn = document.getElementById("address-continue"),
//   addressConfirmSign = document.querySelector(".address h5 i"),
//   addressChange = document.querySelector(".address .change-anchor"),
//   addressOpenedBefore = false; //to use when changing the address section again

// //shipping method section
// let shippingMethodForm = document.querySelector(
//     ".shipping-method .form-container"
//   ),
//   shippingMethodContinueBtn = document.getElementById(
//     "shipping-method-continue"
//   ),
//   shippingMethodConfirmSign = document.querySelector(".shipping-method h5 i"),
//   shippingMethodChange = document.querySelector(
//     ".shipping-method .change-anchor"
//   ),
//   shippingErrorMsg = document.getElementById("error-msg-ship");

// //payment section
// let paymentForm = document.querySelector(".payment .form-container"),
//   paymentConfirmSign = document.querySelector(".payment h5 i"),
//   paymentChange = document.querySelector(".payment .change-anchor"),
//   paymentErrorMsg = document.getElementById("error-msg-payment");

// //order page's form
// let orderForm = document.querySelector(".order form");
// (orderSubmitBtn = document.getElementById("order-submit")),
//   //when clicking continue in address section
//   addressContinueBtn.addEventListener("click", (e) => {
//     if (!checkForm(addressForm)) {
//       //if false then the inputs are invalid
//       e.preventDefault(); //don't continue
//     } else {
//       //add some signs and close the section
//       completeForm(addressConfirmSign, addressChange, addressForm);

//       if (!addressOpenedBefore) {
//         //if it is not opend before open the next section (shipping-method)
//         shippingMethodForm.classList.add("active"); //open shipping method section
//         addressOpenedBefore = true;
//       }
//     }
//   });

// //when refilling the address section again
// addressChange.onclick = () => {
//   //get everything back again
//   changeForm(addressConfirmSign, addressChange, addressForm);
// };

// //when clicking continue in shipping method section
// shippingMethodContinueBtn.addEventListener("click", (e) => {
//   if (!checkSelect(shippingMethodForm)) {
//     //if false then the form is invalid
//     shippingErrorMsg.classList.remove("d-none"); //show error massage
//   } else {
//     completeForm(
//       shippingMethodConfirmSign,
//       shippingMethodChange,
//       shippingMethodForm
//     );
//     shippingErrorMsg.classList.add("d-none"); //remove error message
//     paymentForm.classList.add("active"); //open next section (patment)
//   }
// });

// //when refilling the shipping method section again
// shippingMethodChange.onclick = () => {
//   changeForm(
//     shippingMethodConfirmSign,
//     shippingMethodChange,
//     shippingMethodForm
//   );
// };

// //when submitting the whole order form
// orderForm.addEventListener("submit", (e) => {
//   if (!checkSelect(paymentForm)) {
//     //if false then the form is invalid
//     e.preventDefault(); //don't submit
//     paymentErrorMsg.classList.remove("d-none"); //show error message
//   }
// });

// //checkbox of submission
// let checkBoxSubmit = document.getElementById("agree-terms");

// //when clicking checkBoxSubmit
// checkBoxSubmit.addEventListener("click", (e) => {
//   if (checkBoxSubmit.checked) {
//     //enable the submit button.
//     orderSubmitBtn.disabled = false;
//   } else {
//     //disable the submit button.
//     orderSubmitBtn.disabled = true;
//   }
// });

// //when submiting the section
// let completeForm = (confirmSign, changeAnchor, formElement) => {
//   confirmSign.classList.add("active"); //show true sign
//   changeAnchor.classList.add("active"); //show change btn
//   formElement.classList.remove("active"); //close the section
// };

// //when editing the section
// let changeForm = (confirmSign, changeAnchor, formElement) => {
//   confirmSign.classList.remove("active"); //hide true sign
//   changeAnchor.classList.remove("active"); //hide change btn
//   formElement.classList.add("active"); //open the section
// };

// //check the form
// let checkForm = (elementForm) => {
//   let vaild = true; //valid form or not

//   //all input except submit types and option inputs
//   let formInputArray = elementForm.querySelectorAll(
//     'input:not([type="submit"]):not(.option), select, textarea'
//   );

//   formInputArray.forEach((element) => {
//     if (element.value.trim() == "") {
//       element.classList.remove("input-valid");
//       element.classList.add("input-invalid");
//       vaild = false; //when any input is empty, return false
//     } else {
//       element.classList.remove("input-invalid");
//       element.classList.add("input-valid");
//     }
//   });

//   return vaild; //return valiation conditio
// };

// //check the forms with radio types
// let checkSelect = (elementForm) => {
//   //fetch the selected radio input
//   let formInputArray = elementForm.querySelectorAll(
//     'input[type="radio"]:checked'
//   );

//   //if the length of the array = 1 ,then the form is valid
//   if (formInputArray.length == 1) {
//     return true;
//   }

//   return false;
// };

// /*****************************************************************/

let paypalContainer = document.querySelector(".paypal_container");
// paypalContainer.style = "display: none";

let creditcardContainer = document.querySelector(".creditcard_container");
// CreditcardContainer.style = "display: none";

let creditCardRadio = document.getElementById("creditCard");
let paypalRadio = document.getElementById("paypal");

let changeForm = () => {
  if (creditCardRadio.checked) {
    paypalContainer.style = "display: none";
    creditcardContainer.style = "display: block";
  } else if (paypalRadio.checked) {
    paypalContainer.style = "display: block";
    creditcardContainer.style = "display: none";
  }
};

changeForm();
