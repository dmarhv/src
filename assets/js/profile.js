// Открыть окно авторизации
document.getElementById("open-auth").addEventListener("click",function(){
	document.getElementById("auth-form").classList.add("open")
})
// Закрыть окно авторизации
document.getElementById("close-modal-btn-1").addEventListener("click",function(){
	document.getElementById("auth-form").classList.remove("open")
})
// Закрыть  окно авторизации при нажатии на Esc
window.addEventListener('keydown', (e) => {
	if (e.key === "Escape") {
		 document.getElementById("auth-form").classList.remove("open")
	}
});

// Открыть окно регистрации
document.getElementById("open-reg").addEventListener("click",function(){
	document.getElementById("reg-form").classList.add("open")
})
// Закрыть окно регистрации
document.getElementById("close-modal-btn-2").addEventListener("click",function(){
	document.getElementById("reg-form").classList.remove("open")
})
// Закрыть  окно регистрации при нажатии на Esc
window.addEventListener('keydown', (e) => {
	if (e.key === "Escape") {
		 document.getElementById("reg-form").classList.remove("open")
	}
});
// Открыть окно заказа звонка
document.getElementById("open-zvonok").addEventListener("click",function(){
	document.getElementById("zvonok-form").classList.add("open")
})
// Закрыть окно заказа звонка
document.getElementById("close-modal-btn").addEventListener("click",function(){
	document.getElementById("zvonok-form").classList.remove("open")
})
// Закрыть  окно заказа звонка при нажатии на Esc
window.addEventListener('keydown', (e) => {
	if (e.key === "Escape") {
		 document.getElementById("zvonok-form").classList.remove("open")
	}
});

// Открыть окно время доставки
document.getElementById("open-time").addEventListener("click",function(){
	document.getElementById("time-form").classList.add("open")
})
// Закрыть окно время доставки
document.getElementById("close-modal-btn-3").addEventListener("click",function(){
	document.getElementById("time-form").classList.remove("open")
})
// Закрыть  окно время доставки при нажатии на Esc
window.addEventListener('keydown', (e) => {
	if (e.key === "Escape") {
		 document.getElementById("time-form").classList.remove("open")
	}
});



let calculate = document.getElementById("calculation");
let count = document.getElementById("buttonCountNumber");
calculation = document.getElementById("calculation").innerHTML;

document.getElementById("buttonCountPlus").onclick = function() {
  let countPlus = count.innerHTML;
  if(+countPlus <= 3){
    count.innerHTML++;
    let countPlus = count.innerHTML;
    calculate.innerHTML = calculations(countPlus) ;
  }
}

document.getElementById("buttonCountMinus").onclick = function() {
  let countMinus = count.innerHTML;
  if(+countMinus >= 2){
    count.innerHTML--;
    let countMinus = count.innerHTML;
    calculate.innerHTML = calculations(countMinus) ;
  }
}

calculations = (count) => {
  return calculation+` * ${count} = ` + (+count)*(+calculation);
}

