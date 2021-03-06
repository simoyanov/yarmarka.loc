<?php echo $header; ?>
  
<!--***************  HEAD  ***************-->
   
    <div class="container-fluid header">
       <div class="container">
           <div class="logo"></div>
            <div class="social">
                <a class="vk"></a>
                <a class="ok"></a>
            </div>
       </div>
    </div>
    
<!--***************  MENU  ***************-->
   
    <div class="container-fluid menu">
            <div class="container">
                <ul>
                    <li class="menu-logo"></li>
                    <li class="menu_1"  onclick="return scrollToDiv('.box_1'), showOpisBox(1)">
                        <div class="menu-img"></div>
                        <span>ярмарки<br> выходного дня</span>
                    </li>
                    <li  class="menu_2" onclick="return scrollToDiv('.box_2'), showOpisBox(2)">
                        <div class="menu-img"></div>
                        <span>региональные<br> ярмарки</span>
                    </li>
                    <li  class="menu_3"  onclick="return scrollToDiv('.box_3'), showOpisBox(3)">
                        <div class="menu-img"></div>
                        <span>рынки</span>
                    </li>
                    <li  class="menu_4"  onclick="return scrollToDiv('.box_4'), showOpisBox(4)">
                        <div class="menu-img"></div>
                        <span>фестивали</span>
                    </li>
                    <li  class="menu_5" onclick="return scrollToDiv('.map')">
                        <div class="menu-img"></div>
                        <span>свое<br> на карте</span>
                    </li>
                    <li  class="menu_6"  onclick="return scrollToDiv('.people')">
                        <div class="menu-img"></div>
                        <span>свои<br> люди</span>
                    </li>
                    <li  class="menu_7"  onclick="return scrollToDiv('.news')">
                        <div class="menu-img"></div>
                        <span>новости</span>
                    </li>
                    <li class="helper"></li>
                </ul>
            </div>
    </div>
    
<!--***************  MENU-MINI  ***************-->

<div class="navbar navbar-inverse navbar-fixed-top menu-mini" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand menu-logo" onclick="return scrollToDiv('.header')"></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="menu_1" onclick="return scrollToDiv('.box_1'), showOpisBox(1)" >
                        <div class="menu-img">ярмарки выходного дня</div>
                    </li>
                    <li  class="menu_2" onclick="return scrollToDiv('.box_2'), showOpisBox(2)">
                        <div class="menu-img">региональные ярмарки</div>
                    </li>
                    <li  class="menu_3" onclick="return scrollToDiv('.box_3'), showOpisBox(3)">
                        <div class="menu-img">рынки</div>
                    </li>
                    <li  class="menu_4" onclick="return scrollToDiv('.box_4'), showOpisBox(4)">
                        <div class="menu-img">фестивали</div>
                    </li>
                    <li  class="menu_5" onclick="return scrollToDiv('.map')">
                        <div class="menu-img">свое на карте</div>
                    </li>
                    <li  class="menu_6" onclick="return scrollToDiv('.people')">
                        <div class="menu-img">свои люди</div>
                    </li>
                    <li  class="menu_7" onclick="return scrollToDiv('.news')">
                        <div class="menu-img">новости</div>
                    </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid menu-dummy">
                <div class="container">
                    <div id="menu-icon-wrapper2" class="menu-icon-wrapper" style="visibility: hidden">
                        <svg width="1000px" height="1000px">
                            <path id="pathD" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
                            <path id="pathE" d="M 300 500 L 700 500"></path>
                            <path id="pathF" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
                        </svg>
                        <button id="menu-icon-trigger2" class="menu-icon-trigger"></button>
                    </div>
                    <img src="images/logo_my_fair.svg" alt="" height="40px;" class="dummy-logo">
                       <div id="dummy2" class="dummy">
                        <div class="menu_1 menu-img dummy__item dummy_menu_item" onclick="return scrollToDiv('.box_1'), showOpisBox(1)">ярмарки выходного дня</div>
                        <div class="menu_2 menu-img dummy__item dummy_menu_item" onclick="return scrollToDiv('.box_2'), showOpisBox(2)">региональные ярмарки</div>
                        <div class="menu_3 menu-img dummy__item dummy_menu_item" onclick="return scrollToDiv('.box_3'), showOpisBox(3)">рынки</div>
                        <div class="menu_4 menu-img dummy__item dummy_menu_item" onclick="return scrollToDiv('.box_4'), showOpisBox(4)">фестивали</div>
                        <div class="menu_5 menu-img dummy__item dummy_menu_item" onclick="return scrollToDiv('.map')">свое на карте</div>
                        <div class="menu_6 menu-img dummy__item dummy_menu_item" onclick="return scrollToDiv('.people')">свои люди</div>
                        <div class="menu_7 menu-img dummy__item dummy_menu_item" onclick="return scrollToDiv('.news')">новости</div>
                    </div>
                </div>
    </div>
                    
            
          

