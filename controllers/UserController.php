<?php

namespace app\controllers;

use Yii;
use app\models\User;
use yii\web\Controller;
use yii\data\Pagination;

class UserController extends Controller
{

    public function actionIndex()
    {
        $query = User::find();

        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $users = $query->orderBy('username')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'users' => $users,
            'pagination' => $pagination,
        ]);
    }

    public function actionEdit($id)
    {
        $user = User::findOne($id);
        // var_dump(Yii::$app->request->post());
        // exit;
        if ($user->load(Yii::$app->request->post())) {
            $user->save(false);
            Yii::$app->getSession()->setFlash('success', 'User details updated successfully!!');

            return $this->redirect('index');
        }

        return $this->render('/user/edit', ['user' => $user]);
    }

    public function actionDelete($id)
    {

        $user = User::findOne($id);
        $user->delete();
        Yii::$app->getSession()->setFlash('success', 'User successfully deleted!!');
        $query = User::find();
        $pagination = new Pagination([
            'defaultPageSize' => 20,
            'totalCount' => $query->count(),
        ]);

        $users = $query->orderBy('create_date DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'users' => $users,
            'pagination' => $pagination,
        ]);
    }

    public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionRegister()
    {
        $user = new User();
        if ($user->load(Yii::$app->request->post())) {
            if ($user->validate()) {
                $user->save();
                Yii::$app->getSession()->setFlash('success', 'User registered successfully!!! You can now login.');

                return $this->redirect(array('site/index'));
            }
        }

        return $this->render('register', ['user' => $user]);
    }
}
