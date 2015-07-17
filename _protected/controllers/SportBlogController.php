<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use app\models\SportNews;
use app\models\SportNote;
use app\models\SportNoteval;
use yii\filters\VerbFilter;

class SportBlogController extends Controller
{
    /**
     * @var integer начало диапазона возможных значений ID заметки
     */
    private $startRange = 1;

    /**
     * @var integer конец диапазона возможных значений ID заметки
     */
    private $endRange = 3;

    public function actionIndex()
    {
        return $this->render('index', [
            'note' => self::getRandomNote(),
        ]);
    }
    public function actionAboutSport()
    {
        return self::execData('sport');
    }
    public function actionBodyBuilding()
    {
        return self::execData('bodybuilding');
    }
    public function actionAllSport()
    {
        return self::execData('all');
    }

    /**
     * Реализация общей обработки для всех действий, в зависимости
     * от переданных параметров из этих действий (либо вызов страницы либо пагинации).
     * @param $category string, категория по которой будет осущ. выборка из БД
     * @return render
     */
    private function execData($category)
    {
        // если обращение к странице с контентом (если есть параметры get(id) и get(page=page))
        if (Yii::$app->request->get('id') && (Yii::$app->request->get('page')==='page')) {
            $id = Yii::$app->request->get('id');
            $record = SportNews::find()->where(['id' => $id])->one();
            return $this->render('page', [
                'record' => $record,
                'note' => self::getRandomNote(),
            ]);
        }
        // если обращение к пагинации по категории
        $dataProvider = new ActiveDataProvider([
            'query' => ($category != 'all') ? // опред. какая категория (или искать/выводить все записи)
                  SportNews::find()->where(['category' => $category]) // подставить категорию
                :
                  SportNews::find() // найти все записи
            ,
            'pagination' => [
                'defaultPageSize' => 3,
                'pageParam' => 'pagination',
            ],
        ]);
        return $this->render('blog', [ // единый вид для всех действий
            'dataProvider' => $dataProvider,
            'note' => self::getRandomNote(),
        ]);
    }

    /**
     * Обработка AJAX обращения - получение рандомной записи из БД
     * вызывает туже ф-ию которая вызывается при выводе всего шаблона
     * прямой вызов закрыт в поведении
     * @return render
     */
    public function actionNote()
    {
        return self::getRandomNote();
    }

    /**
     * Реализация получения рандомной заметки из БД
     * @return string
    */
    public function getRandomNote()
    {
        // Прочесть данные в cookie
        $cookies = Yii::$app->request->cookies;
        if( ($cookie = $cookies->get('idMsg')) !== null ) { // Прочесть данные в cookie
            $idMsg = $cookie->value; // взять значение из cookie
            // Если данные в cookie есть, сгенерировать значение и проверить на дублирование (до несовпадения)
            // Генерировать случайно число, до тех пор, пока оно не станет отличным от того, что лежит в БД
            do { // Установить ID (согласно получ. значению)
                $id = rand($this->startRange, $this->endRange); // Сгенерировать случайное число из доступных ID
                                  // (!) диапазон доступных значений ID, в даном случае формируется вручную
                                  // не помешает более общее решение.
            } while ($id == $idMsg); // сгенер. число не должно совпадать с текущим ID заметки.
        } else { // если cookie еще не установлены
            $id = rand($this->startRange, $this->endRange);
        }
        // Установить в cookie текущие значение ID
        $cookies = Yii::$app->response->cookies;
        $cookies->add(new \yii\web\Cookie([
            'name' => 'idMsg',
            'value' => $id,
        ]));
        // Найти в БД согласно ID
        $record = SportNote::find()->where(['id' => $id])->one();
        // Передать контент заметки для подстановки в HTML-блок вывода (в _note.php блок jQ);
        return $record->content;
    }

    public function behaviors()
    {
        return [ // закрытие доступа к действию обрабат. AJAX (кроме вызов POST-ом)
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'note'  => ['post'] // разрешить обращение только с помощью post
                                      // если ставить get то прямой вызов срабатывает (так же и при исп. AccessControl)
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

}