<!--***************  ABOUT  ***************-->
   
    <div class="container-fluid about">
         <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
                    <h1>«Моя ярмарка» - для тех, кому важно качество</h1>
                     <div class="del-line"></div>
                     <p>Независимо от того, покупатель вы или продавец, здесь вы найдете для себя полезную информацию:
    в чем разница между региональной и ярмаркой выходного дня, где купить продукты,
    выращенные на собственных фермах, как рассказать о себе покупателям и многое другое.</p>
                </div>
            </div>
         </div>
    </div>
    
    <div class="container-fluid about-midle">
         <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12">
                    <div class="about-box about-box-1">
                         <div class="topic"><span>Покупаете продукты?</span></div>
                         <div class="about-row">
                             <p>Узнайте, что такое региональные и ярмарки выходного дня</p>
                         </div>
                         <div class="about-row">
                             <p>Воспользуйтесь картой, чтобы найти торговую точку по типу и адресу</p>
                         </div>
                         <div class="about-row">
                             <p>Ознакомьтесь отзывами  о ярмарках, рынках и фестивалях</p>
                         </div>
                         <div class="about-row">
                             <p>Узнайте о тех, кто продает свои товары в разделе Свои люди</p>
                         </div>
                         <button onclick="return scrollToDiv('.map')">посмотреть на карте</button>
                     </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-12">
                    <div class="about-box about-box-2">
                         <div class="topic"><span>Продаете продукты?</span></div>
                         <div class="about-row">
                             <p>Узнайте, где можно продать свои продукты</p>
                         </div>
                         <div class="about-row">
                             <p>Подайте заявку на участие в ярмарке выходного дня</p>
                         </div>
                         <div class="about-row">
                             <p>Воспользуйтесь картой, чтобы найти интересующую     торговую точку</p>
                         </div>
                         <div class="about-row">
                             <p>Расскажите о себе и своих товарах в разделе Свои люди</p>
                         </div>
                         <button onclick="return scrollToDiv('.map')">присоединяйся</button>
                     </div>
                </div>
            </div>
         </div>
    </div>
    
    
    <div class="container-fluid about-foot parallax-window" data-parallax="scroll" data-image-src="images/about-parallax.jpg">
               <div class="row">
                <div class="col-lg-12 col-lg-12  col-sm-12 col-xs-12">
                    <button  onclick="return scrollToDiv('.spec')">спецпредложения от фермеров</button>
                </div>
            </div>
    </div>
    
