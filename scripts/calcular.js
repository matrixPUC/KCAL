const ingredientInput = document.querySelector('.ingredient');
const quantityInput = document.querySelector('.quantity');
const addButton = document.querySelector('.add-btn')
const ingredientsHeader = document.querySelector('.ingredients');
const ingredientsInput = document.querySelector('.hidden')
console.log(ingredientsInput);
let ingredients = [];
let ingredientsString = '';

addButton.addEventListener('click', () => {
  let ingredientArray = [ingredientInput.value, quantityInput.value]
  ingredients.push(ingredientArray);

  ingredientsString += ingredientArray[0] + ' ' + ingredientArray[1] + ', ';
  ingredientsHeader.innerHTML = ingredientsString

  ingredientsInput.value = ingredients;
});