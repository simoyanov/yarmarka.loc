<?php echo $header; ?>
 <section class="slice bg-white">
        <div class="wp-section user-account">
            <div class="container">
                <div class="row">
                  <div class="col-sm-12">
                    <h1 class="module-heading__module-title font-alt text-center"><?php echo $text_my_account; ?></h1>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="user-profile-img">
                          <img src="<?php echo $avatar; ?>" alt="" id="i-account_image">
                         <input type="hidden" name="image" value="<?php echo $avatar; ?>" />
                        </div>
                        <div class="mt-20">
                          <a href="#" class="btn btn-base btn-block" data-toggle="image" id="account_image">Сменить аватар</a>
                        </div>
                       
                    </div>
                    <div class="col-md-9">                     
                        <div class="tabs-framed">
                            <ul class="tabs clearfix">
                                <li class="active"><a href="#tab-2" data-toggle="tab">Моя зачетка</a></li>
                                <li><a href="#tab-1" data-toggle="tab">Контактная информация</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade " id="tab-1">
                                    <div class="tab-body">
                                        <dl class="dl-horizontal style-2">
                                            <h3 class="hidden title title-lg">Personal information</h3>
                                            <p class="hidden mb-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                            <dt>Имя</dt>
                                            <dd>
                                                <span class="pull-left"><?php echo $firstname?></span>
                                                <a href="<?php echo $edit; ?>" class="btn btn-xs btn-base btn-icon fa-edit pull-right"><span>Редактировать</span></a>
                                            </dd>
                                            <hr>
                                            <dt>Фамилия</dt>
                                            <dd>
                                                <span class="pull-left"><?php echo $lastname?></span>
                                                <a href="<?php echo $edit; ?>" class="btn btn-xs btn-base btn-icon fa-edit pull-right"><span>Редактировать</span></a>
                                            </dd>
                                            <hr>
                                            <dt>Email</dt>
                                            <dd>
                                            <span class="pull-left"><?php echo $email?></span>
                                                <a href="<?php echo $edit; ?>" class="btn btn-xs btn-base btn-icon fa-edit pull-right"><span>Редактировать</span></a>
                                            </dd>
                                            <hr>
                                            <dt>Телефон</dt>
                                            <dd>
                                                <span class="pull-left"><?php echo $telephone?></span>
                                                <a href="<?php echo $edit; ?>" class="btn btn-xs btn-base btn-icon fa-edit pull-right"><span>Редактировать</span></a>
                                            </dd>
                                            <hr>
                                            <dt>Пароль</dt>
                                            <dd>
                                                <span class="pull-left">**********</span>
                                                <a href="<?php echo $password; ?>" class="btn btn-xs btn-base btn-icon fa-edit pull-right"><span>Редактировать</span></a>
                                            </dd>
                                            <hr>
                                        </dl>
                                    </div>
                                </div>

                                <div class="tab-pane fade in active" id="tab-2">
                                    <div class="tab-body">
                                        <h3 class="hidden title title-lg">My orders</h3>
                                        <p class=" hidden mb-20">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                                    
                                    <table class="table table-orders table-bordered table-striped table-responsive no-margin">
                                        <thead>
                                            <tr>
                                                <th>Название теста</th>
                                                
                                                <th>Попыток</th>
                                                <th>Дата</th>
                                                <th>Результат</th>
                                                <th>Баллы</th>
                                                <th>Действия</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php ?>
                                            <tr>
                                                <td><a href="#">Инфекции Верхних Дыхательных Путей</a></td>
                                                <td>1</td>
                                                <td>27-11-2015</td>
                                                <td><i class="fa fa-check"></i> Зачет</td>
                                                <td>5</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Инфекции Верхних Дыхательных Путей</a></td>
                                               
                                                <td>3
                                                    <br>
                                                    <strong>Осталось 2 попытки</strong></td>
                                                <td>27-11-2015</td>
                                                <td><i class="fa fa-times"></i> Не зачет</td>
                                                <td></td>
                                                <td><a href="/test_infekcii_verchnix_dixatelnix_putei" class="btn btn-b-base">Пройти тест</a></td>
                                            </tr>
                                            <tr>
                                                <td><a href="#">Инфекции Верхних Дыхательных Путей</a></td>
                                                <td>0</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td><a href="/test_infekcii_verchnix_dixatelnix_putei" class="btn btn-b-base">Пройти тест</a></td>
                                            </tr>
                                            <tr>
                                                <td>Инфекции Верхних Дыхательных Путей</td>
                                               
                                                <td>3
                                                    <br>
                                                    <strong>Осталось 0 попыток</strong></td>
                                                <td>27-11-2015</td>
                                                <td><i class="fa fa-times"></i> Не зачет</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right">Промокоды</td>
                                                <td>5</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-right"><strong>Ваш результат</strong></td>
                                                <td>5</td>
                                                <td></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php echo $column_left; ?>
<?php echo $column_right; ?>
<?php echo $content_bottom; ?>
<?php echo $footer; ?>