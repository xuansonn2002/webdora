try {
  /* button scroll to top design */
let toTop = document.getElementById('toTop');
toTop.style.display = 'none';
window.addEventListener('scroll', () => {
    if(this.scrollY > 300){
        toTop.style.display = 'block';
    }else{
        toTop.style.display = 'none';
    }
})
toTop.onclick = function(){
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

} catch (error) {
  
}
function increment() {
  var inputElement = document.getElementById('numberInput');
  var currentValue = parseInt(inputElement.value, 10);
  inputElement.value = currentValue + 1;
}

function decrement() {
  var inputElement = document.getElementById('numberInput');
  var currentValue = parseInt(inputElement.value, 10);

  // Đảm bảo số nhỏ nhất là 1
  if (currentValue > 1) {
      inputElement.value = currentValue - 1;
  }
}
