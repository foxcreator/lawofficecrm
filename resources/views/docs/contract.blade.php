<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Договір</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600&family=Roboto:wght@100;300;400;500;700&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">

    {{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}
    <style>

        body {
            font-family: Roboto, serif;
        }
        h5 {
            margin: 0;
            padding: 0;
        }
        h4 {
            border-bottom: rgba(0, 0, 0, 0.50) 1px solid;
            padding-bottom: 10px;
            margin-bottom: 0;
        }

        h3 {
            font-weight: 500;
            margin: 0;
        }

        p {
            padding: 0;
            margin: 0;
            font-size: 12px;
        }
        .container {
            text-align: center;
        }

        .title-block {
            display: block;
            text-align: center;
            border-bottom: rgba(0, 0, 0, 0.50) 1px solid;
            width: 700px;
            height: 127px;
        }

        .title-left {
            width: 300px;
            float: left;
            text-align: right;
        }

        .title-right {
            width: 300px;
            float: left;
            text-align: left;
        }

        .title-center {
            float: left;
            width: 100px;
        }

        .content {
            height: 500px;
        }

        .header {
            margin-top: 20px;
            margin-bottom: 0;
        }

        .header-description {
            font-weight: 500;
            font-size: 14px;
        }

        .subheader {
            margin-top: 30px;
            font-size: 12px;
            font-weight: 500;
        }

        .date-number {
            float: left;
            text-align: left;
            margin-bottom: 0;
        }

        .city {
            text-align: right;
            float: right;
            margin-bottom: 0;
        }

        .par-1 {
            margin-top: 0;
            text-align: left;
            text-indent: 30px;
        }

        .par-1 p {
            font-size: 12px;
        }

        .contract-part {
            margin-top: 30px;
        }

        .contract-part p {
            text-align: left;

            text-indent: 30px;

        }

        .contract-part.footer {
            position: fixed;
            bottom: 0;
            padding-top: 0;
            margin-top: 10px;
            width: 700px;
            height: 85px;
        }

        .footer-social {
            border-top: rgb(0,0,0, 0.5) solid 1px;
            border-bottom: rgb(0,0,0, 0.5) solid 1px;
            height: 25px;
            padding: 20px;
        }

        .social {
            font-size: 10px;
            margin-right: 20px;
        }

        .social-icon-container {
            display: inline-block;
            vertical-align: middle;
        }

        .social-icon {
            margin-bottom: 1.5px;
            margin-left: 2px;
            color: #001355;
        }

        .footer-phones {
            font-size: 10px;
            margin-top: 2px;
            height: 30px;
        }

        .footer-left {
            width: 300px;
            margin-left: -40px;
            float: left;
            text-align: right;
        }

        .footer-center {
            width: 100px;
            float: left;
            margin: 0 40px;
        }

        .footer-right {
            width: 300px;
            float: left;
            text-align: left;
        }

        table {
            border: rgb(0,0,0, 0.6) solid 1px;
        }

        table td {
            /*border: gray solid 1px;*/
            width: 350px;
        }

    </style>

</head>

<body>
<div class="container">
    <div class="title-block">
        <div class="title-left">
            <h4>
                ПРАВОВИЙ АЛЬЯНС<br>
                НАУКОВЦІВ-ПРАКТИКІВ<br>
                «БОРИФЕН»
            </h4>
            <p><strong>Web:</strong> www.borisfen.net</p>
        </div>
        <div class="title-center"></div>
        <div class="title-right">
            <h4>
                LEGAL ALLIANCE <br>
                SCIENTIST PRACTITIONERS
                «BORISFEN»
            </h4>
            <p><strong>E-mail:</strong> dnipro@borisfen.net</p>
        </div>
    </div>
    <div class="content">
        <div class="header">
            <h3>ДОГОВІР</h3>
            <p class="header-description">про надання правової допомоги</p>
        </div>
        <div class="subheader">
            <div class="date-number">{{ \Carbon\Carbon::now()->translatedFormat('\«d\» F Y') }} року № {{ $contractNumber }}</div>
            <div class="city">м. Дніпро</div>
        </div>
        <div class="par-1">
            <p>Правовий Альянс Науковців-Практиків «Борисфен» (ЄДРПОУ 39651357),
                в особі її голови Гильт Галини Григорівни, яка діє на підставі Статуту та
                адвокат {{ $case->user->surname }} {{ $case->user->name }} {{ $case->user->father_name }}, який займається адвокатською діяльністю на
                підставі Свідоцтва про право на заняття адвокатською діяльністю №{{ $case->user->license_number }},
                виданого {{ $case->user->license_issued_by }} {{ $licenseWhenIssued->translatedFormat('d F Y') }} року, (далі - Виконавець), з однієї сторони,
                та {{ $case->visitor->surname }} {{ $case->visitor->name }} {{ $case->visitor->father_name }}, {{ $birthdate->translatedFormat('d F Y') }} року народження, РНОКПП: {{ $case->visitor->tin_code }},
                (далі - Клієнт) з другої сторони, уклали даний Договір про правову допомогу
                (надалі – Договір) про наступне.</p>
        </div>

        <div class="contract-part">
            <h5>1. ПРЕДМЕТ ДОГОВОРУ</h5>
            <p>1. «Клієнт» доручає, а «Виконавець» бере на себе зобов&#39;язання здійснити функції
                (захисника) представника Самойленка Олексія Сергійовича, у справі про
                адміністративне правопорушення, передбачене ст.124 КУпАП та ст.122-4 КУпАП в Ленінському
                районному суді м. Дніпропетровська та Дніпровському апеляційному суді.</p>
        </div>

        <div class="contract-part">
            <h5>2. ПРАВА ТА ОБОВ’ЯЗКИ СТОРІН</h5>
            <p>2.1. Адвокат зобов’язується:</p>
            <p>2.1.1. Надавати правову допомогу, в том числі, за окремими дорученнями Клієнта.</p>
            <p>2.1.2. Представляти права і законні інтереси Клієнта в органах державної влади, місцевого
                самоврядування, на підприємствах, установах, організаціях всіх форм власності та
                підпорядкування, судах України, правоохоронних органах та здійснювати професійну діяльність
                Адвоката згідно з умовами цього договору з усіма правами представника, які передбачені чинним
                в України законодавством.</p>
            <p>2.1.3. Інші послуги, визначені ст.19 ЗУ «Про адвокатуру та адвокатську діяльність».</p>
            <p>2.2. Права адвоката:</p>
            <p>2.2.1. Представляти інтереси клієнта та приймати участь у судових засіданнях, розробити
                правову позицію у справі, скласти позовну заяву, підготувати позовні матеріали та подати їх в суд,
                знайомитися з матеріалами справи, робити з них витяги, знімати копії з документів,
                долучених до справи, одержувати копії рішень, ухвал, брати участь у судових засіданнях,
                подавати докази, брати участь у дослідженні доказів, задавати питання іншим особам, які беруть
                участь у справі, а також свідкам, експертам, спеціалістам, заявляти клопотання та відводи,
                давати усні та письмові пояснення судові, подавати свої доводи, міркування щодо питань, які
                виникають під час судового розгляду, і заперечення проти клопотань, доводів і міркувань
                інших осіб, знайомитися з журналом судового за сідання, знімати з нього копії та подавати
                письмові зауваження з приводу його неправильності чи неповноти, прослуховувати запис
                фіксування судового засідання технічними засобами, робити з нього копії, подавати письмові
                зауваження з приводу його неправильності чи неповноти, оскаржувати рішення і ухвали суду,
                змінювати підставу або предмет позову, збільшувати або зменшувати розмір позовних вимог,
                відмовитись від позову, визнати позов повністю або частково, пред’явити зустрічний позов,
                укладати мирову угоду, користуватися іншими процесуальними правами встановленими ЦПК,
                КПК, КАСУ тощо.</p>
        </div>
        {{--maybe footer--}}
        <div class="contract-part footer">
            <div class="footer-social">
                <p>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-facebook-square social-icon"></i>
                        </span>
                        Facebook.com/BorisfenPO
                    </span>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-twitter-square social-icon"></i>
                        </span>
                        Twitter.com/BorisfenUA
                    </span>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-instagram-square social-icon"></i>
                        </span>
                        Instagram.com/BorisfenPO
                    </span>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-youtube-square social-icon"></i>
                        </span>
                        Youtube.com/BorisfenPO
                    </span>
                </p>
            </div>
            <div class="footer-phones">
                <div class="footer-left">
                    Приймальня №1 (Дніпро)<br>
                    вул. Володимира Мономаха, буд.6, кімн.15<br>
                    місто Дніпро, Україна, 49000
                </div>
                <div class="footer-center">
                    +38 (066) 584-85-09<br>
                    +38 (063) 584-85-09<br>
                    +38 (096) 584-85-09
                </div>
                <div class="footer-right">
                    Reception №1 (Dnipro)<br>
                    6, Volodymyr Monomakh street, room 15<br>
                    Dnipro city, Ukraine, 49000
                </div>
            </div>
        </div>

        <div class="contract-part">
            <p>2.2.2. Адвокат має право збирати відомості про факти, які можуть бути використанні як
                докази у цивільних, господарських, адміністративних справах.</p>
            <p>2.2.3. Запитувати і отримувати документи або їх копії від підприємств, установ,
                організацій, об’єднань усіх форм власності та від громадян за їх згодою.</p>
            <p>2.2.4. Надавати правову допомогу та здійснювати захист прав та інтересів Клієнта.</p>
            <p>2.2.5. Виконувати інші дії, передбачені законодавством України в інтересах Клієнта.</p>
            <p>2.3. Клієнт зобов’язується:</p>
            <p>2.3.1. Сприяти Адвокату у створенні належних умов для якісного надання юридичних
                послуг Клієнту за даним Договором.</p>
            <p>2.3.2. Надавати Адвокату повну та достовірну інформацію стосовно порядку, строків та
                інших додаткових умов, по яким сторони дійшли згоди, шляхом поштово-електронного,
                факсимільного зв’язку, телефонограмами або особисто, протягом терміну, достатнього Адвокату
                для виконання ним завдання-доручення.</p>
            <p>2.3.3. Надавати Адвокату на його прохання необхідні документи та інформацію в
                необхідній кількості екземплярів та примірників, необхідних для виконання цього Договору,
                шляхом поштово-електронного, факсимільного зв’язку і телефонограмами або особисто
                протягом терміну, достатнього Адвокату для виконання ним завдання-доручення.</p>
            <p>2.4. Права Клієнта:</p>
            <p>2.4.1. Давати Адвокату усні або письмові вказівки щодо виконання доручення відповідно
                до цього Договору;</p>
            <p>2.4.2. Отримувати від Адвоката юридичні консультації з питань наявності фактичних і
                правових підстав щодо виконання доручення, практики застосування відповідного законодавства,
                можливості та правових наслідків досягнення бажаного для Клієнта результату.</p>
            <h5>3. ПЛАТА ЗА НАДАННЯ ПОСЛУГ</h5>
            <p>3.1. За надання послуг із захисту (представництва) «Виконавцю» виплачується гонорар в
                розмірі та в термін, що обумовлений додатково.</p>
            <p>3.2. На визначення розміру гонорару Адвоката впливають строки та результати вирішення
                спірних правовідносин, ступінь важкості справи, обсяг правових послуг, необхідних для бажаного
                результату та належного виконання окремих доручень Клієнта. Обсяг правової допомоги
                враховується при визначені обґрунтованого розміру гонорару.</p>
            <p>3.3. Клієнт» згоден, що в ході здійснення захисту (представництва) його інтересів може
                виникнути необхідність в проведенні певних оплачуваних дій, зокрема експертиз, консультації
                фахівців, відрядження і т.п. Оплата їх проведення не входить в суму гонорару і здійснюється
                додатково. У разі відсутності коштів на їх оплату, Клієнт своєчасно інформує про це Виконавця і
                попереджений про негативні наслідки по справі.</p>
            <h5>4. ВІДПОВІДАЛЬНІСТЬ СТОРІН ЗА ПОРУШЕННЯ ДОГОВОРУ</h5>
            <p>4.1. У випадку порушення зобов’язання, що виникає з цього Договору Сторона яка
                порушила зобов’язання, несе відповідальність, визначену цим Договором та (або) чинним в
                Україні законодавством.</p>
            <p>4.2. Порушенням Договору є його невиконання або неналежне виконання, тобто виконання
                з порушенням умов, визначених змістом цього Договору.</p>
            <p>4.3. Сторона не несе відповідальності за порушення Договору, якщо воно сталося не з її
                вини (умислу чи необережності).</p>
            <h5>5. ТЕРМІН ДІЇ ДОГОВОРУ</h5>
            <p>5.1. Цей Договір вважається укладеним і набирає чинності з моменту його підписання
                Сторонами і скріплення печатками Сторін (у разі наявності печаток) та діє до повного виконання
                обов’язків згідно Договору сторонами.</p>
            <p>5.2. Цей договір може бути розірваний згідно вимог чинного законодавства України.</p>
            <h5>6. ПРИКІНЦЕВІ ПОЛОЖЕННЯ</h5>
            <p>6.1. Додаткові угоди та додатки до цього Договору є його невід’ємною частиною і мають
                юридичну силу у разі, якщо вони викладені у письмовій формі, підписані Сторонами та скріплені
                їх печатками (у разі наявності печаток).</p>
            <p>6.4. Цей Договір складений при повному розумінні Сторонами його умов та термінології,
                українською мовою у двох автентичних примірниках, які мають однакову юридичну силу, по
                одному для кожної із Сторін.</p>
        </div>

        <div class="contract-part footer">
            <div class="footer-social">
                <p>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-facebook-square social-icon"></i>
                        </span>
                        Facebook.com/BorisfenPO
                    </span>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-twitter-square social-icon"></i>
                        </span>
                        Twitter.com/BorisfenUA
                    </span>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-instagram-square social-icon"></i>
                        </span>
                        Instagram.com/BorisfenPO
                    </span>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-youtube-square social-icon"></i>
                        </span>
                        Youtube.com/BorisfenPO
                    </span>
                </p>
            </div>
            <div class="footer-phones">
                <div class="footer-left">
                    Приймальня №1 (Дніпро)<br>
                    вул. Володимира Мономаха, буд.6, кімн.15<br>
                    місто Дніпро, Україна, 49000
                </div>
                <div class="footer-center">
                    +38 (066) 584-85-09<br>
                    +38 (063) 584-85-09<br>
                    +38 (096) 584-85-09
                </div>
                <div class="footer-right">
                    Reception №1 (Dnipro)<br>
                    6, Volodymyr Monomakh street, room 15<br>
                    Dnipro city, Ukraine, 49000
                </div>
            </div>
        </div>
        <br>
        <div class="contract-part">
            <h5>7. МІСЦЕЗНАХОДЖЕННЯ І РЕКВІЗИТИ СТОРІН</h5>
            <table style="border: black solid 1px">
                <tr>
                    <td>Правовий Альянс Науковців-Практиків
                        <strong>«Борисфен»</strong><br>
                        код ЄДРПОУ: 39651357</td>
                    <td>{{ $case->visitor->surname }} {{ $case->visitor->name }} {{ $case->visitor->father_name }}<br>
                        {{ $birthdate->translatedFormat('d F Y') }} року народження,<br>
                        РНОКПП: {{ $case->visitor->tin_code }}<br>
                        паспорт {{ $case->visitor->passport_number }},<br>
                        {{ $case->visitor->passport_issued_by }}<br>
                        від {{ $passportWhenIssued->translatedFormat('d F Y') }}</td>
                </tr>
                <tr style="background-color: gray">
                    <td>Адреса</td>
                    <td>Адреса</td>
                </tr>
                <tr>
                    <td>49000, Україна, Дніпропетровська обл.,<br>
                        м. Дніпро, вул. Володимира Мономаха, буд.6</td>
                    <td>{{ $case->visitor->address }}</td>
                </tr>
                <tr style="background-color: gray">
                    <td>Засоби зв’язку</td>
                    <td>Засоби зв’язку</td>
                </tr>
                <tr>
                    <td>(096/063/066) 584 – 85 – 09<br>
                        dnipro@borisfen.net</td>
                    <td>{{ $case->visitor->phone }}</td>
                </tr>
                <tr style="background-color: gray">
                    <td>Підпис</td>
                    <td>Підпис</td>
                </tr>
                <tr>
                    <td>Голова Галина ГИЛЬТ
                        <br><br><br><br><br>
                        (печатка)
                    </td>
                    <td rowspan="6">

                        Клієнт {{ $case->visitor->name }} {{ $case->visitor->surname }}</td>
                </tr>
                <tr>
                    <td>Адвокат
                        {{ $case->user->surname }} {{ $case->user->name }} {{ $case->user->father_name }}<br>
                        49000, Україна, Дніпропетровська обл.,<br>
                        м. Дніпро, вул. Володимира Мономаха, буд.6</td>
                </tr>
                <tr style="background-color: gray">
                    <td>Засоби зв’язку</td>
                </tr>
                <tr>
                    <td>(093) 370 – 30 – 00<br>
                        avtoadvocat@borisfen.net</td>
                </tr>
                <tr style="background-color: gray">
                    <td>Підпис</td>
                </tr>
                <tr>
                    <td>
                        Адвокат {{ $case->user->name }} {{ $case->user->surname }}
                        <br><br><br><br>
                    </td>
                </tr>
            </table>
        </div>
        <div class="contract-part footer">
            <div class="footer-social">
                <p>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-facebook-square social-icon"></i>
                        </span>
                        Facebook.com/BorisfenPO
                    </span>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-twitter-square social-icon"></i>
                        </span>
                        Twitter.com/BorisfenUA
                    </span>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-instagram-square social-icon"></i>
                        </span>
                        Instagram.com/BorisfenPO
                    </span>
                    <span class="social">
                        <span class="social-icon-container">
                            <i class="fab fa-youtube-square social-icon"></i>
                        </span>
                        Youtube.com/BorisfenPO
                    </span>
                </p>
            </div>
            <div class="footer-phones">
                <div class="footer-left">
                    Приймальня №1 (Дніпро)<br>
                    вул. Володимира Мономаха, буд.6, кімн.15<br>
                    місто Дніпро, Україна, 49000
                </div>
                <div class="footer-center">
                    +38 (066) 584-85-09<br>
                    +38 (063) 584-85-09<br>
                    +38 (096) 584-85-09
                </div>
                <div class="footer-right">
                    Reception №1 (Dnipro)<br>
                    6, Volodymyr Monomakh street, room 15<br>
                    Dnipro city, Ukraine, 49000
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