<!--***************  OPIS  ***************-->
    
     <div class="container-fluid opis">
        <div class="row">
             <div class="opis-box box_1 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <div class="medal wow bounceIn" id="medal1"></div>
                 <div class="fade-block" id="opisBox1">
                    <div class="bottom-align">
                        <h3>Ярмарки выходного дня</h3>
                     <p>Ярмарки, на которых осуществляется продажа сельскохозяйственной продукции и продовольственных товаров, произведенных фермерами различных регионов России, а также на территории государств-членов Таможенного союза. Ярмарки выходного дня проводятся в пятницу, субботу и воскресенье.</p>
                     <button onclick="return scrollToDiv('.map')">посмотреть на карте</button>
                    </div>
                     
                 </div>
             </div>
             <div class="opis-box box_2 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <div class="medal wow bounceIn" id="medal2"></div>
                 <div class="fade-block" id="opisBox2">
                    <div class="bottom-align">
                        <h3>региональные Ярмарки</h3>
                     <p>Ярмарки, на которых осуществляется продажа сельскохозяйственной продукции, продовольственных и непродовольственных товаров легкой промышленности, произведенных в России, а также на территории государств-членов Таможенного союза, изделий народных художественных промыслов, продукции ремесленничества и иных товаров.
    Региональные ярмарки проходят периодически или разово.</p>
                    
                     <button onclick="return scrollToDiv('.map')">посмотреть на карте</button>
                    </div>
                     
                 </div>
             </div>
             <div class="opis-box box_3 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <div class="medal wow bounceIn" id="medal3"></div>
                 <div class="fade-block" id="opisBox3">
                    <div class="bottom-align">
                        <h3>продуктовые рынки</h3>
                     <p>Рынки, на которых осуществляется продажа сельскохозяйственной продукции и продовольственных товаров, произведенных фермерами  различных регионов России, а также на территории государств-членов Таможенного союза.
    Такой рынок находится под открытым небом или в торговых рядах.</p>
                    
                     <button onclick="return scrollToDiv('.map')">посмотреть на карте</button>
                    </div>
                     
                 </div>
             </div>
             <div class="opis-box box_4 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <div class="medal wow bounceIn" id="medal4"></div>
                 <div class="fade-block" id="opisBox4">
                    <div class="bottom-align">
                        <h3>Фестивали</h3>
                     <p>Каждый год в Москве проходят сезонные городские фестивали: «Московская Весна», «Московское Варенье», «Московская Осень» и «Путешествие в Рождество». Кстати, фестиваль «Путешествие в Рождество» стартует 18 декабря и продлится до конца новогодних каникул – 10 января.</p>
                     <div class="social-box">
                         <a href="" class="social-circle soc-elka"><span>Путешествие в Рождество</span></a>
                         <a href="" class="social-circle soc-vk"><span>Вконтакте</span></a>
                         <a href="" class="social-circle soc-ok"><span>Одноклассники</span></a>
                         <a href="" class="social-circle soc-fb"><span>Facebook</span></a>
                         <a href="" class="social-circle soc-inst"><span>Instagram</span></a>
                     </div>
                     <button onclick="return scrollToDiv('.map')">посмотреть на карте</button>
                    </div>
                 </div>
             </div>
        </div>
     </div>
     
<!--***************  MAP  ***************-->
   
    
      <div class="container-fluid map-menu-dummy">
                <div class="container">
                    <div id="menu-icon-wrapper" class="menu-icon-wrapper" style="visibility: hidden">
                        <svg width="1000px" height="1000px">
                            <path id="pathA" d="M 300 400 L 700 400 C 900 400 900 750 600 850 A 400 400 0 0 1 200 200 L 800 800"></path>
                <path id="pathB" d="M 300 500 L 700 500"></path>
                <path id="pathC" d="M 700 600 L 300 600 C 100 600 100 200 400 150 A 400 380 0 1 1 200 800 L 800 200"></path>
              </svg>
                        <button id="menu-icon-trigger" class="menu-icon-trigger"></button>
                    </div>
                       <div id="dummy" class="dummy">
                        <div class="dummy__item dummy_map_item" id="dummy-map-but1">ярмарки выходного дня</div>
                        <div class="dummy__item dummy_map_item" id="dummy-map-but2">региональные ярмарки</div>
                        <div class="dummy__item dummy_map_item" id="dummy-map-but3">продуктовые рынки</div>
                        <div class="dummy__item dummy_map_item" id="dummy-map-but4">фестивали</div>
                        <div class="dummy__item dummy_map_item" id="dummy-map-but5">спецпредложения</div>
                    </div>
                </div>
    </div>
      
      
      
      
      
      <div class="map-menu container-fluid">
       <div class="container">
        <div class="">
            <button id="map-but1">ярмарки выходного дня</button>
            <button id="map-but2">региональные ярмарки</button>
            <button id="map-but3">продуктовые рынки</button>
            <button id="map-but4">фестивали</button>
            <button id="map-but5">спецпредложения</button>
        </div>
    </div>
    </div>
    
    
    
    <div class="map-menu-mini container-fluid">
       <div class="container">
        <div class="">
            <button id="map-mini-but1">ярмарки выходного дня</button>
            <button id="map-mini-but2">региональные ярмарки</button>
            <button id="map-mini-but3">продуктовые рынки</button>
            <button id="map-mini-but4">фестивали</button>
            <button id="map-mini-but5">спецпредложения</button>
        </div>
    </div>
    </div>
    <div class="map container-fluid"  id="map"></div>
    
