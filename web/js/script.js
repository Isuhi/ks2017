$(document).on('click', '.reply-link', function(){
  var comment = $(this).closest('.comment');
  $('#comment-form').detach().appendTo(comment);
  $('#comment-parent_id').val(comment.data('id'));
});
//Отслеживаем событие "клик" по элементу с классом "reply-link" (это ссылка с текстом "Ответить") и по его совершению выполняем анонимную функцию:
//- в переменную comment помещаем ближайший элемент с классом "comment" (это блок с комментарием, в котором и находится эта кнопка "Ответить");
//- удаляем элемент с id="comment-form" (это блок с формой для комментирования), не удаляя информацию о нем, и вставляем тут же этот самый элемент (форму) после блока с комментарием, помещенного в переменную comment;
//- атрибуту value элемента с id = "comment-parent_id" (а это скрытое поле формы) присваиваем значение 'id' комментария, на который отвечают.
//Мне непонятно вот это - comment.data('id'), ведь id  комментария вроде бы передается в ссылке атрибутом data-id или я не то смотрю?
//Не сочтите за наглость, покажите код формы и скрипт ее обработки, а то в голове никак не устаканится это дело.
//Спасибо.
//
//
//
//




//$(document).ready(function(){
//	var menuMain = document.querySelector('.menu_main');
//	var menuToggle = document.querySelector('.menu_main__toggle');
//
//	menuMain.classList.remove('menu_main-nojs');
//
//	menuToggle.addEventListener('click', function(){
//		if (menuMain.classList.contains('menu_main-closed')){
//			menuMain.classList.remove('menu_main-closed');
//			menuMain.classList.add('menu_main-opened');
//		}
//		else {
//			menuMain.classList.add('menu_main-closed');
//			menuMain.classList.remove('menu_main-opened');		
//		}
//	});
//});