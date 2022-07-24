<?php

namespace App\View\Tasks;

class Form extends \App\View\Main
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
                    <h3 class="block-title"><?= isset($data['isUpdate']) ? 'Редактирование задачи' : 'Добавление задачи' ?></h3>
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
                    <form class="form-horizontal push-10-t" enctype="multipart/form-data" action="<?= isset($data['isUpdate']) ? '/tasks/update?id=' . $data['isUpdate'] : '/tasks/add' ?>" method="post">
                        <div class="form-group">
                            <div class="col-xs-9">
                                <div class="form-material">
                                    <input class="form-control" type="text" name="title" placeholder="Имя" value="<?= isset($data['data']['title']) ? $data['data']['title'] : '' ?>">
                                    <label for="material-email">Имя</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-9">
                                <div class="form-material">
                                    <input class="form-control" type="text" name="email" placeholder="Введите email" value="<?= isset($data['data']['email']) ? $data['data']['email'] : '' ?>">
                                    <label for="material-email">Email</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <div class="form-material">
                                    <textarea class="form-control" name="description" placeholder="Ввдедите описание задачи"><?= isset($data['data']['description']) ? $data['data']['description'] : '' ?></textarea>
                                    <label for="material-text">Задача</label>
                                </div>
                            </div>
                        </div>
                         <div class="form-group">
                            <div class="col-xs-9">
                                <div class="form-material">
                                    <input class="" type="checkbox" name="status" <?= isset($data['data']['status']) && $data['data']['status'] == 1 ? 'checked' : '' ?> value="<?= $data['data']['status'] ?>">
                                    <label for="material-email">Выполнено</label>
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