<!--***************  PEOPLE  ***************-->
   
    <div class="people container-fluid">
       <div class="container">
        <h2>свои люди</h2>
        <div class="del-line"></div>
        <p>Познакомтесь с теми, кто продает вам продукты</p>
        <div class="people-slider">
            <div class="people-slider-col">
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-1"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">снежевитская станислава</div>
                    <div class="profession">фермер</div>
                    <div class="category">категория товаров: <span>овощи, фрукты</span></div>
                    <div class="like">18</div>
                </div>
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-2"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">илья петров</div>
                    <div class="profession">пасечник</div>
                    <div class="category">категория товаров: <span>мёд, варенье</span></div>
                    <div class="like">117</div>
                </div>
            </div>
            <div class="people-slider-col">
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-3"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">максим максимов</div>
                    <div class="profession">Мясник</div>
                    <div class="category">категория товаров: <span>мясная продукция</span></div>
                    <div class="like">136</div>
                </div>
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-4"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">арсен джугашвили</div>
                    <div class="profession">Фермер</div>
                    <div class="category">категория товаров: <span>молочная продукция</span></div>
                    <div class="like">73</div>
                </div>
            </div>
            <div class="people-slider-col">
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-5"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">игорь филатов</div>
                    <div class="profession">мясник</div>
                    <div class="category">категория товаров: <span>мясная продукция</span></div>
                    <div class="like">215</div>
                </div>
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-6"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">маргарита иванова</div>
                    <div class="profession">фермер</div>
                    <div class="category">категория товаров: <span>овощи, продукты</span></div>
                    <div class="like like-zero"></div>
                </div>
            </div>
            <div class="people-slider-col">
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-7"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">анна агафонова</div>
                    <div class="profession">фермер</div>
                    <div class="category">категория товаров: <span>овощи, фрукты</span></div>
                    <div class="like like-zero"></div>
                </div>
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-8"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">стас стасов</div>
                    <div class="profession">фермер</div>
                    <div class="category">категория товаров: <span>овощи, фрукты</span></div>
                    <div class="like">3</div>
                </div>
            </div>
            <div class="people-slider-col">
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-9"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">снежевитская станислава</div>
                    <div class="profession">фермер</div>
                    <div class="category">категория товаров: <span>овощи, фрукты</span></div>
                    <div class="like like-zero"></div>
                </div>
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-10"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">илья петров</div>
                    <div class="profession">пасечник</div>
                    <div class="category">категория товаров: <span>мёд, варенье</span></div>
                    <div class="like like-zero"></div>
                </div>
            </div>
            <div class="people-slider-col">
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-11"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">максим максимов</div>
                    <div class="profession">Мясник</div>
                    <div class="category">категория товаров: <span>мясная продукция</span></div>
                    <div class="like like-zero"></div>
                </div>
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-12"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">арсен джугашвили</div>
                    <div class="profession">Фермер</div>
                    <div class="category">категория товаров: <span>молочная продукция</span></div>
                    <div class="like like-zero"></div>
                </div>
            </div>
            <div class="people-slider-col">
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-13"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">игорь филатов</div>
                    <div class="profession">мясник</div>
                    <div class="category">категория товаров: <span>мясная продукция</span></div>
                    <div class="like">999</div>
                </div>
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-14"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">маргарита иванова</div>
                    <div class="profession">фермер</div>
                    <div class="category">категория товаров: <span>овощи, продукты</span></div>
                    <div class="like">888</div>
                </div>
            </div>
            <div class="people-slider-col">
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-15"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">анна агафонова</div>
                    <div class="profession">фермер</div>
                    <div class="category">категория товаров: <span>овощи, фрукты</span></div>
                    <div class="like">777</div>
                </div>
                <div class="people-slider-box">
                   <div class="box-hover"></div>
                    <div class="avatar"  id="avatar-16"><span><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#feremerModal"></button></span></div>
                    <div class="name">стас стасов</div>
                    <div class="profession">фермер</div>
                    <div class="category">категория товаров: <span>овощи, фрукты</span></div>
                    <div class="like like-zero"></div>
                </div>
            </div>
        </div>
        <button type="button" class="" data-toggle="modal" data-target="#anketaModal">добавить свою историю</button>
    </div>
    </div>
    
