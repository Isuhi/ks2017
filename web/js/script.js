//Помещаем в переменную parentField элемент с id="commentsform-parent_id" (это скрытое поле <input>).
//Если такой элемент  подгрузился, то присваиваем его атрибуту value значение id
    function setParentComment(id)
    {
        var parentField = jQuery('#commentsform-parent_id');
        if (typeof parentField != 'undefined'){
            parentField.val(id);
        }
    }

    function initComments()
    {
//Выбираем элемент с классом .comment__item  и классом .reply (это <span>), 
//- помещаем его в переменную span. 
//- После этого заменяем его элементом <a/>, 
//- присваиваем ему класс 'reply', 
//- добавляем ему следующие атрибуты: 
//- 'data-id' со значением, которое было у атрибута data-id замененного элемента <span>; 
//- 'href' со значением '#comment-form'.
//- возвращает полученный новый элемент с атрибутами:
        jQuery('.comment__item .reply').each(function () {
            var span = $(this);
            span.replaceWith(jQuery('<a/>')
                .addClass('reply')
                .attr('data-id', span.data('id'))
                .attr('href', '#comment-form')
                .html(span.html())
            );
        });
//Выбираем элемент с классом .comment__item  и классом .reply (это ссылка "Ответить") и по событию "клик" выполняем функциюЖ,
//- в переменную comment выбираем родителя родителя исходного элемента (это весь блок <articles> с комментарием),
//- в переменную form выбираем элемент с id="comment-form" (это блок <div> с формой),
//- удаляем блок с формой, сохраняя информацию о нем,
//- у блока с комментарием возвращаем значение атрибута 'margin-left', прибавляем к нему 20, сумму преобразуем в число, которое передаем значением атрибута 'margin-left' у блока с формой ( таким образом блок с формой сдвигается по отношению к блоку с комментарием на 20 px)
//- добавляем блок с формой сразу после блока с комментарием,
//- возвращаем значение атрибута 'id' исходного блока (это номер комментария в элементе с текстом "Ответить"), преобразуем его в число и присваиваем значением переменной id,
//- внутри блока с формой находим элемент 'form' (это сама форма <form>) и его аттрибуту 'action' присваиваем значение '#comment_' + id, где id - это номер комментария,
//- вызываем функцию setParentComment(id), передавая ей id коментария, то есть у скрытого поля атрибуту value теперь в значении - наш id
//Таким образом в форме, которая появляется под комментарием при нажатии ссылки "Ответить", в скрытом поле в атрибуте value передается номер комментария, на который отвечают. Кроме этого, форма для ответа смещена вправо на 20 пикселей.  
        jQuery('.comment__item .reply').click(function()
        {
            var comment = jQuery(this).parent().parent();
            var form = jQuery('#comment-form');

            form.detach();
            form.css('margin-left', parseInt(comment.css('margin-left')) + 20);
            comment.after(form);

            var id = parseInt(jQuery(this).data('id'));

            form.find('form').attr('action', '#comment_' + id);

            setParentComment(id);

            return false;
        });
//Выбираем элемент с классом '.reply-comment' (это ссылка "Оставить комментарий") и при клике выполняем функцию:
//- в переменую form выбираем элемент с'#comment-form'(это блок с формой для комментирования),
//- удаляем его, запоминая информацию,
//- переопределеяем отступ у этого блока, устанавливая 0,
//- добавляем сразу после исходной ссылки форму для комментирования,
//- вызываем функцию setParentComment(0), то есть этот комментарий будет самостоятельным.
        jQuery('.reply-comment').click(function()
        {
            var form = jQuery('#comment-form');
            form.detach();
            form.css('margin-left', 0);

            jQuery(this).after(form);

            setParentComment(0);

            return false;
        });
    }
//Вызываем только что написанную функцию.
    initComments();
////$(document).on('click', '.reply-link', function(){
//  var comment = $(this).closest('.comment');
//  $('#comment-form').detach().appendTo(comment);
//  $('#comment-parent_id').val(comment.data('id'));
//});
//Отслеживаем событие "клик" по элементу с классом "reply-link" (это ссылка с текстом "Ответить") и по его совершению выполняем анонимную функцию:
//- в переменную comment помещаем ближайший элемент с классом "comment" (это блок с комментарием, в котором и находится эта кнопка "Ответить");
//- удаляем элемент с id="comment-form" (это блок с формой для комментирования), не удаляя информацию о нем, и вставляем тут же этот самый элемент (форму) после блока с комментарием, помещенного в переменную comment;
//- атрибуту value элемента с id = "comment-parent_id" (а это скрытое поле формы) присваиваем значение 'id' комментария, на который отвечают.





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