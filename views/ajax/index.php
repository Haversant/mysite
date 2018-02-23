


<form id="my_form" action="../mail.php">
	<input type="text" name="name">
	<input type="mail" name="mail">
	<input type="tel" name="tel">
	<input type="submit" name="submit" value="Отправить">
</form>
<div id="output"></div>

<script>
var d = document,
    myform,
    output;
// функция кроссбраузерной установки обработчиков событий (IE8-) не поддерживает this
function addEvent(elem, type, handler){
  if(elem.addEventListener){
    elem.addEventListener(type, handler, false);
  } else {
    elem.attachEvent('on'+type, handler);
  }
  return false;
}


// Функция Ajax-запроса
function sendAjaxRequest(e){
  var evt = e || window.event;
  if(evt.preventDefault){
    evt.preventDefault(); // для нормальных браузров
  } else {
    evt.returnValue = false; // для IE старых версий
  }
  // формируем данные формы
	var elems = myform.elements, // все элементы формы
	    url = myform.action, // путь к обработчику (берём из атрибута action нашей формы)
	    params = [],
	    elName,
	    elType;
	// проходимся в цикле по всем элементам формы
	for(var i = 0; i < elems.length; i++){
	  elType = elems[i].type; // тип текущего элемента (атрибут type)
	  elName = elems[i].name; // имя текущего элемента (атрибут name)
	  if(elName){ // если атрибут name присутствует
	    // если это переключатель или чекбокс, но он не отмечен, то пропускаем
	    if((elType == 'checkbox' || elType == 'radio') && !elems[i].checked) continue;
	    // в остальных случаях - добавляем параметр "ключ(name)=значение(value)"
	    params.push(elems[i].name + '=' + elems[i].value);
	  }
	}
	url += '?' + params.join('&');

	/* кроссбраузерный ajax */
	function getXhrObject(){
	  if(typeof XMLHttpRequest === 'undefined'){
	    XMLHttpRequest = function() {
	      try { return new window.ActiveXObject( "Microsoft.XMLHTTP" ); }
	        catch(e) {}
	    };
	  }
	  return new XMLHttpRequest();
	}

	var xhr = getXhrObject();
	xhr.open('GET', url, true);
	xhr.onreadystatechange = function() { 
	  if(xhr.readyState == 4 && xhr.status == 200){
	    output.innerHTML = xhr.responseText;
	  }
	}
	xhr.send(null);
/* 	для POST запроса*//*
	var xhr = getXhrObject();
	xhr.open('POST', url, true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	xhr.setRequestHeader('Content-length', params.length);
	xhr.setRequestHeader('Connection', 'close');
	xhr.onreadystatechange = function() { 
	  if(xhr.readyState == 4 && xhr.status == 200){
	    output.innerHTML = JSON.parse(xhr.responseText);
	  }
	}
	xhr.send(params.join('&'));*/
}
// Инициализация после загрузки документа
function init(){
	
  output = d.getElementById('output'); // элемент, куда мы выведем полученный в ответе результат
  myform = d.getElementById('my_form'); // форма
  addEvent(myform, 'submit', sendAjaxRequest); // устанавливаем на форму обработчик события submit
  return false; 
}

// Вешаем обработчик события загрузки документа - DOM-Ready
addEvent(window, 'load', init);

</script>