<!--***************  SPEC  ***************-->
   
    <div class="spec container-fluid parallax-window" data-parallax="scroll" data-image-src="images/spec-bg.jpg">
        <h2>спецпредложения</h2>
        <div class="del-line"></div>
        <button onclick="return scrollToDiv('.map')">посмотреть на карте</button>
    </div>
   
    <div class="container-fluid spec-slider-cont">
        <div class="spec-slider">
            
            <div class="spec-slider-box">
                <div class="spec-slider-box-sale" id="sale-1">
                    <div class="circle" data-toggle="modal" data-target="#specModal">20%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
                <div class="spec-slider-box-sale" id="sale-5">
                    <div class="circle present" data-toggle="modal" data-target="#specModal"></div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
                <div class="spec-slider-box-sale" id="sale-9">
                    <div class="circle" data-toggle="modal" data-target="#specModal">20%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
            </div>
            <div class="spec-slider-box">
                <div class="spec-slider-box-sale" id="sale-2">
                    <div class="circle" data-toggle="modal" data-target="#specModal">50%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
                <div class="spec-slider-box-sale" id="sale-6">
                    <div class="circle" data-toggle="modal" data-target="#specModal">15%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
                <div class="spec-slider-box-sale" id="sale-10">
                    <div class="circle" data-toggle="modal" data-target="#specModal">50%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
            </div>
            <div class="spec-slider-box">
                <div class="spec-slider-box-sale" id="sale-3">
                    <div class="circle" data-toggle="modal" data-target="#specModal">15%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
                <div class="spec-slider-box-sale" id="sale-7">
                    <div class="circle" data-toggle="modal" data-target="#specModal">20%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
                <div class="spec-slider-box-sale" id="sale-11">
                    <div class="circle" data-toggle="modal" data-target="#specModal">10%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
            </div>
            <div class="spec-slider-box">
                <div class="spec-slider-box-sale" id="sale-4">
                    <div class="circle present" data-toggle="modal" data-target="#specModal"></div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
                <div class="spec-slider-box-sale" id="sale-8">
                    <div class="circle" data-toggle="modal" data-target="#specModal">20%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
                <div class="spec-slider-box-sale" id="sale-12">
                    <div class="circle present" data-toggle="modal" data-target="#specModal"></div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
            </div>
            <div class="spec-slider-box">
                <div class="spec-slider-box-sale" id="">
                    <div class="circle" data-toggle="modal" data-target="#specModal">20%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
                <div class="spec-slider-box-sale" id="">
                    <div class="circle present"></div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
                <div class="spec-slider-box-sale" id="">
                    <div class="circle" data-toggle="modal" data-target="#specModal">20%</div>
                    <div class="fade-title">
                        <p>Скажи «свои продукты» на ярмарке выходного дня и получи скидку - 20%</p>
                        <button type="button" class="icon btn btn-info btn-lg" data-toggle="modal" data-target="#specModal"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!--***************  NEWS  ***************-->
   <?php if(!empty($news)){ ?>
    <div class="news container-fluid">
      <div class="container">
        <h2>Cвои новости</h2>
        <div class="del-line"></div>
        <p>Мы познакомим вас со всеми новостями и событиями в мире торговли.</p>
        <div id="items">
            <?php foreach ($news as $value_n) { ?>
              <div class="item news-box">
                <div class="news_title">
                  <div class="img-fade"><img src="<?php echo $value_n['image']; ?>" alt="<?php echo $value_n['title']; ?>" width="100%"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#newsModal"></button></div>
                    <p><?php echo $value_n['title']; ?></p>
                    <div class="date"><?php echo $value_n['date_added']; ?></div>
                    <div class="social">
                        <a href="" class="vk"></a>
                        <a href="" class="ok"></a>
                        <a href="" class="add"></a>
                    </div>
                </div>
              </div>
            <?php } ?>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden">
            <button>архив новостей</button>
        </div>
      </div>
    </div>
    <?php } ?>

<!--***************  FOOTER  ***************-->
  
   <div class="container-fluid buble-blue"></div>
    <div class="footer container-fluid">
       <div class="container">
       <div class="row">
          <div class="col-lg-6 col-lg-offset-6 col-md-12 col-sm-12 col-xs-12">
               <div class="email">
               <input type="text" placeholder="Введите ваш e-mail для подписки">
                <button>Подписаться</button>
            </div>
           </div>
           <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 left-foot">
               <div class="phone">Телефон горячей линии:<span>8(800)2020-5555</span></div>
                <button class="recomend">жалобы и предложения</button>
                <p class="copyright">© 2015, свои продукты</p>
           </div>
       </div>
    </div>
    </div>
    
