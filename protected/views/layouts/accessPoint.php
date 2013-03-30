<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="ru" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/start.css" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/startAdd.css" />
            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body style ="background: url(<?php echo $this->startPageStyle['bg_image'];?> ) 50% 0 no-repeat; 
                background-color: #<?php echo $this->startPageStyle['bg_color']; ?>" > 

        <div class="wrapper content-border" 
             style="margin-top: <?php echo $this->startPageStyle['content_margin_top'];?>px;"> 
            <div class="navbar">
                <div class="navbar-inner">
                    <a class="brand" href="#">Wi-Fi</a>
                    <ul class="nav">
                        <li class="active"><a href="#">Войти в интернет</a></li>
                        <li><a href="#">О нас</a></li>
                        <li><a href="#">Партнерам</a></li>
                        <li><a href="#">Инвесторам</a></li>
                    </ul>
                </div>
            </div>
            <div class="banner">
                <a href="<?php echo $this->startPageStyle['url_top_banner'];?>">
                        <img src ="<?php echo $this->startPageStyle['top_banner'];?>" class="content-border">
                </a>
            </div>
            <div class="content">
                <div class="column content-border">
                    <h4>Шутка дня:</h4>
                    <p>- Маша, я в получку теперь на 15 р. больше носить буду 
                        и по вечерам перестану задерживаться!
                        </br>
                        - Ой, Вань, неужто в должности повысили?</br>
                        - Да нет, из партии выгнали...</br>

                    </p>
                    <p class="pull-right"><a href="#">Далее >></a></p>

                </div>
                <div class="separator"></div>
                <div class="column">
                    <h4>Сегодня в кино:</h4>

                    <ul style ="list-style: none;text-align: left;">
                        <li>
                            <a href="http://afisha.yandex.ru/msk/events/592901/">
                                Облачный атлас
                            </a> 
                        </li>
                        <li>
                            <a href="http://afisha.yandex.ru/msk/events/579390/">
                                Операция «Арго»
                            </a> 
                        </li>
                        <li>
                            <a href="http://afisha.yandex.ru/msk/events/592901/">
                                Облачный атлас
                            </a> 
                        </li>
                        <li>
                            <a href="http://afisha.yandex.ru/msk/events/579390/">
                                Операция «Арго»
                            </a> 
                        </li>
                    </ul>

                </div>
                <div class="separator"></div>
                <div class="column">
                    <h4>Информация для Вас:</h4>
                    <table>
                        <tbody>
                            <tr class="head">
                                <td colspan="2"><i>Cегодня:</i></td>
                               
                            </tr>
                            <tr>
                                <th>
                                    <a href="http://news.yandex.ru/quotes/1.html" title="Динамика курса USD&nbsp;ЦБ">USD&nbsp;ЦБ</a></th>
                                <td>
                                    <strong class=""><?php echo $this->startPageContent['usd'];?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th><a href="http://news.yandex.ru/quotes/23.html" title="Динамика курса EUR&nbsp;ЦБ">EUR&nbsp;ЦБ</a></th>
                                <td>
                                    <strong class=""><?php echo $this->startPageContent['euro'];?></strong>
                                </td>
                               
                            </tr>
                            </tbody>
                    </table>
                </div>

            </div>
            <div class="clearfix"></div>
            <div class="enterform">
                <h4>Для продолжения работы нажмите на кнопку: 
                    <button type="button" class="btn btn-info">Продолжить</button>
                </h4>
            </div>
             <div class="banner">
              <a href="<?php echo $this->startPageStyle['url_down_banner'];?>">
                    <img src ="<?php echo $this->startPageStyle['down_banner'];?>" class="content-border">
              </a>
            </div>
           
            <div class="footer">
                © 2012–2013&nbsp;&nbsp;<a href="http://wi-fun.ru">Wi-FI</a>
                <span class="cenz">16+</span> 
            </div>
        </div>
    </body>
</html>

