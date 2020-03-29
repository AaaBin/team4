@extends('layouts/nav')

{{-- CSS --}}
@section('css')
<link rel="stylesheet" href="{{asset('css/intro_style.css')}}">
@endsection

{{-- 內容 --}}
@section('content')
<main>

    <div class="content container">
      <!-- garden_about  -->

      <div class="garden_about ">
        <h3
          class="garden_about_title d-flex justify-content-center align-items-center align-self-center text-center text-black">
          About</h3>
        <div class="garden_about_img" data-aos="fade-up" data-aos-duration="2000">
          <img style="width: 100%;" src="{{asset('img/intro/garden_01.jpg')}}" alt="">
        </div>
        <div class="garden_about_text">
          <h3 class="garden_about_textup">廣袤視野</h3>
          <p>
            沐心泉腹地遼闊，總面積超過八公頃，置身在餐廳平台，放眼望去盡是滿山翠綠的原始林木，農場位於600至900公尺的高海拔山上，至高點上向南可望酒桶山，西可遠眺台中港，東看大雪山，而農場東側與大甲溪河床約有300多公尺的落差，其遼闊的景緻不亞於站在台北101俯看台北市。
            <br><br>
            傍晚的景緻更是令人驚嘆，俯瞰可見整片霓虹燈海的台中盆地；抬頭仰望滿天的星斗與明亮星鑽。　　
          </p>

        </div>
      </div>

      <!-- garden_view -->
      <div class="garden_view">
        <div class="garden_view_cloud garden_view_box row">
          <div class="order-md-2 order-1 col-lg-6 col-md-6 col-12 " data-aos="fade-left"  data-aos-duration="2000">
            <img width="100%" src="{{asset('img/intro/garden_02.jpg')}}" alt="">
          </div>
          <div class="garden_view_text order-md-1 order-2 col-lg-6 col-md-6 col-12 align-self-center">
            <h3>雲海山間</h3>
            <p>
              農場位於層層山巒之上，清晨觀日出，看那第一道曙光的活力；黃昏看夕陽，看那滿天彩霞的柔媚，佇足在峰頂，時見山間雲海起伏。
            </p>
          </div>
        </div>
        <div class="garden_view_mountain garden_view_box row">
          <div class="order-md-1 order-1 col-lg-6 col-md-6 col-12" data-aos="fade-right"  data-aos-duration="2000">
            <img width="100%" src="{{asset('img/intro/garden_03.jpg')}}" alt="">
          </div>
          <div class="garden_view_text order-md-2 order-2  col-md-6 col-12 align-self-center">
            <h3>山林景緻</h3>
            <p>
              是一番幸福，溫婉的鳥鳴，尤其是那竹雞”雞格乖,雞格乖…”的叫聲更是可愛，還有大甲溪的潺潺流水聲，聽那大自然美妙的天籟之音，能洗滌心靈，讓人無限舒暢。
              <br>
              為了不破壞山林的原有景緻，這裡不論是涼亭、步道甚或屋頂皆以原始樸素的基調造作，以融入這片大自然的好環境。 </p>
          </div>

        </div>
        <div class="garden_view_season garden_view_box row">
          <div class="order-md-2 order-1  col-lg-6 col-md-6 col-12" data-aos="fade-left" data-aos-duration="2000">
            <img width="100%" src="{{asset('img/intro/garden_04.jpg')}}" alt="">
          </div>
          <div class="garden_view_text order-md-1 order-2 col-lg-6 col-md-6 col-12 align-self-center">
            <h3>四季花海</h3>
            <p>
              4米寬的平坦道路，道路兩側除了原有的嫩草鮮花與長年老木外，更有櫻花、杜鵑、野百合、薰衣草、楓樹、金針花、油花、風蔴木、黃金花…滿山遍地的盛放。
              <br>
              沿著長約1公里的步道，引領遊客依著山勢的層疊起伏，每行數步即呈現不同的鋪陳和景緻。
            </p>
          </div>

        </div>
        <div class="garden_purpos garden_view_box row">
          <div class="garden_purpos_img d-block d-md-none " data-aos="fade-up" data-aos-duration="2000">
            <img width="100%" src="{{asset('img/intro/garden_05.jpg')}}" alt="">
          </div>
          <div class="garden_purpos_text align-self-center">
            <p>農場設立的宗旨，除了分享美好的景色事物外，更希望能成為繁忙都市人心中的一片淨土，讓生活在鋼筋叢林中的都市人能遠離塵囂，放鬆心情、洗淨心靈的疲憊，特命名為”沐心泉”。　
            </p>
          </div>
        </div>
      </div>

      <!-- garden_walks -->

      <div class="garden_walks ">

        <div class="garden_walks_text text-center col-lg-6 col-md-6 col-12 m-auto">

          <h3>花間步道</h3>

        </div>
        <div class="garden_walks_img col-lg-8 col-md-8 order-md-0 m-auto" data-aos="fade-up" data-aos-duration="2000">
          <img width="100%" src="{{asset('img/intro/garden_06.jpg')}}" alt="">
        </div>

      </div>

      <!-- garden_info -->
      <div class="garden_info">
        <div class="garden_info_text">
          <div class="garden_info_text_up text-center">
            <h3 class="garden_info_text_up_en text-center m-auto">Information</h3>
            <h3 class="garden_info_text_up_zh text-center m-auto">園區營業資訊</h3>
          </div>
          <div class="garden_info_text_down m-auto">
            <div class="garden_info_text_down_text">
              <p>
                【假日】<br>
                AM9:30~PM6:30(最後點餐時間18:00) <br><br>
                【平日】<br>
                AM9:30~PM6:00(最後點餐時間17:30) <br><br>
                【門票150元】<br>
                不分平假日，其中100元可折抵園內消費<br><br>
                * 附免費停車場<br>
                * 園區內禁帶外食、不可泡茶<br>
                * 建議穿著休閒鞋以及長褲　<br> 　　
              </p>
            </div>
          </div>
        </div>
        <div class="garden_info_card row ">
          <div class="garden_info_card_dining col-lg-6 col-md-6 col-12" data-aos="fade-left" data-aos-duration="2000">
            <img width="100%" src="{{asset('img/intro/garden_07.jpg')}}" alt="">
            <h3 class="garden_info_card_text text-center">餐 廳</h3>
            <p class="mt-2 p-2 cardC_txt ">新社美食遠近馳名，其中又以新社沐心泉休閒農場附設餐廳部最為知名。
              <br><br>
              餐廳主人為您預備了精心烹飪的餐點，新鮮的食材，在山林之中和著鳥叫聲的清脆，絕佳的景色與氣氛，在群山環花包圍下，將新社的山、新社的水，新社最美的景色呈現在您眼前。</p>
            <div class="garden_info_card_dining_bottom text-center d-block d-md-none mb-5" >
              <a href="#">
                <button type="button" class="d-flex mx-auto">
                  <h3>了解更多<img src="{{asset('img/intro/arrow-right01.svg')}}" alt=""></h3>

                </button>
              </a>
            </div>
          </div>

          <div class="garden_info_card_Camp col-lg-6 col-md-6 col-12" data-aos="fade-right" data-aos-duration="2000">
            <img width="100%" src="{{asset('img/intro/garden_08.jpg')}}" alt="">
            <h3 class="garden_info_card_text text-center">露營區</h3>
            <p class="mt-2 p-2 cardC_txt ">
              天然美景，入秋露營的好去處，在大自然裡享受露營的樂趣；山嵐飄渺、壯麗雲海、迷醉的夕陽景色，彷彿置身魔幻仙境的感受！
              <br><br>
              * 2~3月有櫻花，4~5月有油桐花、螢火蟲，5~8月有金針花，12月有白雪木，四季各自美麗。
            </p>
          </div>

        </div>
        <div class="garden_info_card_button text-center">
          <a href="/booking">
            <button type="button" class="">
              <h3>了解更多<img src="{{asset('img/intro/arrow-right01.svg')}}" alt=""></h3>
            </button>
          </a>
        </div>
        <div class="garden_info_dining text-center">
          <div class="garden_info_dining_text">
            <h3>Dining</h3>
          </div>
          <div class="garden_info_dining_img row">
            <div class="garden_info_dining_img_n col-lg-2 col-md-4 col-4 ">
              <img src="{{asset('img/intro/garden_09.jpg')}}" alt="">
            </div>
            <div class=" garden_info_dining_img_n col-lg-2 col-md-4 col-4 ">
              <img src=" {{asset('img/intro/garden_10.jpg')}}" alt="">
            </div>
            <div class="garden_info_dining_img_n col-lg-2 col-md-4 col-4 ">
              <img src="{{asset('img/intro/garden_11.jpg')}}" alt="">
            </div>
            <div class=" garden_info_dining_img_n col-lg-2 col-md-4 col-4 ">
              <img src=" {{asset('img/intro/garden_12.jpg')}}" alt="">
            </div>
            <div class="garden_info_dining_img_n col-lg-2 col-md-4 col-4 ">
              <img src="{{asset('img/intro/garden_13.jpg')}}" alt="">
            </div>
            <div class="garden_info_dining_img_n col-lg-2 col-md-4 col-4 ">
              <img src="{{asset('img/intro/garden_14.jpg')}}" alt="">
            </div>
          </div>

        </div>

      </div>


    </div>


  </main>

@endsection

{{-- js --}}
@section('js')

@endsection