<!--***************  MODAL-SPEC  ***************-->
     

  <!-- Modal -->
  <div class="modal fade spec-modal" id="specModal" role="dialog">
    <div class="modal-dialog" style="width:100%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        
          
          <div class="container-fluid">
              <div class="row">
                 <div id="mySpecCarousel" class="carousel slide col-lg-6  col-md-6 col-sm-12 col-xs-12" data-ride="carousel">

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <img src="images/spec-modal-image.jpg" width="100%" alt="">
                        </div>

                        <div class="item">
                          <img src="images/spec-modal-image.jpg" width="100%" alt="">
                        </div>

                        <div class="item">
                          <img src="images/spec-modal-image.jpg" width="100%" alt="">
                        </div>

                        <div class="item">
                          <img src="images/spec-modal-image.jpg" width="100%" alt="">
                        </div>
                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#mySpecCarousel" role="button" data-slide="prev">
<!--                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#mySpecCarousel" role="button" data-slide="next">
<!--                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 spec-modal-info">
                      <h3>спецпредложение</h3>
                      <div class="modal-line"></div>
                      <p>26 и 27 декабря на ярмарке выходного дня Пресненского района Лидия Михайлова проводит акцию: при покупке 2 банок соленых огурцов третья – в подарок!<br><br>Предложение ограничено.</p>
                      <div class="spec-address">
                          <div class="spec-add-row"><span>Где купить?</span>На ярмарке выходного дня Пресненского района <div class="modal-line"></div></div>
                          <div class="spec-add-row"><span>Адрес</span>ЦАО, ул. Красная Пресня, вл.1 - Место на ярмарке: 35А <div class="modal-line"></div></div>
                      </div>
                      
                  </div>
                  <div class="vertical-buble"></div>
              </div>
              <div class="row">
                  <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 spec-modal-map" id="spec-modal-map"></div>
              </div>
          </div>
        
        
      </div>
      
    </div>
              <button type="button" class="close" data-dismiss="modal">&times;</button>

  </div>
  
<!--***************  MODAL-FERMER(PEOPLE)  ***************-->

<!-- Modal -->

<div class="modal fade fermer-modal" id="feremerModal" role="dialog">
    <div class="modal-dialog" style="width:100%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        
          
          <div class="container-fluid">
              <div class="row">

                 <div id="myFermerCarousel" class="carousel slide col-lg-6  col-md-6 col-sm-12 col-xs-12" data-ride="carousel">

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                          <img src="images/spec-modal-image.jpg" width="100%" alt="">
                        </div>

                        <div class="item">
                          <img src="images/spec-modal-image.jpg" width="100%" alt="">
                        </div>

                        <div class="item">
                          <img src="images/spec-modal-image.jpg" width="100%" alt="">
                        </div>

                        <div class="item">
                          <img src="images/spec-modal-image.jpg" width="100%" alt="">
                        </div>
                      </div>

                      <!-- Left and right controls -->
                      <a class="left carousel-control" href="#myFermerCarousel" role="button" data-slide="prev">
<!--                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="right carousel-control" href="#myFermerCarousel" role="button" data-slide="next">
<!--                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  
                  
                  <div class="col-lg-6  col-md-6 col-sm-12 col-xs-12 fermer-modal-info">
                     <div class="people-info">
                         <div class="avatar">
                             <div class="like"><span>18</span></div>
                         </div>
                         <div class="name">лидия михайлова</div>
                         <div class="profession">фермер</div>
                         <div class="category">Категория товаров:<span>овощи</span></div>
                         <div class="social">
                             <div class="modal-vk"></div>
                             <div class="modal-ok"></div>
                         </div>
                     </div>
                      <div class="fermer-address">
                          <div class="fermer-add-row"><span>О себе</span>Торгую огурчиками и помидорами – все исключительно домашнего соления. Делать заготовки я начала давно в свободное от работы время. Да-да, торговать на ярмарке – это, своего рода, хобби. С понедельника по пятницу  – я обычный директор подмосковной школы. <div class="modal-line"></div></div>
                          <div class="fermer-add-row"><span>Где купить?</span>На ярмарке выходного дня Пресненского района <div class="modal-line"></div></div>
                          <div class="fermer-add-row"><span>Адрес</span>ЦАО, ул. Красная Пресня, вл.1 - Место на ярмарке: 35А <div class="modal-line"></div></div>
                      </div>
                      <form action="">
                          <p>Оставьте сообщение фермеру</p>
                          <input name="Имя" type="text" placeholder="Ваше имя">
                          <input name="e-mail" type="text" placeholder="Ваш e-mail">
                          <textarea name="message" type="text" placeholder="Ваше сообщение"></textarea>
                          <button>Отправить</button>
                      </form>
                      
                  </div>
                  <div class="vertical-buble"></div>
              </div>
              <div class="row">
                  <div class="col-lg-12  col-md-12 col-sm-12 col-xs-12 fermer-modal-map" id="fermer-modal-map"></div>
              </div>
          </div>
          
        
        
      </div>
    </div>
          <button type="button" class="close close-fix" data-dismiss="modal">&times;</button>

  </div>
     
