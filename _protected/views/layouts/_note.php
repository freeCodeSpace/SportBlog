<?php
use yii\helpers\Html;
?>

<article>
    <header id="noteTitleText">Заметки :</header>
        <p class="noteText" id="noteBox"><?= $this->params['note'][0] ?></p>
</article>
<div id="noteReload">новая заметка</div>

<?php
// Переменные для подстановки в передачу параметров:
$action = 'sport-blog/note'; // действие контроллера, которое будет обрабатывать AJAX-запрос
$urlReceive = Yii::$app->homeUrl . $action; // сформируем подстановочный url, который будет принимать AJAX

$script = <<< JS
$('#noteReload').click( function() { // div-кнопка с ID noteReload, будет вызвать AJAX
    $.ajax({
      type: "POST",
      url: "$urlReceive",
      success: function(msg){ // в случае успеха, подставить полученные данные из controller/action
        $('#noteBox').html(msg); // заменить содержимое из блока #noteBox
      }
    });
});
JS;
$this->registerJs($script);
?>