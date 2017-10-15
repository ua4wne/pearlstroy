<?php

namespace app\commands;

use Yii;
use yii\console\Controller;
/**
 * Инициализатор RBAC выполняется в консоли php yii rbac/init
 */
class RbacController extends Controller {

    public function actionInit() {
        $auth = Yii::$app->authManager;

        $auth->removeAll(); //На всякий случай удаляем старые данные из БД...

        // Создаем роли
        $admin = $auth->createRole('admin');
        $manager = $auth->createRole('manager');
        //$factor = $auth->createRole('factor');

        // запишем их в БД
        $auth->add($admin);
        $auth->add($manager);

        // Создаем разрешения.
        $adminTask = $auth->createPermission('adminTask');
        $adminTask->description = 'Задачи администратора';

        //$viewDocument = $auth->createPermission('viewDocument');
        //$viewDocument->description = 'Просмотр документов';

        //$viewReport = $auth->createPermission('viewReport');
        //$viewReport->description = 'Просмотр отчетов';

        //$viewContact = $auth->createPermission('viewContact');
        //$viewContact->description = 'Просмотр контактов';


        // Запишем эти разрешения в БД
        $auth->add($adminTask);
        //$auth->add($viewDocument);
        //$auth->add($viewReport);
        //$auth->add($viewContact);

        // Теперь добавим наследования.


        //$auth->addChild($manager,$viewDocument);
        //$auth->addChild($manager,$viewReport);
        //$auth->addChild($manager,$viewContact);


        // админ наследует все роли. Он же админ, должен уметь всё! :D
        $auth->addChild($admin, $manager);

        // Еще админ имеет собственное разрешение - «Просмотр админки»
        $auth->addChild($admin, $adminTask);

        // Назначаем роль admin пользователю с ID 1
        $auth->assign($admin, 1);

        // Назначаем роль editor пользователю с ID 2
        //$auth->assign($market, 2);
    }
}