<!--***************  MODAL-NEWS  ***************-->
<?php if(!empty($news)){ ?>
  <?php foreach ($news as $value_n) { ?>
    <div class="item news-box">
      <div class="news_title">
        <div class="img-fade"><img src="<?php echo $value_n['image']; ?>" alt="<?php echo $value_n['title']; ?>" width="100%"><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#newsModal"></button></div>
          <p><?php echo $value_n['title']; ?></p>
          <div class="date"><?php echo $value_n['date_added']; ?></div>
          <div class="social">
              <a href="" class="vk"></a>
              <a href="" class="ok"></a>
              <a href="" class="add"></a>
          </div>
      </div>
    </div>
  <?php } ?>
<?php } ?>


<div class="modal fade news-modal" id="newsModal" role="dialog">
    <div class="modal-dialog" style="width:100%;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="container-fluid">
             <div class="container">
              <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 news-modal-content">
                      <h3>Ярмарки выходного дня: где купить свои продукты?</h3>
                      <div class="del-line"></div>
                      <img src="images/news-1.jpg" alt="" width="100%">
                      <p>Осень — пора наслаждаться собранным урожаем и делать запасы на зиму. Пока за окном ходят тучи, дует холодный ветер и моросит то дождь, то снег, в теплом доме витают аппетитные ароматы любимых с детства блюд. На сковородке шипят, жарясь, грибы и картошка, в духовке готовится шарлотка, соленья томятся в расставленных повсюду банках, а в красивой вазочке ждет чаепития сливовое варенье.
Ищите свои продукты на ярмарке выходного дня рядом с домом! Сохраняйте инфографику с адресами ярмарок в вашем районе.
</p>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col-lg-offset-1 col-md-offset-1 news-line">
                     <h3>Анонс новостей</h3>
                     <button class="news-line-row">Самый вкусный картофель</button>
                     <button class="news-line-row">Итоги «Московской осени»-2015</button>
                     <button class="news-line-row">Самая вкусная морковь </button>
                     <button class="news-line-row">Ярморочные устои</button>
                     <button class="news-line-row">Осенние яблочки</button>
                     <button class="news-line-row">Региональные ярмарки: где купить свои продукты?</button>
                     <h3>Адреса ярмарок</h3>
                     <img src="images/infografika.jpg" alt="">
                      
                  </div>
                  </div>
              </div>
          </div>
      </div>
    </div><button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
     
<!--***************  MODAL-ANKETA  ***************-->
     
     <!-- Modal -->

