<?php

namespace App\View\Users;

use App\View\Main;

class Form extends Main
{
    public function content($data = [])
    {
        ?>
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button"><i class="si si-settings"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title"><?= isset($data['isUpdate']) ? 'Редактирование пользователя' : 'Добавление нового пользователя' ?></h3>
                </div>
                <div class="block-content">
                    <?php
                        if (isset($data['errors']) && $data['errors']) {
                            foreach ($data['errors'] as $error) {
                                ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <p><?= $error ?></p>
                                    </div>
                                <?php
                            }
                        }
                    ?>
                    <form class="form-horizontal push-10-t" action="<?= isset($data['isUpdate']) ? '/admin/users/update?id=' . $data['isUpdate'] : '/admin/users/add' ?>" method="post">
                        <div class="form-group">
                            <div class="col-xs-9">
                                <div class="form-material">
                                    <input class="form-control" type="email" id="material-email" name="email" placeholder="Введите email пользователя" value="<?= isset($data['data']['email']) ? $data['data']['email'] : '' ?>">
                                    <label for="material-email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <div class="form-material">
                                    <input class="form-control" type="text" id="material-text" name="login" placeholder="Ввдедите имя пользователя" value="<?= isset($data['data']['login']) ? $data['data']['login'] : '' ?>">
                                    <label for="material-text">Имя пользователя</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <div class="form-material">
                                    <input class="form-control" type="password" id="material-password" name="password" placeholder="Введите пароль">
                                    <label for="material-password">Пароль</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <div class="form-material">
                                    <input class="form-control" type="password" id="material-password" name="password-confirm" placeholder="Повторите пароль">
                                    <label for="material-password">Еще раз пароль</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-9">
                                <button class="btn btn-sm btn-primary" type="submit">Добавить</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        <?php
    }
}