<div class="modal fade anketa-modal" id="anketaModal" role="dialog">
    <div class="modal-dialog" style="width:100%;">
    
      <!-- Modal content-->
      <div class="modal-content">
        
          
          <div class="container">
              <div class="row">
                 <form action="">
                     <div class="text-center col-lg-12  col-md-12 col-sm-12 col-xs-12">
                          <h2>заполните анкету</h2>
                          <img src="images/ava.png" alt="">
                      </div>
                      <div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 aketa-modal-slider">
                          <label for="">ваше имя</label><input type="text">
                      </div>
                      <div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 aketa-modal-slider">
                          <label for="">ваша фамилия</label><input type="text">
                      </div>
                      <div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 aketa-modal-slider">
                          <label for="">категория товаров</label><input type="text">
                      </div>
                      <div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 aketa-modal-slider">
                          <label for="">область / район</label><input type="text">
                      </div>
                      <div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 aketa-modal-slider">
                          <label for="">город / посёлок / деревня</label><input type="text">
                      </div>
                      <div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 aketa-modal-slider">
                          <label for="">телефон</label><input type="text">
                      </div>
                      <div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 aketa-modal-slider">
                          <label for="">e-mail адрес</label><input type="text">
                      </div>
                      <div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 aketa-modal-slider">
                          <label for="">ссылка на страницу вконтакте</label><input type="text">
                      </div>
                      <div class="col-lg-4  col-md-4 col-sm-12 col-xs-12 aketa-modal-slider">
                          <label for="">ссылка на страницу в одноклассниках</label><input type="text">
                      </div>
                      <h2>добавьте описание</h2>
                      <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-12 col-xs-12 aketa-modal-slider">
                          <textarea name="description" type="text" placeholder="Описание товаров, места производства, технологии и прочее"></textarea>
                      </div>
                      
                      <div class="col-lg-8 col-lg-offset-2  col-md-8 col-md-offset-2 col-sm-12 col-xs-12 aketa-modal-slider">
                            <h2>загрузите фотографии</h2>
                            <div class="drop">
                                <p>Перетащите сюда свои фотографии или нажмите «Добавить»</p>
                                <button>Добавить</button>
                            </div>
                      </div>
                      <div class="text-center col-lg-12  col-md-12 col-sm-12 col-xs-12">
                          <button>отправить анкету</button>
                      </div>
                 </form>
              </div>
          </div>
      </div>
    </div>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
     
<!--***************  MODAL-MAP  ***************-->  
<!-- Modal -->
  <div class="modal fade map-modal" id="mapModal" role="dialog">
    <div class="modal-dialog map-modal-dialog" style="width:100%; max-width:1400px;">
    
      <!-- Modal content-->
      <div class="modal-content">
        
          
          <div class="container-fluid">
              <div class="row">
                  <div class="map-popup col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
                    <div class="map-popup-content col-lg-9 col-md-12">
                        <h3>ярмарка тамбовской области</h3>
                        <div id="myMapCarousel" class="carousel slide col-lg-5 col-md-12" data-ride="carousel">

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="images/modal-map-img.jpg" alt="">                            </div>

                            <div class="item">
                                <img src="images/modal-map-img.jpg" alt="">                            </div>

                            <div class="item">
                                <img src="images/modal-map-img.jpg" alt="">                            </div>

                            <div class="item">
                                <img src="images/modal-map-img.jpg" alt="">                            </div>
                          </div>

                          <!-- Left and right controls -->
                          <a class="left carousel-control" href="#myMapCarousel" role="button" data-slide="prev">
    <!--                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>-->
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myMapCarousel" role="button" data-slide="next">
    <!--                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                        
                        <p class="col-lg-7  col-md-12">На площадке Московской осени в САО будет представлен настоящий тамбовский картофель! А помимо этого – другие овощи из плодородной тамбовской земли, масло из тамбовских маслобоен, мясо и колбасы во всех их проявлениях!  Кроме того, здесь будет и знаменитый тамбовский лук из Ичжаринского района. Земля здесь содержит примеси песчаника, потому лук созревает крупный и сладкий.
А в качестве пищи духовной для своих гостей гостеприимные тамбовцы приготовили культурно-развлекательную программу с выступлением творческих коллективов, конкурсами, мастер-классами и, конечно, традиционным чаепитием!
</p>
                        <div class="popup-category col-lg-12  col-md-12">категории товаров<span>Сельскохозяйственная продукция</span></div>
                    </div>
                    <div class="map-popup-info col-lg-3 col-md-12">
                       <div class="map-popup-info-center">
                           <div class="popup-time">график работы<span>11-17 сентября 09:00 - 20:00</span></div>
                            <div class="popup-adress">адрес<span>Краснодаская ул, дом 51, ст.1</span></div>
                            <div class="popup-hotline">горячая линия<span>+7(495)624-82-31</span></div>
                       </div>
                        
                        <a href="" class="how">как стать участником?</a>
                        <div class="social">
                            <a href="" class="vk"></a>
                            <a href="" class="ok"></a>
                            <a href="" class="twit"></a>
                        </div>
                        
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
              </div>
              
          </div>
          
        
        
      </div>
      
    </div>
  </div>
  
<?php echo $footer; ?>